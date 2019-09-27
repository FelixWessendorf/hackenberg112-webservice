<?php

class Api {

    /**
     * @param string $strApiEndpoint
     * @param string $strClassName
     * @param string $strMethodName
     * @param array $aryParameters
     * @throws Exception
     * @return stdClass
     */
    public static function Call($strApiEndpoint,$strClassName,$strMethodName,$aryParameters=array()){

        $Request = new stdClass;
        $Request->className = $strClassName;
        $Request->methodName = $strMethodName;
        $Request->parameters = $aryParameters;

        $CurlHandle = curl_init();
        curl_setopt($CurlHandle,CURLOPT_URL,$strApiEndpoint);
        curl_setopt($CurlHandle,CURLOPT_POST,true);
        curl_setopt($CurlHandle,CURLOPT_POSTFIELDS,json_encode($Request));
        curl_setopt($CurlHandle,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($CurlHandle, CURLOPT_SSL_VERIFYPEER,false);
        $strResponse = curl_exec($CurlHandle);
        if(curl_errno($CurlHandle)>0) throw new Exception(curl_error($CurlHandle));
        curl_close($CurlHandle);

        $stdResponse = json_decode($strResponse);
        if(is_null($stdResponse)) throw new Exception($strResponse);

        return $stdResponse;

    }

    /**
     * Response function. Prints json response and terminates the script
     * @param null $mxdResult
     * @return void
     */
    private static function Respond($mxdResult=null) {

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: *");
        header("Access-Control-Allow-Headers: x-requested-with, content-type");
        header("Access-Control-Max-Age: 3600");
        header("Content-Type: application/json; charset=utf-8");

        $Response = new stdClass();
        $Response->result = $mxdResult;
        $Response->errors = array();
        foreach(MyError::All() as $Error) {
            $stdPublicError = $Error->ToStdClass();
            unset($stdPublicError->type,$stdPublicError->code,$stdPublicError->file,$stdPublicError->line);
            $Response->errors[] = $stdPublicError;
        }

        print(json_encode($Response));
        exit(0);

    }

    public static function Listen(){

        $stdRequest = new stdClass();
        $stdRequest->strClassName = null;
        $stdRequest->strMethodName = null;
        $stdRequest->aryParameters = array();

        if($_SERVER["REQUEST_METHOD"]=="OPTIONS") self::Respond();

        if($_SERVER["REQUEST_METHOD"]=="GET"){

            $aryGetArguments = explode("/",trim($_SERVER["REQUEST_URI"],"/"));
            if(isset($aryGetArguments[0])&&strlen(trim($aryGetArguments[0]))>0) $stdRequest->strClassName = trim($aryGetArguments[0]);
            if(isset($aryGetArguments[1])&&strlen(trim($aryGetArguments[1]))>0) $stdRequest->strMethodName = trim($aryGetArguments[1]);
            if(isset($aryGetArguments[2])) $stdRequest->aryParameters = array_map(function($strParameter){return json_decode(urldecode($strParameter));},array_slice($aryGetArguments,2));

        }

        if($_SERVER["REQUEST_METHOD"]=="POST"){

            $strRequest = file_get_contents('php://input');
            $stdDecodedRequest = json_decode($strRequest);
            if(!is_null($stdDecodedRequest)) {
                if(isset($stdDecodedRequest->className)) $stdRequest->strClassName = $stdDecodedRequest->className;
                if(isset($stdDecodedRequest->methodName)) $stdRequest->strMethodName = $stdDecodedRequest->methodName;
                if(isset($stdDecodedRequest->parameters)) $stdRequest->aryParameters = $stdDecodedRequest->parameters;
            }
            else {
                if(isset($_POST["className"])&&strlen(trim($_POST["className"]))>0) $stdRequest->strClassName = trim($_POST["className"]);
                if(isset($_POST["methodName"])&&strlen(trim($_POST["methodName"]))>0) $stdRequest->strMethodName = trim($_POST["methodName"]);
                if(isset($_POST["parameters"])&&is_array($_POST["parameters"])) $stdRequest->aryParameters = $_POST["parameters"];
            }

        }

        if(!isset($stdRequest->strClassName)||strlen(trim($stdRequest->strClassName))==0) MyError::Register("className","No class name defined");
        if(!isset($stdRequest->strMethodName)||strlen(trim($stdRequest->strMethodName))==0) MyError::Register("methodName","No method name defined");
        if(!isset($stdRequest->aryParameters)) MyError::Register("parameters","No parameters defined");
        elseif(!is_array($stdRequest->aryParameters)) MyError::Register("parameters","Parameters must be defined as array");

        if(MyError::Count()>0) self::Respond();

        if(!is_callable(array(trim($stdRequest->strClassName),trim($stdRequest->strMethodName)))) MyError::Register("method","Method is not callable");
        else {
            $ReflectionMethod = new ReflectionMethod(trim($stdRequest->strClassName),trim($stdRequest->strMethodName));
            if(preg_match('/^\s*\*\s*@api(\s[^$]*)?$/im',$ReflectionMethod->getDocComment())==0) MyError::Register("method","Method is not callable");
            if(count($stdRequest->aryParameters)<$ReflectionMethod->getNumberOfRequiredParameters()) MyError::Register("parameters","Missing parameters");
        }

        if(MyError::Count()>0) self::Respond();

        try {

            self::Respond(call_user_func_array(array(trim($stdRequest->strClassName),trim($stdRequest->strMethodName)),$stdRequest->aryParameters));

        } catch(Exception $Exception){

            MyError::Register("methodCall",$Exception->getMessage());
            self::Respond();

        }

    }

}

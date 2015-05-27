<?php

/**
 * Class Error
 * @package Website/Core
 * @version 2.1 (2015-04-04)
 * @author Felix Wessendorf <felix.wessendorf@wfelix.de>
 */
class Error {

    /** @var string */
    public $Source, $Message, $File;

    /** @var int */
    public $Type, $Code, $Line;

    /** @var Error[] */
    private static $Errors = array();

    /**
     * @param string $strSource
     * @param string $strMessage
     * @param int    $intType
     * @param int    $intCode
     * @param string $strFile
     * @param int    $intLine
     */
    public function __construct($strSource="Unknown",$strMessage="An error occurred",$intType=E_ERROR,$intCode=0,$strFile="",$intLine=0) {

        $this->Source  = trim($strSource);
        $this->Message = trim($strMessage);
        $this->Type    = intval($intType);
        $this->Code    = intval($intCode);
        $this->File    = trim($strFile);
        $this->Line    = intval($intLine);

        // Special treatment for core errors
        if($intType===E_CORE_ERROR) {

            $strLogMessage = strftime('[%Y-%m-%d %H:%M:%S]');
            if(strlen($this->Source)>0) $strLogMessage .= ' '.$this->Source;
            if($this->Code>0) $strLogMessage .= " (code ".$this->Code.") ";
            if(strlen($this->Message)>0) $strLogMessage .= ' : "'.$this->Message.'" ';
            if(strlen($this->File)>0) $strLogMessage .= " in ".$this->File." ";
            if($this->Line>0) $strLogMessage .= " at line ".$this->Line;
            $strLogMessage = trim($strLogMessage);

            $strErrorLogFilePath = implode(DIRECTORY_SEPARATOR,array(BASE_DIR,"error.log"));
            file_put_contents($strErrorLogFilePath,(file_exists($strErrorLogFilePath)?"\n":"").$strLogMessage,FILE_APPEND);

        }

        Event::Trigger("OnError",$this);

    }

    /**
     * @param string $strSource
     * @param string $strMessage
     * @param int    $intType
     * @param int    $intCode
     * @param string $strFile
     * @param int    $intLine
     * @return Error
     */
    public static function Create($strSource="Unknown",$strMessage="An error occurred",$intType=E_ERROR,$intCode=0,$strFile="",$intLine=0) {
        return new self($strSource,$strMessage,$intType,$intCode,$strFile,$intLine);
    }

    /**
     * @param string $strSource
     * @param string $strMessage
     * @param int    $intType
     * @param int    $intCode
     * @param string $strFile
     * @param int    $intLine
     * @return bool
     */
    public static function Register($strSource="Unknown",$strMessage="An error occurred",$intType=E_ERROR,$intCode=0,$strFile="",$intLine=0) {
        self::$Errors[] = new Error($strSource,$strMessage,$intType,$intCode,$strFile,$intLine);
        return false;
    }

    /**
     * @return Error[]
     */
    public static function All(){
        return self::$Errors;
    }

    /**
     * @return int
     */
    public static function Count() {
        return count(self::$Errors);
    }

    /**
     * @param string $Source
     * @return bool
     */
    public static function OccurredAny($Source){
        return count(array_intersect(array_map(function($Error){return $Error->Source;},self::$Errors),is_array($Source)?$Source:func_get_args()))>0;
    }

    /**
     * @return stdClass
     */
    public function ToStdClass(){

        $stdError = new stdClass();
        $stdError->source = $this->Source;
        $stdError->message = $this->Message;
        $stdError->type = $this->Type;
        $stdError->code = $this->Code;
        $stdError->file = $this->File;
        $stdError->line = $this->Line;

        return $stdError;

    }

}
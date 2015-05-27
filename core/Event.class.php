<?php

class Event {

    /**
     * @var array[]
     */
    private static $Bindings = array();

    /**
     * @param string $strEventType
     * @param mixed $mxdEventData
     */
    public static function Trigger($strEventType,$mxdEventData=null){
        if(isset(self::$Bindings[$strEventType])) foreach(self::$Bindings[$strEventType] as $fktHandler) call_user_func_array($fktHandler,array_slice(func_get_args(),1));
    }

    /**
     * @param string $strEventType
     * @param callback $fktHandler
     */
    public static function Bind($strEventType,$fktHandler){
        if(!isset(self::$Bindings[$strEventType])) self::$Bindings[$strEventType] = array();
        self::$Bindings[$strEventType][] = $fktHandler;
    }

} 
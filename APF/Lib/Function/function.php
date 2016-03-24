<?php
/**
*core functions of the framework
*/
/**
*@brief get or set config
*/
function C($arg1 = NULL, $arg2 = NULL)
{
   static $config = [];
   
   if (is_array($arg1)) {
        $config = array_merge($config, array_change_key_case($arg1, CASE_UPPER));
        return;
    } else if (is_string($arg1 = strtoupper($arg1))) {
        if (!is_null($arg2)) {
            $config[$arg1] = $arg2;
            return;
        }
        return isset($config[$arg1]) ? $config[$arg1] : NULL;
    } else if (is_null($arg1) && is_null($arg2)) {
        return $config;
    }
}

function GetTrace()
{
    return debug_backtrace();
}

function PR($arg)
{
    echo "<pre>";
    var_dump($arg);
    echo "</pre>";
}

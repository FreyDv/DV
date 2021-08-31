<?php


namespace ishop;


class Registry
{
    use TSingelton;

    private static $properties = [];

    public  function setProperties($name,$value): void
    {
        self::$properties[$name] = $value;
    }

    public function getProperties($name=null)
    {
        if(isset($name)){
            if(isset(self::$properties[$name])){
                return self::$properties[$name];
            }
        }
        else return self::$properties;
    }
}
<?php


namespace ishop;


trait TSingelton
{
    private static $instance;

    public static function instance(){
        if(self::$instance ===null ){
            self::$instance = new self();
        }
        return self::$instance;
    }
}
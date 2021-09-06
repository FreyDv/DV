<?php


namespace ishop;


class Router
{
    protected static $routes =[];
    protected static $route  =[];

    public static function add($reqeexp,$route =[]){
        self::$routes[$reqeexp]=$route;
    }

    public static function getRoutes(){
        return self::$routes;
    }

    public static  function  getRoute(){
        return self::$route;
    }

    public static function dispatch($url){
        if(self::matchRoute($url)){
            echo 'OK';
        }
        else{
            echo 'NO';
        }
    }

    public static function matchRoute(string $url):bool{
        foreach (self::$routes as $pattern => $route){
            if(preg_match("#{$pattern}#",$url, $math)){
                debug($math,'url');
                debug($math,'Math');
                return true;
            }
            return false;
        }
    }
}
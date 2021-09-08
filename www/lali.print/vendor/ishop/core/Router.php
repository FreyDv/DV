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
            throw new \Exception('Page not Find',404);
        }
    }

    public static function matchRoute(string $url):bool{
        foreach(self::$routes as $pattern => $route){
            if(preg_match("#{$pattern}#",$url, $matches)){
                self::$route=self::$routes[$pattern];
                foreach ($matches as $k => $v){
                    if(is_string($k)){
                        self::$route[$k] = $v;
                    }
                    if(empty(self::$route['action'])){
                        self::$route['action']='index';
                    }
                }
                return true;
            }
        }
        return false;
    }
}
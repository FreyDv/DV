<?php


namespace ishop;


class Router
{
    protected static $routes = [];
    protected static $route = [];

    public static function add($reqeexp, $route = [])
    {
        self::$routes[$reqeexp] = $route;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function getRoute()
    {
        return self::$route;
    }

    public static function dispatch($url)
    {
        if (self::matchRoute($url)) {
            $controller = 'app\controllers\\' . self::$route['prefix']. self::$route['controller'] . 'Controller';
            if (class_exists($controller)){
                $controllerObject = new $controller(self::$route);
                $action = self::loverCamelCase(self::$route['action']);
                if(method_exists($controllerObject,$action)){
                    $controllerObject->$action();
                }else{
                    throw new \Exception('Method '.$controller.':'.$action.' not find',404);
                }
            }
            else{
               throw new \Exception('Class '.$controller.' not Find', 404);
            }
        } else {
            throw new \Exception('Page not Find', 404);
        }
    }

    public static function matchRoute(string $url): bool{
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#{$pattern}#", $url, $matches)) {
                self::$route = self::$routes[$pattern];
                self::$route['controller'] = 'Main';
                self::$route['action']='index';
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        switch ($k) {
                            case 'controller':{
                                self::$route[$k] = self::upperCamelCase($v);
                                break;
                            }
                            case 'prefix':{
                                self::$route[$k] = $v;
                                break;
                            }
                            case 'action':{
                                self::$route[$k] = $v;
                                if (empty(self::$route['action'])) {
                                    self::$route['action'] = 'index';
                                }
                                break;
                            }
                        }
                    }
                }
                return true;
            }
        }
        return false;
    }


    protected static function upperCamelCase($name):string
    {   //решение с курсов
        $res = str_replace(' ','',ucwords(str_replace('-',' ',$name)));
        //мое решение
//        $res=ucfirst($name);
//        preg_match_all('#(?P<tireSymbol>-[A-Za-z])#',$res,$matches);
//        foreach ($matches as $k => $v){
//            if (is_string($k)){
//                if('tireSymbol'==$k){
//                    foreach ($v as $item => $value){
//                        $res=str_replace($value,ltrim(strtoupper($value),'-'),$res);
//                    }
//                }
//            }
//        }
        return $res;
    }
    protected static function loverCamelCase($name):string
    {
        return lcfirst(self::upperCamelCase($name)).'Action';;
    }
}
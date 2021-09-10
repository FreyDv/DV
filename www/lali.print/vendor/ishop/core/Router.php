<?php


namespace ishop;


use ishop\base\Route;

class Router
{
    /**
     * @var array
     */
    protected static array $routes = [];
    /**
     * @var Route
     */
    protected static Route $route;
    /** @return void */

    /**
     * @param string $regexp
     * @param Route $route
     */
    public static function add(string $regexp, Route $route): void
    {
        self::$routes[$regexp] = $route;
    }
    /**
     * @return array
     */
    public static function getRoutes(): array
    {
        return self::$routes;
    }

    /**
     * @return array
     */
    public static function getRoute(): Route
    {
        return self::$route;
    }
    /**
     * @param array $route
     */
    public static function setRoute(Route $route): void
    {
        self::$route = $route;
    }

    /**
     * @param $url
     * @throws \Exception
     */
    public static function dispatch($url){
        if (self::matchRoute($url)) {
            $controller = 'app\controllers\\' . self::$route->prefix. self::$route->controller . 'Controller';
            if (class_exists($controller)){
                $controllerObject = new $controller(self::$route);
                $action = self::loverCamelCase(self::$route->action);
                if(method_exists($controllerObject,$action)){
                    $controllerObject->$action();
                    $controllerObject->getView();
                }else throw new \Exception('Method '.$controller.':'.$action.' not find',404);
            } else throw new \Exception('Class '.$controller.' not Find', 404);
        } else throw new \Exception('Page not Find', 404);
    }

    /**
     * Вернет тру и масив совпадения *controller *action по шаблону в Роутах
     * @param string $url
     * @return bool
     */
    public static function matchRoute(string $url): bool{
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#{$pattern}#", $url, $matches)) {
                self::$route = self::$routes[$pattern];
                self::$route->controller = 'Main';
                self::$route->action='index';
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        switch ($k) {
                            case 'controller':{
                                self::$route->controller = self::upperCamelCase($v);
                                break;
                            }
                            case 'prefix':{
                                self::$route->prefix= $v;
                                break;
                            }
                            case 'action':{
                                self::$route[$k] = $v;
                                if (empty(self::$route->action)) {
                                    self::$route->action = 'index';
                                }
                                break;
                            }
                        }
                    }
                }return true;
            }
        }return false;
    }

    /**
     * Преобразует название контролера: первая буква в верхнем регистре а так же заменяет '-' в название контролера на камел кейс. Пример: 'main-page' => 'MainPage'
     * @param $name
     * @return string
     */
    protected static function upperCamelCase($name):string{   //решение с курсов
        return str_replace(' ','',ucwords(str_replace('-',' ',$name)));
    }

    /**
     * Преобразует название action: первая буква в нижнем регистре а так же заменяет '-' в название контролера на камел кейс. Пример: 'Main-page' => 'mainPage'
     * @param $name
     * @return string
     */
    protected static function loverCamelCase($name):string{
        return lcfirst(self::upperCamelCase($name)).'Action';;
    }




}
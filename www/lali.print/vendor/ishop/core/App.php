<?php

namespace ishop;

class App
{
    public static $app;
    public function __construct()
    {
        session_start();
        self::$app=Registry::instance();
        $this->getParams();
        new ErrorHandler(); // Обработчик ощибок
        $query = trim((string) $_SERVER['REQUEST_URI'],'/'); // обрезаю начальный слеш в сторке запроса
        Router::dispatch($query); // Запуск маршутиризатора по сайту
        return self::$app;

    }

    protected function getParams(){
        $params = require_once CONF.'/params.php';
//        var_dump($params);
        if(!empty($params)) foreach ($params as $k => $v) self::$app->setProperties($k,$v);
    }
}
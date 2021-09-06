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
        new ErrorHandler();
        $query = $_SERVER['REQUEST_URI'];
        debug($query,'query from APP');
        Router::dispatch($query);
        return self::$app;

    }

    protected function getParams(){
        $params = require_once CONF.'/params.php';
//        var_dump($params);
        if(!empty($params)) foreach ($params as $k => $v) self::$app->setProperties($k,$v);
    }
}
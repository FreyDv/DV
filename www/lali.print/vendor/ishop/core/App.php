<?php

namespace ishop;

class App
{
    public static $app;
    public function __construct()
    {
        session_start();
//        $query = $_SERVER['QUERY_STRING'];
//        echo $query;
        self::$app=Registry::instance();
        $this->getParams();
        new ErrorHandler();
        return self::$app;

    }

    protected function getParams(){
        $params = require_once CONF.'/params.php';
//        var_dump($params);
        if(!empty($params)) foreach ($params as $k => $v) self::$app->setProperties($k,$v);
    }
}
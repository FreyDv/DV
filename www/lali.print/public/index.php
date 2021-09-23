<?php
require_once dirname(__DIR__).'/config/init.php';
require_once  LIBS.'/functions.php';
require_once  CONF.'/routes.php';
//

new ishop\App();
\ishop\App::$app->setProperties('test','test');
//site_ini();
//debug(\ishop\Router::getRoute(),'Route');
//debug(\ishop\Router::getRoutes(),'DEF');

//throw new Exception('fgdfgdfg',404);
//debug(dirname(__DIR__).'/public/errors/web404_2/index.php');


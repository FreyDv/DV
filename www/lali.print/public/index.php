<?php
require_once dirname(__DIR__).'/config/init.php';
require_once  LIBS.'/functions.php';
//
//site_ini();

new ishop\App();
\ishop\App::$app->setProperties('test','test');
debug(ishop\App::$app->getProperties());


?>

<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Document</title>-->
<!--    <style>-->
<!--        body{-->
<!--            background-color: black;-->
<!--            color: #d2ddff;-->
<!--        }-->
<!--    </style>-->
<!--</head>-->
<!--<body  >-->
<!--<h1 align="center">Hello World Ebat</h1>-->
<!--</body>-->
<!--</html>-->
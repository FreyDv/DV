<?php


namespace app\controllers;
use app\models\AppModel;
use ishop\base\Controller;
use ishop\base\type\Route;

class AppController extends  Controller
{
    public function __construct(Route $route)
    {
        parent::__construct($route);
        new AppModel();
    }
}
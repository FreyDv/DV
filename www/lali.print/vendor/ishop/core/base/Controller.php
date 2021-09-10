<?php


namespace ishop\base;


abstract class Controller
{

    public Route $route;
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout ='';
    public $data= [];
    public $meta= [];

    public function __construct(Route $route)
    {
        $this->route      = $route;
        $this->controller = $route->controller;
        $this->model      = $route->controller;
        $this->view       = $route->action;
        $this->prefix     = $route->prefix;
    }

    public function getView(){
        $viewObject = new View($this->route,$this->layout,$this->view,$this->meta);
        $viewObject->render($this->data);
    }

    public function set(array $data): void
    {
        $this->data = $data;
    }
    public function setMeta(string $title='',string $desc='',string $keywords=''): void
    {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }

}
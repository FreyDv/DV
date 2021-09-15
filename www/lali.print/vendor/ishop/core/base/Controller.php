<?php


namespace ishop\base;


use ishop\base\type\Meta;
use ishop\base\type\Route;

abstract class Controller
{

    public Route $route;
    public string $controller;
    public string $model;
    public string $view;
    public string $prefix;
    public string $layout ='';
    public array $data= [];
    public Meta $meta;

   public function __construct(Route $route)
    {
        $this->route      = $route;
        $this->controller = $route->controller;
        $this->model      = $route->controller;
        $this->view       = $route->action;
        $this->prefix     = $route->prefix;
        $this->meta = new Meta();
    }

    /**
     * @throws \Exception
     */
    public function getView(){
        $viewObject = new View($this->route,$this->layout,$this->view,$this->meta);
        $viewObject->render($this->data);
        $viewObject->getMeta();
    }

    public function set(array $data): void
    {
        $this->data = $data;
    }
    public function setMeta(string $title='',string $desc='',string $keywords=''): void
    {
        $this->meta->title = $title;
        $this->meta->description = $desc;
        $this->meta->keywords= $keywords;
    }

}
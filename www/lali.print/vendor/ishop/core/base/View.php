<?php


namespace ishop\base;


use ishop\base\type\Meta;
use ishop\base\type\Route;


class View
{

    public Route $route;
    public string $controller;
    public string $model;
    public string $view;
    public string $prefix;
    public string $layout;
    public array $data= [];
    public Meta $meta;


    //
    public function __construct(Route $route,string $layout = '',string $view='',Meta $meta=null)
    {
        $this->route      = $route;
        $this->controller = $route->controller;
        $this->model      = $route->controller;
        $this->view       = $view;
        $this->prefix     = $route->prefix;
        $this->meta       = $meta;
        if($layout===false){ // в случаях когда в action  указали фолс для предачи ajax запроса без шаблона
            $this->layout=false;
        }
        else{
            $this->layout = $layout ?:LAYOUT; // если был передано название шаблона мы его берем
            // а если пустая строка тогда берем шаблон с константы
        }
    }

    /**
     * @throws \Exception
     */
    public function render($data){

        if(is_array($data)){
            extract($data); // распаковывает масив после функции compact и позволяет пользоватьтся данными как переменными а не как масивом
        }
       $viewFile = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";
       if(is_file($viewFile)) {
           ob_start();
           require_once $viewFile; //
           $content = ob_get_clean();
       }
       else{
            throw new \Exception("Not Find view {$viewFile}",500);
       }

       if(false!==$this->layout){  //шаблон
            $layoutFile = APP."/views/layouts/{$this->layout}.php";
            if(is_file($layoutFile)){
                require_once $layoutFile;
            }
            else{
                throw new \Exception("NOT FIND LAYOUT",500);
            }
        }
    }

    public function getMeta(){
        echo $this->meta->formatData();
    }
}
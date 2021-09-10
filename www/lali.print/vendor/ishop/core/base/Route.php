<?php


namespace ishop\base;


class Route
{
    public function __construct($prefix='',$controller='Main',$action= 'index')
    {
        $this->prefix=$prefix;
        $this->controller=$controller;
        $this->action=$action;
    }

    public string $prefix;
    public string $controller;
    public string $action;
}
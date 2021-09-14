<?php


namespace ishop\base\type {


    class Route
    {
        public string $prefix;
        public string $controller;
        public string $action;

        public function __construct($prefix='',$controller='Main',$action= 'index')
        {
            $this->prefix=$prefix;
            $this->controller=$controller;
            $this->action=$action;
        }

    }
}
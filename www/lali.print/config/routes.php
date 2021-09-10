<?php
 use ishop\Router;
 use ishop\base\Route;
 //default rutes

Router::add('^admin$',new Route('admin','Main','index'));
Router::add('^admin/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$',new Route('admin'));
Router::add('^$',new Route('','Main','index'));
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$',new Route());
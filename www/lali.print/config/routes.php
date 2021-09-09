<?php
 use ishop\Router;

 //default rutes

Router::add('^admin$', ['controller'=>'Main','action' => 'index','prefix'=> 'admin']);
Router::add('^admin/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$',["prefix"=>'admin']);
Router::add('^$',['controller'=>'Main','action' => 'index',"prefix"=>'']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$',["prefix"=>'']);
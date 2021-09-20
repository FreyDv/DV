<?php


namespace app\controllers;


use ishop\App;
use ishop\base\type\Meta;
use ishop\Cache;
use RedBeanPHP\R;


class MainController extends AppController
{
    public function indexAction()
    {
        $posts = R::findAll('test');
        $this->meta->title = App::$app->getProperties('shop_name').' Печать на одежде';
        $this->meta->description = 'Изготовление рисунков надпесей на вещах собственого пошива. Дарим возможность быть собой!';
        $this->meta->keywords = 'Одежда, Худи, Ричунок, Принт';
        $this->setMeta($this->meta->title,$this->meta->description,$this->meta->keywords);


        $names = array('Daniil','Valeria','Anna','Tatiana');
        //$cache = Cache::set('ArrayOfNames',$names);

        $data = Cache::get('ArrayOfNames');
        Cache::delete('ArrayOfNames');
        if (!$data){
            Cache::set('ArrayOfNames',$names);
            $data = Cache::get('ArrayOfNames');
        }

        // $this->set(compact('name','age'));   // передача данных в views из action
        // compact берет переменую и засовывает ее название в ключ масива а значение переменной в значение масива под ключом
    }
}

/*
@supports (content-visibility: hidden) {
    body:not(.settings_loaded) {
        content-visibility: hidden;
            }
        }
        @supports not (content-visibility: hidden) {
    body:not(.settings_loaded) {
        visibility: hidden;
    }
        }
*/
<?php


namespace app\controllers;


use ishop\App;
use ishop\base\type\Meta;
use RedBeanPHP\R;


class MainController extends AppController
{
    public function indexAction()
    {
        $posts = R::findAll('test');
        $this->meta->title = App::$app->getProperties('shop_name').' индивидуальный принт и подход';
        $this->meta->description = 'Изготовление рисунков надпесей на вещах собственого пошива. Дарим возможность быть собой!';
        $this->meta->keywords = 'Одежда, Худи, Ричунок, Принт';
        $this->setMeta($this->meta->title,$this->meta->description,$this->meta->keywords);



        $name =debug(name: 'Lera');
        $age = debug(name: '23');
        $this->set(compact('name','age'));   // передача данных в views из action
        // compact берет переменую и засовывает ее название в ключ масива а значение переменной в значение масива под ключом
    }
}
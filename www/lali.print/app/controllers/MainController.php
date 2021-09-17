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


        $names = ['Andrey','Kiril','Foma','Ihor','Geka','Daniil'];
        $name ='Lera';
        $age = 23;
//        $this->set(['name'=>'Brus','age'=>30]);
        $this->set(compact('name','age','names'));



    }
}
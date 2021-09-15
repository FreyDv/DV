<?php


namespace app\controllers;


class PageController extends AppController
{

   public function seyHelloAction()
   {
       $cars = [
           '0'=>[
               'name'=>'BMW',
               'litrag' =>2.5,
               'Cusov' => 'Pasat',
               ],
           '1'=>[
                'name'=>'Renualt',
                'litrag' =>1.2,
                'Cusov' => 'Cross-Over',
                ],
           '2'=>[
               'name'=>'Mitsubisi',
               'litrag' =>3,
               'Cusov' => 'cupe',
           ]
       ];
       $name ='Lera';
       $age = 23;
       $this->set(compact('name','age','cars'));
       echo 'Hello World from PageController and seyHelloAction';
   }
}
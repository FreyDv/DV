<?php


namespace ishop;


use RedBeanPHP\R;

class Db
{
    use TSingelton;

    public \ishop\base\type\DB $db;
    protected function __construct()
    {
        $this->db = require_once CONF .'/config_db.php';
        debug($this->db);
//        R::setup($this-);



    }
}
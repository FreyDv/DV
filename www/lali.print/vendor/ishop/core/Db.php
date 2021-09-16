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
        debug($this->db->getDSN());
        R::setup($this->db->getDSN(),$this->db->user,$this->db->pass);
        if(R::testConnection()){
            debug(name: 'Connection Successful');
        }
        else throw new \Exception('No Connection with DataBase',500);
    }
}
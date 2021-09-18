<?php

namespace ishop;

use mysql_xdevapi\Exception;
use mysqli;
use PDO;
use RedBeanPHP\QueryWriter\MySQL;
use RedBeanPHP\R;

class Db
{
    use TSingelton;

    public \ishop\base\type\DB $db;

    protected function __construct()
    {
        $this->db = require_once CONF .'/config_db.php';

        R::setup($this->db->getDSN(),$this->db->user,$this->db->pass);
        if(!R::testConnection())throw  new Exception('Filed Connection with DataBase',500);
        R::freeze( true );
        if (DEBUG){
            R::debug(true,1);
        }
    }
}
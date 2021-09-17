<?php


namespace ishop\base\type;


class DB
{
    public string $mysqlHost;
    public string $dbname;
    public string $charset;
    public string $user;
    public string $pass;

    public function __construct($mysqlHost=null,$dbname=null,$charset=null,$user=null,$pass=null){
        $this->mysqlHost= $mysqlHost ?: 'mysql';
        $this->dbname= $dbname ?: 'ishop2';
        $this->charset= $charset ?: 'utf8';
        $this->user= $user ?: 'root';
        $this->pass= $pass ?: 'secret';
    }

    public function getDSN(): string
    {
        return "mysql:host=$this->mysqlHost;dbname=$this->dbname;charset=$this->charset";
    }

}
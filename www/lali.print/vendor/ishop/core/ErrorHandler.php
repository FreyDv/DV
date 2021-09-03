<?php


namespace ishop;


use Throwable;

class ErrorHandler
{
    public function __construct()
    {
        if(DEBUG){
           error_reporting(-1);
        }
        else error_reporting(0);

        set_exception_handler([$this,'exceptionHandler']);
    }

    public function exceptionHandler(Throwable $e){
        $this->logErrors($e->getMessage(),$e->getFile(),$e->getLine());
        $this->displayError('Exception',$e->getMessage(),$e->getFile(),$e->getLine(),$e->getCode());
    }

    protected  function  logErrors($massage = '', $file = '', $line=''){
        error_log("[".date('Y-m-d H:i:s')."] Error message: {$massage} | FILE: {$file} | line {$line}
        \n================================\n",3,ROOT.'/tmp/errors.log');
    }

    protected function displayError($errno,$errstr,$errfile,$errline,$responce=404){
        http_response_code($responce);
        if($responce==404&&!DEBUG){
            require WWW . '/errors/web404_1/index.php';
            die;
        }
        if(DEBUG){
            require  WWW.'/errors/dev.php';
        }else require WWW.'/errors/prod.php';
    }
}
<?php

define("DEBUG",1);
define("ROOT",dirname(__DIR__));
define("WWW",ROOT.'/public');
define("APP",ROOT.'/app');
define("CORE",ROOT.'/vendor/ishop/core');
define("LIBS",ROOT.'/vendor/ishop/core/libs');
define("CACHE",ROOT.'/tmp/cache');
define("CONF",ROOT."/config");
define("LAYOUT",'default');


$app_path= "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
$app_path = preg_replace("#[^/]+$#",'',$app_path);
$app_path = substr_replace($app_path,'',strripos($app_path,'/'));

define("PATH", $app_path);
define("ADMIN", $app_path.'/admin');


//  docker ps
//  docker exec -it 66666666 /bin/bash
//  cd /var/www/lali.print/
//  composer  dumpautoload     или   composer install
//
require_once ROOT."/vendor/autoload.php";


function site_ini(){
    echo 'PATH'." - ".PATH.'<br>';
    echo 'ADMIN'." - ".ADMIN.'<br>';
    echo  '<table border="1", bordercolor="red">';
    echo "<tbody>";
    echo "<tr>"."<td>".'DEBUG'.'</td>'."<td>".DEBUG.'</td>'.'</tr>';
    echo "<tr>"."<td>".'ROOT'.'</td>'."<td>".ROOT.'</td>'.'</tr>';
    echo "<tr>".'<td>'.'WWW'.'</td>'."<td>".WWW.'</td>'.'</tr>';
    echo "<tr>".'<td>'.'APP'.'</td>'."<td>".APP.'</td>'.'</tr>';
    echo "<tr>".'<td>'.'CORE'.'</td>'."<td>".CORE.'</td>'.'</tr>';
    echo "<tr>".'<td>'.'LIBS'.'</td>'."<td>".LIBS.'</td>'.'</tr>';
    echo "<tr>".'<td>'.'CACHE'.'</td>'."<td>".CACHE.'</td>'.'</tr>';
    echo "<tr>".'<td>'.'CONF'.'</td>'."<td>".CONF.'</td>'.'</tr>';
    echo "<tr>".'<td>'.'LAYOUT'.'</td>'."<td>".LAYOUT.'</td>'.'</tr>';
    echo "<tr>".'<td>'.'PATH'.'</td>'."<td>".PATH.'</td>'.'</tr>';
    echo "<tr>".'<td>'.'ADMIN'.'</td>'."<td>".ADMIN.'</td>'.'</tr>';
//    echo '<tr>'.'<td>'.''.'</td>'."<td>"..'</td>'.'</td>';
    echo "</tbody>";
    echo  '</table>';




}

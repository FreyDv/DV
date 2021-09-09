<?php

function debug($arr,$name=null){
    $x =  '<pre>'.print_r($arr,true) . '</pre>';
    $resultsCool = debug_backtrace();
    preg_match('/[a-zA-Z]+.[a-z]+$/',$resultsCool[0]['file'],$match);
    $xfile = $match[0];
    $xline = $resultsCool[0]['line'];
    echo '<br>';
    echo '<table border="1", bordercolor="blue" rules= all cellpadding = "2">';
    echo "<tbody>";
    echo '<tr>'."<td>".$xfile."  |  ".$xline.' | '.$name.'</td>'.'</tr>';
    echo '<tr>'."<td><b>".$x.'</b></td>'.'</tr>';
    echo "</tbody>";
    echo  '</table>';
}


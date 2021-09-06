<?php

function debug($arr,$name=null){
    $x =  '<pre>'.print_r($arr,true) . '</pre>';

    echo '<br>';
    echo  '<table border="1", bordercolor="blue" rules= all cellpadding = "2">';
    echo "<tbody>";
    echo '<tr>'."<td>".$name.'</td>'.'</tr>';
    echo '<tr>'."<td><b>".$x.'</b></td>'.'</tr>';
    echo "</tbody>";
    echo  '</table>';
}
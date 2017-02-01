<?php
$conexio;
function conectar_bd()
{
    global $conexio;
    $elUsr = "root";
    $elPw  = "";
    $elServer ="localhost:3306";
    $laBd = "finsamex";
    $conexio = mysql_connect($elServer, $elUsr , $elPw) or die (mysql_error());
    mysql_select_db($laBd, $conexio ) or die (mysql_error());
}   
?>

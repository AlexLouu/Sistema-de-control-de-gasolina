
<?php
$conexio = mysql_connect("localhost","root","");
if(!$conexio)
{
die('La conexión no se ha realizado correctamente'. mysql_error());
}
mysql_select_db("finsamex", $conexio);
?>
<?php
session_start();
$a=$_SESSION['uid'];
if( isset($_SESSION["uid"])){
?>
<html>
<head>
<meta charset="UTF-8">
 <title>ELIMINA AUTOMOVIL2</title>
</head>
<body>
 <?php
 include("conectar_bd.php");
 $cla = $_REQUEST ["id"];
 $query = "DELETE FROM mensaje  WHERE id='$cla'";
 if (mysql_query($query, $conexio)){
 echo " <script>
			alert ('El registro se ha eliminado satisfactoriamente');
			document.location='blank.php';
			</script>";
 }else{
 echo " <script>
			alert ('El registro no se ha podido eliminar');
			document.location='blank.php';
			</script>";
 }
 ?>
 <meta http-equiv="refresh" content="3;url=http://localhost/gasolinaCarros/catalogos2/introcoches.php"> 
</body>
</html>
<?php
} else {
	echo "<meta http-equiv=refresh content=0;url=http://localhost/web/index.html>";
	}
?>

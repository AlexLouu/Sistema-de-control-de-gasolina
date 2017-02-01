<?php
include ("Database.php");
$connect=Database::getConexion();
if ($connect) {
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellido'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$direccion = $_POST['direccion'];
		$producto = $_POST['producto'];
		$descripcion = $_POST['descripcion'];

		$consulta="INSERT INTO mensaje (nombre,apellidos,telefono,email,direccion,producto,descripcion,
			estado) VALUES ('$nombre','$apellidos','$telefono','$email','$direccion','$producto',
			'$descripcion','pendiente')";
		
		$resultado=mysqli_query($connect,$consulta);
		
		if ($resultado) {
			echo " <script>
			alert ('El registro se llevo a cabo correctamente ...');
			document.location='index.html';
			</script>";
		}
		else {
			echo " <script>
			alert ('Error en la ejecución de la consulta ...');
			document.location='index.html';
			</script>";
		}
		
		if (mysqli_close($connect)){ 
			echo "desconexion realizada. <br />";
		} 
		else {
			echo " <script>
			alert ('Error en la conexión...');
			document.location='index.html';
			</script>";
		}
}

/*function mostrarDatos ($resultados) {
if ($resultados !=NULL) {
echo "- Primer nombre: ".$resultados['Primer Nombre']."<br/> ";
echo "- Segundo nombre: ".$resultados['Segundo Nombre']."<br/>";
echo "- Primer apellido: ".$resultados['Primer Apellido']."<br/>";
echo "- Segundo apellido: ".$resultados['Segundo Apellido']."<br/>";
echo "- Nombre de acudiente: ".$resultados['Nombre Acudiente']."<br/>";
echo "- Fecha de nacimiento : ".$resultados['Fecha Nacimiento']."<br/> ";
echo "- codigo: ".$resultados['Codigo']."<br/>";
echo "- sexo: ".$resultados['Sexo']."<br/>";
echo "- grado: ".$resultados['Grado']."<br/>";
echo "- ingreso: ".$resultados['Fecha Ingreso']."<br/>";
echo "- index: ".$resultados['index']."<br/>";

echo "**********************************<br/>";}
else {echo "<br/>No hay más datos!!! <br/>";}
}
$link = mysqli_connect($servername,$username,$password);
mysqli_select_db($link, $dbname);
$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
$result = mysqli_query($link, "SELECT * FROM Alumnos");
while ($fila = mysqli_fetch_array($result)){
mostrarDatos($fila);
}
mysqli_free_result($result);
mysqli_close($link);*/
?>
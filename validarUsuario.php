<?php
 session_start();
    //conectar BD
    include("conectar_bd2.php");  
    conectar_bd();
     
    $usr = $_POST['usuario'];
    $pw = $_POST['password'];
    //Obtengo la version encriptada del password
    $pw_enc = md5($pw);
     
    $sql = "SELECT * FROM usuario
            WHERE usuario = '".$usr."'
            AND password ='".$pw."' ";
//old_password para desencriptar			
    $result =mysql_query($sql,$conexio); 

    $uid = "";
     
    //Si existe al menos una fila
    if( $fila=mysql_fetch_array($result) )
    {    
		if($fila["tipo"]=="A")
		{
		$_SESSION['tipo']="A";
        //Obtener el Id del usuario en la BD        
        $uid = $fila['id'];
		$tipo = $fila['tipo'];
        //Iniciar una sesion de PHP
        
        //Crear una variable para indicar que se ha autenticado
        $_SESSION['autenticado']    = 'SI';
        //Crear una variable para guardar el ID del usuario para tenerlo siempre disponible
        $_SESSION['uid'] = $uid;
		$_SESSION['usr'] = $usr;
        //CODIGO DE SESION
         echo '<meta http-equiv="refresh" content="0;url=bs-siminta-admin/index.php">';
        //Crear un formulario para redireccionar al usuario y enviar oculto su Id 

        
}
    else if ($fila["tipo"]=="B"){
	$_SESSION['tipo']="B";
        //Obtener el Id del usuario en la BD        
        $uid = $fila['id'];
		$tipo = $fila['tipo'];
        //Iniciar una sesion de PHP
        
        //Crear una variable para indicar que se ha autenticado
        $_SESSION['autenticado']    = 'SI';
        //Crear una variable para guardar el ID del usuario para tenerlo siempre disponible
        $_SESSION['uid'] = $uid;
		$_SESSION['usr'] = $usr;
        //CODIGO DE SESION
         echo '<meta http-equiv="refresh" content="0;url=administrador.php">';
        //Crear un formulario para redireccionar al usuario y enviar oculto su Id 

        
   //echo '<meta http-equiv="refresh" content="0;url=negado.html">';
	}
	else{
	$_SESSION['tipo']="C";
        //Obtener el Id del usuario en la BD        
        $uid = $fila['id'];
		$tipo = $fila['tipo'];
        //Iniciar una sesion de PHP
        
        //Crear una variable para indicar que se ha autenticado
        $_SESSION['autenticado']    = 'SI';
        //Crear una variable para guardar el ID del usuario para tenerlo siempre disponible
        $_SESSION['uid'] = $uid;
		$_SESSION['usr'] = $usr;
        //CODIGO DE SESION
         echo '<meta http-equiv="refresh" content="0;url=usuarios.php">';
        //Crear un formulario para redireccionar al usuario y enviar oculto su Id 

        
   //echo '<meta http-equiv="refresh" content="0;url=negado.html">';
	}
	}

    else {
	
        //En caso de que no exista una fila...
        //..Crear un formulario para redireccionar al usuario a la pagina de login 
        //enviandole un codigo de error
echo '<meta http-equiv="refresh" content="0;url=negado.html">';

    }
	?>


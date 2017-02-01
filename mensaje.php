<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class mensaje
{
                private $_id;
		private $_nombre;
		private $_apellidos;
		private $_telefono;
		private $_correo;
		private $_direccion;
		private $_producto;
		private $_estado;
    
    function __construct()
		{
			$this ->_id=0;
			$this ->_nombre="";
			$this ->_apellidos="";
			$this ->_telefono="";
			$this ->_correo="";
			$this ->_direccion="";
			$this ->_producto="";
			$this ->_estado="";
			
			
		}
                function get_id() {
                    return $this->_id;
                }

                function get_nombre() {
                    return $this->_nombre;
                }

                function get_apellidos() {
                    return $this->_apellidos;
                }

                function get_telefono() {
                    return $this->_telefono;
                }

                function get_correo() {
                    return $this->_correo;
                }

                function get_direccion() {
                    return $this->_direccion;
                }

                function get_producto() {
                    return $this->_producto;
                }

                function get_estado() {
                    return $this->_estado;
                }

                function set_id($_id) {
                    $this->_id = $_id;
                }

                function set_nombre($_nombre) {
                    $this->_nombre = $_nombre;
                }

                function set_apellidos($_apellidos) {
                    $this->_apellidos = $_apellidos;
                }

                function set_telefono($_telefono) {
                    $this->_telefono = $_telefono;
                }

                function set_correo($_correo) {
                    $this->_correo = $_correo;
                }

                function set_direccion($_direccion) {
                    $this->_direccion = $_direccion;
                }

                function set_producto($_producto) {
                    $this->_producto = $_producto;
                }

                function set_estado($_estado) {
                    $this->_estado = $_estado;
                }
                public static function validarUsuario()
		{
			try
			{
				$db=Db::getConexion();
				$sql="INSERT INTO mensaje value(nombre=?,apellidos=?,telefono=?,email=?,direccion=?,producto=?,estado=?)";
				if (!$stmt=$db->prepare($sql))
					throw new Exception ("Error al preparar la sentencia".$db->error);
				$stmt->bind_param('ss',  $this->_id,  $this->_apellidos,$this->_telefono,$this->_correo,$this->_direccion,$this->_producto,'pendiente');
				if (!$stmt->execute())
					throw new Exception ("error al ejecutar la sentencia".$db->error);
				$stmt ->bind_result($nombre,$correo,$contrasenia);
				$stmt->fetch();
				if (!empty($correo))
				{
					$administrador= new Administrador();
					$administrador->setNombre($nombre);
					$administrador->setCorreo($correo);
					$administrador->setcontrasenia($contrasenia);
					$stmt->close();
					return $administrador;
				}
				else
					return null;
			}
			catch (Exception $e)
			{
				echo "Archivo:".$e->getFile()."Linea:".$e->getLine()."Descripcion".$e->getMessage();
				return null;
			}
		}
     
}

?>
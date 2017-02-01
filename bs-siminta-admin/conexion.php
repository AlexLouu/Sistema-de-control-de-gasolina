<?php
class Database
 {
    public static function getConexion() {
        $conexion = new mysqli("localhost", "root", "", "finsamex");
        if ($conexion->connect_errno)
            throw new Exception(" " . $conexion->connect_error);
        $conexion->set_charset("utf8");

        return $conexion;
   }
}

	Database::getConexion();
?>
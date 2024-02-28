<?php
//realizar la conexion a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$basedatos = "parking_plus_db";

// Crear una nueva conexion
$conexion = new mysqli($servername, $username, $password, $basedatos);

//verificar la conexion
if ($conexion->connect_error) {
    die("La conexion a la base de datos tuvo un error: " . $conexion->connect_error);
}

<?php
$host = 'localhost';
$usuario = 'root';
$contrasena = '';
$base_de_datos = 'proyecto';
$puerto='3306';

$conexion = mysqli_connect($host, $usuario, $contrasena, $base_de_datos,$puerto);

if (!$conexion) {
  die('Error al conectar a la base de datos: ' . mysqli_connect_error());
}
?>
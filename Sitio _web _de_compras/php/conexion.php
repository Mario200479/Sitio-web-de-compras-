<?php
$host = "localhost";       // o 127.0.0.1
$usuario = "root";         // tu usuario de MySQL
$clave = "";               // tu contraseña de MySQL (vacía por defecto en XAMPP)
$base_de_datos = "mi_tienda";  // el nombre de tu base de datos

$conexion = mysqli_connect($host, $usuario, $clave, $base_de_datos);

// Verificar conexión
if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}
?>

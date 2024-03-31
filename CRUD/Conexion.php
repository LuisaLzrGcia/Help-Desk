<?php
if (session_status() != 2) {
    session_start();
}// Datos de conexión a la base de datos
$host = "localhost"; // Host de la base de datos
$usuario = "root"; // Usuario de la base de datos
$contrasena = "19081411"; // Contraseña de la base de datos
$base_de_datos = "helpdesk"; // Nombre de la base de datos

// Intentar conectarse a la base de datos
$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar si hay errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
} else {
    // Si quieres ver un mensaje de conexión exitosa, descomenta la siguiente línea
    // echo "Conexión exitosa a la base de datos.<br>";
}

?>
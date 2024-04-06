<?php

// Verifica si los datos POST han sido enviados antes de intentar acceder a ellos
if (isset($_POST['paterno'], $_POST['materno'], $_POST['nombre'], $_POST['fechaNacimiento'], $_POST['sexo'], $_POST['telefono'], $_POST['correo'], $_POST['usuario'], $_POST['password'], $_POST['idRol'], $_POST['ubicacion'])) {

  // Crear el array de datos
  $datos = array(
    "paterno" => $_POST['paterno'],
    "materno" => $_POST['materno'],
    "nombre" => $_POST['nombre'],
    "fechaNacimiento" => $_POST['fechaNacimiento'],
    "sexo" => $_POST['sexo'],
    "telefono" => $_POST['telefono'],
    "correo" => $_POST['correo'],
    "usuario" => $_POST['usuario'],
    "password" => $_POST['password'],
    "idRol" => $_POST['idRol'],
    "ubicacion" => $_POST['ubicacion']
  );

  // Incluir el archivo de la clase Usuarios
  include "../usuarios.php";

  // Crear una instancia de la clase Usuarios
  $Usuarios = new Usuarios();

  // Llamar al método agregarNuevoUsuarios() y mostrar el resultado
  echo $Usuarios-> agregarNuevoUsuario($datos);
} else {
  echo "Error: Datos POST faltantes";
}


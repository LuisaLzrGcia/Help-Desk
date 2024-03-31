<?php
include_once ("../Conexion.php");
// Verificar si se han enviado los datos del formulario
if (isset($_POST['login']) && isset($_POST['password'])) {
    // Obtener usuario y contraseña del formulario
    $usuario = ($_POST['login']);
    $password = sha1($_POST['password']);


    // // Incluir el archivo de la clase Usuarios
    include ("../Clases/Usuarios.php");

    // // Instanciar la clase Usuarios
    $Usuarios = new Usuarios();

    // // Intentar iniciar sesión
    $login_result = $Usuarios->loginUsuarios($usuario, $password);
    //echo '<script>alert("hola")</script>';

    // Verificar si el inicio de sesión fue exitoso
    if ($login_result == 1) {
        // Redireccionar a inicio.php
        header("Location: ../vistas/inicio.php");
        exit; // Salir del script para evitar ejecución adicional
    } else {
        // Mostrar mensaje de error
        echo "Error: Usuario o contraseña incorrectos.";
    }
} else {
    // Manejar el caso en que los datos del formulario no se hayan enviado correctamente
    echo "Error: Datos de inicio de sesión no recibidos correctamente.";
}
?>
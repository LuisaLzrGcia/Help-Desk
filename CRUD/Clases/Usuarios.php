<?php
include_once "../Conexion.php"; // Agregar "once" para evitar problemas de inclusión múltiple.
if (session_status() != 2) {
    session_start();
}
class Usuarios
{
    public function loginUsuarios($usuario, $password)
    {
        global $conexion; // Acceder a la conexión establecida fuera de la clase

        $sql = "SELECT * FROM t_usuarios 
                WHERE usuario = '$usuario' AND password = '$password'";
        //echo '<script>alert("' . $sql . '")</script>';
        $respuesta = mysqli_query($conexion, $sql);

        if ($respuesta && mysqli_num_rows($respuesta) > 0) {
            $datosUsuario = mysqli_fetch_array($respuesta);
            $_SESSION['usuario']['nombre'] = $datosUsuario['usuario'];
            $_SESSION['usuario']['id'] = $datosUsuario['id_usuario'];
            $_SESSION['usuario']['rol'] = $datosUsuario['password'];
            return 1;
        } else {
            return 0;
        }
    }
}
?>
<?php
include "../Conexion.php"; // Agregar "once" para evitar problemas de inclusión múltiple.

class Usuarios
{
    public function loginUsuarios($usuario, $password)
    {
        if (session_status() != 2) {
            session_start();
        }

        global $conexion; // Acceder a la conexión establecida fuera de la clase

        $sql = "SELECT * FROM t_usuarios 
                WHERE usuario = '$usuario' AND password = '$password'";
        $respuesta = mysqli_query($conexion, $sql);

        if ($respuesta && mysqli_num_rows($respuesta) > 0) {
            $datosUsuario = mysqli_fetch_array($respuesta);
            $_SESSION['usuario']['nombre'] = $datosUsuario['usuario'];
            $_SESSION['usuario']['id'] = $datosUsuario['id_usuario'];
            $_SESSION['usuario']['rol'] = $datosUsuario['id_rol'];
            return true;
        } else {
            return false;
        }
    }

    public function agregarNuevoUsuario($datos)
    {
        global $conexion;

        // Preparar la consulta SQL para insertar un nuevo usuario
        $query = "INSERT INTO t_usuarios (id_rol, id_persona, usuario, password, ubicacion) VALUES (?, ?, ?, ?, ?)";

        // Preparar la sentencia
        $stmt = $conexion->prepare($query);
        if (!$stmt) {
            return "Error al preparar la consulta: " . $conexion->error;
        }

        // Extraer datos del array $datos
        $idRol = $datos['idRol'];
        // Aquí puedes extraer los demás datos necesarios

        // Ejecutar la consulta
        $stmt->bind_param("iisss", $idRol, /* Aquí otros parámetros */);
        $result = $stmt->execute();

        if ($result) {
            // Redirigir a inicio.php
            header("Location: ../vistas/usuarios.php");
            exit(); // Importante para detener la ejecución después de la redirección
        } else {
            return "Error al agregar el usuario: " . $conexion->error;
        }
    }

    // public function agregarPersona($datos)
    // {
    //     global $conexion;

    //     if ($conexion) {
    //         $sql = "INSERT INTO t_persona (paterno, materno, nombre, fecha_nacimiento, sexo, telefono, correo) 
    //                 VALUES (?, ?, ?, ?, ?, ?, ?)";
    //         $query = $conexion->prepare($sql);
    //         $query->bind_param("sssssss", $datos['paterno'], $datos['materno'], $datos['nombre'], $datos['fechaNacimiento'], $datos['sexo'], $datos['telefono'], $datos['correo']);
    //         $respuesta = $query->execute();
    //         $idPersona = $query->insert_id();
    //         $query->close();
    //         return $idPersona;
    //     } else {
    //         return false;
    //     }
    // }
}


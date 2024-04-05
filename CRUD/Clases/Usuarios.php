<?php
include_once "../Conexion.php"; // Agregar "once" para evitar problemas de inclusión múltiple.

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
        //echo '<script>alert("' . $sql . '")</script>';
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

    public function agregarNuevoUsuarios($datos)
    {
        $conexion = Conexion::conectar(); // Suponiendo que esto devuelve una instancia válida de conexión

        if ($conexion) {
            $idPersona = $this->agregarPersona($datos); // Llamada al método para agregar una persona

            if ($idPersona > 0) {
                $sql = "INSERT INTO t_usuario (id_rol, id_persona, usuario, password, ubicacion) 
                        VALUES (?, ?, ?, ?, ?)";
                $query = $conexion->prepare($sql);
                $query->bind_param("iisss", $datos['idRol'], $idPersona, $datos['usuario'], $datos['password'], $datos['ubicacion']);
                $respuesta = $query->execute();
                $query->close();
                return $respuesta;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function agregarPersona($datos)
    {
        $conexion = Conexion::conectar(); // Suponiendo que esto devuelve una instancia válida de conexión

        if ($conexion) {
            $sql = "INSERT INTO t_persona (paterno, materno, nombre, fecha_nacimiento, sexo, telefono, correo) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";      
            $query = $conexion->prepare($sql);
            $query->bind_param("sssssss", $datos['paterno'], $datos['materno'], $datos['nombre'], $datos['fechaNacimiento'], $datos['sexo'], $datos['telefono'], $datos['correo']);
            $respuesta = $query->execute();
            $idPersona = $query->insert_id();
            $query->close();
            return $idPersona;
        } else {
            return false;
        }
    }
}
?>

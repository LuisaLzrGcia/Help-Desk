<?php>
if (session_status() !== PHP_SESSION_ACTIVE)
session_start();
  include "../../clases/Conexion.php";
  $con = new Conexion();
  $conexion = $con->conectar();
  $sql = "SELECT 
  usuarios.id_usuario AS idUsuario,
  usuarios.usuario AS nombreUsuario,
  roles.nombre AS rol,
  usuarios.id_rol AS idRol,
  usuarios.ubicacion AS ubicacion,
  usuarios.activo AS estatus,
  usuarios.id_persona AS idPersona,
  persona.nombre AS nombrePersona,
  persona.paterno AS paterno,
  persona.materno AS materno,
  persona.fecha_nacimiento AS fechaNacimiento,
  persona.sexo AS sexo,
  persona.correo AS correo,
  persona.telefono AS telefono
FROM
  t_usuarios AS usuarios
      INNER JOIN
  t_cat_roles AS roles ON usuarios.id_rol = roles.id_rol
      INNER JOIN
  t_persona AS persona ON usuarios.id_persona = persona.id_persona;"  
<?>

<table class="table table-sm">
    <thead>

    </thead>
    <body>
        <tr>

        </tr>
    </body>
</table>
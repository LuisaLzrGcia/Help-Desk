<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include_once "../Conexion.php";

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
            t_persona AS persona ON usuarios.id_persona = persona.id_persona";
$respuesta = mysqli_query($conexion, $sql); // Ejecutar la consulta SQL

?>

<table class="table table-sm" id="tablaUsuariosDataTable">
    <thead>
        <tr>
            <th>Apellido paterno</th>
            <th>Apellido materno</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Usuario</th>
            <th>Reset Password</th>
            <th>Cambiar Rol</th>
            <th>Ubicacion</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($mostrar = mysqli_fetch_array($respuesta)) {
            ?>
            <tr>
                <td><?php echo $mostrar['paterno']; ?></td>
                <td><?php echo $mostrar['materno']; ?></td>
                <td><?php echo $mostrar['nombrePersona']; ?></td>
                <td>
                    <?php
                    // Calcular la edad a partir de la fecha de nacimiento
                    $fechaNacimiento = new DateTime($mostrar['fechaNacimiento']);
                    $hoy = new DateTime();
                    $edad = $hoy->diff($fechaNacimiento)->y;
                    echo $edad;
                    ?>
                </td>
                <td><?php echo $mostrar['sexo']; ?></td>
                <td><?php echo $mostrar['telefono']; ?></td>
                <td><?php echo $mostrar['correo']; ?></td>
                <td><?php echo $mostrar['nombreUsuario']; ?></td>
                <td><button class="btn btn-success btn-sm">Cambiar Password</button></td>
                <td><button class="btn btn-primary btn-sm">Cambiar Rol</button></td>
                <td><?php echo $mostrar['ubicacion']; ?></td>
                <td><button class="btn btn-warning btn-sm">Editar</button></td>
                <td><button class="btn btn-danger btn-sm">Eliminar</button></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $('#tablaUsuariosDataTable').DataTable({
        });
    });
</script>

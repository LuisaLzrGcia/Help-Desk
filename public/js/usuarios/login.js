// Archivo: login.js

// Función para manejar el envío del formulario de inicio de sesión
function loginUsuario() {
    // Realizar la solicitud AJAX
    $.ajax({
        type: "POST",
        data: $('#frmLogin').serialize(), // Serializar el formulario
        url: "procesos/usuarios/login/loginUsuarios.php", // Ruta del archivo PHP que maneja el inicio de sesión
        success: function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                // Redirigir al usuario a la página de inicio si el inicio de sesión fue exitoso
                window.location.href = "vistas/inicio.php";
            } else {
                // Mostrar un mensaje de error si el inicio de sesión falló
                Swal.fire(":c(", "Error al entrar! " + respuesta, "error");
            }
        },
        error: function(xhr, status, error) {
            // Manejar errores de la solicitud AJAX
            Swal.fire(":c(", "Error en la solicitud: " + error, "error");
        }
    });

    // Evitar que el formulario se envíe de forma convencional
    return false;
}

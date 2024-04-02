function agregarUsuario(){
    // Aquí podrías incluir código para recopilar los datos del nuevo usuario desde el formulario
    // y luego enviarlos al servidor mediante AJAX

    // Por ejemplo:
    $.ajax({
        url: 'agregarUsuario.php', // Archivo PHP que maneja la adición de usuarios
        type: 'POST',
        data: $('#formularioAgregarUsuario').serialize(), // Serializa los datos del formulario
        success: function(response) {
            // Si la adición es exitosa, puedes mostrar un mensaje de éxito o recargar la tabla de usuarios
            alert('Usuario agregado exitosamente');
            $('#tablaUsuariosLoad').load("tablaUsuarios.php"); // Recargar la tabla de usuarios
        },
        error: function(xhr, status, error) {
            // Si hay un error al agregar el usuario, puedes mostrar un mensaje de error o manejarlo de otra manera
            alert('Error al agregar usuario');
            console.error(xhr.responseText); // Muestra el mensaje de error en la consola
        }
    });

    return false; // Evita que el formulario se envíe de forma convencional
}

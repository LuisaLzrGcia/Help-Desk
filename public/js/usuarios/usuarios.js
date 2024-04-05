$(document).ready(function () {
  $('#tablaUsuariosLoad').load("../tablaUsuarios.php");
});

function agregarNuevoUsuario() {
  $.ajax({
    type: "POST",
    data: $('#frmAgregarUsuario').serialize(),
    url: "agregarNuevoUsuario.php",
    success: function (respuesta) {
      respuesta = respuesta.trim();
      if (respuesta == 1) {
        $('#tablaUsuariosLoad').load("../tablaUsuarios.php");
        swal.fire("Agregado con éxito!", { icon: "success" });
        $('#frmAgregarUsuario')[0].reset();
      } else {
        swal.fire("Error al agregar " + respuesta, { icon: "error" });
      }
    }
  });
  return false;
}

<?php
// Incluir el archivo header.php
include "header.php";

// Verificar si existe una sesión de usuario y si el rol es 1
if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1) {
  ?>

  <!-- Contenido de la página -->
  <div class="container">
    <div class="card border-0 shadow my-5">
      <div class="card-body p-5">
        <h1 class="fw-light">Mis dispositivos</h1>
        <p class="lead">Contenido de Mis dispositivos</p>
      </div>
    </div>
  </div>

  <?php
  // Incluir el archivo footer.php
  include "footer.php";
} else {
  // Redireccionar a index.html si el usuario no tiene el rol adecuado
  header("location:../index.html");
}
?>
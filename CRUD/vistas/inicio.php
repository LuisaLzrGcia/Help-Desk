<?php
if (session_status() !== PHP_SESSION_ACTIVE)
  session_start();

include_once "header.php";
if (isset($_SESSION['usuario']['id']) && ($_SESSION['usuario']['id'] == 1 || $_SESSION['usuario']['id'] == 2)) {
  ?>

  <!-- Page Content -->

  <div class="container">
    <div class="card border-0 shadow my-5">
      <div class="card-body p-5">
        <h1 class="fw-light">Inicio</h1>
        <p class="lead">Contenido de inicio</p>
      </div>
    </div>
  </div>

  <?php
  include "footer.php";
} else {
  header("location:../index.html");
}
?>
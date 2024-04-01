<?php
if (session_status() !== PHP_SESSION_ACTIVE)
  session_start();

include_once "header.php";
if (isset($_SESSION['usuario']['id']) && ($_SESSION['usuario']['id'] == 1 || $_SESSION['usuario']['id'] == 2)) {
  ?>

  <link rel="stylesheet" href="../../public/bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" href="../../public/CSS/menu.css" />

  <!-- Page Content -->

  <div class="container">
    <div class="card border-0 shadow my-5">
      <div class="card-body p-5">
        <h1 class="fw-light">Inicio</h1>
        <p class="lead">Contenido de inicio</p>
      </div>
    </div>
  </div>

  <script src="../../public/jquery/jquery-3.6.0.min.js"></script>
  <script src="../../public/bootstrap/popper.min.js"></script>
  <script src="../../public/bootstrap/bootstrap.min.js"></script>
  <script src="../../public/sweetalert2/sweetalert2@11.js"></script>
  <?php
  include "footer.php";
} else {
  header("location:../index.html");
}
?>
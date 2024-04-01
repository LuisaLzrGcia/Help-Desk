<?php
if (session_status() !== PHP_SESSION_ACTIVE)
  session_start();

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="../../public/CSS/menu.css" />

<nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
  <div class="container">
    <a class="navbar-brand" href="inicio.php">Help-Desk</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
      aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
          <a class="nav-link" href="inicio.php">Inicio</a>
        </li>
        <?php if ($_SESSION['usuario']['rol'] == 1) { ?>
          <!-- Vistas de Cliente-->
          <li class="nav-item">
            <a class="nav-link" href="misDispositivos.php">Mis dispositivos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="misReportes.php">Reportes</a>
          </li>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Editar Datos</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../Login/salir.php">Salir</a>
          </div><!-- Se agregó el cierre del div para el menú desplegable -->
        <?php } else if ($_SESSION['usuario']['rol'] == 2) { ?>
            <!-- Vistas del Administrador-->
            <li class="nav-item">
              <a class="nav-link" href="usuarios.php">Usuarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="asignacion.php">Asignacion de equipos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="reportes.php">Reportes</a>
            </li>
        <?php } ?>
        <li class="nav-item dropdown">
          <a style="color:red" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
            data-toggle="dropdown" aria-expanded="false">
            Usuarios:
            <?php echo $_SESSION['usuario']['nombre']; ?>
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Editar Datos</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../Login/salir.php">Salir</a>
          </div><!-- Se agregó el cierre del div para el menú desplegable -->
        </li>
      </ul>
    </div>
  </div>
</nav>


<script src="public/jquery/jquery-3.6.0.min.js"></script>
<script src="public/bootstrap/popper.min.js"></script>
<script src="public/bootstrap/bootstrap.min.js"></script>
<script src="public/sweetalert2/sweetalert2@11.js"></script>
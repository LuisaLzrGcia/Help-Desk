<?php 
  include "header.php"; 
  if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1) {
?>

<!-- Page Content -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Mis dispositivos</h1>
      <p class="lead">Contenido de Mis dispositivos</p>
    </div>
  </div>
</div>

<?php 
  include "footer.php"; 
  } else {
    header("location:../index.html");
  }
?>

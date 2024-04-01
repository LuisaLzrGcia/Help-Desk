<?php 
  include "header.php"; 
  if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {
?>

<!-- Page Content -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Reportes</h1>
      <p class="lead">
      ></button>
          </div>
          <div class="modal-body">
            Si no puede iniciar sesión, contacte al área de recursos humanos.
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Cerrar
            </button>
      </p>
      
  </div>
</div>

<?php 
  include "footer.php"; 
  } else {
    header("location:../index.html");
  }
?>

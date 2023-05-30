<?php  include ("views/layouts/header.php"); ?>
    <br>
    <div class="p-5 mb-4 bg-light rounded-3" id="presentacion">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Bienvenid@ al sistema de Recoleccion</h1>
        <p class="col-md-8 fs-4">Usuario con nombre: <?php  if(isset($_SESSION["NOMBRE"])){echo $_SESSION["NOMBRE"];}else{ echo "Annonymous";}?></p><br>
        <p class="col-md-8 fs-4"> y correo: <?php  if(isset($_SESSION["NOMBRE"])){echo $_SESSION["CORREO"];}else{ echo "Annonymous";}?></p><br>
      </div>
    </div>

<?php include ("views/layouts/footer.php");?>
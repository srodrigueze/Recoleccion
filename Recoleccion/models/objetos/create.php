<?php 
include("../../controllers/objetos/create.php");
include ("../../views/layouts/header.php");
?>

<div class="card">
    <div class="card-header">
        Ingresar los datos del informe
    </div>
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo: </label>
            <select class="form-select form-select-lg" name="tipo" id="tipo">
              <option selected value="No peligroso">No peligroso</option>    
              <option value ="Peligroso">Peligroso</option>
            </select>
        </div>

        <div class="mb-3">
          <label for="estado" class="form-label">Estado: </label>
          <input type="text" value="Pendiente"
            class="form-control" readonly name="estado" id="estado" aria-describedby="helpId">
        </div>

        <div class="mb-3">
          <label for="ubicacion" class="form-label">Direccion: </label>
          <input type="text"
            class="form-control" name="ubicacion" id="ubicacion" aria-describedby="helpId" >
        </div>

        <div class="mb-3">
          <label for="descripcion" class="form-label">Descripcion: </label>
          <input type="text"
            class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" >
        </div>

        <div class="mb-3">
          <label for="imagen" class="form-label">Imagen: </label>
          <input type="file"
            class="form-control" name="imagen" id="imagen" aria-describedby="helpId">
        </div>

        <div class="mb-3">
          <label for="fecharegistro" class="form-label">Fecha de registro:</label>
          <input type="date"
            class="form-control" name="fecharegistro" id="fecharegistro" aria-describedby="helpId">
        </div>

        <button type="submit" class="btn btn-success">Agregar reporte</button>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
      </form>
    </div>
    <div class="card-footer text-muted">

    </div>
</div>

<?php include ("../../views/layouts/footer.php");?>
<?php 
include ("../../views/layouts/header.php");
include ("../../controllers/objetos/update.php");
?>

<div class="card">
    <div class="card-header">
        Ingresar los datos del informe
    </div>
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data">
      
      <div class="mb-3">
                <label for="txtID" class="form-label">ID: </label>
                <input type="text" 
                    value ="<?php echo $txtID; ?>" class="form-control"  readonly name="txtID" id="txtID" placeholder="Numero ID">
            </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo: </label>
            <select class="form-select form-select-lg" name="tipo" id="tipo">
              <option selected value="<?php echo $objeto->getTipo(); ?>"><?php echo $objeto->getTipo(); ?></option>    
              <option value ="No peligroso">No peligroso</option>
              <option value ="Peligroso">Peligroso</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado: </label>
            <select class="form-select form-select-lg" name="estado" id="estado">
                <option selected  value="<?php echo $objeto->getEstado(); ?>"><?php echo $objeto->getEstado(); ?></option>
                <option  value="Pendiente">Pendiente</option>    
              <option value ="En curso">En curso</option>
              <option value ="Recolectado">Recolectaodo</option>
            </select>
        </div>

        <div class="mb-3">
          <label for="ubicacion" class="form-label">Direccion: </label>
          <input type="text"
            class="form-control" value="<?php echo $objeto->getUbicacion(); ?>" name="ubicacion" id="ubicacion"  >
        </div>

        <div class="mb-3">
          <label for="descripcion" class="form-label">Descripcion: </label>
          <input type="text"
            class="form-control" value="<?php echo $objeto->getDescripcion(); ?>" name="descripcion" id="descripcion" >

        </div>

        <div class="mb-3">
          <label for="imagen" class="form-label">Imagen: </label>
          <br>
          <img width="100" 
                src="<?php echo $objeto->getImagen();?>" 
                class="img-fluid rounded" alt="" >
            <br><br>
          <input type="file"
            class="form-control" name="imagen" id="imagen" aria-describedby="helpId">
        </div>

        <div class="mb-3">
          <label for="fecharegistro" class="form-label">Fecha de registro:</label>
          <input type="date"
            class="form-control" value="<?php echo $objeto->getFehcaRegistro(); ?>" name="fecharegistro" id="fecharegistro" aria-describedby="helpId">
        </div>

        <button type="submit" class="btn btn-success">Actualizar reporte</button>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
      </form>
    </div>
    <div class="card-footer text-muted">

    </div>
</div>

<?php include ("../../views/layouts/footer.php");?>
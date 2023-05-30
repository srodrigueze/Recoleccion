<?php  include ("../../controllers/usuarios/create.php");
        include ("../../views/layouts/header.php"); 
?>
<br>

<div class="card">
    <div class="card-header">
        Registrar usuario nuevo
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="nombreusuario" class="form-label">Nombre completo: </label>
          <input type="text"
            class="form-control" name="nombreusuario" id="nombreusuario" aria-describedby="helpId" placeholder="Nombre y Apellidos" required>
        </div>

        <div class="mb-3">
          <label for="correo" class="form-label">Correo: </label>
          <input type="email"
            class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="usuario@mail.com" required>
        </div>

        <div class="mb-3">
          <label for="passwordusuario" class="form-label">Contraseña: </label>
          <input type="password"
            class="form-control" name="passwordusuario" id="passwordusuario" aria-describedby="helpId" placeholder="Contraseña" required>
        </div>

        <button type="submit" class="btn btn-success" onclick="validarPassword()">Registrar</button>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>



<?php include ("../../views/layouts/footer.php");?>
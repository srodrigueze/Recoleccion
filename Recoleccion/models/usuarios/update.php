<?php include("../../controllers/usuarios/update.php");?>
<?php  include ("../../views/layouts/header.php"); ?>

<br>

<div class="card">
    <div class="card-header">
        Usuarios
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="txtID" class="form-label">ID: </label>
                <input type="text" value ="<?php echo $txtID; ?>" class="form-control"  readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="Numero ID">
            </div>
            
            <div class="mb-3">
                <label for="nombreusuario" class="form-label">Nombre completo: </label>
                <input type="text" value="<?php echo $usuario->getNombre(); ?>" class="form-control" name="nombreusuario" id="nombreusuario" aria-describedby="helpId"  placeholder="Nombre y Apellidos">
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label">Correo: </label>
                <input type="email" value ="<?php echo $usuario->getCorreo(); ?>" class="form-control" name="correo" id="correo"  aria-describedby="helpId" placeholder="usuario@mail.com">
            </div>

            <div class="mb-3">
                <label for="passwordusuario" class="form-label">Contraseña: </label>
                <input type="password" value ="<?php echo $usuario->getContraseña(); ?>" class="form-control" name="passwordusuario" id="passwordusuario" aria-describedby="helpId" placeholder="Contraseña">
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include ("../../views/layouts/footer.php");?>
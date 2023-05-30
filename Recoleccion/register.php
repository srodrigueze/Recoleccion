<?php 
session_start();
$url_base="http://localhost/recoleccion/";
if($_POST){
  include("./config/db.php");
  include("./models/entities/usuario.php");

    //Recoleccion de datos del metodo POST
    $nombreusuario=(isset($_POST['nombreusuario'])?$_POST['nombreusuario']:"");
    $correo=(isset($_POST['correo'])?$_POST['correo']:"");
    $passwordusuario=(isset($_POST['passwordusuario'])?$_POST['passwordusuario']:"");

    // Creacion de usuario con POO
    $usuario = new Usuario();
    $usuario->crearUsuario($nombreusuario,$correo,$passwordusuario);

    $mensaje="Registrado exitosamente";

    $usuario = new Usuario();
    $register = $usuario->logIn($correo,$passwordusuario);

    $_SESSION["NOMBRE"]=$register["NOMBRE"];
    $_SESSION["CORREO"]=$register["CORREO"];
    $_SESSION["logged"]=true;
    header("Location:index.php");

}
?>

<head>
  <title>Register</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $url_base;?>assets/css/style.css">
</head>

<body>
<header>
    <h1>Recoleccion</h1>
  </header>
  <main class ="container">
  <div class="card">
      <div class="card-header">
          Registrarse
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
            class="form-control" name="passwordusuario" id="passwordusuario" aria-describedby="helpId" placeholder="Contraseña" onkeyup="validarPassword()" required>
            <span id = "messagepassword"></span>
        </div>

        <button type="submit" class="btn btn-success">Registrarse</button>
        <a name="" id="" class="btn btn-primary" href="login.php" role="button">Regresar</a>

        </form>
      </div>
    <div class="card-footer text-muted"></div>
</div>
</main>
  <footer>
  <div>
        <a href="#">2023 &copy; Santiago Rodriguez </a>
    </div>

    <div>
        Correo: santiagorodriguez325067@correo.itm.edu.co
    </div>     
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  <script src="./assets/js/password.js"></script>
</body>
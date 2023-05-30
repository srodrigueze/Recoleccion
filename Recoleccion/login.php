<?php
session_start();
$url_base="http://localhost/recoleccion/";
if($_POST){
  include("./config/db.php");
  include("./models/entities/usuario.php");
    
    $correo=(isset($_POST['correo'])?$_POST['correo']:"");
    $passwordusuario=(isset($_POST['passwordusuario'])?$_POST['passwordusuario']:"");

    $usuario = new Usuario();
    $register = $usuario->logIn($correo,$passwordusuario);

    if($register["n_usuario"]>0){
      $_SESSION["NOMBRE"]=$register["NOMBRE"];
      $_SESSION["CORREO"]=$register["CORREO"];
      $_SESSION["logged"]=true;
      header("Location:index.php");
    }else{
      $message="Error: El usuario o contraseña son incorrectos";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
  <title>Log in</title>
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
    <div>
      <h3>Bienvenido a la interfaz de inicio de sesion!</h3>
    </div>
    <div class="row">
            <br><br>
            <div class="card" id ="login-from">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                <?php if(isset($message)){?>
                <div class="alert alert-danger" role="alert">
                    <strong><?php echo $message;?></strong>
                </div>
                <?php } ?>
                    <form action="" method="post">
                        <div class="mb-3">
                          <label for="correo" class="form-label">Correo:</label>
                          <input type="email"
                            class="form-control" name="correo" id="correo" placeholder="Ingrese su correo" required>                          
                        </div>

                        <div class="mb-3">
                          <label for="passwordusuario" class="form-label">Contraseña: </label>
                          <input type="password"
                            class="form-control" name="passwordusuario" id="passwordusuario" placeholder="Ingrese su contraseña" required>
                            Mostrar contraseña <input type="checkbox" onclick = "mostrarPassword()">
                        </div>

                        <button type="submit" class="btn btn-primary">Ingresar</button>
                         <p>No estas registrado? <a href="<?php echo $url_base;?>register.php">Registrarse</a></p>
                    </form>
                </div>
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
</body>

<script src="./assets/js/password.js"></script>
</html>
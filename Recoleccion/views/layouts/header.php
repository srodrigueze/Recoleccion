<?php
session_start();
$url_base="http://localhost/recoleccion/";

if(!isset($_SESSION['NOMBRE'])){
    header("Location:".$url_base."login.php");
}else{}

?>

<!doctype html>
<html lang="en">

<head>
  <title>Recoleccion</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <!-- JQuery 3.6.4 -->  
    <script
    src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
    crossorigin="anonymous"></script>

    

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <link rel = "shortcut icon" href = "<?php echo $url_base;?>assets/img/icons/icon.png">
    <link rel="stylesheet" href="<?php echo $url_base;?>assets/css/style.css">
  
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://localhost/recoleccion/assets/js/logTime.js"></script>

</head>

<body>
<header>
    <img src="<?php echo $url_base;?>assets/img/icons/icon.png" class="img-fluid rounded" id="logo" alt="Logo">
    <h1>Reporte de Sólidos</h1>
</header>
  <nav class="navbar navbar-expand navbar-light" id="navbar">
      <ul class="nav navbar-nav">
          <li class="nav-item">
              <a class="nav-link active" href="<?php echo $url_base;?>" aria-current="page">Inicio</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="<?php echo $url_base;?>models/objetos/">Solidos</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="<?php echo $url_base;?>models/usuarios/">Usuarios</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="<?php echo $url_base;?>logout.php">Cerrar Sesion</a>
          </li>
      </ul>
  </nav>
  <main class ="container">
  <?php if(isset($_GET['mensaje'])){ ?>
<script>
    Swal.fire({icon:"success", title:"<?php echo $_GET['mensaje'];?>"});
</script>
<?php }?>
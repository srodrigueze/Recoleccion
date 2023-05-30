<?php 
    include("../../models/entities/usuario.php");
    
    if($_POST){
      //Recoleccion de datos del metodo POST
      $nombreusuario=(isset($_POST['nombreusuario'])?$_POST['nombreusuario']:"");
      $correo=(isset($_POST['correo'])?$_POST['correo']:"");
      $passwordusuario=(isset($_POST['passwordusuario'])?$_POST['passwordusuario']:"");

      // Creacion de usuario con POO
      $usuario = new Usuario();
      $usuario->crearUsuario($nombreusuario,$correo,$passwordusuario);

      $mensaje="Registro agregado";

        header("Location:index.php?mensaje=".$mensaje);
    }

?>

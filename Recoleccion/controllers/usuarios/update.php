<?php
    include("../../models/entities/usuario.php");

    if(isset($_GET['txtID'])){
        $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
        $usuario = new Usuario();
        $usuario = $usuario->mostrarUsuario($txtID);
    }

    if($_POST){
        //Recoleccion de datos del metodo POST
        $txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
        $nombreusuario=(isset($_POST['nombreusuario'])?$_POST['nombreusuario']:"");
        $correo=(isset($_POST['correo'])?$_POST['correo']:"");
        $passwordusuario=(isset($_POST['passwordusuario'])?$_POST['passwordusuario']:"");
        
        $usuario = new Usuario();
        $usuario->editarUsuario($txtID, $nombreusuario, $correo, $passwordusuario);

        $mensaje="Registro actualizado";

        header("Location:index.php?mensaje=".$mensaje);
      }

?>




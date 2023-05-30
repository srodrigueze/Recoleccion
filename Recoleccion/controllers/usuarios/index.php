<?php 
    include("../../models/entities/usuario.php");
    $usuario = new Usuario();
    if(isset($_GET['txtID'])){
        $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
        $usuario->eliminarUsuario($txtID);
        $mensaje="Registro eliminado";

        header("Location:index.php?mensaje=".$mensaje);
    
    }

    $list_tbl_usuarios = $usuario->mostrarUsuarios();

?>


<?php 
    include("../../models/entities/objeto.php");

    $objeto = new Objeto();
    if(isset($_GET['txtID'])){
        $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
        $objeto->eliminarObjeto($txtID);

        $mensaje="Reporte eliminado";
        header("Location:index.php?mensaje=".$mensaje);
    }

    $list_tbl_objetos=$objeto->mostrarObjetos();

?>


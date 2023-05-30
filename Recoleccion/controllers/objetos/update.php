<?php 
    include("../../models/entities/objeto.php");

    $objeto = new Objeto();
  if(isset($_GET['txtID'])){
      $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
      $objeto = $objeto->mostrarObjeto($txtID);

  }

if($_POST){
    
    $txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
    $tipo=(isset($_POST['tipo'])?$_POST['tipo']:"");
    $estado=(isset($_POST['estado'])?$_POST['estado']:"");
    $ubicacion=(isset($_POST['ubicacion'])?$_POST['ubicacion']:"");
    $descripcion=(isset($_POST['descripcion'])?$_POST['descripcion']:"");
    $fecharegistro=(isset($_POST['fecharegistro'])?$_POST['fecharegistro']:"");

    $objeto->editarObjeto($txtID,$tipo, $estado,$ubicacion,$descripcion,$fecharegistro,$imagen);
    $mensaje="Reporte actualizado";

    header("Location:index.php?mensaje=".$mensaje);
  }

?>


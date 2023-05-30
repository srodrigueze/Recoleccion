<?php 
    $url_base="http://localhost/recoleccion/";
    include("../../models/entities/objeto.php");

    if($_POST){
        print_r($_POST);

        //Recoleccion de datos (del Post)
        $tipo=(isset($_POST['tipo'])?$_POST['tipo']:"");
        $estado=(isset($_POST['estado'])?$_POST['estado']:"");
        $ubicacion=(isset($_POST['ubicacion'])?$_POST['ubicacion']:"");
        $descripcion=(isset($_POST['descripcion'])?$_POST['descripcion']:"");
        $imagen=(isset($_FILES['imagen']['name'])?$_FILES['imagen']['name']:"");
        $fecharegistro=(isset($_POST['fecharegistro'])?$_POST['fecharegistro']:"");
 
        $fecha_imagen=new DateTime();
        $nombreArchivo_imagen=($imagen!='')?$fecha_imagen->getTimestamp()."_".$_FILES["imagen"]['name']:"";
        $tmp_imagen=$_FILES['imagen']['tmp_name'];

        $objeto = new Objeto();
        $objeto->crearObjeto($tipo,$estado,$ubicacion,$descripcion,$fecharegistro,$nombreArchivo_imagen,$tmp_imagen);

        $mensaje="Reporte agregado";

        header("Location:".$url_base."/models/objetos/index.php?mensaje=".$mensaje);
      }
      

?>

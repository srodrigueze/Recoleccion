<?php
include('../../config/db.php');
class Objeto {
    private $id;
    private $tipo;
    private $imagen;
    private $estado;
    private $ubicacion;
    private $descripcion;
    private $fecharegistro;
    private $db;
    public function __construct(){
        $this->db=Database::connect();
    }
    // Getters & Setters
    public function getId(){
        return $this->id;
    }
    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo=$tipo;
    }

    public function getImagen(){
        return $this->imagen;
    }
    public function setImagen($imagen){
        $this->imagen=$imagen;
    }
    
    public function getEstado(){
        return $this->estado;
    }
    public function setEstado($estado){
        $this->estado=$estado;
    }

    public function getUbicacion(){
        return $this->ubicacion;
    }
    public function setUbicacion($ubicacion){
        $this->ubicacion=$ubicacion;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }
    public function setDescripcion($descripcion){
        $this->descripcion=$descripcion;
    }

    public function getFehcaRegistro(){
        return $this->fecharegistro;
    }
    public function setFechaRegistro($fecharegistro){
        $this->fecharegistro=$fecharegistro;
    }

    public function crearObjeto($tipo,$estado,$ubicacion,$descripcion,$fecharegistro,$nombreArchivo_imagen,$tmp_imagen){
        //Preparacion de la insercion de datos en la base de datos
        $sentence=$this->db->prepare(
            "INSERT INTO tbl_objeto(ID, TIPO, IMAGEN, ESTADO, UBICACION, DESCRIPCION, FECHA) 
             VALUES(NULL, :tipo, :imagen, :estado, :ubicacion, :descripcion, :fecharegistro)"
             );
          
          // Asignacion de datos    
          if($tmp_imagen!=''){
            move_uploaded_file($tmp_imagen,"./".$nombreArchivo_imagen);
          }
          $sentence->bindParam(":imagen",$nombreArchivo_imagen);
  
          $sentence->bindParam(":tipo",$tipo);
          $sentence->bindParam(":estado",$estado);
          $sentence->bindParam(":ubicacion",$ubicacion);
          $sentence->bindParam(":descripcion",$descripcion);
          $sentence->bindParam(":fecharegistro",$fecharegistro);
  
          $sentence->execute();
    }

    // Eliminar un objeto
    public function eliminarObjeto($txtID){
        $sentence=$this->db->prepare("SELECT IMAGEN FROM tbl_objeto WHERE ID=:id");
        $sentence->bindParam(":id",$txtID);
        $sentence->execute();
        $register_obtained=$sentence->fetch(PDO::FETCH_LAZY);

        if(isset($register_obtained["IMAGEN"]) && $register_obtained["IMAGEN"]!=""){
            if(file_exists("./".$register_obtained["IMAGEN"])){
                unlink("./".$register_obtained["IMAGEN"]);
            }
        }

        $sentence=$this->db->prepare("DELETE FROM tbl_objeto WHERE ID=:id");
        $sentence->bindParam(":id",$txtID);
        $sentence->execute();
    }

    // Muestra todos los objetos a enlistar
    public function mostrarObjetos(){
        $sentence=$this->db->prepare("SELECT * FROM tbl_objeto");
        $sentence->execute();

        $list_tbl_objetos=$sentence->fetchAll(PDO::FETCH_ASSOC);
        return $list_tbl_objetos;
    }

    // Muestra el objeto a editar
    public function mostrarObjeto($txtID){
        $sentence=$this->db->prepare("SELECT * FROM tbl_objeto WHERE ID=:id");
        $sentence->bindParam(":id",$txtID);
        $sentence->execute();
        $register=$sentence->fetch(PDO::FETCH_LAZY);

        $objeto1 =  new Objeto();
        $objeto1->setTipo($register["TIPO"]);
        $objeto1->setImagen($register["IMAGEN"]);
        $objeto1->setEstado($register["ESTADO"]);
        $objeto1->setUbicacion($register["UBICACION"]);
        $objeto1->setDescripcion($register["DESCRIPCION"]);
        $objeto1->setFechaRegistro($register["FECHA"]);

        return $objeto1;

    }

    // Actualizar el objeto
    public function editarObjeto($txtID,$tipo, $estado,$ubicacion,$descripcion,$fecharegistro,$imagen){
        $sentence=$this->db->prepare(
            "UPDATE tbl_objeto SET 
              TIPO=:tipo,
              ESTADO=:estado,
              UBICACION=:ubicacion, 
              DESCRIPCION=:descripcion, 
              FECHA=:fecharegistro 
             WHERE ID=:id"
             );
          
          $sentence->bindParam(":tipo",$tipo);
          $sentence->bindParam(":estado",$estado);
          $sentence->bindParam(":ubicacion",$ubicacion);
          $sentence->bindParam(":descripcion",$descripcion);
          $sentence->bindParam(":fecharegistro",$fecharegistro);
          $sentence->bindParam(":id",$txtID);
      
          $sentence->execute();
      
          $fecha_imagen=new DateTime();
      
          $nombreArchivo_imagen=($imagen!='')?$fecha_imagen->getTimestamp()."_".$_FILES["imagen"]['name']:"";
          $tmp_imagen=$_FILES['imagen']['tmp_name'];
          if($tmp_imagen!=''){
              move_uploaded_file($tmp_imagen,"./".$nombreArchivo_imagen);
              //Selecciona la imagen anterior
              $sentence=$this->db->prepare("SELECT IMAGEN FROM tbl_objeto WHERE ID=:id");
              $sentence->bindParam(":id",$txtID);
              $sentence->execute();
              $register_obtained=$sentence->fetch(PDO::FETCH_LAZY);
              //Si existe pues la borra
              if(isset($register_obtained["IMAGEN"]) && $register_obtained["IMAGEN"]!=""){
                  if(file_exists("./".$register_obtained["IMAGEN"])){
                      unlink("./".$register_obtained["IMAGEN"]);
                  }
              }
              //Se agrega la nueva imagen
              $sentence=$this->db->prepare(
                  "UPDATE tbl_objeto SET 
                    IMAGEN=:imagen
                   WHERE ID=:id"
                   );
              $sentence->bindParam(":imagen",$nombreArchivo_imagen);
              $sentence->bindParam(":id",$txtID);
              $sentence->execute();
            }
    }
}
?>
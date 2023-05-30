<?php
include('../../config/db.php');
class Usuario {
    private $id;
    private $nombre;
    private $correo;
    private $contraseña;
    private $db;
    public function __construct(){
        $this->db=Database::connect();
    }
    // Getters & Setters
    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    
    public function getCorreo(){
        return $this->correo;
    }
    public function setCorreo($correo){
        $this->correo=$correo;
    }

    public function getContraseña(){
        return $this->contraseña;
    }
    public function setContraseña($contraseña){
        $this->contraseña=$contraseña;
    }

    // Crear un usuario
    public function crearUsuario($nombreusuario,$correo,$passwordusuario){
        //Preparar la insercion de los datos
        $sentence=$this->db->prepare("INSERT INTO tbl_usuario(ID, NOMBRE, CORREO, CONTRASEÑA) 
        VALUES(NULL, :nombreusuario,:correo, :passwordusuario)");

        //Asignando los valores que vienen del metodo post (Los del formulario)
        $sentence->bindParam(":nombreusuario",$nombreusuario);
        $sentence->bindParam(":correo",$correo);
        $sentence->bindParam(":passwordusuario",$passwordusuario);
        //Ejecutando la sentencia SQL
        $sentence->execute();
    }

    // Eliminar usuario
    public function eliminarUsuario($txtID){
        $sentence=$this->db->prepare("DELETE FROM tbl_usuario WHERE ID=:id");
        $sentence->bindParam(":id",$txtID);
        $sentence->execute();
    }

    // Mostrar todos los usuarios
    public function mostrarUsuarios(){
        $sentence=$this->db->prepare("SELECT * FROM tbl_usuario");
        $sentence->execute();

        $list_tbl_usuarios=$sentence->fetchAll(PDO::FETCH_ASSOC);
        return $list_tbl_usuarios;
    }

    // Mostrar el usuario a edtar
    public function mostrarUsuario($txtID){
        $sentence=$this->db->prepare("SELECT * FROM tbl_usuario WHERE ID=:id");
        $sentence->bindParam(":id",$txtID);
        $sentence->execute();

        $register=$sentence->fetch(PDO::FETCH_LAZY);
        $nombreusuario=$register["NOMBRE"];
        $correo=$register["CORREO"];
        $passwordusuario=$register["CONTRASEÑA"];
        $usuario1 = new Usuario();
        $usuario1->setNombre($nombreusuario);
        $usuario1->setCorreo($correo);
        $usuario1->setContraseña($passwordusuario);
        return $usuario1;
    }

    // Editar usuario
    public function editarUsuario($txtID, $nombreusuario, $correo, $passwordusuario){
        //Preparar la insercion de los datos
        $sentence=$this->db->prepare("UPDATE tbl_usuario 
        SET NOMBRE=:nombreusuario , CORREO=:correo , CONTRASEÑA=:passwordusuario 
        WHERE ID=:id ");
  
        //Asignando los valores que vienen del metodo post (Los del formulario)
        $sentence->bindParam(":id",$txtID);
        $sentence->bindParam(":nombreusuario",$nombreusuario);
        $sentence->bindParam(":correo",$correo);
        $sentence->bindParam(":passwordusuario",$passwordusuario);

        $sentence->execute();
    }
    

    // Iniciar sesion
    public function logIn($correo, $passwordusuario){
        //Preparar la insercion de los datos
        $sentence=$this->db->prepare(
            "SELECT *, count(*) as 'n_usuario'
            FROM tbl_usuario 
            WHERE CONTRASEÑA=:passwordusuario and CORREO=:correo");

        // Asignar los valores del POST
        $sentence->bindParam(":correo",$correo);
        $sentence->bindParam(":passwordusuario",$passwordusuario);

        // Trae el primer registro encontrado
        $sentence->execute();
        $register=$sentence->fetch(PDO::FETCH_LAZY);

        return $register;
    }

}
?>
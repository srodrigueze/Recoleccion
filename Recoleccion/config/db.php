<?php
class Database{
    public static function connect(){
        $server = "localhost";  //127.0.0.1
        $db = "recoleccion";
        $usuario="root";
        $password="";
        try {
            $connection = new PDO("mysql:host=$server; dbname=$db",$usuario,$password);
        }catch(Exception $e){
            echo $e->getMessage();
        }
        return $connection;
    }
    
}


?>
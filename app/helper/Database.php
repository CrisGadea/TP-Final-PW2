<?php

class Database{

    private $conexion;

    public function __construct($servidor, $usuario, $password, $basededatos){

        $this->conexion  = mysqli_connect($servidor, $usuario, $password, $basededatos)
                or die("Connection failed: " . mysqli_connect_error());
          mysqli_query($this->conexion, "SET NAMES 'utf8'");      
    }

   public function getConexion(){
    return $this->conexion;
   }

  


    public static function createDatabaseFromConfig(Config $config){
        return new Database
        (
            $config->get( "database","servername"),
            $config->get("database","username"),
            $config->get("database","password"),
            $config->get("database","dbname")
        );
    }
}
<?php


class PublicacionesModelo
{
    private $conexion;


    function __construct()
    {
        $this->conexion = Database::createDatabaseFromConfig(new Config("config/config.ini"));
    }

    public function getPublicaciones()
    {
        $sql="SELECT * from Publication";
        $resultado=$this->conexion->getConexion()->query($sql);
        return $resultado;
    }

    public function getPublicacionesBySuscrptionFree()
    {
        $sql="SELECT * from Publication WHERE suscription_id = 1";
        $resultado=$this->conexion->getConexion()->query($sql);
        return $resultado;
    }

    public function crearPublicacion($descripcion,$tipo,$subscipcionId){
         $sql="INSERT INTO Publication VALUES (NULL,\"".$tipo."\",\"".$descripcion."\",".$subscipcionId.")";
         echo $sql;
        $resultado=$this->conexion->getConexion()->query($sql);
        return $resultado;
    }


}
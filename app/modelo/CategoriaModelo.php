<?php

require_once "helper/Database.php";
require_once "helper/Config.php";

class CategoriaModelo
{
	private $conexion;

	function __construct()
	{
	 $this->conexion = Database::createDatabaseFromConfig(new Config("config/config.ini"));   
	}

	public function getCategorias()
	{

		$sql="SELECT * from Section";
		$resultado=$this->conexion->getConexion()->query($sql);	
		return $resultado;
	}
	public function getCategoriasByPublicationId($id){
		$sql="SELECT * from Section where publication_id=".$id;
		$resultado=$this->conexion->getConexion()->query($sql);	
		return $resultado;
	}


	public function crearCategoria($description,$publicacionId)
	{

		$sql = "INSERT INTO Section VALUES(NULL,\"".$description."\",".$publicacionId.")";
		return $this->conexion->getConexion()->query($sql);	
	}
}
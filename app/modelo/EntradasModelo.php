<?php 
require_once "helper/Database.php";
require_once "helper/Config.php";

class EntradasModelo 
{

	private $conexion;

	
	function __construct()
	{
		$this->conexion = Database::createDatabaseFromConfig(new Config("config/config.ini"));    
	}

	public function getEntradas()
	{
		$sql="SELECT * from News";
		$resultado=$this->conexion->getConexion()->query($sql);
		return $resultado;
	}

	public function getEntradasBySectionId($section_id)
	{
		$sql="SELECT * from News where section_id=".$section_id;
	
		$resultado=$this->conexion->getConexion()->query($sql);
		return $resultado;
	}
	public function getEntradasByPublicationId($id){
		$sql="SELECT * from News where publication_id=".$id;
	
		$resultado=$this->conexion->getConexion()->query($sql);
		return $resultado;
	}

	public function getEntrada($id)
	{
		$sql="SELECT * from News WHERE id=$id";
		$resultado=$this->conexion->getConexion()->query($sql);
		return $resultado;
	}

	public function crearEntradas($title, $subtitle, $body, $image, $address, $date, $section_id, $publication_id, $user_id)
	{
		$sql = "INSERT INTO News VALUES(\"". $title."\",\"".$subtitle."\",\"". $body."\",\"". $image."\",\"".
            $address."\",\"". $date."\",\"". $section_id."\",\"".$publication_id."\",\"".$user_id."\")";
		$resultado=$this->conexion->getConexion()->query($sql);
		return $resultado;
	}
}
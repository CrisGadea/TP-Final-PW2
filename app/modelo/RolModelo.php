<?php 

require_once "helper/Database.php";
require_once "helper/Config.php";

class RolModelo 
{

	private $conexion;

	
	function __construct()
	{
		$this->conexion = Database::createDatabaseFromConfig(new Config("config/config.ini"));    
	}

	public function getRoles()
	{
		$sql="SELECT * from Role";
		$resultado=$this->conexion->getConexion()->query($sql);
		return $resultado;
	}

	public function getRolById($id){
		$sql="SELECT * from Role where id='$id'";
		$resultado=$this->conexion->getConexion()->query($sql);
		foreach ($resultado as $key ) {
			$descripcion=$key["description"];
		}
		
		return $descripcion;
		

	}

	
}


 ?>
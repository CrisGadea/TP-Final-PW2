<?php
require_Once "helper/Database.php";
require_Once "helper/Config.php";

class UsuarioModelo{	
	private $conexion;
	private $usuarios;

	

    public function __construct(){
        $this->conexion = Database::createDatabaseFromConfig(new Config("config/config.ini"));
        $this->usuarios=array();
    }
    public function get_usuarios(){
    
          $resultado=$this->conexion->getConexion()->query("SELECT * FROM User");
         if ($resultado!=null) {
         	  foreach ($resultado as $usuario) {
            $this->usuarios[]=$usuario;

          }
         }
        
          
          return $this->usuarios;
    }
    public function get_usuarioByemail($email){
    		$sql="SELECT * FROM User where email='$email'";

         	$resultado=$this->conexion->getConexion()->query($sql);
          	return $resultado;
         
          
    }

    public function registrarUsuario($username,$email,$password,$address,$city,$rol_id,$subsctiption_id){
    	  $password=password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
    	  $sql="INSERT INTO User VALUES(null, \"".$username."\", \"".$email."\", \"".$password."\", \"".$address."\"".",\"".$city."\",\"".$rol_id."\",\"".$subsctiption_id."\")";
    	echo $sql;
          return $this->conexion->getConexion()->query($sql);
           
          
    }

      public function updateUsuario($username,$email,$id,$password){
    		
    	 $sql="UPDATE User SET ".
				   "username =\"".$username."\",
				   email =\"".$email."\", 
				   password = \"". $password.
				   "\" WHERE id = ".$id;
			
          return $this->conexion->getConexion()->query($sql);
           
      

    }

      public function eliminarUsuario($id){
    		
    	 $sql="DELETE from User where id='$id'";
			 
          return $this->conexion->getConexion()->query($sql);
    }

    public function suscribir($id)
    {
        $sql = "UPDATE User SET role_id = 4, suscription_id = 2 WHERE id=".$id;
        return $this->conexion->getConexion()->query($sql);
    }

}
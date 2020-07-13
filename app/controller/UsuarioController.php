<?php

require_once "modelo/UsuarioModelo.php";


 class UsuarioController 
{
	public function registrarUsuario()
	{	session_start();
		require_once "modelo/CategoriaModelo.php";
		$categorias=new CategoriaModelo();
		$data["categorias"]=$categorias->getCategorias();

		require_once "modelo/EntradasModelo.php";
		$entradas=new EntradasModelo();
		$data["entradas"]=$entradas->getEntradas();

		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$address= $_POST['address'];
		$city= $_POST['city'];
		if ($_SESSION["usuario"]["role_id"]==1) {
			$rolId=3;
		}
		else{
			$rolId=2;
		}
		if ($_SESSION["usuario"]["suscription_id"]!=null) {
			$suscriptionId=$_SESSION["usuario"]["suscription_id"];
		}
		else{
			$suscriptionId=1;
		}

        $usuarioModelo=new UsuarioModelo();
        require_once "modelo/RolModelo.php";
		$rol=new RolModelo();
		$data["role"]=$rol->getRoles();
        $usuarioEncontrado=$usuarioModelo->get_usuarioByemail($email);  
       
		$data["error"]="";
		
		if (mysqli_fetch_assoc($usuarioEncontrado)==null){
			$usuarioGuardado=$usuarioModelo->registrarUsuario($username,$email,$password,$address,$city,$rolId,$suscriptionId);
		}
		else{
			$data["error"]="usuario ya registrado";
			
		}
		require_once "views/principal2.php";
 	}

	public function loginUsuario()
	{
		require_once "modelo/CategoriaModelo.php";
		$categorias=new CategoriaModelo();
		$data["categorias"]=$categorias->getCategorias();
		require_once "modelo/EntradasModelo.php";
		$entradas=new EntradasModelo();
		$data["entradas"]=$entradas->getEntradas();
		$email = $_POST['email'];
		$password = $_POST['password'];
			$usuarioModelo=new UsuarioModelo();

		if(isset($_POST)){
	
			// Borrar error antiguo
			if(isset($_SESSION['error_login'])){
			session_unset($_SESSION['error_login']);
				}
				
			// Recoger datos del formulario
			$email = $_POST['email'];
			$password = $_POST['password'];
			
		
			// Consulta para comprobar las credenciales del usuario
			$usuarioEncontrado=$usuarioModelo->get_usuarioByemail($email);  
		
		  
			
			$usuario = mysqli_fetch_assoc($usuarioEncontrado);

			if ($usuario["role_id"]==1) {
				$verify=($password==$usuario['password']);
			}
			
			// Comprobar la contraseña
			else{
			$verify = password_verify($password, $usuario['password']);
			}

			if($verify){
				// Utilizar una sesión para guardar los datos del usuario logueado
				session_start();
				$_SESSION['usuario'] = $usuario;		
			}
			else{
				// Si algo falla enviar una sesión con el fallo
				$_SESSION['error_login'] = "Login incorrecto!!";
			}

		}
		else{
		// mensaje de error
			$_SESSION['error_login'] = "Login incorrecto!!";
		}
		require_once "views/principal.php";
	} 

	public function mostrarDatosForm()
	{
		session_start();
		require_once "modelo/CategoriaModelo.php";
		$categorias=new CategoriaModelo();
		$data["categorias"]=$categorias->getCategorias();

		require_once "views/mis-datos.php";
 	}

	 public function actualizarUsuario()
	{
 		session_start();
 		require_once "modelo/CategoriaModelo.php";
		$categorias=new CategoriaModelo();
		$data["categorias"]=$categorias->getCategorias();

		require_once "modelo/UsuarioModelo.php";
		$usuarioGuardado=new UsuarioModelo();
		$id=$_SESSION["usuario"]["id"];
		$username=$_POST["username"];
		$password=$_POST["password"];
		$email=$_POST["email"];

		$_SESSION['errores']="";
		$_SESSION['completado']="";
		// Array de errores
		$errores = array();
		
		// Validar los datos antes de guardarlos en la base de datos
		// Validar campo nombre
		if(!empty($username) && !is_numeric($username)){
			$nombre_validado = true;
			$usuarioGuardado=$usuarioGuardado->updateUsuario($username,$email,$id,$password);
		}else{
			$nombre_validado = false;
			$errores['username'] = "El nombre no es válido";
		}
		

		$_SESSION['errores'] = $errores;


		require_once "views/mis-datos.php";

	}

	public function formContenidista()
	{
		session_start();
		require_once "modelo/CategoriaModelo.php";
		$categorias=new CategoriaModelo();
		$data["categorias"]=$categorias->getCategorias();
		require_once "views/formContenedista.php";
	}

 	public function mostrarUsuarios()
 	{
		session_start();
		require_once "modelo/CategoriaModelo.php";
		$categorias=new CategoriaModelo();
		$data["categorias"]=$categorias->getCategorias();
		require_once "modelo/UsuarioModelo.php";
		$usuarioDao=new UsuarioModelo();
		$usuarioDao=$usuarioDao->get_usuarios(); 
		require_once "modelo/dto/UsuarioDto.php";
		require_once "modelo/RolModelo.php";
		$rol=new RolModelo();
		foreach ($usuarioDao as $usuario) {
			$usuariosDto[]=new UsuarioDto($usuario["id"],$usuario["username"],$usuario["email"],$rol->getRolById($usuario["role_id"]));	
		}
		

		$data["usuariosDto"]=$usuariosDto;	

		require_once "views/mostrarUsuarios.php";

 	}

	public function darDeBaja()
	{
		session_start();
		$id=$_GET["id"];			
		require_once "modelo/CategoriaModelo.php";
		$categorias=new CategoriaModelo();
		$data["categorias"]=$categorias->getCategorias();
		
		require_once "modelo/UsuarioModelo.php";
		$usuarioDao=new UsuarioModelo();
		$usuarioEliminado=$usuarioDao->eliminarUsuario($id);
		$usuarios=$usuarioDao->get_usuarios(); 

		require_once "modelo/dto/UsuarioDto.php";
		require_once "modelo/RolModelo.php";
		$rol=new RolModelo();

		foreach ($usuarios as $usuario) {
			$usuariosDto[]=new UsuarioDto($usuario["id"],$usuario["username"],$usuario["email"],$rol->getRolById($usuario["role_id"]));
		}

		$data["usuariosDto"]=$usuariosDto;
		
		require_once "views/mostrarUsuarios.php";
	}

	public function cerrarSesion()
	{
		session_start();

		if(isset($_SESSION['usuario'])){
			session_destroy();
		}

		header("Location: ../index.php");
	}

	public function formSuscribir()
    {
        session_start();
        require_once "modelo/UsuarioModelo.php";
        $usuario=new UsuarioModelo();

        require_once "views/suscribir.php";
    }

    public function suscribir(){
        session_start();
        require_once "modelo/UsuarioModelo.php";
        $usuario=new UsuarioModelo();

        $id = $_SESSION["usuario"]["id"];
        $suscripcion = $usuario->suscribir($id);

        require_once "views/principal.php";


    }

 

}
<?php 


class CategoriasController 

{
	public function crearCategoria()
	{
		
		session_start();
		require_once "modelo/EntradasModelo.php";
		$entradas=new EntradasModelo();
		$data["entradas"]=$entradas->getEntradas();
		$categoriaEncontrada=false;

	  	require_once "modelo/CategoriaModelo.php";
	 	$categoriaModelo=new CategoriaModelo();
	 	$data["categorias"]=$categoriaModelo->getCategorias();

	 	if(isset($_POST)){
		 	$nombre = $_POST['nombre']; 	
			// Array de errores
			$publicacionId=$_POST["publicacion"];
	 		$errores = array();
	
			// Validar los datos antes de guardarlos en la base de datos
			// Validar campo nombre
			if(empty($nombre) || is_numeric($nombre)){
				$errores['nombre'] = "El nombre no es válido";
			}

			foreach ($data["categorias"] as $categoria) {
				if ($categoria['nombre']==$nombre){
					$categoriaEncontrada=true;	
				}
			}

			if(count($errores) == 0 && !$categoriaEncontrada){
				$categoriaModelo->crearCategoria($nombre,$publicacionId);
			}
		}

		require_once "views/principal2.php";
	}

	public function mostrarForm()
	{
		session_start();
		require_once "modelo/PublicacionesModelo.php";
		$publicacion=new PublicacionesModelo();
		$data["publicaciones"]=$publicacion->getPublicaciones();
		require_once "modelo/CategoriaModelo.php";
		$categorias=new CategoriaModelo();
		$data["categorias"]=$categorias->getCategorias();
		require_once "views/crear-categoria.php";
		
    }


	
}
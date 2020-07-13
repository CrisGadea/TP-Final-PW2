<?php 

/**
 * 
 */
class EntradasController 
{
	
	public function getEntradas()
	{
		session_start();
		require_once "modelo/CategoriaModelo.php";
		$categorias=new CategoriaModelo();
		$data["categorias"]=$categorias->getCategoriasByPublicationId($_GET["publicacionId"]);
		require_once "modelo/EntradasModelo.php";
		$entradas=new EntradasModelo();
		$data["entradas"]=$entradas->getEntradas();	
		require_once "views/entradas.php";
	}

	public function getEntradasBySectionId()
	{
		session_start();
		require_once "modelo/CategoriaModelo.php";
		$categorias=new CategoriaModelo();
		$data["categorias"]=$categorias->getCategorias();
		require_once "modelo/EntradasModelo.php";
		$entradas=new EntradasModelo();
		$data["entradas"]=$entradas->getEntradasBySectionId($_GET["id"]);
		require_once "views/entradas.php";
	}

    public function getEntradasByPublicationId()
    {
        session_start();
        require_once "modelo/CategoriaModelo.php";
        $categorias=new CategoriaModelo();
        $data["categorias"]=$categorias->getCategoriasByPublicationId($_GET["id"]);
        require_once "modelo/EntradasModelo.php";
        $entradas=new EntradasModelo();
        $data["entradas"]=$entradas->getEntradasByPublicationId($_GET["id"]);
        require_once "views/principal2.php";
    }

    public function getEntrada()
    {
        session_start();
        require_once "modelo/CategoriaModelo.php";
        $categorias=new CategoriaModelo();
        $data["categorias"]=$categorias->getCategoriasByPublicationId($_GET["id"]);
        require_once "modelo/EntradasModelo.php";
        $entradas=new EntradasModelo();
        $data["entradas"]=$entradas->getEntrada($_GET["id"]);
        require_once "views/principal.php";
    }

	public function mostrarForm()
	{
		session_start();
		require_once "modelo/CategoriaModelo.php";
		$categorias=new CategoriaModelo();
		$publicationId=$_POST["publicacion"];
		$data["categorias"]=$categorias->getCategoriasByPublicationId($publicationId);
		require_once "views/crear-entrada.php";
			
	}

	public function crearEntrada(){
		session_start();
		require_once "modelo/EntradasModelo.php";
		$entradas=new EntradasModelo();
		$data["entradas"]=$entradas->getEntradas();

		require_once "modelo/CategoriaModelo.php";
		$categorias=new CategoriaModelo();
		$data["categorias"]=$categorias->getCategorias();
		if(isset($_POST)){
			require_once "modelo/EntradasModelo.php";
			$entradas=new EntradasModelo();

			session_start();
			$title = $_POST['title'];
			$subtitle = $_POST['subtitle'];
			$body = $_POST['body'];
			$image = $_POST['image'];
			$address = $_POST['address'];
			$section_id = $_POST['section_id'];
			$publication_id = $_POST['publication_id'];
			$user_id = $_POST['user_id'];
		
			// Validación
			$errores = array();
		
			if(empty($titulo)){
				$errores['titulo'] = 'El titulo no es válido';
			}
		
			if(empty($descripcion)){
				$errores['descripcion'] = 'La descripción no es válida';
			}
		
			if(empty($section_id) && !is_numeric($section_id)){
				$errores['categoria'] = 'La categoría no es válida';
			}
		
		
			if(count($errores) == 0){
			
				$entradas->crearEntradas($title, $subtitle, $body, $image, $address, $section_id, $publication_id, $user_id);
			
			}else{

				$_SESSION["errores_entrada"] = $errores;
			
			}
        }
        require_once "views/principal2.php";
	}
	 
	public function buscar()
	{
		require_once "modelo/CategoriaModelo.php";
		$categorias=new CategoriaModelo();
		$data["categorias"]=$categorias->getCategorias();
		require_once "modelo/EntradasModelo.php";
		$entradas=new EntradasModelo();
		$data["entradas"]=$entradas->getEntradas();
		require_once "views/buscar.php";
	}
}
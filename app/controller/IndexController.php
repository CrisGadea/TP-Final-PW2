<?php 

class IndexController 

{
	
	public function index()
		
	{  
		session_start();
		require_once "modelo/PublicacionesModelo.php";
		$publicacion = new PublicacionesModelo();
		
		if ($_SESSION["usuario"]["role_id"]!=2) {
			$data['publicaciones']=$publicacion->getPublicaciones();
		}
		else{
			$data['publicaciones']= $publicacion->getPublicacionesBySuscrptionFree();
		}
		
		require_once "views/principal.php";
	}

}
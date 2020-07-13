<?php
require_once "helper/Database.php";
require_once "helper/Config.php";

class PublicacionController
{
    public function getPublicaciones()
    {
       session_start();
		require_once "modelo/PublicacionesModelo.php";
		$publicacion = new PublicacionesModelo();
		$data['publicaciones']= $publicacion->getPublicacionesBySuscrptionFree();
		require_once "views/principal.php";
    }

    public function crearPublicacion()
    {
    	session_start();
    	$error["usuario"]="";
    	$descripcion=$_POST["description"];
    	$tipo=$_POST["tipo"];
    	if ($tipo=="free") {
    		$subscripcionId=1;
    	}
    	else{
    		$subscripcionId=2;
    	}

    	require_once "modelo/PublicacionesModelo.php";
    	$pubModelo=new PublicacionesModelo();
    	$pubGuardada=$pubModelo->crearPublicacion($descripcion,$tipo,$subscripcionId);

    	if (!$pubGuardada) {
    		$error["usuario"]="fallo al guardar";
    	}
    	require_once "views/principal.php";

    }


  public function mostrarForm()
    {	session_start();
    	require_once "views/formPublicacion.php";
    }
}
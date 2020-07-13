<?php 
require_once "controller/EntradasController.php";
require_once "controller/CategoriasController.php";
require_once "controller/UsuarioController.php";
require_once "config/config.php";
require_once "Router.php";

 if (isset($_GET['controlador'])) {
 	 $controlador=Router::cargarControlador($_GET["controlador"]);
 	 Router::cargarAccion($controlador,$_GET["accion"]);
 }
 else{
	$controlador=Router::cargarControlador(CONTROLADOR_PRINCIPAL);
 	 Router::cargarAccion($controlador,ACCION_PRINCIPAL);
 }

 ?>
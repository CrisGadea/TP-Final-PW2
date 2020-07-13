<?php


class Router{

    public static function cargarControlador($controlador){
        $nombreControlador=ucwords($controlador)."Controller";
        $archivoControlador="controller/".$nombreControlador.".php";

        if (!is_file($archivoControlador)) {
            $archivoControlador="controller/".CONTROLADOR_PRINCIPAL."Controller".".php";
        }
        require_once $archivoControlador;
        $control=new $nombreControlador();
        return $control;
    }

    public static function cargarAccion($controlador,$accion){
        if (isset($accion)&& method_exists($controlador, $accion)){
            $controlador->$accion();
        }
        else{
            $controlador->ACCION_PRINCIPAL;
        }
        
    }
}
<?php 
//controlador base
//Cargamos controladores y acciones
session_start();
require_once 'controller/Controller_login.php'; 

if(!$_GET){
	//no dirigimos al index
	$controller =  new Controller_login();
	call_user_func([$controller, 'view']);

}elseif((isset($_GET['controller']) && isset($_GET['action'])) && ($_GET['controller'] != '' && $_GET['action'] != '')){
	$controller = $_GET["controller"];
	$action = $_GET["action"];
	$controller = "Controller_" . ucwords($controller);
	//importamos el controlador que necesitamos
	require_once("controller/$controller.php");  
	//llamamos la funcion del controlador que necesitamos  
	$controller = new $controller;
	call_user_func([$controller, $action]); 

}else{
	$controller =  new Controller_login();
	call_user_func([$controller, 'error404']);
}
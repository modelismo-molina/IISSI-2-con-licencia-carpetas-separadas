<?php 
	session_start();

	require_once("gestionBD.php");


	if(!isset($_SESSION["formulario"])){
		$formulario['nombre'] = "";
		$formulario['descripcion'] = "";
		$formulario['precio'] = "";
		$formulario['imagen'] = "";
		$formulario['enlaceVideo'] = "";
		

	$_SESSION["formulario"]	= $formulario;
	}

	else{
		$formulario = $_SESSION["formulario"]
	}

?>
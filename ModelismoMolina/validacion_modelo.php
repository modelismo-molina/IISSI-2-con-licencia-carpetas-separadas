<?php 
	session_start();


	require_once("gestionBD.php");

	//Comprobar que se ha rellenado el form
	if(isset($_SESSION["formulario"])){
		$nuevoModelo["imagen"] = $_REQUEST["imagen"];
		$nuevoModelo["descripcion"] = $_REQUEST["descripcion"];
		$nuevoModelo["minidescripcion"] = $_REQUEST["minidescripcion"];
		$nuevoModelo["enlacevideo"] = $_REQUEST["enlacevideo"];
		$nuevoModelo["enlaceproducto"] = $_REQUEST["enlaceproducto"];
		$nuevoModelo["precio"] = $_REQUEST["precio"];
		$nuevoModelo["nombre"] = $_REQUEST["nombre"];


		$_SESSION["formulario"] = $nuevoModelo;
	}

	else
		Header("Location: formulario_tienda.php");


	$conexion = crearConexionBD();
	$errores = validarDatosModelos($conexion,$nuevoModelo);
	cerrarConexionBD($conexion);



	// Si se han detectado errores
	if (count($errores)>0) {
		$_SESSION["errores"] = $errores;
		Header('Location: formulario_tienda.php');
	} else
		Header('Location: accion_alta_modelo.php');



function validarDatosModelos($conexion, $nuevoModelo){
	$errores=array();


	// Validación del precio

	if($nuevoModelo["precio"]==""){
		$errores[] = "<p>El precio no puede estar vacio.</p>";
	}
	else if (!filter_var($nuevoModelo['precio'],  FILTER_VALIDATE_INT)){
		$errores[] = "<p>El precio debe contener solo numeros</p>";
	}



	// Validación del imagen

	if($nuevoModelo["imagen"]==""){
		$errores[] = "<p>La imagen no puede estar vacio.</p>";





	//Validacion de nombre

	if($nuevoModelo["nombre"]==""){
		$errores[] = "<p>El nombre no puede estar vacío</p>";
	}else if (strlen($nuevoModelo["nombre"])>60) {
		$errores[] = "<p>El nombre no puede contener mas de 50 caracteres</p>";
	}




	//Validacion de descripcion
	if($nuevoModelo["descripcion"]=="") {
		$errores[] = "<p>La descripcion no puede estar vacía</p>";
	}else if (strlen($nuevoModelo["descripcion"])>1600) {
		$errores[] = "<p>La descripcion no puede contener mas de 1600 caracteres</p>";
	}




	//Validacion de la minidescripcion
	if ($nuevoModelo["minidescripcion" == ""]){
		$errores[] = "<p>La minidescripcion no puede estar vacía</p>";
	
	}else if (strlen($nuevoModelo["minidescripcion"])>60) {
		$errores[] = "<p>La minidescripcion no puede contener mas de 60 caracteres</p>";
	}


	return $errores;
}
?>
<?php	
	session_start();	
	
	if (isset($_SESSION["modelo"])) {
		$modelo = $_SESSION["modelo"];
		unset($_SESSION["modelo"]);
		
		require_once("gestionBD.php");
		require_once("gestionarModelos.php");
		
		$conexion = crearConexionBD();		
		$excepcion = actualizarModelo($conexion,$modelo["IDMODELO"],$modelo["MINIDESCRIPCION"],$modelo["PRECIO"],$modelo["NOMBRE"]);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "consulta_modelo.php";
			Header("Location: excepcion.php");
		}
		else
			Header("Location: consulta_modelo.php");
	} 
	else Header("Location: consulta_modelo.php"); // Se ha tratado de acceder directamente a este PHP


	$errores = validarDatosModelos($conexion,$modelo);
	
	cerrarConexionBD($conexion);



	// Si se han detectado errores
	if (count($errores)>0) {
		$_SESSION["errores"] = $errores;
		Header('Location: consulta_modelo.php');
	} else
		Header('Location: accion_modificar_modelo.php');



function validarDatosModelos($conexion, $modelo){
	$errores=array();


	// Validación del precio

	if($modelo["PRECIO"]==""){
		$errores[] = "<p>El PRECIO no puede estar vacio.</p>";
	}
	else if (!filter_var($modelo['PRECIO'],  FILTER_VALIDATE_INT)){
		$errores[] = "<p>El precio debe contener solo numeros</p>";
	}





	//Validacion de nombre

	if($modelo["NOMBRE"]==""){
		$errores[] = "<p>El nombre no puede estar vacío</p>";
	}else if (strlen($modelo["NOMBRE"])>60) {
		$errores[] = "<p>El nombre no puede contener mas de 50 caracteres</p>";
	}


	//Validacion de la minidescripcion
	if ($modelo["MINIDESCRIPCION" == ""]){
		$errores[] = "<p>La minidescripcion no puede estar vacía</p>";
	
	}else if (strlen($modelo["MINIDESCRIPCION"])>60) {
		$errores[] = "<p>La minidescripcion no puede contener mas de 60 caracteres</p>";
	}


	return $errores;
}
?>

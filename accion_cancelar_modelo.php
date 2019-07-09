<?php	
	session_start();	
	
	if (isset($_SESSION["modelo"])) {
		$modelo = $_SESSION["modelo"];
		unset($_SESSION["modelo"]);
		
		require_once("gestionBD.php");
		
		$conexion = crearConexionBD();
		cerrarConexionBD($conexion);


		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "consulta_modelo.php";
			Header("Location: excepcion.php");
		}
		else Header("Location: consulta_modelo.php");
	}
	else Header("Location: consulta_modelo.php"); // Se ha tratado de acceder directamente a este PHP
?>
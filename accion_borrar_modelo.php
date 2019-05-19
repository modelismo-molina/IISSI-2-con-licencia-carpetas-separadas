<?php	
	session_start();	
	
	if (isset($_SESSION["modelos"])) {
		$modelos = $_SESSION["modelos"];
		unset($_SESSION["modelos"]);
		
		require_once("gestionBD.php");
		require_once("gestionarModelos.php");
		
		$conexion = crearConexionBD();		
		$excepcion = eliminarModelo($conexion,$modelos["IdModelo"]);
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

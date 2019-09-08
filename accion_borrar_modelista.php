<?php	
	session_start();	
	
	if (isset($_SESSION["modelistas"])) {
		$modelos = $_SESSION["modelistas"];
		unset($_SESSION["modelos"]);
		
		require_once("gestionBD.php");
		require_once("gestionarModelistas.php");
		
		$conexion = crearConexionBD();		
		$excepcion = eliminarModelo($conexion,$modelos["IdModelistas"]);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "consulta_modelo.php";
			Header("Location: excepcion.php");
		}
		// else Header("Location: consulta_modelistas.php");
	}
	// else Header("Location: consulta_modelistas.php"); // Se ha tratado de acceder directamente a este PHP
	
	//DELETE FROM MODELISTAS WHERE dni = '$dni'
	
?>

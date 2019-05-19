<?php	
	session_start();	
	
	if (isset($_SESSION["modelos"])) {
		$modelos = $_SESSION["modelos"];
		unset($_SESSION["modelos"]);
		
		require_once("gestionBD.php");
		require_once("gestionarModelo.php");
		
		$conexion = crearConexionBD();		
		$excepcion = actualizarModelo($conexion,$modelos["IdModelo"],$modelos["imagen"],$modelos["IdUsuario"],$modelos["IdModelista"],$modelos["descripcion"],$modelos["enlaceVideo"],$modelos["enlaceProductos"],$modelos["precio"],$modelos["nombre"]);
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
?>

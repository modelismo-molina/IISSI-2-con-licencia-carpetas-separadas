 <?php	
 session_start();	
	
	
	if (isset($_SESSION["propuesta"])) {
		$propuesta = $_SESSION["propuesta"];
		unset($_SESSION["propuesta"]);
		
		require_once("gestionBD.php");
		
		$conexion = crearConexionBD();		
		cerrarConexionBD($conexion);
		
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "consulta_propuestas.php";
			Header("Location: excepcion.php");
		}
		else Header("Location: consulta_propuestas.php");
	}
	else Header("Location: consulta_propuestas.php"); // Se ha tratado de acceder directamente a este PHP
?>
			


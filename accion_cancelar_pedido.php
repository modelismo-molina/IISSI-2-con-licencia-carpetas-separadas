 <?php	
 session_start();	
	
	
	if (isset($_SESSION["pedido"])) {
		$propuesta = $_SESSION["pedido"];
		unset($_SESSION["pedido"]);
		
		require_once("gestionBD.php");
		
		$conexion = crearConexionBD();		
		cerrarConexionBD($conexion);
		
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "consulta_pedidos.php";
			Header("Location: excepcion.php");
		}
		else Header("Location: consulta_pedidos.php");
	}
	else Header("Location: consulta_pedidos.php"); // Se ha tratado de acceder directamente a este PHP
?>
			


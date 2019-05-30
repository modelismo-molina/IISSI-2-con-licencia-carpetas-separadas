<?php	
	session_start();	
	
	if (isset($_SESSION["pedido"])) {
		$pedido = $_SESSION["pedido"];
		unset($_SESSION["pedido"]);
		
		require_once("gestionBD.php");
		require_once("gestionarPedidos.php");
		
		$conexion = crearConexionBD();		
		$excepcion = modificar_pedido($conexion,$pedido["IDPEDIDO"],$pedido["ESCALA"],$pedido["MATERIAL"],$pedido["CALIDADDESEADA"],
		$pedido["DESCRIPCION"],$pedido["METODOPAGO"],$pedido["TELEFONO"],$pedido["EMAIL"]);
		
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "consulta_pedidos.php";
			Header("Location: excepcion.php");
		}
		else
			Header("Location: consulta_pedidos.php");
	} 
	else Header("Location: consulta_pedidos.php"); // Se ha tratado de acceder directamente a este PHP
	
	$errores = validarDatosPedido($conexion, $pedido);
	
	cerrarConexionBD($conexion);

?>

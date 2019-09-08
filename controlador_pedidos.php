<?php	
	session_start();
	
	if (isset($_REQUEST["IDPEDIDO"])){
		$pedido["IDPEDIDO"] = $_REQUEST["IDPEDIDO"];
		$pedido["ESCALA"] = $_REQUEST["ESCALA"];
	    $pedido["MATERIAL"] = $_REQUEST["MATERIAL"];
		$pedido["CALIDADDESEADA"] = $_REQUEST["CALIDADDESEADA"];
		$pedido["DESCRIPCION"] = $_REQUEST["DESCRIPCION"];
		$pedido["METODOPAGO"] = $_REQUEST["METODOPAGO"];
		$pedido["TELEFONO"] = $_REQUEST["TELEFONO"];
		$pedido["EMAIL"] = $_REQUEST["EMAIL"];
		
		
		$_SESSION["pedido"] = $pedido;
			
		if (isset($_REQUEST["editar"])) Header("Location: consulta_pedidos.php"); 
		else if (isset($_REQUEST["grabar"])) Header("Location: accion_modificar_pedido.php");
		else if (isset($_REQUEST["borrar"])) Header("Location: accion_borrar_pedido.php");
		else if (isset($_REQUEST["cancelar"])) Header("Location: accion_cancelar_pedido.php");
		 
	}
	else 
		Header("Location: consulta_pedidos.php");

?>

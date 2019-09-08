<?php	
	session_start();
	
	if (isset($_REQUEST["IDMODELO"])){
		$modelo["IDMODELO"] = $_REQUEST["IDMODELO"];
		$modelo["MINIDESCRIPCION"] = $_REQUEST["MINIDESCRIPCION"];
		$modelo["PRECIO"] = $_REQUEST["PRECIO"];
		$modelo["NOMBRE"] = $_REQUEST["NOMBRE"];
		
		$_SESSION["modelo"] = $modelo;
			
		if (isset($_REQUEST["editar"])) Header("Location: consulta_modelo.php");
		else if (isset($_REQUEST["grabar"])) Header("Location: accion_modificar_modelo.php");
		else if (isset($_REQUEST["borrar"]))  Header("Location: accion_borrar_modelo.php"); 
		else if (isset($_REQUEST["cancelar"])) Header("Location: accion_cancelar_modelo.php");	
	}
	else 
		Header("Location: consulta_modelo.php");


?>

<?php	
	session_start();
	
	if (isset($_REQUEST["IDPROPUESTAS"])){
		$propuesta["IDPROPUESTAS"] = $_REQUEST["IDPROPUESTAS"];
		$propuesta["DESCRIPCION"] = $_REQUEST["DESCRIPCION"];
		$propuesta["EMAIL"] = $_REQUEST['EMAIL'];
		
		$_SESSION["propuesta"] = $propuesta;
			
		if (isset($_REQUEST["editar"])) Header("Location: consulta_propuestas.php"); 
		else if (isset($_REQUEST["grabar"])) Header("Location: accion_modificar_propuesta.php");
		else if (isset($_REQUEST["borrar"])) Header("Location: accion_borrar_propuesta.php"); 
		else if (isset($_REQUEST["cancelar"])) Header("Location: accion_cancelar_propuesta.php");
		else if (isset($_REQUEST["publicar"])) Header("Location: form_propuesta.php");

	}
	else 
		Header("Location: consulta_propuestas.php");

?>

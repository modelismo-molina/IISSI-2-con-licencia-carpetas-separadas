<?php	
	session_start();
	
	if (isset($_REQUEST["IDMODELO"])){
		$modelos["IMAGEN"] = $_REQUEST["IMAGEN"];
		$modelos["IDUSUARIO"] = $_REQUEST["IDUSUARIO"];
		$modelos["IDMODELISTA"] = $_REQUEST["IDMODELISTA"];
		$modelos["DESCRIPCION"] = $_REQUEST["DESCRIPCION"];
		$modelos["ENLACEVIDEO"] = $_REQUEST["ENLACEVIDEO"];
		$modelos["ENLACEPRODUCTOS"] = $_REQUEST["ENLACEPRODUCTOS"];
		$modelos["PRECIO"] = $_REQUEST["PRECIO"];
		$modelos["NOMBRE"] = $_REQUEST["NOMBRE"];
		
		$_SESSION["modelos"] = $modelos;
			
		if (isset($_REQUEST["editar"])) Header("Location: consulta_modelo.php"); 
		else if (isset($_REQUEST["grabar"])) Header("Location: accion_modificar_modelo.php");
		else /* if (isset($_REQUEST["borrar"])) */ Header("Location: accion_borrar_modelo.php"); 
	}
	else 
		Header("Location: consulta_modelo.php");

?>

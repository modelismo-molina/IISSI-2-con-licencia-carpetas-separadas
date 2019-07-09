<?php
	session_start();

	// Importar librerías necesarias para gestionar direcciones y géneros literarios
	require_once("gestionBD.php");
		
	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	if (isset($_SESSION["formulario"])) {
		// Recogemos los datos del formulario
		$nuevoPedido["escala"] = $_REQUEST["escala"];
		$nuevoPedido["material"] = $_REQUEST["material"];
	    $nuevoPedido["calidaddeseada"] = $_REQUEST["calidaddeseada"];
		$nuevoPedido["descripcion"] = $_REQUEST["descripcion"];
		$nuevoPedido["metodopago"] = $_REQUEST["metodopago"];
		$nuevoPedido["telefono"] = $_REQUEST["telefono"];
		$nuevoPedido["email"] = $_REQUEST["email"];
		
		// Guardar la variable local con los datos del formulario en la sesión.
		$_SESSION["formulario"] = $nuevoPedido;		
	}
	else // En caso contrario, vamos al formulario
		Header("Location: form_pedido.php");

	// Validamos el formulario en servidor
	$conexion = crearConexionBD(); 
	
	$errores = validarDatosPedido($conexion, $nuevoPedido);
	
	cerrarConexionBD($conexion);
	
	// Si se han detectado errores
	if (count($errores)>0) {
		// Guardo en la sesión los mensajes de error y volvemos al formulario
		$_SESSION["errores"] = $errores;
		Header('Location: form_pedido.php');
	} else
		// Si todo va bien, vamos a la página de acción (inserción de la propuesta en la base de datos)
		Header('Location: accion_publicar_pedido.php');

///////////////////////////////////////////////////////////
// Validación en servidor del formulario de pedido
///////////////////////////////////////////////////////////


function validarDatosPedido($conexion, $nuevoPedido){
	$errores=array();
	// Validación de la escala
	if($nuevoPedido["escala"]==""){
		$errores[] = "<p>La escala no puede estar en blanco</p>";
	} else if (strlen($nuevoPedido["escala"]) > 30){
		$errores[] = "<p>La escala no puede superar los 30 caractéres</p>";
		
	}
	// Validación del material
	if($nuevoPedido["material"]==""){
		$errores[] = "<p>El material no puede estar en blanco</p>";
	} else if (strlen($nuevoPedido["material"]) > 30){
		$errores[] = "<p>El material no puede superar los 30 caractéres</p>";
		
	}
	
	// Validación de la calidad deseada
	if($nuevoPedido["calidaddeseada"]==""){
		$errores[] = "<p>La calidad deseada no puede estar en blanco</p>";
	} else if (strlen($nuevoPedido["calidaddeseada"]) > 30){
		$errores[] = "<p>La calidad deseada no puede superar los 30 caractéres</p>";
		
	}
	
	// Validación de la descripcion
	if($nuevoPedido["descripcion"]==""){
		$errores[] = "<p>La descripcion no puede estar en blanco</p>";
	}else if (strlen($nuevoPedido["descripcion"]) > 2000){
		$errores[] = "<p>La descripcion no puede superar los 2000 caractéres</p>";
		
	}
	
	// Validación del método de pago
	if($nuevoPedido["metodopago"]==""){
		$errores[] = "<p>El método de pago no puede estar en blanco</p>";
		
	} else if (strlen($nuevoPedido["metodopago"]) > 30){
		$errores[] = "<p>El método de pago no puede superar los 30 caractéres</p>";
		
	}
	
	// Validación del teléfono
	if($nuevoPedido["telefono"]==""){
		$errores[] = "<p>El teléfono no puede estar en blanco</p>";
		
	} else if(!preg_match( '/^[6|7][0-9]{8}$/', $nuevoPedido["telefono"])){
		$errores[] = "<p>El teléfono tiene un formato válido:" . $nuevoPedido["telefono"]. "</p>";
		
	}
	
	// Validación del email
	if($nuevoPedido["email"]==""){
		$errores[] = "<p>El email no puede estar en blanco</p>";
	
	}else if (!filter_var($nuevoPedido["email"],FILTER_VALIDATE_EMAIL)){
		$errores[] = "<p>El email es incorrecto. Por favor,ajústese al patrón.</p>";

	}

	

	return $errores;
}




?>


<?php
	session_start();

	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario_modelista
	if (isset($_SESSION["formulario_modelista"])) {
		// Recogemos los datos del formulario_modelista_modelista
		$nuevoModelista["dni"] = $_REQUEST["dni"];
		$nuevoModelista["nombre"] = $_REQUEST["nombre"];
		$nuevoModelista["apellidos"] = $_REQUEST["apellidos"];
		$nuevoModelista["telefono"] = $_REQUEST["telefono"];
		$nuevoModelista["email"] = $_REQUEST["email"];
		$nuevoModelista["fechaNacimiento"] = $_REQUEST["fechaNacimiento"];
		$nuevoModelista["calle"] = $_REQUEST["calle"];
		$nuevoModelista["pass"] = $_REQUEST["pass"];
		$nuevoModelista["confirmpass"] = $_REQUEST["confirmpass"];
		$nuevoModelista["motivos"] = $_REQUEST["motivos"];
	
			
	}else {  // En caso contrario, vamos al formulario altaModelista;
		Header("Location: altaModelista.php");
	}
	
	
	// Guardar la variable local con los datos del formulario_modelista_modelista en la sesión.
	$_SESSION["formulario_modelista"] = $nuevoModelista;
	
	


	// Validamos el formulario_modelista_modelista en servidor 
	
	$errores = validarDatosModelista($nuevoModelista);
	
	
	// Si se han detectado errores
	if (count($errores)>0) {
		// Guardo en la sesión los mensajes de error y volvemos al formulario_modelista_modelista
		$_SESSION["errores"] = $errores;
		Header('Location: altaModelista.php');
	} else {
		// Si todo va bien, vamos a la página de éxito (inserción del usuario en la base de datos)
		Header('Location: accion_alta_modelista.php');
}

	///////////////////////////////////////////////////////////
	// Validación en servidor del formulario_modelista_modelista de alta de usuario
	///////////////////////////////////////////////////////////
	function validarDatosModelista($nuevoModelista){
		$errores= array();
		// Validación del dni
		if($nuevoModelista["dni"]=="") 
			$errores[] = "<p>El DNI no puede estar vacío</p>";
		else if(!preg_match("/^[0-9]{8}[A-Z]$/", $nuevoModelista["dni"])){
			$errores[] = "<p>El DNI debe contener 8 números y una letra mayúscula: " . $nuevoModelista["dni"]. "</p>";
		}

		// Validación del Nombre			
		if($nuevoModelista["nombre"]=="") 
			$errores[] = "<p>El nombre no puede estar vacío</p>";
	
		// Validación del email
		if($nuevoModelista["email"]==""){ 
			$errores[] = "<p>El email no puede estar vacío</p>";
		}else if(!filter_var($nuevoModelista["email"], FILTER_VALIDATE_EMAIL)){
			$errores[] = $error . "<p>El email es incorrecto: " . $nuevoModelista["email"]. "</p>";
		}
			
		
		// Validación de la contraseña
		if(!isset($nuevoModelista["pass"]) || strlen($nuevoModelista["pass"])<8){
			$errores [] = "<p>Contraseña no válida: debe tener al menos 8 caracteres</p>";
		}else if(!preg_match("/[a-z]+/", $nuevoModelista["pass"]) || 
			!preg_match("/[A-Z]+/", $nuevoModelista["pass"]) || !preg_match("/[0-9]+/", $nuevoModelista["pass"])){
			$errores[] = "<p>Contraseña no válida: debe contener letras mayúsculas y minúsculas y dígitos</p>";
		}else if($nuevoModelista["pass"] != $nuevoModelista["confirmpass"]){
			$errores[] = "<p>La confirmación de contraseña no coincide con la contraseña</p>";
		}
	
		return $errores;
	}

?>


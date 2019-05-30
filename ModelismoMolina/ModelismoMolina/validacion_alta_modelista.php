<?php
	session_start();

	// Importar librerías necesarias para gestionar direcciones y géneros literarios
	require_once("gestionBD.php");
	require_once("gestionar_direcciones.php");

	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	if (isset($_SESSION["formulario"])) {
		// Recogemos los datos del formulario
		$nuevoModelista["nif"] = $_REQUEST["nif"];
		$nuevoModelista["nombre"] = $_REQUEST["nombre"];
		$nuevoModelista["apellidos"] = $_REQUEST["apellidos"];
		$nuevoModelista["email"] = $_REQUEST["email"];
		$nuevoModelista["fechaNacimiento"] = $_REQUEST["fechaNacimiento"];
		$nuevoModelista["municipio"] = $_REQUEST["municipio"];
		$nuevoModelista["provincia"] = $_REQUEST["provincia"];
		$nuevoModelista["calle"] = $_REQUEST["calle"];
		$nuevoModelista["pregunta1"] = $_REQUEST["pregunta1"];
		$nuevoModelista["pregunta2"] = $_REQUEST["pregunta2"];
		$nuevoModelista["enlaces"] = $_REQUEST["enlaces"];
		
	
		// Guardar la variable local con los datos del formulario en la sesión.
		$_SESSION["formulario"] = $nuevoModelista;		
	}
	else // En caso contrario, vamos al formulario
		Header("Location: form_alta_modelista.php");

	// Validamos el formulario en servidor
	$conexion = crearConexionBD(); 
	$errores = validarDatosUsuario($conexion, $nuevoModelista);
	cerrarConexionBD($conexion);
	
	// Si se han detectado errores
	if (count($errores)>0) {
		// Guardo en la sesión los mensajes de error y volvemos al formulario
		$_SESSION["errores"] = $errores;
		Header('Location: form_alta_usuario.php');
	} else
		// Si todo va bien, vamos a la página de acción (inserción del usuario en la base de datos)
		Header('Location: accion_publicar_modelista.php');

///////////////////////////////////////////////////////////
// Validación en servidor del formulario de alta de usuario
///////////////////////////////////////////////////////////
function validarDatosModelista($conexion, $nuevoModelista){
	$errores=array();
	// Validación del NIF
	if($nuevoUsuario["nif"]=="") 
		$errores[] = "<p>El NIF no puede estar vacío</p>";
	else if(!preg_match("/^[0-9]{8}[A-Z]$/", $nuevoUsuario["nif"])){
		$errores[] = "<p>El NIF debe contener 8 números y una letra mayúscula: " . $nuevoUsuario["nif"]. "</p>";
	}

	// Validación del Nombre			
	if($nuevoModelista["nombre"]=="") 
		$errores[] = "<p>El nombre no puede estar vacío</p>";
	
	// Validación del email
	if($nuevoModelista["email"]==""){ 
		$errores[] = "<p>El email no puede estar vacío</p>";
	}else if(!filter_var($nuevoModelista["email"], FILTER_VALIDATE_EMAIL)){
		$errores[] = "<p>El email es incorrecto: " . $nuevoModelita["email"]. "</p>";
	}
		
	// Validación de la dirección
	if($nuevoModelista["calle"]==""){
		$errores[] = "<p>La dirección no puede estar vacía</p>";	
	}
	
	// Validar municipio y provincia
	$error = validarProvinciaMunicipio($conexion, $nuevoModelista["provincia"], $nuevoModelista["municipio"]);
	if($error!="")
		$errores[] = $error;
	
	//Validar la contestación a las preguntas
	if($nuevoModelista["pregunta1"] ==""){
		$errores[]= "<p> La primera pregunta ha de estar contestada</p>";
	} else if($nuevoModelista["pregunta2"] ==""){
		$errores[]= "<p> La segunda pregunta pregunta ha de estar contestada</p>";
			
		}
				
			
		
// Comprueba que la pareja municipio-provincia están en la BD
function validarProvinciaMunicipio($conexion, $provincia, $municipio){
	$error="";
	$mun = buscarMunicipioProvincia($conexion, $provincia, $municipio);
	$cont = 0;
	foreach($mun as $m){
		$cont = $cont + 1;
	}
	
	if($cont != 1){
		$error =  "<p>El municipo y la provincia no son válidos</p>";
	}
	return $error;
}

?>


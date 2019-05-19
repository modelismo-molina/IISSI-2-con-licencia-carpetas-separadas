<?php
	session_start();

	require_once("gestionBD.php");

	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	if (isset($_SESSION["formulario"])) {
		// Recogemos los datos del formulario
		$formulario["Opcion"] = $_REQUEST["Opcion"];
	
		
		// Guardar la variable local con los datos del formulario en la sesión.
		$_SESSION["formulario"] = $nuevaEncuesta;		
	}
	else // En caso contrario, vamos al formulario
		Header("Location: encuestas.php");

	// Validamos el formulario en servidor
	$conexion = crearConexionBD(); 
	$errores = validarDatosUsuario($conexion, $nuevaEncuesta);
	cerrarConexionBD($conexion);
	
	// Si se han detectado errores
	if (count($errores)>0) {
		// Guardo en la sesión los mensajes de error y volvemos al formulario
		$_SESSION["errores"] = $errores;
		Header('Location: encuestas.php');
	} else
		// Si todo va bien, vamos a la página de acción (inserción del usuario en la base de datos)
		Header('Location: accion_alta_usuario.php');

///////////////////////////////////////////////////////////
// Validación en servidor del formulario de alta de usuario
///////////////////////////////////////////////////////////
function validarDatosUsuario($conexion, $nuevaEncuesta){
	$errores=array();
		
	// Validación de respuesta encuesta
	if($nuevoUsuario["Opcion"] != "Opcion1" &&
		$nuevoUsuario["Opcion"] != "Opcion2" &&
		$nuevoUsuario["Opcion"] != "Opcion3" &&
		$nuevoUsuario["Opcion"] != "Opcion4") {
		$errores[] = "<p>Debe de elegir una de las cuatro opciones para realizar la encuesta.</p>";
	}
		
	return $errores;
}
?>


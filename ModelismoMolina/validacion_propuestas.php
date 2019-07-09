<?php
	session_start();

	// Importar librerías necesarias para gestionar direcciones y géneros literarios
	require_once("gestionBD.php");

	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	if (isset($_SESSION["formulario"])) {
		// Recogemos los datos del formulario
		$nuevaPropuesta["propuesta"] = $_REQUEST["propuesta"];
		$nuevaPropuesta["nombre"] = $_REQUEST["nombre"];
		$nuevaPropuesta["apellidos"] = $_REQUEST["apellidos"];
		
		
		// Guardar la variable local con los datos del formulario en la sesión.
		$_SESSION["formulario"] = $nuevaPropuesta;		
	}
	else // En caso contrario, vamos al formulario
		Header("Location: form_propuesta.php");

	// Validamos el formulario en servidor
	$conexion = crearConexionBD(); 
	$errores = validarDatosPropuesta($conexion, $nuevaPropuesta);
	cerrarConexionBD($conexion);
	
	// Si se han detectado errores
	if (count($errores)>0) {
		// Guardo en la sesión los mensajes de error y volvemos al formulario
		$_SESSION["errores"] = $errores;
		Header('Location: form_propuesta.php');
	} else
		// Si todo va bien, vamos a la página de acción (inserción del usuario en la base de datos)
		Header('Location: accion_publicar_propuesta.php');

///////////////////////////////////////////////////////////
// Validación en servidor del formulario de alta de usuario
///////////////////////////////////////////////////////////
function validarDatosPropuesta($conexion, $nuevoUsuario){
	$errores=array();
	// Validación del NIF
	if($nuevoUsuario["propuesta"]=="") 
		$errores[] = "<p>La propuesta no puede estar en blanco</p>";


	// Validación del Nombre			
	if($nuevoUsuario["nombre"]=="") 
		$errores[] = "<p>El nombre no puede estar vacío</p>";
	
	
	return $errores;
}




?>


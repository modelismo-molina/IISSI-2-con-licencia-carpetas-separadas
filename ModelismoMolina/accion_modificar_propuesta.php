 <?php	
	session_start();	
	
	if (isset($_SESSION["propuesta"])) {
		$propuesta = $_SESSION["propuesta"];
		unset($_SESSION["propuesta"]);
		
		require_once("gestionBD.php");
		require_once("gestionarPropuestas.php");
		
		$conexion = crearConexionBD();		
		$excepcion = modificar_propuesta($conexion,$propuesta["IDPROPUESTAS"],$propuesta["DESCRIPCION"]);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "consulta_propuestas.php";
			Header("Location: excepcion.php");
		}
		else
			Header("Location: consulta_propuestas.php");
	} 
	else Header("Location: consulta_propuestas.php"); // Se ha tratado de acceder directamente a este PHP
		
	$errores = validarDatosPropuesta($conexion, $propuesta);
	
	cerrarConexionBD($conexion);
	
	// Si se han detectado errores
	if (count($errores)>0) {
		// Guardo en la sesión los mensajes de error y volvemos al formulario
		$_SESSION["errores"] = $errores;
		Header('Location: consulta_propuestas.php');
	} else
		// Si todo va bien, vamos a la página de acción (inserción de la propuesta en la base de datos)
		Header('Location: accion_modificar_propuesta.php');

///////////////////////////////////////////////////////////
// Validación en servidor de la modificacion
///////////////////////////////////////////////////////////


function validarDatosPropuesta($conexion, $propuesta){
	$errores=array();
	// Validación de la propuesta
	if($propuesta["descripcion"]==""){
		$errores[] = "<p>Error en la modificacion</p>";
		
	}else if (strlen($propuesta["descripcion"]) > 500){
		$errores[] = "<p>Error en la modificación</p>";
		
	}
	

	return $errores;
}


	
?>

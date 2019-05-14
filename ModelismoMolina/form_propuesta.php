<?php
	session_start();
	//Crear en la sesión un mapa o una variable array asociativo (php) con el nommbre usuario o ID y como valor el número de peticiones que ha realizado
	
	// Importar librerías necesarias 
	require_once("gestionBD.php");

	
	// Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
	if (!isset($_SESSION["formulario"])) {
		$formulario['propuesta'] = "";
		$formulario['nombre'] = "";
		$formulario['apellidos'] = "";
	
		$_SESSION["formulario"] = $formulario;
	}
	// Si ya existían valores, los cogemos para inicializar el formulario
	else
		$formulario = $_SESSION["formulario"];
			
	// Si hay errores de validación, hay que mostrarlos y marcar los campos (El estilo viene dado y ya se explicará)
	if (isset($_SESSION["errores"])){
		$errores = $_SESSION["errores"];
		unset($_SESSION["errores"]);
	}
		
	// Creamos una conexión con la BD
	$conexion = crearConexionBD();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/biblio.css" />
  <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
  <!--<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>-->
  <script src="js/validacion_cliente_alta_usuario.js" type="text/javascript"></script>
  <title>Modelismo Molina: Colgar propuesta</title>
</head>

<body>
	<script>
		// Inicialización de elementos y eventos cuando el documento se carga completamente
		$(document).ready(function() {
			$("#altaPropuesta").on("submit", function() {
				return validateForm();
			});

	</script>
	
	<?php
		include_once("cabecera.php");
	?>
	
	<?php 
		// Mostrar los erroes de validación (Si los hay)
		if (isset($errores) && count($errores)>0) { 
	    	echo "<div id=\"div_errores\" class=\"error\">";
			echo "<h4> Errores en el formulario:</h4>";
    		foreach($errores as $error){
    			echo $error;
			} 
    		echo "</div>";
  		}
	?>
	
	<form id="altaPropuesta" method="get" action="validacion_propuestas.php"
		>
		<!--novalidate-> 
		<!--onsubmit="return validateForm()"-->   
		<p><i>Por favor,introduzca los datos </i><em>*</em></p>
		<TEXTAREA rows="10" cols="100" name="propuesta" value= "<?php echo $formulario['propuesta'];?>" required>Su propuesta aquí...</TEXTAREA><BR>
		<div><label for="nombre">Nombre:<em>*</em></label>
		<input id="nombre" name="nombre" type="text" size="40" value="<?php echo $formulario['nombre'];?>" required/>
		</div>
		<div><label for="apellidos">Apellidos:</label>
		<input id="apellidos" name="apellidos" type="text" size="80" value="<?php echo $formulario['apellidos'];?>"/>
		</div>
		<div><input type="submit" value="Enviar" /></div>
		</form>
			
	
	<?php
		include_once("pie.php");
		cerrarConexionBD($conexion);
	?>
	
	</body>
</html>

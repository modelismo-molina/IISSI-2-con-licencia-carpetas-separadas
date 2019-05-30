<?php
	session_start();
	
	// Importar librerías necesarias para gestionar
	require_once("gestionBD.php");
	
	// Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
	if (!isset($_SESSION["formulario"])) {
		$formulario['opcion1'] = "";
		$formulario['opcion2'] = "";
		$formulario['opcion3'] = "";
		$formulario['opcion4'] = "";
		$formulario['Topcion1'] = "";
		$formulario['Topcion2'] = "";
		$formulario['Topcion3'] = "";
		$formulario['Topcion4'] = "";
		
		
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
  <title>Modelismo Molina: Publicación de Encuesta</title>
</head>

<body>
	<script>
		// Inicialización de elementos y eventos cuando el documento se carga completamente
		$(document).ready(function() {
			$("#PublicacionEncuesta").on("submit", function() {
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
	
	<form id="PublicacionEncuesta" method="get" action="validacion_encuesta.php">
		<!--novalidate-> 
		<!--onsubmit="return validateForm()"-->   
		
		<fieldset><legend><h3>Opcion 1</h3> </legend>
			<div></div><label for="Topcion1">Titulo 1<em>*</em></label>
			<div>
			<input id="Topcion1" name="Topcion1" type="text" value="<?php echo $formulario['Topcion1'];?>" required>
			</div>

		<TEXTAREA rows="10" cols="100" name="opcion1" value= "<?php echo $formulario['opcion1'];?>" required></TEXTAREA><BR>
		</fieldset>
		<fieldset><legend>Opción 2</legend>
			<div></div><label for="Topcion2">Titulo 2<em>*</em></label>
			<div>
			<input id="Topcion2" name="Topcion2" type="text" value="<?php echo $formulario['Topcion2'];?>" required>
			</div>

		<TEXTAREA rows="10" cols="100" name="opcion2" value= "<?php echo $formulario['opcion2'];?>" required></TEXTAREA><BR>
		</fieldset>
		<fieldset><legend>Opción 3</legend>
			<div></div><label for="Topcion3">Titulo 3<em>*</em></label>
			<div>
			<input id="Topcion3" name="Topcion3" type="text" value="<?php echo $formulario['Topcion3'];?>" required>
			</div>

		<TEXTAREA rows="10" cols="100" name="opcion3" value= "<?php echo $formulario['opcion3'];?>" required></TEXTAREA><BR>
		</fieldset>
		<fieldset><legend>Opción 4</legend>
			<div></div><label for="Topcion1">Titulo 4<em>*</em></label>
			<div>
			<input id="Topcion4" name="Topcion4" type="text" value="<?php echo $formulario['Topcion4'];?>" required>
			</div>

		<TEXTAREA rows="10" cols="100" name="opcion4" value= "<?php echo $formulario['opcion4'];?>" required></TEXTAREA><BR>
		</fieldset>
		<div><input type="submit" value="Enviar" /></div>
		</form>
			



	<?php
		include_once("pie.php");
		cerrarConexionBD($conexion);
	?>
	
	</body>
</html>

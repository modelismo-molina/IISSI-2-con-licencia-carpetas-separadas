<?php
	session_start();
	
	// Importar librerías necesarias 
	require_once("gestionBD.php");
	
	// Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
	if (!isset($_SESSION["formulario"])) {
		$formulario['descripcion'] = "";
		$formulario['email'] = "";
		
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
  <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
  <script src="js/validacion_cliente_alta_propuesta2.js" type="text/javascript"></script>


  <title>Modelismo Molina: Colgar propuesta</title>
</head>

<body>

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
	
	<form id="altaPropuesta" method="get" action="validacion_propuestas.php" onsubmit="return validacion()">
		<!--novalidate-> 
		<!--onsubmit="return validacion()"-->   
		
		<p><i>Por favor,introduzca los datos </i><em></em></p>
		
		<TEXTAREA id= "descripcion" rows="10" cols="100" name="descripcion" placeholder="Su propuesta aquí...(No mas de 500 caracteres)" value= "<?php echo $formulario['descripcion'];?>" required></TEXTAREA><BR>
		<input id= "email" name="email" type="text" size="40" title="email" placeholder="usuario@dominio.extension" value="<?php echo $formulario['email'];?>" required/>
		
		<div><input type="submit" value="Enviar" /></div>
		</form>
			
	
	<?php
		cerrarConexionBD($conexion);
	?>
	
	</body>
</html>

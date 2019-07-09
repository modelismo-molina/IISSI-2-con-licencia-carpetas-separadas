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
  <link rel="icon" type="image/png" href="images/M.png" />
  <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
  <script src="js/validacion_cliente_alta_propuesta2.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="css/styleRegistroPropuesta.css" />



  <title>Modelismo Molina: Colgar propuesta</title>
</head>

<body>
	<header id="header">
		<div class="shell">
			
			<a href="consulta_propuestas.php" id="atras"><img src="images/flechaizquierda.png" alt="FlechaParaVolverAtras" width="50"></a>

			<a href="index.php"><img src="images/odelismo.png" alt="Logotipo" width="180"></a>
			
		</div>
	</header>

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
<main>
	<section class="articles">
			<article>
				<fieldset>
				<form id="altaPropuesta" method="get" action="validacion_propuestas.php" onsubmit="return validacion()">
				 <!--novalidate-> 
				 <!--onsubmit="return validacion()"-->   
				
				<p><i><h2>Por favor,introduzca los datos</h2> </i><em></em></p>
				
				<TEXTAREA id= "descripcion" rows="10" cols="100" name="descripcion" placeholder="Su propuesta aquí...(No mas de 500 caracteres)" value= "<?php echo $formulario['descripcion'];?>" required></TEXTAREA><BR></BR>
				<input id= "email" name="email" type="text" size="40" title="email" placeholder="usuario@dominio.extension" value="<?php echo $formulario['email'];?>" required/>
				
				<div><input type="submit" value="Enviar" /></div>
				</form>
			</fieldset>

	        </article>
		</section>
	</main>
	<?php
				cerrarConexionBD($conexion);
	?>

</body>
</html>
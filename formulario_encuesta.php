<?php 
	session_start();

	require_once("gestionBD.php");

	// Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
	if (!isset($_SESSION["formulario"])) {
		$formulario['Opcion1'] = "";
		$formulario['Opcion2'] = "";
		$formulario['Opcion3'] = "";
		$formulario['Opcion4'] = "";
		$formulario['TOpcion1'] = "";
		$formulario['TOpcion2'] = "";
		$formulario['TOpcion3'] = "";
		$formulario['TOpcion4'] = "";
	
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
  <link rel="stylesheet" type="text/css" href="css/styleRegistro.css" />
  <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
  <!--<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>-->
  <script src="js/validacion_cliente_alta_usuario.js" type="text/javascript"></script>
  <title>Modelismo molina: publicacion de encuestas</title>
</head>

<body>

	<header id="header">
		<div class="shell">
			
			<a href="encuestas.php" id="atras"><img src="images/flechaizquierda.png" alt="FlechaParaVolverAtras" width="50"></a>

			<a href="index.php"><img src="images/Berserk_logo.png" alt="Logotipo" width="250"></a>
			
		</div>
	</header>

	<script>
		// Inicialización de elementos y eventos cuando el documento se carga completamente
		$(document).ready(function() {
			$("#publicacionEncuestas").on("submit", function() {
				return validateForm();
			});
			
	</script>
	
	
	
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
				<form id="publicacionEncuestas" method="get" action="validacion_encuestas.php">
		<!--novalidate 
		onsubmit="return validateForm()"-->   

					<fieldset><legend>ENCUESTA 1</legend>
						<div></div><label for="TOpcion1">Titulo1<em>*</em></label>
						<input id="TOpcion1" name="TOpcion1" type="text" value="<?php echo $formulario['TOpcion1'];?>" required>
						</div>

						<TEXTAREA rows="10" cols="100" name="Opcion1" value= "<?php echo $formulario['Opcion1'];?>" required></TEXTAREA><BR>
					</fieldset>

					<fieldset><legend>ENCUESTA 2</legend>
						<div></div><label for="TOpcion1">Titulo2<em>*</em></label>
						<input id="TOpcion1" name="TOpcion2" type="text" value="<?php echo $formulario['TOpcion2'];?>" required>
						</div>

						<TEXTAREA rows="10" cols="100" name="Opcion2" value= "<?php echo $formulario['Opcion2'];?>" required></TEXTAREA><BR>
					</fieldset>

					<fieldset><legend>ENCUESTA 3</legend>
						<div></div><label for="TOpcion1">Titulo3<em>*</em></label>
						<input id="TOpcion1" name="TOpcion3" type="text" value="<?php echo $formulario['TOpcion3'];?>" required>
						</div>

						<TEXTAREA rows="10" cols="100" name="Opcion3" value= "<?php echo $formulario['Opcion3'];?>" required></TEXTAREA><BR>
					</fieldset>

					<fieldset><legend>ENCUESTA 4</legend>
						<div></div><label for="TOpcion4">Titulo4<em>*</em></label>
						<input id="TOpcion1" name="TOpcion1" type="text" value="<?php echo $formulario['TOpcion4'];?>" required>
						</div>

						<TEXTAREA rows="10" cols="100" name="Opcion4" value= "<?php echo $formulario['Opcion4'];?>" required></TEXTAREA><BR>
					</fieldset>
					
					<div><input type="submit" value="Enviar" /></div>
				</form>

			</article>
		</section>
		<aside>
				<h3><a href="#">¡Y Recuerda!</a></h3>
				<p>Su historia se desarrolla en la Tercera Edad del Sol de la Tierra Media, un lugar ficticio poblado por hombres y otras razas antropomorfas como los hobbits, los elfos o los enanos, así como por muchas otras criaturas reales y fantásticas. La novela narra el viaje del protagonista principal, Frodo Bolsón, hobbit de la Comarca, para destruir el Anillo Único y la consiguiente guerra que provocará el enemigo para recuperarlo, ya que es la principal fuente de poder de su creador, el Señor oscuro Sauron.</p>
				<br>
				<img src="images/lego2.png" alt="" width="250">
				<br>
				<br>
				<h3><a href="#">Este es el titulo de mi sitio web</a></h3>
				<p>Su historia se desarrolla en la Tercera Edad del Sol de la Tierra Media, un lugar ficticio poblado por hombres y otras razas antropomorfas como los hobbits, los elfos o los enanos, así como por muchas otras criaturas reales y fantásticas. La novela narra el viaje del protagonista principal, Frodo Bolsón, hobbit de la Comarca, para destruir el Anillo Único y la consiguiente guerra que provocará el enemigo para recuperarlo, ya que es la principal fuente de poder de su creador, el Señor oscuro Sauron.</p>
			</aside>
	</main>

	
	
	<?php
		include_once("Estructura/pie.php");
		cerrarConexionBD($conexion);
	?>
	
	</body>
</html>

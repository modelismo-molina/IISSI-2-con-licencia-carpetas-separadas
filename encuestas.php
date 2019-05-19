<?php  
	session_start();


	require_once("gestionBD.php");

	// Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
	if (!isset($_SESSION["formulario"])) {
		$formulario['Opcion'] = "";

	
		$_SESSION["formulario"] = $formulario;
	}
	// Si ya existían valores, los cogemos para inicializar el formulario
	else{
		$formulario = $_SESSION["formulario"];
	}

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
	<meta charset = "UTF-8">
	<title>Encuestas</title>

	<!--*************************************Crear JS de validacion******************************************-->

	<link rel = "stylesheet" type = "text/css" href = "css/styleEncuestas2.css">
</head>
<body> 	
	<!-- *****************************************************Header*****************************************************-->
	<?php
		include_once("Estructura/cabecera.php");
	?>
	<!-- *****************************************************End Header***************************************************** -->
	
	<main>
		<section class = "main">
			<section class="articles">



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
				<form id="resultadoEncuesta" method="get" action="validacion_encuestas.php">
					<fieldset id="encuesta1">
						<input name="Opcion" type="radio" value="Opcion1" <?php if($formulario['Opcion']=='Opcion1') echo ' checked ';?>/>
							Gandalf, anciano mago y amigo de aventuras del hobbit, se fija en un pequeño anillo que este ha dejado a Frodo y un temor se apodera de él. Tras casi dos décadas de ardua búsqueda, descubre en un antiguo manuscrito que el anillo no es otro que el Anillo único, forjado en los fuegos del Monte del Destino por el Señor Oscuro Sauron para gobernar toda la Tierra Media.
							
						


						
					</fieldset>
					
					<fieldset id="encuesta2">
							Gandalf, anciano mago y amigo de aventuras del hobbit, se fija en un pequeño anillo que este ha dejado a Frodo y un temor se apodera de él. Tras casi dos décadas de ardua búsqueda, descubre en un antiguo manuscrito que el anillo no es otro que el Anillo único, forjado en los fuegos del Monte del Destino por el Señor Oscuro Sauron para gobernar toda la Tierra Media.
							
							</br>
							<label>Perfil:</label>
							<label>
								<button class="button">VOTAR<input name="Opcion" type="radio" value="Opcion2" <?php if($formulario['Opcion']=='Opcion2') echo ' checked ';?>/></button>
								</label>
							<label>


					</fieldset>
					<fieldset id="encuesta1">
						<h2>OPCION 1</h2>
							<p>Gandalf, anciano mago y amigo de aventuras del hobbit, se fija en un pequeño anillo que este ha dejado a Frodo y un temor se apodera de él. Tras casi dos décadas de ardua búsqueda, descubre en un antiguo manuscrito que el anillo no es otro que el Anillo único, forjado en los fuegos del Monte del Destino por el Señor Oscuro Sauron para gobernar toda la Tierra Media.</p>
							
							</br>
							<label>Perfil:</label>
							<label>
								<button class="button">Alumno<input name="Opcion"  type="radio" value="Opcion3" <?php if($formulario['Opcion']=='Opcion3') echo ' checked ';?>/></button>
								</label>
							<label>


					</fieldset>
					<fieldset id="encuesta2">
						<h2>OPCION 1</h2>
							<p>Gandalf, anciano mago y amigo de aventuras del hobbit, se fija en un pequeño anillo que este ha dejado a Frodo y un temor se apodera de él. Tras casi dos décadas de ardua búsqueda, descubre en un antiguo manuscrito que el anillo no es otro que el Anillo único, forjado en los fuegos del Monte del Destino por el Señor Oscuro Sauron para gobernar toda la Tierra Media.</p>
							
							</br>
							<label>Perfil:</label>
							<label>
								<button class="button">Alumno<input name="Opcion" type="radio" value="Opcion4" <?php if($formulario['Opcion']=='Opcion4') echo ' checked ';?>/></button>
								</label>
							<label>


					</fieldset>
					<input type="submit" value="Enviar" />
					</form>
					
					<p class="crearEncuesta"><i>¿Quieres crear una encuesta?:  </i><a href="formulario_encuesta.php"><button class="button">Crear encuesta</button></a>
					</br>
					<i><a href="consulta_encuesta.php">Consultar encuestas</a></i></p>

			</section>
		</section>
	</main>
	<?php
		include_once("Estructura/pie.php");
		cerrarConexionBD($conexion);
	?>
	
</body>
</html>
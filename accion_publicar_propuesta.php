<?php
	session_start();
	error_reporting(0);
	require_once("gestionBD.php");
	require_once("gestionarPropuestas.php");
		
	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	if (isset($_SESSION["formulario"])) {		
		$nuevaPropuesta = $_SESSION["formulario"];
		$_SESSION["formulario"] = null;
		$_SESSION["errores"] = null;
	}
	else 
		Header("Location: form_propuesta.php");	

	$conexion = crearConexionBD(); 

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="images/M.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <!-- Hay que indicar el fichero externo de estilos -->
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="./js/boton.js"></script>
  <title>Modelismo Molina: Propuesta colgada con éxito</title>
</head>

<body>

	<?php
		include_once("Estructura/cabecera.php");
	?>

<main>
	<section class="main">
		<section class="articles">
	<?php if(alta_propuesta($conexion, $nuevaPropuesta)){
	//$_SESSION['propuesta'] = $nuevaPropuesta['descripcion'];
	?>
	<h1> Gracias, <?php echo $nuevaPropuesta["email"]; ?>, por tu propuesta!</h1>
	<div>
		Pulsa <a href="consulta_propuestas.php">aquí</a> para volver al listado de propuestas
	</div>
	<?php } else { ?>
			<h1> La propuesta no se ha guardado bien</h1>
			<div>
				Pulsa <a href="form_propuesta.php">aquí</a> para volver al formulario
			</div>
		</section>
	</section> 
<?php } ?>
</main>
</body>

<?php  
include_once("Estructura/pie.php");

?>
</html>
<?php
	cerrarConexionBD($conexion);
?>


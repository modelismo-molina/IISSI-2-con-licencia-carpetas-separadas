<?php
	session_start();

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
  <title>Modelismo Molina: Publicación de propuesta realizada con éxito</title>
</head>

<body>

	<main>
<?php if(alta_propuesta($conexion, $nuevaPropuesta)){
	//$_SESSION['propuesta'] = $nuevaPropuesta['descripcion'];
	?>
	<h1> Gracias, <?php echo $nuevaPropuesta["email"]; ?>, por tu propuesta!
	<div>
		Pulsa <a href="consulta_propuestas.php">aquí</a> para volver al listado de propuestas
	</div>
	<?php } else { ?>
			<h1> La propuesta no se ha guardado bien</h1>
			<div>
				Pulsa <a href="form_propuesta.php">aquí</a> para volver al formulario
			</div>

<?php } ?>
		
</main>
</body>
</html>
<?php
	cerrarConexionBD($conexion);
?>


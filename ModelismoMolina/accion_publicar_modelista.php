<?php
	session_start();

	require_once("gestionBD.php");
	require_once("gestionarModelistas.php");
		
	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	if (isset($_SESSION["formulario"])) {
		$nuevoUsuario = $_SESSION["formulario"];
		$_SESSION["formulario"] = null;
		$_SESSION["errores"] = null;
	}
	else 
		Header("Location: form_alta_modelista.php");	

	$conexion = crearConexionBD(); 

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Modelismo Molina: Publicación de Modelista realizada con éxito</title>
</head>

<body>
	<?php
		include_once("cabecera.php");
	?>

	<main>
		<?php if (alta_usuario($conexion, $nuevoModelista)) { 
		?>
				<h1>Hola <?php echo $nuevoModelista["nombre"]; ?>, gracias por aplicar a ser modelista.</h1>
				<div >	
					Revisa periódicamente tú email. Nos pondremos en contacto contigo si has conseguido entrar				
				</div>
		<?php } else { ?>
				<h1>Aún estamos revisando los candidatos.</h1>
		<?php } ?>

	</main>

	<?php
		include_once("pie.php");
	?>
</body>
</html>
<?php
	cerrarConexionBD($conexion);
?>


<?php 
	session_start();

	require_once("gestionBD.php");
	require_once("gestionarModelos.php");

	if (isset($_SESSION["formulario"])) {
		$nuevoModelo = $_SESSION["formulario"];
		$_SESSION["formulario"] = null;
		$_SESSION["errores"] = null;
	}
	else
		Header("Location: formulario_tienda.php");

	$conexion = CrearConexionBD();
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
  <meta charset="utf-8">
  <title>Modelo realizado con éxito</title>
</head>

<body>
	<?php
		include_once("Estructura/cabecera.php");
	?>

	<main>
		<section class = "main">
			<section class="articles">
				<article>
				<?php if (altaModelo($conexion, $nuevoModelo)) { 
						//$_SESSION['login'] = $nuevoModelo['nombre'];
				?>
						<h1><?php echo $nuevoModelo["nombre"]; ?> se ha guardado con éxito.</h1>
						<div >	
					   		<a href="consulta_modelo.php"><button class="button">Consultar Modelos</button></a>
						</div>
				<?php } else { ?>
						<h1>El usuario ya existe en la base de datos.</h1>
						<div >	
							Pulsa para volver al <a href="formulario_tienda.php"><button class="button">Formulario</button></a>
						</div>
				<?php } ?>
				</article>
		</section>
	</main>

	<?php
		include_once("estructura/pie.php");
	?>
</body>
</html>
<?php
	cerrarConexionBD($conexion);
?>


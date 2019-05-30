<?php
	session_start();

	require_once("gestionBD.php");
	require_once("gestionarPedidos.php");
		
	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	if (isset($_SESSION["formulario"])) {		
		$nuevoPedido = $_SESSION["formulario"];
		$_SESSION["formulario"] = null;
		$_SESSION["errores"] = null;
	}
	else 
		Header("Location: form_pedido.php");	

	$conexion = crearConexionBD(); 

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Modelismo Molina: Realización de pedido</title>
</head>
<main>
<body>

<?php if(alta_pedido($conexion, $nuevoPedido)){
	//$_SESSION['propuesta'] = $nuevaPropuesta['descripcion'];
	?>
	<h1> Gracias, <?php echo $nuevoPedido["email"]; ?>, por tu pedido!
	<div>
		Pulsa <a href="consulta_pedidos.php">aquí</a> para ver tu pedido
	</div>
	<?php } else { ?>
			<h1> El pedido no se ha guardado bien</h1>
			
			<div>
				Pulsa <a href="form_pedido.php">aquí</a> para volver al formulario
			</div>

<?php } ?>
		
</main>
</body>
</html>
<?php
	cerrarConexionBD($conexion);
?>


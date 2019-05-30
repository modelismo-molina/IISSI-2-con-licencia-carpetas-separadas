<?php 
	session_start();

	require_once("gestionBD.php");


	if(!isset($_SESSION["formulario"])){
		$formulario['imagen'] = "";
		$formulario['descripcion'] = "";
		$formulario['minidescripcion'] = "";
		$formulario['enlacevideo'] = "";
		$formulario['enlaceproducto'] = "";
		$formulario['precio'] = "";
		$formulario['nombre'] = "";
		

	$_SESSION["formulario"]	= $formulario;
	}

	else{
		$formulario = $_SESSION["formulario"];
	}

	//Mostrar si existen errores
	if (isset($_SESSION["errores"])){
		$errores = $_SESSION["errores"];
		unset($_SESSION["errores"]);
	}

	$conexion = crearConexionBD();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/styleRegistro.css" />

  <title>Publicacion Modelo</title>
</head>

<body>

	<header id="header">
		<div class="shell">
			
			<a href="tienda.php" id="atras"><img src="images/flechaizquierda.png" alt="FlechaParaVolverAtras" width="50"></a>

			<a href="index.php"><img src="images/Berserk_logo.png" alt="Logotipo" width="250"></a>
			
		</div>
	</header>
	<div class="erroresValidacion">
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
	</div>
	

	<main>
		<section class="articles">
			<article>
				<form id="altaModelo" method="get" action="validacion_modelo.php">
					<p><i>Los campos obligatorios están marcados con </i>
					<em>*</em></p>


					<fieldset><legend>Datos Principales</legend>
						<div>
						<label for="nombre"><em>*</em>Nombre</label>
						<input type="text" id="nombre" name="nombre" title="Nombre del modelo" size="60" value="<?php echo $formulario['nombre']; ?>" required>
						</div>

						<div>
						<label for="minidescripcion"><em>*</em>Minidescripcion</label>
						<textarea rows="2" cols="100" id="minidescripcion" name="minidescripcion" title="Breve descripcion" placeholder="Breve descripcion del producto" size="60" value="<?php echo $formulario['minidescripcion']; ?>" required></textarea>
						</div>

						<div>
							<label for="descripcion"><em>*</em>Descripcion</label>
							<textarea id="descripcion"rows="10" cols="100" name="descripcion" title="Descripcion detallada" placeholder="Descripcion detallada del modelo(caracteristicas, ventajas de compra...)" size="1600" value= "<?php echo $formulario['descripcion'];?>" required></textarea>
						</div>

						<div>
							<label for="precio">Precio del modelo</label>
							<input type="text" id="precio" name="precio" placeholder="123" title="Precio del modelo" value="<?php echo $formulario['precio']; ?>" >
						</div>

						<div>
							<label for="imagen"><em>*</em>Imagen del modelo</label>
							<input type="text" id="imagen" name="imagen" placeholder="URL de la imagen(donde se encuentre en el server)" title="Imagen del modelo" value="<?php echo $formulario['imagen']; ?>" required>
						</div>
					</fieldset>



					<fieldset><legend>Datos Secundarios</legend>
						<div>
							<label for="enlacevideo">Enlace de video</label>
							<input type="text" id="enlacevideo" name="enlacevideo" placeholder="https://www.youtube.com/?gl=ES" title="Video del modelo" value="<?php echo $formulario['enlacevideo'] ?>">
						</div>

						<div>
							<label for="enlaceproducto">Enlace del Producto</label>
							<input type="text" id="enlaceproducto" name="enlaceproducto" placeholder="https://www.google.com/" title="Modelo" value="<?php echo $formulario['enlaceproducto'] ?>">
						</div>
					</fieldset>
	

					<div><input type="submit" value="Enviar" /></div>
				</form>
				
			</article>
		</section>
	</main>
	<?php
		include_once("Estructura/pie.php");
		cerrarConexionBD($conexion);
	?>

</body>
</html>
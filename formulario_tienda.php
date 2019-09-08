<?php
	error_reporting(0);
	session_start();

	require_once("gestionBD.php");


	if(!isset($_SESSION["formulario"])){
		$formulario['imagen'] = "";
		$formulario['descripcion'] = "";
		$formulario['minidescripcion'] = "";
		$formulario['enlacevideo'] = "";
		$formulario['enlaceproductos'] = "";
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
  <!-- Hay que indicar el fichero externo de estilos -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
  	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
  	<script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>
  	<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
	<link rel="icon" type="image/png" href="images/M.png">
	<script type="text/javascript" src="./js/validacion_cliente_modelo.js"></script>
  	
  	<title>Publicacion Modelos</title>
</head>

<body>

	<header id="header">
		<div class="shell">
			
			<a href="tienda.php" id="atras"><img src="images/flechaizquierda.png" alt="FlechaParaVolverAtras" width="50"></a>

			<a href="index.php"><img src="images/odelismo.png" alt="Logotipo" width="180"></a>
			
		</div>
	</header>
	<div class="erroresValidacionTienda">
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
		
			<section class="articles" id="articlesFormTienda">
				<article id="formularioTienda">
					<form id="altaModelo" method="get" action="validacion_modelo.php" onsubmit="return validacion()">
						<!--novalidate-> 
					 	<!--onsubmit="return validacion()"-->          			 

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
							<script type="text/javascript">
		
		$(document).ready(function(){

    		var max_chars = 60;

    		$('#max').html(max_chars);

    		$('#minidescripcion').keyup(function() {
        				
        				var chars = $(this).val().length;
        				
        				var diff = max_chars - chars;
        				
        				$('#contador1').html(diff);   
    });
});

</script>
							<div id="contador1" style="color: #00007F "></div>
				
							</div>

							<div>
								<label for="descripcion"><em>*</em>Descripcion</label>
								<textarea id="descripcion"rows="10" cols="100" name="descripcion" title="Descripcion detallada" placeholder="Descripcion detallada del modelo(caracteristicas, ventajas de compra...)" size="1600" value= "<?php echo $formulario['descripcion'];?>" required></textarea>
								<script type="text/javascript">
		
		$(document).ready(function(){

    		var max_chars = 1600;

    		$('#max').html(max_chars);

    		$('#descripcion').keyup(function() {
        				
        				var chars = $(this).val().length;
        				
        				var diff = max_chars - chars;
        				
        				$('#contador2').html(diff);   
    });
});

</script>
							<div id="contador2" style="color: #00007F "></div>
							
							</div>

							<div>
								<label for="precio"><em>*</em>Precio del modelo</label>
								<input type="text" id="precio" name="precio" placeholder="123" title="Precio del modelo" value="<?php echo $formulario['precio']; ?>" required >
							</div>

							<div>
								<label for="imagen"><em>*</em>Imagen del modelo</label>
								<input type="text" id="imagen" name="imagen" placeholder="URL de la imagen(donde se encuentre en el server)" title="Imagen del modelo" value="<?php echo $formulario['imagen']; ?>" required>
							</div>
						</fieldset>



						<fieldset><legend>Datos Secundarios</legend>
							<div>
								<label for="enlacevideo">Enlace de video</label>
								<input type="text" id="enlaceVideo" name="enlacevideo" placeholder="https://www.youtube.com/?gl=ES" title="Video del modelo" value="<?php echo $formulario['enlacevideo'] ?>">
							</div>

							<div>
								<label for="enlaceproductos">Enlace del Producto</label>
								<input type="text" id="enlaceProductos" name="enlaceproductos" placeholder="https://www.google.com/" title="Modelo" value="<?php echo $formulario['enlaceproductos'] ?>">
							</div>
						</fieldset>
		

						<div><input type="submit" value="Enviar" /></div>
					</form>
					
				</article>

			</section>
			
		<br><br>
		<aside>

            <h2> A la hora de crear un producto recuerda...</h2>
			<h3> -El simbolo del euro (€) se introduce automaticamente. <br>No es necesario que lo pongas.</h3>
			<h3> -La imagen debe pertenecer a nuestro servidor, deberas escribir la direccion URL donde se encuentre.</h3>
			<h3> -La mini descripcion aparecera en la tienda, y la descripcion cuando el cliente visialice el producto.</h3>
			<br>
			<h2>Muchas gracias por realizar un producto en nuestra pagina... :)</h2>
			<img src="images/signing.png"  width="250" align="center">

 

 		</aside>
	</main>
	<?php
		include_once("Estructura/pie.php");
		cerrarConexionBD($conexion);
	?>

</body>
</html>
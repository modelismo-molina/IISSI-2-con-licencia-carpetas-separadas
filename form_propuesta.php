<?php
error_reporting(0);
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <!-- Hay que indicar el fichero externo de estilos -->
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
  <script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="./js/validacion_cliente_alta_propuesta2.js"></script>

  <title>Modelismo Molina: Colgar una propuesta</title>
</head>

<body>

<?php
		include_once("Estructura/cabecera.php");
	?>
	
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
	<section class="main">
	<section class="articles" id="articlesFormPropuesta">
			
			<article id="formularioPropuesta">
			
			<form id="altaPropuesta" method="get" action="validacion_propuestas.php" onsubmit="return validacion()">
				 	<!--novalidate-> 
				 	<!--onsubmit="return validacion()"-->   
				
							<p><i><h2>Por favor,introduzca los datos</h2> </i><em></em></p>
							
							<TEXTAREA id= "descripcionProp" rows="10" cols="100" name="descripcion" placeholder="Su propuesta aquí...(No mas de 500 caracteres). El contador de caracteres aparecerá abajo" value= "<?php echo $formulario['descripcion'];?>" required></TEXTAREA><BR></BR>
							<script type="text/javascript">
		
		$(document).ready(function(){

    		var max_chars = 500;

    		$('#max').html(max_chars);

    		$('#descripcionProp').keyup(function() {
        				
        				var chars = $(this).val().length;
        				
        				var diff = max_chars - chars;
        				
        				$('#contador').html(diff);   
    });
});

</script>
							<div id="contador" style="color: #00007F "></div>
							<input id= "emailProp" name="email" type="text" size="40" title="email" placeholder="usuario@dominio.extension" value="<?php echo $formulario['email'];?>" required/>
							<div><input type="submit" id="EnviarPropuesta" value="Enviar" /></div>
								
					</form>



			</article>
		
		</section>
	</section>
	</main>
	
	<?php
				cerrarConexionBD($conexion);
	?>

</body>

</html>
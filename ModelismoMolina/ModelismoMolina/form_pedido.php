<?php
	session_start();
	
	// Importar librerías necesarias para gestionar direcciones y géneros literarios
	require_once("gestionBD.php");;
	
	// Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
	if (!isset($_SESSION["formulario"])) {
		$formulario['escala'] = "";
		$formulario['material'] = "";
		$formulario['calidad'] = "";
		$formulario['precioi'] = "";
		$formulario['preciof'] = "";
		$formulario['peana'] = "";
		$formulario['comentario'] = "";
		$formulario['foto'] = "";
		
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
  <link rel="stylesheet" type="text/css" href="css/biblio.css" />
  <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
  <!--<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>-->
  <script src="js/validacion_cliente_alta_usuario.js" type="text/javascript"></script>
  <title>Gestión de Biblioteca: Alta de Usuarios</title>
</head>

<body>
	<script>
		// Inicialización de elementos y eventos cuando el documento se carga completamente
		$(document).ready(function() {
			$("#altaUsuario").on("submit", function() {
				return validateForm();
			});
	</script>
	
	<?php
		include_once("cabecera.php");
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
	
	<form id="Pedido" method="get" action="validacion_pedido.php"
		>
		<!--novalidate-> 
		<!--onsubmit="return validateForm()"-->   
		<p><i>Los campos obligatorios están marcados con </i><em>*</em></p>
		<fieldset><legend>Datos personales</legend>
			<div></div><label for="escala">Escala<em>*</em></label>
			<input id="escala" name="escala" type="text" title="Escala del modelo (1:500,1:50...)" value="<?php echo $formulario['escala'];?>" required>
			</div>

			<div><label for="material">Material:<em>*</em></label>
			<input id="material" name="material" type="text" size="40" title="Tipo del material del modelo" value="<?php echo $formulario['material'];?>" required/>
			</div>

			<div><label for="calidad">Calidad deseada:</label>
			<select id="calidad" name="calidad" value="<?php echo $formulario['calidad'];?>">
		    <option value="1">Calidad Baja:Imprimación y tratamiento con tintas. Ideal para uso constante (Juegos de mesa,rol...)</option> 
            <option value="2">Calidad Media-baja:Imprimación y algunos colores básicos, así como tratamiento con tintas. Ideal para uso continuado pero no tan constante </option> 
            <option value="3">Calidad Media: Imprimación y maás detalles que calidad media-baja. Ideal para uso esporádico</option>
            <option value="4">Calidad Media-Alta: Ideal para jugar torneos donde dan premios a la calidad de pintura</option> 
            <option value="5">Calidad Alta: Exclusivamente para exposición</option> 
				
				
			</select>

		</fieldset>

		<fieldset><legend>Por favor,añade comentarios de como quieres que sea el tratamiento</legend>
			<TEXTAREA rows="10" cols="100" name="comentario" value= "<?php echo $formulario['comentario'];?>" required></TEXTAREA><BR>
			
			
		</fieldset>


		<div><input type="submit" value="Enviar" /></div>
	</form>
	
	<?php
		include_once("pie.php");
		cerrarConexionBD($conexion);
	?>
	
	</body>
</html>

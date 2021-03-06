<?php
	error_reporting(0);
	session_start();
	
	// Importar librerías necesarias para gestionar direcciones y géneros literarios
	require_once("gestionBD.php");
	
	
	// Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
	if (!isset($_SESSION["formulario"])) {
		$formulario['escala'] = "";
		$formulario['material'] = "";
		$formulario['calidaddeseada'] = "";
		$formulario['descripcion'] = "";
		$formulario['metodopago'] = "";
		$formulario['telefono'] = "";
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
  <script type="text/javascript" src="./js/validacion_cliente_alta_pedido.js"></script>

  <title>Modelismo Molina: Realizar un pedido</title>
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
	<section class="articles" id="articlesFormPedido">
		<article>
	<form id="altaPedido" method="get" action="validacion_pedidos.php" onsubmit="return validacion()">
		<!--novalidate-> 
		<!--onsubmit="return validacion()"--> 

		<p><i>Los campos obligatorios están marcados con </i><em>*</em></p>
		<fieldset><legend>Datos del modelo</legend>
			<div></div><label for="escala">Escala:<em>*</em></label>
			<input id="escala" name="escala" type="text" title="Escala del modelo" placeholder="Escala del modelo (1:50,1:72...)" value="<?php echo $formulario['escala'];?>" required>
			</div>

			<div><label for="material">Material:<em>*</em></label>
			<input id="material" name="material" type="text" size="40" title="Tipo del material del modelo" placeholder="Tipp de material del modelo (Resina, Metal...)" value="<?php echo $formulario['material'];?>" required/>
			</div>

			<div><label for="calidaddeseada">Calidad Deseada:<em>*</em></label>
			<input id="calidaddeseada" name="calidaddeseada" type="text" size="40" title="calidaddeseada" placeholder=" Calidad de tratamiento que desea (Baja,Media...)" value="<?php echo $formulario['calidaddeseada'];?>" required/>
			</div>


		</fieldset>

		<fieldset><legend>Por favor,descríbenos como quieres que sea el tratamiento*</legend>
			<TEXTAREA id="descripcionPed" rows="10" cols="100" name="descripcion" placeholder="Escriba su pedido en no más de 2000 caracteres. Se facilita un contador de caracteres abajo." value= "<?php echo $formulario['descripcion'];?>" required></TEXTAREA><BR></BR>
			<script type="text/javascript">

        $(document).ready(function(){

            var max_chars = 2000;

            $('#max').html(max_chars);

            $('#descripcionPed').keyup(function() {

                        var chars = $(this).val().length;

                        var diff = max_chars - chars;

                        $('#contadorPed').html(diff);
    		});
		});

		</script>

		<div id="contadorPed" style="color: #00007F "></div>

			
			
		</fieldset>
		<fieldset><legend>¿Cuál va a ser el método de pago?*</legend>
			<input id="metodopago" name="metodopago" type="text" size="40" title="metodo_pago" placeholder="Método de pago del tratamiento (Efectivo, en materiales...)" value="<?php echo $formulario['metodopago'];?>" required/>
			
			
		</fieldset>
		<fieldset><legend>Por favor,añade un número de móvil para ponernos en contacto contigo en caso de aceptación*</legend>
			<input id="telefono" name="telefono" type="text" size="40" title="Télefono de contacto" placeholder="Teléfono movil con un Whatsapp asociado." value="<?php echo $formulario['telefono'];?>" required/>
			
			
		</fieldset>
		<fieldset><legend>Por favor,añade tu email de usuario*</legend>
			<input id="email" name="email" type="text" size="40" title="email_usuario" placeholder="usuario@dominio.extension" value="<?php echo $formulario['email'];?>" required/>
			
			
		</fieldset>



		<div><input type="submit" id="EnviarPedido" value="Enviar" /></div>
	</form>
</article>
</section>
</body>
	
	<?php
        cerrarConexionBD($conexion);
	?>
	
	</body>
</html>

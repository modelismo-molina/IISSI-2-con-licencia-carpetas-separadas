<?php
	session_start();
	error_reporting(0);

	// Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
	if (!isset($_SESSION['formulario'])) {
		$dni = "";
		$nombre = "";
		$apellidos = "";
		$fechaNacimiento = "";
		$email = "";
		$calle = "";	
		
		$formulario["dni"] = $dni;
		$formulario["nombre"] = $nombre;
		$formulario["apellidos"] = $apellidos;
		$formulario["fechaNacimiento"] = $fechaNacimiento;
		$formulario["email"] = $email;
		$formulario["calle"] = $calle;
		
		
		$_SESSION['formulario'] = $formulario;
	}
	// Si ya existían valores, los cogemos para inicializar el formulario
	else{
		$formulario = $_SESSION['formulario'];
		$dni = $formulario['dni'];
		$nombre = $formulario['nombre'];
		$apellidos= $formulario['apellidos'];
		$fechaNacimiento = $formulario["fechaNacimiento"];
		$email = $formulario["email"];
		$calle = $formulario["calle"];
	}
	// print_r($_SESSION["formulario"]);
	
			
	// Si hay errores de validación, hay que mostrarlos y marcar los campos (El estilo viene dado y ya se explicará)
	if (isset($_SESSION["errores"]))
		$errores = $_SESSION["errores"];
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
  <script type="text/javascript" src="./js/validacion_alta_usuario.js"></script>
</head>
<body> 	
	<!-- *****************************************************Header*****************************************************-->
	<header id="header">
		<div class="shell">
			
			<a href="pre-registro.php" id="atras"><img src="images/flechaizquierda.png" alt="FlechaParaVolverAtras" width="50"></a>

			<a href="index.php"><img src="images/odelismo.png" alt="Logotipo" width="180"></a>
			
		</div>
	</header>
	<!-- *****************************************************End Header***************************************************** -->

	
	</div>
	<main>
		<section class="main">

			<aside>
				
				<br><br>
				<h3><a href="">Registro como usuario</a></h3>
				<p>
				<i>
				El Servicio disponible en este página es la Notificación de Novedades de los contenidos de la página así como el privilegio de adquirir modelos prácticamente exclusivos.
				Puede acceder a los servicios del mismo, introduciendo el nombre de usuario y contraseña con los se haya registrado anteriormente.</i></p>
			</aside>
		 	<section class="articles">
		 		<article>
				 	<form id="altaUsuario" method="get" action="validacion_altaUsuario.php" onsubmit="return validacion()">
						
							
							<?php
								if (isset($_SESSION["errores"])) {
									foreach ($_SESSION["errores"] as $error) {
										echo "<label>$error</label>";
									}
								}
								unset($_SESSION["errores"]);
							?>
							

							<fieldset>
							<legend>
								<h3> Datos personales </h3>
							</legend>
							<label for="dni"><em></em>DNI</label>
							<input id="dni" name="dni" type="text" pattern="^[0-9]{8}[A-Z]" title="Ocho dígitos seguidos de una letra mayúscula" required value="<?php print_r($dni);?>"/>

							<br>
							<br>
							<label for="nombre"><em></em>Nombre:</label>
							<input id="nombre" name="nombre" type="text" size="30" required value="<?php print_r($nombre); ?>"/>
							<br>
							<br>
							<label for="apellidos">Apellidos:</label>
							<input id="apellidos" name="apellidos" type="text" size="30" required  value= "<?php print_r($apellidos);?>"/>
							<br>
							<br>
							<label for="telefono">Teléfono:</label>
							<input id="telefono" name="telefono" type="tel" size="9" required  />
							<br>
							
							<br>

							<label for="fechaNacimiento">Fecha de nacimiento:</label>
							<input type="date" id="fechaNacimiento" name="fechaNacimiento" required  value= "<?php print_r($fechaNacimiento);?>"/>
							<br>
							<br>

							<label for="email"><em></em>Email:</label>
							<input id="email" name="email"  type="email" placeholder="usuario@dominio.extension" required /><br>

							<br>

							<label for="pass"><em></em>Password:</label>
							<input type="password" name="pass" id="pass" placeholder="Mínimo 8 caracteres entre letras y dígitos" required />

							<br>
							<br>
							<label for="confirmpass"> <em></em>Confirmar Password:</label>
							<input type="password" name="confirmpass" id="confirmpass" placeholder="Confirmación de contraseña" required />
							<br>
							<br>

							<label for="calle"><em></em>Calle/Avda.:</label>
							<input id="calle" name="calle" type="text" size="30"   />
							<br>
							<br>
							
						<div><input type="submit" value="Enviar" /></div>
						
					</form>
				</article>
			</section>
		</section>
		
	</main>
	<?php 
		include_once("Estructura/pie.php")
	?>
</body>
</html>
<?php
	session_start();

	// Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
	if (!isset($_SESSION['formulario_modelista'])) {
		$dni = "";
		$nombre = "";
		$apellidos = "";
		$fechaNacimiento = "";
		$email = "";
		$calle = "";	
		$motivos= "";
		
		$formulario_modelista["dni"] = $dni;
		$formulario_modelista["nombre"] = $nombre;
		$formulario_modelista["apellidos"] = $apellidos;
		$formulario_modelista["fechaNacimiento"] = $fechaNacimiento;
		$formulario_modelista["email"] = $email;
		$formulario_modelista["calle"] = $calle;
		$formulario_modelista["motivos"] = $motivos;
		
		$_SESSION['formulario_modelista'] = $formulario_modelista;
	}
	// Si ya existían valores, los cogemos para inicializar el formulario
	else{
		$formulario_modelista = $_SESSION['formulario_modelista'];
		$dni = $formulario_modelista['dni'];
		$nombre = $formulario_modelista['nombre'];
		$apellidos= $formulario_modelista['apellidos'];
		$fechaNacimiento = $formulario_modelista["fechaNacimiento"];
		$email = $formulario_modelista["email"];
		$calle = $formulario_modelista["calle"];
		$motivos = $formulario_modelista["motivos"];
		}
	
			
	// Si hay errores de validación, hay que mostrarlos y marcar los campos (El estilo viene dado y ya se explicará)
	if (isset($_SESSION["errores"]))
		$errores = $_SESSION["errores"];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>Registro Modelista</title>
	<link rel = "stylesheet" type = "text/css" href = "css/styleRegistro.css">
	<link rel="icon" type="image/png" href="images/M.png">
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
	<main>
		<section class = "main">
			<section class="articles">
				<article> <form id="altaModelista" method="get" action="validacion_altaModelista.php">
					<p>
						<i><strong>Los campos obligatorios están marcados con </i><em>*</em></strong>
					</p>
					<fieldset>
						<legend>
							<h3> Datos personales </h3>
						</legend>
						<label for="dni"><em>*</em>DNI</label>
						<input id="dni" name="dni" type="text" value="<?php print_r($dni);?>" pattern="^[0-9]{8}[A-Z]" title="Ocho dígitos seguidos de una letra mayúscula" required>
						<br>

						<label for="nombre"><em>*</em>Nombre:</label>
						<input id="nombre" name="nombre" type="text" size="40" value="<?php print_r($nombre); ?>" required/>
						<br>

						<label for="apellidos">Apellidos:</label>
						<input id="apellidos" name="apellidos" type="text" size="80" required/>
						<br>

						<label for="telefono">Teléfono:</label>
						<input id="telefono" name="telefono" type="tel" size="9" required  />
						
						<br>

						<label for="fechaNacimiento">Fecha de nacimiento:</label>
						<input type="date" id="fechaNacimiento" name="fechaNacimiento" required/>
						<br>

						<label for="email"><em>*</em>Email:</label>
						<input id="email" name="email"  type="email" placeholder="usuario@dominio.extension" required/><br>

						<br>
					</fieldset>
					<br/>
					<fieldset>
						<legend>
							<h3> Datos de Modelista </h3>
						</legend>

						<label for="pass"><em>*</em>Password:</label>
						<input type="password" name="pass" id="pass" placeholder="Mínimo 8 caracteres entre letras y dígitos" required />

						<br>
						<label for="confirmpass"> <em>*</em>Confirmar Password:</label>
						<input type="password" name="confirmpass" id="confirmpass" placeholder="Confirmación de contraseña" required />
						<br>
					<fieldset>
						<legend>
							<h3> ¿Por qué deseas unirte a nosotros?</h3>
							</legend>
							<label for "motivos">Motivos:</label>
							<textarea name="motivos" maxlength="300"></textarea>
					</fieldset>
					
						<br>
					</fieldset>
					<br/>
					<fieldset>
						<legend>
							<h3> Dirección </h3>
						</legend>

						<label for="calle"><em>*</em>Calle/Avda.:</label>
						<input id="calle" name="calle" type="text" size="50"/>
						<br>

						
						<br>
					</fieldset>
					<input type="submit" value="Enviar" />
				</form>
			</article>
		</section>
		<aside>
			<br><br>
			<h3><a href="#">Registro como Modelista</a></h3>
			<p>
			<i>
			El Servicio disponible en este página es la Notificación de Novedades de los contenidos de la página así como el privilegio de adquirir 
			modelos prácticamente exclusivos.
			Puede acceder a los servicios del mismo, introduciendo el nombre de usuario y contraseña con los se haya registrado anteriormente.</i>
			</p>
		</aside>
		</article>
			</section>
		</section>
	</main>
	<?php 
		include_once("Estructura/pie.php")
	?>
	
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>Registro Usuario</title>
	<link rel = "stylesheet" type = "text/css" href = "css/styleRegistro.css">
</head>
<body> 	
	<!-- *****************************************************Header*****************************************************-->
	<header id="header">
		<div class="shell">
			
			<a href="pre-registro.php" id="atras"><img src="images/flechaizquierda.png" alt="FlechaParaVolverAtras" width="50"></a>

			<a href="index.php"><img src="images/Berserk_logo.png" alt="Logotipo" width="250"></a>
			
		</div>
	</header>
	<!-- *****************************************************End Header***************************************************** -->

	
	</div>
	<main>
	 	<section class="articles">
	 		<article>
			 	<form id="altaUsuario" method="get" action="accion_alta_usuario.php">
					<p>
						<i><strong>Los campos obligatorios están marcados con </i><em>*</em></strong>
					</p>
					<fieldset>
						<legend>
							<h3> Datos personales </h3>
						</legend>
						<label for="dni"><em>*</em>DNI</label>
						<input id="dni" name="dni" type="text" pattern="^[0-9]{8}[A-Z]" title="Ocho dígitos seguidos de una letra mayúscula" required>
						<br>

						<label for="nombre"><em>*</em>Nombre:</label>
						<input id="nombre" name="nombre" type="text" size="40" required/>
						<br>

						<label for="apellidos">Apellidos:</label>
						<input id="apellidos" name="apellidos" type="text" size="80" required/>
						<br>

						
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
							<h3> Datos de usuario </h3>
						</legend>
						<label for="idUsuario">idUsuario:</label>
						<input id="idUsuario" name="idUsuario" type="text" size="40" required/>
						<br>

						<label for="pass"><em>*</em>Password:</label>
						<input type="password" name="pass" id="pass" placeholder="Mínimo 8 caracteres entre letras y dígitos" required />

						<br>
						<label for="confirmpass"> <em>*</em>Confirmar Password:</label>
						<input type="password" name="confirmpass" id="confirmpass" placeholder="Confirmación de contraseña" required />
						<br>

					
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
			<h3><a href="#">Registro como usuario</a></h3>
			<p>
			<i>
			El Servicio disponible en este página es la Notificación de Novedades de los contenidos de la página así como el privilegio de adquirir modelos prácticamente exclusivos.
			Puede acceder a los servicios del mismo, introduciendo el nombre de usuario y contraseña con los se haya registrado anteriormente.</i></p>
		</aside>
	</main>
	<?php 
		include_once("Estructura/pie.php")
	?>
</body>
</html>
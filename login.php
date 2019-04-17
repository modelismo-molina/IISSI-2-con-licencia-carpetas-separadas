<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>INICIA SESIÓN</title>
	<link rel = "stylesheet" type = "text/css" href = "styleLogin.css">
	<!--Estos javaScript son copiados para el deslizamiento del slider y su temporizador-->
	<script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>
	<script src="js/jquery.jcarousel.pack.js" type="text/javascript"></script>
	<script src="js/jquery-func.js" type="text/javascript"></script>
</head>
<body> 	
	<!-- *****************************************************Header*****************************************************-->
	<?php 
		include_once("Estructura/cabecera.php")
	?>
	<!-- *****************************************************End Header***************************************************** -->
	<main>		
		<section class = "main">
			<section class="articles">
				<article>
				
					<form id="login-form" method="post" action="" >
						<fieldset>
						<legend>
						<h2 class="login_titulo">Acceso para Clientes</h2>
						</legend>
							<div for="NombreUsuario">Dirección de email:</div>
							<input id="NombreUsuario"  type="text"  size="25"  value="">

							<div >Contraseña:</div>
							<input id="password"  size="25"  type="password">
							</fieldset>
						
					</form>
					<button id="login-submit"  type="submit" class="button">Iniciar Sesión</button>
					<p><a href="Pre-Registro.php"><i>¿Eres nuevo por aquí?</i></a><p>
					
				</article>
				
			</section>
		</section>
	</main>
	<?php 
		include_once("Estructura/pie.php")
	?>
	
</body>
</html>
<?php
	error_reporting(0);
  	session_start();
  	include_once("gestionBD.php");
 	include_once("gestionarUsuarios.php");
	
	if (isset($_POST['submit'])){
		$email= $_POST['email'];
		$pass = $_POST['pass'];

		$conexion = crearConexionBD();

		$consulta = "SELECT COUNT(*) AS TOTAL FROM USUARIOS WHERE EMAIL=:email AND CONTRASEÑA=:pass";
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':email',$email);
		$stmt->bindParam(':pass',$pass);
		$stmt->execute();
		$num_usuarios = $stmt->fetchColumn();

		
		cerrarConexionBD($conexion);	
		if ($num_usuarios == 0) {
			$consultaMod = "SELECT COUNT(*) AS TOTAL FROM MODERADORES WHERE EMAIL=:email AND CONTRASEÑA=:pass";
			$stmtMode = $conexion->prepare($consultaMod);
			$stmtMode->bindParam(':email',$email);
			$stmtMode->bindParam(':pass',$pass);
			$stmtMode->execute();
			$num_moderadores = $stmtMode->fetchColumn();
			if ($num_moderadores == 0) {
				$login = "error";	
			} else {
				$_SESSION["cliente"]["nombre"] = $email;
				$_SESSION['login'] = $email;
				$_SESSION["cliente"]["privilegios"] = 1;
				Header("Location: index.php");
			}
		} else {
			$_SESSION["cliente"]["nombre"] = $email;
			$_SESSION['login'] = $email;
			$_SESSION["cliente"]["privilegios"] = 0;
			Header("Location: index.php");
		}	
	}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>ModelismoMolina: Inicia Sesión</title>
	<link rel = "stylesheet" type = "text/css" href = "css/styleLogin.css">
	<!--Estos javaScript son copiados para el deslizamiento del slider y su temporizador-->
	<script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>
	<script src="js/jquery.jcarousel.pack.js" type="text/javascript"></script>
	<script src="js/jquery-func.js" type="text/javascript"></script>
	<link rel="icon" type="image/png" href="images/M.png">
</head>
<body> 	
	<!-- *****************************************************Header*****************************************************-->
	<?php 
		include_once("Estructura/cabecera.php")
	?>
	<!-- *****************************************************End Header***************************************************** -->
	<main>		
		
	
		<?php 
		if (isset($login)) {
		echo "<div class=\"error\">";
		echo "Error en la contraseña o no existe el usuario.";
		echo "</div>";
	}	
	?>
	
		<section class = "main">
			<section class="articles">
				<article>
				
					<form id="login-form" method="post" action="login.php" >
						<fieldset>
						<legend>
						<h2 class="login_titulo">Acceso para Clientes</h2>
						</legend>
							<div><label for="email">Email: </label><input type="text" name="email" id="email" /></div><br>
							<div><label for="pass">Contraseña: </label><input type="password" name="pass" id="pass" /></div>
							</fieldset>
							
					<input  type="submit" name="submit"   class="button"  value="Iniciar Sesion">
					
					
					</form>
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
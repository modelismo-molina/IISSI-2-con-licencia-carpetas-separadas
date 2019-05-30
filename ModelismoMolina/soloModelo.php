<?php
	session_start();

	require_once ("gestionBD.php");
	require_once ("gestionarModelos.php");

	/*if (!isset($_SESSION['login']))
		Header("Location: login.php");
	else {
		if (isset($_SESSION["modelos"])) {
			$modelos = $_SESSION["modelos"];
			unset($_SESSION["modelos"]);
		}*/
	$conexion = crearConexionBD();

	$datos = consultarUnModelo($conexion,$_GET["id"]);


	cerrarConexionBD($conexion);




?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
  <!-- Hay que indicar el fichero externo de estilos -->
    <link rel="stylesheet" type="text/css" href="css/styleUnModelo.css" />
	<script type="text/javascript" src="./js/boton.js"></script>
  <title>Consulta Modelos</title>
</head>

<body>

	<header id="header">
		<div class="shell">
			
			<a href="tienda.php" id="atras"><img src="images/flechaizquierda.png" alt="FlechaParaVolverAtras" width="50"></a>
			<a href="index.php"><img src="images/Berserk_logo.png" alt="Logotipo" width="250"></a>


			
			<!-- *****************************************************Navigation***************************************************** -->
			<nav id="navigation">
				<ul>
				    <li><a href="index.php">Inicio<span><em></em></span></a></li>
				    <li><a href="tienda.php">Tienda<span><em></em></span></a></li>
				    <li><a href="#">Propuestas<span><em></em></span></a></li>

				    <li><a href="encuestas.php">Encuestas<span><em></em></span></a></li>
				    <li><a href="pedido.php">Pedidos<span><em></em></span></a></li>
				    <li><a href="#"><img src="images/carrito.png" alt="" width="25"/><span><em></em></span></a></li>
				    <li class="last"><a href="login.php">Login<span><em></em></span></a></li>
	   

				</ul>
			</nav>
			<!-- *****************************************************End Navigation***************************************************** -->
			
		</div>
	</header>


	<main>
		<section class = "main">
			<section class="articles">
				<article>

				<?php
					foreach($datos as $fila) {
				

					$mostrarModelo = $fila["IDMODELO"];
				
				?>
					<div id="imagenModelo" class="dato"><img class="imag" src="<?php echo $fila["IMAGEN"]; ?>" alt="GOKU" width="300"></div>

					<article class="producto">
						

						<div class="dato"><h2><b><?php echo $fila["NOMBRE"]; ?></b></h2></div>
						<div class="dato"><em><?php echo $fila["DESCRIPCION"]; ?></em></div>
						<div class="dato"><em><?php echo $fila["PRECIO"]; ?>€</em></div>
						<div class="dato"><em><a  href="<?php echo $fila["ENLACEVIDEO"]; ?>" target="_blank"> Enlace de Video</a></em></div>


					</article>
				</article>

	
			<div class="tabla">

		
			</div>
	</article>
	<?php } ?>
</main>



<?php

include_once ("Estructura/pie.php");
?>

</body>

</html>
<?php
	session_start();

	require_once ("gestionBD.php");
	require_once ("gestionarModelos.php");

	if (isset($_SESSION["modelos"])) {
			$modelos = $_SESSION["modelos"];
			unset($_SESSION["modelos"]);
	}
	
	$conexion = crearConexionBD();

	$datos = consultarUnModelo($conexion,$_GET["id"]);


	cerrarConexionBD($conexion);




?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
  <!-- Hay que indicar el fichero externo de estilos -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
  	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<script type="text/javascript" src="./js/boton.js"></script>
	<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
  	<script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>
  	<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
	<link rel="icon" type="image/png" href="images/M.png">	
  <title>Consulta Modelos</title>
</head>

<body>
<div class="contenedor">
	<header id="header">
		<div class="shell">
			
			<a href="tienda.php" id="atras"><img src="images/flechaizquierda.png" alt="FlechaParaVolverAtras" width="50"></a>
			<a href="index.php"><img src="images/odelismo.png" alt="Logotipo" width="180"></a>


			
			<!-- *****************************************************Navigation***************************************************** -->
			<nav id="navigation">
				<ul class="nav">
					<li><img src="images/nav.png" alt="Menu" width="30">
				    	<ul>
				    		<li><a href="index.php">Inicio<span><em></em></span></a></li>
				    		<li><a href="tienda.php">Tienda<span><em></em></span></a></li>
				    		<li><a href="consulta_propuestas.php">Propuestas<span><em></em></span></a></li>

				    		<li><a href="encuestas.php">Encuestas<span><em></em></span></a></li>
				    		<li><a href="consulta_pedidos.php">Pedidos<span><em></em></span></a></li>
				    		<li><a href="#"><img src="images/carrito.png" alt="" width="25"/><span><em></em></span></a></li>
				    
							<li><a href="<?php if (!isset($_SESSION["cliente"]["nombre"])) { echo 'login.php';} ?>"><?php if (isset($_SESSION["cliente"]["nombre"])) {print_r($_SESSION["cliente"]["nombre"]);} else {echo "Login";}?><span><em></em></span></a></li>

	   						<li class="last"><?php if (isset($_SESSION['login'])) {	?> 
	   						<a href="logout.php">Desconectar</a> <?php } ?></li>
				    	</ul>
				    </li>
				</ul>
			</nav>
			<!-- *****************************************************End Navigation***************************************************** -->
			
		</div>
	</header>


	<main>
		<section class = "main">
			<section class="soloModelo">
				<article>

				<?php
					foreach($datos as $fila) {
				

					$mostrarModelo = $fila["IDMODELO"];
				
				?>
					<div id="imagenSoloModelo" class="datoSoloModelo"><img class="imagSoloModelo" src="<?php echo $fila["IMAGEN"]; ?>" alt="GOKU" width="300"></div>
				</article>

					<article class="productoSoloModelo">
						

						<div class="dato"><h2><b><?php echo $fila["NOMBRE"]; ?></b></h2></div>
						<div class="dato"><em><?php echo $fila["DESCRIPCION"]; ?></em></div>
						<div class="dato"><em><?php echo $fila["PRECIO"]; ?>€</em></div>
						<div class="dato"><em><a  href="<?php echo $fila["ENLACEVIDEO"]; ?>" target="_blank"> Enlace de Video</a></em></div>


					</article>
				

	
			<div class="tabla">

		
			</div>
	</article>
	<?php } ?>
</main>



<?php

include_once ("Estructura/pie.php");
?>
</div>
</body>

</html>
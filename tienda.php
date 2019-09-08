<?php
session_start();
error_reporting(0);
require_once ("gestionBD.php");
require_once ("gestionarModelos.php");
require_once ("paginacion_consulta.php");


/*if (!isset($_SESSION['login']))
	Header("Location: login.php");
else {*/
	
	if (isset($_SESSION["modelos"])) {
		$modelos = $_SESSION["modelos"];
		unset($_SESSION["modelos"]);
	}

	// ¿Venimos simplemente de cambiar página o de haber seleccionado un registro ?
	// ¿Hay una sesión activa?
	if (isset($_SESSION["paginacion"])){
		$paginacion = $_SESSION["paginacion"];
	}
	
	$pagina_seleccionada = isset($_GET["PAG_NUM"]) ? (int)$_GET["PAG_NUM"] : (isset($paginacion) ? (int)$paginacion["PAG_NUM"] : 1);
	$pag_tam = 8;

	if ($pagina_seleccionada < 1) 		$pagina_seleccionada = 1;

	// Antes de seguir, borramos las variables de sección para no confundirnos más adelante
	unset($_SESSION["paginacion"]);

	$conexion = crearConexionBD();

	// La consulta que ha de paginarse
	$query = 'SELECT * FROM MODELOS';

	// Se comprueba que el tamaño de página, página seleccionada y total de registros son conformes.
	// En caso de que no, se asume el tamaño de página propuesto, pero desde la página 1
	$total_registros = total_consulta($conexion, $query);
	$total_paginas = (int)($total_registros / $pag_tam);

	if ($total_registros % $pag_tam > 0)		$total_paginas++;

	if ($pagina_seleccionada > $total_paginas)		$pagina_seleccionada = $total_paginas;

	// Generamos los valores de sesión para página e intervalo para volver a ella después de una operación
	$paginacion["PAG_NUM"] = $pagina_seleccionada;
	$paginacion["PAG_TAM"] = $pag_tam;
	$_SESSION["paginacion"] = $paginacion;

	$filas = consulta_paginada($conexion, $query, $pagina_seleccionada, $pag_tam);

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
  <title>Tienda Modelos</title>
</head>


<body>
<div class="contenedor">

	<?php

	include_once ("Estructura/cabecera.php");
	?>


	<main>
		<section class = "main">
				<section class="seccionTienda">
				<!--*************************Paginacion********************************-->
					 <nav>

						<div id="enlaces">
							<?php
								for( $pagina = 1; $pagina <= $total_paginas; $pagina++ )
									if ( $pagina == $pagina_seleccionada) { 	?>
										<span class="current"><?php echo $pagina; ?></span>
							<?php }	else { ?>
										<a class="paginadoo" href="tienda.php?PAG_NUM=<?php echo $pagina; ?>&PAG_TAM=<?php echo $pag_tam; ?>"><?php echo $pagina; ?></a>
							<?php } ?>
						</div>


						

					</nav>	
					<br><br><br>

		<?php
			foreach($filas as $fila) {
		?>
				<a class="textocajaTienda" href="soloModelo.php?id=<?php echo $fila["IDMODELO"]; ?>">
					<div class="tablaTienda">
						


								<input id="IDMODELO" name="IDMODELO"
								type="hidden" value="<?php echo $fila["IDMODELO"]; ?>"/>

									
							<?php

							$mostrarModelo = $fila["IDMODELO"];



								if (isset($modelos) and ($modelos["IDMODELO"] == $fila["IDMODELO"])) { ?>
									<h3> <input  id = " NOMBRE "  name = "NOMBRE"  type = "text"  value ="<?php echo $fila ["NOMBRE"]; ?>"/> </h3>
									<h4> <?php echo $fila ["NOMBRE"] . " " . $fila ["DESCRIPCION"];?> </h4>
							<?php }	else { ?>
									<!-- mostrando título -->
									<article class="productos">
										<input id="NOMBRE" name="NOMBRE" type="hidden" value="<?php echo $fila["NOMBRE"]; ?>"/>
									
										<div class="dato"><h2><b><?php echo $fila["NOMBRE"]; ?></b></h2></div>
										<div class="dato"><em><?php echo $fila["MINIDESCRIPCION"]; ?></em></div>
										<div class="dato"><em><?php echo $fila["PRECIO"]; ?>€</em></div>
										<div class="dato"><img src="<?php echo $fila["IMAGEN"]; ?>" alt="GOKU" width="200"></div>
										<div class="dato"><em><a  href="<?php echo $fila["ENLACEVIDEO"]; ?>" target="_blank"> Enlace de Video</a></em></div>
										<div class="dato"><em><a  href="<?php echo $fila["ENLACEPRODUCTOS"]; ?>" target="_blank"> Enlace de Producto</a></em></div>



									</article>

							<?php } ?>
					</div>
				</a>
				
		
	</article>
	<?php } 

	?>



		<?php 
		if (isset($_SESSION["cliente"]) && $_SESSION["cliente"]["privilegios"] == 1) { ?>
		<a href="formulario_tienda.php"><button class="button">Crear Producto</button></a>
		<a href="consulta_modelo.php"><button class="button">Consultar Modelos</button></a>	

		<?php } ?>



	</main>



<?php

include_once ("Estructura/pie.php");
?>
</div>
</body>

</html>


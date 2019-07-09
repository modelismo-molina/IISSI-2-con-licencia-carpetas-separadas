<?php

error_reporting(0);
session_start();

require_once ("gestionBD.php");
require_once ("gestionarModelistas.php");
require_once ("paginacion_consulta.php");

/*if (!isset($_SESSION['login']))
	Header("Location: login.php");
else {
	if (isset($_SESSION["modelos"])) {
		$modelos = $_SESSION["modelos"];
		unset($_SESSION["modelos"]);
	}*/

	// ¿Venimos simplemente de cambiar página o de haber seleccionado un registro ?
	// ¿Hay una sesión activa?
	if (isset($_SESSION["cliente"]["privilegios"]) != 1) {
		header("Location:index.php");
	}
	
	
	if (isset($_SESSION["paginacion"]))
		$paginacion = $_SESSION["paginacion"];
	
	$pagina_seleccionada = isset($_GET["PAG_NUM"]) ? (int)$_GET["PAG_NUM"] : (isset($paginacion) ? (int)$paginacion["PAG_NUM"] : 1);
	$pag_tam = isset($_GET["PAG_TAM"]) ? (int)$_GET["PAG_TAM"] : (isset($paginacion) ? (int)$paginacion["PAG_TAM"] : 5);

	if ($pagina_seleccionada < 1) 		$pagina_seleccionada = 1;
	if ($pag_tam < 1) 		$pag_tam = 5;

	// Antes de seguir, borramos las variables de sección para no confundirnos más adelante
	unset($_SESSION["paginacion"]);

	$conexion = crearConexionBD();

	// La consulta que ha de paginarse
	$query = 'SELECT * FROM MODELISTAS';

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
 <meta name="viewport" content="width=device-width, initial-scale=1.0"
  <!-- Hay que indicar el fichero externo de estilos -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
	<script type="text/javascript" src="./js/boton.js"></script>
	<link rel="icon" type="image/png" href="images/M.png">
  <title>Consulta Modelista</title>
</head>

<body>

	<?php

	include_once ("Estructura/cabecera.php");
	?>


	<main>
		<section class = "main">
			<section class="articles">
				<!--*************************Paginacion********************************-->
				 <nav>
					<div id="enlaces">
						<?php
							for( $pagina = 1; $pagina <= $total_paginas; $pagina++ )
								if ( $pagina == $pagina_seleccionada) { 	?>
									<span class="current"><?php echo $pagina; ?></span>
						<?php }	else { ?>
									<a href="consulta_modelista.php?PAG_NUM=<?php echo $pagina; ?>&PAG_TAM=<?php echo $pag_tam; ?>"><?php echo $pagina; ?></a>
						<?php } ?>
					</div>
					<form method="get" action="consulta_modelista.php">
						<input id="PAG_NUM" name="PAG_NUM" type="hidden" value="<?php echo $pagina_seleccionada?>"/>
						Mostrando
						<input id="PAG_TAM" name="PAG_TAM" type="number"
							min="1" max="<?php echo $total_registros; ?>"
							value="<?php echo $pag_tam?>" autofocus="autofocus" />
						entradas de <?php echo $total_registros?>
						<input type="submit" value="Cambiar">
					</form>
				</nav>

	<?php
		foreach($filas as $fila) {
	?>


			<form method="post" action="controlador_modelista.php">

				<div class="fila_modelistas">

					<div class="datos_modelistas">

						<input id="IDMODELISTAS" name="IDMODELISTAS"

							type="hidden" value="<?php echo $fila["IDMODELISTA"]; ?>"/>

						<input id="IDMODELISTA" name="NOMBRE"

							type="hidden" value="<?php echo $fila["NOMBRE"]; ?>"/>

						<input id="APELLIDO" name="APELLIDO"

							type="hidden" value="<?php echo $fila["APELLIDO"]; ?>"/>

						<input id="TELEFONO" name="TELEFONO"

							type="hidden" value="<?php echo $fila["TELEFONO"]; ?>"/>

						<input id="FECHANACIMIENTO" name="FECHANACIMIENTO"

							type="hidden" value="<?php echo $fila["FECHANACIMIENTO"]; ?>"/>

						<input id="PASS" name="PASS"

							type="hidden" value="<?php echo $fila["CONTRASEÑA"]; ?>"/>
						
						<input id="MOTIVOS" name="MOTIVOS"

							type="hidden" value="<?php echo $fila["MOTIVOS"]; ?>"/>
						
						<input id="CALLE" name="CALLE"

							type="hidden" value="<?php echo $fila["DIRECCION"]; ?>"/>
						
						<input id="DNI" name="DNI"

							type="hidden" value="<?php echo $fila["DNI"]; ?>"/>				
						<input id="EMAIL" name="EMAIL"

							type="hidden" value="<?php echo $fila["EMAIL"]; ?>"/>		


					<?php

						if (isset($modelistas) and ($modelistas["IDMODELISTAS"] == $fila["IDMODELISTA"])) { ?>

							<!-- Editando título -->

							<h3><input id="NOMBRE" name="NOMBRE" type="text" value="<?php echo $fila["NOMBRE"]; ?>"/>	</h3>

							<h4><?php echo $fila["NOMBRE"] . " " . $fila["MOTIVOS"]; ?></h4>

					<?php }	else { ?>

							<!-- mostrando título -->

							<input id="NOMBRE" name="NOMBRE" type="hidden" value="<?php echo $fila["NOMBRE"]; ?>"/>

							<div class="nombre"><b><?php echo $fila["NOMBRE"]; ?></b></div>

							<div class="apellido"><em><?php echo $fila["APELLIDO"]/* . " " . $fila["APELLIDOS"]*/; ?></em></div>
							
							<div class="email"><em><?php echo $fila["EMAIL"]  ?> </b></div>
							
							<div class="motivos"><em><?php echo $fila["MOTIVOS"] ?> </b></div>
							
							<div class="telefono"><em><?php echo $fila["TELEFONO"] ?>
							
				<?php } ?>

				</div>




					<div id="botones_fila">

		

							<button id="aceptar" name="boton" type="submit" value="aceptar" class="editar_fila">

							<img src="images/hand-gesture.png" class="editar_fila" alt="Aceptar Modelista">

							</button>


						<button id="borrar" name="boton" type="submit" value="borrar" class="editar_fila">

							<img src="images/delete.png" class="editar_fila" alt="Borrar Modelista">

						</button>

					</div>

				</div>

			</form>

	</article>



	<?php } ?>

</main>



<?php

include_once ("Estructura/pie.php");
?>

</body>

</html>
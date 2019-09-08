<?php
error_reporting(0);
session_start();

require_once ("gestionBD.php");
require_once ("gestionarPropuestas.php");
require_once ("paginacion_consulta.php");


	if (isset($_SESSION["propuesta"])) {
		$propuesta = $_SESSION["propuesta"];
		unset($_SESSION["propuesta"]);
	}
//TODO ESTO ES REFERENTE A PAGINACIÓN
 
	// ¿Venimos simplemente de cambiar página o de haber seleccionado un registro ?
	// ¿Hay una sesión activa?
	if (isset($_SESSION["paginacion"]))
		$paginacion = $_SESSION["paginacion"];
	
	$pagina_seleccionada = isset($_GET["PAG_NUM"]) ? (int)$_GET["PAG_NUM"] : (isset($paginacion) ? (int)$paginacion["PAG_NUM"] : 1);
	$pag_tam = isset($_GET["PAG_TAM"]) ? (int)$_GET["PAG_TAM"] : (isset($paginacion) ? (int)$paginacion["PAG_TAM"] : 5);

	if ($pagina_seleccionada < 1) 		$pagina_seleccionada = 1;
	if ($pag_tam <= 1) 		$pag_tam = 5;

	// Antes de seguir, borramos las variables de sección para no confundirnos más adelante
	unset($_SESSION["paginacion"]);

	$conexion = crearConexionBD();

	// La consulta que ha de paginarse
	$query = 'SELECT * FROM PROPUESTAS';

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
	
	if (isset($_SESSION["errores"])){
		$errores = $_SESSION["errores"];
		unset($_SESSION["errores"]);
	}

	cerrarConexionBD($conexion);

?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="images/M.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <!-- Hay que indicar el fichero externo de estilos -->
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="./js/boton.js"></script>
  <title>Modelismo Molina: Lista de propuestas</title>
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
	<section class = "main">
		 <nav class="navegadorPagina">

			<div id="enlaces">
				<?php
					for( $pagina = 1; $pagina <= $total_paginas; $pagina++ )
						if ( $pagina == $pagina_seleccionada) { 	?>
							<span class="current"><?php echo $pagina; ?></span>
				<?php }	else { ?>
							<a class="paginadoo" href="consulta_propuestas.php?PAG_NUM=<?php echo $pagina; ?>&PAG_TAM=<?php echo $pag_tam; ?>"><?php echo $pagina; ?></a>
				<?php } ?>
			</div>
				<form class="paginaMostrada" method="get" action="consulta_propuestas.php">
					<input id="PAG_NUM" name="PAG_NUM" type="hidden" value="<?php echo $pagina_seleccionada?>"/>
					Mostrando
					<input class="button" id="PAG_TAM" name="PAG_TAM" type="number"
						min="1" max="<?php echo $total_registros; ?>"
						value="<?php echo $pag_tam?>" autofocus="autofocus" />
					de <?php echo $total_registros?>
					<input id= "cambiarBotones" class="button" type="submit" value="Cambiar">
				</form>

			</nav>
	<section class="articles">			

				<?php

					foreach($filas as $fila) {

				?>


				<article class="propuestas">

					<form method="post" action="controlador_propuestas.php">

						<div class="fila_propuestas">

							<div class="datos_propuesta">

								<input id="IDPROPUESTAS" name="IDPROPUESTAS"

									type="hidden" value="<?php echo $fila["IDPROPUESTAS"]; ?>"/>

								<input id="DESCRIPCION" name="DESCRIPCION"

									type="hidden" value="<?php echo $fila["DESCRIPCION"]; ?>"/>

								<input id="EMAIL" name="EMAIL"

									type="hidden" value="<?php echo $fila["EMAIL"]; ?>"/>



							<?php

								if (isset($propuesta) and ($propuesta["IDPROPUESTAS"] == $fila["IDPROPUESTAS"])) { ?>

									<!-- Editando título -->

									<h3><input id="DESCRIPCION" name="DESCRIPCION" type="text" value="<?php echo $fila["DESCRIPCION"]; ?>"/>	</h3>


							<?php }	else { ?>

									<!-- mostrando descripcion -->

									<input id="DESCRIPCION" name="DESCRIPCION" type="hidden" value="<?php echo $fila["DESCRIPCION"]; ?>"/>
									
									<div class="DESCRIPCION"><em><?php echo $fila["DESCRIPCION"]; ?></em></div>


									<div class="EMAIL">Propuesta realizada por usuario:<em><?php echo $fila["EMAIL"]; ?></em></div>

							<?php } ?>

							</div>


							<?php 
		if (isset($_SESSION["cliente"]) && $_SESSION["cliente"]["privilegios"] == 1) { ?>
		

		
							<div id="botones_fila">

							<?php if (isset($propuesta) and ($propuesta["IDPROPUESTAS"] == $fila["IDPROPUESTAS"])) { ?>

									<button id="grabar" name="grabar" type="submit" class="editar_fila">
										Confirmar
									</button>
									
									<button id="cancelar" name="cancelar" type="submit" class="editar_fila">
										Cancelar 
									</button>
								
							<?php } else { ?>

									<button id="editar" name="editar" type="submit" class="editar_fila">
										Editar
									</button>
									
									<button id="borrar" name="borrar" type="submit" class="editar_fila">
										Borrar
									</button>

							<?php } ?>

								
							</div>

							<?php } ?>

						</div>

					</form>

				</article>



				<?php } ?>




			</article>
		</section>
		<aside>
			<h2> Estas son las propuestas de nuestros usuarios</h3>
			<h3> ¿Te gustaría hacernos una?</h4>
			<h2>¡Pulsa <a href="form_propuesta.php">aquí</a> para publicar tu propuesta!</h4>
			<a href="form_propuesta.php"><img src="images/chatting-2.png" width="250"></a>



		</aside>
	</section>

		
</main>



</body>

<?php  
include_once("Estructura/pie.php");

?>
</html>
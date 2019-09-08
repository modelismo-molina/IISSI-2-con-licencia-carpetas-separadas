<?php
error_reporting(0);
session_start();

require_once ("gestionBD.php");
require_once ("gestionarPedidos.php");
require_once ("paginacion_consulta.php");


	if (isset($_SESSION["pedido"])) {
		$pedido = $_SESSION["pedido"];
		unset($_SESSION["pedido"]);
	}
//TODO ESTO ES REFERENTE A PAGINACIÓN
 
	// ¿Venimos simplemente de cambiar página o de haber seleccionado un registro ?
	// ¿Hay una sesión activa?
	if (isset($_SESSION["paginacion"]))
		$paginacion = $_SESSION["paginacion"];
	
	$pagina_seleccionada = isset($_GET["PAG_NUM"]) ? (int)$_GET["PAG_NUM"] : (isset($paginacion) ? (int)$paginacion["PAG_NUM"] : 1);
	$pag_tam = 1;
	if ($pagina_seleccionada < 1) 		$pagina_seleccionada = 1;
	if ($pag_tam <= 1) 		$pag_tam = 1;

	// Antes de seguir, borramos las variables de sección para no confundirnos más adelante
	unset($_SESSION["paginacion"]);

	$conexion = crearConexionBD();

	// La consulta que ha de paginarse
	$query = 'SELECT * FROM PEDIDOS';

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
  <link rel="icon" type="image/png" href="images/M.png" />

  <!-- Hay que indicar el fichero externo de estilos -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <!-- Hay que indicar el fichero externo de estilos -->
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="./js/boton.js"></script>
  <title>Modelismo Molina: Lista de pedidos</title>
</head>

<body>

	<?php
		include_once("Estructura/cabecera.php");
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
						<a class="paginadoo" href="consulta_pedidos.php?PAG_NUM=<?php echo $pagina; ?>&PAG_TAM=<?php echo $pag_tam; ?>"><?php echo $pagina; ?></a>
			<?php } ?>

		</div>
			<form class="paginaMostrada" method="get" action="consulta_pedidos.php">
				<input id="PAG_NUM" name="PAG_NUM" type="hidden" value="<?php echo $pagina_seleccionada?>"/>
						Mostrando
				<input class="button" id="PAG_TAM" name="PAG_TAM" type="number"
							min="1" max="<?php echo $total_registros; ?>"
							value="<?php echo $pag_tam?>" autofocus="autofocus" />
						de <?php echo $total_registros?>
						<input id="cambiarBotones" class="button" type="submit" value="Cambiar">
					</form>

				</nav>
		

<section class="articles">			
	<?php

		foreach($filas as $fila) {

	?>



	<article class="pedidos">

		<form method="post" action="controlador_pedidos.php">

			<div class="fila_pedidos">

				<div class="datos_pedido">

					<input id="IDPEDIDO" name="IDPEDIDO"

						type="hidden" value="<?php echo $fila["IDPEDIDO"]; ?>"/>

					<input id="ESCALA" name="ESCALA"

						type="hidden" value="<?php echo $fila["ESCALA"]; ?>"/>

					<input id="MATERIAL" name="MATERIAL"

						type="hidden" value="<?php echo $fila["MATERIAL"]; ?>"/>
					
					<input id="CALIDADDESEADA" name="CALIDADDESEADA"

						type="hidden" value="<?php echo $fila["CALIDADDESEADA"]; ?>"/>

					<input id="DESCRIPCION" name="DESCRIPCION"

						type="hidden" value="<?php echo $fila["DESCRIPCION"]; ?>"/>

					<input id="METODOPAGO" name="METODOPAGO"

						type="hidden" value="<?php echo $fila["METODOPAGO"]; ?>"/>
						
	                 <input id="TELEFONO" name="TELEFONO"

						type="hidden" value="<?php echo $fila["TELEFONO"]; ?>"/>

					<input id="EMAIL" name="EMAIL"

						type="hidden" value="<?php echo $fila["EMAIL"]; ?>"/>

				<?php

					if (isset($pedido) and ($pedido["IDPEDIDO"] == $fila["IDPEDIDO"])) { ?>

						<!-- Editando pedido -->

						<h3><input id="ESCALA" name="ESCALA" type="text" value="<?php echo $fila["ESCALA"]; ?>"/>	</h3>
						<h3><input id="MATERIAL" name="MATERIAL" type="text" value="<?php echo $fila["MATERIAL"]; ?>"/>	</h3>
						<h3><input id="CALIDADDESEADA" name="CALIDADDESEADA" type="text" value="<?php echo $fila["CALIDADDESEADA"]; ?>"/>	</h3>
						<h3><input id="DESCRIPCION" name="DESCRIPCION" type="TEXTAREA"  value="<?php echo $fila["DESCRIPCION"]; ?>"/></h3>
						<h3><input id="METODOPAGO" name="METODOPAGO" type="text" value="<?php echo $fila["METODOPAGO"]; ?>"/>	</h3>
						<h3><input id="TELEFONO" name="TELEFONO" type="text" value="<?php echo $fila["TELEFONO"]; ?>"/>	</h3>
						<h3><input id="EMAIL" name="EMAIL" type="text" value="<?php echo $fila["EMAIL"]; ?>"/>	</h3>



				<?php }	else { ?>

						<!-- mostrando pedido -->

						<input id="IDPEDIDO" name="IDPEDIDO" type="hidden" value="<?php echo $fila["IDPEDIDO"]; ?>"/>

						<div class="DESCRIPCION"><h2>Escala:</h2><em><h3><?php echo $fila["ESCALA"];?></h3></em></div>
                        
                        <div class="MATERIAL"><h2>Material:</h2><em><h3><?php echo $fila["MATERIAL"];?></h3></em></div>
                        
                        <div class="CALIDADDESEADA"><h2>Calidad deseada:</h2><em><h3><?php echo $fila["CALIDADDESEADA"];?></h3></em></div>
                        
                        <div class="DESCRIPCION"><h2>Descripción del pedido:</h2><em><?php echo $fila["DESCRIPCION"]; ?></em></div>
                        
                        <div class="METODOPAGO"><h2>Metodo de pago:</h2><em><h3><?php echo $fila["METODOPAGO"]; ?></h3></em></div>
                        
                        <div class="TELEFONO"><h2>Telefono de contacto:</h2><em><h3><?php echo $fila["TELEFONO"]; ?></h3></em></div>
                                                
                        <div class="EMAIL"><h2>Propuesta realizada por usuario:</h2><em><h3><?php echo $fila["EMAIL"]; ?></h3></em></div>


				</div>
					
				<?php } ?>

				</div>
		<?php 
		if (isset($_SESSION["cliente"]) && $_SESSION["cliente"]["privilegios"] == 1) { ?>


		<div id="botones_fila">

				<?php if (isset($pedido) and ($pedido["IDPEDIDO"] == $fila["IDPEDIDO"])) { ?>

						<button id="grabar" name="grabar" type="submit" class="editar_fila">
							Guardar 
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

            <h2> ¿Quieres hacer un pedido?</h3>
			<h3> Aquí puedes ver los realizados por nuestros usuarios</h4>
			<h2>¡Pulsa <a href="form_pedido.php">aquí</a> para formular un pedido!</h4>
			<a href="form_pedido.php"><img src="images/signing.png"  width="250" align="center"></a>

 

 </aside>

</section>

</main>

<?php

include_once ("Estructura/pie.php");
?>

</body>



</html>
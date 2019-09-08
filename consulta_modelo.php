<?php
session_start();

require_once ("gestionBD.php");
require_once ("gestionarModelos.php");
require_once ("paginacion_consulta.php");


	if (isset($_SESSION["modelo"])) {
		$modelo = $_SESSION["modelo"];
		unset($_SESSION["modelo"]);
	}

	// ¿Venimos simplemente de cambiar página o de haber seleccionado un registro ?
	// ¿Hay una sesión activa?
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

	//Mostrar si existen errores
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
  <!-- Hay que indicar el fichero externo de estilos
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>-->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
	<script type="text/javascript" src="./js/boton.js"></script>
	<link rel="icon" type="image/png" href="images/M.png">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
  	<script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>
  	<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
  <title>Consulta Modelos</title>
</head>

<body>

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
	<div class="erroresValidacion">
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
	</div>


	<main>
		<section class = "main">
				<nav class="navegadorPagina">

					<div id="enlaces">
						<?php
							for( $pagina = 1; $pagina <= $total_paginas; $pagina++ )
								if ( $pagina == $pagina_seleccionada) { 	?>
									<span class="current"><?php echo $pagina; ?></span>
						<?php }	else { ?>
									<a class="paginadoo" href="consulta_modelo.php?PAG_NUM=<?php echo $pagina; ?>&PAG_TAM=<?php echo $pag_tam; ?>"><?php echo $pagina; ?></a>
						<?php } ?>
					</div>


					<form class="paginaMostrada" method="get" action="consulta_modelo.php">
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
				<!--*************************Paginacion********************************-->
				 

				<article class="menu">
					<div class="cabeza">
						<h3>El orden de los datos mostrados en pantalla son:</h3>
						<h2>Nombre</h2>
					</div>
					<div class="cabeza">
						<h2>Descripcion</h2>
					</div>
					<div class="cabeza">
						<h2>Precio</h2>
					</div>
				</article>
				
				<br><br>

	<?php
		foreach($filas as $fila) {
	?>
		<!--<a class="textocaja" href="soloModelo.php?id=<?php /*echo $fila["IDMODELO"]; */?>">-->
		<article class="modelo">	

			<form  class="tabla" method="post" action="controlador_modelo.php">
				

				<div class="fila_modelos">
					<div class="datos_modelos">
						<input id="IDMODELO" name="IDMODELO"
							type="hidden" value="<?php echo $fila["IDMODELO"]; ?>"/>

						<input id="IMAGEN" name="IMAGEN"
							type="hidden" value="<?php echo $fila["IMAGEN"]; ?>"/>

						<input id="IDUSUARIO" name="IDUSUARIO"
							type="hidden" value="<?php echo $fila["IDUSUARIO"]; ?>"/>

						<input id="IDMODELISTA" name="IDMODELISTA"
							type="hidden" value="<?php echo $fila["IDMODELISTA"]; ?>"/>

						<input id="DESCRIPCION" name="DESCRIPCION"
							type="hidden" value="<?php echo $fila["DESCRIPCION"]; ?>"/>

						<input id="MINIDESCRIPCION" name="MINIDESCRIPCION"
							type="hidden" value="<?php echo $fila["MINIDESCRIPCION"]; ?>"/>

						<input id="ENLACEVIDEO" name="ENLACEVIDEO"
							type="hidden" value="<?php echo $fila["ENLACEVIDEO"]; ?>"/>

						<input id="ENLACEPRODUCTOS" name="ENLACEPRODUCTOS"
							type="hidden" value="<?php echo $fila["ENLACEPRODUCTOS"]; ?>"/>

						<input id="PRECIO" name="PRECIO"
							type="hidden" value="<?php echo $fila["PRECIO"]; ?>"/>

						<input id="NOMBRE" name="NOMBRE"
							type="hidden" value="<?php echo $fila["NOMBRE"]; ?>"/>




					<?php

						if (isset($modelo) and ($modelo["IDMODELO"] == $fila["IDMODELO"])) { ?>
							<!-- Editando modelo -->
							<h3 class="dato"><input id="NOMBRE" name="NOMBRE" type="text" value="<?php echo $fila["NOMBRE"]; ?>"/>	</h3>
							<h3 class="dato"><input id="MINIDESCRIPCION" name="MINIDESCRIPCION" type="text" value="<?php echo $fila["MINIDESCRIPCION"]; ?>"/>	</h3>
							<h3 class="dato"><input id="PRECIO" name="PRECIO" type="text" value="<?php echo $fila["PRECIO"]; ?>"/>	</h3>

					
					<?php }	else { ?>
							
							<!-- mostrando título -->

								<input id="NOMBRE" name="NOMBRE" type="hidden" value="<?php echo $fila["NOMBRE"]; ?>"/>
								<input id="MINIDESCRIPCION" name="MINIDESCRIPCION" type="hidden" value="<?php echo $fila["MINIDESCRIPCION"]; ?>"/>
								<input id="PRECIO" name="PRECIO" type="hidden" value="<?php echo $fila["PRECIO"]; ?>"/>

								<div class="dato"><b><?php echo $fila["NOMBRE"]; ?></b></div>
								<div class="dato"><?php echo $fila["MINIDESCRIPCION"]; ?></div>
								<div class="dato"><?php echo $fila["PRECIO"]; ?>€</div>
								


					<?php } ?>
					</div>


					<div id="botones_fila">

					<?php if (isset($modelo) and ($modelo["IDMODELO"] == $fila["IDMODELO"])) { ?>
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
				</div>
			</form>
		</article>
		</a>
	</article>
	<?php } ?>
				<div class="menu"></div>

</main>



<?php

include_once ("Estructura/pie.php");
?>

</body>

</html>
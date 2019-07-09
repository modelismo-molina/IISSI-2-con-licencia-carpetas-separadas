<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>Modelismo Molina</title>
	<link rel="icon" type="image/png" href="images/M.png" />
	<link rel = "stylesheet" type = "text/css" href = "css/style.css">

</head>
<body> 	
	<!-- *****************************************************Header*****************************************************-->
	<?php
		include_once("Estructura/cabecera.php");
	?>
	<!-- *****************************************************End Header***************************************************** -->

	<!-- *****************************************************Slider***************************************************** -->
	<?php 
		include_once("Estructura/deslizador.php");
	?>
	<main>
		<section class = "main">
			<section class="articles">
				<article>
					<h2>¡Bienvenido a Modelismo Molina!</h2>
					<p>Bienvenido a la página personal del director creativo de Green Stuff World, Javier "Dragonsland" Molina. Aquí podrás comprar la mayoría de los utilizados en los vídeos del canal de YouTube de la propia empresa.</p>
					<p> Visítanos de vez en cuando para ver que tenemos en stock. Podemos tener desde esa unidad que te hace falta para completar tu banda en Infinity, hasta una escuadra de Marines del Caos pintados con todos los colores del arcoíris con las nuevas y exitosas Pinturas Candy de Green Stuff World, pasando por dioramas que simplemente quedarían genial adornando tu cuarto de juegos.</p>
					<br><br>
				</article>
				<article>
					<h2>¿Como nació Modelismo Molina?</h2>
					<p>Una vez utilizados para impartir sus clases o subir vídeos a YouTube sobre el tratamiento, los modelos usados por Javier "Dragonsland" Molina, perdían su utilidad, pues el modelo terminado no era de interés si no el "como" se terminaba ese modelo y que se utilizaba para terminarlo.</p>
					<p>Javier se puso en contacto conmigo pues ambos sabíamos que mucha gente pagaría por esos modelos estubieran en el estado que estubieran (Jugadores de "Wargames", Jugadores de Rol, Personas que están empezando en el mundo del modelismo...).</p>
					<p> De modo que se planeó hacer una tienda online de estos modelos. Sim embargo, de cara a un proyecto parecía demasiado poco y se planearon otros sistemas a implementar en la página y que no fuera una simple tienda online, a saber: Un sistema de propuestas (Donde la gente podría pedir lo que le gustaría ver en la página), un sistema de encuestas (Donde los usuarios podrían votar lo que les gustaría que se hiciera de cara a la parte creativa de Green Stuff World) y un sistema de pedidos (Donde los usuarios podrían hacer pedidos de modelos y tratamientos concretos que Javier Molina realizará si sus obligaciones para con Green Stuff World lo permiten)</p>
					<img src="images/Clase pintura.jpeg" alt="" width="700"  >
					
				</article>
			</section>	
			<aside>
				<a href="consulta_pedidos.php"><h3>¡Haz tu pedido ahora mismo!</h3></a>
				<p>¿Vienes por el renombre de "Dragonsland" y querías tener la oportunidad de que te hiciera un pedido personalmente)</p>
				<p> No esperees más y dirígete a nuestro apartado de pedidos para hacer el tuyo. </p>
				<a href="consulta_pedidos.php"><img src="images/signing.png" alt="" width="250"></a>
			</aside>
			<aside>
				<h3><a href="http://www.greenstuffworld.com/es/">Visita también Green Stuff World</a></h3>
				<p>Toda esta página ha nacido con el permiso de Green Stuff World mediante la promesa de que no le eclipsariamos, de modo que si estás mas intéresado en los materiales que en los modelos, te rogamos que les visites y descubras sus increibles precios para todo tipo de materiales relacionados con el modelismo</p>
				<a href="http://www.greenstuffworld.com/es/"><img src="images/GreenStuffLogo.jpg" alt="" width="300"></a>
		</section>
	</main>
	<?php 
		include_once("Estructura/pie.php")
	?>
	
</body>
</html>
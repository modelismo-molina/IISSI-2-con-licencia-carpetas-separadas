<?php session_start(); ?>
<header id="header">
		<div class="shell">
			

			<a href="index.php"><img src="images/odelismo.png" alt="Logotipo" width="180"></a>


			
			<!-- *****************************************************Navigation***************************************************** -->
			<nav id="navigation">
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
			</nav>
			<!-- *****************************************************End Navigation***************************************************** -->
			
		</div>
	</header>
	

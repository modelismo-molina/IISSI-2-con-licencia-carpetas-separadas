<footer>
		<div class="shell">
			
			<!-- *****************************************************Footer Logo***************************************************** -->
				<a href="index.php"><img src="images/odelismoblanco.png" alt="ModelismoMolina" width="150"></a>
		
			<!-- *****************************************************End Footer***************************************************** -->
			
			<!-- *****************************************************Footer Nav***************************************************** -->
			<div class="right">
				<p>
				<a href="index.php">Inicio</a>
					<span>|</span>
					<a href="SobreNosotros.php">Sobre nosotros</a>
					<span>|</span>
					<a href="Servicios.php">Servicios</a>
					<span>|</span>
					<a href="Clientes.php">Clientes</a>
					<span>|</span>
					<a href="Contactanos.php">Contactanos</a>
					
					<?php if (isset($_SESSION["cliente"]) && $_SESSION["cliente"]["privilegios"] == 1) { ?>
					<span>|</span>
					<a href="consulta_modelista.php">Consulta Modelista</a>
					<?php } ?>
					
				</p>
				<p> modelismomolina@gmail.com
					 Somos <a href="#" target="_blank" title="MolinaSL"> ModelismoMolinaSL</a></p>
			</div>
			<!-- *****************************************************End Footer Nav**************************************************** -->
		</div>
	</footer>
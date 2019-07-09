<?php	
	session_start();
	include "gestionBD.php";

	if (isset($_REQUEST["DNI"])) {
		$dni = $_REQUEST["DNI"];
		$conexion = crearConexionBD();
		if ($_REQUEST["boton"] == "borrar") {
			try {
			$conexion -> query("DELETE FROM MODELISTAS WHERE DNI = '$dni'");
			} catch (Exception $e) {
					echo "Se ha capturado una excepción: " . $e -> getMessage();
				$_SESSION['excepcion'] = "Ha ocurrido un error a la hora de acceder a la base de datos.";
				header("Location: excepcion.php");
			}
		} else {
			$contraseña = $_REQUEST["PASS"];
			$nombre = $_REQUEST["NOMBRE"];
			$apellido = $_REQUEST["APELLIDO"];
			$fechaNac =  date("d/m/Y", strtotime($_REQUEST["FECHANACIMIENTO"]));
			$telefono = $_REQUEST["TELEFONO"];
			$direccion = $_REQUEST["CALLE"];
			$dni = $_REQUEST["DNI"];
			$email = $_REQUEST["EMAIL"];
			try {
				$conexion -> query("INSERT INTO MODERADORES (TELEFONO, CONTRASEÑA, EMAIL, DIRECCION, FECHANACIMIENTO, DNI, NOMBRE, APELLIDO) VALUES ('$telefono', '$contraseña', '$email', '$direccion', '$fechaNac', '$dni', '$nombre', '$apellido')");
			} catch (Exception $e) {
					echo "Se ha capturado una excepción: " . $e -> getMessage();
					$_SESSION['excepcion'] = $e -> getMessage();
					header("Location: excepcion.php");
			}
		
		}
		
		Header("Location: consulta_modelista.php");
	} else {
		Header("Location: index.php");
	}
?>



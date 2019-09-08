<?php
	session_start();
    include ("gestionBD.php");
	
	$conexion = crearConexionBD();
	
	$dni = $_SESSION["formulario"]["dni"];
	$telefono = $_SESSION["formulario"]["telefono"];
	$contraseña = $_SESSION["formulario"]["pass"];
	$email = $_SESSION["formulario"]["email"];
	$fechaNacimiento = date("d/m/Y", strtotime($_SESSION["formulario"]["fechaNacimiento"]));
	$nombre= $_SESSION["formulario"]["nombre"];
	$apellidos = $_SESSION["formulario"]["apellidos"];
	$direccion = $_SESSION["formulario"]["calle"];
	
try{
	$res = $conexion -> query("INSERT INTO USUARIOS (TELEFONO, CONTRASEÑA, EMAIL, DIRECCION, FECHANACIMIENTO, DNI, NOMBRE, APELLIDO) VALUES 
	('$telefono','$contraseña','$email','$direccion', '$fechaNacimiento', '$dni', '$nombre','$apellidos')");
	header("Location: RegistroCompletado.php");
	unset($_SESSION["formulario"]);
} catch (Exception $e) {
	echo "Se ha capturado una excepción: " . $e -> getMessage();
	$_SESSION['excepcion'] = "Ha ocurrido un error a la hora de acceder a la base de datos.";
	header("Location: excepcion.php");
}
?>












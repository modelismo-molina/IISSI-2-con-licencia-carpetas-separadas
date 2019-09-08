<?php
	session_start();
    include ("gestionBD.php");
	
	$conexion = crearConexionBD();
	
	$dni = $_SESSION["formulario_modelista"]["dni"];
	$telefono = $_SESSION["formulario_modelista"]["telefono"];
	$contraseña = $_SESSION["formulario_modelista"]["pass"];
	$email = $_SESSION["formulario_modelista"]["email"];
	$fechaNacimiento = date("d/m/Y", strtotime($_SESSION["formulario_modelista"]["fechaNacimiento"]));
	$nombre= $_SESSION["formulario_modelista"]["nombre"];
	$apellidos = $_SESSION["formulario_modelista"]["apellidos"];
	$direccion = $_SESSION["formulario_modelista"]["calle"];
	$motivos = $_SESSION["formulario_modelista"]["motivos"];
	
try{
	$res = $conexion -> query("INSERT INTO MODELISTAS (TELEFONO, CONTRASEÑA, EMAIL, DIRECCION, FECHANACIMIENTO, DNI, NOMBRE, APELLIDO, MOTIVOS) VALUES 
	('$telefono','$contraseña','$email','$direccion', '$fechaNacimiento', '$dni', '$nombre','$apellidos', '$motivos')");
	header("Location: Peticion.php");
	unset($_SESSION["formulario_modelista"]);
} catch (Exception $e) {
	echo "Se ha capturado una excepción: " . $e -> getMessage();
	$_SESSION['excepcion'] = $e -> getMessage();
	header("Location: excepcion.php");
}
	

?>






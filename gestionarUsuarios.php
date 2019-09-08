<?php
  /*
     * #===========================================================#
     * #	Este fichero contiene las funciones de gestión
     * #	de usuarios de la capa de acceso a datos
     * #==========================================================#
     */

 function alta_usuario($conexion,$usuario) {
	$fechaNacimiento = date('d/m/Y', strtotime($usuario["fechaNacimiento"]));

	try {
		$consulta = "CALL INSERTAR_USUARIO(:tel, :pass, :email, :dir, fec:, :dni, :nom, :ape)";
		$stmt=$conexion->prepare($consulta);
		$stmt->bindParam(':tel',$usuario["tel"]);
		$stmt->bindParam(':pass',$usuario["pass"]);
		$stmt->bindParam(':email',$usuario["email"]);
		$stmt->bindParam(':dir',$usuario["calle"]);
		$stmt->bindParam(':fec',$fechaNacimiento);
		$stmt->bindParam(':dni',$usuario["dni"]);
		$stmt->bindParam(':nom',$usuario["nom"]);
		$stmt->bindParam(':ape',$usuario["ape"]);
		
		$stmt->execute();
		
		
	} catch(PDOException $e) {
		return false;
		// Si queremos visualizar la excepción durante la depuración: $e->getMessage();
    }
}


  
function consultarUsuario($conexion,$email,$pass) {
 	$consulta = "SELECT COUNT(*) AS TOTAL FROM USUARIOS WHERE EMAIL=:email AND CONTRASEÑA=:pass";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':email',$email);
	$stmt->bindParam(':pass',$pass);
	$stmt->execute();
	return $stmt->fetchColumn();
}

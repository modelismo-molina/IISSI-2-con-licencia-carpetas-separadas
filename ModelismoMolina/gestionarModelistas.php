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
		$consulta = "CALL INSERTAR_MODELISTA(:nif, :nombre, :ape, :dir, :mun, :fec, :email, :pre1, :pre2,:enl)";
		$stmt=$conexion->prepare($consulta);
		$stmt->bindParam(':nif',$usuario["nif"]);
		$stmt->bindParam(':nombre',$usuario["nombre"]);
		$stmt->bindParam(':ape',$usuario["apellidos"]);
		$stmt->bindParam(':dir',$usuario["calle"]);
		$stmt->bindParam(':mun',$usuario["municipio"]);
		$stmt->bindParam(':fec',$fechaNacimiento);
		$stmt->bindParam(':pre1',$usuario["pregunta1"]);
		$stmt->bindParam(':pre2',$usuario["pregunta2"]);
		$stmt->bindParam(':enl',$usuario["enlaces"]);
		
				
		$stmt->execute();
		
	} catch(PDOException $e) {
		return false;
		// Si queremos visualizar la excepción durante la depuración: $e->getMessage();
    }
}
 
 
function consultarModelista($conexion,$email) {
 	$consulta = "SELECT COUNT(*) AS TOTAL FROM USUARIOS WHERE EMAIL=:email";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':email',$email);
	$stmt->execute();
	return $stmt->fetchColumn();
}


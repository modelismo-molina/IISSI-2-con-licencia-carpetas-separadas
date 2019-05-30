<?php
  /*
     * #===========================================================#
     * #	Este fichero contiene las funciones de gestión
     * #	de usuarios de la capa de acceso a datos
     * #==========================================================#
     */

 
 function consultarTodasPropuestas($conexion) {
	$consulta = "SELECT * FROM PROPUESTAS";
    return $conexion->query($consulta);
}

function alta_propuesta($conexion,$propuesta){
	try {
		$consulta = "CALL INSERTAR_PROPUESTA(:descripcion, :email)";
		$stmt=$conexion->prepare($consulta);
		$stmt->bindParam(':descripcion',$propuesta["descripcion"]);
		$stmt->bindParam(':email',$propuesta["email"]);
	
		$stmt->execute();
		
		return true;
		
	} catch(PDOException $e) {
		return false;
		// Si queremos visualizar la excepción durante la depuración: $e->getMessage();
    }
}

function modificar_propuesta($conexion,$IdPropuestas,$Descripcion) {
	try {
		$stmt=$conexion->prepare('CALL MODIFICAR_PROPUESTA(:IdPropuestas,:Descripcion)');
		$stmt->bindParam(':IdPropuestas',$IdPropuestas);
		$stmt->bindParam(':Descripcion',$Descripcion);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function quitar_propuesta($conexion,$IdPropuesta) {
	try {
		$stmt=$conexion->prepare('CALL QUITAR_PROPUESTA(:IdPropuestas)');
		$stmt->bindParam(':IdPropuestas',$IdPropuesta);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

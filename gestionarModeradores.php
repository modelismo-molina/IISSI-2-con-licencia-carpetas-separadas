<?php
  /*
     * #===========================================================#
     * #	Este fichero contiene las funciones de gestión     			 
     * #	de modelistas de la capa de acceso a datos 		
     * #==========================================================#
     */
function consultarModelista($conexion) {
	$consulta = "SELECT * FROM MODERADORES";
    return $conexion->query($consulta);
}

function eliminarModelista($conexion,$IdModerador) {
	try {
		$stmt=$conexion->prepare('CALL eliminarModerador(:IdModerador)');
		$stmt->bindParam(':IdModerador',$IdModerador);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function actualizarModelista($conexion,$IdModerador,$nombre) {
	try {
		$stmt=$conexion->prepare('CALL actualizarModerador(:IdModerador,:nombre)');
		$stmt->bindParam(':IdModerador',$IdModerador);
		$stmt->bindParam(':nombre',$nombre);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}
    
?>
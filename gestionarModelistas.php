<?php
  /*
     * #===========================================================#
     * #	Este fichero contiene las funciones de gestión     			 
     * #	de modelistas de la capa de acceso a datos 		
     * #==========================================================#
     */
function consultarModelista($conexion) {
	$consulta = "SELECT * FROM MODELISTAS";
    return $conexion->query($consulta);
}

function eliminarModelista($conexion,$IdModelista) {
	try {
		$stmt=$conexion->prepare('CALL eliminarModelista(:IdModelista)');
		$stmt->bindParam(':IdModelista',$IdModelista);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function actualizarModelista($conexion,$IdModelista,$nombre) {
	try {
		$stmt=$conexion->prepare('CALL actualizarModelo(:IdModelo,:nombre)');
		$stmt->bindParam(':IdModelista',$IdModelista);
		$stmt->bindParam(':nombre',$nombre);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}
    
?>
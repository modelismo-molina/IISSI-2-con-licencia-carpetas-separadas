<?php
  /*
     * #===========================================================#
     * #	Este fichero contiene las funciones de gestión     			 
     * #	de modelos de la capa de acceso a datos 		
     * #==========================================================#
     */
function consultarTodosModelos($conexion) {
	$consulta = "SELECT * FROM MODELOS";
    return $conexion->query($consulta);
}

function eliminarModelo($conexion,$IdModelo) {
	try {
		$stmt=$conexion->prepare('CALL eliminarModelo(:IdModelo)');
		$stmt->bindParam(':IdModelo',$IdModelo);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function actualizarModelo($conexion,$IdModelo,$nombre) {
	try {
		$stmt=$conexion->prepare('CALL actualizarModelo(:IdModelo,:nombre)');
		$stmt->bindParam(':IdModelo',$IdModelo);
		$stmt->bindParam(':nombre',$nombre);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}
    
?>
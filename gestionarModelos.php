<?php

function consultarTodosModelos($conexion) {
	$consulta = "SELECT * FROM MODELOS";
    return $conexion->query($consulta);
}

function altaModelo($conexion,$modelo) {
	try {
		$consulta = "CALL ALTAMODELO(:imagen,'','', :descripcion, :minidescripcion, :enlacevideo, :enlaceproductos, :precio, :nombre)";
		$stmt=$conexion->prepare($consulta);
		$stmt->bindParam(':imagen',$modelo["imagen"]);
		$stmt->bindParam(':descripcion',$modelo["descripcion"]);
		$stmt->bindParam(':minidescripcion',$modelo["minidescripcion"]);
		$stmt->bindParam(':enlacevideo',$modelo["enlacevideo"]);
		$stmt->bindParam(':enlaceproductos',$modelo["enlaceproductos"]);
		$stmt->bindParam(':precio',$modelo["precio"]);
		$stmt->bindParam(':nombre',$modelo["nombre"]);
		
		$stmt->execute();
		
		return true;
	} catch(PDOException $e) {
		$e->getMessage();
		return false;
		// Si queremos visualizar la excepción durante la depuración: $e->getMessage();
    }
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

function actualizarModelo($conexion,$IdModelo,$descripcion,$precio,$nombre) {
	try {
		$stmt=$conexion->prepare('CALL ACTUALIZARMODELO(:IdModelo,:descripcion,:precio,:nombre)');
		
		$stmt->bindParam(':IdModelo',$IdModelo);
		$stmt->bindParam(':descripcion',$descripcion);
		$stmt->bindParam(':precio',$precio);
		$stmt->bindParam(':nombre',$nombre);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}
    

function consultarUnModelo($conexion,$idModelo){
	try {
		$stmt = $conexion->prepare("SELECT * FROM MODELOS WHERE IDMODELO = :IdModelo");
		$stmt->bindParam('idModelo', $idModelo );
		$stmt->execute();

		return $stmt;
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

?>
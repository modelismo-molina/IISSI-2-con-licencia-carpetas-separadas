<?php
  /*
     * #===========================================================#
     * #	Este fichero contiene las funciones de gestión
     * #	de usuarios de la capa de acceso a datos
     * #==========================================================#
     */

 
 function consultarTodosPedidos($conexion) {
	$consulta = "SELECT * FROM PEDIDOS";
    return $conexion->query($consulta);
}

function alta_pedido($conexion,$pedido) {

	try {
		$consulta = "CALL INSERTAR_PEDIDO(:escala,:material, :calidaddeseada,:descripcion,:metodopago,:telefono,:email)";
		$stmt=$conexion->prepare($consulta);
		$stmt->bindParam(':escala',$pedido["escala"]);
		$stmt->bindParam(':material',$pedido["material"]);
		$stmt->bindParam(':calidaddeseada',$pedido["calidaddeseada"]);
		$stmt->bindParam(':descripcion',$pedido["descripcion"]);
		$stmt->bindParam(':metodopago',$pedido["metodopago"]);
		$stmt->bindParam(':telefono',$pedido["telefono"]);
		$stmt->bindParam(':email',$pedido["email"]);
		
		$stmt->execute();
		
		return true;
		
	} catch(PDOException $e) {
		$e->getMessage();
		echo "$e";
			return false;
		
    }
}

function quitar_pedido($conexion,$IdPedido) {
	try {
		$stmt=$conexion->prepare('CALL QUITAR_PEDIDO(:IdPedido)');
		$stmt->bindParam(':IdPedido',$IdPedido);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function modificar_pedido($conexion,$Idpedido,$escala,$material,$calidaddeseada,$descripcion,$metodopago,$telefono,$email) {
	try {
		$stmt=$conexion->prepare('CALL MODIFICAR_PEDIDO(:Idpedido,:escala, :material, :calidaddeseada,:descripcion,:metodopago,:telefono,:email)');
		$stmt->bindParam(':Idpedido',$Idpedido);
		$stmt->bindParam(':escala',$escala);
		$stmt->bindParam(':material',$material);
		$stmt->bindParam(':calidaddeseada',$calidaddeseada);
		$stmt->bindParam(':descripcion',$descripcion);
		$stmt->bindParam(':metodopago',$metodopago);
		$stmt->bindParam(':telefono',$telefono);
		$stmt->bindParam(':email',$email);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

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
		$consulta = "CALL INSERTAR_USUARIO(:nif, :nombre, :ape, :dir, :mun, :fec, :email, :pass, :perfil)";
		$stmt=$conexion->prepare($consulta);
		$stmt->bindParam(':nif',$usuario["nif"]);
		$stmt->bindParam(':nombre',$usuario["nombre"]);
		$stmt->bindParam(':ape',$usuario["apellidos"]);
		$stmt->bindParam(':dir',$usuario["calle"]);
		$stmt->bindParam(':mun',$usuario["municipio"]);
		$stmt->bindParam(':fec',$fechaNacimiento);
		$stmt->bindParam(':email',$usuario["email"]);
		$stmt->bindParam(':pass',$usuario["pass"]);
		$stmt->bindParam(':perfil',$usuario["perfil"]);
		
		$stmt->execute();
		
		return asignar_generos_usuario($conexion, $usuario["nif"], $usuario["generoLiterario"]);
	} catch(PDOException $e) {
		return false;
		// Si queremos visualizar la excepción durante la depuración: $e->getMessage();
    }
}
 


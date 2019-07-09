<?php
  /*
     * #===========================================================#
     * #	Este fichero contiene las funciones de gestión     			 
     * #	de libros de la capa de acceso a datos 		
     * #==========================================================#
     */
function consultarTodosProductos($conexion) {
	$consulta = "SELECT * FROM PROPUESTAS ";
    return $conexion->query($consulta);
}

    
?>
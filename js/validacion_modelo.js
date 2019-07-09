function validacion(){
//Cargamos los valores de cada campo del formulario
	 imagen = document.getElementById("imagen").value;
	 descripcion = document.getElementById("descripcion").value;
	 minidescripcion = document.getElementById("minidescripcion").value;
	 enlacevideo = document.getElementById("enlaceVideo").value;
	 enlaceproductos = document.getElementById("enlaceProductos").value;
	 precio = document.getElementById("precio").value;
	 nombre = document.getElementById("nombre").value;

	 
	 
//Comprobamos si están a 0
	 
if( nombre.length == 0 ) {
		
		alert('[ERROR] El nombre no puede estar vacio');
  
     return false;
}

else if( descripcion.length == 0 ) {
		
		alert('[ERROR] La descripcion no puede estar vacia');
  
     return false;
}
else if( minidescripcion.length == 0 ) {
		
		alert('[ERROR] La minidescripcion no puede estar vacia');
  
     return false;
}
else if( precio.length == 0 ) {
		
		alert('[ERROR] El precio no puede estar vacio');
  
     return false;
}
else if( imagen.length == 0 ) {
		
		alert('[ERROR] La imagen no puede estar vacia');
  
     return false;
}




//Comprobamos el tamaño
	
else if( imagen.length > 100 ) {
		
		alert('[ERROR] La imagen no puede ocupar mas de 100 caracteres');
  
     return false;
} 
else if( nombre.length > 60 ) {
		
		alert('[ERROR] El nombre no puede ocupar mas de 60 caracteres');
  
     return false;
} 
else if( descripcion.length > 1600 ) {
		
		alert('[ERROR] La descripcion no puede ocupar mas de 1600 caracteres');
  
     return false;
} 
else if( minidescripcion.length > 60 ) {
		
		alert('[ERROR] La minidescripcion no puede ocupar mas de 60 caracteres');
  
     return false;
} 
else if( enlaceVideo.length > 100 ) {
		
		alert('[ERROR] El enlace al video no puede ocupar mas de 100 caracteres');
  
     return false;
} 
else if( enlaceProductos.length > 100 ) {
		
		alert('[ERROR] El enlace al producto no puede ocupar mas de 100 caracteres');
  
     return false;
} 



 else if (!(/^([0-9]+){6}$/.test(precio))){
	
	    alert('[ERROR] El precio solo admite numerico y un maximo de 6 digitos');
	
	return false;

}

return true;

}
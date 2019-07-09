function validacion(){

//Cargamos los valores de cada parte del formulario	 
	 valor1 = document.getElementById("escala").value;
	 valor2 = document.getElementById("material").value;
	 valor3 = document.getElementById("calidaddeseada").value;
	 valor4 = document.getElementById("descripcion").value;
	 valor5 = document.getElementById("metodopago").value;
	 valor6 = document.getElementById("telefono").value;
	 valor7 = document.getElementById("email").value;

// Comprobamos que los valores no estén vacios
 if( valor1.length == 0 ) {
		
		alert('[ERROR] La escala no puede estar vacia');
  
     return false;
}

else if( valor2.length == 0 ) {
		
		alert('[ERROR] El material no puede estar en blanco');
  
     return false;
}
else if( valor3.length == 0 ) {
		
		alert('[ERROR] La calidad deseada no puede estar en blanco');
  
     return false;
}else if( valor4.length == 0 ) {
		
		alert('[ERROR] La descripcion no puede estar en blanco');
  
     return false;
}else if( valor5.length == 0 ) {
		
		alert('[ERROR] El método de pago no puede estar en blanco');
  
     return false;
}else if( valor6.length == 0 ) {
		
		alert('[ERROR] El teléfono no puede estar en blanco');
  
     return false;
}else if( valor7.length == 0 ) {
		
		alert('[ERROR] El email no puede estar en blanco');
  
     return false;
}

//Ahora comprobamos que los campos no sean demasiado grandes

else if( valor1.length > 30 ) {
		
		alert('[ERROR] La escala no puede superar los 30 caracteres');
  
     return false;

}else if( valor2.length > 30 ) {
		
		alert('[ERROR] El material no puede superar los 30 caracteres');
  
     return false;

}else if( valor3.length > 30 ) {
		
		alert('[ERROR] La calidad deseada no puede superar los 30 caracteres');
  
     return false;

}else if( valor4.length > 2000 ) {
		
		alert('[ERROR] La descripción del pedido no puede superar los 2000 caracteres');
  
     return false;

}else if( valor5.length > 30 ) {
		
		alert('[ERROR] El método de pago no puede superar los 30 caracteres');
  
     return false;
     
}

//Por último, hacemos las comprobaciones de aquellos campos que deben seguir una estructura concreta
	
 else if( !(/^([0-9]+){9}$/.test(valor6))) {
		
		alert('[ERROR] El teléfono no tiene un formato válido');
  
     return false;

}else if(!(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(valor7))) {
		
		alert('[ERROR] El email no tiene un formato válido');
  
     return false;
     
}

return true;

}


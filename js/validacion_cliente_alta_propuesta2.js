function validacion(){
//Cargamos los valores de cada campo del formulario
	 valor1 = document.getElementById("descripcionProp").value;
	 valor2 = document.getElementById("emailProp").value;
	 
	 
//Comprobamos si están a 0
	 
	 if( valor1.length == 0 ) {
		
		alert('[ERROR] La descripcion no puede estar vacia');
  
     return false;
}

else if( valor2.length == 0 ) {
		
		alert('[ERROR] El email no puede estar en blanco');
  
     return false;
}

//Comprobamos el resto de condiciones
	
else if( valor1.length > 500 ) {
		
		alert('[ERROR] La descripcion sobrepasa los caracteres permitidos');
  
     return false;
} 

 else if (!(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(valor2))){
	
	    alert('[ERROR] El email no es de un formato válido');
	
	return false;

}


	return true;
}
	

function validacion(){

//Cargamos los valores de cada parte del formulario	 

	 valor1 = document.getElementById("nombre").value;
	 valor2 = document.getElementById("apellidos").value;
	 valor3 = document.getElementById("calle").value;
	 valor4 =document.getElementById("email").value;

	var expreg = /^[A-Z][a-z]$/;
	


// Comprobamos que los valores no estén vacios
if( valor1.length > 20 ) {
		
		alert('[ERROR] El nombre no puede tener más de 20 caracteres');
  
     return false;

}else if(valor2.length >20 ){

	alert('[ERROR] Los apellidos no pueden tener mas de 20 caracteres')

return false;

}else if(valor3.length >50){

	alert('[ERROR] La calle no puede tener mas de 40 caracteres')

return false;

}else if (valor3.length==0 ){

	alert('[ERROR] La calle no puede estar vacia')


}else if(!(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(valor4))) {
		
		alert('[ERROR] El email no tiene un formato válido');


  
     return false;
     
}else if (valor1.length==1 ){

	alert('[ERROR] El nombre no puede ser solo una letra');

}

}
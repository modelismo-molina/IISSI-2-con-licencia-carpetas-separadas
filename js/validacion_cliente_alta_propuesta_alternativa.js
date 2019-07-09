function validateForm() {
	var error1 = validacionDescripcion();
	
	$("#descripcion").setCustomValidity(error1);
	
	var error2 = validacionEmail();
	
	$("#email").setCustomValidity(error2);
	
	return (error1.length ==0) && (error2.length==0);
	
}

//Validación de la descripción
function validacionDescripcion(){
	
	valor = document.getElementById("descripcion").value;
	
	return valor.length < 500 ? true : false;	

}


// Validación del email
function validacionEmail(){
	
	valor = document.getElementById("email").value;
	
	if( !(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/.test(valor)) ) {
		
		return false;
}
	
	
}
		
	

//bloqueaPantalla();
const baseUrl = $('#url').val();

//PETICION ASINCRONA GET
const asyncGetReq = async (datos, url) => {
    let params = Object.keys(datos).map(k => encodeURIComponent(k) + '=' + encodeURIComponent(datos[k])).join('&');
	let response = await fetch(`${url}${params}`);	
    if (!response.ok) //Si no es un 200 lanza un error
        throw Error(response.statusText);
    else
        return await response.json(); //Retorna una promesa
}

$(function() 
{
	'use strict'; 
	//bloqueaPantalla();
	/*
	
	let method = 'CKike/Usuario?';
	let criterios = {id_cat_usuario:$('#id_cat_usuario').val()};
	
	asyncGetReq(criterios, baseUrl + method).then(data => 
	{ //Funcion callback``	
	
        	
	  desbloqueaPantalla();
  	}).catch(e => { console.error(e); desbloqueaPantalla();});
	//fin dle proceso
	  */
	

	desbloqueaPantalla();


	$("#form_update_password").on("submit", function(){ 	 
		
		var id_cat_rol = $('#id_cat_rol').val();
		var id_usuario_profesional = $('#id_usuario_profesional').val();
		var password = $('#password').val();				
		
		var formData = new FormData();
	
		formData.append("id_cat_rol", id_cat_rol);		        
		formData.append("id_usuario_profesional", id_usuario_profesional);		        	
		formData.append("password", password);		        
				
		let method_data_update = 'CCambio_Password/update_password';
		var post_url = baseUrl+method_data_update 
		
		$.ajax        
		({
			url: post_url,                       
			type: "POST",               
			dataType:'json',            
			data:formData,            
			processData:false,
			contentType:false,
			cache:false,
			async:false,      
			success: function(data)
			{	
				console.log(data['enviado']);
				Swal.fire({
					title: 'Se Actualizo de manera exitosa la contraseña!',                        
				}).then((result) => {
					location.href=baseUrl + "CInicio";	
				})					
			}
		});
		
		 return false;
		
	 });	
	
});


	

 
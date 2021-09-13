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

	cat_profesion('');

	desbloqueaPantalla();

});

function cat_profesion(profesion)
{

	let method_profesion = 'CPerfilCliente/profesion';
	var post_url = baseUrl+method_profesion

	$.ajax({
		type: "POST",   
		dataType:'json',         
		url: post_url,                          
		success: function(data){                                
			var html = '<option value="">Selecciona Profesión</option>';                
			for (let i in data['profesion']) 				{  
				    
					if (data['profesion'][i].nombre==profesion)                                                  
					  html += '<option value='+data['profesion'][i].id_cat_profesion+' data-nombre="'+data['profesion'][i].nombre+'" selected>'+data['profesion'][i].nombre+'</option>';                                                                                                     					  
					else  
					  html += '<option value='+data['profesion'][i].id_cat_profesion+' data-nombre="'+data['profesion'][i].nombre+'">'+data['profesion'][i].nombre+'</option>';                   
				}    
			
			$('#id_cat_profesion').html(html);	
			
		}
	});

}


$("#form_save_update_pregunta").on("submit", function(){ 		

	var id_cat_usuario=$( "#id_cat_usuario" ).val();
	var id_cat_profesion=$( "#id_cat_profesion" ).val();		
	var profesion=$( "#id_cat_profesion").find(':selected').data('nombre');

	var id_cat_pregunta = $('#id_cat_pregunta').val();			
	var pregunta = $('#pregunta').val();
	
	var formData = new FormData();

	formData.append("id_cat_usuario", id_cat_usuario);
	formData.append("id_cat_profesion", id_cat_profesion);
	formData.append("profesion", profesion);
	formData.append("id_cat_pregunta", id_cat_pregunta);
	formData.append("pregunta", pregunta);

				
	let method_data_save = 'CPerfilCliente/save_update_pregunta';
	var post_url = baseUrl+method_data_save 
	
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
			$('#pregunta').val("");								
		

			Swal.fire({
				title: 'Actualización realizada con exitó!',                        
			}).then((result) => {
				
			})	
		}
	});

	 return false;
	
});	


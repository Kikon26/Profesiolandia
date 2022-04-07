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
  
	var id_cat_tipo_formulario_temp = $('#id_cat_tipo_formulario_temp').val();		
		
	let method_gettipo_mensaje = 'CContactoSugerenciaProblema/GetTipo/'+id_cat_tipo_formulario_temp;
	

	var post_url = baseUrl+method_gettipo_mensaje 
	
	$.ajax        
	({
		url: post_url,                       
		type: "POST",               
		dataType:'json',            		
		processData:false,
		contentType:false,
		cache:false,
		async:false,      
		success: function(data)
		{	
			$('#tipo_mensaje').html(data['tipo_formulario'].tipo_formulario);				
		}
	});

	
	/*
	let method = 'CContactoSugerenciaProblema/tipo_formulario?';
	let criterios = {d:'1'};
	
	asyncGetReq(criterios, baseUrl + method).then(data => 
	{ //Funcion callback``	
	
		


	if (data['tipo_formulario']) 
	{   
		var html = "<option value=''>Tipo de Mensaje</option>";                
		for (let i in data['tipo_formulario']) 
			{ 
				if(id_cat_tipo_formulario_temp==data['tipo_formulario'][i].id_cat_tipo_formulario)

					html += '<option value='+data['tipo_formulario'][i].id_cat_tipo_formulario+'  selected>'+
							//data['rol'][i].id_cat_rol+'.-'+
							data['tipo_formulario'][i].descripcion+'</option>';                   
				else			

					html += '<option value='+data['tipo_formulario'][i].id_cat_tipo_formulario+'  >'+
					//data['rol'][i].id_cat_rol+'.-'+
					data['tipo_formulario'][i].tipo_formulario+'</option>';                   
			}    
		
		$('#id_cat_tipo_formulario').html(html);     
	}	

		
	  desbloqueaPantalla();
  	}).catch(e => { console.error(e); desbloqueaPantalla();});
	//fin dle proceso
	*/  
	desbloqueaPantalla();

	$("#form_save").on("submit", function(){ 	 
		var id_usuario_profesional= $('#id_usuario_profesional').val();
		var id_cat_rol= $('#id_cat_rol').val();
		var nombre = $('#nombre').val();
		var email = $('#email').val();	
		var asunto = $('#asunto').val();	
		var mensaje = $('#mensaje').val();	
		var id_cat_tipo_formulario = $('#id_cat_tipo_formulario_temp').val();
		
		var formData = new FormData();

		formData.append("id_usuario_profesional", id_usuario_profesional);
		formData.append("id_cat_rol", id_cat_rol);
		formData.append("nombre", nombre);
		formData.append("email", email);
		formData.append("asunto", asunto);
		formData.append("mensaje", mensaje);
		formData.append("id_cat_tipo_formulario", id_cat_tipo_formulario);		
				
			
		let method_data_save = 'CContactoSugerenciaProblema/save';
		var post_url = baseUrl+method_data_save 
		// console.log(id_usuario_profesional);
		// console.log(id_cat_rol);
		// console.log(nombre);
		// console.log(email);
		// console.log(asunto);
		// console.log(mensaje);
		// console.log(id_cat_tipo_formulario);
		
		
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
				Swal.fire({
					title: 'Se registro con exito la información, Te hemos enviado un correo de confirmación',                        
				}).then((result) => {
					location.href=baseUrl + "CInicio";	
				})					
			}
		});
		
		 return false;
		
	 });	


});




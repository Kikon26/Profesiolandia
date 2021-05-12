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
  
	let method = 'CRegistro/rol?';
	let criterios = {d:'1'};
	
	asyncGetReq(criterios, baseUrl + method).then(data => 
	{ //Funcion callback``	
	
	
	if (data['rol']) 
	{   
		var html = "<option value=''>Tipo de Registro</option>";                
		for (let i in data['rol']) 
			{ 
				html += '<option value='+data['rol'][i].id_cat_rol+'  >'+
							//data['rol'][i].id_cat_rol+'.-'+
							data['rol'][i].descripcion+'</option>';                   
			}    
		
		$('#id_cat_rol').html(html);     
	}	

		
	  desbloqueaPantalla();
  	}).catch(e => { console.error(e); desbloqueaPantalla();});
	//fin dle proceso

	
	$("#form_save").on("submit", function(){ 	 
		
		var email = $('#email').val();		
		var id_cat_rol = $('#id_cat_rol').val();
		var usuario = $('#usuario').val();
		var password = $('#password').val();				
		
		var formData = new FormData();
		
		formData.append("email", email);
		formData.append("id_cat_rol", id_cat_rol);
		formData.append("usuario", usuario);
		formData.append("password", password);		        
		
	        
		let method_data_save = 'CRegistro/save';
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
				//console.log(data['enviado']);
				location.href=baseUrl + "CBienvenida/index/true/"+data['nombre'];

				/*
                Swal.fire({
					title: 'El registro ha sido creado!',                        
				}).then((result) => {
					
				})*/
			}
		});
	
	
		 return false;
		
	 });	


});


function AvoidSpace(event) {
    var k = event ? event.which : window.event.keyCode;
    if (k == 32) return false;
}



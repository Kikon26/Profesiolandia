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
  
	let method = 'CRegistro_Backup/rol?';
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
		
		cat_estado();

		
	}	

		
	  desbloqueaPantalla();
  	}).catch(e => { console.error(e); desbloqueaPantalla();});
	//fin dle proceso

	
	$("#form_save").on("submit", function(){ 	 
		var nombre = $('#nombre').val();
		var paterno = $('#paterno').val();
		var materno = $('#materno').val();
		var email = $('#email').val();		
		var id_cat_rol = $('#id_cat_rol').val();
		var usuario = $('#usuario').val();
		var password = $('#password').val();
		var file = $("#file").get(0).files[0];	

		var id_cat_estado = $('#id_cat_estado').val();		
		var mpio = $('#mpio').val();		
		var colonia = $('#colonia').val();		
		var calle = $('#calle').val();		
		var cp = $('#cp').val();		
		var num = $('#num').val();		
		var telefono = $('#telefono').val();	
		
		
		var formData = new FormData();

		formData.append("nombre", nombre);

		formData.append("paterno", paterno);
		formData.append("materno", materno);
		formData.append("email", email);
		formData.append("id_cat_rol", id_cat_rol);
		formData.append("usuario", usuario);
		formData.append("password", password);		        
		formData.append("file", file);

		formData.append("id_cat_estado", id_cat_estado);		        
		formData.append("mpio", mpio);		        
		formData.append("colonia", colonia);		        
		formData.append("calle", calle);		        
		formData.append("cp", cp);		        
		formData.append("num", num);		        
		formData.append("telefono", telefono);		        
		
	        
		let method_data_save = 'CRegistro_Backup/save';
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
                Swal.fire({
					title: 'El registro ha sido creado!',                        
				}).then((result) => {
					
				})
			}
		});
	
	
		 return false;
		
	 });	


});




$('#file').on('change',function(){
    //get the file name
    var fileName = $(this).val();
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName.replace(/^.*[\\\/]/, ''));
})

function AvoidSpace(event) {
    var k = event ? event.which : window.event.keyCode;
    if (k == 32) return false;
}


function cat_estado()
{

	let method_estado = 'CRegistro_Backup/estado';
	var post_url = baseUrl+method_estado
	$.ajax({
		type: "POST",   
		dataType:'json',         
		url: post_url,                          
		success: function(data){                                
			var html = '<option value="">Selecciona Estado</option>';                
			for (let i in data['estado']) 				{  
				    
					if (data['estado'][i].id_cat_estado==id_cat_estado)                                                  
					  html += '<option value='+data['estado'][i].id_cat_estado+' data-nombre="'+data['estado'][i].nombre+'" selected>'+data['estado'][i].id_cat_estado+'.-'+data['estado'][i].nombre+'</option>';                                                                                                     					  
					else  
					  html += '<option value='+data['estado'][i].id_cat_estado+' data-nombre="'+data['estado'][i].nombre+'">'+data['estado'][i].id_cat_estado+'.-'+data['estado'][i].nombre+'</option>';                   
				}    
			
			$('#id_cat_estado').html(html);			
			
		}
	});
}
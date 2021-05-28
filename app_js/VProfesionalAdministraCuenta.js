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
  


	let method = 'CProfesionalAdministraCuenta/Usuario?';
	let criterios = {id_cat_profesional:$('#id_cat_profesional').val()};
	
	asyncGetReq(criterios, baseUrl + method).then(data => 
	{ //Funcion callback``	
	
    if (data['usuario']) 
	{   	
        $('#nombre').val(data['usuario'][0].nombre);
		$('#paterno').val(data['usuario'][0].paterno);
		$('#materno').val(data['usuario'][0].materno);
		$('#email').val(data['usuario'][0].email);		
		
		$('#usuario').val(data['usuario'][0].usuario);			
        
		cat_estado(data['usuario'][0].id_cat_estado);

		if (data['usuario'][0].id_cat_estado!=null) 
		{
			$('#existe_direccion').val("si");
			
			
			$('#mpio').val(data['usuario'][0].municipio);		
			$('#colonia').val(data['usuario'][0].colonia);		
			$('#calle').val(data['usuario'][0].calle);		
			$('#cp').val(data['usuario'][0].cp);		
			$('#num').val(data['usuario'][0].num);		
			$('#telefono').val(data['usuario'][0].tel);	
		}	


        
		if(data['usuario'][0].imagen==null) 
		    {
				$("#imagen_perfil").attr('src',baseUrl+"imagenes/no_disponible.jpeg");
				$("#imagen_perfil").attr('data-nombre',"no");
			}	
		else 								
			{
				$("#imagen_perfil").attr('src',baseUrl+"assets/images/profesionales/"+data['usuario'][0].imagen);
				$("#imagen_perfil").attr('data-nombre',data['usuario'][0].imagen);
				
			}	
		$("#div_imagen_perfil").show();	
			
        
    }	

	
	  desbloqueaPantalla();
  	}).catch(e => { console.error(e); desbloqueaPantalla();});
	//fin dle proceso

	
	$("#form_update").on("submit", function(){ 	
		
		var id_cat_profesional=$('#id_cat_profesional').val();
		var nombre = $('#nombre').val();
		var paterno = $('#paterno').val();
		var materno = $('#materno').val();
		var email = $('#email').val();		
		
		var usuario = $('#usuario').val();
		var password = $('#password').val();		
		
		var existe_direccion=$('#existe_direccion').val();
		var id_cat_estado = $('#id_cat_estado').val();		
		var mpio = $('#mpio').val();		
		var colonia = $('#colonia').val();		
		var calle = $('#calle').val();		
		var cp = $('#cp').val();		
		var num = $('#num').val();		
		var telefono = $('#telefono').val();	
				
		var formData = new FormData();

		formData.append("id_cat_profesional", id_cat_profesional);

		if ( $("#file").val()!="" )
        {	
            var file = $("#file").get(0).files[0];				
            formData.append("file", file);
			formData.append("file_exist", "si");	

           
					var imagen_perfil = $("#imagen_perfil").attr("data-nombre");							
					formData.append("imagen_perfil", imagen_perfil);
		}	
		else 		
			formData.append("file_exist", "no");
	

		formData.append("nombre", nombre);

		formData.append("paterno", paterno);
		formData.append("materno", materno);
		formData.append("email", email);		
		formData.append("usuario", usuario);
		formData.append("password", password);		        
		formData.append("file", file);

		formData.append("existe_direccion", existe_direccion);		        
		formData.append("id_cat_estado", id_cat_estado);		        
		formData.append("mpio", mpio);		        
		formData.append("colonia", colonia);		        
		formData.append("calle", calle);		        
		formData.append("cp", cp);		        
		formData.append("num", num);		        
		formData.append("telefono", telefono);		        
			        
		let method_data_save = 'CProfesionalAdministraCuenta/update';
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


function cat_estado(id_cat_estado)
{

	let method_estado = 'CPerfilCliente/estado';
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
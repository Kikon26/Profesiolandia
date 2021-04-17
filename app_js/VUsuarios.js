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
  
  let method = 'CUsuarios/listado?';
  let criterios = {d:'1'};
  
  asyncGetReq(criterios, baseUrl + method).then(data => 
  { //Funcion callback``
		
	
	var table=$('#grid_usuarios').DataTable({
		dom: 'Bfrtip',
		
		data: data['usuarios'],
		columns: [
			    { data: 'id_cat_usuario' },
				{ data: 'usuario' },
				{ data: 'nombre' },
				{ data: 'paterno' },
				{ data: 'materno' },
				{ data: 'email' },
				{ data: 'rol' },				
				{ data: 'imagen' ,  "visible": false},
				{
					data: 'id_cat_usuario',
					className: "center",					
					"render": function ( data, type, full, meta ) 
					{						
						return '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-toggle="modal" data-target="#responsive-modal" data-usuario_id_cat_usuario="'+data+'" data-usuario_nombre="'+full.nombre+'" data-usuario_paterno="'+full.paterno+'" data-usuario_materno="'+full.materno+'" data-usuario_email="'+full.email+'" data-usuario_rol="'+full.rol+'" data-usuario_usuario="'+full.usuario+'" data-usuario_imagen="'+full.imagen+'">Editar</a>'+
								'&nbsp;&nbsp;'+
								'<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-usuario_id_cat_usuario="'+data+'" data-usuario_imagen="'+full.imagen+'">Eliminar</a> ';						
					}
					
				}
			],
		
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		],
		lengthMenu: [ 10, 25, 50, 75, 100 ],
		pageLength : 20
		
	});	



	$('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
	
	
	
	  desbloqueaPantalla();
  	}).catch(e => { console.error(e); desbloqueaPantalla();});
	//fin dle proceso

	//get data for add record	
	$('#btn_add').on('click',function() {
		cat_rol("usuario_id_cat_rol","Add","-1");
		$('#Modal_Add').modal('show');		
		
	});			

	$("#form_save").on("submit", function(){ 	 
		var usuario_nombre = $('#usuario_nombre').val();
		var usuario_paterno = $('#usuario_paterno').val();
		var usuario_materno = $('#usuario_materno').val();
		var usuario_email = $('#usuario_email').val();		
		var usuario_id_cat_rol = $('#usuario_id_cat_rol').val();
		var usuario_usuario = $('#usuario_usuario').val();
		var usuario_password = $('#usuario_password').val();
		var file = $("#file").get(0).files[0];	
		
		
		var formData = new FormData();

		formData.append("usuario_nombre", usuario_nombre);

		formData.append("usuario_paterno", usuario_paterno);
		formData.append("usuario_materno", usuario_materno);
		formData.append("usuario_email", usuario_email);
		formData.append("usuario_id_cat_rol", usuario_id_cat_rol);
		formData.append("usuario_usuario", usuario_usuario);
		formData.append("usuario_password", usuario_password);		        
		formData.append("file", file);
		
	        
		let method_data_save = 'CUsuarios/save';
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
                $('#usuario_nombre').val("");
				$('#usuario_paterno').val("");
				$('#usuario_materno').val("");
				$('#usuario_email').val("");
				$('#usuario_id_cat_rol').val("");
				$('#usuario_usuario').val("");
				$('#usuario_password').val("");
				$('#usuario_password2').val("");
				$("#file").val("");    
        		$("#label_file").html("");				
				$('#Modal_Add').modal('hide');
				show_usuarios();	
			}
		});
	
	
		 return false;
		
	 });	

	  //get data for update record	 
	 $('#show_data').on('click','.item_edit',function(){				
		var usuario_id_cat_usuario = $(this).data('usuario_id_cat_usuario');				 
        var usuario_imagen = $(this).data('usuario_imagen');				  

		var usuario_nombre = $(this).data('usuario_nombre');				 
		var usuario_paterno = $(this).data('usuario_paterno');				 
		var usuario_materno = $(this).data('usuario_materno');				 
		var usuario_email = $(this).data('usuario_email');				 
		cat_rol("usuario_id_cat_rol_edit","Edit",$(this).data('usuario_rol'));		
		
		var usuario_usuario = $(this).data('usuario_usuario');			
		
		$('#Modal_Edit').modal('show');		
		$('[name="usuario_id_cat_usuario_edit"]').val(usuario_id_cat_usuario);		
		$('[name="usuario_imagen_edit"]').val(usuario_imagen);		

		$('[name="usuario_nombre_edit"]').val(usuario_nombre.trim());
		$('[name="usuario_paterno_edit"]').val(usuario_paterno.trim());
		$('[name="usuario_materno_edit"]').val(usuario_materno.trim());
		$('[name="usuario_email_edit"]').val(usuario_email.trim());

		$('[name="usuario_usuario_edit"]').val(usuario_usuario.trim());
		$('[name="usuario_password_edit"]').val("");
		$('[name="usuario_password2_edit"]').val("");
				
		$("#file_edit").val("");    
        $("#label_file_edit").html("");			
	 });
	 
	 //update record to database
	 //$('#btn_update').on('click',function(){
	 $("#form_update").on("submit", function(){ 
		var usuario_id_cat_usuario = $('#usuario_id_cat_usuario_edit').val();
		var usuario_imagen = $('#usuario_imagen_edit').val();
		 
		var usuario_nombre = $('#usuario_nombre_edit').val();
		var usuario_paterno = $('#usuario_paterno_edit').val();
		var usuario_materno = $('#usuario_materno_edit').val();
		var usuario_email = $('#usuario_email_edit').val();		
		var usuario_id_cat_rol = $('#usuario_id_cat_rol_edit').val();
		var usuario_usuario = $('#usuario_usuario_edit').val();
		var usuario_password = $('#usuario_password_edit').val();
		var file = $("#file_edit").get(0).files[0];	
		
		var formData = new FormData();
		
		formData.append("usuario_id_cat_usuario", usuario_id_cat_usuario);
		formData.append("usuario_imagen", usuario_imagen);

		formData.append("usuario_nombre", usuario_nombre);

		formData.append("usuario_paterno", usuario_paterno);
		formData.append("usuario_materno", usuario_materno);
		formData.append("usuario_email", usuario_email);
		formData.append("usuario_id_cat_rol", usuario_id_cat_rol);
		formData.append("usuario_usuario", usuario_usuario);
		formData.append("usuario_password", usuario_password);		        
		
		if( typeof(file) == 'undefined' ) 		
			formData.append("file_exist", "no");
		else 
		{
			formData.append("file_exist", "si");
	        formData.append("file", file);  
	    }
	       
		let method_data_update = 'CUsuarios/update';
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
                $('#usuario_nombre_edit').val("");
				$('#usuario_paterno_edit').val("");
				$('#usuario_materno_edit').val("");
				$('#usuario_email_edit').val("");
				$('#usuario_id_cat_rol_edit').val(0);
				$('#usuario_usuario_edit').val("");
				$('#usuario_password_edit').val("");
				$('#usuario_password2_edit').val("");
				$("#file_edit").val("");    
        		$("#label_file_edit").html("");							
				$('#Modal_Edit').modal('hide');
				show_usuarios();
			}
		});	 
		return false;
	});

	//get data for delete record
	$('#show_data').on('click','.item_delete',function(){
		var usuario_id_cat_usuario = $(this).data('usuario_id_cat_usuario');
		var usuario_imagen = $(this).data('usuario_imagen');
		 
		$('#Modal_Delete').modal('show');
		$('[name="usuario_id_cat_usuario_delete"]').val(usuario_id_cat_usuario);
		$('[name="usuario_imagen_delete"]').val(usuario_imagen);
	});


	
	//delete record to database
	 $('#btn_delete').on('click',function(){
		var usuario_id_cat_usuario = $('#usuario_id_cat_usuario_delete').val();
		var usuario_imagen = $('#usuario_imagen_delete').val();
        
		let method_data_delete = 'CUsuarios/delete';
        var post_url = baseUrl+method_data_delete                        
		$.ajax
		({
			type: "POST",   
            dataType:'json',         
			url: post_url,           
			data : {"usuario_id_cat_usuario":usuario_id_cat_usuario,"usuario_imagen":usuario_imagen}, 			
			success: function(data)
			{	
				$('[name="usuario_id_cat_usuario_delete"]').val("");
				$('[name="usuario_imagen_delete"]').val("");
				$('#Modal_Delete').modal('hide');
				show_usuarios()
			}
		});
		return false;
	});	

});




function show_usuarios()
{
	//******************************************************************************************************************
	let method_usuarios = 'CUsuarios/listado';
	var post_url = baseUrl+method_usuarios
	$.ajax(
	{
		type: "POST",   
		dataType:'json',         
		url: post_url,                          
		success: function(data)
		{    
			
			if ($.fn.dataTable.isDataTable('#grid_usuarios')) 
				$('#grid_usuarios').DataTable().destroy();
			
			
				var table=$('#grid_usuarios').DataTable({
					dom: 'Bfrtip',
					
					data: data['usuarios'],
					columns: [
							{ data: 'id_cat_usuario' },
							{ data: 'usuario' },
							{ data: 'nombre' },
							{ data: 'paterno' },
							{ data: 'materno' },
							{ data: 'email' },
							{ data: 'rol' },							
							{ data: 'imagen' ,  "visible": false},
							{
								data: 'id_cat_usuario',
								className: "center",					
								"render": function ( data, type, full, meta ) 
								{						
									return '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-toggle="modal" data-target="#responsive-modal" data-usuario_id_cat_usuario="'+data+'" data-usuario_nombre="'+full.nombre+'" data-usuario_paterno="'+full.paterno+'" data-usuario_materno="'+full.materno+'" data-usuario_email="'+full.email+'" data-usuario_rol="'+full.rol+'" data-usuario_usuario="'+full.usuario+'" data-usuario_imagen="'+full.imagen+'">Editar</a>'+
											'&nbsp;&nbsp;'+
											'<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-usuario_id_cat_usuario="'+data+'" data-usuario_imagen="'+full.imagen+'">Eliminar</a> ';						
								}
								
							}
						],
					
					buttons: [
						'copy', 'csv', 'excel', 'pdf', 'print'
					],
					lengthMenu: [ 10, 25, 50, 75, 100 ],
					pageLength : 20
					
				});	
			
			
			
				$('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');

		
			

		}
	});		
	//******************************************************************************************************************	
}

function cat_rol(nombre_select,modal,rol)
{

	let method_rol = 'CUsuarios/rol';
	var post_url = baseUrl+method_rol
	$.ajax({
		type: "POST",   
		dataType:'json',         
		url: post_url,                          
		success: function(data){                                
			var html = '<option value="">Selecciona Rol</option>';                
			for (let i in data['rol']) 				{  
				    
					if (data['rol'][i].nombre==rol)                                                  
					  html += '<option value='+data['rol'][i].id_cat_rol+' data-nombre="'+data['rol'][i].nombre+'" selected>'+data['rol'][i].id_cat_rol+'.-'+data['rol'][i].nombre+'</option>';                                                                                                     					  
					else  
					  html += '<option value='+data['rol'][i].id_cat_rol+' data-nombre="'+data['rol'][i].nombre+'">'+data['rol'][i].id_cat_rol+'.-'+data['rol'][i].nombre+'</option>';                   
				}    
			
			$('#'+nombre_select).html(html);			
			$('#'+nombre_select).select2({
				dropdownParent: $("#Modal_"+modal)
			  });
			$('#'+nombre_select).change();  

			
		}
	});

}




$('#file').on('change',function(){
    //get the file name
    var fileName = $(this).val();
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName.replace(/^.*[\\\/]/, ''));
})

$('#file_edit').on('change',function(){
    //get the file name
    var fileName = $(this).val();
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName.replace(/^.*[\\\/]/, ''));
})

function AvoidSpace(event) {
    var k = event ? event.which : window.event.keyCode;
    if (k == 32) return false;
}

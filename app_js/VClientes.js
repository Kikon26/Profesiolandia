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
  
  let method = 'CClientes/listado?';
  let criterios = {d:'1'};
  
  asyncGetReq(criterios, baseUrl + method).then(data => { //Funcion callback``
		
	
	var table=$('#grid_clientes').DataTable({
		dom: 'Bfrtip',
		
		data: data['clientes'],
		columns: [
			    { data: 'id_cat_cliente' },
				{ data: 'nombre' },
				{ data: 'apellidos' },
				{ data: 'cel' },				
				{ data: 'correo' },				
				{
					data: 'id_cat_cliente',
					className: "center",					
					"render": function ( data, type, full, meta ) 
					{						
						return '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-toggle="modal" data-target="#responsive-modal" data-cliente_id_cat_cliente="'+data+'" data-cliente_nombre="'+full.nombre+'" data-cliente_apellidos="'+full.apellidos+'" data-cliente_cel="'+full.cel+'" data-cliente_correo="'+full.correo+'" >Editar</a>'+
								'&nbsp;&nbsp;'+
								'<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-cliente_id_cat_cliente="'+data+'">Eliminar</a> ';						
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
		$('#Modal_Add').modal('show');		
		
	});			

	$("#form_save").on("submit", function(){ 	 
		var cliente_nombre = $('#cliente_nombre').val();
		var cliente_apellidos = $('#cliente_apellidos').val();
		var cliente_cel = $('#cliente_cel').val();
		var cliente_correo = $('#cliente_correo').val();				
		
		let method_data_save = 'CClientes/save';
        var post_url = baseUrl+method_data_save                        
		
		$.ajax
		({
			type: "POST",   
            dataType:'json',         
            url: post_url,           
			data : {"cliente_nombre":cliente_nombre,"cliente_apellidos":cliente_apellidos,"cliente_cel":cliente_cel,"cliente_correo":cliente_correo}, 
			success: function(data)
			{	
				$('#cliente_nombre').val("");
				$('#cliente_apellidos').val("");
				$('#cliente_cel').val("");
				$('#cliente_correo').val("");				
				$('#Modal_Add').modal('hide');
				show_clientes();	
			}
	    });
		 return false;
		
	 });	

	  //get data for update record	 
	 $('#show_data').on('click','.item_edit',function(){				
		var cliente_id_cat_cliente = $(this).data('cliente_id_cat_cliente');				 
		var cliente_nombre = $(this).data('cliente_nombre');				 
		var cliente_apellidos = $(this).data('cliente_apellidos');				 
		var cliente_cel = $(this).data('cliente_cel');				 
		var cliente_correo = $(this).data('cliente_correo');				 
		
		
		$('#Modal_Edit').modal('show');		
		$('[name="cliente_id_cat_cliente_edit"]').val(cliente_id_cat_cliente);		
		$('[name="cliente_nombre_edit"]').val(cliente_nombre.trim());
		$('[name="cliente_apellidos_edit"]').val(cliente_apellidos.trim());
		$('[name="cliente_cel_edit"]').val(cliente_cel);
		$('[name="cliente_correo_edit"]').val(cliente_correo.trim());	
		
	 });
	 
	 //update record to database
	 //$('#btn_update').on('click',function(){
	 $("#form_update").on("submit", function(){ 	 
		var cliente_id_cat_cliente = $('#cliente_id_cat_cliente_edit').val();
		var cliente_nombre = $('#cliente_nombre_edit').val();
		var cliente_apellidos = $('#cliente_apellidos_edit').val();
		var cliente_cel = $('#cliente_cel_edit').val();
		var cliente_correo = $('#cliente_correo_edit').val();
		
		let method_data_update = 'CClientes/update';
		var post_url = baseUrl+method_data_update                        
		
		
		$.ajax
		({
			type: "POST",   
            dataType:'json',         
			url: post_url,           			
			data : {"cliente_id_cat_cliente":cliente_id_cat_cliente,"cliente_nombre":cliente_nombre,"cliente_apellidos":cliente_apellidos,"cliente_cel":cliente_cel,"cliente_correo":cliente_correo}, 
			success: function(data)
			{	
				$('#cliente_nombre_edit').val("");
				$('#cliente_apellidos_edit').val("");
				$('#cliente_cel_edit').val("");
				$('#cliente_correo_edit').val("");				
				$('#Modal_Edit').modal('hide');
				show_clientes();	
			}
		});
		return false;
	});

	//get data for delete record
	$('#show_data').on('click','.item_delete',function(){
		var cliente_id_cat_cliente = $(this).data('cliente_id_cat_cliente');
		 
		$('#Modal_Delete').modal('show');
		$('[name="cliente_id_cat_cliente_delete"]').val(cliente_id_cat_cliente);
	});


	
	//delete record to database
	 $('#btn_delete').on('click',function(){
		var cliente_id_cat_cliente = $('#cliente_id_cat_cliente_delete').val();
        
		let method_data_delete = 'CClientes/delete';
        var post_url = baseUrl+method_data_delete                        
		$.ajax
		({
			type: "POST",   
            dataType:'json',         
			url: post_url,           
			data : {"cliente_id_cat_cliente":cliente_id_cat_cliente}, 			
			success: function(data)
			{	
				$('[name="cliente_id_cat_cliente_delete"]').val("");
				$('#Modal_Delete').modal('hide');
				show_clientes()
			}
		});
		return false;
	});	

});




function show_clientes()
{
	//******************************************************************************************************************
	let method_usuarios = 'CClientes/listado';
	var post_url = baseUrl+method_usuarios
	$.ajax(
	{
		type: "POST",   
		dataType:'json',         
		url: post_url,                          
		success: function(data)
		{    
			
			if ($.fn.dataTable.isDataTable('#grid_clientes')) 
				$('#grid_clientes').DataTable().destroy();
			
			
				var table=$('#grid_clientes').DataTable({
					dom: 'Bfrtip',
					
					data: data['clientes'],
					columns: [
							{ data: 'id_cat_cliente' },
							{ data: 'nombre' },
							{ data: 'apellidos' },
							{ data: 'cel' },				
							{ data: 'correo' },				
							{
								data: 'id_cat_cliente',
								className: "center",					
								"render": function ( data, type, full, meta ) 
								{						
									return '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-toggle="modal" data-target="#responsive-modal" data-cliente_id_cat_cliente="'+data+'" data-cliente_nombre="'+full.nombre+'" data-cliente_apellidos="'+full.apellidos+'" data-cliente_cel="'+full.cel+'" data-cliente_correo="'+full.correo+'" >Editar</a>'+
											'&nbsp;&nbsp;'+
											'<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-cliente_id_cat_cliente="'+data+'">Eliminar</a> ';						
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


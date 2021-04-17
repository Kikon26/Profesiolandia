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
  
  let method = 'CProfesionales/listado?';
  let criterios = {d:'1'};
  
  asyncGetReq(criterios, baseUrl + method).then(data => 
  { //Funcion callback``
		
	
	var table=$('#grid_profesionales').DataTable({
		dom: 'Bfrtip',
		
		data: data['profesionales'],
		columns: [
				{ data: 'id_cat_profesional' },
				{ data: 'profesion' },	
				{ data: 'nombre' },
				{ data: 'paterno' },
				{ data: 'materno' },
				{ data: 'email' },
				{ data: 'usuario' },				
				{ data: 'imagen' ,  "visible": false},
				{
					data: 'id_cat_profesional',
					className: "center",					
					"render": function ( data, type, full, meta ) 
					{						
						return '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-toggle="modal" data-target="#responsive-modal" data-profesional_id_cat_profesional="'+data+'" data-profesional_especialidad="'+full.especialidad+'" data-profesional_descripcion="'+full.descripcion+'" data-profesional_nombre="'+full.nombre+'" data-profesional_paterno="'+full.paterno+'" data-profesional_materno="'+full.materno+'" data-profesional_email="'+full.email+'" data-profesional_profesion="'+full.profesion+'" data-profesional_usuario="'+full.usuario+'" data-profesional_costo_consulta="'+full.costo_consulta+'" data-profesional_imagen="'+full.imagen+'">Editar</a>'+
								'&nbsp;&nbsp;'+
								'<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-profesional_id_cat_profesional="'+data+'" data-profesional_imagen="'+full.imagen+'">Eliminar</a> ';						
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
		cat_profesion("profesional_id_cat_profesion","Add","-1");
		cat_estado("profesional_id_cat_estado","Add","-1");
		$('#Modal_Add').modal('show');		
		
	});			

	$("#form_save").on("submit", function(){ 	
		var profesional_especialidad = $('#profesional_especialidad').val();
		var profesional_descripcion = $('#profesional_descripcion').val();

		var profesional_nombre = $('#profesional_nombre').val();
		var profesional_paterno = $('#profesional_paterno').val();
		var profesional_materno = $('#profesional_materno').val();
		var profesional_email = $('#profesional_email').val();		
		var profesional_id_cat_profesion = $('#profesional_id_cat_profesion').val();
		var profesional_usuario = $('#profesional_usuario').val();
		var profesional_password = $('#profesional_password').val();
		var profesional_costo_consulta = $('#profesional_costo_consulta').val();
		profesional_costo_consulta = profesional_costo_consulta.replace('$', '');
		profesional_costo_consulta = profesional_costo_consulta.replace(',', '');

		var file = $("#file").get(0).files[0];	

		var profesional_id_cat_estado = $('#profesional_id_cat_estado').val();		
		var profesional_mpio = $('#profesional_mpio').val();		
		var profesional_colonia = $('#profesional_colonia').val();		
		var profesional_calle = $('#profesional_calle').val();		
		var profesional_cp = $('#profesional_cp').val();		
		var profesional_num = $('#profesional_num').val();		
		var profesional_telefono = $('#profesional_telefono').val();		

		var formData = new FormData();
		
		formData.append("profesional_especialidad", profesional_especialidad);
		formData.append("profesional_descripcion", profesional_descripcion);

		formData.append("profesional_nombre", profesional_nombre);

		formData.append("profesional_paterno", profesional_paterno);
		formData.append("profesional_materno", profesional_materno);
		formData.append("profesional_email", profesional_email);
		formData.append("profesional_id_cat_profesion", profesional_id_cat_profesion);
		formData.append("profesional_usuario", profesional_usuario);
		formData.append("profesional_password", profesional_password);		        
		formData.append("profesional_costo_consulta", profesional_costo_consulta);		        
		formData.append("file", file);

		formData.append("profesional_id_cat_estado", profesional_id_cat_estado);		        
		formData.append("profesional_mpio", profesional_mpio);		        
		formData.append("profesional_colonia", profesional_colonia);		        
		formData.append("profesional_calle", profesional_calle);		        
		formData.append("profesional_cp", profesional_cp);		        
		formData.append("profesional_num", profesional_num);		        
		formData.append("profesional_telefono", profesional_telefono);		        
				       
		let method_data_save = 'CProfesionales/save';
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
				$('#profesional_especialidad').val("");
				$('#profesional_descripcion').val("");

                $('#profesional_nombre').val("");
				$('#profesional_paterno').val("");
				$('#profesional_materno').val("");
				$('#profesional_email').val("");
				$('#profesional_id_cat_profesion').val("");
				$('#profesional_usuario').val("");
				$('#profesional_password').val("");
				$('#profesional_password2').val("");
				$('#profesional_costo_consulta').val("");
				$("#file").val("");    
				$("#label_file").html("");	

				$('#profesional_mpio').val("");
				$('#profesional_colonia').val("");
				$('#profesional_calle').val("");
				$('#profesional_cp').val("");
				$('#profesional_num').val("");
				$('#profesional_telefono').val("");

				
				$('#Modal_Add').modal('hide');
				show_profesionales();	
			}
		});
		

		 return false;
		
	});	

	  //get data for update record	 
	 $('#show_data').on('click','.item_edit',function(){				
		var profesional_id_cat_profesional = $(this).data('profesional_id_cat_profesional');				 
        var profesional_imagen = $(this).data('profesional_imagen');				  

		var profesional_especialidad = $(this).data('profesional_especialidad');				 
		var profesional_descripcion = $(this).data('profesional_descripcion');				 

		var profesional_nombre = $(this).data('profesional_nombre');				 
		var profesional_paterno = $(this).data('profesional_paterno');				 
		var profesional_materno = $(this).data('profesional_materno');				 
		var profesional_email = $(this).data('profesional_email');				 		
		
		cat_profesion("profesional_id_cat_profesion_edit","Edit",$(this).data('profesional_profesion'));				
		
		var profesional_usuario = $(this).data('profesional_usuario');			
		var profesional_costo_consulta = $(this).data('profesional_costo_consulta');				 		
		
		$('#Modal_Edit').modal('show');		
		$('[name="profesional_id_cat_profesional_edit"]').val(profesional_id_cat_profesional);		
		$('[name="profesional_imagen_edit"]').val(profesional_imagen);		

		$('[name="profesional_especialidad_edit"]').val(profesional_especialidad.trim());
		$('[name="profesional_descripcion_edit"]').val(profesional_descripcion.trim());
		
		$('[name="profesional_nombre_edit"]').val(profesional_nombre.trim());
		$('[name="profesional_paterno_edit"]').val(profesional_paterno.trim());
		$('[name="profesional_materno_edit"]').val(profesional_materno.trim());
		$('[name="profesional_email_edit"]').val(profesional_email.trim());

		$('[name="profesional_usuario_edit"]').val(profesional_usuario);
		$('[name="profesional_password_edit"]').val("");
		$('[name="profesional_password2_edit"]').val("");
		$('[name="profesional_costo_consulta_edit"]').val("$"+ new Intl.NumberFormat("es-MX").format(profesional_costo_consulta)); 
		
		$("#file_edit").val("");    
		$("#label_file_edit").html("");		
			
		direcciones(profesional_id_cat_profesional);
	});
	 

	 $("#form_update").on("submit", function(){ 
		var profesional_id_cat_profesional = $('#profesional_id_cat_profesional_edit').val();
		var profesional_imagen = $('#profesional_imagen_edit').val();
		
		var profesional_especialidad = $('#profesional_especialidad_edit').val();
		var profesional_descripcion = $('#profesional_descripcion_edit').val();

		var profesional_nombre = $('#profesional_nombre_edit').val();
		var profesional_paterno = $('#profesional_paterno_edit').val();
		var profesional_materno = $('#profesional_materno_edit').val();
		var profesional_email = $('#profesional_email_edit').val();		
		var profesional_id_cat_profesion = $('#profesional_id_cat_profesion_edit').val();
		var profesional_usuario = $('#profesional_usuario_edit').val();		
		var profesional_password = $('#profesional_password_edit').val();
		var profesional_costo_consulta = $('#profesional_costo_consulta_edit').val();		

		profesional_costo_consulta = profesional_costo_consulta.replace('$', '');
		profesional_costo_consulta = profesional_costo_consulta.replace(',', '');

		var file = $("#file_edit").get(0).files[0];	

		var profesional_id_cat_estado = $('#profesional_id_cat_estado_edit').val();		
		var profesional_mpio = $('#profesional_mpio_edit').val();		
		var profesional_colonia = $('#profesional_colonia_edit').val();		
		var profesional_calle = $('#profesional_calle_edit').val();		
		var profesional_cp = $('#profesional_cp_edit').val();		
		var profesional_num = $('#profesional_num_edit').val();		
		var profesional_telefono = $('#profesional_telefono_edit').val();		
		
		var formData = new FormData();
		
		formData.append("profesional_id_cat_profesional", profesional_id_cat_profesional);
		formData.append("profesional_imagen", profesional_imagen);

		formData.append("profesional_especialidad", profesional_especialidad);
		formData.append("profesional_descripcion", profesional_descripcion);

		formData.append("profesional_nombre", profesional_nombre);

		formData.append("profesional_paterno", profesional_paterno);
		formData.append("profesional_materno", profesional_materno);
		formData.append("profesional_email", profesional_email);
		formData.append("profesional_id_cat_profesion", profesional_id_cat_profesion);
		formData.append("profesional_usuario", profesional_usuario);
		formData.append("profesional_password", profesional_password);		        
		formData.append("profesional_costo_consulta", profesional_costo_consulta);		        
		
		if( typeof(file) == 'undefined' ) 		
			formData.append("file_exist", "no");
		else 
		{
			formData.append("file_exist", "si");
	        formData.append("file", file);  
		}
		

		formData.append("profesional_id_cat_estado", profesional_id_cat_estado);		        
		formData.append("profesional_mpio", profesional_mpio);		        
		formData.append("profesional_colonia", profesional_colonia);		        
		formData.append("profesional_calle", profesional_calle);		        
		formData.append("profesional_cp", profesional_cp);		        
		formData.append("profesional_num", profesional_num);		        
		formData.append("profesional_telefono", profesional_telefono);		        
        
		let method_data_update = 'CProfesionales/update';
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
				$('#profesional_especialidad_edit').val("");
				$('#profesional_descripcion_edit').val("");

                $('#profesional_nombre_edit').val("");
				$('#profesional_paterno_edit').val("");
				$('#profesional_materno_edit').val("");
				$('#profesional_email_edit').val("");
				$('#profesional_id_cat_profesion_edit').val(0);
				$('#profesional_usuario_edit').val("");
				$('#profesional_password_edit').val("");
				$('#profesional_password2_edit').val("");
				$('#profesional_costo_consulta_edit').val("");
				$("#file_edit").val("");    
        		$("#label_file_edit").html("");				
				$('#Modal_Edit').modal('hide');
				show_profesionales();
			}
		});	 
		return false;
	});

	//get data for delete record
	$('#show_data').on('click','.item_delete',function(){
		var profesional_id_cat_profesional = $(this).data('profesional_id_cat_profesional');
		var profesional_imagen = $(this).data('profesional_imagen');
		 
		$('#Modal_Delete').modal('show');
		$('[name="profesional_id_cat_profesional_delete"]').val(profesional_id_cat_profesional);
		$('[name="profesional_imagen_delete"]').val(profesional_imagen);
	});


	
	//delete record to database
	 $('#btn_delete').on('click',function(){
		var profesional_id_cat_profesional = $('#profesional_id_cat_profesional_delete').val();		
		var profesional_imagen = $('#profesional_imagen_delete').val();
        
		let method_data_delete = 'CProfesionales/delete';
        var post_url = baseUrl+method_data_delete                        
		$.ajax
		({
			type: "POST",   
            dataType:'json',         
			url: post_url,           
			data : {"profesional_id_cat_profesional":profesional_id_cat_profesional,"profesional_imagen":profesional_imagen}, 			
			success: function(data)
			{	
				$('[name="profesional_id_cat_profesional_delete"]').val("");
				$('[name="profesional_imagen_delete"]').val("");
				$('#Modal_Delete').modal('hide');
				show_profesionales()
			}
		});
		return false;
	});	
	
});




function show_profesionales()
{
	//******************************************************************************************************************
	let method_profesionales = 'CProfesionales/listado';
	var post_url = baseUrl+method_profesionales
	$.ajax(
	{
		type: "POST",   
		dataType:'json',         
		url: post_url,                          
		success: function(data)
		{    
			
			if ($.fn.dataTable.isDataTable('#grid_profesionales')) 
				$('#grid_profesionales').DataTable().destroy();
			
			
				var table=$('#grid_profesionales').DataTable({
					dom: 'Bfrtip',
					
					data: data['profesionales'],
					columns: [
							{ data: 'id_cat_profesional' },
							{ data: 'profesion' },							
							{ data: 'nombre' },
							{ data: 'paterno' },
							{ data: 'materno' },
							{ data: 'email' },
							{ data: 'usuario' },
							
							{ data: 'imagen' ,  "visible": false},
							{
								data: 'id_cat_profesional',
								className: "center",					
								"render": function ( data, type, full, meta ) 
								{						
									return '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-toggle="modal" data-target="#responsive-modal" data-profesional_id_cat_profesional="'+data+'" data-profesional_especialidad="'+full.especialidad+'" data-profesional_descripcion="'+full.descripcion+'" data-profesional_nombre="'+full.nombre+'" data-profesional_paterno="'+full.paterno+'" data-profesional_materno="'+full.materno+'" data-profesional_email="'+full.email+'" data-profesional_profesion="'+full.profesion+'" data-profesional_usuario="'+full.usuario+'" data-profesional_costo_consulta="'+full.costo_consulta+'" data-profesional_imagen="'+full.imagen+'">Editar</a>'+
											'&nbsp;&nbsp;'+
											'<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-profesional_id_cat_profesional="'+data+'" data-profesional_imagen="'+full.imagen+'">Eliminar</a> ';						
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

function cat_profesion(nombre_select,modal,profesion)
{

	let method_profesion = 'CProfesionales/profesion';
	var post_url = baseUrl+method_profesion

	$.ajax({
		type: "POST",   
		dataType:'json',         
		url: post_url,                          
		success: function(data){                                
			var html = '<option value="">Selecciona Profesión</option>';                
			for (let i in data['profesion']) 				{  
				    
					if (data['profesion'][i].nombre==profesion)                                                  
					  html += '<option value='+data['profesion'][i].id_cat_profesion+' data-nombre="'+data['profesion'][i].nombre+'" selected>'+data['profesion'][i].id_cat_profesion+'.-'+data['profesion'][i].nombre+'</option>';                                                                                                     					  
					else  
					  html += '<option value='+data['profesion'][i].id_cat_profesion+' data-nombre="'+data['profesion'][i].nombre+'">'+data['profesion'][i].id_cat_profesion+'.-'+data['profesion'][i].nombre+'</option>';                   
				}    
			
			$('#'+nombre_select).html(html);			
			$('#'+nombre_select).select2({
				dropdownParent: $("#Modal_"+modal)
			  });
			$('#'+nombre_select).change();  

			
		}
	});

}

function cat_estado(nombre_select,modal,id_cat_estado)
{

	let method_estado = 'CProfesionales/estado';
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
			
			$('#'+nombre_select).html(html);			
			$('#'+nombre_select).select2({
				dropdownParent: $("#Modal_"+modal)
			  });
			$('#'+nombre_select).change();  

			
		}
	});
}

function direcciones(id_cat_profesional)
{
	let method_direccion = 'CProfesionales/direccion';
	var post_url = baseUrl+method_direccion
   
	var formData = new FormData();		
    formData.append("id_cat_profesional", id_cat_profesional);

	$.ajax({
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
			for (let i in data['direccion']) 				
			{  	
				    cat_estado("profesional_id_cat_estado_edit","Edit",data['direccion'][i].id_cat_estado);		
					$('#profesional_mpio_edit').val(data['direccion'][i].municipio);
					$('#profesional_colonia_edit').val(data['direccion'][i].colonia);
					$('#profesional_calle_edit').val(data['direccion'][i].calle);
					$('#profesional_cp_edit').val(data['direccion'][i].cp);
					$('#profesional_num_edit').val(data['direccion'][i].num);
					$('#profesional_telefono_edit').val(data['direccion'][i].tel);
			}  
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


$("input[data-type='currency']").on
({
	keyup: function() {
	  formatCurrency($(this));
	},
	blur: function() { 
	  formatCurrency($(this), "blur");
	}
});

function formatNumber(n) 
{
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}

function formatCurrency(input, blur) 
{
	// appends $ to value, validates decimal side
	// and puts cursor back in right position.
	
	// get input value
	var input_val = input.val();
	
	// don't validate empty input
	if (input_val === "") { return; }
	
	// original length
	var original_len = input_val.length;

	// initial caret position 
	var caret_pos = input.prop("selectionStart");
		
	// check for decimal
	if (input_val.indexOf(".") >= 0) {

		// get position of first decimal
		// this prevents multiple decimals from
		// being entered
		var decimal_pos = input_val.indexOf(".");

		// split number by decimal point
		var left_side = input_val.substring(0, decimal_pos);
		var right_side = input_val.substring(decimal_pos);

		// add commas to left side of number
		left_side = formatNumber(left_side);

		// validate right side
		right_side = formatNumber(right_side);
		
		// On blur make sure 2 numbers after decimal
		if (blur === "blur") {
		right_side += "00";
		}
		
		// Limit decimal to only 2 digits
		right_side = right_side.substring(0, 2);

		// join number by .
		input_val = "$" + left_side + "." + right_side;

	} else {
		// no decimal entered
		// add commas to number
		// remove all non-digits
		input_val = formatNumber(input_val);
		input_val = "$" + input_val;
		
		// final formatting
		if (blur === "blur") {
		input_val += ".00";
		}
	}
	
	// send updated string to input
	input.val(input_val);

	// put caret back in the right position
	var updated_len = input_val.length;
	caret_pos = updated_len - original_len + caret_pos;
	input[0].setSelectionRange(caret_pos, caret_pos);
}    
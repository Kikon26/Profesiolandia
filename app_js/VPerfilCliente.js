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
  
	loadPagination(0);
	loadPagination_contenido_interes(0);
	loadPagination_preguntas(0);

	let method = 'CPerfilCliente/Usuario?';
	let criterios = {id_cat_usuario:$('#id_cat_usuario').val()};
	
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
				$("#imagen_perfil").attr('src',baseUrl+"assets/images/users/"+data['usuario'][0].imagen);
				$("#imagen_perfil").attr('data-nombre',data['usuario'][0].imagen);
				
			}	
		$("#div_imagen_perfil").show();	
			
        
    }	

	
	  desbloqueaPantalla();
  	}).catch(e => { console.error(e); desbloqueaPantalla();});
	//fin dle proceso

	
	$("#form_update").on("submit", function(){ 	
		
		var id_cat_usuario=$('#id_cat_usuario').val();
		var nombre = $('#nombre').val();
		var paterno = $('#paterno').val();
		var materno = $('#materno').val();
		var email = $('#email').val();		
		
		var usuario = $('#usuario').val();
		
		
		var existe_direccion=$('#existe_direccion').val();
		var id_cat_estado = $('#id_cat_estado').val();		
		var mpio = $('#mpio').val();		
		var colonia = $('#colonia').val();		
		var calle = $('#calle').val();		
		var cp = $('#cp').val();		
		var num = $('#num').val();		
		var telefono = $('#telefono').val();	
				
		var formData = new FormData();

		formData.append("id_cat_usuario", id_cat_usuario);

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
		formData.append("file", file);

		formData.append("existe_direccion", existe_direccion);		        
		formData.append("id_cat_estado", id_cat_estado);		        
		formData.append("mpio", mpio);		        
		formData.append("colonia", colonia);		        
		formData.append("calle", calle);		        
		formData.append("cp", cp);		        
		formData.append("num", num);		        
		formData.append("telefono", telefono);		        
			        
		let method_data_save = 'CPerfilCliente/update';
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
					title: 'El registro ha sido actualizado!',                        
				}).then((result) => {
									
					var id_cat_usuario=$('#id_cat_usuario').val()
					let method_usuario = 'CPerfilCliente/Usuario';
					var post_url = baseUrl+method_usuario;
						
					$.ajax({
					url: post_url,
					type: 'GET',
					dataType: 'json',
					data : {"id_cat_usuario":id_cat_usuario}, 			
					success: function(response)
					{	
						$("#imagen_perfil").attr('src',baseUrl+"assets/images/users/"+response['usuario'][0].imagen);						
					}
					});

				})


			}
		});
	
	
		 return false;
		
	 });	


});


// Detect pagination click
$('#pagination').on('click','a',function(e){
	e.preventDefault(); 
	var pageno = $(this).attr('data-ci-pagination-page');	
	loadPagination(pageno);			
	loadPagination_contenido_interes(pageno);	
	loadPagination_preguntas(pageno);	

  });


function loadPagination(pagno)
{	
	var id_cat_usuario=$('#id_cat_usuario').val()
	let method_pagination = 'CPerfilCliente/loadRecord';
	var post_url = baseUrl+method_pagination;
		
	$.ajax({
	  url: post_url,
	  type: 'POST',
	  dataType: 'json',
	  data : {"pagno":pagno,"id_cat_usuario":id_cat_usuario}, 			
	  success: function(response)
	  {
		 $('#pagination').html(response.links);
		 createTable(response.profesionistas,response.row);		 		
	  }
	});
}  

function loadPagination_contenido_interes(pagno)
{	
	var id_cat_usuario=$('#id_cat_usuario').val()
	let method_pagination = 'CPerfilCliente/loadRecord_contenido_interes';
	var post_url = baseUrl+method_pagination;
    
	$.ajax({
	url: post_url,
	type: 'POST',
	dataType: 'json',
	data : {"pagno":pagno,"id_cat_usuario":id_cat_usuario}, 			
	success: function(response)
	{  
		 $('#pagination').html(response.links);
		 createTable_contenido_interes(response.publicaciones,response.row);		 			
	}
	});
} 

function loadPagination_preguntas(pagno)
{	
	var id_cat_usuario=$('#id_cat_usuario').val()
	let method_pagination = 'CPerfilCliente/loadRecord_preguntas';
	var post_url = baseUrl+method_pagination;
    
	$.ajax({
	url: post_url,
	type: 'POST',
	dataType: 'json',
	data : {"pagno":pagno,"id_cat_usuario":id_cat_usuario}, 			
	success: function(response)
	{  
		 $('#pagination').html(response.links);
		 createTable_preguntas(response.preguntas,response.row);		 			
	}
	});
} 

function createTable(result,sno)
{
	cat_profesion('');

	sno = Number(sno);
	$('#tbody_profesionistas_favoritos').empty();
	html="";
	cerro="";	
	for(index in result)
	{   cerro="no";	
		if(index % 3 == 0) html+="<div class='row  d-flex justify-content-center'>";          	 
	 		
	
		html+= 	"<div class='col-lg-4'>"+
					"<div class='image-flip' ontouchstart='this.classList.toggle('hover')+'>"+
						"<div class='mainflip'>"+
				
							"<div class='frontside'>"+
								"<div class='card'>"+
									"<div class='card-body text-center'>";
									if (result[index].imagen == null)
										html+=  "<p><img class=' img-fluid' src='"+baseUrl+"assets/images/profesionales/usuario"+ Math.floor((Math.random() * 3) + 1) +".png' alt='card image'></p>";
									else
										html+=  "<p><img class=' img-fluid' src='"+baseUrl+"assets/images/profesionales/"+result[index].imagen+"' alt='card image'></p>";
								
									html+=  "<h4 class='card-title'>"+result[index].profesionista+"</h4>"+
										"<p class='card-text'>"+
											"<strong> "+result[index].profesion+"</strong><br>"+
											"<small> Especialidad  - "+result[index].especialidad+"</small><br>"+
											"<small> Cedula Profesional  - 123123123123</small>"+
										"</p>"+
										//"<p class='card-text' style='color: #007b5e+'> <small> ☆☆☆☆☆ 4/5 / 250 valoraciones </small></p>"+									

										//"<div class='card-footer'>"+							
										"<div style='background-color: #eeeeee;'>"+	
											"<div class='pull-left pr-2'>"+
												"<span class='fa fa-star checked'></span>"+
												"<span class='fa fa-star checked'></span>"+
												"<span class='fa fa-star checked'></span>"+
												"<span class='fa fa-star'></span>"+
												"<span class='fa fa-star'></span>"+
											"</div>"+    
											"<p class='card-text' style='color: green;'>250 valoraciones</p>"+    
										"</div>"+


									"</div>"+
								"</div>"+
							"</div>"+

							"<div class='backside'>"+
								"<div class='card'>"+

									"<div class='card-body text-center mt-4'>"+
										"<h4 class='card-title'>"+
											"<a class='dropdown-item text-primary' href='"+baseUrl+"CProfesional/index/"+result[index].id_cat_profesional+"'>"+result[index].profesionista+"</a>"+
										"</h4>"+
										"<p class='card-text'>"+
											"<strong> "+result[index].profesion+"</strong><br>"+
											""+result[index].descripcion+".<br>"+   
										"</p>"+                                    
										"<hr>"+

										"<div class='container-fluid'>"+
											"<div class='row'>"+
												"<div class='col-4'>"+
													"<small>Telefono:</small>"+
												"</div>"+
												"<div class='col'>"+
													"<small> "+result[index].tel+" </small>"+
												"</div>"+
											"</div>"+

											"<div class='row'>"+
												"<div class='col-4'>"+
													"<small>Dirección:</small>"+
												"</div>"+
												"<div class='col'>"+
													"<small> "+result[index].direccion+"</small>"+
												"</div>"+
											"</div>"+

										"</div>"+
							
									"</div>"+

								"</div>"+

							"</div>"+

						"</div>"+
					"</div>"+
				"</div>";	      		

				/**************************************************************************************************************************************/
			if((index+1) % 3 == 0) 
			  { 
				html+="</div>";          		
				$('#tbody_profesionistas_favoritos').append(html);   				
				html="";
				cerro="si";
			  }


		/**************************************************************************************************************************************/
	} 
	if(cerro=="no")
	  {
		  html+="</div>";          		
	   	  $('#tbody_profesionistas_favoritos').append(html);   				
	  }		 


}

function createTable_contenido_interes(result,sno)
{     
	sno = Number(sno);
	$('#tbody_publicaciones').empty();
	html="";
	for(index in result)
	{  	
		html+="<div class='row'>"+
				"<div class='col-md-12'>"+
					"<div class='row' >"+

						
							"<div class='col-md-5' style='text-align: left;'>"+
							"<a href='#' onclick='consultarPublicacion("+result[index].id_cat_publicacion+"); return false;'  style='color: #2e9ff4;'>"+ 
							"<h5 class='tituloV'>"+"<strong>Area Interes:</strong></h5>"						
								+result[index].area_interes+
							"</a>"+	
							"</div>"+
							
							"<div class='col-md-7' style='text-align: left;'>"+
							"<a href='#' onclick='consultarPublicacion("+result[index].id_cat_publicacion+"); return false;'  style='color: #2e9ff4;'>"+ 
							"<h5 class='tituloV'><strong>Título:</strong></h5>"								
								+result[index].titulo+								
							"</a>"+		
							"</div>"+
						
					

					"</div>"+
					"<a href='#' onclick='consultarPublicacion("+result[index].id_cat_publicacion+"); return false;'  style='color: #2e9ff4;'>"+ 
					"<div class='row'>"+
						"<div class='col-md-12' style='text-align: justify;'>"+
						"<h5 class='tituloV'>"+"<strong>Resumen de la Publicacion:</strong></h5>"
						+"<textarea readonly rows='4' style='min-width: 100%; border:none; color: #2e9ff4; font-weight: lighter;'>"+result[index].resumen+"</textarea>"+
						"<br>"+
						"</div>"+                             
						"<br>"+
					"</div>"+
					"</a>"+	
				"</div>"+						
			"</div>"+
			"<hr>";	      			
	} 
	$('#tbody_publicaciones').append(html);   				
}	

function createTable_preguntas(result,sno)
{     
	sno = Number(sno);
	$('#tbody_preguntas').empty();
	html="";
	id_cat_pregunta_temp=0;
	for(index in result)
	{ 
		if(id_cat_pregunta_temp!=result[index].id_cat_pregunta)
		{
			id_cat_pregunta_temp=result[index].id_cat_pregunta;
			html+=" <!--  Preguntas Collapse -->"+  
					"<div class='row' style='text-align: left;'>"+
						"<div class='col-md-8' style='border-radius: 25px; border-color: black; background-color: #f1efef;'>"+
						"<br>"+
						"<a data-toggle='collapse' href='#collapsePregunta"+result[index].id_cat_pregunta+"' role='button' aria-expanded='false' aria-controls='collapsePregunta"+result[index].id_cat_pregunta+"'>"
							+result[index].pregunta+
							"<br>"+
							"<br>"+
						"</a>"+
						"</div>"+
						"<div class='col-md-4'></div>"+
					"</div>"+

					"<div class='collapse' id='collapsePregunta"+result[index].id_cat_pregunta+"'>";
		}
		if (result[index].id_cat_respuesta!=null) 
		{ 
		html+=	

						"<br>"+
						"<!-- Respuestas  -->"+
						"<div class='row'>"+                    
							"<div class='col-md-4'>"+
								"<a href='profesional.php=id=1111' target='_self'>"+        
									"<img src='"+baseUrl+"assets/images/profesionales/"+result[index].imagen+"' style='max-height: 40px; max-height: 40px; position: absolute; bottom: 5px; right: 5px; border-radius: 40%;' data-toggle='tooltip' data-placement='top' title='"+result[index].carrera+" "+result[index].profesional+"'>"+
								"</a>"+                        
							"</div>"+
							"<div class='col-md-8' style='border-radius: 25px; background: #dddddd;'>"+	
								"<br>"
								+result[index].respuesta+
								"<br>"+
								"<br>"+
							"</div>"+
						"</div>";
		}				
		
		
		if ( (typeof(result[parseInt(index)+1]) != 'undefined' ) && id_cat_pregunta_temp!=result[parseInt(index)+1].id_cat_pregunta)
		{
			html+=	"</div>"+
			     	"<br> ";
		}		
	} 
	$('#tbody_preguntas').append(html);   				
}	

function consultarPublicacion(id_cat_publicacion)
{	
	let method_get_publicacion = 'CPerfilCliente/get_publicacion';
	var post_url = baseUrl+method_get_publicacion

	var id_cat_usuario=$( "#id_cat_usuario" ).val();		

	$.ajax({
		type: "POST",   
		dataType:'json',       
		data : {"id_cat_usuario":id_cat_usuario,"id_cat_publicacion":id_cat_publicacion}, 			  
		url: post_url,                          
		success: function(data){                                										
			$('#id_cat_publicacion').val(id_cat_publicacion);
			$("#titulo").val(data['publicacion'][0].titulo);			 								
			$("#resumen").val(data['publicacion'][0].resumen);			 								
			$("#publicacion").val(data['publicacion'][0].publicacion);		
			$("#btn_save_edit_publicacion").html("editar");
			

			$('#Modal_Add').modal('show');
		}
	});

	
}


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

function savePregunta()
	{
		$("#btn_save_edit_pregunta").html("Guardar");
		//$('#id_cat_profesion').val("-1");		
		$('#id_cat_pregunta').val("-1");
		$('#pregunta').val("");		

		
		$('#Modal_Add_Pregunta').modal('show');
	}

	function editarPublicacion(id_cat_pregunta)
	{	
		let method_get_pregunta = 'CPerfilCliente/get_pregunta';
		var post_url = baseUrl+method_get_pregunta
	
		var id_cat_usuario=$( "#id_cat_usuario" ).val();		
		var id_cat_pregunta=$( "#id_cat_pregunta" ).val();		
	
		$.ajax({
			type: "POST",   
			dataType:'json',       
			data : {"id_cat_usuario":id_cat_usuario,"id_cat_pregunta":id_cat_pregunta}, 			  
			url: post_url,                          
			success: function(data){                                										
				$('#id_cat_pregunta').val(id_cat_pregunta);				
				$("#pregunta").val(data['preguntas'][0].pregunta);		
				$("#btn_save_edit_pregunta").html("Editar");
				$('#Modal_Add_Pregunta').modal('show');
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
				$('#Modal_Add_Pregunta').modal('hide');

				Swal.fire({
					title: 'Actualización realizada con exitó!',                        
				}).then((result) => {
					loadPagination_preguntas(0);					
				})	
			}
		});
		

		 return false;
		
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
			$('#id_cat_profesion').select2({
				 dropdownParent: $('#Modal_Add_Pregunta'),
				
			});
			// $('#id_cat_profesion').change();  				

			
		}
	});

}
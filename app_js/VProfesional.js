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
	
	let method = 'CProfesional/Profesional?';
	let criterios = {id_cat_profesional:$('#id_cat_profesional').val()};
  	
  	asyncGetReq(criterios, baseUrl + method).then(data => { //Funcion callback``
    
	if (data['profesional']) 
		{   
			            			
			$('#imagen').attr("src",baseUrl+"assets/images/profesionales/"+data['profesional'][0].imagen);			
			$('#profesionista').html(data['profesional'][0].profesionista);
			$('#especialidad').html("Especialidad  - "+data['profesional'][0].especialidad);
			$('#especialidad2').html("Especialidad en "+data['profesional'][0].especialidad);
			$('#descripcion').html(data['profesional'][0].descripcion);
			$('#profesion').html(data['profesional'][0].profesion);
			$('#profesion2').html(data['profesional'][0].profesion);
			$('#tel').html(data['profesional'][0].tel);
			$('#direccion').html(data['profesional'][0].direccion);
			$('#informacion_completa').html(data['profesional'][0].informacion_completa);
			
			$('#cedula_profesional').html(data['profesional'][0].cedula_profesional);
			$('#cedula_profesional_postgrado').html(data['profesional'][0].cedula_profesional_postgrado);
			
			$('#experiencia_servicios_ofrecidos').html(data['profesional'][0].experiencia_servicios_ofrecidos);
			$('#preguntas_frecuentes').html(data['profesional'][0].preguntas_frecuentes);

			$('#metodos_pago').html("<br>"+data['profesional'][0].metodos_pago+"<br>");
			
			$('#email_contacto').html("(Datos de pagina alta Usuario) "+data['profesional'][0].email);

			if($('#id_cat_rol').val()=="3")	 checar_favorito();	
			
		}			
		get_redes_sociales();
		get_reconocimientos();
		get_publicaciones();
		get_precios();
		get_direccion_tel();
		get_horario_atencion();		
		get_promocion();
  
  		desbloqueaPantalla();
  }).catch(e => { console.error(e); desbloqueaPantalla();});
  
   desbloqueaPantalla(); 

});

function checar_favorito()
{	
	let method_checar_favorito = 'CProfesional/checar_favorito';
	var post_url = baseUrl+method_checar_favorito

	var id_cat_usuario=$( "#id_cat_usuario" ).val();
	var id_cat_profesional=$( "#id_cat_profesional" ).val();
	
	$.ajax({
		type: "POST",   
		dataType:'json',       
		data : {"id_cat_usuario":id_cat_usuario,"id_cat_profesional":id_cat_profesional}, 			  
		url: post_url,                          
		success: function(data){ 			
			if(typeof(data['favorito'][0]) != 'undefined' )      $('#imagen_favorito').attr("src",baseUrl+"imagenes/favorito.png");						  
			else   												 $('#imagen_favorito').attr("src",baseUrl+"imagenes/favorito_no.png");						  						
		}
	});
}



function get_reconocimientos()
{
	let method_profesion = 'CAltaProfesional/reconocimiento';
	var post_url = baseUrl+method_profesion

	var id_cat_profesional=$( "#id_cat_profesional" ).val();
	
	$.ajax({
		type: "POST",   
		dataType:'json',       
		data : {"id_cat_profesional":id_cat_profesional}, 			  
		url: post_url,                          
		success: function(data){                                
			html="";		
			for (let i in data['reconocimiento']) 				
			{  			    
				html+= 	"<div class='card-body'>"+
							"<a href='#' data-toggle='modal' data-target='#rec_"+data['reconocimiento'][i].id_cat_reconocimiento+"'  style='color: #2e9ff4;'>"+
								"» "+data['reconocimiento'][i].nombre+"   <br>"+
								"<!-- Modal -->"+
								"<div class='modal fade' id='rec_"+data['reconocimiento'][i].id_cat_reconocimiento+"' tabindex='-1' role='dialog' aria-labelledby='EspecialidadLabel' aria-hidden='true'>"+
									"<div class='modal-dialog' role='document'>"+
									"<div class='modal-content'>"+
										"<div class='modal-header'>"+
										"<h5 class='modal-title' id='BcardLabel'>"+data['reconocimiento'][i].nombre+"</h5>"+
										"<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"+
											"<span aria-hidden='true'>&times;</span>"+
										"</button>"+
										"</div>"+
										"<div class='modal-body' style='text-align: center;'>"+
										"<img src='"+baseUrl+"assets/images/profesionales/"+data['reconocimiento'][i].id_cat_profesional+"/rec/"+data['reconocimiento'][i].archivo+"' style='max-width: 100%; max-height: 100;' alt='Especialidad'>"+
										"</div>"+
										"<div class='modal-footer'>"+
										"<button type='button' class='btn my-0 border border-white' style='background: #0856c7;' >Cerrar</button>"+
										"</div>"+
									"</div>"+
									"</div>"+
								"</div>"+
							"</a>"+
						"</div>";				

			}  
			$('#collapseTwo').html(html);  
			
		}
	});
}

function get_publicaciones()
{	
	let method_profesion = 'CProfesional/publicaciones';
	var post_url = baseUrl+method_profesion

	var id_cat_profesional=$( "#id_cat_profesional" ).val();
	
	$.ajax({
		type: "POST",   
		dataType:'json',       
		data : {"id_cat_profesional":id_cat_profesional}, 			  
		url: post_url,                          
		success: function(data){                                
			console.log(data);
			html="";		
			for (let i in data['publicaciones']) 				
			{  			    
				html+="<div class='card-body'>"+
						"<div class='row'>"+
							"<div class='col-md-12'>"+
								"<div class='row' >"+

									
										"<div class='col-md-2' style='text-align: left;'>"+							
										"<h5 class='tituloV'>"+"<strong>ID:</strong></h5>"+
											+data['publicaciones'][i].id_cat_publicacion+							
										"</div>"+
										
										"<div class='col-md-5' style='text-align: left;'>"+
										
										"<h5 class='tituloV'><strong>Título:</strong></h5>"								
											+data['publicaciones'][i].titulo+															
										"</div>"+
									

									

								"</div>"+
								
								"<div class='row'>"+
									"<div class='col-md-12' style='text-align: justify;'>"+
									"<h5 class='tituloV'>"+"<strong>Resumen de la Publicacion:</strong></h5>"
									+data['publicaciones'][i].resumen+
									"<br>"+
									"</div>"+                             
									"<br>"+
								"</div>"+
								
							"</div>"+						
						"</div>"+
						"</div>"+
						"<hr>";	      							

			}  
			$('#collapseFour').html(html);  
			
		}
	});
}

function get_precios()
{
	let method_profesion = 'CProfesional/precios_vigentes';
	var post_url = baseUrl+method_profesion

	var id_cat_profesional=$( "#id_cat_profesional" ).val();
	
	$.ajax({
		type: "POST",   
		dataType:'json',       
		data : {"id_cat_profesional":id_cat_profesional}, 			  
		url: post_url,                          
		success: function(data){                                
			html="";		
			for (let i in data['precio']) 				
			{  			    
				html+= 	"<div class='row'>"+
							"<div class='col' style='text-align: right;'>"+
								"<strong>"+data['precio'][i].servicio+"</strong>"+
							"</div>"+
							"<div class='col' style='text-align: left;'>"+
								"$"+data['precio'][i].precio+
							"</div>"+
						"</div>";				

			}  
			$('#precios').html(html);  
			
		}
	});
}

function get_direccion_tel()
{
	let method_profesion = 'CProfesional/direccion_tel';
	var post_url = baseUrl+method_profesion

	var id_cat_profesional=$( "#id_cat_profesional" ).val();
	
	$.ajax({
		type: "POST",   
		dataType:'json',       
		data : {"id_cat_profesional":id_cat_profesional}, 			  
		url: post_url,                          
		success: function(data){                                			
			html="";							  			    
			html+= 	"<div class='row'>"+
						"<div class='col' style='text-align: left;'>"+
							"<strong>(Datos de pagina alta Usuario) "+data['direccion_tel'][0].direccion+"</strong>"+								
						"</div>"+														
					"</div>";							
			$('#direccion_contacto').html(html);  

			html_tel="";							  			    
			html_tel+= 	"<div class='row'>"+
						"<div class='col' style='text-align: left;'>"+
							"<strong>(Datos de pagina alta Usuario) "+data['direccion_tel'][0].tel+"</strong>"+								
						"</div>"+														
					"</div>";					
			$('#tel_contacto').html(html_tel);  
			
			
		}
	});
}


function get_horario_atencion()
{
	let method_profesion = 'CProfesional/horario_atencion';
	var post_url = baseUrl+method_profesion

	var id_cat_profesional=$( "#id_cat_profesional" ).val();
	
	$.ajax({
		type: "POST",   
		dataType:'json',       
		data : {"id_cat_profesional":id_cat_profesional}, 			  
		url: post_url,                          
		success: function(data){                                
			html="";		
			for (let i in data['horario_atencion']) 				
			{  			    
				html+= 	"<div class='row'>"+
							"<div class='col' style='text-align: left;'>"+
								"<strong>"+data['horario_atencion'][i].dia+"</strong>"+								
							"</div>"+							
							"<div class='col' style='text-align: left;'>"+
								data['horario_atencion'][i].horario_apertura+" a "+ data['horario_atencion'][i].horario_termino+
							"</div>"+							
						"</div>";				

			}  
			$('#horario_atencion').html(html);  
			
		}
	});
}



function get_promocion()
{
	let method_profesion = 'CAltaProfesional/promocion';
	var post_url = baseUrl+method_profesion

	var id_cat_profesional=$( "#id_cat_profesional" ).val();

	$.ajax({
		type: "POST",   
		dataType:'json',       
		data : {"id_cat_profesional":id_cat_profesional}, 			  
		url: post_url,                          
		success: function(data){                                			
			
			for (let i in data['promocion']) 				
			{  			    
					 
				$("#promocion").attr('src',baseUrl+"assets/images/profesionales/"+id_cat_profesional+"/promo/"+data['promocion'][i].archivo);

					 

			} 
			
		}
	});
}


function get_redes_sociales()
{
	let method_profesion = 'CProfesional/redes_sociales';
	var post_url = baseUrl+method_profesion

	var id_cat_profesional=$( "#id_cat_profesional" ).val();
	
	$.ajax({
		type: "POST",   
		dataType:'json',       
		data : {"id_cat_profesional":id_cat_profesional}, 			  
		url: post_url,                          
		success: function(data){   	
			html="";				
			
			if (typeof(data['redes_sociales'][0])!='undefined') 
				{	
					if(data['redes_sociales'][0].business_card!="")						  			    
						html+= 	"<li class='list-inline-item'>"+
									"<a href='#' data-toggle='modal' data-target='#Bcard'>"+
									"<img src='"+baseUrl+"imagenes/QR_profesiolandia.png' style='height: 50px; width: 50px;' title='Ver la VCard del Profesional' alt='Business Card'>"+
									"<!-- Modal -->"+
									"<div class='modal fade' id='Bcard' tabindex='-1' role='dialog' aria-labelledby='BcardLabel' aria-hidden='true'>"+
										"<div class='modal-dialog' role='document'>"+
										"<div class='modal-content'>"+
											"<div class='modal-header'>"+
											"<h5 class='modal-title' id='BcardLabel'>VCard</h5>"+
											"<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"+
												"<span aria-hidden='true'>&times;</span>"+
											"</button>"+
											"</div>"+
											"<div class='modal-body'>"+
											"Escanea el codigo QR con tu telefono"+
											"<img src='"+baseUrl+"assets/images/profesionales/"+data['redes_sociales'][0].id_cat_profesional+"/card/"+data['redes_sociales'][0].business_card+"' style='height: 300px; width: 300px;' alt='Business Card'>"+
											"</div>"+
											"<div class='modal-footer'>"+
											"<button type='button' class='btn my-0 border border-white' style='background: #0856c7;' >Cerrar</button>"+
											"</div>"+
										"</div>"+
										"</div>"+
									"</div>"+
									"</a>"+
								"</li>";

					if(data['redes_sociales'][0].google_maps!="")
						html+= "<li class='list-inline-item'>"+
									"<a  href='"+data['redes_sociales'][0].google_maps+"' target='_blank'>"+
									"<img src='"+baseUrl+"imagenes/maps_mini.png' style='height: 50px; width: 50px;' title='Ir a la direccion de Google Maps del Profesional'  alt='Google Maps Link'>"+
									"</a>"+
								"</li>";

					if(data['redes_sociales'][0].whatsapp!="")			
						html+= "<li class='list-inline-item'>"+
									"<a  href='https://web.whatsapp.com/send?phone="+data['redes_sociales'][0].whatsapp+"' target='_blank'>"+
									"<img src='"+baseUrl+"imagenes/whatsapp_mini.png' style='height: 50px; width: 50px;' title='Enviar mensaje de Whatsap al Profesional'  alt='Enviar whatsapp'>"+
									"</a>"+
								"</li>";

					if(data['redes_sociales'][0].facebook!="")
						html+= "<li class='list-inline-item'>"+
									"<a  href='"+data['redes_sociales'][0].facebook+"' target='_blank'>"+
									"<img src='"+baseUrl+"imagenes/facebook_mini.png' style='height: 50px; width: 50px;' title='Ir a pagina de Facebook del Profesional' alt='...'>"+
									"</a>"+
								"</li>";

					if(data['redes_sociales'][0].instagram!="")		
						html+= "<li class='list-inline-item'>"+
									"<a  href='"+data['redes_sociales'][0].instagram+"' target='_blank'>"+
									"<img src='"+baseUrl+"imagenes/Instagram_mini.png' style='height: 50px; width: 50px;' title='Ir a pagina de Instagram del Profesional' alt='...'>"+
									"</a>"+
								"</li>";

					if(data['redes_sociales'][0].twitter!="")
						html+= "<li class='list-inline-item'>"+
									"<a  href='"+data['redes_sociales'][0].twitter+"' target='_blank'>"+
									"<img src='"+baseUrl+"imagenes/twitter_mini.png' style='height: 50px; width: 50px;' title='Ir a la direccion de Twitter del Profesional'  alt='...'>"+
									"</a>"+
								"</li>";

					if(data['redes_sociales'][0].pagina_web!="")
						html+= "<li class='list-inline-item'>"+
									"<a  href='"+data['redes_sociales'][0].pagina_web+"' target='_blank'>"+
									"<img src='"+baseUrl+"imagenes/web_mini.png' style='height: 50px; width: 50px;' title='Ir a la Pagina Web del Profesional'  alt='...'>"+
									"</a>"+
								"</li>";					

								
					
				}

			if($('#id_cat_rol').val()=="1")		
					html+= "<li class='list-inline-item'>"+
								"<a  href='"+baseUrl+"CAltaProfesional' target='_self'>"+
									"<img src='"+baseUrl+"imagenes/editar.png' style='height: 50px; width: 50px;' title='Ir al Perfil del Profesional para edicción'  alt='...'>"+                        
								"</a>"+						
							"</li>";							
				$('#ul_redes_sociales').html(html);  

			
			
			
		}
	});
}

$('#ancla_favorito').click(function(){	

	var imagen_favorito=$('#imagen_favorito').attr('src');
	var existe="";
	
	if(imagen_favorito.indexOf("favorito_no") != -1) existe="no";		
	else 											 existe="si";

	
	let method_update_favorito = 'CProfesional/UpdateFavorito';
	var post_url = baseUrl+method_update_favorito

	var id_cat_usuario=$( "#id_cat_usuario" ).val();
	var id_cat_profesional=$( "#id_cat_profesional" ).val();	

	$.ajax({
		type: "POST",   
		dataType:'json',       
		data : {"id_cat_usuario":id_cat_usuario,"id_cat_profesional":id_cat_profesional,"existe":existe}, 			  
		url: post_url,                          
		success: function(data){            
			if (existe=="si")	$('#imagen_favorito').attr("src",baseUrl+"imagenes/favorito_no.png");						  
			else   			    $('#imagen_favorito').attr("src",baseUrl+"imagenes/favorito.png");						  						
		}
	});
	return false;	
});



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
			$('#txta_descripcion').html(data['profesional'][0].descripcion);
			$('#descripcion1').html(data['profesional'][0].descripcion);			
			$('#profesion').html(data['profesional'][0].profesion);
			$('#profesion2').html(data['profesional'][0].profesion);
			$('#tel').html(data['profesional'][0].tel);
			$('#direccion').html(data['profesional'][0].direccion);
			$('#txta_informacion_completa').html(data['profesional'][0].informacion_completa);
			
			$('#cedula_profesional').html(data['profesional'][0].cedula_profesional);
			$('#cedula_profesional_postgrado').html(data['profesional'][0].cedula_profesional_postgrado);
			
			$('#txta_experiencia_servicios_ofrecidos').html(data['profesional'][0].experiencia_servicios_ofrecidos);
			$('#txta_preguntas_frecuentes').html(data['profesional'][0].preguntas_frecuentes);

			$('#metodos_pago').html("<br>"+data['profesional'][0].metodos_pago+"<br>");
			
			$('#email_contacto').html("(Datos de pagina alta Usuario) "+data['profesional'][0].email);

			$('#google_maps').val(data['profesional'][0].google_maps);
			$('#whatsapp').val(data['profesional'][0].whatsapp);
			$('#facebook').val(data['profesional'][0].facebook);
			$('#instagram').val(data['profesional'][0].instagram);
			$('#twitter').val(data['profesional'][0].twitter);
			$('#pagina_web').val(data['profesional'][0].pagina_web);

			
			if($('#id_cat_rol').val()=="3")	 checar_favorito();	
			
		}			
		get_redes_sociales();
		get_reconocimientos(); 
		get_publicaciones();
		get_precios();
		get_direccion_tel();
		get_horario_atencion();		
		get_promocion();
		get_valoracion_gral();
		get_opiniones_positivas();
		get_opiniones_negativas();
		get_opiniones_neutras();
		get_opiniones_todas();
		
  
  		desbloqueaPantalla();
  }).catch(e => { console.error(e); desbloqueaPantalla();});
  

/***********************************************************************************************************************/
		/**************************************CALENDARIO***********************************************************************/
		$('#starttime').timepicker({ 
			'disableTimeRanges':[], 
			
			  'minTime': '8:00am',
			  'maxTime': '20:00pm',                    
			  'timeFormat': 'H:i'  
		  });                  
	
		$('#endtime').timepicker({ 
			'disableTimeRanges':[], 
			
			'minTime': '8:00am',
			'maxTime': '20:00pm',                    
			'timeFormat': 'H:i'  
		}); 
	
		var CalendarApp = function() {
			this.$body = $("body")
			this.$calendar = $('#calendar_profesional'),
				this.$event = ('#calendar-events div.calendar-events'),
				this.$categoryForm = $('#add-new-event form'),
				this.$extEvents = $('#calendar-events'),
				this.$modal = $('#Modal_Reservacion'),
				this.$saveCategoryBtn = $('.save-category'),
				this.$calendarObj = null
			};
		
			/* on drop */
			CalendarApp.prototype.onDrop = function(eventObj, date) 
			{
					var $this = this;
					// retrieve the dropped element's stored Event Object
					var originalEventObject = eventObj.data('eventObject');
					var $categoryClass = eventObj.attr('data-class');
					// we need to copy it, so that multiple events don't have a reference to the same object
					var copiedEventObject = $.extend({}, originalEventObject);
					// assign it the date that was reported
					copiedEventObject.start = date;
					if ($categoryClass)
						copiedEventObject['className'] = [$categoryClass];
					// render the event on the calendar
					$this.$calendar.fullCalendar('renderEvent', copiedEventObject, true);
					// is the "remove after drop" checkbox checked?
					if ($('#drop-remove').is(':checked')) {
						// if so, remove the element from the "Draggable Events" list
						eventObj.remove();
					}
			},
		
			/* on click on event */
			CalendarApp.prototype.onEventClick = function(calEvent, jsEvent, view) 
			{
			   
				var $this = this;
				/*var form = $("<form></form>");
				form.append("<label>Change event name</label>");
				form.append("<div class='input-group'><input class='form-control' type=text value='" + calEvent.title + "' /><span class='input-group-btn'><button type='submit' class='btn btn-success waves-effect waves-light'><i class='fa fa-check'></i> Save</button></span></div>");
				
				$this.$modal.modal({
					backdrop: 'static'
				});
				
				
				$this.$modal.find('.delete-event').show().end().find('.save-event').hide().end().find('.modal-body').empty().prepend(form).end().find('.delete-event').unbind('click').click(function() {
					$this.$calendarObj.fullCalendar('removeEvents', function(ev) {
						return (ev._id == calEvent._id);
					});
					$this.$modal.modal('hide');
				});
				$this.$modal.find('form').on('submit', function() {
					calEvent.title = form.find("input[type=text]").val();
					$this.$calendarObj.fullCalendar('updateEvent', calEvent);
					$this.$modal.modal('hide');
					return false;
				});
		
				*/        
				mostrar_detalle_cita(calEvent.id);        
			},
		
			/* on select */
			CalendarApp.prototype.onSelect = function(start, end, allDay) 
			{         
				var $this = this;        
				/*$this.$modal.modal({
					backdrop: 'static'
				});*/
				clean_inputs();
		
				$("#id_cat_dia").val(start.day());
				$("#id_cat_cita").val("-1");
		
				get_horario_atencion();        
		
				$('#label_action').html("Reservar Cita");        
				$("#FecInicio").val(moment(start).format('YYYY-MM-DD'));                                                 
				$("#FecTermino").val(moment(start).format('YYYY-MM-DD'));                                                 
		
				$("#starttime").val(moment(start).format('HH:mm:ss'));                                                 
				//$("#endtime").val(moment(start).format('HH:mm:ss'));                                                 
				$('#btn_delete').hide();				
				$('#btn_save').html("Guardar");            
				$('#Modal_Reservacion').modal('show');		
				$this.$calendarObj.fullCalendar('unselect');
			},
			CalendarApp.prototype.enableDrag = function() 
			{
				//init events
				$(this.$event).each(function() {
					// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
					// it doesn't need to have a start or end
					var eventObject = {
						title: $.trim($(this).text()) // use the element's text as the event title
					};
					// store the Event Object in the DOM element so we can get to it later
					$(this).data('eventObject', eventObject);
					// make the event draggable using jQuery UI
					$(this).draggable({
						zIndex: 999,
						revert: true, // will cause the event to go back to its
						revertDuration: 0 //  original position after the drag
					});
				});
			}
			/* Initializing */
			CalendarApp.prototype.init = function() 
			{   
				this.enableDrag();
				/*  Initialize the calendar  */
				var date = new Date();
				var d = date.getDate();
				var m = date.getMonth();
				var y = date.getFullYear();
				var form = '';
				var today = new Date($.now());
		
			 
				var $this = this;
				$this.$calendarObj = $this.$calendar.fullCalendar({
					slotDuration: '00:30:00',
					/* If we want to split day time each 15minutes */
					minTime: '08:00:00',
					maxTime: '20:00:00',
					defaultView: 'month',
					handleWindowResize: true,
		
					// hiddenDays: [ 2, 4 ],           
		
					validRange: function(nowDate) {
						return {
						  start: new Date(y, m, d+1)                  
						};
					  },
		
					//   businessHours: {
					//     // days of week. an array of zero-based day of week integers (0=Sunday)
					//     dow: [ 1, 2, 3, 4, 5], // Monday - Thursday              
					//     startTime: '08:00', // a start time (10am in this example)
					//     endTime: '20:00', // an end time (6pm in this example)
					//   },
					  selectConstraint: "businessHours",
		
		
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
					},
					events: [],				  
					editable: false,            
					droppable: false, // this allows things to be dropped onto the calendar !!!
					eventLimit: true, // allow "more" link when too many events
					selectable: true,
					drop: function(date) { $this.onDrop($(this), date); },
					select: function(start, end, allDay) { $this.onSelect(start, end, allDay); },
					eventClick: function(calEvent, jsEvent, view) { $this.onEventClick(calEvent, jsEvent, view); }
		
				});
		
				//***********************************************************************************************
				set_businessHours();
				render_events(); 
		
				
				//***********************************************************************************************        
		
		
				//on new event
				this.$saveCategoryBtn.on('click', function() 
				{
					var categoryName = $this.$categoryForm.find("input[name='category-name']").val();
					var categoryColor = $this.$categoryForm.find("select[name='category-color']").val();
					if (categoryName !== null && categoryName.length != 0) {
						$this.$extEvents.append('<div class="calendar-events m-b-20" data-class="bg-' + categoryColor + '" style="position: relative;"><i class="fa fa-circle text-' + categoryColor + ' m-r-10" ></i>' + categoryName + '</div>')
						$this.enableDrag();
					}
		
				});
			},
		
			//init CalendarApp
			$.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp  
		/******************************************FIN CALENDARIO***************************************************************/
		/***********************************************************************************************************************/


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
			html="";		
			for (let i in data['publicaciones']) 				
			{  			    
				html+="<div class='card-body'>"+
						"<div class='row'>"+
							"<div class='col-md-12'>"+
								"<div class='row' >"+

									
										"<div class='col-md-5' style='text-align: left;'>"+							
										"<a href='#' onclick='verPublicacion("+data['publicaciones'][i].id_cat_publicacion+"); return false;'  style='color: #2e9ff4;'>"+ 
										"<h5 class='tituloV'>"+"<strong>Area de Interes:</strong></h5>"
											+data['publicaciones'][i].area_interes+							
										"</div>"+
										"</a>"+	
										"<div class='col-md-7' style='text-align: left;'>"+
										"<a href='#' onclick='verPublicacion("+data['publicaciones'][i].id_cat_publicacion+"); return false;'  style='color: #2e9ff4;'>"+ 
										"<h5 class='tituloV'><strong>Título:</strong></h5>"								
											+data['publicaciones'][i].titulo+	
										"</a>"+																
										"</div>"+
									

									

								"</div>"+
								"<a href='#' onclick='verPublicacion("+data['publicaciones'][i].id_cat_publicacion+"); return false;'  style='color: #2e9ff4;'>"+ 
								"<div class='row'>"+
									"<div class='col-md-12' style='text-align: justify;'>"+
									"<h5 class='tituloV'>"+"<strong>Resumen de la Publicacion:</strong></h5>"
									+"<textarea readonly rows='4' style='min-width: 100%; border:none; color: #2e9ff4;'>"+data['publicaciones'][i].resumen+"</textarea>"+
									"<br>"+
									"</div>"+                             
									"<br>"+
								"</div>"+
								"</a>"+	
							"</div>"+						
						"</div>"+
						"</div>"+
						"<hr>";	      							

			}  
			$('#collapseThree').html(html);  
			
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

			if (typeof(data['direccion_tel'][0]) != 'undefined')
			{
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


function verPublicacion(id_cat_publicacion)
{	
	let method_get_publicacion = 'CAltaProfesional/get_publicacion';
	var post_url = baseUrl+method_get_publicacion

	var id_cat_profesional=$( "#id_cat_profesional" ).val();		

	$.ajax({
		type: "POST",   
		dataType:'json',       
		data : {"id_cat_profesional":id_cat_profesional,"id_cat_publicacion":id_cat_publicacion}, 			  
		url: post_url,                          
		success: function(data){                                										
			$('#id_cat_publicacion').val(id_cat_publicacion);
			$("#titulo").val(data['publicacion'][0].titulo);			 								
			$("#resumen").val(data['publicacion'][0].resumen);			 								
			$("#publicacion").val(data['publicacion'][0].publicacion);		
			$("#btn_save_edit_publicacion").hide();
			

			$('#Modal_Add').modal('show');
		}
	});

	
}

$('#ancla_valoracion').click(function(){	
	
	if($('#id_cat_rol').val()=="3")	 
	{   
		get_valoracion();
		$('#valoracion1').modal('show');
	}	
	else
	{
		/*Swal.fire({
			title: 'Para poder dejar una valoracion a los  profesionales es necesario que estes registrado como usuario',                        
		}).then((result) => {
			
		})	*/

		/*********/
		Swal.fire({
			title: "Para poder dejar una valoracion a los  profesionales es necesario que estes registrado como usuario",
			//text: "No se podra recuperar!",
			//type: "advertencia",
			showCancelButton: true,
			confirmButtonColor: '#DD6B55',
			confirmButtonText: 'Si, registrarme!',
			cancelButtonText: "No!"/*,
			closeOnConfirm: false,
			closeOnCancel: false*/
		}).then((result) => {
			
			if (result.value)
			{											
								
				location.href=baseUrl + "CRegistro/index/3";
			}
			
		})

	} 

	return false;	
});

$("#form_valoracion").on("submit", function(){ 

	
	var id_cat_valoracion=$( "#id_cat_valoracion" ).val();
	var id_cat_usuario=$( "#id_cat_usuario" ).val();
	var id_cat_profesional=$( "#id_cat_profesional" ).val();
	var id_cat_rol=$( "#id_cat_rol" ).val();
	var opinion=$( "#opinion" ).val();	

	var Arating= $('#Arating').raty('score');
	var Crating= $('#Crating').raty('score');
	var Prating= $('#Prating').raty('score');
	var Irating= $('#Irating').raty('score');
	var Rrating= $('#Rrating').raty('score');

	var formData = new FormData();

	formData.append("id_cat_valoracion", id_cat_valoracion);
	formData.append("id_cat_usuario", id_cat_usuario);
	formData.append("id_cat_profesional", id_cat_profesional);
	formData.append("id_cat_rol", id_cat_rol);
	formData.append("opinion", opinion);
	formData.append("Arating", Arating);
	formData.append("Crating", Crating);
	formData.append("Prating", Prating);
	formData.append("Irating", Irating);
	formData.append("Rrating", Rrating);

				   
	let method_data_save = 'CProfesional/save_update_valoracion';
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
			
			$('#valoracion1').modal('hide');

			Swal.fire({
				title: 'Actualización realizada con exitó!',                        
			}).then((result) => {
				get_valoracion_gral();
			})	
		}
	});
	
	 return false;
	
});		


function get_valoracion()
{
	let method_profesion = 'CProfesional/get_valoracion';
	var post_url = baseUrl+method_profesion

	var id_cat_usuario=$( "#id_cat_usuario" ).val();
	var id_cat_profesional=$( "#id_cat_profesional" ).val();
	var id_cat_rol=$( "#id_cat_rol" ).val();

	$.ajax({
		type: "POST",   
		dataType:'json',       
		data : {"id_cat_profesional":id_cat_profesional,"id_cat_usuario":id_cat_usuario,"id_cat_rol":id_cat_rol}, 			  
		url: post_url,                          
		success: function(data){                                			
			
			if(typeof(data['valoracion'][0]) != 'undefined' )
			{
				$( "#button_valoracion" ).html("Editar");

				$( "#id_cat_valoracion" ).val(data['valoracion'][0].id_cat_valoracion);
				$( "#opinion" ).val(data['valoracion'][0].opinion);

				$('#Arating').raty({ score: data['valoracion'][0].atencion });
				$('#Crating').raty({ score: data['valoracion'][0].calidad });
				$('#Prating').raty({ score: data['valoracion'][0].puntualidad });
				$('#Irating').raty({ score: data['valoracion'][0].instalaciones });
				$('#Rrating').raty({ score: data['valoracion'][0].recomendacion });
			}
			else 
				{
					$( "#button_valoracion" ).html("Guardar");
					$( "#id_cat_valoracion" ).val("-1");
				}	
		}
	});
}


function get_valoracion_gral()
{
	let method_profesion = 'CProfesional/get_valoracion_gral';
	var post_url = baseUrl+method_profesion
	
	var id_cat_profesional=$( "#id_cat_profesional" ).val();
	
	$.ajax({
		type: "POST",   
		dataType:'json',       
		data : {"id_cat_profesional":id_cat_profesional}, 			  
		url: post_url,                          
		success: function(data){                                										

			if(typeof(data['valoraciones'][0]) != 'undefined' )
			{

				val_gral=0;
				val_atencion=0;
				val_calidad=0;
				val_puntualidad=0;
				val_instalaciones=0;
				val_recomendacion=0;
				conta=0;

				for (let i in data['valoraciones']) 				
				{  			    
					val_atencion+=parseInt(data['valoraciones'][i].atencion);
					val_calidad+=parseInt(data['valoraciones'][i].calidad);
					val_puntualidad+=parseInt(data['valoraciones'][i].puntualidad);
					val_instalaciones+=parseInt(data['valoraciones'][i].instalaciones);
					val_recomendacion+=parseInt(data['valoraciones'][i].recomendacion);			
					conta++;
				}	

				val_gral+=val_atencion+val_calidad+val_puntualidad+val_instalaciones+val_recomendacion;

				$( "#valoracion_general" ).html(Math.round(val_gral/(conta*5)));

				$( "#valoracion_general_rating").raty({ readOnly: true, score: Math.round(val_gral/(conta*5)) });				
				$( "#valoracion_general_texto" ).html(Math.round(val_gral/(conta*5))+"/5 / "+conta+" valoraciones" );
				$( "#atencion" ).html(Math.round(val_atencion/conta));
				$( "#calidad" ).html(Math.round(val_calidad/conta));
				$( "#puntualidad" ).html(Math.round(val_puntualidad/conta));
				$( "#instalaciones" ).html(Math.round(val_instalaciones/conta));
				$( "#recomendacion" ).html(Math.round(val_recomendacion/conta));
			}
			
		}
	});
}



function get_opiniones_positivas()
{
	let method_profesion = 'CProfesional/opiniones_positivas';
	var post_url = baseUrl+method_profesion

	var id_cat_profesional=$( "#id_cat_profesional" ).val();
	
	$.ajax({
		type: "POST",   
		dataType:'json',       
		data : {"id_cat_profesional":id_cat_profesional}, 			  
		url: post_url,                          
		success: function(data){                                
			
			html="";		
			for (let i in data['opiniones_positivas']) 				
			{  			    

				html+= 	"<div class='row px-1 py-1 mx-1 my-1' style='background-color: #f7fff7;'>"+
							"<div class='col-xs-12 col-md-6'>"+
								
								"<strong>" +data['opiniones_positivas'][i].usuario+"</strong>"+
								"<br>"+
								"Usuario"+
								"<img src='"+baseUrl+"imagenes/Verificado.png' style='height: 20px; width: 70px;' title='Profesionista Verificado'  alt='Profesionista Verificado'>"+
							"</div>"+
							"<div class='col-xs-12 col-md-6' style='text-align: right;'>"+
								
								"<div id='read-only-stars'></div>"+
								"<span style='color: #007b5e;'> ☆☆☆☆☆</span>"+
							"</div>"
							+data['opiniones_positivas'][i].opinion+							
						"</div>";
			}  
			$('#tbody_opiniones_positivas').html(html);  
			
		}
	});
}

function get_opiniones_negativas()
{
	let method_profesion = 'CProfesional/opiniones_negativas';
	var post_url = baseUrl+method_profesion

	var id_cat_profesional=$( "#id_cat_profesional" ).val();
	
	$.ajax({
		type: "POST",   
		dataType:'json',       
		data : {"id_cat_profesional":id_cat_profesional}, 			  
		url: post_url,                          
		success: function(data){                                
			
			html="";		
			for (let i in data['opiniones_negativas']) 				
			{  			    

				html+= 	"<div class='row px-1 py-1 mx-1 my-1' style='background-color: #f7fff7;'>"+
							"<div class='col-xs-12 col-md-6'>"+
								
								"<strong>" +data['opiniones_negativas'][i].usuario+"</strong>"+
								"<br>"+
								"Usuario"+
								"<img src='"+baseUrl+"imagenes/Verificado.png' style='height: 20px; width: 70px;' title='Profesionista Verificado'  alt='Profesionista Verificado'>"+
							"</div>"+
							"<div class='col-xs-12 col-md-6' style='text-align: right;'>"+
								
								"<div id='read-only-stars'></div>"+
								"<span style='color: #007b5e;'> ☆☆☆☆☆</span>"+
							"</div>"
							+data['opiniones_negativas'][i].opinion+							
						"</div>";
			}  
			$('#tbody_opiniones_negativas').html(html);  
			
		}
	});
}

function get_opiniones_neutras()
{
	let method_profesion = 'CProfesional/opiniones_neutras';
	var post_url = baseUrl+method_profesion

	var id_cat_profesional=$( "#id_cat_profesional" ).val();
	
	$.ajax({
		type: "POST",   
		dataType:'json',       
		data : {"id_cat_profesional":id_cat_profesional}, 			  
		url: post_url,                          
		success: function(data){                                
			
			html="";		
			for (let i in data['opiniones_neutras']) 				
			{  			    

				html+= 	"<div class='row px-1 py-1 mx-1 my-1' style='background-color: #f7fff7;'>"+
							"<div class='col-xs-12 col-md-6'>"+
								
								"<strong>" +data['opiniones_neutras'][i].usuario+"</strong>"+
								"<br>"+
								"Usuario"+
								"<img src='"+baseUrl+"imagenes/Verificado.png' style='height: 20px; width: 70px;' title='Profesionista Verificado'  alt='Profesionista Verificado'>"+
							"</div>"+
							"<div class='col-xs-12 col-md-6' style='text-align: right;'>"+
								
								"<div id='read-only-stars'></div>"+
								"<span style='color: #007b5e;'> ☆☆☆☆☆</span>"+
							"</div>"
							+data['opiniones_neutras'][i].opinion+							
						"</div>";
			}  
			$('#tbody_opiniones_neutras').html(html);  
			
		}
	});
}


function get_opiniones_todas()
{
	let method_profesion = 'CProfesional/opiniones_todas';
	var post_url = baseUrl+method_profesion

	var id_cat_profesional=$( "#id_cat_profesional" ).val();
	
	$.ajax({
		type: "POST",   
		dataType:'json',       
		data : {"id_cat_profesional":id_cat_profesional}, 			  
		url: post_url,                          
		success: function(data){                                
			
			html="";		
			for (let i in data['opiniones_todas']) 				
			{  			    

				html+= 	"<div class='row px-1 py-1 mx-1 my-1' style='background-color: #f7fff7;'>"+
							"<div class='col-xs-12 col-md-6'>"+
								
								"<strong>" +data['opiniones_todas'][i].usuario+"</strong>"+
								"<br>"+
								"Usuario"+
								"<img src='"+baseUrl+"imagenes/Verificado.png' style='height: 20px; width: 70px;' title='Profesionista Verificado'  alt='Profesionista Verificado'>"+
							"</div>"+
							"<div class='col-xs-12 col-md-6' style='text-align: right;'>"+
								
								"<div id='read-only-stars'></div>"+
								"<span style='color: #007b5e;'> ☆☆☆☆☆</span>"+
							"</div>"
							+data['opiniones_todas'][i].opinion+							
						"</div>";
			}  
			$('#tbody_opiniones_todas').html(html);  
			
		}
	});
}

/***********************************************************************************************************************/
/**************************************CALENDARIO***********************************************************************/

$("#form_reservar").on("submit", function()
    { 	
        var id_cat_cita=$("#id_cat_cita").val();
        var id_cat_profesional=$("#id_cat_profesional").val();
        var id_cat_usuario=$("#id_cat_usuario").val();
        var starttime=$("#starttime").val();
        var endtime=$("#endtime").val();

        var asunto = $("#asunto").val();           
        var categoryClass = $("#color").val();

        var fecha_hora_inicio= $("#FecInicio").val()+" "+$("#starttime").val()+":00";
        var fecha_hora_termino= $("#FecTermino").val()+" "+$("#endtime").val()+":00";
        
        let method_data_save = 'CCalendario/save';
        var post_url = baseUrl+method_data_save       
        
                
        $.ajax
        ({
            type: "POST",   
            dataType:'json',         
            url: post_url,           
            data : {"id_cat_cita":id_cat_cita,"id_cat_profesional":id_cat_profesional,"id_cat_usuario":id_cat_usuario,"asunto":asunto,"color":categoryClass,"start":fecha_hora_inicio,"end":fecha_hora_termino}, 
            success: function(data)
            { 
              if(id_cat_cita !="-1") 
               {
                    $("#calendar_profesional").fullCalendar('updateEvent', {
                        id:data['id_cat_cita'],
                        title: asunto,
                        start: fecha_hora_inicio,
                        end: fecha_hora_termino,
                        allDay: false,
                        className: categoryClass
                    });
                    console.log("updateee");
                }
                else     
                  console.log("newww");
                 
                /**************************************/ 
                 $('#calendar_profesional').fullCalendar('removeEvents');                 
                 render_events();                    
            }
        });    
        
        $('#Modal_Reservacion').modal('hide');		
        
        return false;           
    });


    function mostrar_detalle_cita(id_cat_cita)
    {
        let method_detalle_cita = 'CCalendario/detalle_cita';
        var post_url = baseUrl+method_detalle_cita
        
        $('#id_cat_cita').val(id_cat_cita);

        $.ajax({
          url: post_url,
          type: 'POST',
          dataType: 'json',
          data : {"id_cat_cita":id_cat_cita}, 			
          success: function(response)
          {           
            $('#label_action').html("Editar Reservación");            

            $('#FecInicio').val( moment(response.detalle_cita[0].start).format('YYYY-MM-DD'));
            
            $('#id_cat_dia').val( moment($('#FecInicio').val()).day() );
            get_horario_atencion();

            $('#FecTermino').val( moment(response.detalle_cita[0].end).format('YYYY-MM-DD'));

            $('#starttime').val( moment(response.detalle_cita[0].start).format('HH:mm'));
            $('#endtime').val( moment(response.detalle_cita[0].end).format('HH:mm'));

            $('#asunto').val(response.detalle_cita[0].asunto);
            $('#color').val(response.detalle_cita[0].color);
            $('#btn_save').html("Editar");            
            $('#btn_delete').show();
            $('#Modal_Reservacion').modal('show');		
          }
        });   
        
    }    

    $('#btn_close').on('click', function(event) {        
        //clean_inputs();
        event.preventDefault(); // To prevent following the link (optional)
        
      });    

      function clean_inputs()
      {
        $("#FecInicio").val("");
        $("#FecTermino").val("");
        $('#starttime').val("");
        $('#endtime').val("");
        $('#asunto').val("");				
        $('#color').val("");				
      }

      $('#btn_delete').on('click', function(event) {        
        
        var id_cat_cita=$("#id_cat_cita").val();        
        let method_data_delete = 'CCalendario/delete';
        var post_url = baseUrl+method_data_delete;
                
        $.ajax
        ({
            type: "POST",   
            dataType:'json',         
            url: post_url,           
            data : {"id_cat_cita":id_cat_cita}, 
            success: function(data)
            {	   
                Swal.fire({
                    title: 'Se elimino con exitó!',                        
                }).then((result) => {                
                    $('#calendar_profesional').fullCalendar('removeEvents');                 
                    render_events();    
                })	
                
            }
        });    
        
        $('#Modal_Reservacion').modal('hide');		

        event.preventDefault(); // To prevent following the link (optional)
        
      });   

      $('#starttime').change(function(e) {	      
        
        $('#endtime').val( moment( $("#FecInicio").val()+" "+$("#starttime").val()+":00" ).add(30,"minutes").format('HH:mm'));
        return false;	
    });


    $('#FecInicio').change(function(e) {	      
        
        $('#FecTermino').val( $('#FecInicio').val() );             
        $('#id_cat_dia').val( moment($('#FecInicio').val()).day() );
        get_horario_atencion();
        return false;	
    });


function set_businessHours()
{
    let method_cita = 'CCalendario/get_dias_atencion';
    var post_url = baseUrl+method_cita;
            
    var id_cat_profesional=$("#id_cat_profesional").val();
                
    $.ajax({
        url: post_url,
        type: 'POST',
        dataType: 'json',
        data : {"id_cat_profesional":id_cat_profesional}, 			
        success: function(data)
        {                   

             let businessHours=[];

             len = data['get_dias_atencion'].length;
             for(var i=0; i<len; i++)
                {
                    var id_cat_dia = data['get_dias_atencion'][i].id_cat_dia;
                    businessHours.push(id_cat_dia);                                                                                                       
                } 

            console.log(businessHours);    
            $('#calendar_profesional').fullCalendar('option', {
                businessHours: [
                        {
                            dow: businessHours,
                            start: '09:00',
                            end: '11:00'
                        }             
                    ]
                });
        }
    });       
    
}


function render_events()
{
    let method_cita = 'CCalendario/Citas';
    var post_url = baseUrl+method_cita;
            
    var id_cat_profesional=$("#id_cat_profesional").val();
                
    $.ajax({
        url: post_url,
        type: 'POST',
        dataType: 'json',
        data : {"id_cat_profesional":id_cat_profesional}, 			
        success: function(data)
        {                   
            if(typeof(data['citas'][0]) != 'undefined' )
            { 
                for (let i in data['citas']) 
                {
                    var id_cat_cita=data["citas"][i].id_cat_cita;
                    var title=data["citas"][i].asunto;
                    var start=data["citas"][i].start;
                    var end=data["citas"][i].end;					  
                    var className= data["citas"][i].color
                    
                    var event={id:id_cat_cita,title: title,start:start,end:end,className:className};
                    $("#calendar_profesional").fullCalendar('renderEvent', event,true);   
                }
                
            }
        }
    });    
}      


function get_horario_atencion()
{
    let method_get_horario_atencion = 'CCalendario/get_horario_atencion';
    var post_url = baseUrl+method_get_horario_atencion;
            
    var id_cat_profesional=$("#id_cat_profesional").val();
    var id_cat_dia=$("#id_cat_dia").val();

    
    $.ajax({
        url: post_url,
        type: 'POST',
        dataType: 'json',
        data : {"id_cat_profesional":id_cat_profesional,"id_cat_dia":id_cat_dia}, 			
        success: function(data)
        { 
            if (data['horario_atencion'] != null) 
            {
                let disableTimeRanges=[];
                var len = data['horario_atencion']['before'].length;
                var range=[];
                for(var i=0; i<len; i++)
                {
                    // var min = data['horario_atencion'][i].min;
                    // var max = data['horario_atencion'][i].max;

                    var min = "00:00";
                    var max = data['horario_atencion']['before'][i].min;

                    if($("#id_cat_cita").val()=="-1") 
                      {
                          $("#starttime").val(  moment( $("#FecInicio").val()+" "+data['horario_atencion']['before'][i].min ).add(1,"minutes").format('HH:mm') );                                                 
                          $('#endtime').val( moment( $("#FecInicio").val()+" "+$("#starttime").val()+":00" ).add(30,"minutes").format('HH:mm'));
                      }    

                    range[i]=[min, max];
                    disableTimeRanges.push(range[i]);                                                                                   
                }                 
                
                
                len = data['horario_atencion']['after'].length;
                for(var i=0; i<len; i++)
                {
                    var min = data['horario_atencion']['after'][i].max;
                    var max = "23:59";

                    range[i]=[min, max];
                    disableTimeRanges.push(range[i]);                                                                                                       
                } 
                
                if (data['horario_atencion']['citas'] != null) 
                {
                    len = data['horario_atencion']['citas'].length;
                    for(var i=0; i<len; i++)
                    {
                        var min = data['horario_atencion']['citas'][i].min;
                        var max = data['horario_atencion']['citas'][i].max;

                        range[i]=[min, max];
                        disableTimeRanges.push(range[i]);                                                                                   
                      
                    } 
                }    
                
                $('#starttime').timepicker('option', 'disableTimeRanges', disableTimeRanges); 
                $('#endtime').timepicker('option', 'disableTimeRanges', disableTimeRanges); 
            }   
        }
    });
}

/***********************************************************************************************************************/
/***********************************************************************************************************************/


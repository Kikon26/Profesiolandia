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
	loadPagination(0);	
	//bloqueaPantalla();
  
	/*
	let method = 'CAltaProfesional/Profesional?';
	let criterios = {id_cat_profesional:$('#id_cat_profesional').val()};
	
	asyncGetReq(criterios, baseUrl + method).then(data => 
	{ 
	
	
	if (data['profesional']) 
	{   	}	

		
	  desbloqueaPantalla();
  	}).catch(e => { console.error(e); desbloqueaPantalla();});
	//fin dle proceso
	*/
	
	
	desbloqueaPantalla();

	get_profesional();	
	/*
	if ($("#informacion_completa").length > 0) {
		tinymce.init({
			selector: "textarea#informacion_completa",
			theme: "modern",
			height: 300,
			plugins: [
				"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
				"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				"save table contextmenu directionality emoticons template paste textcolor"
			],
			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
			
			// setup: function (editor) {
			// 	editor.on('change', function(e) {
			// 		console.log(editor.id);
			// 	    $("#"+editor.id).text(editor.getContent());
			// 	});
				
			//   }
			

		});
	}  

	
	if ($("#experiencia_servicios_ofrecidos").length > 0) {
		tinymce.init({
			selector: "textarea#experiencia_servicios_ofrecidos",
			theme: "modern",
			height: 300,
			plugins: [
				"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
				"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				"save table contextmenu directionality emoticons template paste textcolor"
			],
			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

		});
	}  

	if ($("#preguntas_frecuentes").length > 0) {
		tinymce.init({
			selector: "textarea#preguntas_frecuentes",
			theme: "modern",
			height: 300,
			plugins: [
				"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
				"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				"save table contextmenu directionality emoticons template paste textcolor"
			],
			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

		});
	} */ 


	$("#button_delete_rec").hide();        
	//$("#button_new_rec").hide();
	
	$('.rec-repeater').repeater({
            
		show: function () {
			
			var limitcount = $(".rec-repeater").data("limit");         
			var itemcount = $(".rec-repeater").find("div[data-repeater-item]").length;
			//console.log(itemcount);
			var temp;
	
			if (limitcount) 
			{
				if (itemcount <= limitcount) {
					$(this).slideDown();                                                
					$(".rec-repeater label[class=control-label]")[itemcount-1].id="label_rec_"+itemcount;                                                                        
					$(".rec-repeater input[type=text]")[itemcount-1].id="rec_"+itemcount;                                                                        
					$(".rec-repeater input[type=file]")[itemcount-1].id="file_"+itemcount;                                                                                                					
					
					$(".rec-repeater label[class=custom-file-label]")[itemcount-1].id="label_file_"+itemcount;                                                          

					$(".rec-repeater div.div_imagen")[itemcount-1].id="div_imagen_"+itemcount;         
					$(".rec-repeater input[type=hidden]")[itemcount-1].id="id_cat_reconocimiento_"+itemcount;                                                                                                					                                                               					
					$(".rec-repeater img[class=img-fluid]")[itemcount-1].id="imagen_"+itemcount;                                                                        

					$(".rec-repeater .btn-danger")[itemcount-1].id="button_delete_rec_"+itemcount;                                                                        
					$("#button_delete_rec_"+itemcount).show();
					temp=itemcount-1;
					$("#button_delete_rec_"+temp).hide();


					if (itemcount==2) 
					{
						$("#label_rec_"+itemcount).html("Nombre de tu segundo reconocimiento");                                                                        
						$("#rec_"+itemcount).attr("placeholder", "Ingresa el nombre de tu segundo reconocimiento");						
					}	
					if (itemcount==3) 	
					{
						$("#label_rec_"+itemcount).html("Nombre de tu tercer reconocimiento");                                                                        
						$("#rec_"+itemcount).attr("placeholder", "Ingresa el nombre de tu tercer reconocimiento");						
					}	
					if (itemcount==4) 
					{
						$("#label_rec_"+itemcount).html("Nombre de tu cuarto reconocimiento");                                                                        
						$("#rec_"+itemcount).attr("placeholder", "Ingresa el nombre de tu cuarto reconocimiento");						
					}	
					if (itemcount==5) 
					{
						$("#label_rec_"+itemcount).html("Nombre de tu quinto reconocimiento");                                                                        
						$("#rec_"+itemcount).attr("placeholder", "Ingresa el nombre de tu quinto reconocimiento");						
					}	
					
					$('#file_'+itemcount).on('change',function(){
						//get the file name
						var fileName = $(this).val();
						//replace the "Choose a file" label
						$(this).next('.custom-file-label').html(fileName.replace(/^.*[\\\/]/, ''));
					})		

				} else {
					$(this).remove();
				}
			} 
			else 
			{
				$(this).slideDown();
			}     
			
			if (itemcount >= limitcount) {
				$("#button_new_rec").hide("slow");
			} 
	
	
			
		},
		hide: function (deleteElement) {
	
			var limitcount = $(".rec-repeater").data("limit");         
			var itemcount = $(".rec-repeater").find("div[data-repeater-item]").length;
			var itemcount_temp=itemcount;
			
			var id_cat_reconocimiento_temp=$("#id_cat_reconocimiento_"+itemcount).val();
			/*********************************/
			
			if (id_cat_reconocimiento_temp!="")  
			{
				Swal.fire({
					title: "¿Estas seguro de remover el reconocimiento?",
					text: "No se podra recuperar!",
					//type: "advertencia",
					showCancelButton: true,
					confirmButtonColor: '#DD6B55',
					confirmButtonText: 'Si, estoy seguro!',
					cancelButtonText: "No, cancelar!"/*,
					closeOnConfirm: false,
					closeOnCancel: false*/
				}).then((result) => {
					
					if (result.value)
					{											
						eliminar_reconocimiento(id_cat_reconocimiento_temp,$("#imagen_"+itemcount_temp).attr("data-nombre"));						
						$(this).slideUp(deleteElement);                   								

						/*Swal.fire({
							title: 'Reconocimiento eliminado con exitó!',                        
						}).then((result) => {
							
						})	*/

						Swal.fire(
							'El correo ya existe, intenta con otro !',
							'',
							'error'
						  )	
					
					}
					
				})
			}	
			else 
				$(this).slideUp(deleteElement);                   								
			/*********************************/

			/*if(confirm('Estas seguro de remover el reconocimiento?')) {
				eliminar_reconocimiento($("#id_cat_reconocimiento_"+itemcount).val(),$("#imagen_"+itemcount).attr("data-nombre"));	
				$(this).slideUp(deleteElement);                   								
			}*/
	
			if (itemcount <= limitcount) {                    
				$("#button_new_rec").show("slow");     
				itemcount--;                
				if(itemcount>1) $("#button_delete_rec_"+itemcount).show();               
			}
			
		},
		ready: function (setIndexes) {
								
	
		}
	});
	get_reconocimiento();

	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	get_promocion();
	$("#button_delete_precio").hide();        	
	
	$('.precio-repeater').repeater({
            
		show: function () {
			
			var limitcount = $(".precio-repeater").data("limit");         
			var itemcount = $(".precio-repeater").find("div[data-repeater-item]").length;			
			var temp;
	
			if (limitcount) 
			{
				if (itemcount <= limitcount) {
					$(this).slideDown();                                                

					$(".precio-repeater input[type=hidden]")[itemcount-1].id="id_cat_precio_"+itemcount;     											
					$(".precio-repeater input.servicio[type=text]")[itemcount-1].id="servicio_"+itemcount;                                                               
					$(".precio-repeater input.precio[type=text]")[itemcount-1].id="precio_"+itemcount;    
					
					$("#precio_"+itemcount).on					
					({
						keyup: function() {
						  formatCurrency($(this));
						},
						blur: function() { 
						  formatCurrency($(this), "blur");
						}
					});


					$(".precio-repeater input[type=checkbox]")[itemcount-1].id="ch_"+itemcount;     						
									
					
					$(".precio-repeater .btn-danger")[itemcount-1].id="button_delete_precio_"+itemcount;                                                                        
					$("#button_delete_precio_"+itemcount).show();
					temp=itemcount-1;
					$("#button_delete_precio_"+temp).hide();				
					
				} else {
					$(this).remove();
				}
			} 
			else 
			{
				$(this).slideDown();
			}     
			
			if (itemcount >= limitcount) {
				$("#button_new_precio").hide("slow");
			} 
	
	
			
		},
		hide: function (deleteElement) {
	
			var limitcount = $(".precio-repeater").data("limit");         
			var itemcount = $(".precio-repeater").find("div[data-repeater-item]").length;			
			
			var id_cat_precio_temp=$("#id_cat_precio_"+itemcount).val();
			/*********************************/
			
			if (id_cat_precio_temp!="")  
			{
				Swal.fire({
					title: "¿Estas seguro de remover el precio?",
					text: "No se podra recuperar!",
					//type: "advertencia",
					showCancelButton: true,
					confirmButtonColor: '#DD6B55',
					confirmButtonText: 'Si, estoy seguro!',
					cancelButtonText: "No, cancelar!"/*,
					closeOnConfirm: false,
					closeOnCancel: false*/
				}).then((result) => {
					
					if (result.value)
					{											
						eliminar_precio(id_cat_precio_temp);						
						$(this).slideUp(deleteElement);                   								

						/*Swal.fire({
							title: 'Precio eliminado con exitó!',                        
						}).then((result) => {
							
						})	*/
					}
					
				})
			}	
			else 
				$(this).slideUp(deleteElement);                   								
			/*********************************/

			/*
			if(confirm('Estas seguro de remover el precio?')) {
				$(this).slideUp(deleteElement);                   				
			}*/
	
			if (itemcount <= limitcount) {                    
				$("#button_new_precio").show("slow");     
				itemcount--;                
				if(itemcount>1) $("#button_delete_precio_"+itemcount).show();               
			}
			
		},
		ready: function (setIndexes) {
								
	
		}
	});
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	get_horario_atencion();
	get_precio();
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	//cat_estado();
	  

});


function eliminar_reconocimiento(id_cat_reconocimiento,imagen)
{
	let method_eliminar_reconocimiento = 'CAltaProfesional/eliminar_reconocimiento';
	var post_url = baseUrl+method_eliminar_reconocimiento;

	var id_cat_profesional=$( "#id_cat_profesional" ).val();
	
	$.ajax({
	  url: post_url,
	  type: 'POST',
	  dataType: 'json',
	  data : {"id_cat_profesional":id_cat_profesional,"id_cat_reconocimiento":id_cat_reconocimiento,"imagen":imagen}, 			
	  success: function(data)
	  {  
		
	  }
	});
}

function eliminar_precio(id_cat_precio)
{
	let method_eliminar_precio = 'CAltaProfesional/eliminar_precio';
	var post_url = baseUrl+method_eliminar_precio;

	var id_cat_profesional=$( "#id_cat_profesional" ).val();
	
	$.ajax({
	  url: post_url,
	  type: 'POST',
	  dataType: 'json',
	  data : {"id_cat_profesional":id_cat_profesional,"id_cat_precio":id_cat_precio}, 			
	  success: function(data)
	  {  
		
	  }
	});
}

function get_profesional()
{
	let method_profesional = 'CAltaProfesional/Profesional';
	var post_url = baseUrl+method_profesional;
		
	var id_cat_profesional=$( "#id_cat_profesional" ).val();
		
	$.ajax({
	  url: post_url,
	  type: 'POST',
	  dataType: 'json',
	  data : {"id_cat_profesional":id_cat_profesional}, 			
	  success: function(data)
	  {  
		cat_profesion(data['profesional'][0].profesion);		
		loadPagination_preguntas(0,data['profesional'][0].id_cat_profesion);	

		$('#especialidad').val(data['profesional'][0].especialidad);
		$('#descripcion').val(data['profesional'][0].descripcion);
		$('#informacion_completa').html(data['profesional'][0].informacion_completa);
		$('#cedula_profesional').val(data['profesional'][0].cedula_profesional);
		$('#cedula_profesional_postgrado').val(data['profesional'][0].cedula_profesional_postgrado);

		$('#experiencia_servicios_ofrecidos').val(data['profesional'][0].experiencia_servicios_ofrecidos);
		$('#preguntas_frecuentes').val(data['profesional'][0].preguntas_frecuentes);
		
		$('#metodos_pago').val(data['profesional'][0].metodos_pago);


		cat_estado(data['profesional'][0].id_cat_estado);
		if (data['profesional'][0].id_cat_estado!=null) 
		{
			$('#existe_direccion').val("si");
			$('#mpio').val(data['profesional'][0].municipio);
			$('#colonia').val(data['profesional'][0].colonia);
			$('#calle').val(data['profesional'][0].calle);
			$('#cp').val(data['profesional'][0].cp);
			$('#num').val(data['profesional'][0].num);
			$('#telefono').val(data['profesional'][0].tel);							
		}	
		$('#email').val(data['profesional'][0].email);

		/*
		if(data['profesional'][0].imagen==null) 
		    {
				$("#imagen_perfil").attr('src',baseUrl+"imagenes/no_disponible.jpeg");
				$("#imagen_perfil").attr('data-nombre',"no");
			}	
		else 								
			{
				$("#imagen_perfil").attr('src',baseUrl+"assets/images/profesionales/"+data['profesional'][0].imagen);
				$("#imagen_perfil").attr('data-nombre',data['profesional'][0].imagen);
				
			}	
		$("#div_imagen_perfil").show();	*/
	
		
		$('#horario_apertura_1').timepicker({ 
			'disableTimeRanges':[], 		  
			  'minTime': '8:00am',
			  'maxTime': '20:00pm',                    
			  'timeFormat': 'H:i'
		  });                  
		  $('#horario_apertura_2').timepicker({ 
			'disableTimeRanges':[], 		  
			  'minTime': '8:00am',
			  'maxTime': '20:00pm',                    
			  'timeFormat': 'H:i'  
		  });                  
		  $('#horario_apertura_3').timepicker({ 
			'disableTimeRanges':[], 		  
			  'minTime': '8:00am',
			  'maxTime': '20:00pm',                    
			  'timeFormat': 'H:i'  
		  });                  
		  $('#horario_apertura_4').timepicker({ 
			'disableTimeRanges':[], 		  
			  'minTime': '8:00am',
			  'maxTime': '20:00pm',                    
			  'timeFormat': 'H:i'  
		  });                  
		  $('#horario_apertura_5').timepicker({ 
			'disableTimeRanges':[], 		  
			  'minTime': '8:00am',
			  'maxTime': '20:00pm',                    
			  'timeFormat': 'H:i'  
		  });                  
		  $('#horario_apertura_6').timepicker({ 
			'disableTimeRanges':[], 		  
			  'minTime': '8:00am',
			  'maxTime': '20:00pm',                    
			  'timeFormat': 'H:i'  
		  });                  
		  $('#horario_apertura_7').timepicker({ 
			'disableTimeRanges':[], 		  
			  'minTime': '8:00am',
			  'maxTime': '20:00pm',                    
			  'timeFormat': 'H:i'  
		  });         
		  
		  $('#horario_termino_1').timepicker({ 
			'disableTimeRanges':[], 		  
			  'minTime': '8:00am',
			  'maxTime': '20:00pm',                    
			  'timeFormat': 'H:i'  
		  });                  
		  $('#horario_termino_2').timepicker({ 
			'disableTimeRanges':[], 		  
			  'minTime': '8:00am',
			  'maxTime': '20:00pm',                    
			  'timeFormat': 'H:i'  
		  });                  
		  $('#horario_termino_3').timepicker({ 
			'disableTimeRanges':[], 		  
			  'minTime': '8:00am',
			  'maxTime': '20:00pm',                    
			  'timeFormat': 'H:i'  
		  });                  
		  $('#horario_termino_4').timepicker({ 
			'disableTimeRanges':[], 		  
			  'minTime': '8:00am',
			  'maxTime': '20:00pm',                    
			  'timeFormat': 'H:i'  
		  });                  
		  $('#horario_termino_5').timepicker({ 
			'disableTimeRanges':[], 		  
			  'minTime': '8:00am',
			  'maxTime': '20:00pm',                    
			  'timeFormat': 'H:i'  
		  });                  
		  $('#horario_termino_6').timepicker({ 
			'disableTimeRanges':[], 		  
			  'minTime': '8:00am',
			  'maxTime': '20:00pm',                    
			  'timeFormat': 'H:i'  
		  });                  
		  $('#horario_termino_7').timepicker({ 
			'disableTimeRanges':[], 		  
			  'minTime': '8:00am',
			  'maxTime': '20:00pm',                    
			  'timeFormat': 'H:i'
		  }); 	

		  /*************************************************************************/
		  $('#id_cat_red_social').val(data['profesional'][0].id_cat_red_social);
		  
		  //if(typeof(data['profesional'][0].business_card) != 'undefined' && (data['profesional'][0].business_card!="" || data['profesional'][0].business_card!=null))                  		
		  if( data['profesional'][0].business_card!=null)                  		
		  { 
			$("#imagen_business_card").attr('data-nombre',data['profesional'][0].business_card);
			$("#imagen_business_card").attr('src',baseUrl+"assets/images/profesionales/"+id_cat_profesional+"/card/"+data['profesional'][0].business_card);
			$("#div_imagen_business_card").show();
			$("#div_business_card").addClass("col-md-5");
		  }
		  else 
		  	{ 
				  $("#div_business_card").addClass("col-md-6");
				  $("#div_imagen_business_card").hide();
			}	  
		  

		  $('#google_maps').val(data['profesional'][0].google_maps);
		  $('#whatsapp').val(data['profesional'][0].whatsapp);
		  $('#facebook').val(data['profesional'][0].facebook);
		  $('#instagram').val(data['profesional'][0].instagram);
		  $('#twitter').val(data['profesional'][0].twitter);
		  $('#pagina_web').val(data['profesional'][0].pagina_web);

		  if (data['profesional'][0].activo==1)
						$("#activar_redes").prop( "checked", true );
		  /*************************************************************************/

	  }
	});
}

$('#horario_apertura_1').on('changeTime', function(e) {    
	validar_tiempo('horario_termino_1',e.target.value);	
});
$('#horario_apertura_2').on('changeTime', function(e) {    
	validar_tiempo('horario_termino_2',e.target.value);	
});
$('#horario_apertura_3').on('changeTime', function(e) {    
	validar_tiempo('horario_termino_3',e.target.value);	
});
$('#horario_apertura_4').on('changeTime', function(e) {    
	validar_tiempo('horario_termino_4',e.target.value);	
});
$('#horario_apertura_5').on('changeTime', function(e) {    
	validar_tiempo('horario_termino_5',e.target.value);	
});
$('#horario_apertura_6').on('changeTime', function(e) {    
	validar_tiempo('horario_termino_6',e.target.value);	
});
$('#horario_apertura_7').on('changeTime', function(e) {    
	validar_tiempo('horario_termino_7',e.target.value);	
});

$('#dia_vigente_1').change(function(e) {	
	if($("#dia_vigente_1").prop("checked") == true)  
	{
		$('#horario_apertura_1').attr("required", true);
		$('#horario_termino_1').attr("required", true);
	}
	else
	{
		$('#horario_apertura_1').attr("required", false);
		$('#horario_termino_1').attr("required", false);
	}
})
$('#dia_vigente_2').change(function(e) {	
	if($("#dia_vigente_2").prop("checked") == true)  
	{
		$('#horario_apertura_2').attr("required", true);
		$('#horario_termino_2').attr("required", true);
	}
  else
	{
		$('#horario_apertura_2').attr("required", false);
		$('#horario_termino_2').attr("required", false);
	}
})
$('#dia_vigente_3').change(function(e) {	
	if($("#dia_vigente_3").prop("checked") == true)  
	{
		$('#horario_apertura_3').attr("required", true);
		$('#horario_termino_3').attr("required", true);
	}
  else
	{
		$('#horario_apertura_3').attr("required", false);
		$('#horario_termino_3').attr("required", false);
	}
})
$('#dia_vigente_4').change(function(e) {	
	if($("#dia_vigente_4").prop("checked") == true)  
	{
		$('#horario_apertura_4').attr("required", true);
		$('#horario_termino_4').attr("required", true);
	}
  else
	{
		$('#horario_apertura_4').attr("required", false);
		$('#horario_termino_4').attr("required", false);
	}
})
$('#dia_vigente_5').change(function(e) {	
	if($("#dia_vigente_5").prop("checked") == true)  
	{
		$('#horario_apertura_5').attr("required", true);
		$('#horario_termino_5').attr("required", true);
	}
  else
	{
		$('#horario_apertura_5').attr("required", false);
		$('#horario_termino_5').attr("required", false);
	}
})
$('#dia_vigente_6').change(function(e) {	
	if($("#dia_vigente_6").prop("checked") == true)  
	{
		$('#horario_apertura_6').attr("required", true);
		$('#horario_termino_6').attr("required", true);
	}
  else
	{
		$('#horario_apertura_6').attr("required", false);
		$('#horario_termino_6').attr("required", false);
	}
})
$('#dia_vigente_7').change(function(e) {	
	if($("#dia_vigente_7").prop("checked") == true)  
	{
		$('#horario_apertura_7').attr("required", true);
		$('#horario_termino_7').attr("required", true);
	}
  else
	{
		$('#horario_apertura_7').attr("required", false);
		$('#horario_termino_7').attr("required", false);
	}
})


function validar_tiempo(control_horario,hora)
{
	let disableTimeRanges=[];			
	var range=[];	
	var min = '8:00'//moment(hora,'h:mm').subtract(1, 'minutes').format('h:mm');
	var max = moment(hora,'h:mm').add(1, 'minutes').format('H:mm');
	range[0]=[min, max];
	disableTimeRanges.push(range[0]);                                           		
	
	$('#'+control_horario).timepicker('option', 'disableTimeRanges', disableTimeRanges); 

}

function get_reconocimiento()
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
			
			for (let i in data['reconocimiento']) 				
			{  			    
					 if (i>0)   $('.rec-repeater [data-repeater-create]').trigger('click');  
					  $("#rec_"+(parseInt(i)+1)).val(data['reconocimiento'][i].nombre);
					  
					  $("#file_"+(parseInt(i)+1)).attr('required', false); 

					  $("#id_cat_reconocimiento_"+(parseInt(i)+1)).val(data['reconocimiento'][i].id_cat_reconocimiento);

					  $("#imagen_"+(parseInt(i)+1)).attr('data-nombre',data['reconocimiento'][i].archivo);
					  $("#imagen_"+(parseInt(i)+1)).attr('src',baseUrl+"assets/images/profesionales/"+id_cat_profesional+"/rec/"+data['reconocimiento'][i].archivo);

					  $("#div_imagen_"+(parseInt(i)+1)).show();

			}    
			
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
					 //if (i>0)   $('.rec-repeater [data-repeater-create]').trigger('click');  					  
					  
					  $("#file_promo_"+(parseInt(i)+1)).attr('required', false); 

					  $("#id_cat_promocion_"+(parseInt(i)+1)).val(data['promocion'][i].id_cat_promocion);

					  $("#imagen_promo_"+(parseInt(i)+1)).attr('data-nombre',data['promocion'][i].archivo);
					  $("#imagen_promo_"+(parseInt(i)+1)).attr('src',baseUrl+"assets/images/profesionales/"+id_cat_profesional+"/promo/"+data['promocion'][i].archivo);

					  $("#div_imagen_promo_"+(parseInt(i)+1)).show();

			} 
			
		}
	});
}

function get_precio()
{
	let method_profesion = 'CAltaProfesional/precio';
	var post_url = baseUrl+method_profesion

	var id_cat_profesional=$( "#id_cat_profesional" ).val();

	$.ajax({
		type: "POST",   
		dataType:'json',       
		data : {"id_cat_profesional":id_cat_profesional}, 			  
		url: post_url,                          
		success: function(data){                                		
			
			for (let i in data['precio']) 				
				{   
					if (i>0)   $('.precio-repeater [data-repeater-create]').trigger('click');  					  

					$("#servicio_"+(parseInt(i)+1)).val(data['precio'][i].servicio);			 
					//$("#precio_"+(parseInt(i)+1)).val(data['precio'][i].precio);	
					$("#precio_"+(parseInt(i)+1)).val("$"+ new Intl.NumberFormat("es-MX").format(data['precio'][i].precio));	
					$("#precio_"+(parseInt(i)+1)).blur();
					
					
					$("#id_cat_precio_"+(parseInt(i)+1)).val(data['precio'][i].id_cat_precio);			 

					if (data['precio'][i].vigente==1)
						$("#ch_"+(parseInt(i)+1)).prop( "checked", true );
				}	
			
		}
	});
}

function get_horario_atencion()
{
	let method_profesion = 'CAltaProfesional/horario_atencion';
	var post_url = baseUrl+method_profesion

	var id_cat_profesional=$( "#id_cat_profesional" ).val();

	$.ajax({
		type: "POST",   
		dataType:'json',       
		data : {"id_cat_profesional":id_cat_profesional}, 			  
		url: post_url,                          
		success: function(data){                                		
			
			for (let i in data['horario_atencion']) 				
				{
					dia=data['horario_atencion'][i].id_cat_dia;

					$("#horario_apertura_"+dia).val(data['horario_atencion'][i].horario_apertura);			 								
					$("#horario_termino_"+dia).val(data['horario_atencion'][i].horario_termino);			 								
					$("#dia_vigente_"+dia).prop( "checked", true );			
				}	
			
		}
	});
}


$("#form_info_gral").on("submit", function(){ 
	
	var id_cat_profesional = $('#id_cat_profesional').val();		
	var id_cat_profesion = $('#id_cat_profesion').val();		
	var especialidad = $('#especialidad').val();
	var descripcion = $('#descripcion').val();
	var informacion_completa = $('#informacion_completa').val();
	//var informacion_completa = tinymce.get("informacion_completa").getContent();

	var cedula_profesional = $('#cedula_profesional').val();
	var cedula_profesional_postgrado = $('#cedula_profesional_postgrado').val();
	
		
	var formData = new FormData();
	
	formData.append("id_cat_profesional", id_cat_profesional);
	formData.append("id_cat_profesion", id_cat_profesion);

	formData.append("especialidad", especialidad);
	formData.append("descripcion", descripcion);

	formData.append("informacion_completa", informacion_completa);
	formData.append("cedula_profesional", cedula_profesional);
	formData.append("cedula_profesional_postgrado", cedula_profesional_postgrado);
	
	let method_data_update = 'CAltaProfesional/update_info_gral';
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
			Swal.fire({
				title: 'Actualización realizada con exitó!',                        
			}).then((result) => {
				
			})	
		}
	});	
	return false;
});

$("#form_experiencia_titulos").on("submit", function(){ 
		
	var id_cat_profesional = $('#id_cat_profesional').val();		
	var experiencia_servicios_ofrecidos = $('#experiencia_servicios_ofrecidos').val();	
	//var experiencia_servicios_ofrecidos =tinymce.get("experiencia_servicios_ofrecidos").getContent();

	var preguntas_frecuentes = $('#preguntas_frecuentes').val();		
	//var preguntas_frecuentes = tinymce.get("preguntas_frecuentes").getContent();
	
	var formData = new FormData();
	
	formData.append("id_cat_profesional", id_cat_profesional);
	formData.append("experiencia_servicios_ofrecidos", experiencia_servicios_ofrecidos);
	formData.append("preguntas_frecuentes", preguntas_frecuentes);
	


	/*************************************************************************************/
	var limitcount = $(".rec-repeater").data("limit");         
	formData.append("limitcount",limitcount);

	for (var i = 1; i <= limitcount; i++) 	
	{   
		formData.append("rec_"+i, $('#rec_'+i).val());

		if(typeof($("#file_"+i).val()) != 'undefined' && $("#file_"+i).val()!="")                  		
			formData.append("file_"+i, $("#file_"+i).get(0).files[0]);			
		

		if ($("#id_cat_reconocimiento_"+i).val()=="") formData.append("id_cat_reconocimiento_"+i, "-1");
		else                                          formData.append("id_cat_reconocimiento_"+i, $("#id_cat_reconocimiento_"+i).val()); 
	}	
	/*************************************************************************************/
	
	let method_data_update = 'CAltaProfesional/update_experiencia_titulos';
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
			Swal.fire({
				title: 'Actualización realizada con exitó!',                        
			}).then((result) => {
				
			})	
		}
	});	
	return false;
});

$("#form_precios").on("submit", function(){ 
	var id_cat_profesional = $('#id_cat_profesional').val();		
	
	var formData = new FormData();
	
	formData.append("id_cat_profesional", id_cat_profesional);
	
	
	if ( $("#file_promo_1").val()!="" )
	{		
		var file_promo_1 = $("#file_promo_1").get(0).files[0];				
		formData.append("file_promo_1", file_promo_1);

		if ($("#id_cat_promocion_1").val()=="") formData.append("id_cat_promocion_1", "-1");
		else                                    formData.append("id_cat_promocion_1", $("#id_cat_promocion_1").val()); 
	}	
	
	var limitcount = $(".precio-repeater").data("limit");         
	formData.append("limitcount",limitcount);
	
	for (var i = 1; i <= limitcount; i++) 
	{
		if( $('#servicio_'+i).length>0 )
		{	
			formData.append("servicio_"+i,$("#servicio_"+i).val());
			formData.append("precio_"+i,$("#precio_"+i).val().replace('$','').replace(',',''));
			if($("#ch_"+i).prop("checked") == true) formData.append("ch_"+i,"1");
			else                                 	formData.append("ch_"+i,"0");

			if ($("#id_cat_precio_"+i).val()=="") formData.append("id_cat_precio_"+i, "-1");
			else                                  formData.append("id_cat_precio_"+i, $("#id_cat_precio_"+i).val()); 
		}
	}	
    
	var metodos_pago = $('#metodos_pago').val();		
	formData.append("metodos_pago",metodos_pago);
	
	let method_data_update = 'CAltaProfesional/update_precios';
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
			Swal.fire({
				title: 'Actualización realizada con exitó!',                        
			}).then((result) => {					
				$('.precio-repeater [data-repeater-list]').empty();
				$('[data-repeater-create]').click();				
				get_promocion();
				get_precio();		
			})	


		}
	});	
	return false;
});

$("#form_contacto").on("submit", function(){ 
	
	var id_cat_profesional = $('#id_cat_profesional').val();		

	var existe_direccion=$('#existe_direccion').val();
	var id_cat_estado = $('#id_cat_estado').val();		
	var mpio = $('#mpio').val();		
	var colonia = $('#colonia').val();		
	var calle = $('#calle').val();		
	var cp = $('#cp').val();		
	var num = $('#num').val();		
	var telefono = $('#telefono').val();	
	var email = $('#email').val();			
		
	var formData = new FormData();	

	formData.append("id_cat_profesional", id_cat_profesional);
	formData.append("existe_direccion", existe_direccion);
	formData.append("id_cat_estado", id_cat_estado);		        
	formData.append("mpio", mpio);		        
	formData.append("colonia", colonia);		        
	formData.append("calle", calle);		        
	formData.append("cp", cp);		        
	formData.append("num", num);		        
	formData.append("telefono", telefono);		        
	formData.append("email", email);
	

	for (var i = 1; i <= 7; i++) 		
	{
		if($("#dia_vigente_"+i).prop("checked") == true) 
			{				
				
				formData.append("horario_apertura_"+i,$('#horario_apertura_'+i).val());
				formData.append("horario_termino_"+i,$('#horario_termino_'+i).val());
			}
	}		

	var id_cat_rol = $('#id_cat_rol').val();		
	if (id_cat_rol==1)
		{

			if ($("#id_cat_red_social").val()=="") formData.append("id_cat_red_social", "-1");
			else                                   formData.append("id_cat_red_social", $("#id_cat_red_social").val()); 

			if ( $("#file_business_card").val()!="" )
			{		
				var file_business_card = $("#file_business_card").get(0).files[0];				
				formData.append("file_business_card", file_business_card);				

				if( $("#imagen_business_card").attr("data-nombre")!="" )
				{
					var name_card = $("#imagen_business_card").attr("data-nombre");							
					formData.append("name_card", name_card);
				}
			}	
			var business_card = $('#business_card').val();		
			formData.append("business_card", business_card);

			var google_maps = $('#google_maps').val();		
			formData.append("google_maps", google_maps);

			var whatsapp = $('#whatsapp').val();		
			formData.append("whatsapp", whatsapp);

			var facebook = $('#facebook').val();		
			formData.append("facebook", facebook);

			var instagram = $('#instagram').val();		
			formData.append("instagram", instagram);

			var twitter = $('#twitter').val();		
			formData.append("twitter", twitter);

			var pagina_web = $('#pagina_web').val();		
			formData.append("pagina_web", pagina_web);

			if($("#activar_redes").prop("checked") == true) formData.append("activar_redes","1");
			else                                 	        formData.append("activar_redes","0");
		}	

	
	let method_data_update = 'CAltaProfesional/update_contacto ';
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
			Swal.fire({
				title: 'Actualización realizada con exitó!',                        
			}).then((result) => {
				
			})	
		}
	});	
	return false;
});

function cat_profesion(profesion)
{

	let method_profesion = 'CAltaProfesional/profesion';
	var post_url = baseUrl+method_profesion

	$.ajax({
		type: "POST",   
		dataType:'json',         
		url: post_url,                          
		success: function(data){                                
			var html = '<option value="">Selecciona Profesión</option>';                
			for (let i in data['profesion']) 				{  
				    
					if (data['profesion'][i].nombre==profesion)                                                  
					  {
						  html += '<option value='+data['profesion'][i].id_cat_profesion+' data-nombre="'+data['profesion'][i].nombre+'" selected>'+data['profesion'][i].nombre+'</option>';                                                                                                     					  
						  $('#id_cat_profesion_temp').val(data['profesion'][i].id_cat_profesion);		
					  }	  
					else  
					  html += '<option value='+data['profesion'][i].id_cat_profesion+' data-nombre="'+data['profesion'][i].nombre+'">'+data['profesion'][i].nombre+'</option>';                   
				}    
			
			$('#id_cat_profesion').html(html);					

			
		}
	});

}

function cat_estado(id_cat_estado)
{

	let method_estado = 'CAltaProfesional/estado';
	var post_url = baseUrl+method_estado
	$.ajax({
		type: "POST",   
		dataType:'json',         
		url: post_url,                          
		success: function(data){                                
			var html = '<option value="">Selecciona Estado</option>';                
			for (let i in data['estado']) 				{  
				    
					if (data['estado'][i].id_cat_estado==id_cat_estado)                                                  
					  html += '<option value='+data['estado'][i].id_cat_estado+' data-nombre="'+data['estado'][i].nombre+'" selected>'+data['estado'][i].nombre+'</option>';                                                                                                     					  
					else  
					  html += '<option value='+data['estado'][i].id_cat_estado+' data-nombre="'+data['estado'][i].nombre+'">'+data['estado'][i].nombre+'</option>';                   
				}    
			
			$('#id_cat_estado').html(html);			
			
		}
	});
}


$('#file_1').on('change',function(){
	//get the file name
	var fileName = $(this).val();
	//replace the "Choose a file" label
	$(this).next('.custom-file-label').html(fileName.replace(/^.*[\\\/]/, ''));	
})		

$('#file_promo_1').on('change',function(){
	//get the file name
	var fileName = $(this).val();
	//replace the "Choose a file" label
	$(this).next('.custom-file-label').html(fileName.replace(/^.*[\\\/]/, ''));	
})		

$('#file_business_card').on('change',function(){	
	//get the file name
	var fileName = $(this).val();
	//replace the "Choose a file" label
	$(this).next('.custom-file-label').html(fileName.replace(/^.*[\\\/]/, ''));	
})		


function validate(evt) {
	var theEvent = evt || window.event;
  
	// Handle paste
	if (theEvent.type === 'paste') {
		key = event.clipboardData.getData('text/plain');
	} else {
	// Handle key press
		var key = theEvent.keyCode || theEvent.which;
		key = String.fromCharCode(key);
	}
	var regex = /[0-9]|\./;
	if( !regex.test(key) ) {
	  theEvent.returnValue = false;
	  if(theEvent.preventDefault) theEvent.preventDefault();
	}
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

	function loadPagination(pagno)
	{	
		let method_pagination = 'CAltaProfesional/loadRecord';
		var post_url = baseUrl+method_pagination;
			
		var id_cat_profesional=$( "#id_cat_profesional" ).val();
					
		$.ajax({
		url: post_url,
		type: 'POST',
		dataType: 'json',
		data : {"pagno":pagno,
				"id_cat_profesional":id_cat_profesional
				}, 			
		success: function(response)
		{ 
			$('#pagination').html(response.links);
			createTable(response.publicaciones,response.row);		 			
		}
		});

	} 

	function loadPagination_preguntas(pagno,id_cat_profesion)
{	
	var id_cat_profesional=$('#id_cat_profesional').val();	
	let method_pagination = 'CAltaProfesional/loadRecord_preguntas';
	var post_url = baseUrl+method_pagination;
    
	$.ajax({
	url: post_url,
	type: 'POST',
	dataType: 'json',
	data : {"pagno":pagno,"id_cat_profesional":id_cat_profesional,"id_cat_profesion":id_cat_profesion}, 			
	success: function(response)
	{   
		$('#pagination').html(response.links);
		createTable_preguntas(response.preguntas,response.row);		 			
	}
	});
} 

	function createTable(result,sno)
	{     
		sno = Number(sno);
		$('#tbody_publicaciones').empty();
		html="";
		for(index in result)
		{  	
			html+="<div class='row'>"+
					"<div class='col-md-12'>"+
					"<a href='#' onclick='editarPublicacion("+result[index].id_cat_publicacion+"); return false;'>"+ 
						 "<div class='row' style='color: #2e9ff4;'>"+
								"<div class='col-md-5' style='text-align: left;'>"+
								"<h5 style='color: #4e4e4e;'>"+"<strong>No de publicacion:</strong></h5>"+						
									+result[index].id_cat_publicacion+
								"</div>"+
								"<div class='col-md-5' style='text-align: left;'>"+
								"<h5 style='color: #4e4e4e;'><strong>Título:</strong></h5>"								
									+result[index].titulo+								
								"</div>"+
							"<div class='col-md-2 float-right' style='text-align: right;'>"+
							"<button data-repeater-delete='' class='btn btn-danger waves-effect waves-light' id='button_delete_precio' type='button' onclick='deletePublicacion("+result[index].id_cat_publicacion+"); return false;'>"+                                                          
								"<i class='ti-close'></i>"+                                                        
							"</button>"+                                                                                                                
							"</div>"+
						"</div>"+
						"<div class='row' style='color: #2e9ff4;'>"+
							"<div class='col-md-12' style='text-align: justify;'>"+
							"<h5  style='color: #4e4e4e;'>"+"<strong>Resumen de la Publicacion:</strong></h5>"
							+"<textarea readonly rows='4' style='min-width: 100%; border:none; color: #2e9ff4; font-weight: lighter; font-family: serif Arial;'>"+result[index].resumen+"</textarea>"+
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
							"<div class='col-md-4'>"+
								"<a href='#' onclick='ContestarPregunta("+result[index].id_cat_pregunta+",\""+result[index].pregunta+"\");'  >"+                   
									"<span data-toggle='tooltip' data-placement='top' title='Responde a un Usuario'>"+                   
									"Responder"+                   
									"</span>"+                   
								"</a>"+                     
							"</div>"+


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
									"<a href='"+baseUrl+"CProfesional/index/"+result[index].id_cat_profesional+"' target='_self'>"+        
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

	function deletePublicacion(id_cat_publicacion)
	{
		let method_delete_publicacion = 'CAltaProfesional/delete_publicacion';
		var post_url = baseUrl+method_delete_publicacion
	
		var id_cat_profesional=$( "#id_cat_profesional" ).val();		
	
		$.ajax({
			type: "POST",   
			dataType:'json',       
			data : {"id_cat_profesional":id_cat_profesional,"id_cat_publicacion":id_cat_publicacion}, 			  
			url: post_url,                          
			success: function(data){                                										
				
				Swal.fire({
					title: 'Publicación eliminada con exitó!',                        
				}).then((result) => {
					loadPagination(0);
				})	
			}
		});		
	
	}
	function savePublicacion(id_cat_publicacion)
	{
		$("#btn_save_edit_publicacion").html("Guardar");
		$('#id_cat_publicacion').val("-1");
		$('#titulo').val("");
		$('#resumen').val("");
		$('#publicacion').val("");				

		$('#Modal_Add').modal('show');
	}

	function editarPublicacion(id_cat_publicacion)
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
				$("#btn_save_edit_publicacion").html("editar");
				

				$('#Modal_Add').modal('show');
			}
		});

		
	}

	$("#form_save_update_publicacion").on("submit", function(){ 			
		var id_cat_publicacion = $('#id_cat_publicacion').val();
		var id_cat_profesional = $('#id_cat_profesional').val();

		var titulo = $('#titulo').val();
		var resumen = $('#resumen').val();
		var publicacion = $('#publicacion').val();

		var formData = new FormData();

		formData.append("id_cat_publicacion", id_cat_publicacion);
		formData.append("id_cat_profesional", id_cat_profesional);
		formData.append("titulo", titulo);
		formData.append("resumen", resumen);
		formData.append("publicacion", publicacion);
	
				       
		let method_data_save = 'CAltaProfesional/save_update_publicacion';
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
				$('#titulo').val("");
				$('#resumen').val("");
                $('#publicacion').val("");				
				$('#Modal_Add').modal('hide');

				Swal.fire({
					title: 'Actualización realizada con exitó!',                        
				}).then((result) => {
					loadPagination(0);
				})	
			}
		});
		

		 return false;
		
	});		

	function ContestarPregunta(id_cat_pregunta,pregunta)
	{
		$("#btn_save_edit_respuesta").html("Guardar");		
		$('#pregunta').val(pregunta);
		$('#id_cat_pregunta').val(id_cat_pregunta);
		$('#respuesta').val("");		

		
		$('#Modal_Add_Respuesta').modal('show');
	}

	$("#form_save_update_respuesta").on("submit", function(){ 			
		var id_cat_profesional=$( "#id_cat_profesional" ).val();		
		var id_cat_pregunta = $('#id_cat_pregunta').val();			
		var pregunta = $('#pregunta').val();			
		var id_cat_respuesta = $('#id_cat_respuesta').val();			
		var respuesta = $('#respuesta').val();
		
		var formData = new FormData();

		formData.append("id_cat_profesional", id_cat_profesional);				
		formData.append("id_cat_pregunta", id_cat_pregunta);
		formData.append("pregunta", pregunta);
		formData.append("id_cat_respuesta", id_cat_respuesta);		
		formData.append("respuesta", respuesta);


				       
		let method_data_save = 'CAltaProfesional/save_update_respuesta';
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
				$('#Modal_Add_Respuesta').modal('hide');

				Swal.fire({
					title: 'Actualización realizada con exitó!',                        
				}).then((result) => {
					loadPagination_preguntas(0,$( "#id_cat_profesion" ).val());					
				})
			}
		});
		

		 return false;
		
	});	
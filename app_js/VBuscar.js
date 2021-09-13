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
	
	let method = 'CBuscar/Profesiones?';
  	let criterios = {d:'1'};
  	
  	asyncGetReq(criterios, baseUrl + method).then(data => { //Funcion callback``
    
	if (data['profesiones']) 
		{  
			
	        var id_cat_profesion_temp=$( "#id_cat_profesion_temp" ).val();
			
			var html = "<option value=''>Profesional</option>";                
			for (let i in data['profesiones']) 
				{ 

					if (data['profesiones'][i].id_cat_profesion==id_cat_profesion_temp)                                                  
					  html += '<option value='+data['profesiones'][i].id_cat_profesion+'  selected>'+data['profesiones'][i].nombre+'</option>';                   
					else 
					  html += '<option value='+data['profesiones'][i].id_cat_profesion+'  >'+data['profesiones'][i].nombre+'</option>';                   
				}    
			
			$('#id_cat_profesion').html(html);                

			//*****************************************************      
			
			var id_cat_estado_temp=$( "#id_cat_estado_temp" ).val();

			let method_estados = 'CBuscar/Estados';
			var post_url = baseUrl+method_estados
			$.ajax({
				type: "POST",   
				dataType:'json',         
				url: post_url,                          
				success: function(data){                                
					var html = "<option value=''>Selecciona Estado</option>";                
					for (let i in data['estados']) 
						{ 
							if (data['estados'][i].id_cat_estado==id_cat_estado_temp)                                                  
							  html += '<option value='+data['estados'][i].id_cat_estado+' selected>'+data['estados'][i].nombre+'</option>';                   
							else 
							  html += '<option value='+data['estados'][i].id_cat_estado+'>'+data['estados'][i].nombre+'</option>';                     
						}    
					
					$('#id_cat_estado').html(html);
					
					
				}
			}); 
			//*****************************************************     
			
		}	

        loadPagination(0);  
  
  		desbloqueaPantalla();
  }).catch(e => { console.error(e); desbloqueaPantalla();});
  
  
   desbloqueaPantalla(); 

});


// Detect pagination click
$('#pagination').on('click','a',function(e){
	e.preventDefault(); 
	var pageno = $(this).attr('data-ci-pagination-page');	
	loadPagination(pageno);			
  });


function loadPagination(pagno)
{	
	let method_pagination = 'CBuscar/loadRecord';
	var post_url = baseUrl+method_pagination;
	
	var filtrar=$( "#filtrar" ).val();
	var id_cat_estado=$( "#id_cat_estado" ).val();
	var id_cat_profesion=$( "#id_cat_profesion" ).val();
		
	$.ajax({
	  url: post_url,
	  type: 'POST',
	  dataType: 'json',
	  data : {"pagno":pagno,
			  "filtrar":filtrar,
			  "id_cat_estado":id_cat_estado,
			  "id_cat_profesion":id_cat_profesion
			 }, 			
	  success: function(response)
	  {  
		 $('#pagination').html(response.links);
		 createTable(response.profesionistas,response.row);		 
	  }
	});

}  

function createTable(result,sno)
{   
	sno = Number(sno);
	$('#tbody_profesionistas').empty();
	html="";
	for(index in result)
	{  		
<<<<<<< HEAD

=======
		
>>>>>>> ac08ebb8f27160be318a5a6b78bbcc6c54473e4e
		if(index % 3 == 0) html+="<div class='row d-flex justify-content-center'>";          	 
		
		/*html+= "<div class='col-lg-3'>"+                
					"<div class='card'>"+
						"<div class='container'>"+
							"<div class='container-fluid  py-0 pt-2'>"+
								"<div class='row'>"+
									"<div class='col-6' style='text-align: right;'>"+
										"<img src='"+baseUrl+"assets/images/profesionales/"+result[index].imagen+"' style='height: 100px; width: 100px;' class='card-img-top' alt='...'>"+
									"</div>"+
									"<div class='col-6 pl-2' style='text-align: left;'>"+
										"<div class='container'>"+
											"<div class='container-fluid'>"+
												"<div class='row'><strong>"+result[index].profesionista+" </strong></div>"+
												"<div class='row'><strong> "+result[index].profesion+"</strong></div>"+
												"<div class='row'><small> Especialidad  - "+result[index].especialidad+"</small></div>"+                                      
												"<div class='row'><small> Precio consulta - $"+result[index].costo_consulta+"</small></div>"+                                     
											"</div>"+
										"</div>"+
									"</div>"+
								"</div>"+
							"</div>"+
						"</div>"+
					
						"<div class='card-body'>"+
							"<p class='card-text'>"+
								""+result[index].descripcion+".<br>"+   
								"<img src='imagenes/camera_icon.png' style='width: 20px; height: 20px;'>  Ofrece asesoria y consulta vistual"+
							"</p>"+
						"</div>"+

						"<div class='card-footer'>"+							
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
				"</div>";*/
				/**************************************************************************************************************************************/
<<<<<<< HEAD
//console.log(result[index].imagen);
	
=======
>>>>>>> ac08ebb8f27160be318a5a6b78bbcc6c54473e4e
		html+= 	"<div class='col-lg-3'>"+
				"<div class='image-flip' ontouchstart='this.classList.toggle('hover')+'>"+
					"<div class='mainflip'>"+
			
						"<div class='frontside'>"+
							"<div class='card'>"+
<<<<<<< HEAD
								"<div class='card-body text-center'>";
									if (result[index].imagen == null)
										html+=  "<p><img class=' img-fluid' src='"+baseUrl+"assets/images/profesionales/usuario"+ Math.floor((Math.random() * 3) + 1) +".png' alt='card image'></p>";
									else
										html+=  "<p><img class=' img-fluid' src='"+baseUrl+"assets/images/profesionales/"+result[index].imagen+"' alt='card image'></p>";
								
									html+=  "<h4 class='card-title'>"+result[index].profesionista+"</h4>"+
=======
								"<div class='card-body text-center'>"+
									"<p><img class=' img-fluid' src='"+baseUrl+"assets/images/profesionales/"+result[index].imagen+"' alt='card image'></p>"+
									"<h4 class='card-title'>"+result[index].profesionista+"</h4>"+
>>>>>>> ac08ebb8f27160be318a5a6b78bbcc6c54473e4e
									"<p class='card-text'>"+
										"<strong> "+result[index].profesion+"</strong><br>"+
										"<small> Especialidad  - "+result[index].especialidad+"</small><br>"+
										"<small> Cedula Profesional  - 123123123123</small>"+
									"</p>"+
									//"<p class='card-text' style='color: #007b5e+'> <small> ☆☆☆☆☆ 4/5 / 250 valoraciones </small></p>"+									
<<<<<<< HEAD
									//"<div class='card-footer'>"+							

									"<div style='background-color: #eeeeee;'>"+	
									
=======

									"<div class='card-footer'>"+							
>>>>>>> ac08ebb8f27160be318a5a6b78bbcc6c54473e4e
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
			if((index+1) % 3 == 0)  html+="</div>";     				
			
		//**************************************************************************************************************************************

		
		
		/*
		let method_cita = 'CBuscar/Citas';
		var post_url = baseUrl+method_cita;
				
		var id_cat_profesional=result[index].id_cat_profesional;
					
		$.ajax({
			url: post_url,
			type: 'POST',
			dataType: 'json',
			data : {"id_cat_profesional":id_cat_profesional}, 			
			success: function(data)
			{   
				if(typeof(data['citas'][0]) != 'undefined' )
				{ 
					//console.log(data["citas"]);	    			
					
					$("#calendar_"+index).fullCalendar({
						defaultView: 'agendaWeek',
						height: 400,
						events: [],				  
						timeFormat: 'H(:mm)' // uppercase H for 24-hour clock
					});

					let Events=[];
					var len = data.length;
					var range={};
					for (let i in data['citas']) 
					{
						var title=data["citas"][i].asunto;
						var start=data["citas"][i].start;
						var end=data["citas"][i].end;					  
						var className= data["citas"][i].color
						
						var event={title: title,start:start,end:end,className:className};
						$("#calendar_"+index).fullCalendar('renderEvent', event,true);   
					}
					
				}
			}
		});*/
		//***********************************************************************************************
	} 
	if((index+1) % 3 != 0) html+="</div>";     				
	$('#tbody_profesionistas').append(html);   				
				

}

$('#filtrar').keyup(function () {	
  filtar();	
})

$( "#id_cat_estado").change(function() {		
	filtar();	
});

$( "#id_cat_profesion").change(function() {		
	filtar();	
});

function filtar()
{		
	let method_pagination = 'CBuscar/loadRecord';
	var post_url = baseUrl+method_pagination	

	var pagno=0;	
	var filtrar=$( "#filtrar" ).val();
	
	
	var id_cat_estado=$( "#id_cat_estado" ).val();
	var id_cat_profesion=$( "#id_cat_profesion" ).val();
		
	$.ajax({
	  url: post_url,
	  type: 'POST',
	  dataType: 'json',
	  data : {"pagno":pagno,
			  "filtrar":filtrar,
			  "id_cat_estado":id_cat_estado,
			  "id_cat_profesion":id_cat_profesion
			 }, 			
	  success: function(response)
	  {
		 console.log(response) ;
		 $('#pagination').html(response.links);
		 createTable(response.profesionistas,response.row);		 
	  }
	});
}





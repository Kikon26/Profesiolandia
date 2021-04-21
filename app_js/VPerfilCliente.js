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
		
		$('#mpio').val(data['usuario'][0].municipio);		
		$('#colonia').val(data['usuario'][0].colonia);		
		$('#calle').val(data['usuario'][0].calle);		
		$('#cp').val(data['usuario'][0].cp);		
		$('#num').val(data['usuario'][0].num);		
		$('#telefono').val(data['usuario'][0].tel);	


        $("#imagen_perfil").attr('data-nombre',data['usuario'][0].imagen);
        $("#imagen_perfil").attr('src',baseUrl+"assets/images/users/"+data['usuario'][0].imagen);
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
		var password = $('#password').val();		
		
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

            if( $("#imagen_perfil").attr("data-nombre")!="" )
				{
					var imagen_perfil = $("#imagen_perfil").attr("data-nombre");							
					formData.append("imagen_perfil", imagen_perfil);
				}
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
					title: 'El registro ha sido creado!',                        
				}).then((result) => {
					
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

function createTable(result,sno)
{
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
									"<div class='card-body text-center'>"+
										"<p><img class=' img-fluid' src='"+baseUrl+"assets/images/profesionales/"+result[index].imagen+"' alt='card image'></p>"+
										"<h4 class='card-title'>"+result[index].profesionista+"</h4>"+
										"<p class='card-text'>"+
											"<strong> "+result[index].profesion+"</strong><br>"+
											"<small> Especialidad  - "+result[index].especialidad+"</small><br>"+
											"<small> Cedula Profesional  - 123123123123</small>"+
										"</p>"+
										//"<p class='card-text' style='color: #007b5e+'> <small> ☆☆☆☆☆ 4/5 / 250 valoraciones </small></p>"+									

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
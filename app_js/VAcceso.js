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
		
	
	/*let method = 'CInicio/Profesiones?';
  	let criterios = {d:'1'};
  	
  	asyncGetReq(criterios, baseUrl + method).then(data => { //Funcion callback``
    


  
  		desbloqueaPantalla();
  }).catch(e => { console.error(e); desbloqueaPantalla();});*/
  
   desbloqueaPantalla(); 

});


$( "#txtUsuario" ).blur(function() {
	//alert( "Handler for .blur() called." );
	var email = $('#txtUsuario').val();		
	
    if(email!="")
    {
        var formData = new FormData();
        
        formData.append("email", email);
                
        let method_data_save = 'CRegistro/verificar_existe_email';
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
                //console.log(data['existe'][0]);
                if (data['existe'][0].existe=="0")			
                {
                    
                    Swal.fire({					
                        title: 'El email no existe!, verifique que sea correcto!'                        
                        
                    }).then((result) => {
                        $('#email').focus();									
                    })				
                    
                    
                }			
            }
        });
    }    

  });


  $("#form_login").on("submit", function(){ 			
    //console.log("aaaa");
    
    var txtUsuario = $('#txtUsuario').val();
    var txtPassw = $('#txtPassw').val();
   

    var formData = new FormData();
    formData.append("txtUsuario", txtUsuario);
    formData.append("txtPassw", txtPassw);
    
                   
    let method_validar = 'CAcceso/validar';
    var post_url = baseUrl+method_validar 
    
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
            console.log(data);
            if(data['valida']==1)
              location.href=baseUrl + "CAcceso/principal";
            else 
              $('#xMensaje').html('Los datos son incorrectos, verifiquelos...');//console.log("no");
            
        }
    });
    

     return false;
    
});		
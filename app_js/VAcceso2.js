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


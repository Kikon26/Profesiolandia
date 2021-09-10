<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Util 
{  

public static function geturl($url="http://gestion.morelia.gob.mx:81/CatalogoOficial/webservice/crearSesionUsuario?usuario=sergio&perfil=12") { 
        $ch = curl_init(); 

        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE); 
        curl_setopt($ch, CURLOPT_HEADER, 0); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);  

        $data = curl_exec($ch); 
        curl_close($ch); 

        return $data; 
    } 
     
} 


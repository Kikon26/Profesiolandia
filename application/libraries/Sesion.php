<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesion 
{ 
   
  public static function abrir() 
{ 
    session_start(); 
  } 
   
  public static function destruye() 
{ 
    session_destroy(); 
  } 
   
  public static function establecer($nombreSesion='', $valor='') 
{ 
    $_SESSION[$nombreSesion] = $valor; 
  }  

  public static function obtener($nombreSesion='') 
{ 
    return isset($_SESSION[$nombreSesion]) ? $_SESSION[$nombreSesion] : false; 
  } 
   
} 
?> 

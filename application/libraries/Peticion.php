<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peticion
{


  public function eliminarcaracteres($variable){
    $setStr="";
    $setStr =  str_replace ( "`" , "" , $variable ) ;
    $setStr =  str_replace ( "'" , "" , $setStr ) ;
    $setStr =  str_replace ( ";" , "" , $setStr ) ;
    //$setStr =  str_replace ( "%" , "" , $setStr ) ;
    //$setStr =  str_replace ( "_" , "" , $setStr ) ;
    $setStr =  str_replace ( "á" , "a" , $setStr ) ;
    $setStr =  str_replace ( "é" , "e" , $setStr ) ;
    $setStr =  str_replace ( "í" , "i" , $setStr ) ;
    $setStr =  str_replace ( "ó" , "o" , $setStr ) ;
    $setStr =  str_replace ( "ú" , "u" , $setStr ) ;

    return $setStr;
  }


  public static function obtener($peticion)
    {
    if (isset($_POST[$peticion])) return (urldecode($_POST[$peticion])) ;
    if (isset($_GET[$peticion])) return (urldecode($_GET[$peticion]));
    return '';
  }

  public static function marcar($textobase,$criterios){
    $palabras = explode(",",$criterios);
    $setStr="";
    foreach ($palabras as $item) {
      $item=explode ( "%" , $item );
      foreach ($item as $it) {
        $textobase= str_replace(strtoupper($it),'<span class="marcar">'.strtoupper($it).'</span>',$textobase);
      }
      
    }
    return $textobase;
  }


}
?>
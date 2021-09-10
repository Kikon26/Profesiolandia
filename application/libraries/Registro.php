<?php 
class Registro
{
    
	function __construct(){
        //parent::__construct();
    }
	
    public static function escribirLog($datos=array('usuario' => '', 'mensaje' => '', 'tipo' => ''))
	{
		switch ($datos['tipo']) {
			case 'error':
				$file = fopen(LOG . 'LogErrores '. date('Y-m-d') . ' ' . $datos['usuario'] . '.txt', 'a+'); 
				fwrite($file, 'Fecha: ' . date('d-m-Y H:i:s') . ' Usuario: ' . $datos['usuario'] . ' Error: ' . $datos['mensaje'] . PHP_EOL);
                                fclose($file); 
			break;
			case 'ejecucion':
			    //echo LOG . 'LogEjecuciones' . date('Y-m-d') . '.txt';
				$file = fopen(LOG . 'LogEjecuciones '. date('Y-m-d') . ' ' . $datos['usuario'] . '.txt', 'a+'); 
                                fwrite($file, 'Fecha: ' . date('d-m-Y H:i:s') . ' Usuario: ' . $datos['usuario'] . ' Instruccion: ' . $datos['mensaje'] . PHP_EOL);
                                fclose($file);
			break;
		}
    }
	
}
?>

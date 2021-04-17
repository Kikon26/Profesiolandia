<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Controller_menu extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_menu');
    }

    public function index(){

        $padre = $this->model_menu->index();
        $tabla = $padre['tabla'];
        foreach ($tabla as $key => $value) {
            $tabla[$key]=(array) $tabla[$key];
            //$hijos = $this->model_menu->hijos(array('IdOpcion'=>$value->IdPermiso))['tabla'];
            $hijos = $this->model_menu->hijos(array('padre'=>$value->idMenu))['tabla'];
            foreach ($hijos as $key2 => $value) {
                $hijos[$key2]=(array) $value;
            }
            $tabla[$key]['hijos']=$hijos;
        }
        //var_dump($tabla);

        $data = array(
            'seccion' => '',
            'vista' => 'view_principal',
            'menu' => $tabla
        );
         
		$this->load->view('mp/pagina',$data);
        
		//$this->load->view('view_principal',$data);
    }

}

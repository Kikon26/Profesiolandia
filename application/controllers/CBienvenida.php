<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CBienvenida extends CI_Controller {
	function __construct()
	{
		parent::__construct();	
		date_default_timezone_set('America/Mexico_City');			
		$this->load->library('util');
		$this->load->library('sesion');
		$this->load->library('peticion');
		
		$this->load->model('MBienvenida');
		$this->load->model('MMenu');
    }
    public function index($enviado,$nombre){
		if (isset($this->session->gIdPerfil)) $tabla = $this->MMenu->MenuRol($this->session->gIdPerfil);		 
		else 								  $tabla = $this->MMenu->MenuRol(4);		

		$dataf = array(
			'enviado'  => $enviado,
			'nombre'  => $nombre
		);

        $data = array(
            'seccion' => 'bienvenida',
			'vista' => 'VBienvenida',
			'data' => '',
			'dataf' => $dataf,			
			'menu' => $tabla
         );
       
		$this->load->view('mp/pagina_principal',$data);
	}
	

	

}





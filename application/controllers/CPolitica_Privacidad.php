<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CPolitica_Privacidad extends CI_Controller {
	function __construct()
	{
		parent::__construct();	
		date_default_timezone_set('America/Mexico_City');			
		$this->load->library('util');
		$this->load->library('sesion');
		$this->load->library('peticion');
		
		$this->load->model('MPolitica_Privacidad');
		$this->load->model('MMenu');
    }
    public function index(){
		if (isset($this->session->gIdPerfil)) 
		 {
			 $tabla = $this->MMenu->MenuRol($this->session->gIdPerfil);

		 }
		else 								  
			$tabla = $this->MMenu->MenuRol(4);		



        $data = array(
            'seccion' => 'politica_privacidad',
			'vista' => 'VPolitica_Privacidad',
			'data' => '',
			'dataf' => '',
			'menu' => $tabla
         );
       
		$this->load->view('mp/pagina_principal',$data);
	}

	public function Usuario(){
		$resultado['usuario'] = $this->MPolitica_Privacidad->DetalleUsuario($this->input->get('id_cat_usuario'));				
		echo json_encode($resultado);
	}

	

}





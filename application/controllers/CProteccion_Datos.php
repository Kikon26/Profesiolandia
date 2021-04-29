<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CProteccion_Datos extends CI_Controller {
	function __construct()
	{
		parent::__construct();	
		date_default_timezone_set('America/Mexico_City');			
		$this->load->library('util');
		$this->load->library('sesion');
		$this->load->library('peticion');
		
		$this->load->model('MProteccion_Datos');
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
            'seccion' => 'Proteccion_Datos',
			'vista' => 'VProteccion_Datos',
			'data' => '',
			'dataf' => '',
			'menu' => $tabla
         );
       
		$this->load->view('mp/pagina_principal',$data);
	}

	public function Usuario(){
		$resultado['usuario'] = $this->MProteccion_Datos->DetalleUsuario($this->input->get('id_cat_usuario'));				
		echo json_encode($resultado);
	}

	

}





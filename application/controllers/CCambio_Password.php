<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CCambio_Password extends CI_Controller {
	function __construct()
	{
		parent::__construct();	
		date_default_timezone_set('America/Mexico_City');			
		$this->load->library('util');
		$this->load->library('sesion');
		$this->load->library('peticion');
		
		$this->load->model('MCambio_Password');		
		$this->load->model('MMenu');
    }

    public function index(){
		if (isset($this->session->gIdPerfil)) $tabla = $this->MMenu->MenuRol($this->session->gIdPerfil);
		else 								  $tabla = $this->MMenu->MenuRol(4);		

		$id_cat_rol = $this->uri->segment(3);
		$id_usuario_profesional =  $this->uri->segment(4);        
		$code = $this->uri->segment(5);
	
		// obtener los detalles del usuario
		$user = $this->MCambio_Password->GetUser($id_cat_rol,$id_usuario_profesional);		
		
		if($user['code'] == $code)
		{
			$dataf = array(			
				'id_cat_rol'  => $user['id_cat_rol'],
				'id_usuario_profesional' => $id_usuario_profesional		
			);
				
			$data = array(
				'seccion' => 'Cambio_Password',
				'vista' => 'VCambio_Password',
				'data' => '',
				'dataf' => $dataf,
				'menu' => $tabla
			);
		
			$this->load->view('mp/pagina_principal',$data);	        
		}
		else 
			redirect('/');
	}

	public function update_password()
	{
		$resultado['update']=$this->MCambio_Password->update_password();                
		echo json_encode($resultado);
	}
}





<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CRegistro extends CI_Controller {
	function __construct()
	{
		parent::__construct();	
		date_default_timezone_set('America/Mexico_City');			
		$this->load->library('util');
		$this->load->library('sesion');
		$this->load->library('peticion');
		
		$this->load->model('MRegistro');
		$this->load->model('MMenu');
    }
    public function index(){
		if (isset($this->session->gIdPerfil)) $tabla = $this->MMenu->MenuRol($this->session->gIdPerfil);
		else 								  $tabla = $this->MMenu->MenuRol(4);		
        $data = array(
            'seccion' => 'Registro',
			'vista' => 'VRegistro',
			'data' => '',
			'dataf' => '',
			'menu' => $tabla
         );
       
		$this->load->view('mp/pagina_principal',$data);
	}

	public function save(){				
		$resultado['save']=$this->MRegistro->save_usuario();                
		echo json_encode($resultado);	
    }
  	
	public function rol(){
		$resultado['rol'] = $this->MRegistro->CatalogoRoles();				
		echo json_encode($resultado);
	}
}





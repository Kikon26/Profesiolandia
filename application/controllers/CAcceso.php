<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CAcceso extends CI_Controller {

	function __construct()
	{
		/*parent::__construct();
		
		$this->load->model('MUsuarios');
		$this->load->model('MProfesionales');
		$this->load->model('MMenu');
		*/	
		
		parent::__construct();	
		date_default_timezone_set('America/Mexico_City');	
		$this->load->library('util');
		$this->load->library('sesion');
		$this->load->library("pagination");
		$this->load->library('peticion');
		
		$this->load->model('MUsuarios');
		$this->load->model('MProfesionales');
		$this->load->model('MMenu');
	}

	
	public function index()
	{
		$this->session->sess_destroy();	
		
		/*
		$data = array(
			'tUsua'=>'',
            'xMensaje' => ''            
		);				
		$this->load->view('VAcceso',$data);
		*/

		/**************/
		$tabla = $this->MMenu->MenuRol(4);		
        $data = array(
            'seccion' => 'acceso',
			'vista' => 'VAcceso2',
			'data' => '',
			'dataf' => '',
			'menu' => $tabla,

			'tUsua'=>'',
            'xMensaje' => ''
         );
       
		$this->load->view('mp/pagina_principal',$data);
		
	}

	public function validar()
	{
		$valida=0;

		$xUsua = $this->input->post('txtUsuario');
		$xPass = $this->input->post('txtPassw');
		
        
		$valida= $this->MUsuarios->validaUsuario($xUsua,$xPass);
		$valida2= $this->MProfesionales->validaUsuario($xUsua,$xPass);
		

		if ($valida)
		{   
			$this->session->set_userdata('sisdato', $valida);
			generaDatosSession();
			$this->principal();	
		}
		else if ($valida2)
		{   
			$this->session->set_userdata('sisdato', $valida2);
			generaDatosSession2();
			$this->principal();	
		}
		else
		{
			$data = array(
			'tUsua'=> $xUsua,
            'xMensaje' => 'Los datos de Validacion son incorrectos, verifiquelos...'
            );

			//$this->load->view('VAcceso2',$data);
			$this->index();
		}

	}


	public function principal()
	{
	$tabla = $this->MMenu->MenuRol($this->session->gIdPerfil);
	$parametros="";
		$data = array(
			'seccion' => 'principal',
			//'vista' => 'view_principal',
			'vista' => 'VInicio',
			'menu' => $tabla,
			'usuario' => $parametros,
			'dataf' => '',
			'data'=>'',
		);							

		//$this->load->view('mp/pagina',$data);		
		$this->load->view('mp/pagina_principal',$data);		
	}

	

}

?>
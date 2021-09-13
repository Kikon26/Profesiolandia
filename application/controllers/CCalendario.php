<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CCalendario extends CI_Controller {
	function __construct()
	{
		parent::__construct();	
		date_default_timezone_set('America/Mexico_City');	
		$this->load->library('util');
		$this->load->library('sesion');
		$this->load->library('peticion');
		
		$this->load->model('MCalendario');
		$this->load->model('MMenu');
    }
    public function index(){
		$tabla = $this->MMenu->MenuRol($this->session->gIdPerfil);
        $data = array(
            'seccion' => 'calendario',
			'vista' => 'VCalendario',
			'data' => '',
			'dataf' => '',
			'menu' => $tabla
         );
       
		$this->load->view('mp/pagina_principal',$data);
	}
	
	public function listado(){
		$resultado['profesionales'] = $this->MCalendario->ListadoProfesionales();				
		echo json_encode($resultado);
	}

	public function Clientes(){
		$resultado['clientes'] = $this->MCalendario->ListadoClientes();				
		echo json_encode($resultado);
	}

	public function save(){		
		$resultado['id_cat_cita']=$this->MCalendario->save_reservation();                
	    echo json_encode($resultado);
	}
	
	public function Citas(){
		$resultado['citas'] = $this->MCalendario->ConsultaCitasProfesional();						
		echo json_encode($resultado);
	}

	public function detalle_cita(){
		$resultado['detalle_cita'] = $this->MCalendario->DetalleCita();				
		echo json_encode($resultado);
	}

	public function get_horario_atencion(){
		$resultado['horario_atencion'] = $this->MCalendario->get_horario_atencion();						
		echo json_encode($resultado);
	}

	public function delete(){		
		$resultado['id_cat_cita']=$this->MCalendario->delete_reservation();                
	    echo json_encode($resultado);
	}

	public function get_dias_atencion(){
		$resultado['get_dias_atencion'] = $this->MCalendario->get_dias_atencion();						
		echo json_encode($resultado);
	}
	

}





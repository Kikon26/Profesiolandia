<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CProfesional extends CI_Controller {
	function __construct()
	{
		parent::__construct();	
		date_default_timezone_set('America/Mexico_City');	
		$this->load->library('util');
		$this->load->library('sesion');		
		$this->load->library("pagination");
		$this->load->library('peticion');
		
		$this->load->model('MProfesional');
		$this->load->model('MAltaProfesional');
		$this->load->model('MMenu');
    }
    public function index($id_cat_profesional){
		if (isset($this->session->gIdPerfil)) $tabla = $this->MMenu->MenuRol($this->session->gIdPerfil);
		else 								  $tabla = $this->MMenu->MenuRol(4);		
		
		$dataf = array(
			'id_cat_profesional'  => $id_cat_profesional			
		);
			
		$data = array(
            'seccion' => 'profesional',
			'vista' => 'VProfesional',
			'data' => '',
			'dataf' => $dataf,
			'menu' => $tabla
         );
       
		$this->load->view('mp/pagina_principal',$data);
	}
	
	public function Profesional(){
		Sesion::establecer('id_cat_profesional',$this->input->get('id_cat_profesional'));		

		$resultado['profesional'] = $this->MProfesional->DetalleProfesional($this->input->get('id_cat_profesional'));				
		echo json_encode($resultado);
	}

	public function precios_vigentes(){
		$resultado['precio'] = $this->MProfesional->CatalogoPreciosVigentes();				
		echo json_encode($resultado);
	}

	public function horario_atencion(){
		$resultado['horario_atencion'] = $this->MProfesional->CatalogoHorarioAtencion();				
		echo json_encode($resultado);
	}

	public function direccion_tel(){
		$resultado['direccion_tel'] = $this->MProfesional->CatalogoDireccionTel();				
		echo json_encode($resultado);
	}

	public function redes_sociales(){
		$resultado['redes_sociales'] = $this->MProfesional->RedesSociales();				
		echo json_encode($resultado);
	}

	public function checar_favorito(){
		$resultado['favorito'] = $this->MProfesional->ChecarFavorito();				
		echo json_encode($resultado);
	}
	
	public function UpdateFavorito(){
		$resultado['update_favorito'] = $this->MProfesional->UpdateFavorito();				
		echo json_encode($resultado);
	}

}





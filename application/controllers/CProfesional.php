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
		$this->load->model('MCalendario');
		$this->load->model('MMenu');
		
		$this->load->model('MPerfilCliente');
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

		$resultado['profesional'] = $this->MProfesional->DetalleProfesional($this->input->get('id_cat_profesional') );				
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

	public function publicaciones(){
		$resultado['publicaciones'] = $this->MProfesional->CatalogoPublicaciones();				
		echo json_encode($resultado);
	}

	public function save_update_valoracion(){
		$resultado['save_update'] = $this->MProfesional->save_update_valoracion();				
		echo json_encode($resultado);
	}

	public function get_valoracion(){
		$resultado['valoracion'] = $this->MProfesional->get_valoracion();				
		echo json_encode($resultado);
	}

	public function get_valoracion_gral(){
		$resultado['valoraciones'] = $this->MProfesional->get_valoracion_gral();				
		echo json_encode($resultado);
	}

	public function opiniones_positivas(){
		$resultado['opiniones_positivas'] = $this->MProfesional->get_opiniones_positivas();				
		echo json_encode($resultado);
	}

	public function opiniones_negativas(){
		$resultado['opiniones_negativas'] = $this->MProfesional->get_opiniones_negativas();				
		echo json_encode($resultado);
	}

	public function opiniones_neutras(){
		$resultado['opiniones_neutras'] = $this->MProfesional->get_opiniones_neutras();				
		echo json_encode($resultado);
	}

	public function opiniones_todas(){
		$resultado['opiniones_todas'] = $this->MProfesional->get_opiniones_todas();				
		echo json_encode($resultado);
	}
	

}





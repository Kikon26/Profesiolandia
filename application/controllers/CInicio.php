<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CInicio extends CI_Controller {
	function __construct()
	{
		parent::__construct();	
		date_default_timezone_set('America/Mexico_City');	
		$this->load->library('util');
		$this->load->library('sesion');
		$this->load->library("pagination");
		$this->load->library('peticion');
		
		$this->load->model('MInicio');
		$this->load->model('MMenu');
    }
    public function index(){
		if (isset($this->session->gIdPerfil)) $tabla = $this->MMenu->MenuRol($this->session->gIdPerfil);
		else 								  $tabla = $this->MMenu->MenuRol(4);		
        $data = array(
            'seccion' => 'inicio',
			'vista' => 'VInicio',
			'data' => '',
			'dataf' => '',
			'menu' => $tabla
         );
       
		$this->load->view('mp/pagina_principal',$data);
	}
	
	public function Profesiones(){
		$resultado['profesiones'] = $this->MInicio->ListadoProfesiones();				
		echo json_encode($resultado);
	}

	public function Estados(){
		$resultado['estados'] = $this->MInicio->ListadoEstados();				
		echo json_encode($resultado);
	}
	
	public function loadRecord()
	{
		
		$rowno=$this->input->post('pagno');

		$config = array();
        $config["base_url"] = base_url() . "CInicio";
        $config["total_rows"] = $this->MInicio->get_count(); 
        $config["per_page"] = 20;
		$config["uri_segment"] = 2;		
		
		// custom paging configuration
		$config['num_links'] = 4;
		$config['use_page_numbers'] = TRUE;
		$config['reuse_query_string'] = TRUE;
		 
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		 
		$config['first_link'] = 'First Page';
		$config['first_tag_open'] = '<span class="firstlink">';
		$config['first_tag_close'] = '</span>';
		 
		$config['last_link'] = 'Last Page';
		$config['last_tag_open'] = '<span class="lastlink">';
		$config['last_tag_close'] = '</span>';
		 
		$config['next_link'] = 'Next Page';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = 'Prev Page';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item">';
		$config['cur_tag_close'] = '</li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		
		$config['attributes'] = array('class' => 'page-link');
        
		
		$this->pagination->initialize($config);

		// Row position
		if($rowno != 0){
			$rowno = ($rowno-1) * $config["per_page"];			
		}
        
		$page = $rowno;
		$pagination_data["links"] = $this->pagination->create_links();
		$pagination_data['profesionistas'] = $this->MInicio->ListadoProfesionales($config["per_page"], $page);	
		$pagination_data['row'] = $rowno;
		
		echo json_encode($pagination_data);
	}	
}





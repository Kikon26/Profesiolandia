<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CPerfilCliente extends CI_Controller {
	function __construct()
	{
		parent::__construct();	
		date_default_timezone_set('America/Mexico_City');			
		$this->load->library('util');
		$this->load->library('sesion');
		$this->load->library("pagination");
		$this->load->library('peticion');		
		$this->load->model('MPerfilCliente');
		$this->load->model('MMenu');
    }
    public function index(){
		if (isset($this->session->gIdPerfil)) 
		 {
			 $tabla = $this->MMenu->MenuRol($this->session->gIdPerfil);
			 //if($this->session->gIdPerfil==1)


		 }
		else 								  
			$tabla = $this->MMenu->MenuRol(4);		



        $data = array(
            'seccion' => 'perfilcliente',
			'vista' => 'VPerfilCliente',
			'data' => '',
			'dataf' => '',
			'menu' => $tabla
         );
       
		$this->load->view('mp/pagina_principal',$data);
	}

	public function Usuario(){
		$resultado['usuario'] = $this->MPerfilCliente->DetalleUsuario($this->input->get('id_cat_usuario'));				
		echo json_encode($resultado);
	}

	public function update(){				
		if ($this->input->post('file_exist')=="si") 
		{        
			$config['upload_path']="./assets/images/users";              		             		
			$config['allowed_types']='gif|jpg|jpeg|png';
			$config['encrypt_name'] = false;
			$config['file_name'] =$this->input->post('usuario')."-".date("Y-m-d-H-i-s")."-".$_FILES['file']['name'];
					
			$this->load->library('upload',$config);

			if ( ! $this->upload->do_upload("file"))		
			{
					$error = array('error' => $this->upload->display_errors());                				
					var_dump($error);				
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());		
				$file_name= $data['upload_data']['file_name']; 

				$resultado['update']=$this->MPerfilCliente->update_usuario($file_name);                
				echo json_encode($resultado);
			}

		}	
		else
		{   			
			$resultado['update']=$this->MPerfilCliente->update_usuario("");                
			echo json_encode($resultado);
		}
    }

	public function estado(){
		$resultado['estado'] = $this->MPerfilCliente->CatalogoEstados();				
		echo json_encode($resultado);
	}

	public function loadRecord()
	{
		
		$rowno=$this->input->post('pagno');

		$config = array();
        $config["base_url"] = base_url() . "CPerfilCliente";
        $config["total_rows"] = $this->MPerfilCliente->get_count(); 
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
		$pagination_data['profesionistas'] = $this->MPerfilCliente->ListadoProfesionalesFavoritos($config["per_page"], $page);	
		$pagination_data['row'] = $rowno;
		
		echo json_encode($pagination_data);
	}
	
	public function loadRecord_contenido_interes()
	{		
		$rowno=$this->input->post('pagno');

		$config = array();
        $config["base_url"] = base_url() . "CPerfilCliente";
        $config["total_rows"] = $this->MPerfilCliente->get_count_contenido_interes(); 
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
		$pagination_data['publicaciones'] = $this->MPerfilCliente->ListadoPublicaciones($config["per_page"], $page);	
		$pagination_data['row'] = $rowno;
		
		echo json_encode($pagination_data);
	}	

	public function loadRecord_preguntas()
	{		
		$rowno=$this->input->post('pagno');

		$config = array();
        $config["base_url"] = base_url() . "CPerfilCliente";
        $config["total_rows"] = $this->MPerfilCliente->get_count_preguntas(); 
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
		$pagination_data['preguntas'] = $this->MPerfilCliente->ListadoPreguntas($config["per_page"], $page);	
		$pagination_data['row'] = $rowno;
		
		echo json_encode($pagination_data);
	}	

	public function get_publicacion(){
		$resultado['publicacion'] = $this->MPerfilCliente->get_publicacion();				
		echo json_encode($resultado);
	}

	public function save_update_pregunta(){
		$resultado['save_update'] = $this->MPerfilCliente->save_update_pregunta();				
		echo json_encode($resultado);
	}

	public function get_pregunta(){
		$resultado['pregunta'] = $this->MPerfilCliente->get_pregunta();				
		echo json_encode($resultado);
	}

	public function delete_pregunta(){
		$resultado['delete'] = $this->MPerfilCliente->delete_pregunta();				
		echo json_encode($resultado);
	}
	

}





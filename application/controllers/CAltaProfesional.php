<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CAltaProfesional extends CI_Controller {
	function __construct()
	{
		parent::__construct();	
		date_default_timezone_set('America/Mexico_City');			
		$this->load->library('util');
		$this->load->library('sesion');
		$this->load->library("pagination");
		$this->load->library('peticion');
		
		$this->load->model('MAltaProfesional');
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
            'seccion' => 'altaprofesional',
			'vista' => 'VAltaProfesional',
			'data' => '',
			'dataf' => '',
			'menu' => $tabla
         );
       
		$this->load->view('mp/pagina_principal',$data);
	}

	public function update_info_gral(){
        $resultado['update']=$this->MAltaProfesional->update_info_gral();
		echo json_encode($resultado);
	}

	public function update_experiencia_titulos(){
		$postData = $this->input->post();
		
		if (!file_exists('./assets/images/profesionales/'.$postData['id_cat_profesional'].'/rec/')) 
		{
			if(!mkdir('./assets/images/profesionales/'.$postData['id_cat_profesional'].'/rec/', 0777, true)){
				echo 'no se puedo crear el directorio ';
			}					
		} 

		for ($i = 1; $i <=$postData['limitcount']; $i++)
		{
			if (isset($_FILES['file_'.$i]['name']))
			{   
				$config['upload_path']="./assets/images/profesionales/".$postData['id_cat_profesional']."/rec";              		             
				$config['allowed_types']='gif|jpg|jpeg|png';
				$config['encrypt_name'] = false;
				$config['file_name'] =$postData['id_cat_profesional']."-".$i."-".date("Y-m-d-H-i-s")."-".$_FILES['file_'.$i]['name'];				

				$this->load->library('upload',$config);
				$this->upload->initialize($config); 
			
				if ( ! $this->upload->do_upload("file_".$i))		
				{
						$error = array('error' => $this->upload->display_errors());                				
						var_dump($error);									
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());		
					$files_names[$i]= $data['upload_data']['file_name']; 			
				}
			}	

		}
			
		$resultado['update']=$this->MAltaProfesional->update_experiencia_titulos($files_names);
		echo json_encode($resultado);
	}

	public function update_contacto(){
		$postData = $this->input->post();
		
		if (!file_exists('./assets/images/profesionales/'.$postData['id_cat_profesional'].'/card/')) 
		{
			if(!mkdir('./assets/images/profesionales/'.$postData['id_cat_profesional'].'/card/', 0777, true)){
				echo 'no se puedo crear el directorio ';
			}					
		} 
		
		if (isset($_FILES['file_business_card']['name']))
		{   
			$config['upload_path']="./assets/images/profesionales/".$postData['id_cat_profesional']."/card";              		             
			$config['allowed_types']='gif|jpg|jpeg|png';
			$config['encrypt_name'] = false;
			$config['file_name'] =$postData['id_cat_profesional']."-".date("Y-m-d-H-i-s")."-".$_FILES['file_business_card']['name'];				

			$this->load->library('upload',$config);
			$this->upload->initialize($config); 
		
			if ( ! $this->upload->do_upload("file_business_card"))		
			{
					$error = array('error' => $this->upload->display_errors());                				
					var_dump($error);									
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());		
				$files_names= $data['upload_data']['file_name']; 			
			}
		}	
		

        $resultado['update']=$this->MAltaProfesional->update_contacto($files_names);
		echo json_encode($resultado);
	}

	public function update_precios(){
		$postData = $this->input->post();
		
		if (!file_exists('./assets/images/profesionales/'.$postData['id_cat_profesional'].'/promo/')) 
		{
			if(!mkdir('./assets/images/profesionales/'.$postData['id_cat_profesional'].'/promo/', 0777, true)){
				echo 'no se puedo crear el directorio ';
			}					
		} 

		for ($i = 1; $i <=1; $i++)
		{
			if (isset($_FILES['file_promo_'.$i]['name']))
			{   
				$config['upload_path']="./assets/images/profesionales/".$postData['id_cat_profesional']."/promo";              		             
				$config['allowed_types']='gif|jpg|jpeg|png';
				$config['encrypt_name'] = false;
				$config['file_name'] =$postData['id_cat_profesional']."-".$i."-".date("Y-m-d-H-i-s")."-".$_FILES['file_promo_'.$i]['name'];				

				$this->load->library('upload',$config);
				$this->upload->initialize($config); 
			
				if ( ! $this->upload->do_upload("file_promo_".$i))		
				{
						$error = array('error' => $this->upload->display_errors());                				
						var_dump($error);									
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());		
					$files_names[$i]= $data['upload_data']['file_name']; 			
				}
			}	

		}
			
		$resultado['update']=$this->MAltaProfesional->update_precios($files_names);
		echo json_encode($resultado);		
	}

	public function Profesional(){
		$resultado['profesional'] = $this->MAltaProfesional->DetalleProfesional();				
		echo json_encode($resultado);
	}

	public function profesion(){
		$resultado['profesion'] = $this->MAltaProfesional->CatalogoProfesiones();				
		echo json_encode($resultado);
	}

	public function estado(){
		$resultado['estado'] = $this->MAltaProfesional->CatalogoEstados();				
		echo json_encode($resultado);
	}

	public function direccion(){
		$resultado['direccion'] = $this->MAltaProfesional->CatalogoDirecciones();				
		echo json_encode($resultado);
	}

	public function reconocimiento(){
		$resultado['reconocimiento'] = $this->MAltaProfesional->CatalogoReconocimientos();				
		echo json_encode($resultado);
	}

	public function promocion(){
		$resultado['promocion'] = $this->MAltaProfesional->CatalogoPromociones();				
		echo json_encode($resultado);
	}

	public function contacto(){
		$resultado['contacto'] = $this->MAltaProfesional->Contacto();				
		echo json_encode($resultado);
	}

	public function precio(){
		$resultado['precio'] = $this->MAltaProfesional->CatalogoPrecios();				
		echo json_encode($resultado);
	}

	public function horario_atencion(){
		$resultado['horario_atencion'] = $this->MAltaProfesional->CatalogoHorarioAtencion();				
		echo json_encode($resultado);
	}

	public function eliminar_reconocimiento(){
		$resultado['reconocimiento'] = $this->MAltaProfesional->EliminarReconocimiento();				
		echo json_encode($resultado);
	}

	public function eliminar_precio(){
		$resultado['precio'] = $this->MAltaProfesional->EliminarPrecio();				
		echo json_encode($resultado);
	}

	public function loadRecord()
	{
		
		$rowno=$this->input->post('pagno');

		$config = array();
        $config["base_url"] = base_url() . "CAltaProfesional";
        $config["total_rows"] = $this->MAltaProfesional->get_count(); 
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
		$pagination_data['publicaciones'] = $this->MAltaProfesional->ListadoPublicaciones($config["per_page"], $page);	
		$pagination_data['row'] = $rowno;
		
		echo json_encode($pagination_data);
	}	

	public function save_update_publicacion(){
		$resultado['save_update'] = $this->MAltaProfesional->save_update_publicacion();				
		echo json_encode($resultado);
	}

	public function get_publicacion(){
		$resultado['publicacion'] = $this->MAltaProfesional->get_publicacion();				
		echo json_encode($resultado);
	}

	public function delete_publicacion(){
		$resultado['delete'] = $this->MAltaProfesional->delete_publicacion();				
		echo json_encode($resultado);
	}
}





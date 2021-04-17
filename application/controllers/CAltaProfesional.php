<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CAltaProfesional extends CI_Controller {
	function __construct()
	{
		parent::__construct();	
		date_default_timezone_set('America/Mexico_City');			
		$this->load->library('util');
		$this->load->library('sesion');
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

}





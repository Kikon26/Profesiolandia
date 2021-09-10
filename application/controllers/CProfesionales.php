<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CProfesionales extends CI_Controller {
	function __construct()
	{
		parent::__construct();	
		date_default_timezone_set('America/Mexico_City');	
		$this->load->library('util');
		$this->load->library('sesion');
		$this->load->library('peticion');
		
		$this->load->model('MProfesionales');
		$this->load->model('MMenu');
    }
    public function index(){
		$tabla = $this->MMenu->MenuRol($this->session->gIdPerfil);
        $data = array(
            'seccion' => 'profesionales',
			'vista' => 'VProfesionales',
			'data' => '',
			'dataf' => '',
			'menu' => $tabla
         );
       
		$this->load->view('mp/pagina',$data);
	}
	
	public function listado(){
		$resultado['profesionales'] = $this->MProfesionales->ListadoProfesionales();				
		echo json_encode($resultado);
	}

	public function save(){		
		$config['upload_path']="./assets/images/profesionales";              		             
        $config['allowed_types']='gif|jpg|jpeg|png';
		$config['encrypt_name'] = false;
		$config['file_name'] =$this->input->post('profesional_usuario')."-".date("Y-m-d-H-i-s")."-".$_FILES['file']['name'];
		         
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

			$resultado['save']=$this->MProfesionales->save_profesional($file_name);                
			echo json_encode($resultado);
		}

		
    }
 
    public function update(){
		if (/*$_FILES['file']['name']<>""*/$this->input->post('file_exist')=="si") 
		{        
			$config['upload_path']="./assets/images/profesionales";              		             		                         	
			$config['allowed_types']='gif|jpg|jpeg|png';
			$config['encrypt_name'] = false;		
			$config['file_name'] =$this->input->post('profesional_usuario')."-".date("Y-m-d-H-i-s")."-".$_FILES['file']['name'];
					
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
				
			    $resultado['update']=$this->MProfesionales->update_profesional($file_name);                
				echo json_encode($resultado);
			}	
		}	
		else
		{   
			$resultado['update']=$this->MProfesionales->update_profesional("");
		    echo json_encode($resultado);
		}
    }
 
    public function delete(){
        $resultado['delete']=$this->MProfesionales->delete_profesional();
		echo json_encode($resultado);
	}
	
	public function profesion(){
		$resultado['profesion'] = $this->MProfesionales->CatalogoProfesiones();				
		echo json_encode($resultado);
	}

	public function estado(){
		$resultado['estado'] = $this->MProfesionales->CatalogoEstados();				
		echo json_encode($resultado);
	}

	public function direccion(){
		$resultado['direccion'] = $this->MProfesionales->CatalogoDirecciones();				
		echo json_encode($resultado);
	}
}





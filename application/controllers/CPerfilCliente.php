<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CPerfilCliente extends CI_Controller {
	function __construct()
	{
		parent::__construct();	
		date_default_timezone_set('America/Mexico_City');			
		$this->load->library('util');
		$this->load->library('sesion');
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
	

}





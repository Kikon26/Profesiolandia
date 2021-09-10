<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CClientes extends CI_Controller {
	function __construct()
	{
		parent::__construct();		
		$this->load->library('util');
		$this->load->library('sesion');
		$this->load->library('peticion');
		
		$this->load->model('MClientes');
		$this->load->model('MMenu');
    }
    public function index(){
		$tabla = $this->MMenu->MenuRol($this->session->gIdPerfil);
        $data = array(
            'seccion' => 'clientes',
			'vista' => 'VClientes',
			'data' => '',
			'dataf' => '',
			'menu' => $tabla			
         );
       
		$this->load->view('mp/pagina',$data);
	}
	
	public function listado(){
		$resultado['clientes'] = $this->MClientes->ListadoClientes();				
		echo json_encode($resultado);
	}

	public function save(){		
		$resultado['save']=$this->MClientes->save_cliente();                
	    echo json_encode($resultado);
    }
 
    public function update(){
        $resultado['update']=$this->MClientes->update_cliente();
        echo json_encode($resultado);
    }
 
    public function delete(){
        $resultado['delete']=$this->MClientes->delete_cliente();
		echo json_encode($resultado);
	}
}





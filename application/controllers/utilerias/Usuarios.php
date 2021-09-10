<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('usuarios_model');
		
	}

	
	public function index()
	{
		$data = array(
            'seccion' => '',
            'vista' => 'utilerias/usuarios'
        );

        $this->load->view('mp/pagina',$data);

		
	}

	public function cambiarpass()
	{
		
		$data = array(
            'seccion' => '',
            'vista' => 'utilerias/cambiapass'
        );

        $this->load->view('mp/pagina',$data);
	}

	public function listadoUsuarios()
	{
		$this->usuarios_model->listadoUsuario();
	}

	public function datosUsuario2($idUsuario=0)
	{
		$result=$this->usuarios_model->datosUsuario2($idUsuario);

		echo '{"resp":"1","mensaje":"","Tabla":'.json_encode($result->result()).'}'; 
	}

	public function guardarInfo(){
		$param['camPass']=$this->input->post('tcamPass');      
        $param['idUsuario']=$this->input->post('tIdUsuario');
        $param['usuario']=$this->input->post('tUsuario');
        $param['password']=$this->input->post('tPassw');
        $param['nombre']=$this->input->post('tNombre');
        $param['paterno']=$this->input->post('tPaterno');
        $param['materno']=$this->input->post('tMaterno');
        $param['fechaAlta']=$this->input->post('tFechaAlta');
        $param['rol']=$this->input->post('tRol');
        $param['mail']=$this->input->post('tMail');
        $param['perfil']=$this->input->post('tPerfil');

        //print_r($param);
        if ($param['idUsuario'])
        	echo $this->usuarios_model->actualizarUsuario($param);
        else
        	echo $this->usuarios_model->guardarUsuario($param);
     }

     public function eliminarInfo(){
       
        $param['idUsuario']=$this->input->post('tIdUsuario');
       

       	echo $this->usuarios_model->eliminarUsuario($param['idUsuario']);
        
     }


     public function cambiarContra(){
       
        $param['idUsuario']=$this->input->post('tIdUsuario');
        $param['password']=$this->input->post('tPassw');
        $param['actPass']=$this->input->post('tActPass');

        $result=$this->usuarios_model->datosUsuario2($param['idUsuario']);

        $datos=$result->result();

        //print_r($datos[0]->password);

        if ($datos[0]->password!=sha1($param['actPass'])){
        	echo -1;
        	return;
        }

       
       
       echo $this->usuarios_model->cambiarPassw($param);
       
     }



	
}

?>
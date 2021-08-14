<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CRegistro extends CI_Controller {
     public $tabla="";

	function __construct()
	{
		parent::__construct();	
		date_default_timezone_set('America/Mexico_City');			
		$this->load->library('util');
		$this->load->library('sesion');
		$this->load->library('peticion');
		
		$this->load->model('MRegistro');		
		$this->load->model('MBienvenida');		
		$this->load->model('MMenu');
    }
    public function index(){
		if (isset($this->session->gIdPerfil)) $tabla = $this->MMenu->MenuRol($this->session->gIdPerfil);
		else 								  $tabla = $this->MMenu->MenuRol(4);		
        $data = array(
            'seccion' => 'Registro',
			'vista' => 'VRegistro',
			'data' => '',
			'dataf' => '',
			'menu' => $tabla
         );
       
		$this->load->view('mp/pagina_principal',$data);
	}

	public function save()
	{						
		 $postData = $this->input->post();				 
		 $this->load->library('email');
		
		  $config['protocol'] = 'mail';		  
		//   $config["smtp_host"] = 'smtp.gmail.com';		   		 
		//   $config["smtp_user"] = 'usuario';
		//   $config["smtp_pass"] = 'password';   
		//   $config["smtp_port"] = '25';
		  $config['charset'] = 'utf-8';   		 
		  $config['wordwrap'] = TRUE;
		  $config['validate'] = true;	
		  $config['mailtype'] = 'html';
		  
		  $id_cat_rol=$postData['id_cat_rol']; 		   

		  // generar código aleatorio simple
		  $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		  $code = substr(str_shuffle($set), 0, 12);
		  $id_usuario_profesional=$this->MRegistro->save_usuario($code);	 
		  $subject = "Bienvenido a Profesiolandia";	  

          /* Antes 
       	  http://obraspublicas.morelia.gob.mx/Profesiolandia/assets/css/style_profesiolandia.css'
		  http://obraspublicas.morelia.gob.mx/Profesiolandia/assets/css/bootstrap.min.css'
		  http://obraspublicas.morelia.gob.mx/Profesiolandia/assets/css/mdb.min.css'

	      http://obraspublicas.morelia.gob.mx/Profesiolandia/imagenes/Logo_Profesiolandia_perspectiva.png	
		  */	
		  $message = "
		  <html lang='en'>
			<head>
			  
			  <meta charset='utf-8'>
			  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
			  <link href='https://obraspublicas.morelia.gob.mx/contratistas/css/style.css' rel='stylesheet' type='text/css'>
			  <link href='https://obraspublicas.morelia.gob.mx/contratistas/css/bootstrap.min.css' rel='stylesheet'>
			  <link href='https://obraspublicas.morelia.gob.mx/contratistas/css/mdb.min.css' rel='stylesheet'>
			</head>
			<body>


		  <div class='container mt-n0'>
			  <div class='container-fluid  py-3 px-3'>
				<div class='container' style='text-align: justify-all; font-family: Candara; font-size: 18px;'>
				  
				  <div class='row' style='text-align: center;'>
					<img src='https://obraspublicas.morelia.gob.mx/contratistas/images/Logo_.png' class='d-block' style='height: 200px; width: 450px;'  alt='Profesiolandia Logo'>
				  </div>

				  <strong>
						   <h4 style='color: #007b5e'> <strong> Bienvenido ". $postData['usuario'] . "</strong> </h4>
				  </strong>  
				  <div class='row' style='text-align: justify-all;'>
					Te damos la bienvenida a <strong> Profesiolandia </strong> la plataforma donde encontraras a todos los Profesionales, tu registro ya casi queda activado.
				  
					Para que tu cuenta pueda activarse es necesario que puedas confirmar tu activacion en profesiolandia dando click en la sig liga.
				  </div>
				  
					 <p style='text-align: center;'>

					 <a href='".base_url()."CRegistro/activate/".$id_cat_rol."/".$id_usuario_profesional."/".$code."' style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;' target='_blank'> <strong> Activa tu cuenta </strong> </a>
					   
					  </p>

				  <div class='row'>
					Estamos seguros de que tu experiencia en Profesionalia va a ser la mejor, en esta plataforma encontraras a todos los profesionales de cada una de las especialidades en México
				  </div>
				  <br>
				  
				  <div class='row' style='text-align: center; font-size: 14px; color: gray;'>
					 <a href='".base_url()."CRegistro/cancel/".$id_cat_rol."/".$id_usuario_profesional."/".$code."' target='_blank'>Anular la suscripción </a> | Enviado por Profesiolandia 
				  </div>
				</div>
			  </div>
		  </div>

		   </body>
		  </html>
		  ";
		 
		//Establecemos esta configuración
		  $this->email->initialize($config);
		  $this->email->from("soporte@profesiolandia.com", "Profesiolandia");
		  $this->email->to($postData['email'], $postData['usuario']);		
		  $this->email->subject($subject);
		  $this->email->message($message);
		  
		  $resultado['nombre']=$postData['usuario'];
		  $resultado['enviado']=false;
		  //Enviamos el email y si se produce bien o mal que avise con una flasdata
		  if($this->email->send())
		  {	
			 //$this->session->set_flashdata('envio', 'Email enviado correctamente');			
			  $resultado['enviado']=true;
		  }		

		echo json_encode($resultado);	
		
    }

	public function activate()
	{
        $id_cat_rol = $this->uri->segment(3);
		$id_usuario_profesional =  $this->uri->segment(4);        
		$code = $this->uri->segment(5);
  
        // obtener los detalles del usuario
        $user = $this->MRegistro->GetUser($id_cat_rol,$id_usuario_profesional);				
  
        // si el código coincide
        if($user['code'] == $code){
            // actualizar el estado activo del usuario            
            $query = $this->MRegistro->Activate($id_cat_rol,$id_usuario_profesional);  
            if($query){
                $this->session->set_flashdata('message', 'Usuario activado correctamente');
            }
            else{
                $this->session->set_flashdata('message', 'Algo salió mal al activar la cuenta.');
            }
        }
        else{
            $this->session->set_flashdata('message', 'No se puede activar la cuenta. El código no coincide');
        }
  
        redirect('/');
  
    }

	public function cancel()
	{
        $id_cat_rol = $this->uri->segment(3);
		$id_usuario_profesional =  $this->uri->segment(4);        
		$code = $this->uri->segment(5);
  
        // obtener los detalles del usuario
        $user = $this->MRegistro->GetUser($id_cat_rol,$id_usuario_profesional);				
  
        // si el código coincide
        if($user['code'] == $code){
            // actualizar el estado activo del usuario
            $data['active'] = true;
            $query = $this->MRegistro->Cancel($id_cat_rol,$id_usuario_profesional);
  
            if($query){
                $this->session->set_flashdata('message', 'Usuario cancelado correctamente');
            }
            else{
                $this->session->set_flashdata('message', 'Algo salió mal al cancelar la cuenta.');
            }
        }
        else{
            $this->session->set_flashdata('message', 'No se puede canxcelar la cuenta. El código no coincide');
        }
  
        redirect('CRegistro');
  
    }
  	
	public function rol(){
		$resultado['rol'] = $this->MRegistro->CatalogoRoles();				
		echo json_encode($resultado);
	}

	public function verificar_existe_email(){
		$resultado['existe'] = $this->MRegistro->VerificarExisteEmail();				
		echo json_encode($resultado);
	}
}





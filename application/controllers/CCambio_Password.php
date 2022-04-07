<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CCambio_Password extends CI_Controller {
	function __construct()
	{
		parent::__construct();	
		date_default_timezone_set('America/Mexico_City');			
		$this->load->library('util');
		$this->load->library('sesion');
		$this->load->library('peticion');
		
		$this->load->model('MCambio_Password');		
		$this->load->model('MRegistro');		
		$this->load->model('MMenu');
    }

    public function index(){
		if (isset($this->session->gIdPerfil)) $tabla = $this->MMenu->MenuRol($this->session->gIdPerfil);
		else 								  $tabla = $this->MMenu->MenuRol(4);		

		$id_cat_rol = $this->uri->segment(3);
		$id_usuario_profesional =  $this->uri->segment(4);        
		$code = $this->uri->segment(5);
	
		// obtener los detalles del usuario
		$user = $this->MCambio_Password->GetUser($id_cat_rol,$id_usuario_profesional);		
			
		
		if($user['code'] == $code)
		{   
			$dataf = array(			
				'id_cat_rol'  => $user['id_cat_rol'],
				'id_usuario_profesional' => $id_usuario_profesional		
			);
			
			$data = array(
				'seccion' => 'Cambio_Password',
				'vista' => 'VCambio_Password',
				'data' => '',
				'dataf' => $dataf,
				'menu' => $tabla
			);
		
			$this->load->view('mp/pagina_principal',$data);	        
		}
		else 
			redirect('/');
	}

	public function update_password()
	{	
		/***************************************************************************************************/
		$postData = $this->input->post();				 
		$this->load->library('email');
		
		$user = $this->MRegistro->GetUser($postData['id_cat_rol'],$postData['id_usuario_profesional']);				

		$config['protocol'] = 'mail';		  
		//   $config["smtp_host"] = 'smtp.gmail.com';		   		 
		//   $config["smtp_user"] = 'usuario';
		//   $config["smtp_pass"] = 'password';   
		//   $config["smtp_port"] = '25';
		$config['charset'] = 'utf-8';   		 
		$config['wordwrap'] = TRUE;
		$config['validate'] = true;	
		$config['mailtype'] = 'html'; 
		
		$subject = "Notificación Profesiolandia - Contraseña Actualizada";	  

		$message = "
		<html lang='en'>
		<head>
			
			<meta charset='utf-8'>
			<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
			<link href='https://profesiolandia.com/mochoo/assets/css/style_profesiolandia.css' rel='stylesheet' type='text/css'>
			<link href='https://profesiolandia.com/mochoo/assets/css/bootstrap.min.css' rel='stylesheet'>
			<link href='https://profesiolandia.com/mochoo/assets/css/mdb.min.css' rel='stylesheet'>
		</head>
		<body>
		<div class='container mt-n0'>
			<div class='container-fluid  py-3 px-3'>
			<div class='container' style='text-align: justify-all; font-family: Candara; font-size: 18px;'>
				
				<div class='row' style='text-align: center;'>
					<img src='https://profesiolandia.com/mochoo/imagenes/Logo_Profesiolandia_perspectiva.png' class='d-block' style='height: 200px; width: 450px;'  alt='Profesiolandia Logo'>
				</div>
				<strong>
						<h4 style='color: #007b5e'> <strong> Hola ". $user['usuario'] . "</strong> </h4>						
				</strong>  
				
				<div class='row' style='text-align: center;'>
					Te informamos que tu contraseña fue actualizada de manera correcta a <strong>" .$postData['password']. "</strong>.
				</div>
				<br>				
				<div class='row'>
					<div class='col' style='text-align: center;'  >
						Estamos seguros de que tu experiencia en Profesiolandia va a continuar siendo la mejor, en esta plataforma encontraras a todos los profesionales de cada una de las especialidades en México
					</div>
					<br>
				
					<div class='row' style='text-align: center; font-size: 14px; color: gray;'>					 
					<a href='".base_url()."CRegistro/cancel/".$user['id_cat_rol']."/".$user['id_cat_usuario']."/".$user['code']."' target='_blank'>Cancelar Suscripción </a> | Enviado por Profesiolandia 					
					</div>
				</div>
			</div>
		</div>
		</body>
		</html>
		";
		

		//Establecemos esta configuración
		$this->email->initialize($config);
		$this->email->from("noreply@profesiolandia.com", "Profesiolandia");
		$this->email->to($user['email'], $user['nombre']." ".$user['paterno']." ".$user['materno']);		
		$this->email->subject($subject);
		$this->email->message($message);
				
		$enviado=false;
		
		if($this->email->send())		$enviado=true;
		/***************************************************************************************************/
		
		$resultado['update']=$this->MCambio_Password->update_password();                
		echo json_encode($resultado);
	}
}





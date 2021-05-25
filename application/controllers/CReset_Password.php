<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CReset_Password extends CI_Controller {
	function __construct()
	{
		parent::__construct();	
		date_default_timezone_set('America/Mexico_City');			
		$this->load->library('util');
		$this->load->library('sesion');
		$this->load->library('peticion');
		
		$this->load->model('MReset_Password');
		$this->load->model('MMenu');
    }
    public function index(){
		if (isset($this->session->gIdPerfil)) 
		 {
			 $tabla = $this->MMenu->MenuRol($this->session->gIdPerfil);

		 }
		else 								  
			$tabla = $this->MMenu->MenuRol(4);		



        $data = array(
            'seccion' => 'Reset_Password',
			'vista' => 'VReset_Password',
			'data' => '',
			'dataf' => '',
			'menu' => $tabla
         );
       
		$this->load->view('mp/pagina_principal',$data);
	}

	public function enviar_email_reset()
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
		  
		  // generar código aleatorio simple
		  $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		  $code = substr(str_shuffle($set), 0, 12);		
		    
		  $user = $this->MReset_Password->GetUser($postData['email']);				
		  $id_usuario_profesional=$user['id_usuario_profesional'];
		  $id_cat_rol=$user['id_cat_rol'];		
		  
		  $this->MReset_Password->update_usuario($id_cat_rol,$id_usuario_profesional,$code);	 

		  $subject = "Instucciones Profesiolandia - Cambio de contrasena";	  
		  
		  $message = "

		  <html lang='en'>
			<head>
			  
			  <meta charset='utf-8'>
			  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
			  <link href='http://obraspublicas.morelia.gob.mx/Profesiolandia/assets/css/style_profesiolandia.css' rel='stylesheet' type='text/css'>
			  <link href='http://obraspublicas.morelia.gob.mx/Profesiolandia/assets/css/bootstrap.min.css' rel='stylesheet'>
			  <link href='http://obraspublicas.morelia.gob.mx/Profesiolandia/assets/css/mdb.min.css' rel='stylesheet'>
			</head>
			<body>


		  <div class='container mt-n0'>
			  <div class='container-fluid  py-3 px-3'>
				<div class='container' style='text-align: justify-all; font-family: Candara; font-size: 18px;'>
				  
				  <div class='row' style='text-align: center;'>
					<img src='http://obraspublicas.morelia.gob.mx/Profesiolandia/imagenes/Logo_Profesionalia_perspectiva.png' class='d-block' style='height: 200px; width: 450px;'  alt='Profesiolandia Logo'>
				  </div>

				  <strong>
						   <h4 style='color: #007b5e'> <strong> Hola ". $user['usuario'] . "</strong> </h4>
				  </strong>  
				  <div class='row' style='text-align: center;'>
					Te enviamos este correo de <strong> Profesiolandia </strong> por que detectamos que olvidaste tu contraseña.<br>
				  
					Para continuar con el proceso de cambio de la contraseña es necesario que puedas dar click en la sig liga.
				  </div>
				  
					<p style='text-align: center;'>
					   <a href='".base_url()."CCambio_Password/index/".$id_cat_rol."/".$id_usuario_profesional."/".$code."' style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;' target='_blank'> <strong> Cambia tu contraseña </strong> </a>					      
  				    </p>

				  <div class='row'>
				  <div class='col' style='text-align: center;'  >
					Estamos seguros de que estas disfrutando la experiencia en Profesionalia, en esta plataforma encontraras a todos los profesionales de cada una de las especialidades en México
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
		  $this->email->to($postData['email'], $user['usuario']);		
		  $this->email->subject($subject);
		  $this->email->message($message);
		  
		  
		  $enviado=false;
		  
		  if($this->email->send())
		  {				 
			$enviado=true;
		  }		
		

		if (isset($this->session->gIdPerfil)) $tabla = $this->MMenu->MenuRol($this->session->gIdPerfil);
		else 								  $tabla = $this->MMenu->MenuRol(4);		

		$dataf = array(			
			'enviado' => $enviado, 
			'nombre'  => $user['usuario']
		);
        $data = array(
            'seccion' => 'Envio_Password',
			'vista' => 'VEnvio_Password',
			'data' => '',
			'dataf' => $dataf,
			'menu' => $tabla
         );
       
		$this->load->view('mp/pagina_principal',$data);	
		
    }

}





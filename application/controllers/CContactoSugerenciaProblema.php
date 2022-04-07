<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CContactoSugerenciaProblema extends CI_Controller {
     public $tabla="";

	function __construct()
	{
		parent::__construct();	
		date_default_timezone_set('America/Mexico_City');			
		$this->load->library('util');
		$this->load->library('sesion');
		$this->load->library('peticion');
		
		$this->load->model('MContactoSugerenciaProblema');				
		$this->load->model('MMenu');
    }
    public function index(){
		if (isset($this->session->gIdPerfil)) $tabla = $this->MMenu->MenuRol($this->session->gIdPerfil);
		else 								  $tabla = $this->MMenu->MenuRol(4);		

		$dataf = array(
			'id_cat_tipo_formulario'  => $this->uri->segment(3)
		);



        $data = array(
            'seccion' => 'RegContactoSugerenciaProblemaistro',
			'vista' => 'VContactoSugerenciaProblema',
			'data' => '',
			'dataf' => $dataf,
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
		  $id_usuario_profesional=$postData['id_usuario_profesional'];

		  $id_cat_tipo_formulario=$postData['id_cat_tipo_formulario']; 		   
		  $tipo_mensaje = $this->MContactoSugerenciaProblema->GetTipo($id_cat_tipo_formulario);			
		  if ($id_cat_rol<>4)
		  	$user = $this->MContactoSugerenciaProblema->GetUser($id_cat_rol,$id_usuario_profesional);				
		  
		  

		  $id_cat_formulario=$this->MContactoSugerenciaProblema->save_formulario();	 
		  //$subject = "Bienvenido a Profesiolandia";	  
		  $subject = $tipo_mensaje['tipo_formulario']."..".$postData['nombre']."..".date('m/d/Y h:i:s a', time());	  

		  $message = "
		  <html lang='en'>
			<head>
			  
			  <meta charset='utf-8'>
			  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
			  <link href='https://profesiolandia.com/mochoo/assets/css/style.css' rel='stylesheet' type='text/css'>
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
						   <h4 style='color: #007b5e'> <strong> Bienvenido ". $postData['nombre'] . "</strong> </h4>
				  </strong>
				  
				  <div class='row' style='text-align: justify;'>
					Te enviamos este correo de <strong> Profesiolandia </strong> para confirmar que recibimos tus datos  en relación al tema de <strong>".$tipo_mensaje['tipo_formulario']."</strong>:<br><br>
					<strong>Asunto:</strong> ".$postData['asunto']."<br>

					<strong>Mensaje:</strong> ".$postData['mensaje']."<br><br>

					Revisaremos su informacióm y le estaremos respondiendo a la mayor brevedad posible.
				  </div>";
				  
				  if ($id_cat_rol==4)
				  	$message.="<p style='text-align: center;'>
									<a href='".base_url()."CRegistro/' style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;' target='_blank'> <strong> Deseo Registrarme </strong> </a>					
							   </p>";
			    		
		$message.="<div class='row'>
					Estamos seguros de que tu experiencia en Profesiolandia va a ser la mejor, en esta plataforma encontraras a todos los profesionales de cada una de las especialidades en México
				  </div>
				  <br>";
				  
				  if ($id_cat_rol<>4)				  
				  $message.="<div class='row' style='text-align: center; font-size: 14px; color: gray;'>
								<a href='".base_url()."CRegistro/cancel/".$id_cat_rol."/".$id_usuario_profesional."/".$user['code']."' target='_blank'>Cancelar Suscripción </a> | Enviado por Profesiolandia 
							</div>";
	   $message.="</div>
			  </div>
		  </div>

		   </body>
		  </html>
		  ";
		 
		//Establecemos esta configuración
		  $this->email->initialize($config);
		  $this->email->from("soporte@profesiolandia.com", "Profesiolandia");
		  $this->email->to($postData['email'], $postData['nombre']);		
		  $this->email->subject($subject);
		  $this->email->message($message);
		  $this->email->bcc('soporte@profesiolandia.com');

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

	public function GetTipo($id_cat_tipo_formulario){
		$resultado['tipo_formulario'] = $this->MContactoSugerenciaProblema->GetTipo($id_cat_tipo_formulario);				
		echo json_encode($resultado);
	}	

	public function tipo_formulario(){
		$resultado['tipo_formulario'] = $this->MContactoSugerenciaProblema->CatalogoTipoFormulario();				
		echo json_encode($resultado);
	}	
}





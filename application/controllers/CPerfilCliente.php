<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CPerfilCliente extends CI_Controller {
	function __construct()
	{
		parent::__construct();	
		date_default_timezone_set('America/Mexico_City');			
		$this->load->library('util');
		$this->load->library('sesion');
		$this->load->library("pagination");
		$this->load->library('peticion');		
		$this->load->model('MPerfilCliente');
		$this->load->model('MMenu');
    }
    public function index(){

		if ($this->uri->segment(5)==null) $tab="1";
		else 							   
			{
				$id_cat_rol = $this->uri->segment(3);
				$id_cat_usuario =  $this->uri->segment(4);        
				$tab = $this->uri->segment(5);
				
				$this->session->set_userdata('sisdato', $id_cat_usuario);
				generaDatosSession();
			}	
		$dataf = array(
			'tab'  => $tab			
		); 	
		/***************************************************************/	

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
			'dataf' => $dataf,
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

	public function loadRecord()
	{
		
		$rowno=$this->input->post('pagno');

		$config = array();
        $config["base_url"] = base_url() . "CPerfilCliente";
        $config["total_rows"] = $this->MPerfilCliente->get_count(); 
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
		$pagination_data['profesionistas'] = $this->MPerfilCliente->ListadoProfesionalesFavoritos($config["per_page"], $page);	
		$pagination_data['row'] = $rowno;
		
		echo json_encode($pagination_data);
	}
	
	public function loadRecord_contenido_interes()
	{		
		$rowno=$this->input->post('pagno');

		$config = array();
        $config["base_url"] = base_url() . "CPerfilCliente";
        $config["total_rows"] = $this->MPerfilCliente->get_count_contenido_interes(); 
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
		$pagination_data['publicaciones'] = $this->MPerfilCliente->ListadoPublicaciones($config["per_page"], $page);	
		$pagination_data['row'] = $rowno;
		
		echo json_encode($pagination_data);
	}	

	public function loadRecord_preguntas()
	{		
		$rowno=$this->input->post('pagno');

		$config = array();
        $config["base_url"] = base_url() . "CPerfilCliente";
        $config["total_rows"] = $this->MPerfilCliente->get_count_preguntas(); 
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
		$pagination_data['preguntas'] = $this->MPerfilCliente->ListadoPreguntas($config["per_page"], $page);	
		$pagination_data['row'] = $rowno;
		
		echo json_encode($pagination_data);
	}	

	public function get_publicacion(){
		$resultado['publicacion'] = $this->MPerfilCliente->get_publicacion();				
		echo json_encode($resultado);
	}

	public function save_update_pregunta(){
<<<<<<< HEAD

		/***************************************************************************************************/
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

		 
		  
		 $data['correos'] = $this->MPerfilCliente->GetCorreos($postData['id_cat_profesion']);					 			
		 $contador=0;
		 foreach($data['correos'] as $correo) 
		   {
				
				$subject = "Notificación Profesiolandia - Pregunta";	  
				
				$message = "
				<html lang='en'>
				<head>
					
					<meta charset='utf-8'>
					<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
					<link href='http://obraspublicas.morelia.gob.mx/contratistas/css/style.css' rel='stylesheet' type='text/css'>
					<link href='http://obraspublicas.morelia.gob.mx/contratistas/css/bootstrap.min.css' rel='stylesheet'>
					<link href='http://obraspublicas.morelia.gob.mx/contratistas/css/mdb.min.css' rel='stylesheet'>
				</head>
				<body>
				<div class='container mt-n0'>
					<div class='container-fluid  py-3 px-3'>
					<div class='container' style='text-align: justify-all; font-family: Candara; font-size: 18px;'>
						
						<div class='row' style='text-align: center;'>
						<img src='http://obraspublicas.morelia.gob.mx/contratistas/images/Logo_.png' class='d-block' style='height: 200px; width: 450px;'  alt='Profesiolandia Logo'>
						</div>
						<strong>
								<h4 style='color: #007b5e'> <strong> Hola ". $correo->usuario . "</strong> </h4>
						</strong>  
						<div class='row' style='text-align: center;'>
						Te enviamos este correo de <strong> Profesiolandia </strong> por que detectamos que un usuario realizo la siguiente pregunta relacionada con tu Profesión:<br>
                        <strong>".$postData['pregunta']."</strong><br>						
						Para dar respuesta es necesario que puedas dar click en la sig liga.
						</div>
						
						<p style='text-align: center;'>
							<a href='".base_url()."CAltaProfesional/index/".$correo->id_cat_rol."/".$correo->id_cat_profesional."/4' style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;' target='_blank'> <strong> Dar Respuesta </strong> </a>					      
							</p>
						<div class='row'>
						<div class='col' style='text-align: center;'  >
						Estamos seguros de que estas disfrutando la experiencia en Profesionalia, en esta plataforma encontraras a todos los profesionales de cada una de las especialidades en México
						</div>
						<br>
						
						<div class='row' style='text-align: center; font-size: 14px; color: gray;'>					 
							<a href='".base_url()."CRegistro/cancel/".$correo->id_cat_rol."/".$correo->id_cat_profesional."/4' target='_blank'>Anular la suscripción </a> | Enviado por Profesiolandia 
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
				$this->email->to($correo->email, $correo->nombre." ".$correo->paterno." ".$correo->materno);		
				$this->email->subject($subject);
				$this->email->message($message);
				
				
				$enviado=false;
				
				if($this->email->send())		$enviado=true;

				$contador++;
			}
		/***************************************************************************************************/		
		/*************************Envio de Confirmación de alta de pregunta*********************************/
		$user = $this->MPerfilCliente->GetUser($postData['id_cat_usuario']);				

		$subject = "Notificación Profesiolandia - Pregunta";	  
				
		$message = "
		<html lang='en'>
		<head>
			
			<meta charset='utf-8'>
			<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
			<link href='http://obraspublicas.morelia.gob.mx/contratistas/css/style.css' rel='stylesheet' type='text/css'>
			<link href='http://obraspublicas.morelia.gob.mx/contratistas/css/bootstrap.min.css' rel='stylesheet'>
			<link href='http://obraspublicas.morelia.gob.mx/contratistas/css/mdb.min.css' rel='stylesheet'>
		</head>
		<body>
		<div class='container mt-n0'>
			<div class='container-fluid  py-3 px-3'>
			<div class='container' style='text-align: justify-all; font-family: Candara; font-size: 18px;'>
				
				<div class='row' style='text-align: center;'>
				<img src='http://obraspublicas.morelia.gob.mx/contratistas/images/Logo_.png' class='d-block' style='height: 200px; width: 450px;'  alt='Profesiolandia Logo'>
				</div>
				<strong>
						<h4 style='color: #007b5e'> <strong> Hola ". $user['usuario'] . "</strong> </h4>
				</strong>  
				<div class='row' style='text-align: center;'>
				Te enviamos este correo de <strong> Profesiolandia </strong> para confirmar alta de la pregunta al tipo de profesión <strong>".$postData['profesion']."</strong>   :<br>
				<strong>".$postData['pregunta']."</strong><br>
				Para consultar la pregunta con sus posibles respuetsas puedes dar click en la sig liga.
				</div>
				
				<p style='text-align: center;'>
					<a href='".base_url()."CPerfilCliente/index/".$user['id_cat_rol']."/".$user['id_cat_usuario']."/4' style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;' target='_blank'> <strong> Consultar  Respuestas </strong> </a>					      
					</p>
				<div class='row'>
				<div class='col' style='text-align: center;'  >
				Estamos seguros de que estas disfrutando la experiencia en Profesionalia, en esta plataforma encontraras a todos los profesionales de cada una de las especialidades en México
				</div>
				<br>
				
				<div class='row' style='text-align: center; font-size: 14px; color: gray;'>					 
					<a href='".base_url()."CRegistro/cancel/".$user['id_cat_rol']."/".$user['id_cat_usuario']."/4' target='_blank'>Anular la suscripción </a> | Enviado por Profesiolandia 
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
		$this->email->to($user['email'], $user['nombre']." ".$user['paterno']." ".$user['materno']);		
		$this->email->subject($subject);
		$this->email->message($message);
				
		$enviado=false;
		
		if($this->email->send())		$enviado=true;
		/***************************************************************************************************/		
		/***************************************************************************************************/		
		$resultado['save_update'] = $this->MPerfilCliente->save_update_pregunta();						
=======
		$resultado['save_update'] = $this->MPerfilCliente->save_update_pregunta();				
>>>>>>> 05e16327d818604f29ecf2cb5c3810a7fdcb5dfa
		echo json_encode($resultado);
	}

	public function get_pregunta(){
		$resultado['pregunta'] = $this->MPerfilCliente->get_pregunta();				
		echo json_encode($resultado);
	}

	public function delete_pregunta(){
		$resultado['delete'] = $this->MPerfilCliente->delete_pregunta();				
		echo json_encode($resultado);
	}
	

}





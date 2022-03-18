<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CAltaProfesional extends CI_Controller {
	function __construct()
	{
		parent::__construct();	
		date_default_timezone_set('America/Mexico_City');			
		$this->load->library('util');
		$this->load->library('sesion');
		$this->load->library("pagination");
		$this->load->library('peticion');
		
		$this->load->model('MAltaProfesional');
		$this->load->model('MProfesionales');
		$this->load->model('MMenu');
    }
    public function index(){

		if ($this->uri->segment(5)==null) 
			{
				$tab="1";
				$id_cat_pregunta ="-1";
			}
		else 							   
			{
				$id_cat_rol = $this->uri->segment(3);
				$id_cat_profesional =  $this->uri->segment(4);        
				$tab = $this->uri->segment(5);
				$id_cat_pregunta = $this->uri->segment(6);
				
				$this->session->set_userdata('sisdato', $id_cat_profesional);
				generaDatosSession2();
			}	
		$dataf = array(
			'tab'  => $tab,
			'id_cat_pregunta'  => $id_cat_pregunta			
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
			'seccion' => 'altaprofesional',
			'vista' => 'VAltaProfesional',
			'data' => '',
			'dataf' => $dataf,
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

	public function loadRecord()
	{
		
		$rowno=$this->input->post('pagno');

		$config = array();
        $config["base_url"] = base_url() . "CAltaProfesional";
        $config["total_rows"] = $this->MAltaProfesional->get_count(); 
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
		$pagination_data['publicaciones'] = $this->MAltaProfesional->ListadoPublicaciones($config["per_page"], $page);	
		$pagination_data['row'] = $rowno;
		
		echo json_encode($pagination_data);
	}	

	public function loadRecord_preguntas()
	{		
		$rowno=$this->input->post('pagno');

		$config = array();
        $config["base_url"] = base_url() . "CAltaProfesional";
        $config["total_rows"] = $this->MAltaProfesional->get_count_preguntas(); 
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
		$pagination_data['preguntas'] = $this->MAltaProfesional->ListadoPreguntas($config["per_page"], $page);	
		$pagination_data['row'] = $rowno;
		
		echo json_encode($pagination_data);
	}	

	public function save_update_publicacion(){
		$resultado['save_update'] = $this->MAltaProfesional->save_update_publicacion();				
		echo json_encode($resultado);
	}

	public function get_publicacion(){
		$resultado['publicacion'] = $this->MAltaProfesional->get_publicacion();				
		echo json_encode($resultado);
	}

	public function delete_publicacion(){
		$resultado['delete'] = $this->MAltaProfesional->delete_publicacion();				
		echo json_encode($resultado);
	}

	public function save_update_respuesta(){

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
		  
		
		/***************************************************************************************************/		
		/*************************Envio de respuesta*********************************/
		$profesional = $this->MAltaProfesional->GetProfesional($postData['id_cat_profesional']);					
				
		$subject = "Notificación Profesiolandia - Respuesta";	  
				
		$message = "
		<html lang='en'>
		<head>
			
			<meta charset='utf-8'>
			<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
			<link href='http://profesiolandia.com/mochoo/assets/css/style_profesiolandia.css' rel='stylesheet' type='text/css'>
			<link href='http://profesiolandia.com/mochoo/assets/css/bootstrap.min.css' rel='stylesheet'>
			<link href='http://profesiolandia.com/mochoo/assets/css/mdb.min.css' rel='stylesheet'>
		</head>
		<body>
		<div class='container mt-n0'>
			<div class='container-fluid  py-3 px-3'>
			<div class='container' style='text-align: justify-all; font-family: Candara; font-size: 18px;'>
				
				<div class='row' style='text-align: center;'>
				<img src='http://profesiolandia.com/mochoo/imagenes/Logo_Profesiolandia_perspectiva.png' class='d-block' style='height: 200px; width: 450px;'  alt='Profesiolandia Logo'>
				</div>
				<strong>
						<h4 style='color: #007b5e'> <strong> Hola ". $profesional['usuario'] . "</strong> </h4>
				</strong>  
				<div class='row' style='text-align: center;'>
				Te enviamos este correo de <strong> Profesiolandia </strong> para confirmar alta de la respuesta a la pregunta <strong>".$postData['pregunta']."</strong>   :<br>
				<strong>".$postData['respuesta']."</strong><br>
				Para consultar la pregunta con sus posibles respuestas puedes dar click en la sig liga.
				</div>
				
				<p style='text-align: center;'>
					<a href='".base_url()."CAltaProfesional/index/".$profesional['id_cat_rol']."/".$profesional['id_cat_profesional']."/4/".$postData['id_cat_pregunta']."' style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;' target='_blank'> <strong> Consultar  Respuestas </strong> </a>					      
					</p>
				<div class='row'>
				<div class='col' style='text-align: center;'  >
				Estamos seguros de que estas disfrutando la experiencia en Profesiolandia, en esta plataforma encontraras a todos los profesionales de cada una de las especialidades en México
				</div>
				<br>
				
				<div class='row' style='text-align: center; font-size: 14px; color: gray;'>					 
					<a href='".base_url()."CRegistro/cancel/".$profesional['id_cat_rol']."/".$postData['id_cat_profesional']."/".$profesional['code']."' target='_blank'>Cancelar Suscripción </a> | Enviado por Profesiolandia 
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
		$this->email->to($profesional['email'], $profesional['nombre']." ".$profesional['paterno']." ".$profesional['materno']);		
		$this->email->subject($subject);
		$this->email->message($message);
		
		$enviado=false;
		
		if($this->email->send())		$enviado=true;	
		
		//***************************************************************************************************		
		//***************************************************************************************************		
		$usuario = $this->MAltaProfesional->GetUsuario($postData['id_cat_pregunta']);				

		$subject = "Notificación Profesiolandia - Respuesta";	  
				
		$message = "
		<html lang='en'>
		<head>
			
			<meta charset='utf-8'>
			<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
			<link href='http://profesiolandia.com/mochoo/assets/css/style_profesiolandia.css' rel='stylesheet' type='text/css'>
			<link href='http://profesiolandia.com/mochoo/assets/css/bootstrap.min.css' rel='stylesheet'>
			<link href='http://profesiolandia.com/mochoo/assets/css/mdb.min.css' rel='stylesheet'>
		</head>
		<body>
		<div class='container mt-n0'>
			<div class='container-fluid  py-3 px-3'>
			<div class='container' style='text-align: justify-all; font-family: Candara; font-size: 18px;'>
				
				<div class='row' style='text-align: center;'>
				<img src='http://profesiolandia.com/mochoo/imagenes/Logo_Profesiolandia_perspectiva.png' class='d-block' style='height: 200px; width: 450px;'  alt='Profesiolandia Logo'>
				</div>
				<strong>
						<h4 style='color: #007b5e'> <strong> Hola ". $usuario['usuario'] . "</strong> </h4>
				</strong>  
				<div class='row' style='text-align: center;'>
				Te enviamos este correo de <strong> Profesiolandia </strong> para notificarte que tu pregunta <strong>".$postData['pregunta']."</strong>   fue contestada por un Profesional:<br>
				<strong>".$postData['respuesta']."</strong><br>
				Para consultar la pregunta con sus posibles respuestas puedes dar click en la sig liga.
				</div>
				
				<p style='text-align: center;'>					
					<a href='".base_url()."CPerfilCliente/index/".$usuario['id_cat_rol']."/".$usuario['id_cat_usuario']."/4/".$postData['id_cat_pregunta']."' style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;' target='_blank'> <strong> Consultar  Respuestas </strong> </a>					      
					</p>
				<div class='row'>
				<div class='col' style='text-align: center;'  >
				Estamos seguros de que estas disfrutando la experiencia en Profesiolandia, en esta plataforma encontraras a todos los profesionales de cada una de las especialidades en México
				</div>
				<br>
				
				<div class='row' style='text-align: center; font-size: 14px; color: gray;'>					 
					<a href='".base_url()."CRegistro/cancel/".$usuario['id_cat_rol']."/".$usuario['id_cat_usuario']."/".$usuario['code']."' target='_blank'>Cancelar Suscripción </a> | Enviado por Profesiolandia 
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
		$this->email->to($usuario['email'], $usuario['nombre']." ".$usuario['paterno']." ".$usuario['materno']);		
		$this->email->subject($subject);
		$this->email->message($message);
				
		$enviado=false;
		
		if($this->email->send())		$enviado=true;
        
		//***************************************************************************************************		
		//***************************************************************************************************		
		$resultado['save_update'] = $this->MAltaProfesional->save_update_respuesta();						
		echo json_encode($resultado);
	}

	public function save_profesion(){	
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
		  
		
		/***************************************************************************************************/		
		/*************************Envio de respuesta*********************************/
		$profesional = $this->MAltaProfesional->GetProfesional($postData['id_cat_profesional']);					
				
		$subject = "Notificación Profesiolandia - Solicitud de Alta de Profesión";	  
				
		$message = "
		<html lang='en'>
		<head>
			
			<meta charset='utf-8'>
			<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
			<link href='http://profesiolandia.com/mochoo/assets/css/style_profesiolandia.css' rel='stylesheet' type='text/css'>
			<link href='http://profesiolandia.com/mochoo/assets/css/bootstrap.min.css' rel='stylesheet'>
			<link href='http://profesiolandia.com/mochoo/assets/css/mdb.min.css' rel='stylesheet'>
		</head>
		<body>
		<div class='container mt-n0'>
			<div class='container-fluid  py-3 px-3'>
			<div class='container' style='text-align: justify-all; font-family: Candara; font-size: 18px;'>
				
				<div class='row' style='text-align: center;'>
				<img src='http://profesiolandia.com/mochoo/imagenes/Logo_Profesiolandia_perspectiva.png' class='d-block' style='height: 200px; width: 450px;'  alt='Profesiolandia Logo'>
				</div>
				<strong>
						<h4 style='color: #007b5e'> <strong> Hola ". $profesional['usuario'] . "</strong> </h4>
				</strong>  
				<div class='row' style='text-align: center;'>
				Te enviamos este correo de <strong> Profesiolandia </strong> para confirmar la solicitud de alta de <strong>".$postData['area_interes'].", ".$postData['profesion']."</strong> al catálogo de profesiones  <br>
				<br>
				En breve el equipo de profesiolandia validara tu solicitud y te informara del resultado.
				</div>
				
				
				<div class='row'>
				<div class='col' style='text-align: center;'  >
				Estamos seguros de que estas disfrutando la experiencia en Profesiolandia, en esta plataforma encontraras a todos los profesionales de cada una de las especialidades en México
				</div>
				<br>
				
				<div class='row' style='text-align: center; font-size: 14px; color: gray;'>					 
					<a href='".base_url()."CRegistro/cancel/".$profesional['id_cat_rol']."/".$profesional['id_cat_profesional']."/".$profesional['code']."' target='_blank'>Cancelar Suscripción </a> | Enviado por Profesiolandia 
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
		$this->email->to($profesional['email'], $profesional['nombre']." ".$profesional['paterno']." ".$profesional['materno']);		
		$this->email->subject($subject);
		$this->email->message($message);
		
		$enviado=false;
		
		if($this->email->send())		$enviado=true;	
		
		//***************************************************************************************************		
		//***************************************************************************************************			
		$resultado['save_profesion']=$this->MAltaProfesional->save_profesion();                
	    echo json_encode($resultado);
    }

	public function verificar_profesion(){
		$resultado['verificar'] = $this->MAltaProfesional->verificar_profesion();				
		echo json_encode($resultado);
	}

	public function get_score_respuesta(){
		$resultado['get_score_respuesta'] = $this->MAltaProfesional->get_score_respuesta();				
		echo json_encode($resultado);
	}
}





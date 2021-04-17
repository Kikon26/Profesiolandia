<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MCalendario extends CI_Model 
{

	function __construct()
	{
    parent::__construct();
    date_default_timezone_set('America/Mexico_City');
	}

	public function index()
	{	
	
  }


  public function ListadoProfesionales()
  {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $query="select 
            p.id_cat_profesional,
            p.nombre,
            p.paterno,
            p.materno,
            e.nombre as profesion,              
            p.email,
            p.usuario,
            p.imagen 
            from cat_profesionales as p inner join
            cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion";         
  
    $resultado = $sqlsrvDB->query($query);		
    return $resultado->result();    
  }

  public function ListadoClientes()
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $query="select id_cat_cliente,concat(nombre,' ',apellidos) as nombre from cat_clientes where activo=1";               
    
      $resultado = $sqlsrvDB->query($query);		
	    return $resultado->result();    
    }

  public function save_reservation()
  {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
    $postData = $this->input->post();

    $data = array(              
      'id_cat_profesional'  => $postData['id_cat_profesional'], 
      'id_cat_cliente'  => $postData['id_cat_cliente'], 
      'asunto'  => $postData['asunto'], 
      'color'  => $postData['color'],               
      'start'  => $postData['start'],               
      'end'  => $postData['end'],               
      'fecha_alta' => date("Y-m-d H:i:s")            
    );

    if($postData['id_cat_cita']=="-1")
    {      
      $resultado=$sqlsrvDB->insert('cat_citas',$data);
      return $sqlsrvDB->insert_id();                  
    } 
    else 
    {
      $sqlsrvDB->where('id_cat_cita', $postData['id_cat_cita']);      
      $resultado=$sqlsrvDB->update('cat_citas',$data);
      return $resultado;              
    }
    
    
    
    
  } 

  public function ConsultaCitasProfesional()
  {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();

    $query="select * from cat_citas where id_cat_profesional={$postData['id_cat_profesional']}";         
    
    $resultado = $sqlsrvDB->query($query);		
    return $resultado->result();        
  }
  public function DetalleCita()
  {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();
    
    $query="select * from cat_citas as c where c.id_cat_cita=".$postData['id_cat_cita'];
    $resultado = $sqlsrvDB->query($query);		
    return $resultado->result();        
  }
}

?>
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
      $query="select id_cat_usuario,concat(nombre,' ',paterno,' ',materno) as nombre from usuarios where id_cat_rol=3 and activo=1 order by nombre";               
    
      $resultado = $sqlsrvDB->query($query);		
	    return $resultado->result();    
    }

  public function save_reservation()
  {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
    $postData = $this->input->post();

    $data = array(              
      'id_cat_profesional'  => $postData['id_cat_profesional'], 
      'id_cat_usuario'  => $postData['id_cat_usuario'], 
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
      return $postData['id_cat_cita'];              
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

  public function get_horario_atencion()
  {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();
    
    $query="select * from cat_horario_atencion as h where h.id_cat_profesional=".$postData['id_cat_profesional']." and id_cat_dia=".$postData['id_cat_dia'] ;
    $resultado = $sqlsrvDB->query($query);		
    
    foreach ($resultado->result() as $row)
    {
       
        $before_minute = strtotime ( '-1 minute' , strtotime ($row->horario_apertura) ) ;     
        $after_minute = strtotime ( '+1 minute' , strtotime ($row->horario_apertura) ) ;     
   
       $return_arr['before'][] = array("min" => date ( 'H:i' , $before_minute) ,"max" => date ( 'H:i' , $after_minute));

       $before_minute = strtotime ( '-1 minute' , strtotime ($row->horario_termino) ) ;     
       $after_minute = strtotime ( '+1 minute' , strtotime ($row->horario_termino) ) ;     

       $return_arr['after'][] = array("min" => date ( 'H:i' , $before_minute) ,"max" => date ( 'H:i' , $after_minute));
       
    }
    /**********************************************citados*************************************************************************************************************/    
    $query="select time(start) as horario_apertura,time(end) as horario_termino  from cat_citas as c where c.id_cat_profesional=".$postData['id_cat_profesional']." and DAYOFWEEK(start)-1=".$postData['id_cat_dia'];
    $resultado = $sqlsrvDB->query($query);		
    
    foreach ($resultado->result() as $row)
    {  
        $before_minute = strtotime ( '-1 minute' , strtotime ($row->horario_apertura) ) ;     
        $after_minute = strtotime ( '+1 minute' , strtotime ($row->horario_apertura) ) ;     
   
       $return_arr['citas'][] = array("min" => date ( 'H:i' , $before_minute) ,"max" => date ( 'H:i' , $after_minute));       
    }


    return $return_arr;    
    //return $resultado->result();        
  }

  public function delete_reservation()
  {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
    $postData = $this->input->post();

    
    $sqlsrvDB->where('id_cat_cita', $postData['id_cat_cita']);      
    $resultado=$sqlsrvDB->delete('cat_citas');
    return $postData['id_cat_cita'];       
  } 

  public function get_dias_atencion()
  {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();

    $query="select id_cat_dia from cat_horario_atencion where id_cat_profesional={$postData['id_cat_profesional']}";         
    
    $resultado = $sqlsrvDB->query($query);		
    return $resultado->result();        
  }

}

?>
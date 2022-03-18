<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MRegistro extends CI_Model {

	function __construct()
	{
    parent::__construct();
    date_default_timezone_set('America/Mexico_City');
	}

	public function index()
	{	
	
    }
    
    public function save_usuario($code)
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
      $postData = $this->input->post();
      
      $data = array(              
        'usuario'  => $postData['usuario'], 
        'password'  => sha1($postData['password']),             
        'email'  => $postData['email'], 
        'id_cat_rol'  => $postData['id_cat_rol'],              
        'fecha_alta' => date("Y-m-d H:i:s"),
        'code'  => $code,              
        'activo' => 0
      );

      if ($postData['id_cat_rol']==2)  $resultado=$sqlsrvDB->insert('cat_profesionales',$data);           
      else                             $resultado=$sqlsrvDB->insert('usuarios',$data);           
            
      $id_usuario_profesional=$sqlsrvDB->insert_id();

      return $id_usuario_profesional;
    } 

    public function GetUser($id_cat_rol,$id_usuario_profesional)
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);

      if ($id_cat_rol==2)  $query="select * from cat_profesionales where id_cat_profesional='{$id_usuario_profesional}'";          
      else                 $query="select * from usuarios where id_cat_usuario='{$id_usuario_profesional}'";         
      
      $resultado = $sqlsrvDB->query($query);		                
      return $resultado->row_array();
      
    }


    public function CatalogoRoles()
    {
		$sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $query="select id_cat_rol,descripcion from cat_roles where id_cat_rol in (2,3) order by id_cat_rol";         
        $resultado = $sqlsrvDB->query($query);		
		return $resultado->result();        
    }

    public function Activate($id_cat_rol,$id_usuario_profesional)
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);

      $data = array(             
        'activo' => 1
        );      

      if ($id_cat_rol==2)
      {
        $sqlsrvDB->where('id_cat_profesional', $id_usuario_profesional);      
        $resultado=$sqlsrvDB->update('cat_profesionales',$data);    
      }
      else 
      {
        $sqlsrvDB->where('id_cat_usuario', $id_usuario_profesional);      
        $resultado=$sqlsrvDB->update('usuarios',$data);    
        
      }
      
      return $resultado;              
    }

    public function Cancel($id_cat_rol,$id_usuario_profesional)
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);

      $data = array(             
        'activo' => 0
        );      

      if ($id_cat_rol==2)
      {
        $sqlsrvDB->where('id_cat_profesional', $id_usuario_profesional);      
        $resultado=$sqlsrvDB->update('cat_profesionales',$data);    
      }
      else 
      {
        $sqlsrvDB->where('id_cat_usuario', $id_usuario_profesional);      
        $resultado=$sqlsrvDB->update('usuarios',$data);            
      }
      
      return $resultado;              
    }

    public function habilitar_subscripcion($id_cat_rol,$id_usuario_profesional)
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);

      $data = array(             
        'activo' => 1
        );      

      if ($id_cat_rol==2)
      {
        $sqlsrvDB->where('id_cat_profesional', $id_usuario_profesional);      
        $resultado=$sqlsrvDB->update('cat_profesionales',$data);    
      }
      else 
      {
        $sqlsrvDB->where('id_cat_usuario', $id_usuario_profesional);      
        $resultado=$sqlsrvDB->update('usuarios',$data);            
      }
      
      return $resultado;              
    }

    
    public function VerificarExisteEmail()
    {
		$sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();

    $query="select exists
            (
              select 1 from 
              (
                select email from usuarios union select email from cat_profesionales 
              ) as t where t.email='".$postData['email']."' 
            )  as existe";         
        $resultado = $sqlsrvDB->query($query);		
		return $resultado->result();        
    }
}

?>
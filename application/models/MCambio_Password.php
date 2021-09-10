<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MCambio_Password extends CI_Model {

	function __construct()
	{
    parent::__construct();
    date_default_timezone_set('America/Mexico_City');
	}

	public function index()
	{	
	
  }

  public function GetUser($id_cat_rol,$id_usuario_profesional)
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);

      if ($id_cat_rol==2)  $query="select * from cat_profesionales where id_cat_profesional='{$id_usuario_profesional}'";          
      else                 $query="select * from usuarios where id_cat_usuario='{$id_usuario_profesional}'";         
      
      $resultado = $sqlsrvDB->query($query);		                
      return $resultado->row_array();
      
    }

  public function update_password()
  {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);        
    $postData = $this->input->post();

    $data = array(                  
      'password'  => sha1($postData['password']),             
      'fecha_alta' => date("Y-m-d H:i:s"),      
      'activo' => 1
    );

    if ($postData['id_cat_rol']==2)  
      {
        $sqlsrvDB->where('id_cat_profesional', $postData['id_usuario_profesional']);      
        $resultado=$sqlsrvDB->update('cat_profesionales',$data);          
      }  
    else 
    {
      $sqlsrvDB->where('id_cat_usuario', $postData['id_usuario_profesional']);      
      $resultado=$sqlsrvDB->update('usuarios',$data);            
    }   
    return $resultado;                 
  }     
	

}

?>
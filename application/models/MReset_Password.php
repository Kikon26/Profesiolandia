<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MReset_Password extends CI_Model {

	function __construct()
	{
    parent::__construct();
    date_default_timezone_set('America/Mexico_City');
	}

	public function index()
	{	
	
  }

  public function GetUser($email)
  {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);

    $query="select * from 
            (
              select id_cat_usuario as id_usuario_profesional, id_cat_rol,usuario, email from usuarios union
              select id_cat_profesional as id_usuario_profesional,id_cat_rol,usuario, email from cat_profesionales
            ) as t where t.email='{$email}'";         
    
    $resultado = $sqlsrvDB->query($query);		                
    return $resultado->row_array();
    
  }

  public function update_usuario($id_cat_rol,$id_usuario_profesional,$code)
  {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);        
    $data = array(                  
      'fecha_alta' => date("Y-m-d H:i:s"),
      'code'  => $code,              
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
  } 

}

?>
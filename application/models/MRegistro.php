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
    
    public function save_usuario()
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
      $postData = $this->input->post();
      
      $data = array(              
        'usuario'  => $postData['usuario'], 
        'password'  => sha1($postData['password']),             
        'email'  => $postData['email'], 
        'id_cat_rol'  => $postData['id_cat_rol'],              
        'fecha_alta' => date("Y-m-d H:i:s"),
        'activo' => 1
      );

      if ($postData['id_cat_rol']==2)  $resultado=$sqlsrvDB->insert('cat_profesionales',$data);           
      else                             $resultado=$sqlsrvDB->insert('usuarios',$data);           
            
      return $resultado;              
    } 


    public function CatalogoRoles()
    {
		$sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $query="select id_cat_rol,descripcion from cat_roles where id_cat_rol in (2,3) order by id_cat_rol";         
        $resultado = $sqlsrvDB->query($query);		
		return $resultado->result();        
    }
}

?>
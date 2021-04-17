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
    
    public function save_usuario($file_name)
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
      $postData = $this->input->post();
      
      if ($postData['id_cat_rol']==2)
      {
          $data = array(              
            'usuario'  => $postData['usuario'], 
            'password'  => sha1($postData['password']), 
    
            //'especialidad'  => $postData['especialidad'], 
            //'descripcion'  => $postData['descripcion'], 
    
            'nombre'  => $postData['nombre'], 
            'paterno'  => $postData['paterno'], 
            'materno'  => $postData['materno'], 
            'id_cat_rol'  => "2", 
            'email'  => $postData['email'], 

            //'id_cat_profesion'  => $postData['id_cat_profesion'],  
            //'costo_consulta'  => $postData['costo_consulta'],  

            'imagen'  => $file_name,                   
            'fecha_alta' => date("Y-m-d H:i:s"),
            'activo' => 1
          );      
    
          $resultado=$sqlsrvDB->insert('cat_profesionales',$data);
          $id_cat_profesional=$sqlsrvDB->insert_id();
          /*************************************************************************/
          $data = array(     
            'id_cat_profesional'  => $id_cat_profesional,          
            'id_cat_estado'  => $postData['id_cat_estado'], 
            'municipio'  => $postData['mpio'], 
            'colonia'  => $postData['colonia'], 
            'calle'  => $postData['calle'], 
            'num'  => $postData['num'], 
            'cp'  => $postData['cp'],         
            'tel'  => $postData['telefono'],          
            'activo' => 1
          );      
          $resultado=$sqlsrvDB->insert('cat_direcciones',$data);
      }
      else 
      {
          $data = array(              
            'usuario'  => $postData['usuario'], 
            'password'  => sha1($postData['password']), 
            'nombre'  => $postData['nombre'], 
            'paterno'  => $postData['paterno'], 
            'materno'  => $postData['materno'], 
            'email'  => $postData['email'], 
            'id_cat_rol'  => $postData['id_cat_rol'],  
            'imagen'  => $file_name,                   
            'fecha_alta' => date("Y-m-d H:i:s"),
            'activo' => 1
          );
              
          $resultado=$sqlsrvDB->insert('usuarios',$data);           
          $id_cat_usuario=$sqlsrvDB->insert_id();
          
          $data = array(     
            'id_cat_usuario'  => $id_cat_usuario,          
            'id_cat_estado'  => $postData['id_cat_estado'], 
            'municipio'  => $postData['mpio'], 
            'colonia'  => $postData['colonia'], 
            'calle'  => $postData['calle'], 
            'num'  => $postData['num'], 
            'cp'  => $postData['cp'],         
            'tel'  => $postData['telefono'],          
            'activo' => 1
          );      
          $resultado=$sqlsrvDB->insert('cat_direcciones',$data); 
      }
      




      return $resultado;              
    } 


    public function CatalogoRoles()
    {
		$sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $query="select id_cat_rol,descripcion from cat_roles where id_cat_rol in (2,3) order by id_cat_rol";         
        $resultado = $sqlsrvDB->query($query);		
		return $resultado->result();        
    }


    public function CatalogoEstados()
    {
		$sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $query="select * from cat_estados where activo=1 order by nombre";         
        $resultado = $sqlsrvDB->query($query);		
		return $resultado->result();        
    }    
	
}

?>
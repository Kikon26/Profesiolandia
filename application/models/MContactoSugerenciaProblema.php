<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MContactoSugerenciaProblema extends CI_Model {

	function __construct()
	{
    parent::__construct();
    date_default_timezone_set('America/Mexico_City');
	}

	public function index()
	{	
	
    }
    
    public function save_formulario()
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
      $postData = $this->input->post();
      
      $data = array(              
        'nombre'  => $postData['nombre'],         
        'email'  => $postData['email'], 
        'asunto'  => $postData['asunto'], 
        'mensaje'  => $postData['mensaje'], 
        'id_cat_tipo_formulario'  => $postData['id_cat_tipo_formulario'],              
        'fecha_alta' => date("Y-m-d H:i:s")        
      );

      $resultado=$sqlsrvDB->insert('cat_formulario',$data);           
            
      $id_cat_formulario=$sqlsrvDB->insert_id();

      return $id_cat_formulario;
    } 

    public function CatalogoTipoFormulario()
    {
		$sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $query="select id_cat_tipo_formulario,tipo_formulario from cat_tipo_formulario order by id_cat_tipo_formulario";         
        $resultado = $sqlsrvDB->query($query);		
		return $resultado->result();        
    }     
        
    public function GetTipo($id_cat_tipo_formulario)
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);

      $query="select * from cat_tipo_formulario where id_cat_tipo_formulario='{$id_cat_tipo_formulario}'";         
      
      $resultado = $sqlsrvDB->query($query);		                
      return $resultado->row_array();
      
    }

    public function GetUser($id_cat_rol,$id_usuario_profesional)
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);

      if ($id_cat_rol==2)  $query="select * from cat_profesionales where id_cat_profesional='{$id_usuario_profesional}'";          
      else                 $query="select * from usuarios where id_cat_usuario='{$id_usuario_profesional}'";         
      
      $resultado = $sqlsrvDB->query($query);		                
      return $resultado->row_array();
      
    }
  
}

?>
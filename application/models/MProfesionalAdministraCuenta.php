<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MProfesionalAdministraCuenta extends CI_Model {

	function __construct()
	{
    parent::__construct();
    date_default_timezone_set('America/Mexico_City');
	}

	public function index()
	{	
	
    }

  public function DetalleUsuario($id_cat_profesional)
  {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();

    $query="select  
            s.nombre as estado,                                    
            p.usuario,
            p.nombre,
            p.paterno,
            p.materno,
            p.email,
            p.imagen,
            d.id_cat_estado,
            d.municipio,
            d.colonia,
            d.calle,
            d.num,
            d.cp,
            d.tel                                    
            from cat_profesionales as p left join             
            cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional and d.dom_particular=1  left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado
            where p.id_cat_profesional={$id_cat_profesional} "; 

  
    $resultado = $sqlsrvDB->query($query);		
    return $resultado->result();    
  }  

  public function update_usuario($file_name)
    {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
    $postData = $this->input->post();
      
    $data = array(              
      'usuario'  => $postData['usuario'], 			
      'nombre'  => $postData['nombre'], 
      'paterno'  => $postData['paterno'], 
      'materno'  => $postData['materno'], 
      'email'  => $postData['email'], 					
      'fecha_alta' => date("Y-m-d H:i:s"),
      'activo' => 1
      ); 
      

    if (isset($postData['imagen_perfil']))
    {
      $source = './assets/images/profesionales/'.$postData['imagen_perfil'];                 
      unlink($source);       
      $data['imagen'] = $file_name;
    }		

    $sqlsrvDB->where('id_cat_profesional', $postData['id_cat_profesional']);      
    $resultado=$sqlsrvDB->update('cat_profesionales',$data);  		
    /*************************************************************************/
    
    $data = array(  
    'id_cat_usuario'  => null,             
    'id_cat_profesional'  => $postData['id_cat_profesional'],          
    'id_cat_estado'  => $postData['id_cat_estado'], 
    'municipio'  => $postData['mpio'], 
    'colonia'  => $postData['colonia'], 
    'calle'  => $postData['calle'], 
    'num'  => $postData['num'], 
    'cp'  => $postData['cp'],         
    'tel'  => $postData['telefono'],    
    'dom_particular' => 1,      
    'activo' => 1
    );      

    if ($postData['existe_direccion']=="si")
    {
      $sqlsrvDB->where('id_cat_profesional', $postData['id_cat_profesional']);      
      $sqlsrvDB->where('dom_particular', '1');      
      $resultado=$sqlsrvDB->update('cat_direcciones',$data);    
    }
    else 
      $resultado=$sqlsrvDB->insert('cat_direcciones',$data);           
      
      
      return $resultado;              
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
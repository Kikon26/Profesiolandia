<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MKike extends CI_Model {

	function __construct()
	{
    parent::__construct();
    date_default_timezone_set('America/Mexico_City');
	}

	public function index()
	{	
	
    }

	public function DetalleUsuario($id_cat_usuario)
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
            from usuarios as p inner join             
            cat_direcciones as d on d.id_cat_usuario=p.id_cat_usuario and p.id_cat_usuario={$id_cat_usuario} left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado"; 

  
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
			$source = './assets/images/users/'.$postData['imagen_perfil'];                 
			unlink($source);       
			$data['imagen'] = $file_name;
		}		

		if ( $postData['password']<>"")  
			$data['password']= sha1($postData['password']); 

		$sqlsrvDB->where('id_cat_usuario', $postData['id_cat_usuario']);      
		$resultado=$sqlsrvDB->update('usuarios',$data);  		
		/*************************************************************************/
		
		$data = array(  
		'id_cat_profesional'  => null,             
		'id_cat_usuario'  => $postData['id_cat_usuario'],          
		'id_cat_estado'  => $postData['id_cat_estado'], 
		'municipio'  => $postData['mpio'], 
		'colonia'  => $postData['colonia'], 
		'calle'  => $postData['calle'], 
		'num'  => $postData['num'], 
		'cp'  => $postData['cp'],         
		'tel'  => $postData['telefono'],          
		'activo' => 1
		);      
		$sqlsrvDB->where('id_cat_usuario', $postData['id_cat_usuario']);      
		$resultado=$sqlsrvDB->update('cat_direcciones',$data);    
      
      
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
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

	

}

?>
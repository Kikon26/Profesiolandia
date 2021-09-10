<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MClientes extends CI_Model {

	function __construct()
	{
    parent::__construct();
    date_default_timezone_set('America/Mexico_City');
	}

	public function index()
	{	
	
    }
    
    public function ListadoClientes()
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $query="select 
                c.id_cat_cliente,
                c.nombre,
                c.apellidos,
                c.`cel`,
                c.correo       
                from `cat_clientes` as c";         
    
      $resultado = $sqlsrvDB->query($query);		
	  return $resultado->result();
    
    }
    
    public function save_cliente()
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
      $postData = $this->input->post();
      
      $data = array(              
              'nombre'  => $postData['cliente_nombre'], 
              'apellidos'  => $postData['cliente_apellidos'], 
              'cel'  => $postData['cliente_cel'], 
              'correo'  => $postData['cliente_correo'],               
              'fecha_alta' => date("Y-m-d H:i:s"),
              'activo' => "1"
          );
    
      $resultado=$sqlsrvDB->insert('cat_clientes',$data);
      return $resultado;              
    } 
    
    public function update_cliente()
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
      $postData = $this->input->post();
      
        
        $data = array(              
            'nombre'  => $postData['cliente_nombre'],            
            'apellidos'  => $postData['cliente_apellidos'], 
            'cel'  => $postData['cliente_cel'], 
            'correo'  => $postData['cliente_correo'],             
            'fecha_alta' => date("Y-m-d H:i:s")
        );
              
    $sqlsrvDB->where('id_cat_cliente', $postData['cliente_id_cat_cliente']);
      
      $resultado=$sqlsrvDB->update('cat_clientes',$data);
      return $resultado;              
    } 
    
    public function delete_cliente()
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
      $postData = $this->input->post();
      
      $sqlsrvDB->where('id_cat_cliente', $postData['cliente_id_cat_cliente']);
      $resultado=$sqlsrvDB->delete('cat_clientes');
      return $resultado;              
    }	
}

?>
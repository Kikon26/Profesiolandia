<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MPerfilCliente extends CI_Model {

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
            from usuarios as p left join             
            cat_direcciones as d on d.id_cat_usuario=p.id_cat_usuario and d.dom_particular=1  left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado
            where p.id_cat_usuario={$id_cat_usuario} "; 

  
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
    'dom_particular' => 1,           
		'activo' => 1
		);      

    if ($postData['existe_direccion']=="si")
    {
      $sqlsrvDB->where('id_cat_usuario', $postData['id_cat_usuario']);      
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
	
	public function get_count() 
    { 
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $postData = $this->input->post();

      $array_where = array();
                          
      $array_where=array_merge($array_where,array('f.id_cat_usuario=' => $postData['id_cat_usuario']));
      

      $query="select 
              p.id_cat_profesional, 
              s.nombre as estado,
              d.municipio,
              e.nombre as profesion,
              p.especialidad,
              p.descripcion,
              p.costo_consulta,
              p.imagen,
              concat(p.nombre,' ',p.paterno,' ',p.materno )  as profesionista,
              o.opinion, 
              ifnull(o.calificacion,0) as calificacion,
              d.tel,
              concat(d.calle,' ',d.num,', ',d.colonia ) as direccion                           
              from 
			  cat_favoritos as f inner join 
              cat_profesionales as p on p.id_cat_profesional=f.id_cat_profesional inner join 			  
              cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion left join 
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional "
      
              .$this->obtener($array_where)

              ." order by calificacion desc ";         
    
      return $sqlsrvDB->query($query)->num_rows();
    }  

    public function ListadoProfesionalesFavoritos($limit, $start)
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $postData = $this->input->post();

      $array_where = array();          
      
      $array_where=array_merge($array_where,array('f.id_cat_usuario=' => $postData['id_cat_usuario']));
      

      $query="select  
              p.id_cat_profesional, 
              s.nombre as estado,
              d.municipio,
              e.nombre as profesion,
              p.especialidad,
              p.descripcion,
              p.costo_consulta,
              p.imagen,
              concat(p.nombre,' ',p.paterno,' ',p.materno )  as profesionista,
              o.opinion,
              ifnull(o.calificacion,0) as calificacion,
              d.tel,
              concat(d.calle,' ',d.num,', ',d.colonia ) as direccion             
              
              from 
			  cat_favoritos as f inner join 
              cat_profesionales as p on p.id_cat_profesional=f.id_cat_profesional inner join 			  
              cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion left join 
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional  "
 
              .$this->obtener($array_where)

              ." order by calificacion desc ";         
            //   ." limit ".$start.",".$limit;         
               
       
      $resultado = $sqlsrvDB->query($query);		
      return $resultado->result();
    
    }

	public function obtener($condicion=array(), $campos='*') 
    {
        $where = "";
        
        $total = count($condicion);
        if ($total > 0) {
            $where .= "WHERE ";
            $i = 1;
            foreach ($condicion as $key => $item) {
                if (is_array($item)) 
                    $item = (isset($item[1]) && $item[1] == 'string') ? "'$item[0]'" : $item[0]; 
                $where .= "$key $item ";
                if ($i < $total) $where .= "AND ";
                $i++;
            }
        }
               
        return $where;
    }  

}

?>
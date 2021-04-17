<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MBuscar extends CI_Model {

	function __construct()
	{
    parent::__construct();
    date_default_timezone_set('America/Mexico_City');
	}

	public function index()
	{	
	
  }

    public function get_count() 
    { 
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $postData = $this->input->post();
      $array_where = array();
      
      if ($postData['filtrar']<>"")        
        $array_where=array_merge($array_where,array('(p.nombre like' => "'%".$postData['filtrar']."%' 
                                                      or p.paterno like '%".$postData['filtrar']."%' 
                                                      or p.materno like '%".$postData['filtrar']."%'                                                      
                                                      )        
                                                      "));                       
      if ($postData['id_cat_profesion']<>"") $array_where=array_merge($array_where,array('e.id_cat_profesion=' => $postData['id_cat_profesion']));
      if ($postData['id_cat_estado']<>"")    $array_where=array_merge($array_where,array('s.id_cat_estado=' => $postData['id_cat_estado']));

      $query="select  
              p.id_cat_profesional, 
              s.nombre as estado,
              d.municipio,
              e.nombre as profesion,
              p.especialidad,
              p.descripcion,
              p.costo_consulta,
              p.imagen,
              p.id_cat_profesional,
              concat(p.nombre,' ',p.paterno,' ',p.materno )  as profesionista,
              o.opinion,
              d.tel,
              concat(d.calle,' ',d.num,', ',d.colonia ) as direccion              
              
              from cat_profesionales as p inner join 
              cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion left join 
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional "
      
              .$this->obtener($array_where);
    
      return $sqlsrvDB->query($query)->num_rows();
    }  

    public function ListadoProfesionales($limit, $start)
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $postData = $this->input->post();

      $array_where = array();    
      
      if ($postData['filtrar']<>"")        
      $array_where=array_merge($array_where,array('(p.nombre like' => "'%".$postData['filtrar']."%' 
                                                    or p.paterno like '%".$postData['filtrar']."%' 
                                                    or p.materno like '%".$postData['filtrar']."%'                                                      
                                                    )        
                                                    "));                       
      if ($postData['id_cat_profesion']<>"") $array_where=array_merge($array_where,array('e.id_cat_profesion=' => $postData['id_cat_profesion']));
      if ($postData['id_cat_estado']<>"")    $array_where=array_merge($array_where,array('s.id_cat_estado=' => $postData['id_cat_estado']));

      $query="select  
              p.id_cat_profesional, 
              s.nombre as estado,
              d.municipio,
              e.nombre as profesion,
              p.especialidad,
              p.descripcion,
              p.costo_consulta,
              p.imagen,
              p.id_cat_profesional,
              concat(p.nombre,' ',p.paterno,' ',p.materno )  as profesionista,
              o.opinion,
              d.tel,
              concat(d.calle,' ',d.num,', ',d.colonia ) as direccion              
              
              from cat_profesionales as p inner join 
              cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion left join 
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional  "
 
              .$this->obtener($array_where)

              ." limit ".$start.",".$limit;         
               
       
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


    public function ListadoProfesiones()
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $query="select * from cat_profesiones where activo=1";               
    
      $resultado = $sqlsrvDB->query($query);		
	    return $resultado->result();    
    }

    public function ListadoEstados()
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $query="select * from cat_estados where activo=1";         
    
      $resultado = $sqlsrvDB->query($query);		
	    return $resultado->result();    
    }
    
    public function ConsultaCitasProfesional()
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $postData = $this->input->post();

      $query="select * from cat_citas where id_cat_profesional={$postData['id_cat_profesional']}";         
      
      $resultado = $sqlsrvDB->query($query);		
	    return $resultado->result();    
    }
	
}

?>
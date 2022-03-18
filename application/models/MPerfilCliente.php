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
      if ($postData['id_cat_profesion']<>"") $array_where=array_merge($array_where,array('e.id_cat_profesion=' => $postData['id_cat_profesion']));

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
              d.tel,
              concat(d.calle,' ',d.num,', ',d.colonia ) as direccion,
              ifnull(v.total_valoraciones,0) as total_valoraciones,
              ifnull(v.val_gral,0) as val_gral                           
              from 
			        cat_favoritos as f inner join 
              cat_profesionales as p on p.id_cat_profesional=f.id_cat_profesional inner join 			  
              cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion left join 
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional and d.dom_particular=0 left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_valoraciones as o on o.id_cat_profesional=p.id_cat_profesional left join
              (
                select 
                v.id_cat_profesional,
                count(*) as total_valoraciones,
                round (sum(atencion+calidad+puntualidad+instalaciones+recomendacion)/(count(*)*5),0) as val_gral
                from cat_valoraciones as v                 
                group by v.id_cat_profesional
              ) as v  on v.id_cat_profesional=p.id_cat_profesional "
      
              .$this->obtener($array_where);

              //." order by calificacion desc ";         
    
      return $sqlsrvDB->query($query)->num_rows();
    }  

    public function ListadoProfesionalesFavoritos($limit, $start)
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $postData = $this->input->post();

      $array_where = array();          
      
      $array_where=array_merge($array_where,array('f.id_cat_usuario=' => $postData['id_cat_usuario']));      
      if ($postData['id_cat_profesion']<>"") $array_where=array_merge($array_where,array('e.id_cat_profesion=' => $postData['id_cat_profesion']));

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
              d.tel,
              concat(d.calle,' ',d.num,', ',d.colonia ) as direccion,
              ifnull(v.total_valoraciones,0) as total_valoraciones,
              ifnull(v.val_gral,0) as val_gral                                  
              
              from 
			        cat_favoritos as f inner join 
              cat_profesionales as p on p.id_cat_profesional=f.id_cat_profesional inner join 			  
              cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion left join 
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional and d.dom_particular=0 left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_valoraciones as o on o.id_cat_profesional=p.id_cat_profesional left join
              (
                select 
                v.id_cat_profesional,
                count(*) as total_valoraciones,
                round (sum(atencion+calidad+puntualidad+instalaciones+recomendacion)/(count(*)*5),0) as val_gral
                from cat_valoraciones as v                 
                group by v.id_cat_profesional
              ) as v  on v.id_cat_profesional=p.id_cat_profesional "
 
              .$this->obtener($array_where);

              //." order by calificacion desc ";         
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

    public function get_count_contenido_interes() 
    { 
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $postData = $this->input->post();

      $array_where = array();          
            
      if ($postData['id_cat_profesion']<>"") $array_where=array_merge($array_where,array('pr2.id_cat_profesion=' => $postData['id_cat_profesion']));
        
      $query="select 
              p.id_cat_publicacion,   
              p.id_cat_profesional,
              pr2.area_interes,
              pr2.nombre as profesion,
              p.titulo,
              p.resumen,
              p.publicacion,
              DATE_FORMAT(p.fecha_alta,'%d/%m/%Y') as fecha_alta

              from 
              usuarios as u inner join 
              cat_favoritos as f on u.id_cat_usuario={$postData['id_cat_usuario']} and f.id_cat_usuario=u.id_cat_usuario   inner join 
              cat_publicaciones as p on p.id_cat_profesional=f.id_cat_profesional and p.fecha_alta>=u.fecha_alta inner join  
              cat_profesionales as pr on pr.id_cat_profesional=p.id_cat_profesional inner join 
              cat_profesiones as pr2 on pr2.id_cat_profesion=pr.id_cat_profesion "
              
              .$this->obtener($array_where) . 
              
              "order by p.fecha_alta desc";             
    
      return $sqlsrvDB->query($query)->num_rows();
    }  

    public function ListadoPublicaciones($limit, $start)
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $postData = $this->input->post();
      
      $array_where = array();          
            
      if ($postData['id_cat_profesion']<>"") $array_where=array_merge($array_where,array('pr2.id_cat_profesion=' => $postData['id_cat_profesion']));

      
      $query="select   
              p.id_cat_publicacion,   
              p.id_cat_profesional,
              pr2.area_interes,
              pr2.nombre as profesion,
              p.titulo,
              p.resumen,
              p.publicacion,
              DATE_FORMAT(p.fecha_alta,'%d/%m/%Y') as fecha_alta

              from 
              usuarios as u inner join 
              cat_favoritos as f on u.id_cat_usuario={$postData['id_cat_usuario']} and f.id_cat_usuario=u.id_cat_usuario   inner join 
              cat_publicaciones as p on p.id_cat_profesional=f.id_cat_profesional and p.fecha_alta>=u.fecha_alta inner join  
              cat_profesionales as pr on pr.id_cat_profesional=p.id_cat_profesional inner join 
              cat_profesiones as pr2 on pr2.id_cat_profesion=pr.id_cat_profesion "
              
              .$this->obtener($array_where) . 

              "order by p.fecha_alta desc";             

              //." limit ".$start.",".$limit;                        
       
      $resultado = $sqlsrvDB->query($query);		
      return $resultado->result();
    
    }  

    public function get_count_preguntas() 
    { 
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $postData = $this->input->post();
        
      $query="SELECT  
                p.id_cat_pregunta,
                p.pregunta,
                DATE_FORMAT(p.fecha_alta,'%d/%m/%Y') as fecha_alta_pregunta,
                r.id_cat_respuesta,
                r.respuesta,
                DATE_FORMAT(r.fecha_alta_respuesta,'%d/%m/%Y') as fecha_alta_respuesta,                
                r.carrera,
                r.profesional, 
                r.imagen,
                ifnull(r.total_valoraciones,0) as total_valoraciones,
                ifnull(r.val_gral,0) as val_gral
                from 
                (SELECT * FROM cat_preguntas WHERE id_cat_usuario={$postData['id_cat_usuario']}) AS p LEFT JOIN
                (
                  SELECT 
                  r.id_cat_pregunta,
                  r.id_cat_respuesta,
                  r.respuesta,
                  r.fecha_alta as fecha_alta_respuesta,                  
                  pe.nombre AS carrera,
                  CONCAT(pr.nombre,' ',pr.paterno,' ',pr.materno) AS profesional, 
                  pr.imagen,
                  ifnull(v.total_valoraciones,0) as total_valoraciones,
                  ifnull(v.val_gral,0) as val_gral
                  FROM 
                
                  cat_respuestas AS r   INNER JOIN 
                  cat_profesionales AS pr ON pr.id_cat_profesional=r.id_cat_profesional INNER JOIN 
                  cat_profesiones AS pe ON pe.id_cat_profesion=pr.id_cat_profesion left join 
                  (
                    select 
                    v.id_cat_profesional,
                    count(*) as total_valoraciones,
                    round (sum(atencion+calidad+puntualidad+instalaciones+recomendacion)/(count(*)*5),0) as val_gral
                    from cat_valoraciones as v                 
                    group by v.id_cat_profesional
                  ) as v  on v.id_cat_profesional=pr.id_cat_profesional



                ) AS r ON r.id_cat_pregunta=p.id_cat_pregunta 
                order by  p.id_cat_pregunta desc
                ";
    
      return $sqlsrvDB->query($query)->num_rows();
    }  

    public function ListadoPreguntas($limit, $start)
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $postData = $this->input->post();

      $query="SELECT  
                p.id_cat_pregunta,
                p.pregunta,
                DATE_FORMAT(p.fecha_alta,'%d/%m/%Y') as fecha_alta_pregunta,
                r.id_cat_respuesta,
                r.respuesta,
                DATE_FORMAT(r.fecha_alta_respuesta,'%d/%m/%Y') as fecha_alta_respuesta,                
                r.carrera,
                r.id_cat_profesional,
                r.profesional, 
                r.imagen,
                ifnull(r.total_valoraciones,0) as total_valoraciones,
                ifnull(r.val_gral,0) as val_gral
                from 
                (SELECT * FROM cat_preguntas WHERE id_cat_usuario={$postData['id_cat_usuario']}) AS p LEFT JOIN
                (
                  SELECT 
                  r.id_cat_pregunta,
                  r.id_cat_respuesta,
                  r.respuesta,
                  r.fecha_alta as fecha_alta_respuesta,                  
                  pe.nombre AS carrera,
                  pr.id_cat_profesional,
                  CONCAT(pr.nombre,' ',pr.paterno,' ',pr.materno) AS profesional, 
                  pr.imagen,
                  ifnull(v.total_valoraciones,0) as total_valoraciones,
                  ifnull(v.val_gral,0) as val_gral
                  FROM 
                
                  cat_respuestas AS r   INNER JOIN 
                  cat_profesionales AS pr ON pr.id_cat_profesional=r.id_cat_profesional INNER JOIN 
                  cat_profesiones AS pe ON pe.id_cat_profesion=pr.id_cat_profesion left join 
                  (
                    select 
                    v.id_cat_profesional,
                    count(*) as total_valoraciones,
                    round (sum(atencion+calidad+puntualidad+instalaciones+recomendacion)/(count(*)*5),0) as val_gral
                    from cat_valoraciones as v                 
                    group by v.id_cat_profesional
                  ) as v  on v.id_cat_profesional=pr.id_cat_profesional

                ) AS r ON r.id_cat_pregunta=p.id_cat_pregunta 
                order by  p.id_cat_pregunta desc
                ";

              //." limit ".$start.",".$limit;                        
       
      $resultado = $sqlsrvDB->query($query);		
      return $resultado->result();
    
    }  
    
    public function get_publicacion() 
    { 
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $postData = $this->input->post();
        
      $query="select  p.* from cat_favoritos as f inner join cat_publicaciones as p on f.id_cat_usuario={$postData['id_cat_usuario']} and id_cat_publicacion={$postData['id_cat_publicacion']} and p.id_cat_profesional=f.id_cat_profesional order by p.id_cat_publicacion";             
    
      $resultado = $sqlsrvDB->query($query);		
      return $resultado->result();
    }  

    public function save_update_pregunta()
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
      $postData = $this->input->post();
          
        $data = array(             
            'id_cat_usuario'  => $postData['id_cat_usuario'], 
            'id_cat_profesion'  => $postData['id_cat_profesion'], 
            'pregunta'  => $postData['pregunta'],             
            'fecha_alta' => date("Y-m-d H:i:s")            
        );
     
  
      if ($postData['id_cat_pregunta']=="-1")
        {
          $resultado=$sqlsrvDB->insert('cat_preguntas',$data);          
          $id_cat_pregunta=$sqlsrvDB->insert_id();
        }
      else
        {
          $sqlsrvDB->where('id_cat_usuario', $postData['id_cat_usuario']);
          $sqlsrvDB->where('id_cat_pregunta', $postData['id_cat_pregunta']);
          $resultado=$sqlsrvDB->update('cat_preguntas',$data);
          $id_cat_pregunta=$postData['id_cat_pregunta'];
        }
      
      return $id_cat_pregunta;   
    } 

    public function get_pregunta() 
    { 
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $postData = $this->input->post();
  
      $query="select  * from cat_preguntas where id_cat_usuario={$postData['id_cat_usuario']} and id_cat_pregunta={$postData['id_cat_pregunta']}  order by id_cat_pregunta";              
    
      $resultado = $sqlsrvDB->query($query);		
      return $resultado->result();
    }  


    public function delete_pregunta() 
    { 
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $postData = $this->input->post();

      $sqlsrvDB->where('id_cat_pregunta', $postData['id_cat_pregunta']);
      $sqlsrvDB->where('id_cat_usuario', $postData['id_cat_usuario']);      
      
      $resultado=$sqlsrvDB->delete('cat_preguntas');
    }  

    public function CatalogoProfesiones()
    {
		$sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();

    if ($postData['favoritos']==0)
      $query="select  * from cat_profesiones where id_cat_profesion IN( SELECT Min(id_cat_profesion) FROM cat_profesiones GROUP BY nombre order by nombre)";         
    else 
      $query="select * from cat_profesiones 
      where id_cat_profesion in 
      (
      select p2.id_cat_profesion 
      from cat_favoritos as f inner join 
      cat_profesionales as p on f.id_cat_usuario={$postData['id_cat_usuario']} and p.id_cat_profesional=f.id_cat_profesional inner join 
      cat_profesiones as p2 on p2.id_cat_profesion=p.id_cat_profesion
      group by p2.id_cat_profesion 
      ) ";

        $resultado = $sqlsrvDB->query($query);		
		return $resultado->result();        
    }

    public function GetCorreos()
    {
		$sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();
    $query="select * from cat_profesionales where activo=1 and id_cat_profesion={$postData['id_cat_profesion']} order by nombre";         
        $resultado = $sqlsrvDB->query($query);		
		return $resultado->result();        
    }

  public function GetUser($id_cat_usuario)
  {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);

    $query="select * from usuarios where id_cat_usuario='{$id_cat_usuario}'";         
    
    $resultado = $sqlsrvDB->query($query);		                
    return $resultado->row_array();
    
  }
  
  public function save_update_score_respuesta()
  {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
    $postData = $this->input->post();
        
      $data = array(             
          'valoracion'  => $postData['score'] 
      );   
      
      $sqlsrvDB->where('id_cat_respuesta', $postData['id_cat_respuesta']);
      $resultado=$sqlsrvDB->update('cat_respuestas',$data);
  } 

  public function get_score_respuesta()
  {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
    $postData = $this->input->post();
        
    $query="select * from cat_respuestas where id_cat_respuesta=".$postData['id_cat_respuesta'];         
    
    $resultado = $sqlsrvDB->query($query);		
    return $resultado->result();        
  } 

}

?>
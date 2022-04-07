<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MAltaProfesional extends CI_Model {

	function __construct()
	{
    parent::__construct();
    date_default_timezone_set('America/Mexico_City');
	}

	public function index()
	{	
	
    }
    
  public function DetalleProfesional()
  {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();

    $query="select  
            s.nombre as estado,   
            e.id_cat_profesion,         
            e.nombre as profesion,
            p.especialidad,
            p.descripcion,
            p.costo_consulta,
            p.imagen,
            concat(p.nombre,' ',p.paterno,' ',p.materno )  as profesionista,
            v.opinion,
            
            concat(d.calle,' ',d.num,', ',d.colonia ) as direccion,

            d.id_cat_estado,
            d.municipio,
            d.colonia,
            d.calle,
            d.num,
            d.cp,
            d.tel,
            
            p.informacion_completa,
            p.cedula_profesional,
            p.cedula_profesional_postgrado,
            p.experiencia_servicios_ofrecidos,
            p.preguntas_frecuentes,
            p.metodos_pago,
            p.email,

            r.id_cat_red_social,
            r.business_card,
            r.google_maps,
            r.whatsapp,
            r.facebook,
            r.instagram,
            r.twitter,
            r.pagina_web,
            r.activo
            
            from cat_profesionales as p left join 
            cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion and p.activo=1 left join 
            cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
            cat_valoraciones as v on v.id_cat_profesional=p.id_cat_profesional left join
            cat_redes_sociales as r on r.id_cat_profesional=p.id_cat_profesional 
            where p.id_cat_profesional={$postData['id_cat_profesional']} ";               
  
    $resultado = $sqlsrvDB->query($query);		
    return $resultado->result();    
  }  

  public function update_info_gral()
  {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
    $postData = $this->input->post();
    
  
      $data = array(             
          
          'especialidad'  => $postData['especialidad'], 
          'descripcion'  => $postData['descripcion'],                    
          'id_cat_profesion'  => $postData['id_cat_profesion'], 
          'informacion_completa'  => $postData['informacion_completa'],           
          'cedula_profesional'  => $postData['cedula_profesional'], 
          'cedula_profesional_postgrado'  => $postData['cedula_profesional_postgrado'], 
          'fecha_alta' => date("Y-m-d H:i:s"),
          'usuario_accion' => Sesion::obtener('gIdUsuario') .'.-'.Sesion::obtener('gUsuario')           
      );
    

    $sqlsrvDB->where('id_cat_profesional', $postData['id_cat_profesional']);
    $resultado=$sqlsrvDB->update('cat_profesionales',$data);


    return $resultado;   
  } 

  public function update_experiencia_titulos($files_names)
  {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
    $postData = $this->input->post();
  
    $data = array(        
        'experiencia_servicios_ofrecidos'  => $postData['experiencia_servicios_ofrecidos'], 
        'preguntas_frecuentes'  => $postData['preguntas_frecuentes'],                              
        'fecha_alta' => date("Y-m-d H:i:s"),
        'usuario_accion' => Sesion::obtener('gIdUsuario') .'.-'.Sesion::obtener('gUsuario')           
    );


    $sqlsrvDB->where('id_cat_profesional', $postData['id_cat_profesional']);
    $resultado=$sqlsrvDB->update('cat_profesionales',$data);
    /****************************************************************************************/
    /****************************************************************************************/
    
    for ($i = 1; $i <= $postData['limitcount']; $i++)     
    { 
            
      if (isset($files_names[$i]))
        { 
          $data = array(        
            'id_cat_profesional'  => $postData['id_cat_profesional'],                              
            'nombre'  => $postData['rec_'.$i],       
            'archivo'  => $files_names[$i],                   
            'fecha_alta' => date("Y-m-d H:i:s"),
            'usuario_accion' => Sesion::obtener('gIdUsuario') .'.-'.Sesion::obtener('gUsuario')           
          );      

          $query="select * from cat_reconocimientos where id_cat_profesional=".$postData['id_cat_profesional'] ." and id_cat_reconocimiento=".$postData['id_cat_reconocimiento_'.$i];
          $resultado_temp = $sqlsrvDB->query($query);		

          $archivo="";              
          foreach ($resultado_temp->result_array() as $row)
          {                      
            $archivo=$row['archivo'];
            $source = './assets/images/profesionales/'.$postData['id_cat_profesional']."/rec/".$archivo;                 
            unlink($source);       
          }
        }  
      else 
          $data = array(        
            'id_cat_profesional'  => $postData['id_cat_profesional'],                              
            'nombre'  => $postData['rec_'.$i],                   
            'fecha_alta' => date("Y-m-d H:i:s"),
            'usuario_accion' => Sesion::obtener('gIdUsuario') .'.-'.Sesion::obtener('gUsuario')           
          );

      if ($postData['id_cat_reconocimiento_'.$i]=="-1")
            $resultado=$sqlsrvDB->insert('cat_reconocimientos',$data);          
      else
        {
          $sqlsrvDB->where('id_cat_reconocimiento', $postData['id_cat_reconocimiento_'.$i]);      
          $resultado=$sqlsrvDB->update('cat_reconocimientos',$data);
        }
    }
          
    return $resultado;       
  } 

  public function update_contacto($files_names)
  {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
    $postData = $this->input->post();

    $data = array(  
      'id_cat_profesional'  => $postData['id_cat_profesional'],             
		  'id_cat_usuario'  => null,                   
      'id_cat_estado'  => $postData['id_cat_estado'], 
      'municipio'  => $postData['mpio'], 
      'colonia'  => $postData['colonia'], 
      'calle'  => $postData['calle'], 
      'num'  => $postData['num'], 
      'cp'  => $postData['cp'],         
      'tel'  => $postData['telefono'],      
      'dom_particular' => 0,          
      'activo' => 1
    );      

    if ($postData['existe_direccion']=="si")
    {
      $sqlsrvDB->where('id_cat_profesional', $postData['id_cat_profesional']);      
      $sqlsrvDB->where('dom_particular', '0');      
      $resultado=$sqlsrvDB->update('cat_direcciones',$data);    
    }
    else 
      $resultado=$sqlsrvDB->insert('cat_direcciones',$data);           
    /********************************************************************************/
    $data = array(           
      'email'  => $postData['email'] 
    );      
    $sqlsrvDB->where('id_cat_profesional', $postData['id_cat_profesional']);      
    $resultado=$sqlsrvDB->update('cat_profesionales',$data);    
    /********************************************************************************/
    $sqlsrvDB->where('id_cat_profesional', $postData['id_cat_profesional']);
    $resultado=$sqlsrvDB->delete('cat_horario_atencion');

    for ($i = 1; $i <= 7; $i++)     
    { 
      if (isset($postData['horario_apertura_'.$i]))      
      { 
        $data = array(        
          'id_cat_profesional'  => $postData['id_cat_profesional'],                                          
          'id_cat_dia'  => $i,                                          
          'horario_apertura'  => $postData['horario_apertura_'.$i],                   
          'horario_termino'  => $postData['horario_termino_'.$i],                                 
          'fecha_alta' => date("Y-m-d H:i:s"),
          'usuario_accion' => Sesion::obtener('gIdUsuario') .'.-'.Sesion::obtener('gUsuario')    
        );
        
        $resultado=$sqlsrvDB->insert('cat_horario_atencion',$data);                      

      }
    }

    /********************************************************************************/
    if (isset($files_names))
    { 
      $data = array(        
        'id_cat_profesional'  => $postData['id_cat_profesional'],                                      
        'business_card'  => $files_names,                   
        'google_maps'  => $postData['google_maps'],                                      
        'whatsapp'  => $postData['whatsapp'],                                      
        'facebook'  => $postData['facebook'],                                      
        'instagram'  => $postData['instagram'],                                              
        'twitter'  => $postData['twitter'],                                      
        'pagina_web'  => $postData['pagina_web'],                                      
        'fecha_alta' => date("Y-m-d H:i:s"),
        'activo'  => $postData['activar_redes'],
        'usuario_accion' => Sesion::obtener('gIdUsuario') .'.-'.Sesion::obtener('gUsuario')           
      );      

      if (isset($postData['name_card']))
        {
          $source = './assets/images/profesionales/'.$postData['id_cat_profesional']."/card/".$postData['name_card'];                 
          unlink($source);       
        }
      
    }  
  else 
      $data = array(        
        'id_cat_profesional'  => $postData['id_cat_profesional'],                                      
        'google_maps'  => $postData['google_maps'],                                      
        'whatsapp'  => $postData['whatsapp'],                                      
        'facebook'  => $postData['facebook'],                                      
        'instagram'  => $postData['instagram'],                                              
        'twitter'  => $postData['twitter'],                                      
        'pagina_web'  => $postData['pagina_web'],                                      
        'fecha_alta' => date("Y-m-d H:i:s"),
        'activo'  => $postData['activar_redes'],
        'usuario_accion' => Sesion::obtener('gIdUsuario') .'.-'.Sesion::obtener('gUsuario')           
      );      

  if ($postData['id_cat_red_social']=="-1")
        $resultado=$sqlsrvDB->insert('cat_redes_sociales',$data);          
  else
    {
      $sqlsrvDB->where('id_cat_red_social', $postData['id_cat_red_social']);      
      $resultado=$sqlsrvDB->update('cat_redes_sociales',$data);
    }

    /********************************************************************************/
  }


  public function update_precios($files_names)
  {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
    $postData = $this->input->post();
    
    for ($i = 1; $i <= 1; $i++)     
    { 
            
      if (isset($files_names[$i]))
      {  
          $data = array(        
            'id_cat_profesional'  => $postData['id_cat_profesional'],                                          
            'archivo'  => $files_names[$i],                   
            'fecha_alta' => date("Y-m-d H:i:s"),
            'usuario_accion' => Sesion::obtener('gIdUsuario') .'.-'.Sesion::obtener('gUsuario')           
          );

          if ($postData['id_cat_promocion_'.$i]=="-1")
            $resultado=$sqlsrvDB->insert('cat_promociones',$data);          
          else
            {
              $query="select * from cat_promociones where id_cat_profesional=".$postData['id_cat_profesional'] ." and id_cat_promocion=".$postData['id_cat_promocion_'.$i];
              $resultado_temp = $sqlsrvDB->query($query);		

              $archivo="";              
              foreach ($resultado_temp->result_array() as $row)
              {                      
                $archivo=$row['archivo'];
                $source = './assets/images/profesionales/'.$postData['id_cat_profesional']."/promo/".$archivo;                 
                unlink($source);       
              }

              $sqlsrvDB->where('id_cat_promocion', $postData['id_cat_promocion_'.$i]);      
              $resultado=$sqlsrvDB->update('cat_promociones',$data);
            }

      }
    }
    
    /********************************************************************************/
    for ($i = 1; $i <= $postData['limitcount']; $i++)     
    { 
      if (isset($postData['servicio_'.$i]))      
      { 
        $data = array(        
          'id_cat_profesional'  => $postData['id_cat_profesional'],                                          
          'servicio'  => $postData['servicio_'.$i],                   
          'precio'  => $postData['precio_'.$i],                   
          'vigente'  => $postData['ch_'.$i],                   
          'fecha_alta' => date("Y-m-d H:i:s"),
          'usuario_accion' => Sesion::obtener('gIdUsuario') .'.-'.Sesion::obtener('gUsuario')           
        );

        if ($postData['id_cat_precio_'.$i]=="-1")
          $resultado=$sqlsrvDB->insert('cat_precios',$data);          
        else
        {
          $sqlsrvDB->where('id_cat_precio', $postData['id_cat_precio_'.$i]);      
          $resultado=$sqlsrvDB->update('cat_precios',$data);
        }

      }
    }

    /********************************************************************************/
    $data = array(        
      'metodos_pago'  => $postData['metodos_pago'],       
      'fecha_alta' => date("Y-m-d H:i:s"),
      'usuario_accion' => Sesion::obtener('gIdUsuario') .'.-'.Sesion::obtener('gUsuario')           
    );


    $sqlsrvDB->where('id_cat_profesional', $postData['id_cat_profesional']);
    $resultado=$sqlsrvDB->update('cat_profesionales',$data);

          
    return $resultado;       
  } 
  
  public function EliminarReconocimiento()
    {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();      

    $source = './assets/images/profesionales/'.$postData['id_cat_profesional']."/".$postData['imagen'];                 
    unlink($source);

    $query="delete from cat_reconocimientos where id_cat_reconocimiento=".$postData['id_cat_reconocimiento'];         
    $resultado = $sqlsrvDB->query($query);		    
    }

    public function EliminarPrecio()
    {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();      
    
    $query="delete from cat_precios where id_cat_precio=".$postData['id_cat_precio'];         
    $resultado = $sqlsrvDB->query($query);		    
    }

  public function CatalogoProfesiones()
    {
		$sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $query="SELECT t1.* 
            FROM cat_profesiones AS t1
            JOIN
            (
              SELECT MIN(id_cat_profesion) AS id_cat_profesion
              FROM cat_profesiones
              WHERE activo=1
              GROUP BY nombre
            ) t2 ON t1.id_cat_profesion = t2.id_cat_profesion";         
            
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

    public function CatalogoDirecciones()
    {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();      

    $query="select * from cat_direcciones where id_cat_profesional=".$postData['id_cat_profesional']." and activo=1 order by id_cat_direccion";         
    
        $resultado = $sqlsrvDB->query($query);		
		return $resultado->result();        
    } 

    public function CatalogoReconocimientos()
    {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();      

    $query="select * from cat_reconocimientos where id_cat_profesional=".$postData['id_cat_profesional']." order by id_cat_reconocimiento";         
    
        $resultado = $sqlsrvDB->query($query);		
		return $resultado->result();        
    } 

    public function CatalogoPromociones()
    {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();      

    $query="select * from cat_promociones where id_cat_profesional=".$postData['id_cat_profesional']." order by id_cat_promocion";         
    
    $resultado = $sqlsrvDB->query($query);		
    return $resultado->result();        
    } 

    public function CatalogoPrecios()
    {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();      

    $query="select * from cat_precios where id_cat_profesional=".$postData['id_cat_profesional']." order by id_cat_precio";         
    
    $resultado = $sqlsrvDB->query($query);		
    return $resultado->result();        
    } 
    
    public function CatalogoHorarioAtencion()
    {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();      

    $query="select * from cat_horario_atencion where id_cat_profesional=".$postData['id_cat_profesional']." order by id_cat_dia";         
    
    $resultado = $sqlsrvDB->query($query);		
    return $resultado->result();        
    } 

    public function get_count() 
    { 
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $postData = $this->input->post();
  
      $query="select  * from cat_publicaciones where id_cat_profesional={$postData['id_cat_profesional']}  order by id_cat_publicacion";              
    
      return $sqlsrvDB->query($query)->num_rows();
    }  

    public function ListadoPublicaciones($limit, $start)
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $postData = $this->input->post();

      $query="select  * from cat_publicaciones where id_cat_profesional={$postData['id_cat_profesional']}  order by id_cat_publicacion";              
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
                      FROM 
                      (SELECT * FROM cat_preguntas WHERE id_cat_profesion={$postData['id_cat_profesion']} ) AS p LEFT JOIN
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
                        cat_profesionales AS pr ON pr.id_cat_profesional=r.id_cat_profesional AND pr.id_cat_profesional={$postData['id_cat_profesional']} INNER JOIN 
                        cat_profesiones AS pe ON pe.id_cat_profesion=pr.id_cat_profesion  left join 
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
                      FROM 
                      (SELECT * FROM cat_preguntas WHERE id_cat_profesion={$postData['id_cat_profesion']} ) AS p LEFT JOIN
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
                        cat_profesionales AS pr ON pr.id_cat_profesional=r.id_cat_profesional AND pr.id_cat_profesional={$postData['id_cat_profesional']} INNER JOIN 
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

    public function save_update_publicacion()
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
      $postData = $this->input->post();
          
        $data = array(             
            'id_cat_profesional'  => $postData['id_cat_profesional'], 
            'titulo'  => $postData['titulo'], 
            'resumen'  => $postData['resumen'],                    
            'publicacion'  => $postData['publicacion'],             
            'fecha_alta' => date("Y-m-d H:i:s"),
            'activo' => "1"           
        );
     
  
      if ($postData['id_cat_publicacion']=="-1")
        $resultado=$sqlsrvDB->insert('cat_publicaciones',$data);          
      else
        {
          $sqlsrvDB->where('id_cat_profesional', $postData['id_cat_profesional']);
          $sqlsrvDB->where('id_cat_publicacion', $postData['id_cat_publicacion']);
          $resultado=$sqlsrvDB->update('cat_publicaciones',$data);
        }
      
      return $resultado;   
    } 

    public function get_publicacion() 
    { 
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $postData = $this->input->post();
  
      $query="select  * from cat_publicaciones where id_cat_profesional={$postData['id_cat_profesional']} and id_cat_publicacion={$postData['id_cat_publicacion']}  order by id_cat_publicacion";              
    
      $resultado = $sqlsrvDB->query($query);		
      return $resultado->result();
    }  


    public function delete_publicacion() 
    { 
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $postData = $this->input->post();

      $sqlsrvDB->where('id_cat_publicacion', $postData['id_cat_publicacion']);
      $sqlsrvDB->where('id_cat_profesional', $postData['id_cat_profesional']);      
      
      $resultado=$sqlsrvDB->delete('cat_publicaciones');
    }      

    public function GetProfesional($id_cat_profesional) 
    { 
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $postData = $this->input->post();
  
      $query="select  * from cat_profesionales where id_cat_profesional={$id_cat_profesional} and activo=1";              
    
      $resultado = $sqlsrvDB->query($query);		
      return $resultado->row_array();
      
    }  

    public function GetUsuario($id_cat_pregunta) 
    { 
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $postData = $this->input->post();
  
      $query="select  u.* from cat_preguntas as p inner join usuarios as u on p.id_cat_pregunta={$id_cat_pregunta} and p.id_cat_usuario=u.id_cat_usuario";              
    
      $resultado = $sqlsrvDB->query($query);		
      return $resultado->row_array();
    }  

    public function save_update_respuesta()
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
      $postData = $this->input->post();
          
        $data = array(             
            'id_cat_pregunta'  => $postData['id_cat_pregunta'], 
            'id_cat_profesional'  => $postData['id_cat_profesional'], 
            'respuesta'  => $postData['respuesta'],             
            'fecha_alta' => date("Y-m-d H:i:s")            
        );
     
  
      if ($postData['id_cat_respuesta']=="-1")
        $resultado=$sqlsrvDB->insert('cat_respuestas',$data);          
      else
        {
          $sqlsrvDB->where('id_cat_profesional', $postData['id_cat_profesional']);
          $sqlsrvDB->where('id_cat_respuesta', $postData['id_cat_respuesta']);
          $resultado=$sqlsrvDB->update('cat_respuestas',$data);
        }
      
      return $resultado;   
    } 

    public function save_profesion()
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
      $postData = $this->input->post();
      
      $data = array(              
              'area_interes'  => $postData['area_interes'], 
              'nombre'  => $postData['profesion'],
              'activo' => "0"
          );
      
      $resultado=$sqlsrvDB->insert('cat_profesiones',$data);
      $insert_id = $sqlsrvDB->insert_id();
      return $insert_id;              
    } 

    public function verificar_profesion()
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
      $postData = $this->input->post();
      
      $query="select exists
      (
        select 1 from 
        (
          select * from cat_profesiones 
        ) as t where t.area_interes='".$postData['area_interes']."' and t.nombre='".$postData['profesion']."' 
      )  as existe";         
  $resultado = $sqlsrvDB->query($query);		
return $resultado->result();        
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
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
            e.nombre as profesion,
            p.especialidad,
            p.descripcion,
            p.costo_consulta,
            p.imagen,
            concat(p.nombre,' ',p.paterno,' ',p.materno )  as profesionista,
            o.opinion,
            ifnull(o.calificacion,0) as calificacion,              
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
            cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional left join
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
      'id_cat_estado'  => $postData['id_cat_estado'], 
      'municipio'  => $postData['mpio'], 
      'colonia'  => $postData['colonia'], 
      'calle'  => $postData['calle'], 
      'num'  => $postData['num'], 
      'cp'  => $postData['cp'],         
      'tel'  => $postData['telefono'],          
      'activo' => 1
    );      
    $sqlsrvDB->where('id_cat_profesional', $postData['id_cat_profesional']);      
    $resultado=$sqlsrvDB->update('cat_direcciones',$data);    

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
    $query="select * from cat_profesiones where activo=1 order by nombre";         
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
}

?>
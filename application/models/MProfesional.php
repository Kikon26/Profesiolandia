<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MProfesional extends CI_Model {

	function __construct()
	{
    parent::__construct();
    date_default_timezone_set('America/Mexico_City');
	}

	public function index()
	{	
	
  }

  public function DetalleProfesional($id_cat_profesional)
  {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $query="select  
            s.nombre as estado,
            d.municipio,
            e.nombre as profesion,
            p.especialidad,
            p.descripcion,
            p.costo_consulta,
            p.imagen,
            concat(p.nombre,' ',p.paterno,' ',p.materno )  as profesionista,                        
            concat(d.calle,' ',d.num,', ',d.colonia ) as direccion,
            d.tel,
            p.informacion_completa,
            p.cedula_profesional,
            p.cedula_profesional_postgrado,
            p.experiencia_servicios_ofrecidos,
            p.preguntas_frecuentes,
            ifnull(p.metodos_pago,'') as metodos_pago,              
            p.email,
            v.id_cat_valoracion,
            
            r.google_maps,
            r.whatsapp,
            r.facebook,
            r.instagram,
            r.twitter,
            r.pagina_web  
            
            from cat_profesionales as p left join 
            cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion and p.activo=1 left join 
            cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
            cat_valoraciones as v on v.id_cat_profesional=p.id_cat_profesional left join
            cat_redes_sociales as r on r.id_cat_profesional=p.id_cat_profesional 
            where p.id_cat_profesional={$id_cat_profesional} ";               
  
    $resultado = $sqlsrvDB->query($query);		
    return $resultado->result();    
  }

  public function CatalogoPreciosVigentes()
    {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();      

    $query="select * from cat_precios where id_cat_profesional=".$postData['id_cat_profesional']." and vigente=1 order by id_cat_precio";         
    
    $resultado = $sqlsrvDB->query($query);		
    return $resultado->result();        
    } 

    public function CatalogoHorarioAtencion()
    {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();      

    $query="select 
            d.nombre as dia,
            DATE_FORMAT(a.horario_apertura, '%H:%i') as horario_apertura,
            DATE_FORMAT(a.horario_termino, '%H:%i') as horario_termino 
            
            from cat_horario_atencion  as a inner join
            cat_dias as d on d.id_cat_dia=a.id_cat_dia
            where a.id_cat_profesional=".$postData['id_cat_profesional']." 
            order by a.id_cat_dia";    
    
    $resultado = $sqlsrvDB->query($query);		
    return $resultado->result();        
    } 

    public function CatalogoDireccionTel()
    {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();      

    
    $query="select  
            concat 
            (
            d.colonia,' ',
            d.calle,' ',
            d.num,' ',
            d.municipio,' ',
            e.nombre,' CP. ',
            d.cp) as direccion,
            tel
            from  cat_direcciones as d inner join 
            cat_estados as e on e.id_cat_estado=d.id_cat_estado and d.dom_particular=0
            and d.id_cat_profesional=".$postData['id_cat_profesional'];
    
    $resultado = $sqlsrvDB->query($query);		
    return $resultado->result();        
    } 

    public function RedesSociales()
    {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();      

    $query="select * from cat_redes_sociales where id_cat_profesional=".$postData['id_cat_profesional']." and activo=1";         
    
    $resultado = $sqlsrvDB->query($query);		
    return $resultado->result();        
    } 

    public function ChecarFavorito()
    {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();      

    $query="select * from cat_favoritos where id_cat_usuario=".$postData['id_cat_usuario']." and id_cat_profesional=".$postData['id_cat_profesional'];         
    
    $resultado = $sqlsrvDB->query($query);		
    return $resultado->result();        
    } 

    public function UpdateFavorito()
    {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();      

    if ($postData['existe']=="si")
        $query="delete from cat_favoritos where id_cat_usuario=".$postData['id_cat_usuario']." and id_cat_profesional=".$postData['id_cat_profesional'];         
    else 
        $query="insert into cat_favoritos(id_cat_usuario,id_cat_profesional)values(".$postData['id_cat_usuario'].",".$postData['id_cat_profesional'].")";         
    
    $resultado = $sqlsrvDB->query($query);		
    //return $resultado->result();        
    } 

    public function CatalogoPublicaciones()
    {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();      
    
    $query="select * from cat_publicaciones as p  inner join  
            cat_profesionales as pr on pr.id_cat_profesional=p.id_cat_profesional and p.id_cat_profesional=".$postData['id_cat_profesional']."  inner join 
            cat_profesiones as pr2 on pr2.id_cat_profesion=pr.id_cat_profesion ";
    
    $resultado = $sqlsrvDB->query($query);		
    return $resultado->result();        
    }     

    public function save_update_valoracion()
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
      $postData = $this->input->post();
          
        $data = array(             
            'id_cat_profesional'  => $postData['id_cat_profesional'], 
            'id_cat_usuario'  => $postData['id_cat_usuario'], 
            'atencion'  => $postData['Arating'], 
            'calidad'  => $postData['Crating'], 
            'puntualidad'  => $postData['Prating'], 
            'instalaciones'  => $postData['Irating'], 
            'recomendacion'  => $postData['Rrating'], 
            'opinion'  => $postData['opinion'],                                
            'fecha_alta' => date("Y-m-d H:i:s")            
        );
     
  
      if ($postData['id_cat_valoracion']=="-1")
        $resultado=$sqlsrvDB->insert('cat_valoraciones',$data);          
      else
        {
          $sqlsrvDB->where('id_cat_profesional', $postData['id_cat_profesional']);
          $sqlsrvDB->where('id_cat_usuario', $postData['id_cat_usuario']);
          $resultado=$sqlsrvDB->update('cat_valoraciones',$data);
        }
      
      return $resultado;   
    } 

    public function get_valoracion()
    {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();      

    $query="select * from cat_valoraciones where id_cat_usuario=".$postData['id_cat_usuario']." and id_cat_profesional=".$postData['id_cat_profesional'];         
    
    $resultado = $sqlsrvDB->query($query);		
    return $resultado->result();        
    } 

    public function get_valoracion_gral()
    {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();      

    $query="select * from cat_valoraciones where  id_cat_profesional=".$postData['id_cat_profesional'];         
    
    $resultado = $sqlsrvDB->query($query);		
    return $resultado->result();        
    } 

    public function get_opiniones_positivas()
    {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();      

    $query="SELECT CONCAT(u.nombre,' ',u.paterno,' ',u.materno) AS usuario,u.imagen,v.opinion,
            ROUND((v.atencion+v.calidad+v.puntualidad+v.instalaciones+v.recomendacion)/5,0) AS valoracion
            FROM cat_valoraciones AS v INNER JOIN 
            usuarios AS u ON u.id_cat_usuario=v.id_cat_usuario AND v.id_cat_profesional={$postData['id_cat_profesional']}
            where round((v.atencion+v.calidad+v.puntualidad+v.instalaciones+v.recomendacion)/5,0)>3";         
    
    $resultado = $sqlsrvDB->query($query);		
    return $resultado->result();        
    }     

    public function get_opiniones_negativas()
    {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();      

    $query="SELECT CONCAT(u.nombre,' ',u.paterno,' ',u.materno) AS usuario,u.imagen,v.opinion,
            ROUND((v.atencion+v.calidad+v.puntualidad+v.instalaciones+v.recomendacion)/5,0) AS valoracion
            FROM cat_valoraciones AS v INNER JOIN 
            usuarios AS u ON u.id_cat_usuario=v.id_cat_usuario AND v.id_cat_profesional={$postData['id_cat_profesional']}
            where round((v.atencion+v.calidad+v.puntualidad+v.instalaciones+v.recomendacion)/5,0)<3";         
    
    $resultado = $sqlsrvDB->query($query);		
    return $resultado->result();        
    }     

    public function get_opiniones_neutras()
    {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();      

    $query="SELECT CONCAT(u.nombre,' ',u.paterno,' ',u.materno) AS usuario,u.imagen,v.opinion,
            ROUND((v.atencion+v.calidad+v.puntualidad+v.instalaciones+v.recomendacion)/5,0) AS valoracion
            FROM cat_valoraciones AS v INNER JOIN 
            usuarios AS u ON u.id_cat_usuario=v.id_cat_usuario AND v.id_cat_profesional={$postData['id_cat_profesional']}
            where round((v.atencion+v.calidad+v.puntualidad+v.instalaciones+v.recomendacion)/5,0)=3";         
    
    $resultado = $sqlsrvDB->query($query);		
    return $resultado->result();        
    }     

    public function get_opiniones_todas()
    {
    $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $postData = $this->input->post();      

    $query="SELECT CONCAT(u.nombre,' ',u.paterno,' ',u.materno) AS usuario,u.imagen,v.opinion,
            ROUND((v.atencion+v.calidad+v.puntualidad+v.instalaciones+v.recomendacion)/5,0) AS valoracion
            FROM cat_valoraciones AS v INNER JOIN 
            usuarios AS u ON u.id_cat_usuario=v.id_cat_usuario AND v.id_cat_profesional=".$postData['id_cat_profesional'];         
    
    $resultado = $sqlsrvDB->query($query);		
    return $resultado->result();        
    }     

}

?>
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MProfesionales extends CI_Model {

	function __construct()
	{
    parent::__construct();
    date_default_timezone_set('America/Mexico_City');
	}

	public function index()
	{	
	
    }
    public function validaUsuario($usuario='', $passw='')
    {
        $sqlsrvDB = $this->load->database('dbProfesiolandia', TRUE);
        
        /*
        $cond= array('usuario' => $usuario, 'password' => sha1($passw),'activo' => 1);
        $sqlsrvDB->select("*")->from('cat_profesionales')->where($cond);
        */
        
        $query="SELECT * FROM cat_profesionales WHERE email = '{$usuario}' COLLATE utf8_bin and password=sha('{$passw}')  ";
         
        //$resultado = $sqlsrvDB->get();

        $resultado = $sqlsrvDB->query($query);		
        //var_dump($resultado);

        if ($resultado->num_rows()>0)
        {
        	$row = $resultado->row();

          // generar código aleatorio simple
			    $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			    $code = substr(str_shuffle($set), 0, 12);

          $data = array(             
            'code' => $code
            );      
    
          $sqlsrvDB->where('id_cat_profesional', $row->id_cat_profesional);      
          $resultado=$sqlsrvDB->update('cat_profesionales',$data);    
          
        	return $row->id_cat_profesional;
        	//return 1;	
        }
        else
        {
        	return 0;	
        }
    }

    public function datosUsuario($id_cat_profesional)
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $query="select 
              u.id_cat_profesional,
              u.usuario,
              u.nombre,
              u.paterno,
              r.id_cat_rol,
              r.nombre as rol,
              u.imagen,
              concat(u.nombre,' ',u.paterno) as nombre_apellido,
              u.email,
              u.code
              from cat_profesionales as u inner join cat_roles as r on r.id_cat_rol=u.id_cat_rol and u.activo=1 and u.id_cat_profesional='{$id_cat_profesional}'";         
    
      $resultado = $sqlsrvDB->query($query);		
	    return $resultado->result();    
    }

    public function ListadoProfesionales()
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $query="select 
              p.id_cat_profesional,
              p.especialidad,
              p.descripcion,
              p.nombre,
              p.paterno,
              p.materno,
              e.nombre as profesion,              
              p.email,
              p.usuario,
              p.costo_consulta,
              p.imagen 
              from cat_profesionales as p inner join
              cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion";         
    
      $resultado = $sqlsrvDB->query($query);		
	    return $resultado->result();    
    }

    public function save_profesional($file_name)
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
      $postData = $this->input->post();
      
      $data = array(              
        'usuario'  => $postData['profesional_usuario'], 
        'password'  => sha1($postData['profesional_password']), 

        'especialidad'  => $postData['profesional_especialidad'], 
        'descripcion'  => $postData['profesional_descripcion'], 

        'nombre'  => $postData['profesional_nombre'], 
        'paterno'  => $postData['profesional_paterno'], 
        'materno'  => $postData['profesional_materno'], 
        'id_cat_rol'  => "2", 
        'email'  => $postData['profesional_email'], 
        'id_cat_profesion'  => $postData['profesional_id_cat_profesion'],  
        'costo_consulta'  => $postData['profesional_costo_consulta'],  
        'imagen'  => $file_name,                   
        'fecha_alta' => date("Y-m-d H:i:s"),
        'activo' => 1,
        'usuario_accion' => Sesion::obtener('gIdUsuario') .'.-'.Sesion::obtener('gUsuario')           
      );      

      $resultado=$sqlsrvDB->insert('cat_profesionales',$data);
      $id_cat_profesional=$sqlsrvDB->insert_id();
      /*************************************************************************/
      $data = array(     
        'id_cat_profesional'  => $id_cat_profesional,          
        'id_cat_estado'  => $postData['profesional_id_cat_estado'], 
        'municipio'  => $postData['profesional_mpio'], 
        'colonia'  => $postData['profesional_colonia'], 
        'calle'  => $postData['profesional_calle'], 
        'num'  => $postData['profesional_num'], 
        'cp'  => $postData['profesional_cp'],         
        'tel'  => $postData['profesional_telefono'],          
        'activo' => 1,
        'usuario_accion' => Sesion::obtener('gIdUsuario') .'.-'.Sesion::obtener('gUsuario')           
      );      
      $resultado=$sqlsrvDB->insert('cat_direcciones',$data);

      return $resultado;              
    } 
    
    public function update_profesional($file_name)
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
      $postData = $this->input->post();
      
      if ( $postData['profesional_password']<>"")
        {  
            $data = array(              
                'usuario'  => $postData['profesional_usuario'], 
                'password'  => sha1($postData['profesional_password']), 
                'especialidad'  => $postData['profesional_especialidad'], 
                'descripcion'  => $postData['profesional_descripcion'], 
                'nombre'  => $postData['profesional_nombre'], 
                'paterno'  => $postData['profesional_paterno'], 
                'materno'  => $postData['profesional_materno'], 
                'email'  => $postData['profesional_email'], 
                'costo_consulta'  => $postData['profesional_costo_consulta'],  
                'id_cat_profesion'  => $postData['profesional_id_cat_profesion'], 
                'fecha_alta' => date("Y-m-d H:i:s"),
                'usuario_accion' => Sesion::obtener('gIdUsuario') .'.-'.Sesion::obtener('gUsuario')           
            );
        }    
      else
      {  
        $data = array(              
            'usuario'  => $postData['profesional_usuario'],   
            'especialidad'  => $postData['profesional_especialidad'], 
            'descripcion'  => $postData['profesional_descripcion'],          
            'nombre'  => $postData['profesional_nombre'], 
            'paterno'  => $postData['profesional_paterno'], 
            'materno'  => $postData['profesional_materno'], 
            'email'  => $postData['profesional_email'], 
            'costo_consulta'  => $postData['profesional_costo_consulta'],  
            'id_cat_profesion'  => $postData['profesional_id_cat_profesion'], 
            'fecha_alta' => date("Y-m-d H:i:s"),
            'usuario_accion' => Sesion::obtener('gIdUsuario') .'.-'.Sesion::obtener('gUsuario')           
        );
      }
      
   

      if ($file_name<>"") 
      {
        $source = './assets/images/profesionales/'.$postData['profesional_imagen'];                 
        unlink($source);
  
        $data['imagen'] = $file_name;
      }  

      $sqlsrvDB->where('id_cat_profesional', $postData['profesional_id_cat_profesional']);
      //var_dump($data);
      $resultado=$sqlsrvDB->update('cat_profesionales',$data);
      /*************************************************************************/
      $data = array(             
        'id_cat_estado'  => $postData['profesional_id_cat_estado'], 
        'municipio'  => $postData['profesional_mpio'], 
        'colonia'  => $postData['profesional_colonia'], 
        'calle'  => $postData['profesional_calle'], 
        'num'  => $postData['profesional_num'], 
        'cp'  => $postData['profesional_cp'],         
        'tel'  => $postData['profesional_telefono'],
        'usuario_accion' => Sesion::obtener('gIdUsuario') .'.-'.Sesion::obtener('gUsuario')           
      );      
      $sqlsrvDB->where('id_cat_profesional', $postData['profesional_id_cat_profesional']);

      $resultado=$sqlsrvDB->update('cat_direcciones',$data);

      return $resultado;              
    } 
    
    public function delete_profesional()
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
      $postData = $this->input->post();      
      
      /*
      $source = './assets/images/profesionales/'.$postData['profesional_imagen'];                 
      unlink($source);

      
      $sqlsrvDB->where('id_cat_profesional', $postData['profesional_id_cat_profesional']);
      $resultado=$sqlsrvDB->delete('cat_direcciones');
      
      //*************************************************************************

      $sqlsrvDB->where('id_cat_profesional', $postData['profesional_id_cat_profesional']);
      $resultado=$sqlsrvDB->delete('cat_profesionales');
      */

      $data = array(              
        'activo'  => '0',             
        'usuario_accion' => Sesion::obtener('gIdUsuario') .'.-'.Sesion::obtener('gUsuario')           
      );

      $sqlsrvDB->where('id_cat_profesional', $postData['profesional_id_cat_profesional']);      
      $resultado=$sqlsrvDB->update('cat_direcciones',$data);      

      $data = array(              
        'activo'  => '0',     
        'fecha_alta' => date("Y-m-d H:i:s"),             
        'usuario_accion' => Sesion::obtener('gIdUsuario') .'.-'.Sesion::obtener('gUsuario')           
      );

      $sqlsrvDB->where('id_cat_profesional', $postData['profesional_id_cat_profesional']);      
      $resultado=$sqlsrvDB->update('cat_profesionales',$data);

      return $resultado;              
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
}

?>
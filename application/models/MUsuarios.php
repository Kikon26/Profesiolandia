<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MUsuarios extends CI_Model {

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
        $sqlsrvDB->select("*")->from('usuarios')->where($cond);
        */ 

        $query="SELECT * FROM usuarios WHERE email = '{$usuario}' COLLATE utf8_bin and password=sha('{$passw}')  ";

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
              
          $sqlsrvDB->where('id_cat_usuario', $row->id_cat_usuario);      
          $resultado=$sqlsrvDB->update('usuarios',$data);    
                     
        	
        	return $row->id_cat_usuario;
        	//return 1;	
        }
        else
        {
        	return 0;	
        }
    }

    public function ListadoUsuarios()
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $query="select u.id_cat_usuario,u.usuario,u.nombre,u.paterno,u.materno,u.email,r.nombre as rol,imagen
              from usuarios as u inner join cat_roles as r on r.id_cat_rol=u.id_cat_rol and u.activo=1";         
    
      $resultado = $sqlsrvDB->query($query);		
	    return $resultado->result();    
    }

    public function datosUsuario($id_cat_usuario)
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
      $query="select u.id_cat_usuario,u.usuario,u.nombre,u.paterno,r.id_cat_rol,r.nombre as rol,u.imagen,concat(u.nombre,' ',u.paterno) as nombre_apellido,u.email,u.code
              from usuarios as u inner join cat_roles as r on r.id_cat_rol=u.id_cat_rol and u.activo=1 and u.id_cat_usuario='{$id_cat_usuario}'";         
    
      $resultado = $sqlsrvDB->query($query);		
	    return $resultado->result();    
    }
    
    public function save_usuario($file_name)
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
      $postData = $this->input->post();
      
      $data = array(              
        'usuario'  => $postData['usuario_usuario'], 
        'password'  => sha1($postData['usuario_password']), 
        'nombre'  => $postData['usuario_nombre'], 
        'paterno'  => $postData['usuario_paterno'], 
        'materno'  => $postData['usuario_materno'], 
        'email'  => $postData['usuario_email'], 
        'id_cat_rol'  => $postData['usuario_id_cat_rol'],  
        'imagen'  => $file_name,                   
        'fecha_alta' => date("Y-m-d H:i:s"),
        'activo' => 1,
        'usuario_accion' => Sesion::obtener('gIdUsuario') .'.-'.Sesion::obtener('gUsuario')           
      );
          
      $resultado=$sqlsrvDB->insert('usuarios',$data);
      return $resultado;              
    } 
    
    public function update_usuario($file_name)
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
      $postData = $this->input->post();
      
      if ( $postData['usuario_password']<>"")
        {  
            $data = array(              
                'usuario'  => $postData['usuario_usuario'], 
                'password'  => sha1($postData['usuario_password']), 
                'nombre'  => $postData['usuario_nombre'], 
                'paterno'  => $postData['usuario_paterno'], 
                'materno'  => $postData['usuario_materno'], 
                'email'  => $postData['usuario_email'], 
                'id_cat_rol'  => $postData['usuario_id_cat_rol'], 
                'fecha_alta' => date("Y-m-d H:i:s"),
                'usuario_accion' => Sesion::obtener('gIdUsuario') .'.-'.Sesion::obtener('gUsuario')           
            );
        }    
      else
      {  
        $data = array(              
            'usuario'  => $postData['usuario_usuario'],            
            'nombre'  => $postData['usuario_nombre'], 
            'paterno'  => $postData['usuario_paterno'], 
            'materno'  => $postData['usuario_materno'], 
            'email'  => $postData['usuario_email'], 
            'id_cat_rol'  => $postData['usuario_id_cat_rol'], 
            'fecha_alta' => date("Y-m-d H:i:s"),
            'usuario_accion' => Sesion::obtener('gIdUsuario') .'.-'.Sesion::obtener('gUsuario')           
        );
      }
           

      if ($file_name<>"") 
      {
        $source = './assets/images/users/'.$postData['usuario_imagen'];                 
        unlink($source);
  
        $data['imagen'] = $file_name;
      }  

      $sqlsrvDB->where('id_cat_usuario', $postData['usuario_id_cat_usuario']);
      
      $resultado=$sqlsrvDB->update('usuarios',$data);
      return $resultado;              
    } 
    
    public function delete_usuario()
    {
      $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);            
      $postData = $this->input->post();      
      
      /*$source = './assets/images/users/'.$postData['usuario_imagen'];                 
      unlink($source);

      $sqlsrvDB->where('id_cat_usuario', $postData['usuario_id_cat_usuario']);
      $resultado=$sqlsrvDB->delete('usuarios');
      */

      $data = array(              
        'activo'  => '0',                  
        'fecha_alta' => date("Y-m-d H:i:s"),
        'usuario_accion' => Sesion::obtener('gIdUsuario') .'.-'.Sesion::obtener('gUsuario')           
      );

      $sqlsrvDB->where('id_cat_usuario', $postData['usuario_id_cat_usuario']);      
      $resultado=$sqlsrvDB->update('usuarios',$data);

      return $resultado;              
    }


    public function cambiarPassw($param){
        $campos = array(
            
            'password' =>  sha1($param['password'])
            
        );

        //print_r(param);
        $this->db->where('idUsuario',$param['idUsuario']);
        $this->db->update('usuarios',$campos);
        
        return 1;
    }

    public function CatalogoRoles()
    {
		$sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
    $query="select id_cat_rol,nombre from cat_roles where id_cat_rol<>2 order by id_cat_rol";         
        $resultado = $sqlsrvDB->query($query);		
		return $resultado->result();        
    }

	
}

?>
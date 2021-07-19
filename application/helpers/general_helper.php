<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('generaDatosSession'))
{
    function generaDatosSession()
    {


    	$ci=& get_instance();
    	$ci->load->model('MUsuarios');

        $idUsuario= $ci->session->sisdato;

		if ($idUsuario)
		{			
			$datosUsuario= $ci->MUsuarios->datosUsuario($idUsuario);
			
			$ci->session->set_userdata('gIdUsuario', $datosUsuario[0]->id_cat_usuario);
			$ci->session->set_userdata('gUsuario', $datosUsuario[0]->usuario);
			$ci->session->set_userdata('gNombreUsuario', $datosUsuario[0]->nombre);
			$ci->session->set_userdata('gPerfil', $datosUsuario[0]->rol);
			$ci->session->set_userdata('gIdPerfil', $datosUsuario[0]->id_cat_rol);			
			$ci->session->set_userdata('gFoto', $datosUsuario[0]->imagen);			
			$ci->session->set_userdata('gNombreApellido', $datosUsuario[0]->nombre_apellido);			
			$ci->session->set_userdata('gEmail', $datosUsuario[0]->email);									
			$ci->session->set_userdata('sisdato', $idUsuario);
			$ci->session->set_userdata('code', $datosUsuario[0]->code);
		}
		else
		{
			redirect('acceso');
		}
    }   
}


if ( ! function_exists('generaDatosSession2'))
{
    function generaDatosSession2()
    {
    	$ci=& get_instance();
    	$ci->load->model('MProfesionales');

        $idUsuario= $ci->session->sisdato;

		if ($idUsuario)
		{
			$datosUsuario= $ci->MProfesionales->datosUsuario($idUsuario);
			
			$ci->session->set_userdata('gIdUsuario', $datosUsuario[0]->id_cat_profesional);
			$ci->session->set_userdata('gUsuario', $datosUsuario[0]->usuario);
			$ci->session->set_userdata('gNombreUsuario', $datosUsuario[0]->nombre);
			$ci->session->set_userdata('gPerfil', $datosUsuario[0]->rol);
			$ci->session->set_userdata('gIdPerfil', $datosUsuario[0]->id_cat_rol);			
			$ci->session->set_userdata('gFoto', $datosUsuario[0]->imagen);			
			$ci->session->set_userdata('gNombreApellido', $datosUsuario[0]->nombre_apellido);			
			$ci->session->set_userdata('gEmail', $datosUsuario[0]->email);									
			$ci->session->set_userdata('sisdato', $idUsuario);
			$ci->session->set_userdata('code', $datosUsuario[0]->code);
	
		}
		else
		{
			redirect('acceso');
		}
    }   
}


if ( ! function_exists('valAccesoOpcion'))
{

    function valAccesoOpcion($opcion=0)
    {
    	$ci=& get_instance();
    	
    	$perfil= $ci->session->gPerfil;

    	$esAdmin=$ci->session->gRol;

    	if ($esAdmin==1)
    		return 1;

    	

    	$i=$opcion;

    	//echo $i.' '.$perfil[$i].' -'.$perfil;

		if (($perfil[$i]=='1'))
			return 1;
		else
			return 0;

    }   
}




?>
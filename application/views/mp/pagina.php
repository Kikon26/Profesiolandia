<?php
	$data = array(
            'idUsuario' => $this->session->gIdUsuario,
            'usuario' => $this->session->gNombreUsuario,
            'username' => $this->session->gUsuario,
            'id_perfil' => $this->session->gIdPerfil,
            'perfil' => $this->session->gPerfil,
            'foto' => $this->session->gFoto,
            'nombre_apellido' => $this->session->gNombreApellido,
            'email' => $this->session->gEmail,
            'seccion' => $seccion,
            'vista' => $vista,
            'datosvista' => $dataf,
            'menu' => $menu            
        );
    
    $this->load->view('mp/header', $data);
	$this->load->view('mp/menu', $data);
	$this->load->view($vista, $data);
	$this->load->view('mp/footer',$data);

?>

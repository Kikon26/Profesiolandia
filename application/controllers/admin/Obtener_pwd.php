<?php


class Obtener_pwd extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->library('peticion');
        
	}


	
	public function index($cadena="")
	{
		echo sha1(Peticion::obtener('pwd'));
	}


	


}
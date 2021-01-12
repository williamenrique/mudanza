<?php
class Test extends Controllers{
	public function __construct(){
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function test(){
		$data['page_title'] = "TEST";
		$data['page_empresa'] = "Mudanzas JCM";
		$data['page_email'] = strtolower("test@gmail.com");
		$data['page_facebook'] = strtolower("facebook");
		$data['page_instagram'] = strtolower("instagram");
		$data['page_twitter'] = strtolower("twitter");
		$data['url'] = strtolower("url");
		$data['contacto'] = strtolower("contacto");
		$data['page_tlf'] = "telefono";
		$data['page_location'] = "location";
		$data['page_direccion'] = "direccion";
		$data['page_titulo'] = ucwords("titulo");
		$data['page_subtitulo'] = ucwords("subtitulo");
		$data['page_link'] = "home";
		$data['page_function'] = "function.main.js";
		$this->views->getViews($this, "test",$data);
	}

	
}
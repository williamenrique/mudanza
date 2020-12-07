<?php
class Home extends Controllers{
	public function __construct(){
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function home(){
			$data['page_title'] = "Mudanzas - Home";
			$data['page_link'] = "home";
			$data['page_function'] = "function.main.js";
		$this->views->getViews($this, "home",$data);
	}

	// public function sendEmail(string $nombre, string $email, string $asunto, string $mensaje){
	public function sendEmail(){
		if($_POST){
			$nombre = $_POST['nombre'];
			$email = $_POST['email'];
			$asunto = $_POST['asunto'];
			$mensaje = $_POST['mensaje'];

			email($nombre, $email, $asunto, $mensaje);

		}
		die();

	}
}
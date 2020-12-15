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
	/* envio de comentario crear */
	public function setComent(){
		if($_POST){
			$txtNombre = $_POST['txtNombre'];
			$txtemail = $_POST['txtEmail'];
			$txtMensaje = $_POST['txtMensaje'];
			if(empty($_POST['txtNombre']) || empty($_POST['txtEmail'] )|| empty($_POST['txtMensaje'] )){
				$arrResponse = array("status" => false, "msg" => "Debe llenar los campos");
			}else{
				$requestComent = $this->model->insertComent($txtNombre, $txtemail, $txtMensaje);
				if($requestComent > 0){
					$arrResponse = array("status" => true, "msg" => "Comentario creado");
				}else{
					$arrResponse = array("status" => false, "msg" => "Imposible crear el comentario");
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
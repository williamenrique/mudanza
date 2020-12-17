<?php
class Home extends Controllers{
	public function __construct(){
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function home(){
		$sqlDatos = $this->model->getDatos();
		$data['page_title'] = $sqlDatos["empresa"];
		$data['page_empresa'] = $sqlDatos["empresa"];
		$data['page_email'] = strtolower($sqlDatos["email"]);
		$data['page_tlf'] = $sqlDatos["telefono"];
		$data['page_titulo'] = ucwords($sqlDatos["titulo"]);
		$data['page_subtitulo'] = ucwords($sqlDatos["subtitulo"]);
		$data['page_link'] = "home";
		$data['page_function'] = "function.main.js";
		$this->views->getViews($this, "home",$data);
	}
	// public function sendEmail(string $nombre, string $email, string $asunto, string $mensaje){
	public function sendEmail(){
		if($_POST){
			$nombre = ucwords($_POST['nombre']);
			$email = strtolower($_POST['email']);
			$asunto = ucwords($_POST['asunto']);
			$mensaje = ucwords($_POST['mensaje']);

			email($nombre, $email, $asunto, $mensaje);
		}
		die();
	}
	/* envio de comentario crear */
	public function setComent(){
		if($_POST){
			$idComent = intval($_POST['idComent']);
			$txtNombre = ucwords($_POST['txtNombre']);
			$txtemail = strtolower($_POST['txtEmail']);
			$txtMensaje = ucwords($_POST['txtMensaje']);

			if(empty($_POST['txtNombre']) || empty($_POST['txtEmail'] )|| empty($_POST['txtMensaje'] )){
				$arrResponse = array("status" => false, "msg" => "Debe llenar los campos");
			}else{

				if(empty($idComent)){
					$requestComent = $this->model->insertComent($txtNombre, $txtemail, $txtMensaje);
					if($requestComent > 0){
						$arrResponse = array("status" => true, "msg" => "Comentario creado");
					}else{
						$arrResponse = array("status" => false, "msg" => "Imposible crear el comentario");
					}
				}else{
					$requestComent = $this->model->insertReply($txtNombre, $txtemail, $txtMensaje);
					if($requestComent > 0){
						$this->model->insertReplyComent($idComent,$requestComent);

						$arrResponse = array("status" => true, "msg" => "Comentario creado");
					}else{
						$arrResponse = array("status" => false, "msg" => "Imposible crear el comentario");
					}
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	/* obtener los comentarios */
	public function getComents(){
		$arrData = $this->model->selectComents();
		$htmlOptions = "";
		if(empty($arrData)){
			$htmlOptions .= '
											<div class=" msjAlert">
												No existen comentarios aun...!
											</div>
											';
		}else{
			$htmlOptions .='
										<ul id="comments-list" class="comments-list">
										';
			foreach ($arrData as $key) {
				/* comentario */
				$htmlOptions .= '
											<li >
												<div class="mb-4 comment-main-level">
													<!-- Contenedor del Comentario -->
													<div class="comment-box">
														<div class="comment-head">
															<h6 class="comment-name by-author"><a href="#">'.$key['autor'].'</a></h6>
															<span>'.formatear_fecha($key['fecha']).'</span>
															<i class="fa fa-reply" onclick="fntReply('.$key['id'].')"></i>
														</div>
														<div class="comment-content">
															'.$key['contenido'].'
														</div>
													</div>
												</div>
												';
				$arrDataR = $this->model->selectReply($key['id']);
				for ($i=0; $i < count($arrDataR) ; $i++) {
					/* respuestas de comentario */
				$htmlOptions .= '
												<ul class="comments-list reply-list">
													<li>
														<!-- Contenedor del Comentario -->
														<div class="comment-box">
															<div class="comment-head">
																<h6 class="comment-name"><a href="#">'.$arrDataR[$i]['nombre'].'</h6>
																<span>'.formatear_fecha($arrDataR[$i]['fecha']).'</span>
															</div>
															<div class="comment-content">
															'.$arrDataR[$i]['respuesta'].'
															</div>
														</div>
													</li>
												</ul>
											</li>
												';
				}
			}
			$htmlOptions .= '
									</ul>
											';
		}
		echo $htmlOptions;
		die();
	}

	/* obtener un solo comentario */
	public function getComent(int $id){
		$intIdComent = intval($id);
		if($intIdComent > 0){
			$arrData = $this->model->selectComent($intIdComent);
			if(empty($arrData)){
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
			}else{
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	/* envio de respuesta de comentario */
	public function setReply(){
		if($_POST){
			$txtIdComent = intval($_POST['idComent']);
			$txtNombre = ucwords($_POST['txtNombre']);
			$txtemail = strtolower($_POST['txtEmail']);
			$txtMensaje = ucwords($_POST['txtMensaje']);
			if(empty($_POST['txtNombre']) || empty($_POST['txtEmail'] )|| empty($_POST['txtMensaje'] )){
				$arrResponse = array("status" => false, "msg" => "Debe llenar los campos");
			}else{
				$requestComent = $this->model->insertReply($txtNombre, $txtemail, $txtMensaje);
				if($requestComent > 0){
					$this->model->insertReplyComent($txtIdComent,$requestComent);

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
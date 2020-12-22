<?php
header('Access-Control-Allow-Origin: *');
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
		$data['page_facebook'] = strtolower($sqlDatos["facebook"]);
		$data['page_instagram'] = strtolower($sqlDatos["instagram"]);
		$data['page_twitter'] = strtolower($sqlDatos["twitter"]);
		$data['page_tlf'] = $sqlDatos["telefono"];
		$data['page_location'] = $sqlDatos["location"];
		$data['page_direccion'] = $sqlDatos["direccion"];
		$data['page_titulo'] = ucwords($sqlDatos["titulo"]);
		$data['page_subtitulo'] = ucwords($sqlDatos["subtitulo"]);
		$data['page_link'] = "home";
		$data['page_function'] = "function.main.js";
		$this->views->getViews($this, "home",$data);
	}
	// public function sendEmail(string $nombre, string $email, string $asunto, string $mensaje){
	public function sendEmail(){
		if($_POST){
			$nombre = strClean(ucwords($_POST['nombre']));
			$email = strClean(strtolower($_POST['email']));
			$asunto = strClean(ucwords($_POST['asunto']));
			$mensaje = strClean(ucwords($_POST['mensaje']));

			// email($nombre, $email, $asunto, $mensaje);


		$from= "contacto@transportemudanzas.cl";
		$to = 'william21enrique@gmail.com';
		$subject = $asunto ;
		$headers = 'From: ' . $email . PHP_EOL ;

		$message  = "<html><body>";
		$message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
		$message .= "<tr><td>";
		$message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
		$message .= "<thead>
			<tr height='80'>
			<th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' >Transporte & Mudanzas</th>
			</tr>
								</thead>";
		$message .= "<tbody>
									<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
										<td colspan='4' style='background-color:#00a2d1; text-align:center;'><a href='' style='color:#fff; text-decoration:none; text-transform : uppercase'>Cliente con una inquietud se a comunicado con nosotros</a></td>
									</tr>
									<tr>
										<td colspan='4' style='padding:15px;'>
											<p style='font-size:16px;'>Hola mi nombre es ' ".$nombre." '.</p>
											<hr />
											<p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>".$mensaje.".</p>
											<p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'> Responder a ".$email."</p>
										</td>
									</tr>
									</tbody>";
		$message .= "</table>";
		$message .= "</td></tr>";
		$message .= "</table>";
		$message .= "</body></html>";
			// $para      = 'william21enrique@gmail.com';
			// $titulo    = $asunto;
			// $mensaje   = $mensaje;
			// $cabeceras = 'From: contactomudanza@gmail.com' . "\r\n" .
			// 'Reply-To: '.$email . "\r\n" .
			// 'X-Mailer: PHP/' . phpversion();

			// $success= 	mail($para, $titulo, $mensaje, $cabeceras);
		$success =  mail($to, $subject, $message,"MIME-Version: 1.0\nContent-type: text/html; charset=UTF-8\n".$headers."");
		if (!$success) {
			$arrResponse = array("status" => false, "msg" => error_get_last()['Ah ocurrido un error']);
		}else{
			$this->replyEmail($nombre, $email, $mensaje);
			$arrResponse = array("status" => true, "msg" => "Gracias por comunicarte con nosotros ".$nombre." pronto seras contactado por nosotros.");
			// $this->model->setEmail($nombre, $email,$asunto,$mensaje);
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	function replyEmail(string $nombre, string $email, string $mensaje){
		$nombre = strClean(ucwords($nombre));
		$email = strClean(strtolower($email));
		$mensaje = strClean(ucwords($mensaje));

		$from= "contacto@transportemudanzas.cl";
		$contacto = "william21enrique@gmail.com";
		$to = $email;
		$subject = "Copia de email de informacion a Transporte & Mudanzas";
		$headers = 'From: ' . $from . PHP_EOL ;

		$message  = "<html><body>";
		$message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
		$message .= "<tr><td>";
		$message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
		$message .= "<thead>
			<tr height='80'>
			<th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' >Transporte & Mudanzas</th>
			</tr>
								</thead>";
		$message .= "<tbody>
									<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
										<td colspan='4' style='background-color:#00a2d1; text-align:center;'><a href='' style='color:#fff; text-decoration:none; text-transform : uppercase'>Gracias por elejirnos pronto seras contactado por nosotros</a></td>
									</tr>
									<tr>
										<td colspan='4' style='padding:15px;'>
											<p style='font-size:16px;'>Hola ".$nombre.".</p>
											<hr />
											<p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>Hemos recibido tu mensaje pronto nos comunicaremos contigo y atenderemos tus inquietudes.</p>
											<ul>
												<p style='font-size:14px; font-family:Verdana, Geneva, sans-serif;'> Copida de su pregunta</p>
												<li style='font-size:12px; font-family:Verdana, Geneva, sans-serif;'>".$mensaje.".</li>
											</ul>
											<p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'> Responder a ".$contacto."</p>
										</td>
									</tr>
									</tbody>";
		$message .= "</table>";
		$message .= "</td></tr>";
		$message .= "</table>";
		$message .= "</body></html>";
		mail($to, $subject, $message,"MIME-Version: 1.0\nContent-type: text/html; charset=UTF-8\n".$headers."");
	}
	/* envio de comentario crear */
	public function setComent(){
		if($_POST){
			$idComent = intval($_POST['idComent']);
			$txtNombre =strClean( ucwords($_POST['txtNombre']));
			$txtemail = strClean(strtolower($_POST['txtEmail']));
			$txtMensaje = strClean(ucwords($_POST['txtMensaje']));

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
			$txtNombre = strClean(ucwords($_POST['txtNombre']));
			$txtemail = strClean(strtolower($_POST['txtEmail']));
			$txtMensaje = strClean(ucwords($_POST['txtMensaje']));
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
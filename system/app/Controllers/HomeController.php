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
		$data['url'] = strtolower($sqlDatos["url"]);
		$data['contacto'] = strtolower($sqlDatos["contacto"]);
		$data['page_tlf'] = $sqlDatos["telefono"];
		$data['page_location'] = $sqlDatos["location"];
		$data['page_direccion'] = $sqlDatos["direccion"];
		$data['page_titulo'] = ucwords($sqlDatos["titulo"]);
		$data['page_subtitulo'] = ucwords($sqlDatos["subtitulo"]);
		$data['page_link'] = "home";
		$data['page_function'] = "function.main.js";
		$this->views->getViews($this, "home",$data);
	}

	// user php mailer
	// public function sendEmail(string $nombre, string $email, string $asunto, string $mensaje){
		public function sendEmail(){
		include 'system/core/PHPMailer/PHPMailerAutoload.php';

		if($_POST){
			$nombre = strClean(ucwords($_POST['nombre']));
			$email = strClean(strtolower($_POST['email']));
			$asunto = strClean(ucwords($_POST['asunto']));
			$mensaje = strClean(ucwords($_POST['mensaje']));
			$destinatario = $email;
			if(empty($nombre) || empty($email ) || empty($asunto ) || empty($mensaje )){
			$arrResponse = array("status" => false, "msg" => "Debe llenar los campos");
			}else{
	      
				$mail = new PHPMailer;

				//$mail->SMTPDebug = 3;                               // Enable verbose debug output

				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'mail.transportemudanzas.cl';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'enviomail@transportemudanzas.cl';                 // SMTP username
				$mail->Password = 'Prueba12';                           // SMTP password
				$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587; 

				$mail->setFrom('william21enrique@gmail.com', 'Mailer');
				$mail->addAddress($email, $nombre);     

				$mail->Subject = $asunto;
				$mail->Body    = $mensaje;

				if(!$mail->send()) {
					$arrResponse = array("status" => false, "msg" => "A ocurrio un error en la configuración");
						// echo 'Error del mensaje: ' . $mail->ErrorInfo;
				} else {
					$arrResponse = array("status" => true, "msg" => "Gracias por comunicarte con nosotros ".$nombre." pronto seras contactado por nosotros.");
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	public function sendEma(){
		require_once 'system/core/PHPMailer/send_mail.php';
		if($_POST){
			$nombre = strClean(ucwords($_POST['nombre']));
			$email = strClean(strtolower($_POST['email']));
			$asunto = strClean(ucwords($_POST['asunto']));
			$mensaje = strClean(ucwords($_POST['mensaje']));
			$destinatario = $email;
			if(empty($nombre) || empty($email ) || empty($asunto ) || empty($mensaje )){
			$arrResponse = array("status" => false, "msg" => "Debe llenar los campos");
			}else{

				// $successEmail = email($nombre, $email, $asunto, $mensaje);
				
				$fecha = formatear_fecha(date('Y-m-d'));
				$SES_USER = Username;
				// configuro direccion de envio
				$mail->setFrom($SES_USER, $nombre);
				// $mail->setFrom($destinatario, $nom);

				// ASUNTO DEL MENSAJE: Debe trarse de la config del cliente
				$mail->Subject = $asunto;

				// borro y seteo la direccion de respuesta
				$mail->clearReplyTos();
				// $mail->addReplyTo($SES_USER);
				$mail->addReplyTo($destinatario);

				$message = $mensaje;
					// asigno el cuerpo a la clase
				$mail->msgHTML($message);

				// borro y seteo el email del Destinatario
				$mail->ClearAllRecipients();
				// $mail->addAddress($destinatario, "");
				$mail->addAddress($SES_USER, "");

				// Success
				if ($mail->send()) {
					$arrResponse = array("status" => true, "msg" => "Gracias por comunicarte con nosotros ".$nombre." pronto seras contactado por nosotros.");
				} else {
					$arrResponse = array("status" => false, "msg" => "A ocurrio un error en la configuración");
				}

				// if($successEmail){
				// 	$this->replyEmail($nombre, $email, $mensaje);
				// }
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
	die();
	}

	function replyEmail(string $nombre, string $email, string $mensaje){
		$nombre = strClean(ucwords($nombre));
		$email = strClean(strtolower($email));
		$mensaje = strClean(ucwords($mensaje));
		$fecha = formatear_fecha(date('Y-m-d'));
		$sqlDatos = $this->model->getDatos();
		$from= EMAIL;
		// $contacto = "william21enrique@gmail.com";
		$to = $email;
		$subject = "Copia de email de informacion a Transporte & Mudanzas";
		$headers = 'From: ' . $from . PHP_EOL ;

		$message  = "<!DOCTYPE html	PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<title>Transporte&mudanzas</title>
	<style type='text/css'>
		body {
			padding-top: 0 !important;
			padding-bottom: 0 !important;
			padding-top: 0 !important;
			padding-bottom: 0 !important;
			margin: 0 !important;
			width: 100% !important;
			-webkit-text-size-adjust: 100% !important;
			-ms-text-size-adjust: 100% !important;
			-webkit-font-smoothing: antialiased !important;
		}

		.tableContent img {
			border: 0 !important;
			display: block !important;
			outline: none !important;
		}

		a {
			color: #382F2E;
		}

		p,
		h1 {
			color: #382F2E;
			margin: 0;
		}

		p {
			text-align: left;
			color: #999999;
			font-size: 14px;
			font-weight: normal;
			line-height: 19px;
		}

		a.link1 {
			color: #382F2E;
		}

		a.link2 {
			font-size: 16px;
			text-decoration: none;
			color: #ffffff;
		}

		h2 {
			text-align: left;
			color: #222222;
			font-size: 19px;
			font-weight: normal;
		}

		div,
		p,
		ul,
		h1 {
			margin: 0;
		}

		.bgBody {
			background: #ffffff;
		}

		.bgItem {
			background: #ffffff;
		}

		@media only screen and (max-width:480px) {

			table[class='MainContainer'],
			td[class='cell'] {
				width: 100% !important;
				height: auto !important;
			}

			td[class='specbundle'] {
				width: 100% !important;
				float: left !important;
				font-size: 13px !important;
				line-height: 17px !important;
				display: block !important;
				padding-bottom: 15px !important;
			}

			td[class='spechide'] {
				display: none !important;
			}

			img[class='banner'] {
				width: 100% !important;
				height: auto !important;
			}

			td[class='left_pad'] {
				padding-left: 15px !important;
				padding-right: 15px !important;
			}

		}

		@media only screen and (max-width:540px) {

			table[class='MainContainer'],
			td[class='cell'] {
				width: 100% !important;
				height: auto !important;
			}

			td[class='specbundle'] {
				width: 100% !important;
				float: left !important;
				font-size: 13px !important;
				line-height: 17px !important;
				display: block !important;
				padding-bottom: 15px !important;
			}

			td[class='spechide'] {
				display: none !important;
			}

			img[class='banner'] {
				width: 100% !important;
				height: auto !important;
			}

			.font {
				font-size: 18px !important;
				line-height: 22px !important;

			}

			.font1 {
				font-size: 18px !important;
				line-height: 22px !important;

			}
		}
	</style>

	<script type='colorScheme' class='swatch active'>
{
    'name':'Default',
    'bgBody':'ffffff',
    'link':'382F2E',
    'color':'999999',
    'bgItem':'ffffff',
    'title':'222222'
}
</script>

</head>

<body paddingwidth='0' paddingheight='0'
	style='padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;'
	offset='0' toppadding='0' leftpadding='0'>
	<table bgcolor='#ffffff' width='100%' border='0' cellspacing='0' cellpadding='0' class='tableContent' align='center'
		style='font-family:Helvetica, Arial,serif;'>
		<tbody>
			<tr>
				<td>
					<table width='600' border='0' cellspacing='0' cellpadding='0' align='center' bgcolor='#ffffff'
						class='MainContainer'>
						<tbody>
							<tr>
								<td>
									<table width='100%' border='0' cellspacing='0' cellpadding='0'>
										<tbody>
											<tr>
												<td valign='top' width='40'>&nbsp;</td>
												<td>
													<table width='100%' border='0' cellspacing='0' cellpadding='0'>
														<tbody>
															<!-- =============================== Header ====================================== -->
															<tr>
																<td height='75' class='spechide'></td>

																<!-- =============================== Body ====================================== -->
															</tr>
															<tr>
																<td class='movableContentContainer ' valign='top'>
																	<div class='movableContent'
																		style='border: 0px; padding-top: 0px; position: relative;'>
																		<table width='100%' border='0' cellspacing='0' cellpadding='0'>
																			<tbody>
																				<tr>
																					<td height='35'></td>
																				</tr>
																				<tr>
																					<td>
																						<table width='100%' border='0' cellspacing='0' cellpadding='0'>
																							<tbody>
																								<tr>
																									<td valign='top' align='center' class='specbundle'>
																										<div class='contentEditableContainer contentTextEditable'>
																											<div class='contentEditable'>
																												<p
																													style='text-align:center;margin:0;font-family:Georgia,Time,sans-serif;font-size:26px;color:#222222;'>
																													<span class='specbundle2'><span class='font1'>Bienvenid@ ".$nombre."</span></span></p>
																											</div>
																										</div>
																									</td>
																									<td valign='top' class='specbundle'>
																										<div class='contentEditableContainer contentTextEditable'>
																											<div class='contentEditable'>
																												<p
																													style='text-align:center;margin:0;font-family:Georgia,Time,sans-serif;font-size:26px;color:#1A54BA;'>
																													<span class='font'></span> </p>
																											</div>
																										</div>
																									</td>
																								</tr>
																							</tbody>
																						</table>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																	<div class='movableContent'
																		style='border: 0px; padding-top: 0px; position: relative;'>
																		<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center'>
																			<tr>
																				<td valign='top' align='center'>
																					<div class='contentEditableContainer contentImageEditable'>
																						<div class='contentEditable'>
																							<img src='".base_url()."src/images/line.png' width='251' height='43' alt=''
																								data-default='placeholder' data-max-width='560'>
																						</div>
																					</div>
																				</td>
																			</tr>
																		</table>
																	</div>
																	<div class='movableContent'
																		style='border: 0px; padding-top: 0px; position: relative;'>
																		<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center'>
																			<tr>
																				<td height='55'></td>
																			</tr>
																			<tr>
																				<td align='left'>
																					<div class='contentEditableContainer contentTextEditable'>
																						<div class='contentEditable' align='center'>
																							<h2>Hemos recibido un email de su parte esta es una copia?</h2>
																						</div>
																					</div>
																				</td>
																			</tr>

																			<tr>
																				<td height='15'> </td>
																			</tr>

																			<tr>
																				<td align='left'>
																					<div class='contentEditableContainer contentTextEditable'>
																						<div class='contentEditable' align='center'>
																							<p>".$mensaje."
																								<br>
																								<br>
																							¿Tiene preguntas? Póngase en contacto con nosotros a través de Facebook, Twitter o
																							correo electrónico de nuestro equipo de soporte
																								<br>
																								<span style='color:#222222;'>".$fecha."</span>
																							</p>
																						</div>
																					</div>
																				</td>
																			</tr>

																			<tr>
																				<td height='55'></td>
																			</tr>

																			<tr>
																				<td align='center'>

																				</td>
																			</tr>
																			<tr>
																				<td height='20'></td>
																			</tr>
																		</table>
																	</div>
																	<div class='movableContent'
																		style='border: 0px; padding-top: 0px; position: relative;'>
																		<table width='100%' border='0' cellspacing='0' cellpadding='0'>
																			<tbody>
																				<tr>
																					<td height='65'>
																				</tr>
																				<tr>
																					<td style='border-bottom:1px solid #DDDDDD;'></td>
																				</tr>
																				<tr>
																					<td height='25'></td>
																				</tr>
																				<tr>
																					<td>
																						<table width='100%' border='0' cellspacing='0' cellpadding='0'>
																							<tbody>
																								<tr>
																									<td valign='top' class='specbundle'>
																										<div class='contentEditableContainer contentTextEditable'>
																											<div class='contentEditable' align='center'>
																												<p
																													style='text-align:left;color:#CCCCCC;font-size:12px;font-weight:normal;line-height:20px;'>
																													<span style='font-weight:bold;'>Transporte & Mudanzas</span>
																													<br>
																													".$sqlDatos['direccion']."
																													<br>
																													<a href='#'>".$sqlDatos['telefono']."</a><br>
																													<a target='_blank' class='link1' class='color:#382F2E;'
																														href='".$sqlDatos['url']."'>Visiatanos en nuestro sitio</a><br>
																													<a href'#'>".$sqlDatos['contacto']."</a>
																												</p>
																											</div>
																										</div>
																									</td>
																									<td valign='top' width='30' class='specbundle'>&nbsp;</td>
																									<td valign='top' class='specbundle'>
																										<table width='100%' border='0' cellspacing='0' cellpadding='0'>
																											<tbody>
																												<tr>
																													<td valign='top' width='52'>
																														<div
																															class='contentEditableContainer contentFacebookEditable'>
																															<div class='contentEditable'>
																																<a target='_blank' href='".$sqlDatos['facebook']."'><img
																																		src='".base_url()."src/images/face.png' width='52' height='53'
																																		alt='facebook icon' data-default='placeholder'
																																		data-max-width='52' data-customIcon='true'></a>
																															</div>
																														</div>
																													</td>
																													<td valign='top' width='16'>&nbsp;</td>
																													<td valign='top' width='52'>
																														<div
																															class='contentEditableContainer contentFacebookEditable'>
																															<div class='contentEditable'>
																																<a href='".$sqlDatos['instagram']."'><img
																																		src='".base_url()."src/images/instagram.png' width='52' height='53'
																																		alt='Instagram icon' data-default='placeholder'
																																		data-max-width='52' data-customIcon='true'></a>
																															</div>
																														</div>
																													</td>
																													<td valign='top' width='16'>&nbsp;</td>
																													<td valign='top' width='52'>
																													</td>
																												</tr>
																											</tbody>
																										</table>
																									</td>
																								</tr>
																							</tbody>
																						</table>
																					</td>
																				</tr>
																				<tr>
																					<td height='88'></td>
																				</tr>
																			</tbody>
																		</table>

																	</div>

																	<!-- =============================== footer ====================================== -->

																</td>
															</tr>
														</tbody>
													</table>
												</td>
												<td valign='top' width='40'>&nbsp;</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</body>

</html>";
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
        //dep($arrData);
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
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);

		//die();
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
<?php
header('Access-Control-Allow-Origin: *');
//retorna la ruta del proyecto
function base_url(){
	return BASE_URL;
}

function head($data = ""){
	$view_header = VIEWS."Modules/header.php";
	require_once  $view_header;
}

function footer($data = ""){
	$view_footer = VIEWS."Modules/footer.php";
	require_once  $view_footer;
}

function modules(string $nameModule,$data){
	$view_module = VIEWS."Modules/{$nameModule}.php";
	require_once  $view_module;
}

function getModal(string $nameModal, $data){
	$view_modal = VIEWS."Modules/Modals/{$nameModal}.php";
	require_once $view_modal;
}
//muestra informacion formateada
function dep($data){
	$format = print_r('<pre>');
	$format = print_r($data);
	$format = print_r('</pre>');
	return $format;
}
function encryption($string){
	$output=FALSE;
	$key=hash('sha256', SECRET_KEY);
	$iv=substr(hash('sha256', SECRET_IV), 0, 16);
	$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
	$output=base64_encode($output);
	return $output;
}
function decryption($string){
	$key=hash('sha256', SECRET_KEY);
	$iv=substr(hash('sha256', SECRET_IV), 0, 16);
	$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
	return $output;
}
function formatear_timestamp($fecha){
	$dia = date('w', $fecha);
	$dias = ["Lun", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"];
	$mes = date("m", strtotime($fecha));
	$meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
	$salida = $dias[$dia-1].', '.date("d", strtotime($fecha)).' de '.$meses[$mes-1].' a las '.date("G:i a", strtotime($fecha));
	return $salida;
}

function formatear_fecha($fecha){
	$dia = date('N', strtotime($fecha));
	$dias = ["Lun", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"];
	$mes = date("m", strtotime($fecha));
	$ano = date("Y", strtotime($fecha));
	$meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
	$salida = $dias[$dia-1].', '.date("d", strtotime($fecha)).' de '.$meses[$mes-1].' · '.$ano;
	return $salida;
}
function sessionUser(int $idUser){
	require_once ("system/app/Models/LoginModel.php");
	$objLogin = new LoginModel();
	$request = $objLogin->sessionLogin($idUser);
	return $request;
}

function endTimeline(string $strCodigo,string $strHoraFin){
	require_once ("system/app/Models/TimeLineModel.php");
	$objTimeLine = new TimeLineModel();
	$request = $objTimeLine->endTimeline($strCodigo,$strHoraFin);
	return $request;
}
function setTimeline(int $intIdUser, string $strCodigo, string $strFecha, string $strHoraInicio){
	require_once ("system/app/Models/TimeLineModel.php");
	$objTimeLine = new TimeLineModel();
	$request = $objTimeLine->setTimeline($intIdUser,$strCodigo,$strFecha,$strHoraInicio);
	return $request;
}
function strClean($srtCadena){
	$string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''],$srtCadena);
	$string = trim($srtCadena);
	$string = stripslashes($srtCadena);
	$string = str_ireplace("<script>","",$string);
	$string = str_ireplace("</script>","",$string);
	$string = str_ireplace("<script src>","",$string);
	$string = str_ireplace("<script type=>","",$string);
	$string = str_ireplace("SELECT * FROM ","",$string);
	$string = str_ireplace("DELETE * FROM ","",$string);
	$string = str_ireplace("INSERT INTO ","",$string);
	$string = str_ireplace("SELECT COUNT(*) FROM ","",$string);
	$string = str_ireplace("DELETE TABLE ","",$string);
	$string = str_ireplace("DROP TABLE ","",$string);
	$string = str_ireplace("OR '1'='1' ","",$string);
	$string = str_ireplace('OR "1"="1" ',"",$string);
	$string = str_ireplace("IS NULL; --","",$string);
	$string = str_ireplace('LIKE "',"",$string);
	$string = str_ireplace("LIKE '","",$string);
	$string = str_ireplace("--","",$string);
	$string = str_ireplace("^","",$string);
	$string = str_ireplace("[","",$string);
	$string = str_ireplace("]","",$string);
	$string = str_ireplace("==","",$string);

	return $string;
}

function passGenerator($length = 10){
	$pass = "";
	$longitud = $length;
	$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	$longitudcadena = strlen($cadena);
	for ($i=1; $i <= $longitud; $i++) {
		$pas = rand(0, $longitudcadena -1);
		$pass .= substr($cadena,$pas,1);
	}
	return $pass;
}
function codGenerator($length = 4){
	$pass = "";
	$longitud = $length;
	$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	$longitudcadena = strlen($cadena);
	for ($i=1; $i <= $longitud; $i++) {
		$pas = rand(0, $longitudcadena -1);
		$pass .= substr($cadena,$pas,1);
	}
	return $pass;
}

function token(){
	$sr1 = bin2hex(random_bytes(10));
	$sr2 = bin2hex(random_bytes(10));
	$sr3 = bin2hex(random_bytes(10));
	$sr4 = bin2hex(random_bytes(10));
	$token = $sr1 .'-'.$sr2.'-'.$sr3.'-'.$sr4;
	return $token;
}

function cargar_menu (string $strNick){
	require_once ("system/app/Models/MenuModel.php");
	$objMenu = new MenuModel();
	$arrData = $objMenu->menuUser($strNick);
	$id_menu = "";
	if ($arrData <> ""){
		$options=array();
		echo "<li class='nav-item dashboard'>
		<a href='".base_url()."dashboard' class='nav-link dashboard-link'>
		<i class='nav-icon fas fa-tachometer-alt'></i>
		<p>Dashboard</p>
		</a>
		</li>";
		foreach($arrData as $index => $valor){
			$options[$index+1]["id_menu"] = $valor["id_menu"];
			$options[$index+1]["nombre_menu"] = $valor["nombre_menu"];
			$options[$index+1]["nombre_sub_menu"] = $valor["nombre_sub_menu"];
			$options[$index+1]["page_menu_open"] = $valor["page_menu_open"];
			$options[$index+1]["page_link_activo"] = $valor["page_link_activo"];
			$options[$index+1]["page_link"] = $valor["page_link"];
			$options[$index+1]["icono"] = $valor["icono"];
			$options[$index+1]["url"] = $valor["url"];
			if ($id_menu <> $options[$index+1]["id_menu"]){
				if ($id_menu <> ""){
					echo "</ul>
								</li>";
				}
				echo "<li class='nav-item ".$options[$index+1]["page_menu_open"]."'>";
				// echo "<li class='sub-menu item_".$options[$index+1]['nombre_menu']."'>";
				echo "<a href='#' class='nav-link ".$options[$index+1]["page_link"]."'>";
				echo "<i class='nav-icon ".$options[$index+1]["icono"]."'></i>";
				echo "<p>".$options[$index+1]["nombre_menu"]."<i class='right fas fa-angle-left'></i></p>
							</a>";
				// echo "<span>".$options[$index+1]['nombre_menu']."</span></a>
				// <ul class='sub'>";
				echo "<ul class='nav nav-treeview'>";
				$id_menu = $options[$index+1]['id_menu'];
			}
			echo "<li class='nav-item link-".$options[$index+1]["page_link_activo"]."'>";
			echo "<a href='".base_url().$options[$index+1]["url"]."' class='nav-link'>";
			echo "<i class='ml-3 far fa-circle nav-icon'></i>
						<p>".$options[$index+1]["nombre_sub_menu"]."</p>";
			echo "
					</a>
				</li>";
		}
	}
}


function email(string $nombre, string $email, string $asunto, string $mensaje){
	require_once 'system/core/PHPMailer/send_mail.php';
	$destinatario = $email;
	$asunto = $asunto;
	$mensaje =$mensaje;
	$nom = $nombre;

	if(empty($nombre) || empty($email ) || empty($asunto ) || empty($mensaje )){
				$arrResponse = array("status" => false, "msg" => "Debe llenar los campos");
	}else{

		$fecha = formatear_fecha(date('Y-m-d'));
		$SES_USER = Username;
		// configuro direccion de envio
		$mail->setFrom($SES_USER, $nom);
		// $mail->setFrom($destinatario, $nom);

		// ASUNTO DEL MENSAJE: Debe trarse de la config del cliente
		$mail->Subject = $asunto;

		// borro y seteo la direccion de respuesta
		$mail->clearReplyTos();
		// $mail->addReplyTo($SES_USER);
		$mail->addReplyTo($destinatario);

		// armo el body
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
																													<span class='specbundle2'><span class='font1'>Transporte & Mudanzas</span></span></p>
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
																							<h2>Hola mi nombre es ".$nombre.".</h2>
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
																					<td height='25'>
																						<a href='#'class='color:#382F2E;'>Enviado por :".$nombre."</a><br>
																						<a href'#'>Email :".$email."</a>
																					</td>
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

																												</p>
																											</div>
																										</div>
																									</td>
																									<td valign='top' width='30' class='specbundle'>&nbsp;</td>
																									<td valign='top' class='specbundle'>

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
	}
	echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
}
<?php
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
function formatMoney($cant){
	$cant = number_format($cant,2,SPD,SPM);
	return $cant;
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
			echo "<i class='far fa-circle nav-icon ml-3'></i>
						<p>".$options[$index+1]["nombre_sub_menu"]."</p>";
			echo "
					</a>
				</li>";
		}
	}
}
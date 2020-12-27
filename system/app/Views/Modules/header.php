<!DOCTYPE html>
<html lang="es"
	class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths">

<head>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<?php
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	header("Allow: GET, POST, OPTIONS, PUT, DELETE");
		$method = $_SERVER['REQUEST_METHOD'];
		if($method == "OPTIONS") {
				die();
		}
	?>
	<title><?= $data['page_title']?></title>
	<meta content="" name="description">
	<meta content="" name="keywords">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="robots" content="noindex">
	<!-- tags -->
	<meta name="description" content=" Nuestro compromiso se basa en la calidad de nuestro servicio, en el cumplimiento de los
						plazos, y en la utilización de un personal altamente especializado y capacitado, generando así, la
						satisfacción total de nuestros clientes.">
	<meta name="author" content="Juan Carlos Matheus">
	<meta property="og:locale" content="es_ES" />
	<meta property="og:site_name" content="https://transportemudanzas.cl/" />

	<meta property="og:url"           content="https://transportemudanzas.cl/" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Viajes, mudanzas y transporte"" />
	<meta property="og:description"   content="Web de mudanzas y transporte en todo chile post de nuestra empresa. Nuestro compromiso se basa en la calidad de nuestro servicio, en el cumplimiento de los
						plazos, y en la utilización de un personal altamente especializado y capacitado, generando así, la
						satisfacción total de nuestros clientes." />
	<meta property="og:image"         content="https://transportemudanzas.cl/src/images/publicidad.jpg" />
	<!-- Favicons -->
	<link href="<?= IMG ?>favicon(1).png" rel="icon">
	<link href="<?= IMG ?>apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link
		href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700"
		rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="<?= PLUGINS ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= PLUGINS ?>ionicons/css/ionicons.min.css" rel="stylesheet">
	<link href="<?= PLUGINS ?>animate.css/animate.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
	<!-- <link href="<?= PLUGINS ?>font-awesome/css/font-awesome.min.css" rel="stylesheet"> -->
	<link href="<?= PLUGINS ?>venobox/venobox.css" rel="stylesheet">
	<link href="<?= PLUGINS ?>owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="<?= PLUGINS ?>boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="<?= PLUGINS ?>sweetalert/sweetalert2.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="<?= CSS ?>style.main.css" rel="stylesheet">
	<link href="<?= CSS ?>style.css" rel="stylesheet">
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v9.0&appId=192787595877367&autoLogAppEvents=1" nonce="JnKWBhaM"></script>

</head>

<body>
	<?php require_once 'nav.php'?>

<div class="fb-share-button" data-href="https://transportemudanzas.cl/" data-layout="button_count" data-size="small">
<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Ftransportemudanzas.cl%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a>
</div>
<!DOCTYPE html>
<html lang="es">

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
		-->
		<!-- tags -->
		<!-- Favicons -->
		<link href="<?= IMG ?>favicon(1).png" rel="icon">
		<link href="<?= IMG ?>apple-touch-icon.png" rel="apple-touch-icon">

		<!-- Google Fonts -->
		<link
			href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700"
			rel="stylesheet">

		<!-- Vendor CSS Files -->
		<link href="<?= PLUGINS ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?= PLUGINS ?>animate.css/animate.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
		<link href="<?= PLUGINS ?>sweetalert/sweetalert2.css" rel="stylesheet">

		<!-- Template Main CSS File -->
		<link href="<?= CSS ?>style.main.css" rel="stylesheet">
		<link href="<?= CSS ?>style.css" rel="stylesheet">


	</head>

	<body>
		<?php require_once 'nav.php'?>
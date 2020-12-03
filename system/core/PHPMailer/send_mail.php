<?php
@session_start();
// este archivo es incluido por Andres Botero para crear el objeto PHPMailer en su version 5.2.24
// este archivo debe ser requerido en donde se desee usar PHPMailer
// IMPORTANTE: tiene como dependencia un archivo donde se crean las CONSTANTES SES_SMTP_HOST, SES_USER y SES_PASSWORD

// cargo todas las dependencias
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'Exception.php';
include 'PHPMailer.php';
include 'SMTP.php';

// SMTP Settings
$mail = new PHPMailer(true);
$mail->isSMTP(true);
$mail->SMTPAuth   = true;
$mail->SMTPSecure = $_SESSION['smtp_secure'];
$mail->Host       = $_SESSION['smtp_host'];
$mail->Username   = $_SESSION['correo_electronico'];
$mail->Password   = $_SESSION['clave_correo'];
$mail->Port       = $_SESSION['smtp_port'];

// Activo condificacción utf-8
$mail->CharSet    = 'UTF-8';

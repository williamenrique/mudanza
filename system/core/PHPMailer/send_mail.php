<?php
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
$mail->SMTPSecure = SMTPSecure;
$mail->Host       = Host;
$mail->Username   = Username;
$mail->Password   = Password;
$mail->Port       = Port;

// Activo condificacción utf-8
$mail->CharSet    = 'UTF-8';
<?php
/**
 * @version 1.0
 */

require("class.phpmailer.php");
require("class.smtp.php");

// Valores enviados desde el formulario
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: ../../index.html');
}

if (!isset($_POST["name"]) || !isset($_POST["email"]) || !isset($_POST["message"]) || !isset($_POST["subject"])) {
    die("Es necesario completar todos los datos del formulario");
}

$nombre = $_POST["name"];
$emailA = $_POST["email"];
$asunto = $_POST["subject"];
$mensaje = $_POST["message"];

include("../../config/config.php");

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = $smtpHost;
$mail->SMTPAuth = true;
$mail->Username = $smtpUsuario;
$mail->Password = $smtpClave;
$mail->SMTPSecure = 'ssl'; // Utiliza SSL para cifrado
$mail->Port = 465;
$mail->CharSet = "utf-8";

$mail->setFrom($emailA, '"' . $nombre . '" <' . $emailA . '>');
$mail->addAddress($emailDestino);

$mail->isHTML(true);
$mail->Subject = "Mail desde la web: \n" . $asunto;
$mail->Body = nl2br($mensaje);

try {
    $mail->send();
    header('Location: ../../index.html?mensaje=exito');
    exit;
} catch (Exception $e) {
    header('Location: ../../index.html?mensaje=error');
    exit;
}
?>
?>

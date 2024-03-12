<?php
/**
 * @version 1.0
 */

require("class.phpmailer.php");
require("class.smtp.php");

// Valores enviados desde el formulario
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: ../../index.html');
    exit;
}

if (!isset($_POST["name"]) || !isset($_POST["email"]) || !isset($_POST["message"]) || !isset($_POST["subject"])) {
     header('Location: ../../index.html');
     exit;
}

$nombre = $_POST["name"];
$email = $_POST["email"];
$asunto = $_POST["subject"];
$mensaje = $_POST["message"];

include("../../config/config.php");

$mail = new PHPMailer(true);
$mail->isSMTP();

$mail->setFrom($email, " $nombre $apellido");
$mail->addAddress($emailDestino, "Sitio Web");
$mail->Subject = "Mensaje desde la web: \n" . $asunto;
$mail->msgHTML($message);

// $mail->Body = nl2br($mensaje);

$mail->Host = $smtpHost;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl'; // Utiliza SSL para cifrado
$mail->Port = 465;
$mail->CharSet = "utf-8";





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

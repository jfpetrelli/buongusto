<?php
// Valores enviados desde el formulario
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: ../../index.html');
    exit;
}

//DATOS MAIL  (Reemplazar por mail origen)
$smtpHost = "xxxxxxxxxxxx";
$smtpUsuario = "xxxxxxxxxxxxxxxxxxx";
$smtpClave = "xxxxxxxxxxx";
$emailDestino = "xxxxxxxxxxxxxxxxx";
$smtpAuth = true;
$smtpSecure = 'xxx';
$smtpPort = 000;
?>
<?php
// Valores enviados desde el formulario
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: ../../index.html');
    exit;
}

//DATOS MAIL  (Reemplazar por mail origen)
$smtpHost = "c2152291.ferozo.com";
$smtpUsuario = "webbuongusto@buongusto.com.ar";
$smtpClave = "Q210@saqmw1s01";
$emailDestino = "envasadosbuongusto@gmail.com";
$smtpAuth = true;
$smtpSecure = 'ssl';
$smtpPort = 465;
?>
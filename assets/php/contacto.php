<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $motivo = $_POST['subject'];
    $mensaje = $_POST['message'];

    // Dirección de correo a la que se enviará el formulario
    $destinatario = "jfpetrelli@gmail.com"; // Cambiar por el correo de destino

    // Asunto del correo
    $asunto = "Mensaje de formulario de contacto";

    // Construye el cuerpo del mensaje
    $cuerpoMensaje = "Nombre: $nombre\n";
    $cuerpoMensaje .= "Email: $email\n";
    $cuerpoMensaje .= "Motivo: $motivo\n";
    $cuerpoMensaje .= "Mensaje:\n$mensaje";

    // Encabezados del correo
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Envía el correo
    if (mail($destinatario, $asunto, $cuerpoMensaje, $headers)) {
 //       header ('Location: ../../index.html');
        echo "<h4>El correo fue enviado correctamente!</h4>";
    } else {
//        header ('Location: ../../index.html');
        echo "<h4>El correo fue enviado correctamente!</h4>";
    }
} else {
        header ('Location: ../../index.html');

    }
?>
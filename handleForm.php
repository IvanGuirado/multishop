<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $subject = isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : '';
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

    // Dirección de correo a la que se enviará el mensaje
    $to = "lordefrey@gmail.com";

    // Construir el cuerpo del correo
    $email_body = "Nombre: $name\n";
    $email_body .= "Correo electrónico: $email\n";
    $email_body .= "Asunto: $subject\n\n";
    $email_body .= "Mensaje:\n$message\n";

    // Asunto del correo
    $email_subject = "Nuevo mensaje de: $name";

    // Encabezados del correo
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Enviar el correo
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "El correo se envió correctamente.";
    } else {
        echo "Hubo un error al enviar el correo.";
    }
}


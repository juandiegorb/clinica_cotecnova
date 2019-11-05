<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../email/src/PHPMailer.php';
require '../email/src/SMTP.php';
require '../email/src/Exception.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'pruebacorreocotecnova@gmail.com';                     // SMTP username
    $mail->Password   = 'pruebacotecnova';                               // SMTP password
    $mail->SMTPSecure = 'TLS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('pruebacorreocotecnova@gmail.com', 'Juan rios');
    $mail->addAddress('pruebacorreocotecnova@gmail.com');       // Name is optional
      
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Recuperar contraseña';
    $mail->Body    = 'Ingrse al siguiente link para recuperar cambiar la contraseña';

    $mail->send();
    echo 'El mensaje se envio correctamente';
} catch (Exception $e) {
    echo "Hubo error al enviar el mensaje: '.  {$mail->ErrorInfo}";
}
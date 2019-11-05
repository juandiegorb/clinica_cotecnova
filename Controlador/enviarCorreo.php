<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    if(isset($_POST['enviar']) && !empty($_POST['correoElectronico']) && !empty($_POST['numeroDocumento']) && !empty($_POST['tipousuario'])){
        
        $tipo_usuario = $_POST['tipousuario'];
        $numeroDocumento = $_POST['numeroDocumento'];
        $correo = $_POST['correoElectronico'];
        
        require '../email/src/PHPMailer.php';
        require '../email/src/SMTP.php';
        require '../email/src/Exception.php';

        //Traigo el id del usuario
        //lamado al archivo MySQL
        require_once '../Modelo/MySQL.php';
        //nueva "archivo" MySQL
        $mysql = new MySQL;
        //llamado a funcion conectar
        $mysql->conectar();
        
        if($tipo_usuario == 1){
            $id_medico = $mysql->efectuarConsulta("select id_medico from medicos where numero_documento = ".$numeroDocumento."");
            while ($resultado= mysqli_fetch_assoc($id_medico)){  
                $id = $resultado['id_medico'];    
            }
           
        }else{
            $id_usuario = $mysql->efectuarConsulta("select id_usuario from usuarios where numero_documento= ".$numeroDocumento."");
            while ($resultado= mysqli_fetch_assoc($id_usuario)){  
                $id = $resultado['id_usuario'];    
            }
        }        
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
            $mail->addAddress($correo);       // Name is optional

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Recuperar contraseña';
            $mail->Body    = 'ingrese al siguiente link para recuperar cambiar la contraseña: http://localhost/clinica_cotecnova/Controlador/enviarCorreo.php?id='.$id;

            $mail->send();
            echo 'El mensaje se envio correctamente';
        } catch (Exception $e) {
            echo "Hubo error al enviar el mensaje: '.  {$mail->ErrorInfo}";
        }
    }
?>


<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();
try { //Intentamos enviar el correo
    //Introducimos los parámetros del servidor: vamos a usar servidor gmail
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Permitimos que en caso de algún error con el servidor de gmail nos devuelva la información de dicho error (Esto en producción deberá ser 0)
    $mail->isSMTP(); //Le indicamos que vamos a trabajar con un servidor SMTP que es el que usa gmail
    $mail->Host = 'smtp.gmail.com'; //Introducimos el host de email
    $mail->Port = 465; //puerto SSL que utiliza gmail
    $mail->SMTPAuth = true; //Activamos la autentificación SMTP
    //Introducimos las credenciales de nuestra cuenta gmail desde la que vamos a mandar el correo
    $mail->Username = "practicasphp30@gmail.com"; //email
    $mail->Password = 'jpgahsdcspdlmaeu'; //Contraseña del email
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Permitimos la encriptación de la comunicación
    //Destinatario
    $mail->setFrom("practicasphp30@gmail.com", 'User - UT6 Empresa'); //Quién envía el email
    $mail->addAddress("zstrikke@gmail.com", 'Admin - UT6 Empresa'); //Receptor del email
    //$mail->addReplyTo('info@example.com', 'Information');//Si queremos añadir una dirección de respuesta
    //$mail->addCC('cc@example.com');//Si queremos añadir una copia
    //$mail->addBCC('bcc@example.com');//Si queremos añadir una copia oculta
    //Si queremos adjuntar archivos
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    //Contenido del Email
    //$mail->isHTML(true);//Si el formato es HTML
    $mail->Subject = "PhpMailer Prueba"; //Asunto del email
    $mail->CharSet = "UTF-8"; //Indicamos la codificación de caracteres
    $mail->Body ="Que se acabe ya"; //Cuerpo del email
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';//Texto abreviado que aparece como previsualización del mensaje antes de abrir el mail
    //Finalmente enviamos el email
    if (!$mail->send()) { //Si no se consigue enviar lanza una excepción
        unset($mail);
        throw new Exception($mail->ErrorInfo);
    } else { //Si el email se ha enviado correctamente, en el index le indico al usuario que el email ha sido enviado:
        unset($mail);
        header("Location: ./index.php?emailSent=1");
    }
} catch (Exception $e) { //Si no se ha podido enviar le indico al usuario el error
    unset($mail);
   // header("Location: ./home.php?emailSent=0");
}
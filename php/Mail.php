<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


// DATOS DEL FORMULARIO
$name = $_POST['name'];
$email = $_POST['mail'];
$phone = $_POST['phone'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$km = $_POST['km'];
$ano = $_POST['ano'];
$mensaje = $_POST['mensaje'];
$describa = $_POST['describa'];
$comentarios = $_POST['comentarios'];
$subject = "Nueva Reservacion";

$body = "Este mensaje fue enviado por: " . $name ."\nCasa: " . $marca . "\nNumero Telefonico: " . $phone .  "\nFecha del incidente: " . $email . "\nLugar del incidente: " . $modelo."\nHora del incidente: " . $km."\nCausa del incidente: " .$mensaje."\nDescripcion del problema: " . $describa."\nComentarios adicionales: " .$comentarios;
//  IMAGE
$files = $_FILES['files'];

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->isMail();
    $mail->SMTPDebug = 0;		
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Host = 'mail.tresreyes.mx';
    $mail->Port = '587';     

    $mail->Username = 'noreply@tresreyes.mx';
	$mail->Password = 'tresReyes77%';                                            

    //Recipients
    $mail->setFrom('noreply@tresreyes.mx', 'REPORTE DE INCIDENCIAS');
    $mail->addAddress('gjaimes@galletamkt.com');  //donde se envia el correo

    //Attachments
    # code...
    if (isset($_FILES['files'])) {
        $files_tmp = $_FILES['files']['tmp_name'];
        $files_name = $_FILES['files']['name'];
        $files_error = $_FILES['files']['error'];
        if ($files_tmp[0]) {
            if ($files_error) {
                foreach ($files_tmp as $key => $file_tmp) {
                    $mail->addAttachment($file_tmp, $files_name[$key]);  //Add attachments
                }
            } 
        }
    }

    //Content
    $mail->isHTML(false);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;

    $mail->send();
    echo'<script type="text/javascript">
    alert("Formulario enviado correctamente, Gracias por tu solicitud, tu reservación será confirmada vía telefónica.");
    window.location.href="index.php";
    </script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
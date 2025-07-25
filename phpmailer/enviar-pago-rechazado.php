<?php
require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$input = json_decode(file_get_contents("php://input"), true);
// Datos de la venta
$orden = $input['orden'];
$nombres_apellidos = $input['nombres_apellidos'];
$correo = $input['correo'];

// Leer plantilla HTML
$plantilla = file_get_contents(__DIR__ . '/plantillaCorreoRechazado.html');

// Reemplazar variables en plantilla
$plantilla = str_replace('{{nombres_apellidos}}', $nombres_apellidos, $plantilla);
$plantilla = str_replace('{{orden}}', $orden, $plantilla);

// asunto del correo
$asunto = "Pago rechazado - Paquete de pines para SIRP";

// Crear instancia de PHPMailer
$mail = new PHPMailer();


try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host       = 'mail.icp360rh.com';    
    $mail->SMTPAuth   = true;
    $mail->Username   = 'sirp@icp360rh.com';
    $mail->Password   = 'sirp2025@';  
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('sirp@icp360rh.com', 'Instituto Colombiano de Psicometria');
    $mail->addAddress($correo, $nombres_apellidos);
    $mail->SMTPKeepAlive = true;  
    $mail->Mailer = "smtp"; 

    // Contenido
    $mail->CharSet = "UTF-8";
    $mail->Encoding = "base64";
    $mail->isHTML(true);
    
    $mail->Subject = $asunto;
    $mail->Body  = $plantilla;

    if($mail->send()){
        echo json_encode([
            'Mensaje enviado correctamente.',
            0
        ]);
    }else{
        echo json_encode([
            "Error al enviar el mensaje: {$mail->ErrorInfo}",
            1
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        "Error al enviar el mensaje: {$mail->ErrorInfo}",
        1
    ]);
}
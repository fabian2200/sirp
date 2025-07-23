<?php
require __DIR__ . '/vendor/autoload.php'; // Carga automática de Composer

$tipo_correo = $_POST['tipo_correo'];

$url_login = "https://sqrncqcc.lucusvirtual.es/sirp/index.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if($tipo_correo == 'nueva_venta_admin'){
    // Datos de la venta
    $nombre = $_POST['nombre'];
    $pines = $_POST['pines'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $precio_pin = $_POST['precio_pin'];
    $porcentaje_descuento = $_POST['porcentaje_descuento'];

    $subtotal = $precio_pin * $pines;
    $total_pagar = $subtotal - ($subtotal * ($porcentaje_descuento / 100));
    // Leer plantilla HTML
    $plantilla = file_get_contents(__DIR__ . '/plantillaNuevaVenta.html');
    // Reemplazar variables en plantilla
    $plantilla = str_replace('{{nombre}}', $nombre, $plantilla);
    $plantilla = str_replace('{{pines}}', $pines, $plantilla);
    $plantilla = str_replace('{{usuario}}', $usuario, $plantilla);
    $plantilla = str_replace('{{contrasena}}', $contrasena, $plantilla);
    $plantilla = str_replace('{{precio_pin}}', formater_number($precio_pin), $plantilla);
    $plantilla = str_replace('{{total_pagar}}', formater_number($total_pagar), $plantilla);
    $plantilla = str_replace('{{url_login}}', $url_login, $plantilla);
    $plantilla = str_replace('{{subtotal}}', formater_number($subtotal), $plantilla);
    $plantilla = str_replace('{{porcentaje_descuento}}', formater_number($porcentaje_descuento), $plantilla);

    // asunto del correo
    $asunto = "Compra de Pines - SIRP";
} else if ($tipo_correo == 'venta_existente_admin'){
    // Datos de la venta
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $pines = $_POST['pines'];
    $precio_pin = $_POST['precio_pin'];
    $porcentaje_descuento = $_POST['porcentaje_descuento'];


    $subtotal = $precio_pin * $pines;
    $total_pagar = $subtotal - ($subtotal * ($porcentaje_descuento / 100));
    // Leer plantilla HTML
    $plantilla = file_get_contents(__DIR__ . '/plantillaVentaExistente.html');
    // Reemplazar variables en plantilla
    $plantilla = str_replace('{{nombre}}', $nombre, $plantilla);
    $plantilla = str_replace('{{pines}}', $pines, $plantilla);
    $plantilla = str_replace('{{precio_pin}}', formater_number($precio_pin), $plantilla);
    $plantilla = str_replace('{{total_pagar}}', formater_number($total_pagar), $plantilla);
    $plantilla = str_replace('{{subtotal}}', formater_number($subtotal), $plantilla);
    $plantilla = str_replace('{{porcentaje_descuento}}', formater_number($porcentaje_descuento), $plantilla);

    // asunto del correo
    $asunto = "Actualización de pines - SIRP";
}

// Crear instancia de PHPMailer
$mail = new PHPMailer();


try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host       = 'mail.sqrncqcc.lucusvirtual.es';         // Ej: smtp.gmail.com
    $mail->SMTPAuth   = true;
    $mail->Username   = '_mainaccount@sqrncqcc.lucusvirtual.es';          // Tu correo
    $mail->Password   = 'Q6xZ17fnQ5hN@*';  // Contraseña o app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // o ENCRYPTION_SMTPS
    $mail->Port       = 587;                            // 465 para SMTPS

    // Remitente y destinatario
    $mail->setFrom('_mainaccount@sqrncqcc.lucusvirtual.es', 'Instituto Colombiano de Psicometria');
    $mail->addAddress($usuario, $nombre);

    // Contenido
    $mail->CharSet = "UTF-8";
    $mail->Encoding = "base64";
    $mail->isHTML(true);
    
    $mail->Subject = $asunto;
    $mail->Body  = $plantilla;
    

    if($mail->send()){
        echo json_encode(array(
            'codigo' => 1,
            'mensaje' => 'Mensaje enviado correctamente.'
         ));
    }else{
        echo json_encode(array(
            'codigo' => 0,
            'mensaje' => "Error al enviar el mensaje: {$mail->ErrorInfo}"
        ));
    }
} catch (Exception $e) {
    echo json_encode(array(
        'codigo' => 0,
        'mensaje' => "Error al enviar el mensaje: {$mail->ErrorInfo}"
    ));
}


function formater_number($number){
    return number_format($number, 0, ',', '.');
}

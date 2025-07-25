<?php
include ("../conexion.php");
require __DIR__ . '/vendor/autoload.php'; // Carga automática de Composer

$url_login = "https://sirp.icp360rh.com/index.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$input = json_decode(file_get_contents("php://input"), true);

$nombrecompleto = $input['nombres'] . ' ' . $input['apellidos'];
$cedula = $input['cedula'];
$correo = $input['correo'];
$pines_comprados = $input['pines_comprados'];
$precio_pin = $input['precio_pin'];
$fecha = DateTime::createFromFormat('d-m-Y H:i:s', $input['fecha']);
$total = $input['total'];
$orden = $input['orden'];


$fecha_format = $fecha->format('Y-m-d');
$dia = $fecha->format('d');
$mes = $fecha->format('m');
$ano = $fecha->format('Y');

$precio_normal = $pines_comprados * $precio_pin;
$porcentaje_descuento = (($precio_normal - $total) / $precio_normal) * 100;

$clave = substr(md5(uniqid()), 0, 10);
$clave_encriptada = md5($clave);

$hay_cliente = $con->query("SELECT * FROM cliente WHERE nroidcc = '$cedula'")->fetch_assoc();
if(!$hay_cliente){
    $con -> query("INSERT INTO cliente (
        nombre,
        fecharegistro,
        estatus,
        usuario,
        clave,
        pines,
        pinesdisp,
        nroidcc
    ) values(
       '$nombrecompleto',
       '$fecha_format',
       1,
       '$correo',
       '$clave_encriptada',
       $pines_comprados,
       $pines_comprados,
       $cedula
    )");

    $id_cliente = $con->insert_id;
    $hay_cliente = false;
}else{
    $id_cliente = $con->query("SELECT idcl FROM cliente WHERE nroidcc=$cedula")->fetch_assoc()['idcl'];
    $con -> query("UPDATE `cliente` SET 
        `pines`= pines+$pines_comprados, 
        `pinesdisp` = pinesdisp+$pines_comprados 
        WHERE idcl=$id_cliente"
    );
    $hay_cliente = true;
}


$con -> query("INSERT INTO `compra`(
    `pines`,
    `dia`, 
    `mes`, 
    `ano`, 
    `precio`, 
    `id_cliente`, 
    `id_venta`, 
    `porcentaje_descuento`
) VALUES (
    $pines_comprados,
    $dia,
    $mes,
    $ano,
    $precio_pin,
    $id_cliente,
    $orden,
    $porcentaje_descuento
)");

if(!$hay_cliente){
    // Datos de la venta
    $nombre = $nombrecompleto;
    $pines = $pines_comprados;
    $usuario = $correo;
    $contrasena = $clave;
    $precio_pin = $precio_pin;
    $porcentaje_descuento = $porcentaje_descuento;
    $subtotal = $precio_normal;
    $total_pagar = $total;

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
} else {
    // Datos de la venta
    $nombre = $nombrecompleto;
    $usuario = $correo;
    $pines = $pines_comprados;
    $precio_pin = $precio_pin;
    $porcentaje_descuento = $porcentaje_descuento;
    $subtotal = $precio_normal;
    $total_pagar = $total;

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
    $mail->Host       = 'mail.icp360rh.com';    
    $mail->SMTPAuth   = true;
    $mail->Username   = 'sirp@icp360rh.com';
    $mail->Password   = 'sirp2025@';  
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('sirp@icp360rh.com', 'Instituto Colombiano de Psicometria');
    $mail->addAddress($usuario, $nombre);
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


function formater_number($number){
    return number_format($number, 0, ',', '.');
}
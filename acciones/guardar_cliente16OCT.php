<?php 

    use PHPMailer;
    use Exception;

    require 'Exception.php';
    require 'PHPMailer.php';
    require 'SMTP.php';


    include_once("../conexion.php");
    $nombre = @$_POST['Nombre'];
    $apellido = @$_POST['Apellido'];
    $numeropines = @$_POST['Pines'];
    $correo = @$_POST['Correo'];
    $tipo = 1;
    $nombrecompleto = $nombre." ".$apellido;
    $fecharegistro  = date("Y-m-d");
    $clave = substr(md5(uniqid()), 0, 10);
    $clavebd = md5($clave);
    $dia  = date("d");
    $mes = date("m");
    $ano = date("Y");
    $precio = $numeropines*$_POST['Precio'];
    $sql="INSERT INTO cliente (nombre,fecharegistro,estatus,usuario,clave,pines,pinesdisp) values('$nombrecompleto','$fecharegistro',$tipo,'$correo','$clavebd',$numeropines,$numeropines)";
    $resultado = $con -> query($sql);
    
    if($resultado)
    {
     echo "<script>
               alert('datos guardados correctamente!');
               window.location= '../registrar.php'
           </script>";
      $sql2="INSERT INTO `compra`(`pines`, `dia`, `mes`, `ano`, `precio`) VALUES ($numeropines,$dia,$mes,$ano,$precio)";
      $resultado2 =$con -> query($sql2);

      $mail = new PHPMailer(true);                              
try {
    //$mail->SMTPDebug = 4;                               // Habilitar el debug

    $mail->isSMTP();                                      // Usar SMTP
    $mail->Host = 'smtp.gmail.com';  // Especificar el servidor SMTP reemplazando por el nombre del servidor donde esta alojada su cuenta
    $mail->SMTPAuth = true;                               // Habilitar autenticacion SMTP
    $mail->Username = 'incolpsicometria@gmail.com';                 // Nombre de usuario SMTP donde debe ir la cuenta de correo a utilizar para el envio
    $mail->Password = ';+]}:_X-o;Uy(8&,:';                           // Clave SMTP donde debe ir la clave de la cuenta de correo a utilizar para el envio
    $mail->SMTPSecure = 'ssl';                            // Habilitar encriptacion
    $mail->Port = 465;                                    // Puerto SMTP                     
    $mail->Timeout       =   30;
    $mail->AuthType = 'LOGIN';

    //Recipients   
    $urllogin="https://www.institutocolombianodepsicometria.com/sirp/";
    $mail->setFrom('incolpsicometria@gmail.com');     //Direccion de correo remitente (DEBE SER EL MISMO "Username")
    $mail->addAddress($correo);     // Agregar el destinatario
    $mail->addReplyTo('incolpsicometria@gmail.com');     //Direccion de correo para respuestas     

    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'Compra de pines';
    $mail->Body    =  "Cordial saludo  ". $nombrecompleto . "," . "<br><br>"
      ." Usted ha adquirido nuestro servicio"  . "<br><br>" 
      ." Su usuario es:  " . $correo . " "  . "<br><br>" 
      ." Su clave es:  " . $clave . " "  . "<br><br>" 
      ." El enlace de inicio es:  " . $urllogin . " "  . "<br><br>" 
      ." De antemano agradecemos la confianza depositada en nosotros." . "<br><br>"
      ." Atentamente:" . "<br>" . "<br>" 
      ." Instituto Colombiano de Psicometría." . "<br>"
      ." Ps. Mgr. Antonio Martínez, Gerente." . "<br>"
      ." Correo: incolpsicometria@gmail.com - Celular (Whatsapp): 3012990890" . "<br></br>";



    $mail->send();
    echo 'El mensaje ha sido enviado';

} catch (Exception $e) {
    echo 'El mensaje no pudo ser enviado. Mailer Error: ', $mail->ErrorInfo;
}

    }
    else
    {
          echo "<script>
                       alert('ha ocurrido un error');
                </script>";
    }
    
?>
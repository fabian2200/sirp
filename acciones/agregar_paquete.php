<?php
    include_once("../conexion.php");

    $nombre = $_POST['nombre'];
    $numero_pines = $_POST['numero_pines'];
    $precio_pin = $_POST['precio_pin'];
    $descuento = $_POST['descuento'];

    $subtotal = $numero_pines * $precio_pin;
    $total = $subtotal - ($subtotal * $descuento / 100);
    
    $sql = "INSERT INTO paquetes (nombre, numero_pines, precio_pin, descuento, subtotal, total) VALUES ('$nombre', '$numero_pines', '$precio_pin', '$descuento', '$subtotal', '$total')";
    $resultado = mysqli_query($con, $sql);

    if($resultado){
        echo json_encode(['status' => 'success', 'message' => 'Paquete agregado correctamente']);
    }else{
        echo json_encode(['status' => 'error', 'message' => 'Error al agregar el paquete']);
    }
?>
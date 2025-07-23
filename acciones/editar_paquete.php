<?php
    include_once("../conexion.php");

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $numero_pines = $_POST['numero_pines'];
    $precio_pin = $_POST['precio_pin'];
    $descuento = $_POST['descuento'];
    
    $subtotal = $numero_pines * $precio_pin;
    $total = $subtotal - ($subtotal * $descuento / 100);

    $sql = "UPDATE paquetes SET nombre = '$nombre', numero_pines = '$numero_pines', precio_pin = '$precio_pin', descuento = '$descuento', subtotal = '$subtotal', total = '$total' WHERE id = '$id'";
    $resultado = mysqli_query($con, $sql);

    if($resultado){
        echo json_encode(['status' => 'success', 'message' => 'Paquete editado correctamente']);
    }else{  
        echo json_encode(['status' => 'error', 'message' => 'Error al editar el paquete']);
    }
?>  
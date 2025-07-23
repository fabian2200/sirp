<?php
    include_once("../conexion.php");

    $id = $_GET['id'];

    $sql = "SELECT * FROM paquetes WHERE id = '$id'";
    $resultado = mysqli_query($con, $sql);

    $paquete = mysqli_fetch_assoc($resultado);

    if($paquete){
        echo json_encode(['status' => 'success', 'paquete' => $paquete]);
    }else{
        echo json_encode(['status' => 'error', 'message' => 'Paquete no encontrado']);
    }
?>
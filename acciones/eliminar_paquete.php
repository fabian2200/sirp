<?php
    include_once("../conexion.php");

    $id = $_POST['id'];

    $sql = "DELETE FROM paquetes WHERE id = '$id'";
    $resultado = mysqli_query($con, $sql);

    if($resultado){
        echo json_encode(['status' => 'success', 'message' => 'Paquete eliminado correctamente']);
    }else{
        echo json_encode(['status' => 'error', 'message' => 'Error al eliminar el paquete']);
    }
?>
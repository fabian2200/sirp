<?php
    include_once("../conexion.php");
    $id = $_POST['Iddepartamento'];
    $nombre = $_POST['Nombredepartamento'];
    $sql = "UPDATE departamentos SET nombre = '$nombre', alias = '$nombre' WHERE iddepto = $id";
    $resultado = $con->query($sql);
    if($resultado){
        echo json_encode(array("status" => "success", "message" => "Datos actualizados correctamente!"));
    }else{
        echo json_encode(array("status" => "error", "message" => "Ha ocurrido un error!"));
    }
?>
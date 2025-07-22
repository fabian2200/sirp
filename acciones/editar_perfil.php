<?php

    include_once("../conexion.php");
    $id = $_POST['Id'];
    $nombre = $_POST['Nombre'];
    $cedula = $_POST['Cedula'];
    $profesion = $_POST['Profesion'];
    $postgrado = $_POST['Postgrado'];
    $tarjeta = $_POST['Tarjeta'];
    $flicencia = $_POST['FLicencia'];
    $licencia = $_POST['Licencia'];
    $celular = $_POST['Celular'];

    $sql = "UPDATE cliente SET nombre = '$nombre', nroidcc = '$cedula', profesion = '$profesion', postgrado = '$postgrado', nrotarjprof = '$tarjeta', fechexp = '$flicencia', nrolicprof = '$licencia', celular = '$celular' WHERE idcl = '$id'";
    $resultado = mysqli_query($con, $sql);

    if($resultado){
        echo json_encode(array("codigo" => 1, "mensaje" => "Datos actualizados correctamente"));
    }else{
        echo json_encode(array("codigo" => 0, "mensaje" => "Error al actualizar los datos"));
    }

?>
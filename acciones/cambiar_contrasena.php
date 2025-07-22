<?php

    include_once("../conexion.php");
    $id = $_POST['Id'];
    $contrasena_actual = $_POST['Contrasena_Actual'];
    $contrasena_nueva = $_POST['Contrasena_Nueva'];

    $contrasena_actual = md5($contrasena_actual);
    $contrasena_nueva = md5($contrasena_nueva);

    $sql_verificar = "SELECT * FROM cliente WHERE idcl = '$id' AND clave = '$contrasena_actual'";
    $resultado_verificar = mysqli_query($con, $sql_verificar);

    if(mysqli_num_rows($resultado_verificar) > 0){
        $sql = "UPDATE cliente SET clave = '$contrasena_nueva' WHERE idcl = '$id'";
        $resultado = mysqli_query($con, $sql);

        if($resultado){
            echo json_encode(array("codigo" => 1, "mensaje" => "Contraseña actualizada correctamente"));
        }else{
            echo json_encode(array("codigo" => 0, "mensaje" => "Error al actualizar la contraseña"));
        }
    }else{
        echo json_encode(array("codigo" => 0, "mensaje" => "Contraseña actual incorrecta"));
    }

?>
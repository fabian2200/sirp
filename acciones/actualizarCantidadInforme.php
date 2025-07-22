<?php

    include '../conexion.php';
    session_start();

    $iddepartamento = $_POST['iddepartamento'];
    $idempresa = $_POST['idempresa'];
    $tipo_informe = $_POST['tipo_informe'];
    $id_cliente = $_SESSION['id'];
    $fecha = date('Y-m-d H:i:s');

    $cantidadgenerada = $con->query("INSERT INTO `informe_general` (`id_empresa`, `id_cliente`, `id_departamento`, `tipo_informe`, `fecha`) VALUES ('$idempresa', '$id_cliente', '$iddepartamento', '$tipo_informe', '$fecha')");

    if($cantidadgenerada){
        echo json_encode(array('status' => 'ok'));
    }else{
        echo json_encode(array('status' => 'error'));
    }

?>
<?php
    include_once("../conexion.php");
    $id = $_POST['id'];

    $empleados = "SELECT * FROM empleado WHERE areatrabajo = $id";
    $resultado_empleados = $con->query($empleados);
    if($resultado_empleados->num_rows > 0){
        echo json_encode(array("status" => "error", "message" => "No se puede eliminar el departamento porque tiene empleados asignados!"));
    }else{
        $sql = "DELETE FROM departamentos WHERE iddepto = $id";
        $resultado = $con->query($sql);
        if($resultado){
            echo json_encode(array("status" => "success", "message" => "Datos eliminados correctamente!"));
        }else{
            echo json_encode(array("status" => "error", "message" => "Ha ocurrido un error!"));
        }
    }
?>
<?php
    require_once '../conexion.php';

    $sql = "SELECT * FROM paquetes";
    $result = mysqli_query($con, $sql);

    $paquetes = array();
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $paquetes[] = $row;
        }
    }

    echo json_encode($paquetes);

    mysqli_close($con);
?>
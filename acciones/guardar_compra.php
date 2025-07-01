<?php 
    include_once("../conexion.php");
    $id = @$_POST['Identificacion'];
    $pines = @$_POST['Pines'];
    $dia  = date("d");
    $mes = date("m");
    $ano = date("Y");
    $precio = $_POST['Precio'];
    $id_venta = 1111;
  
    $sql2="INSERT INTO `compra`(`pines`, `dia`, `mes`, `ano`, `precio`, `id_cliente`, `id_venta`) VALUES ($pines,$dia,$mes,$ano,$precio,$id,$id_venta)";
    $resultado2 =$con -> query($sql2);
    $sql3="UPDATE `cliente` SET `pines`= pines+$pines, pinesdisp = pinesdisp+$pines WHERE idcl=$id";
    $resultado3 =$con -> query($sql3);

    if($resultado2 && $resultado3){
        $resultado = array(
            'mensaje' => 'Venta realizada correctamente!',
            'codigo' => 1
        );
        echo json_encode($resultado);
    }else{
        $resultado = array(
            'mensaje' => 'Error al realizar la venta!',
            'codigo' => 0
        );
        echo json_encode($resultado);
    }
?>
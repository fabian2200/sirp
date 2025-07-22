<?php 
    include_once("../conexion.php");
    $id = @$_POST['Identificacion'];
    $pines = @$_POST['Pines'];
    $porcentaje_descuento = @$_POST['Porcentaje_descuento'];
    $dia  = date("d");
    $mes = date("m");
    $ano = date("Y");
    $precio = $_POST['Precio'];
    $id_venta = 1111;
  
    $sql2="INSERT INTO `compra`(`pines`, `dia`, `mes`, `ano`, `precio`, `id_cliente`, `id_venta`, `porcentaje_descuento`) VALUES ($pines,$dia,$mes,$ano,$precio,$id,$id_venta,$porcentaje_descuento)";
    $resultado2 =$con -> query($sql2);
    $sql3="UPDATE `cliente` SET `pines`= pines+$pines, pinesdisp = pinesdisp+$pines WHERE idcl=$id";
    $resultado3 =$con -> query($sql3);

    $cliente = $con -> query("SELECT * FROM `cliente` WHERE idcl=$id");
    $cliente = mysqli_fetch_assoc($cliente);

    if($resultado2 && $resultado3){
        $resultado = array(
            'mensaje' => 'Venta realizada correctamente!',
            'codigo' => 1,
            'nombre' => $cliente['nombre'],
            'correo' => $cliente['usuario']
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
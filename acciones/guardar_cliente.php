<?php 
    include_once("../conexion.php");
    $nombre = @$_POST['Nombre'];
    $apellido = @$_POST['Apellido'];
    $numeropines = @$_POST['Pines'];
    $correo = @$_POST['Correo'];
    $porcentaje_descuento = @$_POST['Porcentaje_descuento'];
    $tipo = 1;
    $nombrecompleto = $nombre." ".$apellido;
    $fecharegistro  = date("Y-m-d");
    $clave = substr(md5(uniqid()), 0, 10);
    $clave_encriptada = md5($clave);
    $dia  = date("d");
    $mes = date("m");
    $ano = date("Y");
    $precio = $_POST['Precio'];
    $id_venta = 1111;

    $sql="INSERT INTO cliente (nombre,fecharegistro,estatus,usuario,clave,pines,pinesdisp) values('$nombrecompleto','$fecharegistro',$tipo,'$correo','$clave_encriptada',$numeropines,$numeropines)";
    $resultado = $con -> query($sql);

    if($resultado){

        $id_insertado = $con->insert_id;

        $sql2="INSERT INTO `compra`(`pines`, `dia`, `mes`, `ano`, `precio`, `id_cliente`, `id_venta`, `porcentaje_descuento`) VALUES ($numeropines,$dia,$mes,$ano,$precio,$id_insertado,$id_venta,$porcentaje_descuento)";
        $resultado2 =$con -> query($sql2);

        $resultado = array(
            'mensaje' => 'Cliente registrado correctamente!',
            'codigo' => 1,
            'clave' => $clave
        );
        echo json_encode($resultado);
      
    }else{
        $resultado = array(
            'mensaje' => 'Error al registrar el cliente!',
            'codigo' => 0
        );
        echo json_encode($resultado);
    }
?>
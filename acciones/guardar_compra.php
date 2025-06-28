<?php 
    include_once("../conexion.php");
    $id = @$_POST['Identificacion'];
    $pines = @$_POST['Pines'];
    $dia  = date("d");
    $mes = date("m");
    $ano = date("Y");
    $precio = $pines*$_POST['Precio'];
  
    $sql2="INSERT INTO `compra`(`pines`, `dia`, `mes`, `ano`, `precio`) VALUES ($pines,$dia,$mes,$ano,$precio)";
    $resultado2 =$con -> query($sql2);
    $sql3="UPDATE `cliente` SET `pines`= pines+$pines, pinesdisp = pinesdisp+$pines WHERE idcl=$id";
    $resultado3 =$con -> query($sql3);
    echo "<script>
              alert('Venta realizada correctamente!');
              window.location= '../comprar.php'
          </script>";
   
?>
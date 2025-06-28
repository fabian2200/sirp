<?php 
  include_once("../conexion.php");
    $nombre = @$_POST['Nombredepartamento'];
    $idcli = @$_POST['Idcliente'];
    $fecharegistro  = date("Y-m-d");
    $ide = @$_POST['Idem'];

    $sql="INSERT INTO departamentos (nombre,idcl,alias,fechacreacion) values('$nombre',$idcli,'$nombre','$fecharegistro')";
    $resultado = $con -> query($sql);

    if($resultado)
    {
     echo "<script>
               alert('datos guardados correctamente!');
               window.location= '../paginas/registrar_empleado.php?proceso=$ide'
           </script>";
    }
    else
    {
          echo "<script>
                       alert('ha ocurrido un error!');
                       window.location= '../paginas/registrar_empleado.php?proceso=$ide'
                </script>";
    }
?>
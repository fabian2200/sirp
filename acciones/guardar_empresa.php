<?php 
    include_once("../conexion.php");
    $id = @$_POST['Id'];
    $nombre = @$_POST['Nombre'];
    $empleados = @$_POST['Empleados'];
    $fecha  = date("Y-m-d");
    $token = $nombre."_".$id;
    
    $sql2="SELECT pinesdisp FROM `cliente` WHERE idcl = $id";
    $resultado2 =mysqli_fetch_array($con -> query($sql2));
   
   if ($resultado2[0]>=$empleados) {
    $sql="INSERT INTO empresa (idcl,empresa,nrousuarios,fecha,token) values ($id,'$nombre',$empleados,'$fecha','$token')";
    $resultado = $con -> query($sql);
    
    if($resultado)
    {
     echo "<script>
               alert('datos guardados correctamente!');
               window.location= '../paginas/empresas.php'
           </script>";
           $resultado2 = $con -> query("UPDATE `cliente` set pinesdisp = pinesdisp-$empleados WHERE idcl = $id");
    }
    else
    {
          echo "<script>
                       alert('ha ocurrido un error!');
                       window.location= '../paginas/empresas.php'
                </script>";
    }
   }else{
         echo "<script>
                       alert('no cuenta con esa cantidad de pines!');
                       window.location= '../paginas/empresas.php'
                </script>";
   }
    
    
?>
<?php 
    include_once("../conexion.php");
    $idempresa = @$_POST['empresadisminuir'];
    $idcliente = @$_POST['idclientedisminuir'];
    $pines = @$_POST['pinesdisminuir'];
    
    
    $sql2="SELECT nrousuarios,pinesusados FROM `empresa` WHERE idem = $idempresa";
    $resultado2 =mysqli_fetch_array($con -> query($sql2));
   
   if (($resultado2[0]-$resultado2[1])>=$pines) {
    $sql="UPDATE `empresa` SET `nrousuarios`=nrousuarios-$pines WHERE idem = $idempresa";
    $resultado = $con -> query($sql);
    
    if($resultado)
    {
     echo "<script>
               alert('datos guardados correctamente!');
               window.location= '../paginas/empresas.php'
           </script>";
           $resultado2 = $con -> query("UPDATE `cliente` set pinesdisp = pinesdisp+$pines WHERE idcl = $idcliente");
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
                       alert('la empresa no cuenta con esa cantidad de pines!');
                       window.location= '../paginas/empresas.php'
                </script>";
   }
    
    
?>
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
       
              if($resultado){
                     $resultado2 = $con -> query("UPDATE `cliente` set pinesdisp = pinesdisp+$pines WHERE idcl = $idcliente");
                     echo json_encode(array(
                            "status" => "success", 
                            "message" => "Pines disminuidos correctamente",
                     ));
              }else{
                     echo json_encode(array(
                            "status" => "error", 
                            "message" => "Ha ocurrido un error")
                     );
              }
       }else{
              echo json_encode(array(
                     "status" => "error", 
                     "message" => "No puede disminuir mas empleados, el limite es de ".($resultado2[0] - $resultado2[1])." empleados")
              );
       }
?>
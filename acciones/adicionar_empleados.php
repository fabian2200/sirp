<?php 
       include_once("../conexion.php");
       $idempresa = @$_POST['empresaadicionar'];
       $idcliente = @$_POST['idlienteadicionar'];
       $pines = @$_POST['pinesadicionar'];
       
       
       $sql2="SELECT pinesdisp FROM `cliente` WHERE idcl = $idcliente";
       $resultado2 =mysqli_fetch_array($con -> query($sql2));
   
       if ($resultado2[0]>=$pines) {
              $sql="UPDATE `empresa` SET `nrousuarios`=nrousuarios+$pines WHERE idem = $idempresa";
              $resultado = $con -> query($sql);
              
              if($resultado){
                     $resultado2 = $con -> query("UPDATE `cliente` set pinesdisp = pinesdisp-$pines WHERE idcl = $idcliente");
                     echo json_encode(array(
                            "status" => "success", 
                            "message" => "Empleados adicionados correctamente",
                            "href" => "../paginas/empresas.php"
                     ));
              }else{
                     echo json_encode(array("status" => "error", "message" => "Ha ocurrido un error"));
              }
       }else{
              echo json_encode(array("status" => "error", "message" => "No cuenta con esa cantidad de pines, puede adicionar ".$resultado2[0]." pines."));
       }
?>
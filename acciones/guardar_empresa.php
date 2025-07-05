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
    
    if($resultado){
       $resultado2 = $con -> query("UPDATE `cliente` set pinesdisp = pinesdisp-$empleados WHERE idcl = $id");
       echo json_encode(array(
              "status" => "success", 
              "message" => "Empresa registrada correctamente",
              "href" => "../paginas/empresas.php"
       ));
           
    }else{
          echo json_encode(array("status" => "error", "message" => "Ha ocurrido un error"));
    }
   }else{
         echo json_encode(array("status" => "error", "message" => "No cuenta con esa cantidad de pines, puede crear una empresa con ".$resultado2[0]." empleados"));
   }
    
    
?>
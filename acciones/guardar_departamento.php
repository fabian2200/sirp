<?php 
  include_once("../conexion.php");
  $nombre = @$_POST['Nombredepartamento'];
  $idcli = @$_POST['Idcliente'];
  $fecharegistro  = date("Y-m-d");

  $sql="INSERT INTO departamentos (nombre,idcl,alias,fechacreacion) values('$nombre',$idcli,'$nombre','$fecharegistro')";
  $resultado = $con -> query($sql);

  if($resultado){
    echo json_encode(array("status" => "success", "message" => "Datos guardados correctamente!"));
  }
  else{
    echo json_encode(array("status" => "error", "message" => "Ha ocurrido un error!"));
  }
?>
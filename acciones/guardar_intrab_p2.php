<?php 

  include_once("../conexion.php");
  $p89 = @$_POST['preg89'];
  $p90 = @$_POST['preg90'];
  $p91 = @$_POST['preg91'];
  $p92 = @$_POST['preg92'];
  $p93 = @$_POST['preg93'];
  $p94 = @$_POST['preg94'];
  $p95 = @$_POST['preg95'];
  $p96 = @$_POST['preg96'];
  $p97 = @$_POST['preg97'];
  $idem = @$_POST['idempleado'];
  
  $sql="UPDATE `intra_b` SET `preg89`=$p89,`preg90`=$p90,`preg91`=$p91,`preg92`=$p92,`preg93`=$p93,`preg94`=$p94,`preg95`=$p95,`preg96`=$p96,`preg97`=$p97 WHERE id_empl = $idem";
  $resultado = $con -> query($sql);

  $sql3 = "SELECT * from empleado where idus = $idem";
  $resultado3 = mysqli_fetch_array($con -> query($sql3));
  
  if($resultado){
    $sql2 = "UPDATE empleado set step1t2=1, test2=2 where idus = $idem";
    $resultado2 = $con -> query($sql2);
     
    include ('calificar-intra_B.php');
    calificar_B($idem);
    echo json_encode(array("status" => "ok", "idem" => $idem, "idempr" => $resultado3[2]));
  }else{
    echo json_encode(array("status" => "error", "idem" => $idem, "idempr" => $resultado3[2]));
  }
?>

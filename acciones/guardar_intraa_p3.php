<?php 
  include_once("../conexion.php");
  $p115 = @$_POST['preg115'];
  $p116 = @$_POST['preg116'];
  $p117 = @$_POST['preg117'];
  $p118 = @$_POST['preg118'];
  $p119 = @$_POST['preg119'];
  $p120 = @$_POST['preg120'];
  $p121 = @$_POST['preg121'];
  $p122 = @$_POST['preg122'];
  $p123 = @$_POST['preg123'];
  $idem = @$_POST['idempleado'];
  
  $sql="UPDATE `intra_a` SET `preg115`=$p115,`preg116`=$p116,`preg117`=$p117,`preg118`=$p118,`preg119`=$p119,`preg120`=$p120,`preg121`=$p121,`preg122`=$p122,`preg123`=$p123 WHERE id_empl = $idem";
  $resultado = $con -> query($sql);
  $sql3 = "SELECT * from empleado where idus = $idem";
  $resultado3 = mysqli_fetch_array($con -> query($sql3));
  if($resultado){
    //actualizar terminar test
    $sql2 = "UPDATE empleado set step2t1=1, test1=2 where idus = $idem";
    $resultado2 = $con -> query($sql2);
    //calificar
    include ('calificar-intra_A.php');
    calificar_A($idem);
    //realizar informe intra_A
    echo json_encode(array("status" => "ok", "idem" => $idem, "idempr" => $resultado3[2]));
  } else{
    echo json_encode(array("status" => "error", "idem" => $idem, "idempr" => $resultado3[2]));
  }
?>
 
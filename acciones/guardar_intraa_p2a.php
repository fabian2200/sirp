<?php 
  include_once("../conexion.php");
  $sino2 = $_POST['pregabierta2'];
  $idem =  $_POST['idempleado'];

  $sql3 = "SELECT * from empleado where idus = $idem";
  $resultado3 = mysqli_fetch_array($con -> query($sql3));

   if ($sino2==1) {
    $sql2 = "UPDATE empleado set answ2t1=1 where idus = $idem";
    $resultado2 = $con -> query($sql2);

   	echo json_encode(array("redirigir" => true, "url" => "../cuestionarios/intraa_parte3.php?idempl=$idem", "status" => "ok", "idem" => $idem, "idempr" => $resultado3[2]));
   }else{
    $sql2 = "UPDATE empleado set answ2t1=1,step2t1=1,test1=2 where idus = $idem";
    $resultado2 = $con -> query($sql2);

    include ('calificar-intra_A.php');
    calificar_A($idem);
    
    echo json_encode(array("redirigir" => false, "status" => "ok", "idem" => $idem, "idempr" => $resultado3[2]));
   }
?>
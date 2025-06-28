<?php 
  include_once("../conexion.php");
  $sino1 = $_POST['pregabierta1'];
  $idem =  $_POST['idempleado'];
  
  $sql3 = "SELECT * from empleado where idus = $idem";
  $resultado3 = mysqli_fetch_array($con -> query($sql3));

   if ($sino1==1) {
        $sql2 = "UPDATE empleado set answ1t2=1 where idus = $idem";
        $resultado2 = $con -> query($sql2);
        
        echo json_encode(array("redirigir" => true, "url" => "../cuestionarios/intrab_parte2.php?idempl=$idem", "status" => "ok", "idem" => $idem, "idempr" => $resultado3[2]));
   }else{
        $sql2 = "UPDATE empleado set answ1t2=1,step1t2=1,test2=2 where idus = $idem";
        $resultado2 = $con -> query($sql2);

        include ('calificar-intra_B.php');
        calificar_B($idem);

        echo json_encode(array("redirigir" => false, "status" => "ok", "idem" => $idem, "idempr" => $resultado3[2]));
   }
?>
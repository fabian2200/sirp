<?php 
 include_once("../conexion.php");
  $sino1 = $_POST['pregabierta1'];
  $idem =  $_POST['idempleado'];
   if ($sino1==1) {
           $sql2 = "UPDATE empleado set answ1t1=1 where idus = $idem";
           $resultado2 = $con -> query($sql2);
   	 echo "<script>
               window.location= '../cuestionarios/intraa_parte2.php?idempl=$idem'
           </script>";
   }else{
      $sql2 = "UPDATE empleado set answ1t1=1,step1t1=1 where idus = $idem";
      $resultado2 = $con -> query($sql2);
   	 echo "<script>
               window.location= '../cuestionarios/pregunta2_intraa.php?idempl=$idem'
           </script>";
   }
?>
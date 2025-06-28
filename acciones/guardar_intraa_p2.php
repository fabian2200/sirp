<?php 
  include_once("../conexion.php");
  $p106 = @$_POST['preg106'];
  $p107 = @$_POST['preg107'];
  $p108 = @$_POST['preg108'];
  $p109 = @$_POST['preg109'];
  $p110 = @$_POST['preg110'];
  $p111 = @$_POST['preg111'];
  $p112 = @$_POST['preg112'];
  $p113 = @$_POST['preg113'];
  $p114 = @$_POST['preg114'];
  $idem = @$_POST['idempleado'];
  
  $sql="UPDATE `intra_a` SET `preg106`=$p106,`preg107`=$p107,`preg108`=$p108,`preg109`=$p109,`preg110`=$p110,`preg111`=$p111,`preg112`=$p112,`preg113`=$p113,`preg114`=$p114 WHERE id_empl = $idem";
  $resultado = $con -> query($sql);
    if($resultado)
    {
      $sql2 = "UPDATE empleado set step1t1=1 where idus = $idem";
      $resultado2 = $con -> query($sql2);
     echo "<script>
               window.location= ' ../cuestionarios/pregunta2_intraa.php?idempl=$idem'
           </script>";
    }
    else
    {
          echo "<script>
                       alert('ha ocurrido un error!');
                       window.location= '../cuestionarios/intraa_parte2.php?idempl=$idem'
                </script>";
    }
?>
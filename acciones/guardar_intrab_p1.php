<?php 
  include_once("../conexion.php");
  $p1 = @$_POST['preg1'];
  $p2 = @$_POST['preg2'];
  $p3 = @$_POST['preg3'];
  $p4 = @$_POST['preg4'];
  $p5 = @$_POST['preg5'];
  $p6 = @$_POST['preg6'];
  $p7 = @$_POST['preg7'];
  $p8 = @$_POST['preg8'];
  $p9 = @$_POST['preg9'];
  $p10 = @$_POST['preg10'];
  $p11 = @$_POST['preg11'];
  $p12 = @$_POST['preg12'];
  $p13 = @$_POST['preg13'];
  $p14 = @$_POST['preg14'];
  $p15 = @$_POST['preg15'];
  $p16 = @$_POST['preg16'];
  $p17 = @$_POST['preg17'];
  $p18 = @$_POST['preg18'];
  $p19 = @$_POST['preg19'];
  $p20 = @$_POST['preg20'];
  $p21 = @$_POST['preg21'];
  $p22 = @$_POST['preg22'];
  $p23 = @$_POST['preg23'];
  $p24 = @$_POST['preg24'];
  $p25 = @$_POST['preg25'];
  $p26 = @$_POST['preg26'];
  $p27 = @$_POST['preg27'];
  $p28 = @$_POST['preg28'];
  $p29 = @$_POST['preg29'];
  $p30 = @$_POST['preg30'];
  $p31 = @$_POST['preg31'];
  $p32 = @$_POST['preg32'];
  $p33 = @$_POST['preg33'];
  $p34 = @$_POST['preg34'];
  $p35 = @$_POST['preg35'];
  $p36 = @$_POST['preg36'];
  $p37 = @$_POST['preg37'];
  $p38 = @$_POST['preg38'];
  $p39 = @$_POST['preg39'];
  $p40 = @$_POST['preg40'];
  $p41 = @$_POST['preg41'];
  $p42 = @$_POST['preg42'];
  $p43 = @$_POST['preg43'];
  $p44 = @$_POST['preg44'];
  $p45 = @$_POST['preg45'];
  $p46 = @$_POST['preg46'];
  $p47 = @$_POST['preg47'];
  $p48 = @$_POST['preg48'];
  $p49 = @$_POST['preg49'];
  $p50 = @$_POST['preg50'];
  $idem = @$_POST['idempleado'];
  $sql="INSERT INTO `intra_b`(`preg1`, `preg2`, `preg3`, `preg4`, `preg5`, `preg6`, `preg7`, `preg8`, `preg9`, `preg10`, `preg11`, `preg12`, `preg13`, `preg14`, `preg15`, `preg16`, `preg17`, `preg18`, `preg19`, `preg20`, `preg21`, `preg22`, `preg23`, `preg24`, `preg25`, `preg26`, `preg27`, `preg28`, `preg29`, `preg30`, `preg31`, `preg32`, `preg33`, `preg34`, `preg35`, `preg36`, `preg37`, `preg38`, `preg39`, `preg40`, `preg41`, `preg42`, `preg43`, `preg44`, `preg45`, `preg46`, `preg47`, `preg48`, `preg49`, `preg50`,id_empl) VALUES ($p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$p9,$p10,$p11,$p12,$p13,$p14,$p15,$p16,$p17,$p18,$p19,$p20,$p21,$p22,$p23,$p24,$p25,$p26,$p27,$p28,$p29,$p30,$p31,$p32,$p33,$p34,$p35,$p36,$p37,$p38,$p39,$p40,$p41,$p42,$p43,$p44,$p45,$p46,$p47,$p48,$p49,$p50,$idem);";
  $resultado = $con -> query($sql);
    if($resultado)
    {
     $sql2 = "UPDATE empleado set step0t2=1 where idus = $idem";
     $con -> query($sql2);
     echo "<script>
               window.location= '../cuestionarios/intrab_parte1_2.php?idempl=$idem'
           </script>";
    }
    else
    {
          echo "<script>
                       alert('ha ocurrido un error!');
                       window.location= '../cuestionarios/intrab_parte1.php?idempl=$idem'
                </script>";
    }
 
?>
  
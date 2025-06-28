<?php 
  include_once("../conexion.php");
  $p51 = @$_POST['preg51'];
  $p52 = @$_POST['preg52'];
  $p53 = @$_POST['preg53'];
  $p54 = @$_POST['preg54'];
  $p55 = @$_POST['preg55'];
  $p56 = @$_POST['preg56'];
  $p57 = @$_POST['preg57'];
  $p58 = @$_POST['preg58'];
  $p59 = @$_POST['preg59'];
  $p60 = @$_POST['preg60'];
  $p61 = @$_POST['preg61'];
  $p62 = @$_POST['preg62'];
  $p63 = @$_POST['preg63'];
  $p64 = @$_POST['preg64'];
  $p65 = @$_POST['preg65'];
  $p66 = @$_POST['preg66'];
  $p67 = @$_POST['preg67'];
  $p68 = @$_POST['preg68'];
  $p69 = @$_POST['preg69'];
  $p70 = @$_POST['preg70'];
  $p71 = @$_POST['preg71'];
  $p72 = @$_POST['preg72'];
  $p73 = @$_POST['preg73'];
  $p74 = @$_POST['preg74'];
  $p75 = @$_POST['preg75'];
  $p76 = @$_POST['preg76'];
  $p77 = @$_POST['preg77'];
  $p78 = @$_POST['preg78'];
  $p79 = @$_POST['preg79'];
  $p80 = @$_POST['preg80'];
  $p81 = @$_POST['preg81'];
  $p82 = @$_POST['preg82'];
  $p83 = @$_POST['preg83'];
  $p84 = @$_POST['preg84'];
  $p85 = @$_POST['preg85'];
  $p86 = @$_POST['preg86'];
  $p87 = @$_POST['preg87'];
  $p88 = @$_POST['preg88'];
  $idem = @$_POST['idempleado'];
  $sql="UPDATE `intra_b` SET `preg51`=$p51,`preg52`=$p52,`preg53`=$p53,`preg54`=$p54,`preg55`=$p55,`preg56`=$p56,`preg57`=$p57,`preg58`=$p58,`preg59`=$p59,`preg60`=$p60,`preg61`=$p61,`preg62`=$p62,`preg63`=$p63,`preg64`=$p64,`preg65`=$p65,`preg66`=$p66,`preg67`=$p67,`preg68`=$p68,`preg69`=$p69,`preg70`=$p70,`preg71`=$p71,`preg72`=$p72,`preg73`=$p73,`preg74`=$p74,`preg75`=$p75,`preg76`=$p76,`preg77`=$p77,`preg78`=$p78,`preg79`=$p79,`preg80`=$p80,`preg81`=$p81,`preg82`=$p82,`preg83`=$p83,`preg84`=$p84,`preg85`=$p85,`preg86`=$p86,`preg87`=$p87,`preg88`=$p88 WHERE id_empl = $idem";
  $resultado = $con -> query($sql);
    if($resultado)
    {
    $sql2 = "UPDATE empleado set step00t2=1 where idus = $idem";
    $resultado2 = $con -> query($sql2);
     echo "<script>
               window.location= ' ../cuestionarios/pregunta1_intrab.php?idempl=$idem'
           </script>";
    }
    else
    {
          echo "<script>
                       alert('ha ocurrido un error $idem!');
                       window.location= '../cuestionarios/intrab_parte1_2.php?idempl=$idem'
                </script>";
    }
?>
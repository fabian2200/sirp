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
  $idempleado = $_GET['idem'];
  $idempresa = $_GET['idemp'];
  $sql="INSERT INTO `extralaboral`(`preg1`, `preg2`, `preg3`, `preg4`, `preg5`, `preg6`, `preg7`, `preg8`, `preg9`, `preg10`, `preg11`, `preg12`, `preg13`, `preg14`, `preg15`, `preg16`, `preg17`, `preg18`, `preg19`, `preg20`, `preg21`, `preg22`, `preg23`, `preg24`, `preg25`, `preg26`, `preg27`, `preg28`, `preg29`, `preg30`, `preg31`,id_empl) VALUES ($p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$p9,$p10,$p11,$p12,$p13,$p14,$p15,$p16,$p17,$p18,$p19,$p20,$p21,$p22,$p23,$p24,$p25,$p26,$p27,$p28,$p29,$p30,$p31,$idempleado);";
  $resultado = $con -> query($sql);
  
  if($resultado){
   //actualizar terminar formulario extralaboral
    $sql2 = "UPDATE empleado set step0t3=1, test3=2 where idus = $idempleado";
    $resultado2 = $con -> query($sql2);
    //calificar formulario extralaboral
    include ('calificar-extra.php');
    $idedepartamento = mysqli_fetch_array($con->query("SELECT areatrabajo from empleado where idus = $idempleado"));
    calificar_Extra($idempleado,$idempresa,$idedepartamento[0]);
    //reaalizar informe extralaboral
    echo json_encode([
      "status" => "success",
      "message" => "Test de extralaboral guardado correctamente!",
      "url" => "../reportes_individuales/plantilla_extralaboral.php?idempl=" . $idempleado . "&idempr=" . $idempresa
    ]);
  }else{
    echo json_encode([
      "status" => "error",
      "message" => "Ha ocurrido un error al guardar el test de extralaboral!",
    ]);
  }
?>
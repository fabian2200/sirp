<?php
  include_once("../conexion.php");
  $Idcl = @$_POST['Idcl'];
  $Idem = @$_POST['Idem'];
  $Areatrabajo = @$_POST['Areatrabajo'];
  $Nombre = @$_POST['Nombre'];
  $Sexo = @$_POST['Sexo'];
  $Estadocivil = @$_POST['Estadocivil'];
  $Nacimiento = @$_POST['Nacimiento'];
  $Estudios = @$_POST['Estudios'];
  $Departamento = @$_POST['Departamento'];
  $Ocupacion = @$_POST['Ocupacion'];
  $Ciudad = @$_POST['Ciudad'];
  $Estrato = @$_POST['Estrato'];
  $Vivienda = @$_POST['Vivienda'];
  $Cargafamiliar = @$_POST['Cargafamiliar'];
  $Departamento2 = @$_POST['Departamento2'];
  $Ciudadtrabajo = @$_POST['Ciudadtrabajo'];
  $Cargotrabajo = @$_POST['Cargotrabajo'];
  $Aniostrabajo = @$_POST['Aniostrabajo'];
  $Tipocargo = @$_POST['Tipocargo'];
  $AniosCargo = @$_POST['AniosCargo'];
  $Tipocontrato = @$_POST['Tipocontrato'];
  $Hotrastrab = @$_POST['Hotrastrab'];
  $Tiposalario = @$_POST['Tiposalario'];
  $Intra  = @$_POST['select'];
  $Estres = 1;
  $Extralaboral = 1;
  $Nombreempresa ="";
  $Fecharegistro  = date("Y-m-d");
  $Fechaaplicacion  = date("Y-m-d");
  $Correo = @$_POST['Correo'];

  if ($Intra == 1) {
  	 $IntraA = 1;
  	 $IntraB = 0;
  }else{
  	 $IntraA = 0;
  	 $IntraB = 1;
  } 
  

  $sql="SELECT nrousuarios,pinesusados,empresa FROM `empresa` WHERE idem = $Idem";
  $resultado =mysqli_fetch_array($con -> query($sql));
   
   if (($resultado[0]-$resultado[1])>0) {
    $sql2="UPDATE empresa SET  pinesusados=pinesusados+1 WHERE idem = $Idem";
    $resultado2 = $con -> query($sql2);
    $Nombreempresa = $resultado[2];
    $sql3="INSERT INTO `empleado` (`idcl`, `idempresa`, `empresa`, `nombre`, `sexo`, `estadocivil`, `nacimiento`, `estudios`, `ocupacion`, `departamentoresidencia`, `ciudadresidencia`, `estrato`, `vivienda`, `cargafamiliar`, `departamentotrabajo`, `ciudadtrabajo`, `aniostrabajo`, `cargotrabajo`, `tipocargo`, `anioscargo`, `areatrabajo`, `tipocontrato`, `horastrabdiarias`, `tiposalario`, `fecharegistro`, `fechaaplicacion`, `test1`, `test2`, `test3`, `test4`, `correo`) VALUES ($Idcl,$Idem,'$Nombreempresa','$Nombre',$Sexo,$Estadocivil,'$Nacimiento','$Estudios','$Ocupacion','$Departamento','$Ciudad','$Estrato','$Vivienda',$Cargafamiliar,'$Departamento2','$Ciudadtrabajo',$Aniostrabajo,'$Cargotrabajo','$Tipocargo',$AniosCargo,'$Areatrabajo','$Tipocontrato',$Hotrastrab,'$Tiposalario','$Fecharegistro','$Fechaaplicacion', $IntraA,$IntraB,$Estres,$Extralaboral, '$Correo')";
    $resultado3 = $con -> query($sql3);
    if($resultado2 && $resultado3)
    {
      echo json_encode(["status" => "success", "message" => "Empleado guardado correctamente"]);
    }
    else
    {
      echo json_encode(["status" => "error", "message" => "Ha ocurrido un erro, intente nuevamente"]);
    }
   }else{
      echo json_encode(["status" => "error", "message" => "La empresa no cuenta con mas pines"]);
   }   
?>
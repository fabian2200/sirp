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
    $Correo = @$_POST['Correo'];
    $Idempleado = @$_POST['idempleado'];

    if ($Intra == 1) {
        $IntraA = 1;
        $IntraB = 0;
    }else{
        $IntraA = 0;
        $IntraB = 1;
    } 
  
    $sql3="UPDATE `empleado` SET 
        `nombre` = '$Nombre', 
        `sexo` = '$Sexo', 
        `estadocivil` = '$Estadocivil', 
        `nacimiento` = '$Nacimiento', 
        `estudios` = '$Estudios', 
        `ocupacion` = '$Ocupacion', 
        `departamentoresidencia` = '$Departamento', 
        `ciudadresidencia` = '$Ciudad', 
        `estrato` = '$Estrato', 
        `vivienda` = '$Vivienda', 
        `cargafamiliar` = '$Cargafamiliar', 
        `departamentotrabajo` = '$Departamento2', 
        `ciudadtrabajo` = '$Ciudadtrabajo', 
        `aniostrabajo` = '$Aniostrabajo', 
        `cargotrabajo` = '$Cargotrabajo', 
        `tipocargo` = '$Tipocargo', 
        `anioscargo` = '$AniosCargo', 
        `areatrabajo` = '$Areatrabajo', 
        `tipocontrato` = '$Tipocontrato', 
        `horastrabdiarias` = '$Hotrastrab', 
        `tiposalario` = '$Tiposalario', 
        `test1` = '$IntraA', 
        `test2` = '$IntraB', 
        `test3` = '$Estres', 
        `test4` = '$Extralaboral', 
        `correo` = '$Correo' WHERE 
        `idus` = '$Idempleado'"
    ;


    $resultado3 = $con -> query($sql3);
    if($resultado3)
    {
      echo json_encode(["status" => "success", "message" => "Empleado editado correctamente"]);
    }
    else
    {
      echo json_encode(["status" => "error", "message" => "Ha ocurrido un erro, intente nuevamente"]);
    }
?>
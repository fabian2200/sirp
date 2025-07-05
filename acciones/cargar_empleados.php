<?php
    include '../conexion.php';

    $idcliente = $_POST['idcliente'];
    $idempresa = $_POST['idempresa'];
    $empleados = $_POST['empleados'];

    $sql="SELECT nrousuarios,pinesusados,empresa FROM `empresa` WHERE idem = $idempresa";
    $resultado =mysqli_fetch_array($con -> query($sql));
    $Nombreempresa = $resultado[2];

    $empleados = json_decode($empleados, true);
    
    foreach ($empleados as $empleado) {
        $areaTrabajo = $empleado['areaTrabajo'];

        $sql2="SELECT * FROM `departamentos` WHERE nombre = '$areaTrabajo' and idcl = $idcliente";
        $resultado2 =mysqli_fetch_array($con -> query($sql2));

        if ($resultado2) {
            $idarea = $resultado2[0];
        }else{
            $sql3="INSERT INTO `departamentos` (`nombre`, `idcl`, `alias`) VALUES ('$areaTrabajo', $idcliente, '$areaTrabajo')";
            $resultado3 = $con -> query($sql3);
        }
    }

    $contador = 0;
    foreach ($empleados as $empleado) {

        $idarea = 0;
        $areaTrabajoEmpleado = $empleado['areaTrabajo'];
        $sql4="SELECT * FROM `departamentos` WHERE nombre = '$areaTrabajoEmpleado' and idcl = $idcliente";
        $resultado4 = mysqli_fetch_array($con -> query($sql4));

        $idarea = $resultado4[0];   

        $nombre = $empleado['nombre'];
        $sexo = $empleado['sexo'];
        $estadoCivil = $empleado['estadoCivil'];
        $fechaNacimiento = $empleado['fechaNacimiento'];
        $estudios = $empleado['estudios'];
        $ocupacion = $empleado['ocupacion'];
        $departamentoResidencia = $empleado['departamentoResidencia'];
        $ciudadResidencia = $empleado['ciudadResidencia'];
        $estrato = $empleado['estrato'];
        $vivienda = $empleado['vivienda'];
        $cargaFamiliar = $empleado['cargaFamiliar'];
        $departamentoTrabajo = $empleado['departamentoTrabajo'];
        $ciudadTrabajo = $empleado['ciudadTrabajo'];
        $aniosTrabajo = $empleado['aniosTrabajo'];
        $cargoTrabajo = $empleado['cargoTrabajo'];
        $tipoCargo = $empleado['tipoCargo'];
        $aniosCargo = $empleado['aniosCargo'];
        $areaTrabajo = $idarea;
        $tipoContrato = $empleado['tipoContrato'];
        $horasTrabajoDiarias = $empleado['horasTrabajoDiarias'];
        $tipoSalario = $empleado['tipoSalario'];
        $correo = $empleado['correo'];
        $tipoTest = $empleado['tipoTest'];

        $fecharegistro  = date("Y-m-d");
        $fechaaplicacion  = date("Y-m-d");

        if ($tipoTest == 'Intra A') {
            $test1 = 1;
            $test2 = 0;
        }else{
            if ($tipoTest == 'Intra B') {
                $test1 = 0;
                $test2 = 1;
            }else{
                $test1 = 0;
                $test2 = 0;
            }
        }

        $extraLaboral = 1;
        $estres = 1;


        $fecha = DateTime::createFromFormat('d/m/Y', $fechaNacimiento);
        $fechaNacimiento = $fecha->format('Y-m-d');
       

        $sql3="INSERT INTO `empleado` (
            `idcl`, 
            `idempresa`, 
            `empresa`, 
            `nombre`, 
            `sexo`, 
            `estadocivil`, 
            `nacimiento`, 
            `estudios`, 
            `ocupacion`, 
            `departamentoresidencia`, 
            `ciudadresidencia`, 
            `estrato`, `vivienda`, 
            `cargafamiliar`, 
            `departamentotrabajo`, 
            `ciudadtrabajo`, 
            `aniostrabajo`, 
            `cargotrabajo`, 
            `tipocargo`, 
            `anioscargo`, 
            `areatrabajo`, 
            `tipocontrato`, 
            `horastrabdiarias`, 
            `tiposalario`, 
            `fecharegistro`, 
            `fechaaplicacion`, 
            `test1`, 
            `test2`, 
            `test3`, 
            `test4`, 
            `correo`
        ) VALUES (
            $idcliente,
            $idempresa,
            '$Nombreempresa',
            '$nombre',
            $sexo,
            $estadoCivil,
            '$fechaNacimiento',
            '$estudios',
            '$ocupacion',
            '$departamentoResidencia',
            '$ciudadResidencia',
            '$estrato',
            '$vivienda',
            '$cargaFamiliar',
            '$departamentoTrabajo',
            '$ciudadTrabajo',
            '$aniosTrabajo',
            '$cargoTrabajo',
            '$tipoCargo',
            '$aniosCargo',
            '$areaTrabajo',
            '$tipoContrato',
            '$horasTrabajoDiarias',
            '$tipoSalario',
            '$fecharegistro',
            '$fechaaplicacion', 
            $test1,
            $test2,
            $estres,
            $extraLaboral, 
            '$correo'
        )";
        $resultado3 = $con -> query($sql3);

        if ($resultado3) {
            $contador++;
        }
    }

    if ($contador == count($empleados)) {
        $sql2="UPDATE empresa SET  pinesusados=pinesusados+".$contador." WHERE idem = $idempresa";
        $resultado2 = $con -> query($sql2);

        echo json_encode(['success' => true, 'message' => 'Los empleados se han cargado correctamente']);
    }else{
        echo json_encode(['success' => false, 'message' => 'Error al cargar los empleados']);
    }
?>
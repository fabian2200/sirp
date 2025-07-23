<?php  
 ob_start();
include ('../conexion.php');

$idcliente = $_GET['id_cli'];
$idempresa = $_GET['id_emp'];

$sql="SELECT * FROM `empresa` WHERE idem = $idempresa";
$resultado = mysqli_fetch_array($con -> query($sql));

$sql2="SELECT * FROM `cliente` WHERE idcl = $idcliente";
$resultado2 = mysqli_fetch_array($con -> query($sql2));


$sql3="UPDATE `empresa` SET `sociodemografico` = sociodemografico + 1 WHERE `idem` = $idempresa";
$con -> query($sql3);

?>
<!DOCTYPE html>
<html ><head>
	<title></title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style type="text/css">
        html{
            display: flex;
            justify-content: center;
            align-items: center;
            background-color:rgb(238, 238, 238);
        }
		img{
  			margin: 0;
  			padding: 0;
		}
		.chart-container {
			position: relative;
			height: 400px;
			width: 100%;
			margin: 20px 0;
		}
		.chart-container-small {
			position: relative;
			height: 300px;
			width: 100%;
			margin: 20px 0;
		}
		.chart-container-large {
			position: relative;
			width: 100%;
			margin: 20px 0;
		}

		canvas{
			width: 400px !important;
			height: 400px !important;
		}
		
		body {
            margin-top: 150px;
            background-color:rgb(255, 255, 255);
            width: 900px;
			text-align: center;
			font-family: 'Arial', sans-serif;
            font-size: 11pt;
            border-radius: 20px;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
		}
		
		.chart-container, .chart-container-small, .chart-container-large {
			display: flex;
			justify-content: center;
			align-items: center;
			margin: 20px auto;
		}
		
		h4 {
			margin: 30px 0 20px 0;
            font-size: 11pt;
		}

		#imprimir{
			margin-top: 20px;
			margin-bottom: 20px;
			padding: 10px 20px;
			background-color:rgb(8, 136, 14);
			color: white;
			border: none;
			border-radius: 10px;
			cursor: pointer;
			font-size: 11pt;
			font-weight: bold;
			transition: background-color 0.3s ease;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
			text-decoration: none;
			text-align: center;
			width: auto;
			height: 50px;
			line-height: 40px;
			position: fixed;
			top: 10px;
			right: 20px;
			z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
		}

		.contenido{
			margin: 3cm !important;
		}

		.salto{
            width: 100%;
            border-top: 3px dashed rgb(107, 107, 107);
			page-break-before: always;
		}

		@media print {
			#imprimir {
				display: none;
			}

            body{
                margin-top: 0px;
                font-family: Arial, sans-serif;
                font-size: 11pt !important;
                padding: 0;
                box-shadow: none;
            }

            .contenido {
                font-family: Arial, sans-serif;
                font-size: 11pt !important;
                padding: 0;
            }

            /* Opcional: establecer márgenes generales del documento */
            @page {
                margin: 3cm !important;
                size: letter;
            }

            .salto{
                width: 100%;
                border-top: none;
                page-break-before: always;
            }

            #alerta{
                display: none;
            }
		}

        #todo{
            width: 700px;
            margin: auto;
            text-align: left;
        }

        .table{
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }   

        .table th{
            color: white;
            padding: 10px;
        }

        .table td{
            background-color: #f8f9fa;
            color: #212529;
            padding: 5px;
        }

        .table_bordered th, .table_bordered td{
            border: 2px solid rgb(90, 90, 90) !important;
        }

        .subtitulo{
            font-size: 9pt;
            font-style: italic;
            margin-bottom: 0px !important;
            margin-top: 0px !important;
            color:rgb(49, 49, 49);
        }
        ul{
            list-style-type: none;
        }

        li h5{
           font-size: 11pt;
           margin-bottom: 18px !important;
           margin-top: 18px !important;
        }

        .table_bordered {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }   

        .table_bordered th, .table_bordered td{
            border: 1px solid rgb(90, 90, 90) !important;
            padding: 10px;
            text-align: center;
        }

        .alerta{
            width: 60%;
            margin: auto;
            text-align: center;
            margin-top: 20px;
            background-color:rgb(255, 217, 135);
            color: white;
            border-radius: 10px;
            padding: 10px;
            color: white;
            position: absolute;
            top: 10px;
            left: 19.5%;
            z-index: 1000;
            color: rgb(136, 63, 15);
        }
	</style>
</head><body>
    <div class="container alerta" id="alerta">
        <h3>Estas viendo la vista previa del informe sociodemografico de la empresa <strong><?php echo $resultado[2]; ?></strong>, para descargar el informe, por favor presione el boton de imprimir.</h3>
        <button id="imprimir" onclick="window.print()"><i style="margin-right: 10px;" class="fas fa-print"></i> Imprimir</button>
    </div>
	<button id="imprimir" onclick="window.print()"><i style="margin-right: 10px;" class="fas fa-print"></i> Imprimir</button>
    <div class="contenido" style="text-align: center">
        <h4>INFORME SOBRE LOS RESULTADOS DE LA APLICACIÓN DE LA BATERÍA DE INSTRUMENTOS DE RIESGO PSICOSOCIAL</h4>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h4>Datos del experto</h4>
        <br>
        <h4>Datos de la empresa</h4>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h4><?php echo $resultado[2]; ?></h4>
        <h4><?php echo date('Y'); ?></h4>
    </div>
    <div class="salto"></div>
    <div style="text-align: left;" class="contenido">
        <h3 style="width: 100%; text-align: center; font-size: 11pt;">TABLA DE CONTENIDO</h3>
        <br>
        <br>
        <h4>PRESENTACION</h4>
        <h4>OBJETIVOS</h4>
        <h4>PROCEDIMIENTO</h4>
        <h4>INSTRUMENTOS APLICADOS</h4>
        <h4>DESCRIPCIÓN SOCIODEMOGRAFICA</h4>
        <ul>
            <li><h5>1. Cantidad de empleados por género</h5></li>
            <li><h5>2. Cantidad de empleados por estado civil</h5></li>
            <li><h5>3. Cantidad de empleados por nivel de educación</h5></li>
            <li><h5>4. Cantidad de empleados por estrato</h5></li>
            <li><h5>5. Cantidad de empleados por tipo de vivienda</h5></li>
            <li><h5>6. Cantidad de empleados por tipo de cargo</h5></li>
            <li><h5>7. Cantidad de empleados por tipo de contrato</h5></li>
            <li><h5>8. Cantidad de empleados por tipo de salario</h5></li>
            <li><h5>9. Cantidad de empleados por edad</h5></li>
            <li><h5>10. Antigüedad en la empresa</h5></li>
            <li><h5>11. Antigüedad en el cargo</h5></li>
        </ul>
    </div>
    <div class="salto"></div>
    <div style="text-align: left;" class="contenido">
        <h3 style="width: 100%; text-align: center;">PRESENTACION</h3>
    </div>
    <div class="salto"></div>
    <div style="text-align: left;" class="contenido">
        <h3 style="width: 100%; text-align: center;">OBJETIVOS</h3>
    </div>
    <div class="salto"></div>
    <div style="text-align: left;" class="contenido">
        <h3 style="width: 100%; text-align: center;">PROCEDIMIENTO</h3>
    </div>
    <div class="salto"></div>
    <div style="text-align: left;" class="contenido">
        <h3 style="width: 100%; text-align: center;">INSTRUMENTOS APLICADOS</h3>
    </div>
    <div class="salto"></div>
    <div id="todo">
        <div style="margin-top: 2cm !important;">
            <div style="text-align: left;">
                <h3 style="width: 100%; text-align: center;">DESCRIPCIÓN SOCIODEMOGRAFICA</h3>
            
                <p>
                En este apartado se presentan las variables sociodemográficas de acuerdo a las características de los empleados que hicieron parte del proceso de aplicación de los instrumentos de la batería de riesgo psicosocial en su cuestionario de ficha de datos generales, en las figuras 1 a la 11.
                </p>
            </div>
            <?php  
                // Empleados por genero----------------------------------------------
                $sql3="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and sexo = 2";
                $masculino = mysqli_fetch_array($con -> query($sql3));

                $sql4="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and sexo = 1";
                $femenino = mysqli_fetch_array($con -> query($sql4));
                $vector = array($femenino[0],$masculino[0]);
            ?>
            <div>
                <h4 style="margin-bottom: 0px !important;">1. Cantidad de empleados por género</h4>
                <h4 class="subtitulo">Figura 1. Cantidad de empleados por género</h4>
                <div class="chart-container" style="height: auto !important;">
                    <canvas id="chartGenero" style="margin-top: 0px !important;"></canvas>
                </div>
            </div>

            <?php  
                // Figura 2. Cantidad de empleados por estado civil----
                
            $sql5="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estadocivil = 1";
            $soltero = mysqli_fetch_array($con -> query($sql5));

            $sql6="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estadocivil = 2";
            $casado = mysqli_fetch_array($con -> query($sql6));

            $sql7="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estadocivil = 3";
            $unionlibre = mysqli_fetch_array($con -> query($sql7));

            $sql8="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estadocivil = 4";
            $separado = mysqli_fetch_array($con -> query($sql8));

            $sql9="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estadocivil = 5";
            $divorciado = mysqli_fetch_array($con -> query($sql9));

            $sql10="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estadocivil = 6";
            $viudo = mysqli_fetch_array($con -> query($sql10));

                $vector = array($soltero[0],$casado[0],$unionlibre[0],$separado[0],$divorciado[0],$viudo[0]);
            ?>
            <div>
                <h4 style="margin-bottom: 0px !important;">2. Cantidad de empleados por estado civil</h4>
                <h4 class="subtitulo">Figura 2. Cantidad de empleados por estado civil</h4>
                <div class="chart-container" style="height: 250px !important;">
                    <canvas id="chartEstadoCivil" style="margin-top: 0px !important; width: 500px !important; height: 80% !important;"></canvas>
                </div>
            </div>
            <div>
            <?php 
                //Figura 3. Cantidad de empleados por nivel de educación
                $sql11="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estudios = 1";
                $pi = mysqli_fetch_array($con -> query($sql11));

                $sql12="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estudios = 2";
                $pc = mysqli_fetch_array($con -> query($sql12));

                $sql13="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estudios = 3";
                $bi = mysqli_fetch_array($con -> query($sql13));

                $sql14="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estudios = 4";
                $bc = mysqli_fetch_array($con -> query($sql14));

                $sql15="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estudios = 5";
                $ti = mysqli_fetch_array($con -> query($sql15));

                $sql16="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estudios = 6";
                $tc = mysqli_fetch_array($con -> query($sql16));

                $sql17="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estudios = 7";
                $pfi = mysqli_fetch_array($con -> query($sql17));

                $sql18="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estudios = 8";
                $pfc = mysqli_fetch_array($con -> query($sql18));

                $sql19="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estudios = 9";
                $cmp = mysqli_fetch_array($con -> query($sql19));

                $sql20="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estudios = 10";
                $pgi = mysqli_fetch_array($con -> query($sql20));

                $sql21="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estudios = 11";
                $pgc = mysqli_fetch_array($con -> query($sql21)); 

                $vector = array($pi[0],$pc[0],$bi[0],$bc[0],$ti[0],$tc[0],$pfi[0],$pfc[0],$cmp[0],$pgi[0],$pgc[0]);
            ?>
        </div>
        <div class="salto"></div>
        <div style="margin-top: 2cm !important;">
            <h4 style="margin-bottom: 0px !important;">3. Cantidad de empleados por nivel de educación</h4>
            <h4 class="subtitulo">Figura 3. Cantidad de empleados por nivel de educación</h4>
            <div class="chart-container-large">
                <canvas id="chartEducacion" style="margin-top: 0px !important; width: 700px !important; height: 300px !important;"></canvas>
            </div>
            <?php  
                //Figura 4. Cantidad de empleados por estrato
                $sql22="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estrato = 1";
                $e1 = mysqli_fetch_array($con -> query($sql22));

                $sql23="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estrato = 2";
                $e2 = mysqli_fetch_array($con -> query($sql23));

                $sql24="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estrato = 3";
                $e3 = mysqli_fetch_array($con -> query($sql24));

                $sql25="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estrato = 4";
                $e4 = mysqli_fetch_array($con -> query($sql25));

                $sql26="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estrato = 5";
                $e5 = mysqli_fetch_array($con -> query($sql26));

                $sql27="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estrato = 6";
                $e6 = mysqli_fetch_array($con -> query($sql27));

                $sql28="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estrato = 7";
                $fi = mysqli_fetch_array($con -> query($sql28));

                $sql29="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and estrato = 8";
                $ns = mysqli_fetch_array($con -> query($sql29));

                $vector = array($e1[0],$e2[0],$e3[0],$e4[0],$e5[0],$e6[0],$fi[0],$ns[0]);
            ?>
            <br>
            <br>
            <h4 style="margin-bottom: 0px !important;">4. Cantidad de empleados por estrato</h4>
            <h4 class="subtitulo">Figura 4. Cantidad de empleados por estrato</h4>
            <div class="chart-container" style="height: 300px !important;">
                <canvas id="chartEstrato" style="margin-top: 0px !important; width: 500px !important; height: 100% !important;"></canvas>
            </div>
        </div>
        <div class="salto"></div>
        <div style="margin-top: 2cm !important;">
            <?php  
                // Figura 5. Cantidad de empleados por tipo de vivienda----
                
                $sql30="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and vivienda = 1";
                $arriendo = mysqli_fetch_array($con -> query($sql30));

                $sql31="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and vivienda = 2";
                $propia = mysqli_fetch_array($con -> query($sql31));

                $sql32="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and vivienda = 3";
                $familiar = mysqli_fetch_array($con -> query($sql32));
            
                $vector = array($arriendo[0],$propia[0],$familiar[0]);
            ?>
            <div>
                <h4 style="margin-bottom: 0px !important;">5. Cantidad de empleados por tipo de vivienda</h4>
                <h4 class="subtitulo">Figura 5. Cantidad de empleados por tipo de vivienda</h4>
                <div class="chart-container">
                    <canvas id="chartVivienda"></canvas>
                </div>
            </div>
            <br>
            <?php  
                // Figura 6. Cantidad de empleados por tipo de cargo
            $sql33="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and tipocargo = 1";
            $jefatura = mysqli_fetch_array($con -> query($sql33));

            $sql34="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and tipocargo = 2";
            $profesional = mysqli_fetch_array($con -> query($sql34));

            $sql35="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and tipocargo = 3";
            $auxiliar = mysqli_fetch_array($con -> query($sql35));

            $sql36="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and tipocargo = 4";
            $operario = mysqli_fetch_array($con -> query($sql36));
            
                $vector = array($jefatura[0],$profesional[0],$auxiliar[0],$operario[0]);
            ?>
            <div>
                <h4 style="margin-bottom: 0px !important;">6. Cantidad de empleados por tipo de cargo</h4>
                <h4 class="subtitulo">Figura 6. Cantidad de empleados por tipo de cargo</h4>
                <div class="chart-container">
                    <canvas id="chartCargo"></canvas>
                </div>
            </div>
        </div>
        <div class="salto"></div>
        <div style="margin-top: 2cm !important;">
            <?php  
                //Figura 7. Cantidad de empleados por tipo de contrato
                $sql37="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and tipocontrato = 1";
                $temp1 = mysqli_fetch_array($con -> query($sql37));

                $sql38="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and tipocontrato = 2";
                $temp2 = mysqli_fetch_array($con -> query($sql38));

                $sql39="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and tipocontrato = 3";
                $termi = mysqli_fetch_array($con -> query($sql39));

                $sql40="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and tipocontrato = 4";
                $coope = mysqli_fetch_array($con -> query($sql40));

                $sql41="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and tipocontrato = 5";
                $presv = mysqli_fetch_array($con -> query($sql41));

                $sql42="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and tipocontrato = 6";
                $nose = mysqli_fetch_array($con -> query($sql42));

                $vector = array($temp1[0],$temp2[0],$termi[0],$coope[0],$presv[0],$nose[0]);
            ?>
                <h4 style="margin-bottom: 0px !important;">7. Cantidad de empleados por tipo de contrato</h4>
                <h4 class="subtitulo">Figura 7. Cantidad de empleados por tipo de contrato</h4>
                <div class="chart-container-large">
                    <canvas id="chartContrato" style="margin-top: 0px !important; width: 800px !important; height: 300px !important;"></canvas>
                </div>
            </div>
            <?php  
                // Figura 8. Cantidad de empleados por tipo de salario----
                
                $sql43="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and tiposalario = 1";
                $sal1 = mysqli_fetch_array($con -> query($sql43));

                $sql44="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and tiposalario = 2";
                $sal2 = mysqli_fetch_array($con -> query($sql44));

                $sql45="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and tiposalario = 3";
                $sal3 = mysqli_fetch_array($con -> query($sql45));
            
                $vector = array($sal1[0],$sal2[0],$sal3[0]);
            ?>
            <br>
            <br>
            <div>
                <h4 style="margin-bottom: 0px !important;">8. Cantidad de empleados por tipo de salario</h4>
                <h4 class="subtitulo">Figura 8. Cantidad de empleados por tipo de salario</h4>
                <div class="chart-container">
                    <canvas id="chartSalario"></canvas>
                </div>
            </div>
        </div>
        <div class="salto"></div>
        <div style="margin-top: 2cm !important;">
            <?php  
                
            //grafico de edades 

                $r1822 = 0;
                $r2327 = 0;
                $r2832 = 0;
                $r3337 = 0;
                $r3842 = 0;
                $r4347 = 0;
                $r4853 = 0;
                $r54mas = 0;

                $sql46="SELECT * FROM `empleado` WHERE idempresa = $idempresa";
                $fila = $con -> query($sql46);

                $fechaActual = date('Y-m-d'); 
                $datetime2 = date_create($fechaActual);

                while ($row = mysqli_fetch_array($fila)) {
                    $datetime1 = date_create($row[7]);
                    $contador = date_diff($datetime1, $datetime2);
                    $differenceFormat = '%y';
                    $edad = $contador->format($differenceFormat);

                    if ($edad >=18 && $edad <= 22) {
                        $r1822 = $r1822+1;
                    }else{
                        if ($edad >=23 && $edad <= 27) {
                            $r2327 = $r2327+1;
                        }else{
                            if ($edad >=28 && $edad <= 32) {
                                $r2832 = $r2832+1;
                            }else{
                                if ($edad >=33 && $edad <= 37) {
                                    $r3337 = $r3337+1;
                                }else{
                                    if ($edad >=38 && $edad <= 42) {
                                        $r3842 = $r3842+1;
                                    }else{
                                        if ($edad >=43 && $edad <= 47) {
                                            $r4347 = $r4347+1;
                                        }else{
                                            if ($edad >=48 && $edad <= 53) {
                                                $r4853 = $r4853+1;
                                            }else{
                                                $r54mas = $r54mas+1;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            
                $vector = array($r1822,$r2327,$r2832,$r3337,$r3842,$r4347,$r4853,$r54mas);
            ?>
            <div>
                <h4 style="margin-bottom: 0px !important;">9. Cantidad de empleados por edad</h4>
                <h4 class="subtitulo">Figura 9. Cantidad de empleados por edad</h4>
                <div class="chart-container" style="height: 300px !important;">
                    <canvas id="chartEdad" style="margin-top: 0px !important; width: 800px !important; height: 300px !important;"></canvas>
                </div>
            </div>
            <br>
            <?php  
                //Grafico de antiguedad en la empresa
                $sql47="SELECT * FROM `empleado` WHERE idempresa = $idempresa";
                $antiguedad = $con -> query($sql47);

                $a2=0;
                $a5=0;
                $a8=0;
                $a11=0;
                $m11=0;

                while ($row = mysqli_fetch_array($antiguedad)) {
                    if ($row[17]>=0 && $row[17]<=2) {
                    $a2 = $a2+1; 
                    }else{
                    if ($row[17]>=3 && $row[17]<=5) {
                        $a5 = $a5+1; 
                    }else{
                        if ($row[17]>=6 && $row[17]<=8) {
                            $a8 = $a8+1; 
                        }else{
                            if ($row[17]>=9&& $row[17]<=11) {
                                $a11 = $a11+1; 
                            }else{
                                $m11 = $m11+1; 
                            }
                        }
                    } 
                    }    
                }
                
                $vector = array($a2,$a5,$a8,$a11,$m11);
            ?>
            <div>
                <br>
                <br>
                <h4 style="margin-bottom: 0px !important;">10. Antigüedad en la empresa</h4>
                <h4 class="subtitulo">Figura 10. Antigüedad en la empresa</h4>
                <div class="chart-container" style="height: 300px !important;">
                    <canvas id="chartAntiguedadEmpresa" style="margin-top: 0px !important; width: 800px !important; height: 300px !important;"></canvas>
                </div>
            </div>
            <?php  
                //Grafico de antiguedad en el cargo

                $sql48="SELECT * FROM `empleado` WHERE idempresa = $idempresa";
                $antiguedad2 = $con -> query($sql48);

                $numero_empleados = mysqli_num_rows($antiguedad2);

                $a2=0;
                $a5=0;
                $a8=0;
                $a11=0;
                $m11=0;

                while ($row = mysqli_fetch_array($antiguedad2)) {
                    if ($row[20]>=0 && $row[20]<=2) {
                        $a2 = $a2+1; 
                    }else{
                        if ($row[20]>=3 && $row[20]<=5) {
                        $a5 = $a5+1; 
                        }else{
                        if ($row[20]>=6 && $row[20]<=8) {
                            $a8 = $a8+1; 
                        }else{
                            if ($row[20]>=9&& $row[20]<=11) {
                                $a11 = $a11+1; 
                            }else{
                                $m11 = $m11+1; 
                            }
                        }
                        } 
                    }    
                }
                
                $vector = array($a2,$a5,$a8,$a11,$m11);
            ?>
        </div>
        <div class="salto"></div>
        <div style="margin-top: 2cm !important;">
            <div>
                <h4 style="margin-bottom: 0px !important;">11. Antigüedad en el cargo</h4>
                <h4 class="subtitulo">Figura 11. Antigüedad en el cargo</h4>
                <div class="chart-container" style="height: 300px !important;">
                    <canvas id="chartAntiguedadCargo" style="margin-top: 0px !important; width: 800px !important; height: 300px !important;"></canvas>
                </div>
            </div>
        </div>
        <div class="salto"></div>
        <div style="margin-top: 2cm !important;">
            <div>
                <h4>Tabla 1. Descripción general de la población objeto de la valoración del riesgo psicosocial</h4>
                <br>
                <table class="table table_bordered">
                    <thead>
                        <tr style="background-color: #007bff;">
                            <th style="width: 25%;"><strong style="color: black;">Variable </strong></th>
                            <th><strong style="color: black;">Descripción</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Género</td>
                            <td>El <strong><?php echo round($femenino[0] / $numero_empleados * 100, 2); ?>%</strong> de los empleados encuestados pertenecen al género femenino y por su parte el género masculino está representado por un <strong><?php echo round($masculino[0] / $numero_empleados * 100, 2); ?>%</strong> </td>
                        </tr>
                        <tr>
                            <td>Estrato</td>
                            <td>
                                <?php
                                    $vector = [
                                        "Estrato 1" => $e1[0],
                                        "Estrato 2" => $e2[0],
                                        "Estrato 3" => $e3[0],
                                        "Estrato 4" => $e4[0],
                                        "Estrato 5" => $e5[0],
                                        "Estrato 6" => $e6[0],
                                        "Finca" => $fi[0],
                                        "No sé" => $ns[0]
                                    ];

                                    arsort($vector);                        


                                    $mayor_estrato_nombre = array_keys($vector)[0];
                                    $mayor_estrato_porcentaje = round($vector[$mayor_estrato_nombre] / $numero_empleados * 100, 2);
                                    $segundo_estrato_nombre = array_keys($vector)[1];
                                    $segundo_estrato_porcentaje = round($vector[$segundo_estrato_nombre] / $numero_empleados * 100, 2);

                                    $estrattos_sin_cero = array_filter($vector, function($value){
                                        return $value != 0;
                                    });

                                    $menor_estrato_nombre = array_keys($estrattos_sin_cero)[count($estrattos_sin_cero) - 1];
                                    $menor_estrato_porcentaje = round($estrattos_sin_cero[$menor_estrato_nombre] / $numero_empleados * 100, 2);

                                    $estratos_con_cero = array_filter($vector, function($value){
                                        return $value == 0;
                                    });
                    
                                    $estratos_con_cero_str_nombres = implode(', ', array_keys($estratos_con_cero));

                                    echo "El mayor porcentaje de los empleados se encuentran ubicados en el <strong>$mayor_estrato_nombre</strong>, con un <strong>$mayor_estrato_porcentaje%</strong>, seguido del <strong>$segundo_estrato_nombre</strong>, con un <strong>$segundo_estrato_porcentaje%</strong>, siendo el  <strong>$menor_estrato_nombre</strong> con una menor presencia porcentual, <strong>$menor_estrato_porcentaje%</strong> y no se presentan empleados en los estratos <strong>$estratos_con_cero_str_nombres</strong>."

                                ?>

                            </td>
                        </tr>
                        <tr>
                            <td>Edad</td>
                            <td>
                                <?php
                                    $vector = [
                                        "18 a 22 Años" => $r1822,
                                        "23 a 27 Años" => $r2327,
                                        "28 a 32 Años" => $r2832,
                                        "33 a 37 Años" => $r3337,
                                        "38 a 42 Años" => $r3842,
                                        "43 a 47 Años" => $r4347,
                                        "48 a 53 Años" => $r4853,
                                        "54 o más Años" => $r54mas
                                    ];

                                    arsort($vector);

                                    $edad_mas_frecuente_nombre = array_keys($vector)[0];
                                    $edad_mas_frecuente_porcentaje = round($vector[$edad_mas_frecuente_nombre] / $numero_empleados * 100, 2);

                                    $segunda_edad_mas_frecuente_nombre = array_keys($vector)[1];
                                    $segunda_edad_mas_frecuente_porcentaje = round($vector[$segunda_edad_mas_frecuente_nombre] / $numero_empleados * 100, 2);

                                    $vector_sin_cero = array_filter($vector, function($value){
                                        return $value != 0;
                                    });


                                    $edad_menor_frecuente_nombre = array_keys($vector_sin_cero)[count($vector_sin_cero) - 1];
                                    $edad_menor_frecuente_porcentaje = round($vector_sin_cero[$edad_menor_frecuente_nombre] / $numero_empleados * 100, 2);

                                    $edades_con_cero = array_filter($vector, function($value){
                                        return $value == 0;
                                    });

                                    $edades_con_cero_str_nombres = implode(', ', array_keys($edades_con_cero));
                                    echo "La edad más frecuente entre los empleados es la que oscila de <strong>$edad_mas_frecuente_nombre</strong>, <strong>$edad_mas_frecuente_porcentaje%</strong>, seguido de los que tienen entre los <strong>$segunda_edad_mas_frecuente_nombre</strong> con un <strong>$segunda_edad_mas_frecuente_porcentaje%</strong>, siendo el rango de edad <strong>$edad_menor_frecuente_nombre</strong> con una menor presencia porcentual, <strong>$edad_menor_frecuente_porcentaje%</strong> y no se presentan empleados en las edades <strong>$edades_con_cero_str_nombres</strong>."
                                    
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Nivel de estudios</td>
                            <td>
                                <?php
                                    $vector = [
                                        "Primaria Incompleta" => $pi[0],
                                        "Primaria Completa" => $pc[0],
                                        "Bachillerato Incompleto" => $bi[0],
                                        "Bachillerato Completo" => $bc[0],
                                        "Tecnológico Incompleto" => $ti[0],
                                        "Tecnológico Completo" => $tc[0],
                                        "Profesional Incompleto" => $pfi[0],
                                        "Profesional Completo" => $pfc[0],
                                        "Carrera Militar" => $cmp[0],
                                        "Post-grado Incompleto" => $pgi[0],
                                        "Post-grado Completo" => $pgc[0]
                                    ];

                                    arsort($vector);

                                    $nivel_estudio_mas_frecuente_nombre = array_keys($vector)[0];
                                    $nivel_estudio_mas_frecuente_porcentaje = round($vector[$nivel_estudio_mas_frecuente_nombre] / $numero_empleados * 100, 2);

                                    $segundo_nivel_estudio_mas_frecuente_nombre = array_keys($vector)[1];
                                    $segundo_nivel_estudio_mas_frecuente_porcentaje = round($vector[$segundo_nivel_estudio_mas_frecuente_nombre] / $numero_empleados * 100, 2);

                                    $vector_sin_cero = array_filter($vector, function($value){
                                        return $value != 0;
                                    });

                                    $nivel_estudio_menor_frecuente_nombre = array_keys($vector_sin_cero)[count($vector_sin_cero) - 1];
                                    $nivel_estudio_menor_frecuente_porcentaje = round($vector_sin_cero[$nivel_estudio_menor_frecuente_nombre] / $numero_empleados * 100, 2);

                                    $niveles_estudio_con_cero = array_filter($vector, function($value){
                                        return $value == 0;
                                    });

                                    $niveles_estudio_con_cero_str_nombres = implode(', ', array_keys($niveles_estudio_con_cero));
                                    
                                    echo "La mayor presencia porcentual de los empleados presenta un nivel de escolaridad de <strong>$nivel_estudio_mas_frecuente_nombre</strong>, <strong>$nivel_estudio_mas_frecuente_porcentaje%</strong>, seguido de <strong>$segundo_nivel_estudio_mas_frecuente_nombre</strong> con un <strong>$segundo_nivel_estudio_mas_frecuente_porcentaje%</strong>, siendo la escolaridad <strong>$nivel_estudio_menor_frecuente_nombre</strong> con una menor presencia porcentual, <strong>$nivel_estudio_menor_frecuente_porcentaje%</strong>. En el nivel de estudios <strong>$niveles_estudio_con_cero_str_nombres</strong> no se presentan empleados.";

                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Antigüedad en la empresa</td>
                            <td>
                                <?php
                                    $vector = [
                                        "0 a 2 Años" => $a2,
                                        "3 a 5 Años" => $a5,
                                        "6 a 8 Años" => $a8,
                                        "9 a 11 Años" => $a11,
                                        "11 o más Años" => $m11
                                    ];

                                    arsort($vector);

                                    $antiguedad_mas_frecuente_nombre = array_keys($vector)[0];
                                    $antiguedad_mas_frecuente_porcentaje = round($vector[$antiguedad_mas_frecuente_nombre] / $numero_empleados * 100, 2);

                                    $segunda_antiguedad_mas_frecuente_nombre = array_keys($vector)[1];
                                    $segunda_antiguedad_mas_frecuente_porcentaje = round($vector[$segunda_antiguedad_mas_frecuente_nombre] / $numero_empleados * 100, 2);

                                    $vector_sin_cero = array_filter($vector, function($value){
                                        return $value != 0;
                                    });

                                    $antiguedad_menor_frecuente_nombre = array_keys($vector_sin_cero)[count($vector_sin_cero) - 1];
                                    $antiguedad_menor_frecuente_porcentaje = round($vector_sin_cero[$antiguedad_menor_frecuente_nombre] / $numero_empleados * 100, 2);

                                    $antiguedades_con_cero = array_filter($vector, function($value){
                                        return $value == 0;
                                    });

                                    $antiguedades_con_cero_str_nombres = implode(', ', array_keys($antiguedades_con_cero));

                                    echo "Los empleados que tienen una mayor antigüedad en la empresa son los que tienen entre <strong>$antiguedad_mas_frecuente_nombre</strong> de años laborando, <strong>$antiguedad_mas_frecuente_porcentaje%</strong>, seguido de <strong>$segunda_antiguedad_mas_frecuente_nombre</strong> con un <strong>$segunda_antiguedad_mas_frecuente_porcentaje%</strong>, siendo la antigüedad <strong>$antiguedad_menor_frecuente_nombre</strong> con una menor presencia porcentual, <strong>$antiguedad_menor_frecuente_porcentaje%</strong>. En los años de antigüedad <strong>$antiguedades_con_cero_str_nombres</strong> no se presentan empleados.";

                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Antigüedad en el cargo</td>
                            <td>
                                <?php
                                    $vector = [
                                        "0 a 2 Años" => $a2,
                                        "3 a 5 Años" => $a5,
                                        "6 a 8 Años" => $a8,    
                                        "9 a 11 Años" => $a11,
                                        "11 o más Años" => $m11
                                    ];

                                    arsort($vector);

                                    $antiguedad_mas_frecuente_nombre = array_keys($vector)[0];  
                                    $antiguedad_mas_frecuente_porcentaje = round($vector[$antiguedad_mas_frecuente_nombre] / $numero_empleados * 100, 2);

                                    $segunda_antiguedad_mas_frecuente_nombre = array_keys($vector)[1];
                                    $segunda_antiguedad_mas_frecuente_porcentaje = round($vector[$segunda_antiguedad_mas_frecuente_nombre] / $numero_empleados * 100, 2);

                                    $vector_sin_cero = array_filter($vector, function($value){
                                        return $value != 0;
                                    });

                                    $antiguedad_menor_frecuente_nombre = array_keys($vector_sin_cero)[count($vector_sin_cero) - 1];
                                    $antiguedad_menor_frecuente_porcentaje = round($vector_sin_cero[$antiguedad_menor_frecuente_nombre] / $numero_empleados * 100, 2);

                                    $antiguedades_con_cero = array_filter($vector, function($value){
                                        return $value == 0;
                                    });

                                    $antiguedades_con_cero_str_nombres = implode(', ', array_keys($antiguedades_con_cero));

                                    echo "Los empleados que tienen una mayor antigüedad en su cargo son los que tienen entre <strong>$antiguedad_mas_frecuente_nombre</strong> de años en un mismo cargo, <strong>$antiguedad_mas_frecuente_porcentaje%</strong>, seguido de <strong>$segunda_antiguedad_mas_frecuente_nombre</strong> con un <strong>$segunda_antiguedad_mas_frecuente_porcentaje%</strong>, siendo la antigüedad en el mismo cargo <strong>$antiguedad_menor_frecuente_nombre</strong> con una menor presencia porcentual, <strong>$antiguedad_menor_frecuente_porcentaje%</strong>. En los años de antigüedad en el cargo <strong>$antiguedades_con_cero_str_nombres</strong> no se presentan empleados.";

                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    $(document).ready(function(){
        // Registrar el plugin de datalabels
        Chart.register(ChartDataLabels);

        new Chart(document.getElementById('chartGenero'), {
            type: 'doughnut',
            data:  {
                labels: ['Femenino', 'Masculino'],
                datasets: [{
                    data: [<?= intval($femenino[0]) ?>, <?= intval($masculino[0]) ?>],
                    backgroundColor: ['#FF6384', '#36A2EB'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true, 
                        position: 'right'
                    },
                    datalabels: {
                        color: '#000000',
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        formatter: function(value, context) {
                            const percentage = (value / <?php echo $numero_empleados; ?> * 100).toFixed(1) + '%';
                            return percentage;
                        }
                    }
                }
            }
        });


        // Figura 2: Estado Civil
        new Chart(document.getElementById('chartEstadoCivil'), {
            type: 'bar',
            data: {
                labels: ['Soltero', 'Casado', 'Unión Libre', 'Separado', 'Divorciado', 'Viudo'],
                datasets: [{
                    label: 'Estado Civil',
                    data: [<?php echo (($soltero[0] / $numero_empleados) * 100); ?>, <?php echo $casado[0] / $numero_empleados * 100; ?>, <?php echo $unionlibre[0] / $numero_empleados * 100; ?>, <?php echo $separado[0] / $numero_empleados * 100; ?>, <?php echo $divorciado[0] / $numero_empleados * 100; ?>, <?php echo $viudo[0] / $numero_empleados * 100; ?>],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    datalabels: {
                        anchor: 'center',
                        align: 'center',
                        offset: 1,
                        formatter: function(value) {
                            return value + '%';
                        },
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: '#000000',
                        formatter: function(value, context) {
                            const percentage = (value).toFixed(1) + '%';
                            return percentage;
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        min: 0,
                        ticks: {
                            callback: function(value) {
                                return value + '%';
                            }
                        }
                    }
                }
            }
        });

        // Figura 3: Educación
        new Chart(document.getElementById('chartEducacion'), {
            type: 'bar',
            data: {
                labels: ['Primaria Incompleta', 'Primaria Completa', 'Bachillerato Incompleto', 'Bachillerato Completo', 'Tecnológico Incompleto', 'Tecnológico Completo', 'Profesional Incompleto', 'Profesional Completo', 'Carrera Militar', 'Post-grado Incompleto', 'Post-grado Completo'],
                datasets: [{
                    label: 'Nivel de estudios',
                    data: [<?php echo (($pi[0] / $numero_empleados) * 100); ?>, <?php echo (($pc[0] / $numero_empleados) * 100); ?>, <?php echo (($bi[0] / $numero_empleados) * 100); ?>, <?php echo (($bc[0] / $numero_empleados) * 100); ?>, <?php echo (($ti[0] / $numero_empleados) * 100); ?>, <?php echo (($tc[0] / $numero_empleados) * 100); ?>, <?php echo (($pfi[0] / $numero_empleados) * 100); ?>, <?php echo (($pfc[0] / $numero_empleados) * 100); ?>, <?php echo (($cmp[0] / $numero_empleados) * 100); ?>, <?php echo (($pgi[0] / $numero_empleados) * 100); ?>, <?php echo (($pgc[0] / $numero_empleados) * 100); ?>],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#8BC34A', '#E91E63', '#00BCD4', '#CDDC39', '#795548'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    datalabels: {
                        anchor: 'center',
                        align: 'center',
                        offset: 1,
                        formatter: function(value) {
                            return value + '%';
                        },
                        font: {
                            weight: 'bold',
                            size: 10
                        },
                        color: '#000000',
                        formatter: function(value, context) {
                            const percentage = (value).toFixed(1) + '%';
                            return percentage;
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        min: 0,
                        ticks: {
                            callback: function(value) {
                                return value + '%';
                            }
                        }
                    }
                }
            }
        });

        // Figura 4: Estrato
        new Chart(document.getElementById('chartEstrato'), {
            type: 'bar',
            data: {
                labels: ['Estrato 1', 'Estrato 2', 'Estrato 3', 'Estrato 4', 'Estrato 5', 'Estrato 6', 'Finca', 'No sé'],
                datasets: [{
                    label: 'Estrato',
                    data: [<?php echo ($e1[0] / $numero_empleados) * 100; ?>, <?php echo ($e2[0] / $numero_empleados) * 100; ?>, <?php echo ($e3[0] / $numero_empleados) * 100; ?>, <?php echo ($e4[0] / $numero_empleados) * 100; ?>, <?php echo ($e5[0] / $numero_empleados) * 100; ?>, <?php echo ($e6[0] / $numero_empleados) * 100; ?>, <?php echo ($fi[0] / $numero_empleados) * 100; ?>, <?php echo ($ns[0] / $numero_empleados) * 100; ?>],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FF6384', '#36A2EB'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    datalabels: {
                        anchor: 'center',
                        align: 'center',
                        offset: 1,
                        formatter: function(value) {
                            return value + '%';
                        },
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: '#000000',
                        formatter: function(value, context) {
                            const percentage = (value).toFixed(1) + '%';
                            return percentage;
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        min: 0,
                        ticks: {
                            callback: function(value) {
                                return value + '%';
                            }
                        }
                    }
                }
            }
        });

        // Figura 5: Vivienda
        new Chart(document.getElementById('chartVivienda'), {
            type: 'doughnut',
            data: {
                labels: ['Arriendo', 'Propia', 'Familiar'],
                datasets: [{
                    data: [<?php echo $arriendo[0]; ?>, <?php echo $propia[0]; ?>, <?php echo $familiar[0]; ?>],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'right'
                    },
                    datalabels: {
                        anchor: 'center',
                        align: 'center',
                        formatter: function(value) {
                            return value + '%';
                        },
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: '#000000',
                        formatter: function(value, context) {
                            const percentage = (value / <?php echo $numero_empleados; ?> * 100).toFixed(1) + '%';
                            return percentage;
                        }
                    }
                },
            }
        });

        // Figura 6: Cargo
        new Chart(document.getElementById('chartCargo'), {
            type: 'doughnut',
            data: {
                labels: ['Jefatura', 'Profesional', 'Auxiliar', 'Operario'],
                datasets: [{
                    data: [<?php echo $jefatura[0]; ?>, <?php echo $profesional[0]; ?>, <?php echo $auxiliar[0]; ?>, <?php echo $operario[0]; ?>],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'right'
                    },
                    datalabels: {
                        anchor: 'center',
                        align: 'center',
                        formatter: function(value) {
                            return value + '%';
                        },
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: '#ffffff ',
                        formatter: function(value, context) {
                            const percentage = (value / <?php echo $numero_empleados; ?> * 100).toFixed(1) + '%';
                            return percentage;
                        }
                    }
                },
            }
        });

        // Figura 7: Contrato
        new Chart(document.getElementById('chartContrato'), {
            type: 'bar',
            data: {
                labels: ['Temporal < 1 año', 'Temporal ≥ 1 año', 'Término indefinido', 'Cooperado', 'Prestación servicios', 'No sé'],
                datasets: [{
                    label: 'Contrato',
                    data: [<?php echo ($temp1[0] / $numero_empleados) * 100; ?>, <?php echo ($temp2[0] / $numero_empleados) * 100; ?>, <?php echo ($termi[0] / $numero_empleados) * 100; ?>, <?php echo ($coope[0] / $numero_empleados) * 100; ?>, <?php echo ($presv[0] / $numero_empleados) * 100; ?>, <?php echo ($nose[0] / $numero_empleados) * 100; ?>],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    datalabels: {
                        anchor: 'center',
                        align: 'center',
                        offset: 1,
                        formatter: function(value) {
                            return value + '%';
                        },
                        font: {
                            weight: 'bold',
                            size: 10
                        },
                        color: '#000000',
                        formatter: function(value, context) {
                            const percentage = (value).toFixed(1) + '%';
                            return percentage;
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        min: 0,
                        ticks: {
                            callback: function(value) {
                                return value + '%';
                            }
                        }
                    }
                }
            }
        });

        // Figura 8: Salario
        new Chart(document.getElementById('chartSalario'), {
            type: 'doughnut',
            data: {
                labels: ['Fijo', 'Fijo + Variable', 'Variable'],
                datasets: [{ 
                    data: [<?php echo $sal1[0]; ?>, <?php echo $sal2[0]; ?>, <?php echo $sal3[0]; ?>],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'right'
                    },
                    datalabels: {
                        anchor: 'center',
                        align: 'center',
                        formatter: function(value) {
                            return value + '%';
                        },
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: '#000000',
                        formatter: function(value, context) {
                            const percentage = (value / <?php echo $numero_empleados; ?> * 100).toFixed(1) + '%';
                            return percentage;
                        }
                    }
                },
            }
        });

        // Figura 9: Edad
        new Chart(document.getElementById('chartEdad'), {
            type: 'bar',
            data: {
                labels: ['18-22 años', '23-27 años', '28-32 años', '33-37 años', '38-42 años', '43-47 años', '48-53 años', 'Más de 53 años'],
                datasets: [{
                    label: 'Edad',
                    data: [<?php echo ($r1822 / $numero_empleados) * 100; ?>, <?php echo ($r2327 / $numero_empleados) * 100; ?>, <?php echo ($r2832 / $numero_empleados) * 100; ?>, <?php echo ($r3337 / $numero_empleados) * 100; ?>, <?php echo ($r3842 / $numero_empleados) * 100; ?>, <?php echo ($r4347 / $numero_empleados) * 100; ?>, <?php echo ($r4853 / $numero_empleados) * 100; ?>, <?php echo ($r54mas / $numero_empleados) * 100; ?>],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#8BC34A', '#E91E63'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    datalabels: {
                        anchor: 'center',
                        align: 'center',
                        formatter: function(value) {
                            return value + '%';
                        },
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: '#000000',
                        formatter: function(value, context) {
                            const percentage = (value).toFixed(1) + '%';
                            return percentage;
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        min: 0,
                        ticks: {
                            callback: function(value) {
                                return value + '%';
                            }
                        }
                    }
                }
            }
        });

        // Figura 10: Antigüedad en la empresa
        new Chart(document.getElementById('chartAntiguedadEmpresa'), {
            type: 'bar',
            data: {
                labels: ['0-2 años', '3-5 años', '6-8 años', '9-11 años', 'Más de 11 años'],
                datasets: [{
                    label: 'Antigüedad en la empresa',
                    data: [<?php echo ($a2 / $numero_empleados) * 100; ?>, <?php echo ($a5 / $numero_empleados) * 100; ?>, <?php echo ($a8 / $numero_empleados) * 100; ?>, <?php echo ($a11 / $numero_empleados) * 100; ?>, <?php echo ($m11 / $numero_empleados) * 100; ?>],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    datalabels: {
                        anchor: 'center',
                        align: 'center',
                        offset: 1,
                        formatter: function(value) {
                            return value + '%';
                        },
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: '#000000',
                        formatter: function(value, context) {
                            const percentage = (value).toFixed(1) + '%';
                            return percentage;
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        min: 0,
                        ticks: {
                            callback: function(value) {
                                return value + '%';
                            }
                        }
                    }
                }
            }
        });

        // Figura 11: Antigüedad en el cargo
        new Chart(document.getElementById('chartAntiguedadCargo'), {
            type: 'bar',
            data: {
                label: 'Antigüedad en el cargo',
                labels: ['0-2 años', '3-5 años', '6-8 años', '9-11 años', 'Más de 11 años'],
                datasets: [{
                    data: [<?php echo ($a2 / $numero_empleados) * 100; ?>, <?php echo ($a5 / $numero_empleados) * 100; ?>, <?php echo ($a8 / $numero_empleados) * 100; ?>, <?php echo ($a11 / $numero_empleados) * 100; ?>, <?php echo ($m11 / $numero_empleados) * 100; ?>],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    datalabels: {
                        anchor: 'center',
                        align: 'center',
                        offset: 1,
                        formatter: function(value) {
                            return value + '%';
                        },
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: '#000000',
                        formatter: function(value, context) {
                            const percentage = (value).toFixed(1) + '%';
                            return percentage;
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        min: 0,
                        ticks: {
                            callback: function(value) {
                                return value + '%';
                            }
                        }
                    }
                }
            }
        });
    });
    </script>
</body></html>
<?php 



?>
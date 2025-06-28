<?php  
 ob_start();
include ('../conexion.php');

$idcliente = $_GET['id_cli'];
$idempresa = $_GET['id_emp'];

$sql="SELECT * FROM `empresa` WHERE idem = $idempresa";
$resultado = mysqli_fetch_array($con -> query($sql));

$sql2="SELECT * FROM `cliente` WHERE idcl = $idcliente";
$resultado2 = mysqli_fetch_array($con -> query($sql2));

/*
$sql3="UPDATE `empresa` SET `sociodemografico` = sociodemografico + 1 WHERE `idem` = $idempresa";
$con -> query($sql3);
*/
?>
<!DOCTYPE html>
<html><head>
	<title></title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style type="text/css">
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
			height: 500px;
			width: 100%;
			margin: 20px 0;
		}

		canvas{
			width: 400px !important;
			height: 400px !important;
            margin-top: -100px !important;
		}
		
		body {
			text-align: center;
			font-family: 'Poppins', sans-serif;
            font-size: 14px;
		}
		
		.chart-container, .chart-container-small, .chart-container-large {
			display: flex;
			justify-content: center;
			align-items: center;
			margin: 20px auto;
		}
		
		h4 {
			margin: 30px 0 20px 0;
		}
		#imprimir{
			margin-top: 20px;
			margin-bottom: 20px;
			padding: 10px 20px;
			background-color: #007bff;
			color: white;
			border: none;
			border-radius: 50%;
			cursor: pointer;
			font-size: 16px;
			font-weight: bold;
			transition: background-color 0.3s ease;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
			text-decoration: none;
			display: inline-block;
			text-align: center;
			width: 80px;
			height: 80px;
			line-height: 40px;
			position: fixed;
			bottom: 20px;
			right: 20px;
			z-index: 1000;
			font-size: 20px;
		}
		#contenido{
			margin-top: 20px;
			margin-bottom: 20px;
			padding: 10px 20px;
			margin-left: 20px;
		}

		.salto{
			page-break-before: always;
		}

		@media print {
			#imprimir {
				display: none;
			}

            #contenido{
                margin-top: 0px;
                margin-bottom: 0px;
                padding: 0px;
                margin-left: 0px;
            }
		}

        #todo{
            width: 600px;
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
            padding: 10px;
        }

        .table_bordered th, .table_bordered td{
            border: 2px solid rgb(90, 90, 90) !important;
        }
	</style>
</head><body>
	<button id="imprimir" onclick="window.print()"><i class="fas fa-print"></i></button>
    <div id="contenido" style="text-align: center">
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
        <h4>Experto</h4>
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
        <br>
        <br>
        <br>
        <br>
        <h4><?php echo $resultado[2]; ?></h4>
    </div>
    <div id="todo">
    <div class="salto"></div>
        <?php  
            // Empleados por genero----------------------------------------------
            $sql3="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and sexo = 2";
            $masculino = mysqli_fetch_array($con -> query($sql3));

            $sql4="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $idempresa and sexo = 1";
            $femenino = mysqli_fetch_array($con -> query($sql4));
            $vector = array($femenino[0],$masculino[0]);
        ?>
        <div>
            <h4>Figura 1. Cantidad de empleados por género</h4>
            <div class="chart-container">
                <canvas id="chartGenero"></canvas>
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
            <h4>Figura 2. Cantidad de empleados por estado civil</h4>
            <div class="chart-container">
                <canvas id="chartEstadoCivil"></canvas>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
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
    <br><br>
    <h4>Figura 3. Cantidad de empleados por nivel de educación</h4>
    <div class="chart-container-large">
        <canvas id="chartEducacion"></canvas>
    </div>
    </div>
    <div>
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
            <h4>Figura 4. Cantidad de empleados por estrato</h4>
            <div class="chart-container">
                <canvas id="chartEstrato"></canvas>
            </div>
        </div>
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
        <div class="salto"></div>
        <div>
            <h4>Figura 5. Cantidad de empleados por tipo de vivienda</h4>
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
            <h4>Figura 6. Cantidad de empleados por tipo de cargo</h4>
            <div class="chart-container">
                <canvas id="chartCargo"></canvas>
            </div>
        </div>
        <div class="salto"></div>
        <div>
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
            <h4>Figura 7. Cantidad de empleados por tipo de contrato</h4>
            <div class="chart-container-large">
                <canvas id="chartContrato"></canvas>
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
        <div>
            <h4>Figura 8. Cantidad de empleados por tipo de salario</h4>
            <div class="chart-container">
                <canvas id="chartSalario"></canvas>
            </div>
        </div>
        <?php  
            
            //grafico de edades 

                $r1826 = 0;
                $r2740 = 0;
                $r4160 = 0;
                $rm60 = 0;

                $sql46="SELECT * FROM `empleado` WHERE idempresa = $idempresa";
                $fila = $con -> query($sql46);

                $fechaActual = date('Y-m-d'); 
                $datetime2 = date_create($fechaActual);

                while ($row = mysqli_fetch_array($fila)) {
                $datetime1 = date_create($row[7]);
                $contador = date_diff($datetime1, $datetime2);
                $differenceFormat = '%y';
                $edad = $contador->format($differenceFormat);

                if ($edad >=18 && $edad <= 26) {
                    $r1826 = $r1826+1;
                }else{
                    if ($edad >=27 && $edad <= 40) {
                        $r2740 = $r2740+1;
                    }else{
                        if ($edad >=41 && $edad <= 60) {
                            $r4160 = $r4160+1;
                        }else{
                            $rm60 = $rm60+1;
                        }
                    }
                }
                }
        
            $vector = array($r1826,$r2740,$r4160,$rm60);
        ?>
        <div class="salto"></div>
        <div>
            <h4>Figura 9. Cantidad de empleados por edad</h4>
            <div class="chart-container">
                <canvas id="chartEdad"></canvas>
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
            <h4>Figura 10. Antiguedad en la empresa</h4>
            <div class="chart-container">
                <canvas id="chartAntiguedadEmpresa"></canvas>
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
        <div class="salto"></div>
        <div>
            <h4>Figura 11. Antigüedad en el cargo</h4>
            <div class="chart-container">
                <canvas id="chartAntiguedadCargo"></canvas>
            </div>
        </div>
        <br>
        <div>
            <h4>Tabla 1. Descripción general de la población objeto de la valoración del riesgo psicosocial</h4>
            <br>
            <table class="table table_bordered">
                <thead>
                    <tr style="background-color: #007bff;">
                        <th style="width: 30%;">Variable </th>
                        <th>Descripción</th>
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

                                $estratos_con_cero = array_filter($vector, function($value){
                                    return $value == 0;
                                });

                                $mayor_estrato_nombre = array_keys($vector)[0];
                                $mayor_estrato_porcentaje = round($vector[$mayor_estrato_nombre] / $numero_empleados * 100, 2);
                                $segundo_estrato_nombre = array_keys($vector)[1];
                                $segundo_estrato_porcentaje = round($vector[$segundo_estrato_nombre] / $numero_empleados * 100, 2);

                                $menor_estrato_nombre = array_keys($vector)[count($vector) - 1];
                                $menor_estrato_porcentaje = round($vector[$menor_estrato_nombre] / $numero_empleados * 100, 2);

                                $estratos_con_cero_str_nombres = implode(', ', array_keys($estratos_con_cero));

                                echo "El mayor porcentaje de los empleados se encuentran ubicados en el estrato <strong>$mayor_estrato_nombre</strong>, con un <strong>$mayor_estrato_porcentaje%</strong>, seguido del estrato <strong>$segundo_estrato_nombre</strong>, con un <strong>$segundo_estrato_porcentaje%</strong>, siendo el estrato <strong>$menor_estrato_nombre</strong> con una menor presencia porcentual, <strong>$menor_estrato_porcentaje%</strong> y no se presentan empleados en los estratos <strong>$estratos_con_cero_str_nombres</strong>."

                            ?>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
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
                    color: '#fff',
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
        type: 'doughnut',
        data: {
            labels: ['Soltero', 'Casado', 'Unión Libre', 'Separado', 'Divorciado', 'Viudo'],
            datasets: [{
                data: [<?php echo $soltero[0]; ?>, <?php echo $casado[0]; ?>, <?php echo $unionlibre[0]; ?>, <?php echo $separado[0]; ?>, <?php echo $divorciado[0]; ?>, <?php echo $viudo[0]; ?>],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
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
                        size: 14
                    },
                    color: '#ffffff',
                    formatter: function(value, context) {
                        const percentage = (value / <?php echo $numero_empleados; ?> * 100).toFixed(1) + '%';
                        return percentage;
                    }
                }
            },
        }
    });

    // Figura 3: Educación
    new Chart(document.getElementById('chartEducacion'), {
        type: 'doughnut',
        data: {
            labels: ['Primaria Incompleta', 'Primaria Completa', 'Bachillerato Incompleto', 'Bachillerato Completo', 'Tecnológico Incompleto', 'Tecnológico Completo', 'Profesional Incompleto', 'Profesional Completo', 'Carrera Militar', 'Post-grado Incompleto', 'Post-grado Completo'],
            datasets: [{
                data: [<?php echo $pi[0]; ?>, <?php echo $pc[0]; ?>, <?php echo $bi[0]; ?>, <?php echo $bc[0]; ?>, <?php echo $ti[0]; ?>, <?php echo $tc[0]; ?>, <?php echo $pfi[0]; ?>, <?php echo $pfc[0]; ?>, <?php echo $cmp[0]; ?>, <?php echo $pgi[0]; ?>, <?php echo $pgc[0]; ?>],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            plugins: {
				legend: {
					display: true,
                    position: 'bottom'
				},
                datalabels: {
                    anchor: 'center',
                    align: 'center',
                    formatter: function(value) {
                        return value + '%';
                    },
                    font: {
                        weight: 'bold',
                        size: 10
                    },
                    color: '#ffffff',
                    formatter: function(value, context) {
                        const percentage = (value / <?php echo $numero_empleados; ?> * 100).toFixed(1) + '%';
                        return percentage;
                    }
                }
            },
        }
    });

    // Figura 4: Estrato
    new Chart(document.getElementById('chartEstrato'), {
        type: 'doughnut',
        data: {
            labels: ['Estrato 1', 'Estrato 2', 'Estrato 3', 'Estrato 4', 'Estrato 5', 'Estrato 6', 'Finca', 'No sé'],
            datasets: [{
                data: [<?php echo $e1[0]; ?>, <?php echo $e2[0]; ?>, <?php echo $e3[0]; ?>, <?php echo $e4[0]; ?>, <?php echo $e5[0]; ?>, <?php echo $e6[0]; ?>, <?php echo $fi[0]; ?>, <?php echo $ns[0]; ?>],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FF6384', '#36A2EB'],
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
                    color: '#ffffff',
                    formatter: function(value, context) {
                        const percentage = (value / <?php echo $numero_empleados; ?> * 100).toFixed(1) + '%';
                        return percentage;
                    }
                }
            },
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
                    color: '#ffffff',
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
                    color: '#ffffff',
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
        type: 'doughnut',
        data: {
            labels: ['Temporal < 1 año', 'Temporal ≥ 1 año', 'Término indefinido', 'Cooperado', 'Prestación servicios', 'No sé'],
            datasets: [{
                data: [<?php echo $temp1[0]; ?>, <?php echo $temp2[0]; ?>, <?php echo $termi[0]; ?>, <?php echo $coope[0]; ?>, <?php echo $presv[0]; ?>, <?php echo $nose[0]; ?>],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            plugins: {
				legend: {
					display: true,
                    position: 'bottom'
				},
                datalabels: {
                    anchor: 'center',
                    align: 'center',
                    formatter: function(value) {
                        return value + '%';
                    },
                    font: {
                        weight: 'bold',
                        size: 10
                    },
                    color: '#ffffff',
                    formatter: function(value, context) {
                        const percentage = (value / <?php echo $numero_empleados; ?> * 100).toFixed(1) + '%';
                        return percentage;
                    }
                }
            },
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
                    color: '#ffffff',
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
        type: 'doughnut',
        data: {
            labels: ['18-26 años', '27-40 años', '41-60 años', 'Más de 60 años'],
            datasets: [{
                data: [<?php echo $r1826; ?>, <?php echo $r2740; ?>, <?php echo $r4160; ?>, <?php echo $rm60; ?>],
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
                    color: '#ffffff',
                    formatter: function(value, context) {
                        const percentage = (value / <?php echo $numero_empleados; ?> * 100).toFixed(1) + '%';
                        return percentage;
                    }
                }
            },
        }
    });

    // Figura 10: Antigüedad en la empresa
    new Chart(document.getElementById('chartAntiguedadEmpresa'), {
        type: 'doughnut',
        data: {
            labels: ['0-2 años', '3-5 años', '6-8 años', '9-11 años', 'Más de 11 años'],
            datasets: [{
                data: [<?php echo $a2; ?>, <?php echo $a5; ?>, <?php echo $a8; ?>, <?php echo $a11; ?>, <?php echo $m11; ?>],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'],
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
                    color: '#ffffff',
                    formatter: function(value, context) {
                        const percentage = (value / <?php echo $numero_empleados; ?> * 100).toFixed(1) + '%';
                        return percentage;
                    }
                }
            },
        }
    });

    // Figura 11: Antigüedad en el cargo
    new Chart(document.getElementById('chartAntiguedadCargo'), {
        type: 'doughnut',
        data: {
            labels: ['0-2 años', '3-5 años', '6-8 años', '9-11 años', 'Más de 11 años'],
            datasets: [{
                data: [<?php echo $a2; ?>, <?php echo $a5; ?>, <?php echo $a8; ?>, <?php echo $a11; ?>, <?php echo $m11; ?>],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'],
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
                    color: '#ffffff',
                    formatter: function(value, context) {
                        const percentage = (value / <?php echo $numero_empleados; ?> * 100).toFixed(1) + '%';
                        return percentage;
                    }
                }
            },
        }
    });
    </script>
</body></html>
<?php 



?>
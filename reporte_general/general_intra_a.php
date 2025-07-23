<?php 
ob_start();
$iddepartamento = $_GET['iddepartamento'];
$cliente = $_GET['idcliente'];
$idempresa = $_GET['idempresa'];
include_once("../conexion.php"); 
$nombredepartamento =  mysqli_fetch_array($con -> query("SELECT nombre from departamentos WHERE iddepto = $iddepartamento"));
$nombredepartamento2 = $nombredepartamento[0];
$nombredepartamento = strtoupper($nombredepartamento[0]);
$nombrecliente =  mysqli_fetch_array($con -> query("SELECT nombre from cliente WHERE idcl = $cliente"));

$empresa =  mysqli_fetch_array($con -> query("SELECT empresa from empresa WHERE idem = $idempresa"));
$nombreempresa = $empresa[0];

function formarArrayRiesgo($fadim){
    $puntajeBrutodim = 0;
    $numeroRespuestasDim = 0;
    $fadim1 = [0, 0, 0, 0, 0];
    
    while ($row = mysqli_fetch_array($fadim)) {
        $puntajeBrutodim  = $puntajeBrutodim + $row[4];
        $numeroRespuestasDim = $numeroRespuestasDim + 1;
        if ($row[6]=="Sin riesgo") {
            $fadim1[0] = $fadim1[0]+1;
        }else{
            if ($row[6]=="Bajo") {
                $fadim1[1] = $fadim1[1]+1;
            }else{
                if ($row[6]=="Medio") {
                    $fadim1[2] = $fadim1[2]+1;
                }else{
                    if ($row[6]=="Alto") {
                        $fadim1[3] = $fadim1[3]+1;
                    }else{
                        $fadim1[4] = $fadim1[4]+1;
                    }
                }
            }
        }   
    }  
    return [$puntajeBrutodim, $numeroRespuestasDim, $fadim1];
}

 
?>
 <!DOCTYPE html>
 <html style="overflow-x: hidden;">
 <head>
 	<title>Intra-A-<?php echo $nombredepartamento; ?>-<?php echo $nombreempresa; ?></title>
 	<meta charset="utf-8">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            background-color:rgb(143, 135, 255);
            color: white;
            border-radius: 10px;
            padding: 10px;
            color: white;
            position: absolute;
            top: 10px;
            left: 19.5%;
            z-index: 1000;
            color: rgb(61, 15, 136);
        }
	</style>
 </head>
 <body>
    <div class="container alerta" id="alerta">
        <h3>Estas viendo la vista previa del informe intralaboral forma A de la empresa <strong><?php echo $nombreempresa; ?></strong> en el departamento <strong><?php echo $nombredepartamento; ?></strong>, para descargar el informe, por favor presione el boton de imprimir.</h3>
        <button id="imprimir" onclick="window.print()"><i style="margin-right: 10px;" class="fas fa-print"></i> Imprimir</button>
    </div>
    <div style="text-align: left;" class="contenido">
        <h3 style="width: 100%; text-align: center; font-size: 11pt;">TABLA DE CONTENIDO</h3>
        <br>
        <h4>RESULTADOS DEL CUESTIONARIO INTRALABORAL FORMA A - <?php echo $nombredepartamento; ?></h4>
        <h4>1.	Tablas de los resultados del Cuestionario Intralaboral Forma A</h4>
        <ul>
            <li><h5>1.1. Dominio: Liderazgo y relaciones sociales en el trabajo</h5></li>
            <li><h5>1.2. Dominio: Control sobre el trabajo y sus dimensiones</h5></li>
            <li><h5>1.3. Dominio: Demandas del trabajo</h5></li>
            <li><h5>1.4. Dominio: Recompensas</h5></li>
            <li><h5>1.5. Resultado general del Cuestionario Intralaboral Forma A por niveles de riesgo</h5></li>
        </ul>
        <h4>2.	Figuras de los resultados del Cuestionario Intralaboral Forma A</h4>
        <ul>
            <li><h5>2.1. Dominio: Liderazgo y relaciones sociales en el trabajo</h5></li>
            <li style="padding-left: 10px;"><h5>2.1.1. Dimensión: Características de liderazgo</h5></li>
            <li style="padding-left: 10px;"><h5>2.1.2. Dimensión: Relaciones sociales en el trabajo</h5></li>
            <li style="padding-left: 10px;"><h5>2.1.3. Dimensión: Retroalimentación del desempeño</h5></li>
            <li style="padding-left: 10px;"><h5>2.1.4. Dimensión: Relación con los colaboradores</h5></li>
            <li><h5>2.2. Dominio: Control sobre el trabajo</h5></li>
            <li style="padding-left: 10px;"><h5>2.2.1. Dimensión: Claridad de rol</h5></li>
            <li style="padding-left: 10px;"><h5>2.2.2. Dimensión: Capacitación</h5></li>
            <li style="padding-left: 10px;"><h5>2.2.3. Dimensión: Participación y manejo del cambio</h5></li>
            <li style="padding-left: 10px;"><h5>2.2.4. Dimensión: Oportunidades para el uso y desarrollo de habilidades y conocimientos</h5></li>
            <li style="padding-left: 10px;"><h5>2.2.5. Dimensión: Control y autonomía sobre el trabajo</h5></li>
            <li><h5>2.3. Dominio: Demandas del trabajo</h5></li>
            <li style="padding-left: 10px;"><h5>2.3.1. Dimensión: Demandas ambientales y de esfuerzo físico</h5></li>
            <li style="padding-left: 10px;"><h5>2.3.2. Dimensión: Demandas emocionales</h5></li>
            <li style="padding-left: 10px;"><h5>2.3.3. Dimensión: Demandas cuantitativas</h5></li>
            <li style="padding-left: 10px;"><h5>2.3.4. Dimensión: Influencia del trabajo sobre el entorno extralaboral</h5></li>
        </ul>
    </div>
    <div class="salto"></div>
    <div style="text-align: left;" class="contenido">
        <ul>
            <li style="padding-left: 10px;"><h5>2.3.5. Dimensión: Exigencias de responsabilidad del cargo</h5></li>
            <li style="padding-left: 10px;"><h5>2.3.6. Dimensión: Demandas de carga mental</h5></li>
            <li style="padding-left: 10px;"><h5>2.3.7. Dimensión: Consistencia del rol</h5></li>
            <li style="padding-left: 10px;"><h5>2.3.8. Dimensión: Demandas de la jornada de trabajo</h5></li>
            <li><h5>2.4. Dominio: Recompensas</h5></li>
            <li style="padding-left: 10px;"><h5>2.4.1. Dimensión: Recompensas derivadas de la pertenencia a la organización y del trabajo que se realiza</h5></li>
            <li style="padding-left: 10px;"><h5>2.4.2. Dimensión: Reconocimiento y compensación</h5></li>
        </ul>
        <h4>RESULTADOS DEL CUESTIONARIO EXTRALABORAL - <?php echo $nombredepartamento; ?></h4>
        <h4>1.	Tabla de los resultados del Cuestionario Extralaboral</h4>
        <h4>2.	Resultado general del Cuestionario Extralaboral por niveles de riesgo</h4>
        <h4>3. Figuras de los resultados del Cuestionario Extralaboral</h4>
        <ul>
            <li><h5>3.1. Dimensión: Tiempo fuera del trabajo</h5></li>
            <li><h5>3.2. Dimensión: Relaciones familiares</h5></li>
            <li><h5>3.3. Dimensión: Comunicación y relaciones interpersonales</h5></li>
            <li><h5>3.4. Dimensión: Situación económica del grupo familiar</h5></li>
            <li><h5>3.5. Dimensión: Características de la vivienda y de su entorno</h5></li>
            <li><h5>3.6. Dimensión: Influencia del entorno extralaboral sobre el trabajo</h5></li>
            <li><h5>3.7. Dimensión: Desplazamiento vivienda - trabajo - vivienda</h5></li>
        </ul>
        <h4>RESULTADOS DEL CUESTIONARIO DEL ESTRÉS - <?php echo $nombredepartamento; ?></h4>
            <h4>1.	Tabla de los resultados del Cuestionario del Estrés</h4>
            <h4>2.	Figura de los resultados del Cuestionario del Estrés</h4>
        </ul>
    </div>
    <div class="salto"></div>
    <?php
        $dim1 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=1");
        $dim11 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=2");
        $dim12 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=3");
        $dim13 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=4");
        $dim14 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=5");

        $arrayRiesgoDim1 = formarArrayRiesgo($dim1);
        $arrayRiesgoDim11 = formarArrayRiesgo($dim11);
        $arrayRiesgoDim12 = formarArrayRiesgo($dim12);
        $arrayRiesgoDim13 = formarArrayRiesgo($dim13);
        $arrayRiesgoDim14 = formarArrayRiesgo($dim14);

        $puntajeBrutodim1 = $arrayRiesgoDim1[0];
        $numeroRespuestasDim1 = $arrayRiesgoDim1[1];
        $fadim1 = $arrayRiesgoDim1[2];

        $puntajeBrutodim11 = $arrayRiesgoDim11[0];
        $numeroRespuestasDim11 = $arrayRiesgoDim11[1];
        $fadim11 = $arrayRiesgoDim11[2];

        $puntajeBrutodim12 = $arrayRiesgoDim12[0];
        $numeroRespuestasDim12 = $arrayRiesgoDim12[1];
        $fadim12 = $arrayRiesgoDim12[2];

        $puntajeBrutodim13 = $arrayRiesgoDim13[0];
        $numeroRespuestasDim13 = $arrayRiesgoDim13[1];
        $fadim13 = $arrayRiesgoDim13[2];

        $puntajeBrutodim14 = $arrayRiesgoDim14[0];
        $numeroRespuestasDim14 = $arrayRiesgoDim14[1];
        $fadim14 = $arrayRiesgoDim14[2];

        

        $normadim1 = $con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 1");
        $factorTransform = mysqli_fetch_array($normadim1)[0];
        $puntajeTransformadoDim1 = ($puntajeBrutodim1 / $numeroRespuestasDim1) / $factorTransform * 100;
        $puntajeTransformadoDim1 = round($puntajeTransformadoDim1, 1);

        $normadim11 = $con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 2");
        $factorTransform = mysqli_fetch_array($normadim11)[0];
        $puntajeTransformadoDim11 = ($puntajeBrutodim11 / $numeroRespuestasDim11) / $factorTransform * 100;
        $puntajeTransformadoDim11 = round($puntajeTransformadoDim11, 1);

        $normadim12 = $con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 3");
        $factorTransform = mysqli_fetch_array($normadim12)[0];
        $puntajeTransformadoDim12 = ($puntajeBrutodim12 / $numeroRespuestasDim12) / $factorTransform * 100;
        $puntajeTransformadoDim12 = round($puntajeTransformadoDim12, 1);

        $normadim13 = $con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 4");
        $factorTransform = mysqli_fetch_array($normadim13)[0];
        $puntajeTransformadoDim13 = ($puntajeBrutodim13 / $numeroRespuestasDim13) / $factorTransform * 100;
        $puntajeTransformadoDim13 = round($puntajeTransformadoDim13, 1);

        $normadim14 = $con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 5");
        $factorTransform = mysqli_fetch_array($normadim14)[0];
        $puntajeTransformadoDim14 = ($puntajeBrutodim14 / $numeroRespuestasDim14) / $factorTransform * 100;
        $puntajeTransformadoDim14 = round($puntajeTransformadoDim14, 1);

    ?>
    <div style="text-align: left;" class="contenido">
        <h3 style="width: 100%; text-align: center;">RESULTADOS DEL CUESTIONARIO INTRALABORAL FORMA A - <?php echo $nombredepartamento; ?></h3>
        <p>A continuación se presentan los resultados de los empleados a los cuales se les aplicó la forma A del Cuestionario Intralaboral, el extralaboral y el estrés.</p>
        <br>
        <p><strong>1. Tablas de los resultados del Cuestionario Intralaboral Forma A</strong></p>
        <p>En las siguientes tablas, 1 a la 4, se presenta las frecuencias absolutas de empleados en cada uno de los cinco niveles de riesgo para cada una de los cuatro dominios y sus respectivas dimensiones.</p><br>
        <p><strong>1.1. Dominio: Liderazgo y relaciones sociales en el trabajo</strong></p>
        <p><i>Tabla 1. Resultados del dominio Liderazgo y relaciones sociales en el trabajo y sus dimensiones</i></p>
        <br>
        <table style="width: 100%;" class="table_bordered">
            <tr>
                <th>Dominio</th>
                <th>Dimensiones</th>
                <th>Puntaje (T)</th>
                <th>Sin riesgo</th>
                <th>Riesgo bajo</th>
                <th>Riesgo medio</th>
                <th>Riesgo alto</th>
                <th>Riesgo muy alto</th>
            </tr>
            <tr>
                <td rowspan="4">Liderazgo y relaciones sociales en el trabajo</td>
                <td>Características del liderazgo</td>
                <td><?php echo $puntajeTransformadoDim11; ?></td>
                <td><?php echo $fadim11[0]; ?></td>
                <td><?php echo $fadim11[1]; ?></td> 
                <td><?php echo $fadim11[2]; ?></td>
                <td><?php echo $fadim11[3]; ?></td>
                <td><?php echo $fadim11[4]; ?></td>
            </tr>
            <tr>
                <td>Relaciones sociales en el trabajo</td>
                <td><?php echo $puntajeTransformadoDim12; ?></td>
                <td><?php echo $fadim12[0]; ?></td>
                <td><?php echo $fadim12[1]; ?></td> 
                <td><?php echo $fadim12[2]; ?></td>
                <td><?php echo $fadim12[3]; ?></td>
                <td><?php echo $fadim12[4]; ?></td>
            </tr>
            <tr>
                <td>Retroalimentación del desempeño</td>
                <td><?php echo $puntajeTransformadoDim13; ?></td>
                <td><?php echo $fadim13[0]; ?></td>
                <td><?php echo $fadim13[1]; ?></td> 
                <td><?php echo $fadim13[2]; ?></td>
                <td><?php echo $fadim13[3]; ?></td>
                <td><?php echo $fadim13[4]; ?></td>
            </tr>
            <tr>
                <td>Relación con los colaboradores</td>
                <td><?php echo $puntajeTransformadoDim14; ?></td>
                <td><?php echo $fadim14[0]; ?></td>
                <td><?php echo $fadim14[1]; ?></td> 
                <td><?php echo $fadim14[2]; ?></td>
                <td><?php echo $fadim14[3]; ?></td>
                <td><?php echo $fadim14[4]; ?></td>
            </tr>
            <tr>
                <td colspan="2">Liderazgo y relaciones sociales en el trabajo</td>
                <td><?php echo $puntajeTransformadoDim1; ?></td>
                <td><?php echo $fadim1[0]; ?></td>
                <td><?php echo $fadim1[1]; ?></td> 
                <td><?php echo $fadim1[2]; ?></td>
                <td><?php echo $fadim1[3]; ?></td>
                <td><?php echo $fadim1[4]; ?></td>
            </tr>
        </table>
    </div>
    <div class="salto"></div>
    <?php
        $dim2 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=6");
        $dim21 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=7");
        $dim22 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=8");
        $dim23 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=9");
        $dim24 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=10");
        $dim25 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=12");

        $arrayRiesgoDim2 = formarArrayRiesgo($dim2);
        $arrayRiesgoDim21 = formarArrayRiesgo($dim21);
        $arrayRiesgoDim22 = formarArrayRiesgo($dim22);
        $arrayRiesgoDim23 = formarArrayRiesgo($dim23);
        $arrayRiesgoDim24 = formarArrayRiesgo($dim24);
        $arrayRiesgoDim25 = formarArrayRiesgo($dim25);

      
        $puntajeBrutodim2 = $arrayRiesgoDim2[0];
        $numeroRespuestasDim2 = $arrayRiesgoDim2[1];
        $fadim2 = $arrayRiesgoDim2[2];

        $puntajeBrutodim21 = $arrayRiesgoDim21[0];
        $numeroRespuestasDim21 = $arrayRiesgoDim21[1];
        $fadim21 = $arrayRiesgoDim21[2];

        $puntajeBrutodim22 = $arrayRiesgoDim22[0];
        $numeroRespuestasDim22 = $arrayRiesgoDim22[1];
        $fadim22 = $arrayRiesgoDim22[2];

        $puntajeBrutodim23 = $arrayRiesgoDim23[0];
        $numeroRespuestasDim23 = $arrayRiesgoDim23[1];
        $fadim23 = $arrayRiesgoDim23[2];

        $puntajeBrutodim24 = $arrayRiesgoDim24[0];
        $numeroRespuestasDim24 = $arrayRiesgoDim24[1];
        $fadim24 = $arrayRiesgoDim24[2];

        $puntajeBrutodim25 = $arrayRiesgoDim25[0];
        $numeroRespuestasDim25 = $arrayRiesgoDim25[1];
        $fadim25 = $arrayRiesgoDim25[2];


        $normadim2 = $con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 6");
        $factorTransform = mysqli_fetch_array($normadim2)[0];
        $puntajeTransformadoDim2 = ($puntajeBrutodim2 / $numeroRespuestasDim2) / $factorTransform * 100;
        $puntajeTransformadoDim2 = round($puntajeTransformadoDim2, 1);

        $normadim21 = $con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 7");
        $factorTransform = mysqli_fetch_array($normadim21)[0];
        $puntajeTransformadoDim21 = ($puntajeBrutodim21 / $numeroRespuestasDim21) / $factorTransform * 100;
        $puntajeTransformadoDim21 = round($puntajeTransformadoDim21, 1);

        $normadim22 = $con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 8");
        $factorTransform = mysqli_fetch_array($normadim22)[0];
        $puntajeTransformadoDim22 = ($puntajeBrutodim22 / $numeroRespuestasDim22) / $factorTransform * 100;
        $puntajeTransformadoDim22 = round($puntajeTransformadoDim22, 1);

        $normadim23 = $con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 9");
        $factorTransform = mysqli_fetch_array($normadim23)[0];
        $puntajeTransformadoDim23 = ($puntajeBrutodim23 / $numeroRespuestasDim23) / $factorTransform * 100;
        $puntajeTransformadoDim23 = round($puntajeTransformadoDim23, 1);

        $normadim24 = $con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 10");
        $factorTransform = mysqli_fetch_array($normadim24)[0];
        $puntajeTransformadoDim24 = ($puntajeBrutodim24 / $numeroRespuestasDim24) / $factorTransform * 100;
        $puntajeTransformadoDim24 = round($puntajeTransformadoDim24, 1);

        $normadim25 = $con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 12");
        $factorTransform = mysqli_fetch_array($normadim25)[0];
        $puntajeTransformadoDim25 = ($puntajeBrutodim25 / $numeroRespuestasDim25) / $factorTransform * 100;
        $puntajeTransformadoDim25 = round($puntajeTransformadoDim25, 1);
    ?>
    <div style="text-align: left;" class="contenido">
        <p><strong>1.2. Dominio: Control sobre el trabajo</strong></p>
        <p><i>Tabla 2. Resultados del dominio Control sobre el trabajo y sus dimensiones</i></p>
        <br>
        <table style="width: 100%;" class="table_bordered">
            <tr>
                <th>Dominio</th>
                <th>Dimensiones</th>
                <th>Puntaje (T)</th>
                <th>Sin riesgo</th>
                <th>Riesgo bajo</th>
                <th>Riesgo medio</th>
                <th>Riesgo alto</th>
                <th>Riesgo muy alto</th>
            </tr>
            <tr>
                <td rowspan="5">Control sobre el trabajo</td>
                <td>Claridad de rol</td>
                <td><?php echo $puntajeTransformadoDim21; ?></td>
                <td><?php echo $fadim21[0]; ?></td>
                <td><?php echo $fadim21[1]; ?></td>
                <td><?php echo $fadim21[2]; ?></td>   
                <td><?php echo $fadim21[3]; ?></td>
                <td><?php echo $fadim21[4]; ?></td>
            </tr>
            <tr>
                <td>Capacitación</td>
                <td><?php echo $puntajeTransformadoDim22; ?></td>
                <td><?php echo $fadim22[0]; ?></td>
                <td><?php echo $fadim22[1]; ?></td>
                <td><?php echo $fadim22[2]; ?></td>
                <td><?php echo $fadim22[3]; ?></td>
                <td><?php echo $fadim22[4]; ?></td>
            </tr>
            <tr>
                <td>Participación y manejo del cambio</td>
                <td><?php echo $puntajeTransformadoDim23; ?></td>
                <td><?php echo $fadim23[0]; ?></td>
                <td><?php echo $fadim23[1]; ?></td>
                <td><?php echo $fadim23[2]; ?></td>
                <td><?php echo $fadim23[3]; ?></td>
                <td><?php echo $fadim23[4]; ?></td>
            </tr>
            <tr>
                <td>Oportunidades para el uso y desarrollo de habilidades y conocimientos</td>
                <td><?php echo $puntajeTransformadoDim24; ?></td>
                <td><?php echo $fadim24[0]; ?></td>
                <td><?php echo $fadim24[1]; ?></td>   
                <td><?php echo $fadim24[2]; ?></td>
                <td><?php echo $fadim24[3]; ?></td>
                <td><?php echo $fadim24[4]; ?></td>
            </tr>
            <tr>
                <td>Control y autonomía sobre el trabajo</td>
                <td><?php echo $puntajeTransformadoDim25; ?></td>
                <td><?php echo $fadim25[0]; ?></td>
                <td><?php echo $fadim25[1]; ?></td>
                <td><?php echo $fadim25[2]; ?></td>
                <td><?php echo $fadim25[3]; ?></td>
                <td><?php echo $fadim25[4]; ?></td>
            </tr>
            <tr>
                <td colspan="2">Control sobre el trabajo</td>
                <td><?php echo $puntajeTransformadoDim2; ?></td>
                <td><?php echo $fadim2[0]; ?></td>
                <td><?php echo $fadim2[1]; ?></td>
                <td><?php echo $fadim2[2]; ?></td>
                <td><?php echo $fadim2[3]; ?></td>
                <td><?php echo $fadim2[4]; ?></td>
            </tr>
        </table>
    </div>
    <div class="salto"></div>
    <?php
        $dim3 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=13");
        $dim31 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=14");
        $dim32 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=15");
        $dim33 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=16");
        $dim34 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=17");
        $dim35 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=18");
        $dim36 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=19");
        $dim37 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=20");
        $dim38 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=21");

        $arrayRiesgoDim3 = formarArrayRiesgo($dim3);
        $arrayRiesgoDim31 = formarArrayRiesgo($dim31);
        $arrayRiesgoDim32 = formarArrayRiesgo($dim32);
        $arrayRiesgoDim33 = formarArrayRiesgo($dim33);
        $arrayRiesgoDim34 = formarArrayRiesgo($dim34);
        $arrayRiesgoDim35 = formarArrayRiesgo($dim35);
        $arrayRiesgoDim36 = formarArrayRiesgo($dim36);
        $arrayRiesgoDim37 = formarArrayRiesgo($dim37);
        $arrayRiesgoDim38 = formarArrayRiesgo($dim38);

        $puntajeBrutodim3 = $arrayRiesgoDim3[0];
        $numeroRespuestasDim3 = $arrayRiesgoDim3[1];
        $fadim3 = $arrayRiesgoDim3[2];

        $puntajeBrutodim31 = $arrayRiesgoDim31[0];
        $numeroRespuestasDim31 = $arrayRiesgoDim31[1];
        $fadim31 = $arrayRiesgoDim31[2];

        $puntajeBrutodim32 = $arrayRiesgoDim32[0];
        $numeroRespuestasDim32 = $arrayRiesgoDim32[1];
        $fadim32 = $arrayRiesgoDim32[2];

        $puntajeBrutodim33 = $arrayRiesgoDim33[0];
        $numeroRespuestasDim33 = $arrayRiesgoDim33[1];
        $fadim33 = $arrayRiesgoDim33[2];

        $puntajeBrutodim34 = $arrayRiesgoDim34[0];
        $numeroRespuestasDim34 = $arrayRiesgoDim34[1];
        $fadim34 = $arrayRiesgoDim34[2];

        $puntajeBrutodim35 = $arrayRiesgoDim35[0];
        $numeroRespuestasDim35 = $arrayRiesgoDim35[1];
        $fadim35 = $arrayRiesgoDim35[2];

        $puntajeBrutodim36 = $arrayRiesgoDim36[0];
        $numeroRespuestasDim36 = $arrayRiesgoDim36[1];
        $fadim36 = $arrayRiesgoDim36[2];

        $puntajeBrutodim37 = $arrayRiesgoDim37[0];
        $numeroRespuestasDim37 = $arrayRiesgoDim37[1];
        $fadim37 = $arrayRiesgoDim37[2];

        $puntajeBrutodim38 = $arrayRiesgoDim38[0];
        $numeroRespuestasDim38 = $arrayRiesgoDim38[1];
        $fadim38 = $arrayRiesgoDim38[2];

        $normadim3 = $con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 13");
        $factorTransform = mysqli_fetch_array($normadim3)[0];
        $puntajeTransformadoDim3 = ($puntajeBrutodim3 / $numeroRespuestasDim3) / $factorTransform * 100;
        $puntajeTransformadoDim3 = round($puntajeTransformadoDim3, 1);

        $normadim31 = $con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 14");
        $factorTransform = mysqli_fetch_array($normadim31)[0];
        $puntajeTransformadoDim31 = ($puntajeBrutodim31 / $numeroRespuestasDim31) / $factorTransform * 100;
        $puntajeTransformadoDim31 = round($puntajeTransformadoDim31, 1);

        $normadim32 = $con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 15");
        $factorTransform = mysqli_fetch_array($normadim32)[0];
        $puntajeTransformadoDim32 = ($puntajeBrutodim32 / $numeroRespuestasDim32) / $factorTransform * 100;
        $puntajeTransformadoDim32 = round($puntajeTransformadoDim32, 1);

        $normadim33 = $con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 16");
        $factorTransform = mysqli_fetch_array($normadim33)[0];
        $puntajeTransformadoDim33 = ($puntajeBrutodim33 / $numeroRespuestasDim33) / $factorTransform * 100;
        $puntajeTransformadoDim33 = round($puntajeTransformadoDim33, 1);

        $normadim34 = $con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 17");
        $factorTransform = mysqli_fetch_array($normadim34)[0];
        $puntajeTransformadoDim34 = ($puntajeBrutodim34 / $numeroRespuestasDim34) / $factorTransform * 100;
        $puntajeTransformadoDim34 = round($puntajeTransformadoDim34, 1);

        $normadim35 = $con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 18");
        $factorTransform = mysqli_fetch_array($normadim35)[0];
        $puntajeTransformadoDim35 = ($puntajeBrutodim35 / $numeroRespuestasDim35) / $factorTransform * 100;
        $puntajeTransformadoDim35 = round($puntajeTransformadoDim35, 1);

        $normadim36 = $con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 19");
        $factorTransform = mysqli_fetch_array($normadim36)[0];
        $puntajeTransformadoDim36 = ($puntajeBrutodim36 / $numeroRespuestasDim36) / $factorTransform * 100;
        $puntajeTransformadoDim36 = round($puntajeTransformadoDim36, 1);

        $normadim37 = $con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 20");
        $factorTransform = mysqli_fetch_array($normadim37)[0];
        $puntajeTransformadoDim37 = ($puntajeBrutodim37 / $numeroRespuestasDim37) / $factorTransform * 100;
        $puntajeTransformadoDim37 = round($puntajeTransformadoDim37, 1);

        $normadim38 = $con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 21");
        $factorTransform = mysqli_fetch_array($normadim38)[0];
        $puntajeTransformadoDim38 = ($puntajeBrutodim38 / $numeroRespuestasDim38) / $factorTransform * 100;
        $puntajeTransformadoDim38 = round($puntajeTransformadoDim38, 1);

        
    ?>  
    <div style="text-align: left;" class="contenido">
        <p><strong>1.3. Dominio: Demandas del trabajo</strong></p>
        <p><i>Tabla 3. Resultados del dominio Demandas del trabajo y sus dimensiones</i></p>
        <br>
        <table style="width: 100%;" class="table_bordered">
            <tr>
                <th>Dominio</th>
                <th>Dimensiones</th>
                <th>Puntaje (T)</th>
                <th>Sin riesgo</th>
                <th>Riesgo bajo</th>
                <th>Riesgo medio</th>
                <th>Riesgo alto</th>
                <th>Riesgo muy alto</th>
            </tr>
            <tr>
                <td rowspan="8">Demandas del trabajo</td>
                <td>Demandas ambientales y de esfuerzo físico</td>
                <td><?php echo $puntajeTransformadoDim31; ?></td>
                <td><?php echo $fadim31[0]; ?></td>
                <td><?php echo $fadim31[1]; ?></td>
                <td><?php echo $fadim31[2]; ?></td>   
                <td><?php echo $fadim31[3]; ?></td>
                <td><?php echo $fadim31[4]; ?></td>
            </tr>
            <tr>
                <td>Demandas emocionales</td>
                <td><?php echo $puntajeTransformadoDim32; ?></td>
                <td><?php echo $fadim32[0]; ?></td>
                <td><?php echo $fadim32[1]; ?></td>   
                <td><?php echo $fadim32[2]; ?></td>
                <td><?php echo $fadim32[3]; ?></td>
                <td><?php echo $fadim32[4]; ?></td>
            </tr>
            <tr>
                <td>Demandas cuantitativas</td>
                <td><?php echo $puntajeTransformadoDim33; ?></td>
                <td><?php echo $fadim33[0]; ?></td>
                <td><?php echo $fadim33[1]; ?></td>   
                <td><?php echo $fadim33[2]; ?></td>
                <td><?php echo $fadim33[3]; ?></td>
                <td><?php echo $fadim33[4]; ?></td>
            </tr>
            <tr>
                <td>Influencia del trabajo sobre el entorno extralaboral</td>
                <td><?php echo $puntajeTransformadoDim34; ?></td>
                <td><?php echo $fadim34[0]; ?></td>
                <td><?php echo $fadim34[1]; ?></td>   
                <td><?php echo $fadim34[2]; ?></td>
                <td><?php echo $fadim34[3]; ?></td>
                <td><?php echo $fadim34[4]; ?></td>
            </tr>
            <tr>
                <td>Exigencias de responsabilidad del cargo </td>
                <td><?php echo $puntajeTransformadoDim35; ?></td>
                <td><?php echo $fadim35[0]; ?></td>
                <td><?php echo $fadim35[1]; ?></td>   
                <td><?php echo $fadim35[2]; ?></td>
                <td><?php echo $fadim35[3]; ?></td>
                <td><?php echo $fadim35[4]; ?></td>
            </tr>
            <tr>
                <td>Demandas de carga mental</td>
                <td><?php echo $puntajeTransformadoDim36; ?></td>
                <td><?php echo $fadim36[0]; ?></td>
                <td><?php echo $fadim36[1]; ?></td>   
                <td><?php echo $fadim36[2]; ?></td>
                <td><?php echo $fadim36[3]; ?></td>
                <td><?php echo $fadim36[4]; ?></td>
            </tr>
            <tr>
                <td>Consistencia del rol</td>
                <td><?php echo $puntajeTransformadoDim37; ?></td>
                <td><?php echo $fadim37[0]; ?></td>
                <td><?php echo $fadim37[1]; ?></td>   
                <td><?php echo $fadim37[2]; ?></td>
                <td><?php echo $fadim37[3]; ?></td>
                <td><?php echo $fadim37[4]; ?></td>
            </tr>
            <tr>
                <td>Demandas de la jornada de trabajo</td>
                <td><?php echo $puntajeTransformadoDim38; ?></td>
                <td><?php echo $fadim38[0]; ?></td>
                <td><?php echo $fadim38[1]; ?></td>   
                <td><?php echo $fadim38[2]; ?></td>     
                <td><?php echo $fadim38[3]; ?></td>
                <td><?php echo $fadim38[4]; ?></td>
            </tr>
            <tr>
                <td colspan="2">Demandas del trabajo</td>
                <td><?php echo $puntajeTransformadoDim3; ?></td>
                <td><?php echo $fadim3[0]; ?></td>
                <td><?php echo $fadim3[1]; ?></td>   
                <td><?php echo $fadim3[2]; ?></td>
                <td><?php echo $fadim3[3]; ?></td>
                <td><?php echo $fadim3[4]; ?></td>
            </tr>
        </table>
    </div>
    <div class="salto"></div>
    <?php
        $dim4 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=22");
        $dim41 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=23");
        $dim42 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=24");
    
        $arrayRiesgoDim4 = formarArrayRiesgo($dim4);
        $arrayRiesgoDim41 = formarArrayRiesgo($dim41);
        $arrayRiesgoDim42 = formarArrayRiesgo($dim42);

        $puntajeBrutodim4 = $arrayRiesgoDim4[0];
        $numeroRespuestasDim4 = $arrayRiesgoDim4[1];
        $fadim4 = $arrayRiesgoDim4[2];  

        $puntajeBrutodim41 = $arrayRiesgoDim41[0];
        $numeroRespuestasDim41 = $arrayRiesgoDim41[1];
        $fadim41 = $arrayRiesgoDim41[2];

        $puntajeBrutodim42 = $arrayRiesgoDim42[0];
        $numeroRespuestasDim42 = $arrayRiesgoDim42[1];
        $fadim42 = $arrayRiesgoDim42[2];

        $normadim4 = $con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 22");
        $factorTransform = mysqli_fetch_array($normadim4)[0];        
        $puntajeTransformadoDim4 = ($puntajeBrutodim4 / $numeroRespuestasDim4) / $factorTransform * 100;
        $puntajeTransformadoDim4 = round($puntajeTransformadoDim4, 1);

        $normadim41 = $con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 23");
        $factorTransform = mysqli_fetch_array($normadim41)[0];
        $puntajeTransformadoDim41 = ($puntajeBrutodim41 / $numeroRespuestasDim41) / $factorTransform * 100;
        $puntajeTransformadoDim41 = round($puntajeTransformadoDim41, 1);

        $normadim42 = $con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 24");
        $factorTransform = mysqli_fetch_array($normadim42)[0];
        $puntajeTransformadoDim42 = ($puntajeBrutodim42 / $numeroRespuestasDim42) / $factorTransform * 100;
        $puntajeTransformadoDim42 = round($puntajeTransformadoDim42, 1);
    ?>
    <div style="text-align: left;" class="contenido">
        <p><strong>1.4. Dominio: Recompensas</strong></p>
        <p><i>Tabla 4. Resultados del dominio Recompensas y sus dimensiones</i></p>
        <br>
        <table style="width: 100%;" class="table_bordered">
            <tr>
                <th>Dominio</th>
                <th>Dimensiones</th>
                <th>Puntaje (T)</th>
                <th>Sin riesgo</th>
                <th>Riesgo bajo</th>
                <th>Riesgo medio</th>
                <th>Riesgo alto</th>    
                <th>Riesgo muy alto</th>
            </tr>
            <tr>
                <td rowspan="2">Recompensas</td>
                <td>Recompensas derivadas de la pertenencia a la organización y del trabajo que se realiza</td>
                <td><?php echo $puntajeTransformadoDim41; ?></td>
                <td><?php echo $fadim41[0]; ?></td>
                <td><?php echo $fadim41[1]; ?></td>
                <td><?php echo $fadim41[2]; ?></td>
                <td><?php echo $fadim41[3]; ?></td>
                <td><?php echo $fadim41[4]; ?></td>
            </tr>
            <tr>
                <td>Reconocimiento y compensación</td>
                <td><?php echo $puntajeTransformadoDim42; ?></td>
                <td><?php echo $fadim42[0]; ?></td>
                <td><?php echo $fadim42[1]; ?></td>
                <td><?php echo $fadim42[2]; ?></td>
                <td><?php echo $fadim42[3]; ?></td>
                <td><?php echo $fadim42[4]; ?></td>
            </tr>
            <tr>
                <td colspan="2">Recompensas</td>
                <td><?php echo $puntajeTransformadoDim4; ?></td>
                <td><?php echo $fadim4[0]; ?></td>
                <td><?php echo $fadim4[1]; ?></td>   
                <td><?php echo $fadim4[2]; ?></td>
                <td><?php echo $fadim4[3]; ?></td>
                <td><?php echo $fadim4[4]; ?></td>
            </tr>
        </table>
    </div>
    <?php
        $total_intra_a = $puntajeBrutodim1 + $puntajeBrutodim2 + $puntajeBrutodim3 + $puntajeBrutodim4;
        $total_bruto_intra_a = $total_intra_a / $numeroRespuestasDim42;
       
        $total_transformado_intra_a = ($total_bruto_intra_a / 492) * 100;
        $total_transformado_intra_a = round($total_transformado_intra_a, 1);

        if($total_transformado_intra_a >= 0.0 && $total_transformado_intra_a <= 19.7){
            $riesgo_total_intra_a = "Sin riesgo";
        }elseif($total_transformado_intra_a >= 19.8 && $total_transformado_intra_a <= 25.8){
            $riesgo_total_intra_a = "Riesgo bajo";
        }elseif($total_transformado_intra_a >= 25.9 && $total_transformado_intra_a <= 31.5){
            $riesgo_total_intra_a = "Riesgo medio";
        }elseif($total_transformado_intra_a >= 31.6 && $total_transformado_intra_a <= 38){
            $riesgo_total_intra_a = "Riesgo alto";
        }elseif($total_transformado_intra_a >= 38.1){
            $riesgo_total_intra_a = "Riesgo muy alto";
        }

        if($total_transformado_intra_a <= 31.5){
            $tiempo_intra_a = "2 años";
        }else{
            $tiempo_intra_a = "1 año";
        }

        $fadimTotalA = array(0,0,0,0,0);

        $totalA = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=55");
        $arrayRiesgoTotalA = formarArrayRiesgo($totalA);
        $fadimTotalA = $arrayRiesgoTotalA[2];        
    ?>
    <div class="salto"></div>
    <script>
        var options = {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right'
                },
                datalabels: {
                    formatter: function(value, context) {
                        let porcentaje = (value / total * 100).toFixed(1);
                        return porcentaje + '%';
                    },
                    color: '#000',
                    font: {
                        weight: 'bold',
                        size: 12
                    }
                }
            }
        };
    </script>
    <div style="text-align: left;" class="contenido">
        <p><strong>1.5. Resultado general del Cuestionario Intralaboral Forma A por niveles de riesgo</strong></p>
        <p><i>Figura 1. Niveles de riesgo en el Cuestionario Intralaboral Forma A - <?php echo $nombreempresa; ?> - <?php echo $nombredepartamento; ?></i></p>
        <br>
        <div style="margin-bottom: 0px; margin-top: 0px; " class="chart-container">
            <canvas id="chart_intra_a"></canvas>
        </div>
        <p style="margin-top: 0px; margin-bottom: 0px;">En el Cuestionario Intralaboral A, con su puntaje transformado de <strong><?php echo $total_transformado_intra_a; ?></strong>, presenta un nivel de <strong><?php echo $riesgo_total_intra_a; ?></strong>, lo cual nos indica de acuerdo con el Artículo 3, de la Resolución 2764 del 18 de julio de 2022, que la siguiente evaluación del riesgo psicosocial debe realizarse dentro de <strong><?php echo $tiempo_intra_a; ?></strong>.</p>
        <script>
            const ctx = document.getElementById('chart_intra_a').getContext('2d');

            const datos = [<?php echo $fadimTotalA[0]; ?>, <?php echo $fadimTotalA[1]; ?>, <?php echo $fadimTotalA[2]; ?>, <?php echo $fadimTotalA[3]; ?>, <?php echo $fadimTotalA[4]; ?>];
            const total = datos.reduce((a, b) => a + b, 0);

            const graficoDona = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: datos,
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels]
            });
        </script>
    </div>
    <div class="salto"></div>
    <div style="text-align: left;" class="contenido">
        <p><strong>2. Figuras de los resultados del Cuestionario Intralaboral Forma A</strong></p>
        <p>En las siguientes figuras, 2 a la 23, se presentan las frecuencias absolutas de empleados en cada uno de los cinco niveles de riesgo para cada una de los cuatro dominios y sus respectivas dimensiones</p>
        <br>
        <p><strong>2.1. Dominio: Liderazgo y relaciones sociales en el trabajo y sus dimensiones</strong></p>
        <i>Figura 2. Niveles de riesgo del dominio: Liderazgo y relaciones sociales en el trabajo</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_1"></canvas>
        </div>
        <script>
            const graficoDim1 = new Chart(document.getElementById('chart_dim_1').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $fadim1[0]; ?>, <?php echo $fadim1[1]; ?>, <?php echo $fadim1[2]; ?>, <?php echo $fadim1[3]; ?>, <?php echo $fadim1[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: {
                    responsive: false,
                    plugins: {
                        legend: {
                            position: 'right',
                            display: true
                        },
                        datalabels: {
                            formatter: function(value, context) {
                                let porcentaje = (value / <?php echo $numeroRespuestasDim1; ?> * 100).toFixed(1);
                                return porcentaje + '%';
                            },
                            color: '#000',
                            font: {
                                weight: 'bold',
                                size: 12
                            }
                        }
                    },
                },
                plugins: [ChartDataLabels] 
            });

        </script>
    </div>
    <div class="salto"></div>
    <div style="text-align: left;" class="contenido">
        <p><strong>2.1.1. Dimension: Características del liderazgo</strong></p>
        <i>Figura 3. Niveles de riesgo de la dimensión: Características del liderazgo</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_11"></canvas>
        </div>
        <script>
            const graficoDim11 = new Chart(document.getElementById('chart_dim_11').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $fadim11[0]; ?>, <?php echo $fadim11[1]; ?>, <?php echo $fadim11[2]; ?>, <?php echo $fadim11[3]; ?>, <?php echo $fadim11[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
        <p><strong>2.1.2. Dimension: Relaciones sociales en el trabajo</strong></p>
        <i>Figura 4. Niveles de riesgo de la dimensión: Relaciones sociales en el trabajo</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_12"></canvas>
        </div>
        <script>
            const graficoDim12 = new Chart(document.getElementById('chart_dim_12').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $fadim12[0]; ?>, <?php echo $fadim12[1]; ?>, <?php echo $fadim12[2]; ?>, <?php echo $fadim12[3]; ?>, <?php echo $fadim12[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo    
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
    </div>
    <div class="salto"></div>
    <div style="text-align: left;" class="contenido">
        <p><strong>2.1.3. Dimension: Retroalimentación del desempeño</strong></p>
        <i>Figura 5. Niveles de riesgo de la dimensión: Retroalimentación del desempeño</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_13"></canvas>
        </div>
        <script>
            const graficoDim13 = new Chart(document.getElementById('chart_dim_13').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $fadim13[0]; ?>, <?php echo $fadim13[1]; ?>, <?php echo $fadim13[2]; ?>, <?php echo $fadim13[3]; ?>, <?php echo $fadim13[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
        <p><strong>2.1.4. Dimension: Relación con los colaboradores</strong></p>
        <i>Figura 6. Niveles de riesgo de la dimensión: Relación con los colaboradores</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_14"></canvas>
        </div>
        <script>
            const graficoDim14 = new Chart(document.getElementById('chart_dim_14').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $fadim14[0]; ?>, <?php echo $fadim14[1]; ?>, <?php echo $fadim14[2]; ?>, <?php echo $fadim14[3]; ?>, <?php echo $fadim14[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
    </div>
    <div class="salto"></div>
    <div style="text-align: left;" class="contenido">
        <p><strong>2.2. Dominio: Control sobre el trabajo y sus dimensiones</strong></p>
        <i>Figura 7. Niveles de riesgo del dominio: Control sobre el trabajo</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_2"></canvas>
        </div>
        <script>
            const graficoDim2 = new Chart(document.getElementById('chart_dim_2').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $fadim2[0]; ?>, <?php echo $fadim2[1]; ?>, <?php echo $fadim2[2]; ?>, <?php echo $fadim2[3]; ?>, <?php echo $fadim2[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
        <p><strong>2.2.1. Dimension: Claridad de rol </strong></p>
        <i>Figura 8. Niveles de riesgo de la dimensión: Claridad de rol</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_21"></canvas>
        </div>
        <script>
            const graficoDim21 = new Chart(document.getElementById('chart_dim_21').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $fadim21[0]; ?>, <?php echo $fadim21[1]; ?>, <?php echo $fadim21[2]; ?>, <?php echo $fadim21[3]; ?>, <?php echo $fadim21[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo    
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
    </div>
    <div class="salto"></div>
    <div style="text-align: left;" class="contenido">
        <p><strong>2.2.2. Dimension: Capacitación</strong></p>
        <i>Figura 9. Niveles de riesgo de la dimensión: Capacitación</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_22"></canvas>
        </div>
        <script>
            const graficoDim22 = new Chart(document.getElementById('chart_dim_22').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $fadim22[0]; ?>, <?php echo $fadim22[1]; ?>, <?php echo $fadim22[2]; ?>, <?php echo $fadim22[3]; ?>, <?php echo $fadim22[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
        <p><strong>2.2.3. Dimension: Participación y manejo del cambio</strong></p>
        <i>Figura 10. Niveles de riesgo de la dimensión: Participación y manejo del cambio</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_23"></canvas>
        </div>
        <script>
            const graficoDim23 = new Chart(document.getElementById('chart_dim_23').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $fadim23[0]; ?>, <?php echo $fadim23[1]; ?>, <?php echo $fadim23[2]; ?>, <?php echo $fadim23[3]; ?>, <?php echo $fadim23[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
    </div>
    <div class="salto"></div>
    <div style="text-align: left;" class="contenido">
        <p><strong>2.2.4. Dimension: Oportunidades para el uso y desarrollo de habilidades y conocimientos</strong></p>
        <i>Figura 11. Niveles de riesgo de la dimensión: Oportunidades para el uso y desarrollo de habilidades y conocimientos</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_24"></canvas>
        </div>
        <script>
            const graficoDim24 = new Chart(document.getElementById('chart_dim_24').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $fadim24[0]; ?>, <?php echo $fadim24[1]; ?>, <?php echo $fadim24[2]; ?>, <?php echo $fadim24[3]; ?>, <?php echo $fadim24[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
        <p><strong>2.2.5. Dimension: Control y autonomía sobre el trabajo</strong></p>
        <i>Figura 12. Niveles de riesgo de la dimensión: Control y autonomía sobre el trabajo</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_25"></canvas>
        </div>
        <script>
            const graficoDim25 = new Chart(document.getElementById('chart_dim_25').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $fadim25[0]; ?>, <?php echo $fadim25[1]; ?>, <?php echo $fadim25[2]; ?>, <?php echo $fadim25[3]; ?>, <?php echo $fadim25[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
    </div>
    <div class="salto"></div>
    <div style="text-align: left;" class="contenido">
        <p><strong>2.3. Dominio: Demandas del trabajo y sus dimensiones</strong></p>
        <i>Figura 13. Niveles de riesgo del dominio: Demandas del trabajo</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_3"></canvas>
        </div>
        <script>
            const graficoDim3 = new Chart(document.getElementById('chart_dim_3').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],    
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $fadim3[0]; ?>, <?php echo $fadim3[1]; ?>, <?php echo $fadim3[2]; ?>, <?php echo $fadim3[3]; ?>, <?php echo $fadim3[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels]  
            });
        </script>
        <p><strong>2.3.1. Dimension: Demandas ambientales y de esfuerzo físico</strong></p>
        <i>Figura 14. Niveles de riesgo de la dimensión: Demandas ambientales y de esfuerzo físico</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_31"></canvas>
        </div>
        <script>
            const graficoDim31 = new Chart(document.getElementById('chart_dim_31').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $fadim31[0]; ?>, <?php echo $fadim31[1]; ?>, <?php echo $fadim31[2]; ?>, <?php echo $fadim31[3]; ?>, <?php echo $fadim31[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
    </div>
    <div class="salto"></div>
    <div style="text-align: left;" class="contenido">
        <p><strong>2.3.2. Dimension: Demandas emocionales</strong></p>
        <i>Figura 15. Niveles de riesgo de la dimensión: Demandas emocionales</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_32"></canvas>
        </div>
        <script>
            const graficoDim32 = new Chart(document.getElementById('chart_dim_32').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $fadim32[0]; ?>, <?php echo $fadim32[1]; ?>, <?php echo $fadim32[2]; ?>, <?php echo $fadim32[3]; ?>, <?php echo $fadim32[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
         <p><strong>2.3.3. Dimension: Demandas cuantitativas</strong></p>
        <i>Figura 16. Niveles de riesgo de la dimensión: Demandas cuantitativas</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_33"></canvas>
        </div>
        <script>
            const graficoDim33 = new Chart(document.getElementById('chart_dim_33').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $fadim33[0]; ?>, <?php echo $fadim33[1]; ?>, <?php echo $fadim33[2]; ?>, <?php echo $fadim33[3]; ?>, <?php echo $fadim33[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
    </div>
    <div class="salto"></div>
    <div style="text-align: left;" class="contenido">
        <p><strong>2.3.4. Dimension: Influencia del trabajo sobre el entorno extralaboral</strong></p>
        <i>Figura 17. Niveles de riesgo de la dimensión: Influencia del trabajo sobre el entorno extralaboral</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_34"></canvas>
        </div>
        <script>
            const graficoDim34 = new Chart(document.getElementById('chart_dim_34').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],        
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $fadim34[0]; ?>, <?php echo $fadim34[1]; ?>, <?php echo $fadim34[2]; ?>, <?php echo $fadim34[3]; ?>, <?php echo $fadim34[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
        <p><strong>2.3.5. Dimension: Exigencias de responsabilidad del cargo</strong></p>
        <i>Figura 18. Niveles de riesgo de la dimensión: Exigencias de responsabilidad del cargo</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_35"></canvas>
        </div>
        <script>
            const graficoDim35 = new Chart(document.getElementById('chart_dim_35').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $fadim35[0]; ?>, <?php echo $fadim35[1]; ?>, <?php echo $fadim35[2]; ?>, <?php echo $fadim35[3]; ?>, <?php echo $fadim35[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
    </div>
    <div class="salto"></div>
    <div style="text-align: left;" class="contenido">
        <p><strong>2.3.6. Dimension: Demandas de carga mental</strong></p>
        <i>Figura 19. Niveles de riesgo de la dimensión: Demandas de carga mental</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_36"></canvas>
        </div>
        <script>
            const graficoDim36 = new Chart(document.getElementById('chart_dim_36').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $fadim36[0]; ?>, <?php echo $fadim36[1]; ?>, <?php echo $fadim36[2]; ?>, <?php echo $fadim36[3]; ?>, <?php echo $fadim36[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
        <p><strong>2.3.7. Dimension: Consistencia del rol</strong></p>
        <i>Figura 20. Niveles de riesgo de la dimensión: Consistencia del rol</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_37"></canvas>
        </div>
        <script>
            const graficoDim37 = new Chart(document.getElementById('chart_dim_37').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $fadim37[0]; ?>, <?php echo $fadim37[1]; ?>, <?php echo $fadim37[2]; ?>, <?php echo $fadim37[3]; ?>, <?php echo $fadim37[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo    
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
    </div>
    <div class="salto"></div>
    <div style="text-align: left;" class="contenido">
        <p><strong>2.3.8. Dimension: Demandas de la jornada de trabajo</strong></p>
        <i>Figura 21. Niveles de riesgo de la dimensión: Demandas de la jornada de trabajo</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_38"></canvas>
        </div>
        <script>
            const graficoDim38 = new Chart(document.getElementById('chart_dim_38').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $fadim38[0]; ?>, <?php echo $fadim38[1]; ?>, <?php echo $fadim38[2]; ?>, <?php echo $fadim38[3]; ?>, <?php echo $fadim38[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
        <br>
        <p><strong>2.4. Dominio: Recompensas y sus dimensiones</strong></p>
        <i>Figura 22. Niveles de riesgo del dominio: Recompensas</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_4"></canvas>
        </div>
        <script>
            const graficoDim4 = new Chart(document.getElementById('chart_dim_4').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $fadim4[0]; ?>, <?php echo $fadim4[1]; ?>, <?php echo $fadim4[2]; ?>, <?php echo $fadim4[3]; ?>, <?php echo $fadim4[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
    </div>
    <div class="salto"></div>
    <div style="text-align: left;" class="contenido">
        <p><strong>2.4.1. Dimension: Recompensas derivadas de la pertenencia a la organización y del trabajo que se realiza</strong></p>
        <i>Figura 22. Niveles de riesgo del dominio: Recompensas</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_41"></canvas>
        </div>
        <script>
            const graficoDim41 = new Chart(document.getElementById('chart_dim_41').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $fadim41[0]; ?>, <?php echo $fadim41[1]; ?>, <?php echo $fadim41[2]; ?>, <?php echo $fadim41[3]; ?>, <?php echo $fadim41[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            }); 
        </script>
        <p><strong>2.4.2. Dimension: Reconocimiento y compensación</strong></p>
        <i>Figura 23. Niveles de riesgo del dominio: Reconocimiento y compensación</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_42"></canvas>
        </div>
        <script>
            const graficoDim42 = new Chart(document.getElementById('chart_dim_42').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $fadim42[0]; ?>, <?php echo $fadim42[1]; ?>, <?php echo $fadim42[2]; ?>, <?php echo $fadim42[3]; ?>, <?php echo $fadim42[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
    </div> 
    <?php
        $empleados_intra_a = $con->query("SELECT idempleado FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 GROUP BY idempleado");
        
        $arrayRiesgoDim1Extra=[0,0,0,0,0];
        $puntajeBrutodim1Extra = 0;

        $arrayRiesgoDim2Extra=[0,0,0,0,0];
        $puntajeBrutodim2Extra = 0;

        $arrayRiesgoDim3Extra=[0,0,0,0,0];
        $puntajeBrutodim3Extra = 0;

        $arrayRiesgoDim4Extra=[0,0,0,0,0];
        $puntajeBrutodim4Extra = 0;

        $arrayRiesgoDim5Extra=[0,0,0,0,0];
        $puntajeBrutodim5Extra = 0;

        $arrayRiesgoDim6Extra=[0,0,0,0,0];
        $puntajeBrutodim6Extra = 0;

        $arrayRiesgoDim7Extra=[0,0,0,0,0];
        $puntajeBrutodim7Extra = 0;

        $arrayRiesgoDimTotalExtra=[0,0,0,0,0];
        $puntajeBrutodimTotalExtra = 0;

        while ($row = mysqli_fetch_array($empleados_intra_a)) { 
            $dim1Extra = $con->query("SELECT * from calificacion WHERE idempleado = $row[0] and tipo_examen = 3 and iddimension = 46");
            while ($row2 = mysqli_fetch_array($dim1Extra)) {
                $puntajeBrutodim1Extra  = $puntajeBrutodim1Extra + $row2[4];
                if ($row2[6]=="Sin riesgo") {
                    $arrayRiesgoDim1Extra[0] = $arrayRiesgoDim1Extra[0]+1;
               }else{
                   if ($row2[6]=="Bajo") {
                       $arrayRiesgoDim1Extra[1] = $arrayRiesgoDim1Extra[1]+1;
                   }else{
                       if ($row2[6]=="Medio") {
                           $arrayRiesgoDim1Extra[2] = $arrayRiesgoDim1Extra[2]+1;
                       }else{
                           if ($row2[6]=="Alto") {
                               $arrayRiesgoDim1Extra[3] = $arrayRiesgoDim1Extra[3]+1;
                           }else{
                               $arrayRiesgoDim1Extra[4] = $arrayRiesgoDim1Extra[4]+1;
                           }
                       }
                   }
               }  
            }

            $dim2Extra = $con->query("SELECT * from calificacion WHERE idempleado = $row[0] and tipo_examen = 3 and iddimension = 47");
            while ($row2 = mysqli_fetch_array($dim2Extra)) {
                $puntajeBrutodim2Extra  = $puntajeBrutodim2Extra + $row2[4];
                if ($row2[6]=="Sin riesgo") {
                    $arrayRiesgoDim2Extra[0] = $arrayRiesgoDim2Extra[0]+1;
               }else{
                   if ($row2[6]=="Bajo") {
                       $arrayRiesgoDim2Extra[1] = $arrayRiesgoDim2Extra[1]+1;
                   }else{
                       if ($row2[6]=="Medio") {
                           $arrayRiesgoDim2Extra[2] = $arrayRiesgoDim2Extra[2]+1;
                       }else{
                           if ($row2[6]=="Alto") {
                               $arrayRiesgoDim2Extra[3] = $arrayRiesgoDim2Extra[3]+1;
                           }else{
                               $arrayRiesgoDim2Extra[4] = $arrayRiesgoDim2Extra[4]+1;
                           }
                       }
                   }
               }  
            }

            $dim3Extra = $con->query("SELECT * from calificacion WHERE idempleado = $row[0] and tipo_examen = 3 and iddimension = 48");
            while ($row2 = mysqli_fetch_array($dim3Extra)) {
                $puntajeBrutodim3Extra  = $puntajeBrutodim3Extra + $row2[4];
                if ($row2[6]=="Sin riesgo") {
                    $arrayRiesgoDim3Extra[0] = $arrayRiesgoDim3Extra[0]+1;
               }else{
                   if ($row2[6]=="Bajo") {
                       $arrayRiesgoDim3Extra[1] = $arrayRiesgoDim3Extra[1]+1;
                   }else{
                       if ($row2[6]=="Medio") {
                           $arrayRiesgoDim3Extra[2] = $arrayRiesgoDim3Extra[2]+1;
                       }else{
                           if ($row2[6]=="Alto") {
                               $arrayRiesgoDim3Extra[3] = $arrayRiesgoDim3Extra[3]+1;
                           }else{
                               $arrayRiesgoDim3Extra[4] = $arrayRiesgoDim3Extra[4]+1;
                           }
                       }
                   }
               }  
            }

            $dim4Extra = $con->query("SELECT * from calificacion WHERE idempleado = $row[0] and tipo_examen = 3 and iddimension = 49");
            while ($row2 = mysqli_fetch_array($dim4Extra)) {
                $puntajeBrutodim4Extra  = $puntajeBrutodim4Extra + $row2[4];
                if ($row2[6]=="Sin riesgo") {
                    $arrayRiesgoDim4Extra[0] = $arrayRiesgoDim4Extra[0]+1;
               }else{
                   if ($row2[6]=="Bajo") {
                       $arrayRiesgoDim4Extra[1] = $arrayRiesgoDim4Extra[1]+1;
                   }else{
                       if ($row2[6]=="Medio") {
                           $arrayRiesgoDim4Extra[2] = $arrayRiesgoDim4Extra[2]+1;
                       }else{
                           if ($row2[6]=="Alto") {
                               $arrayRiesgoDim4Extra[3] = $arrayRiesgoDim4Extra[3]+1;
                           }else{
                               $arrayRiesgoDim4Extra[4] = $arrayRiesgoDim4Extra[4]+1;
                           }
                       }
                   }
               }  
            }

            $dim5Extra = $con->query("SELECT * from calificacion WHERE idempleado = $row[0] and tipo_examen = 3 and iddimension = 50");
            while ($row2 = mysqli_fetch_array($dim5Extra)) {
                $puntajeBrutodim5Extra  = $puntajeBrutodim5Extra + $row2[4];
                if ($row2[6]=="Sin riesgo") {
                    $arrayRiesgoDim5Extra[0] = $arrayRiesgoDim5Extra[0]+1;
               }else{
                   if ($row2[6]=="Bajo") {
                       $arrayRiesgoDim5Extra[1] = $arrayRiesgoDim5Extra[1]+1;
                   }else{
                       if ($row2[6]=="Medio") {
                           $arrayRiesgoDim5Extra[2] = $arrayRiesgoDim5Extra[2]+1;
                       }else{
                           if ($row2[6]=="Alto") {
                               $arrayRiesgoDim5Extra[3] = $arrayRiesgoDim5Extra[3]+1;
                           }else{
                               $arrayRiesgoDim5Extra[4] = $arrayRiesgoDim5Extra[4]+1;
                           }
                       }
                   }
               }  
            }

            $dim6Extra = $con->query("SELECT * from calificacion WHERE idempleado = $row[0] and tipo_examen = 3 and iddimension = 51");
            while ($row2 = mysqli_fetch_array($dim6Extra)) {
                $puntajeBrutodim6Extra  = $puntajeBrutodim6Extra + $row2[4];
                if ($row2[6]=="Sin riesgo") {
                    $arrayRiesgoDim6Extra[0] = $arrayRiesgoDim6Extra[0]+1;
               }else{
                   if ($row2[6]=="Bajo") {
                       $arrayRiesgoDim6Extra[1] = $arrayRiesgoDim6Extra[1]+1;
                   }else{
                       if ($row2[6]=="Medio") {
                           $arrayRiesgoDim6Extra[2] = $arrayRiesgoDim6Extra[2]+1;
                       }else{
                           if ($row2[6]=="Alto") {
                               $arrayRiesgoDim6Extra[3] = $arrayRiesgoDim6Extra[3]+1;
                           }else{
                               $arrayRiesgoDim6Extra[4] = $arrayRiesgoDim6Extra[4]+1;
                           }
                       }
                   }
               }  
            }

            $dim7Extra = $con->query("SELECT * from calificacion WHERE idempleado = $row[0] and tipo_examen = 3 and iddimension = 52"); 
            while ($row2 = mysqli_fetch_array($dim7Extra)) {
                $puntajeBrutodim7Extra  = $puntajeBrutodim7Extra + $row2[4];
                if ($row2[6]=="Sin riesgo") {
                    $arrayRiesgoDim7Extra[0] = $arrayRiesgoDim7Extra[0]+1;
               }else{
                   if ($row2[6]=="Bajo") {
                       $arrayRiesgoDim7Extra[1] = $arrayRiesgoDim7Extra[1]+1;
                   }else{
                       if ($row2[6]=="Medio") {
                           $arrayRiesgoDim7Extra[2] = $arrayRiesgoDim7Extra[2]+1;
                       }else{
                           if ($row2[6]=="Alto") {  
                               $arrayRiesgoDim7Extra[3] = $arrayRiesgoDim7Extra[3]+1;
                           }else{
                               $arrayRiesgoDim7Extra[4] = $arrayRiesgoDim7Extra[4]+1;
                           }
                       }
                   }
               }  
            }

            $dimTotalExtra = $con->query("SELECT * from calificacion WHERE idempleado = $row[0] and tipo_examen = 3 and iddimension = 53");
            while ($row2 = mysqli_fetch_array($dimTotalExtra)) {
                $puntajeBrutodimTotalExtra  = $puntajeBrutodimTotalExtra + $row2[4];
                if ($row2[6]=="Sin riesgo") {
                    $arrayRiesgoDimTotalExtra[0] = $arrayRiesgoDimTotalExtra[0]+1;
                }else{
                    if ($row2[6]=="Bajo") {
                        $arrayRiesgoDimTotalExtra[1] = $arrayRiesgoDimTotalExtra[1]+1;
                    }else{
                        if ($row2[6]=="Medio") {
                            $arrayRiesgoDimTotalExtra[2] = $arrayRiesgoDimTotalExtra[2]+1;
                        }else{
                            if ($row2[6]=="Alto") {
                                $arrayRiesgoDimTotalExtra[3] = $arrayRiesgoDimTotalExtra[3]+1;
                            }else{
                                $arrayRiesgoDimTotalExtra[4] = $arrayRiesgoDimTotalExtra[4]+1;
                            }
                        }
                    }
                }
            }
        }


        $factorTransformDim1Extra = mysqli_fetch_array($con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 46"))[0];
        $puntajeTransformadoDim1Extra = round(($puntajeBrutodim1Extra / $empleados_intra_a->num_rows) / $factorTransformDim1Extra * 100, 1);

        $factorTransformDim2Extra = mysqli_fetch_array($con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 47"))[0];
        $puntajeTransformadoDim2Extra = round(($puntajeBrutodim2Extra / $empleados_intra_a->num_rows) / $factorTransformDim2Extra * 100, 1);

        $factorTransformDim3Extra = mysqli_fetch_array($con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 48"))[0];
        $puntajeTransformadoDim3Extra = round(($puntajeBrutodim3Extra / $empleados_intra_a->num_rows) / $factorTransformDim3Extra * 100, 1);

        $factorTransformDim4Extra = mysqli_fetch_array($con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 49"))[0];
        $puntajeTransformadoDim4Extra = round(($puntajeBrutodim4Extra / $empleados_intra_a->num_rows) / $factorTransformDim4Extra * 100, 1);

        $factorTransformDim5Extra = mysqli_fetch_array($con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 50"))[0];
        $puntajeTransformadoDim5Extra = round(($puntajeBrutodim5Extra / $empleados_intra_a->num_rows) / $factorTransformDim5Extra * 100, 1);

        $factorTransformDim6Extra = mysqli_fetch_array($con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 51"))[0];
        $puntajeTransformadoDim6Extra = round(($puntajeBrutodim6Extra / $empleados_intra_a->num_rows) / $factorTransformDim6Extra * 100, 1);

        $factorTransformDim7Extra = mysqli_fetch_array($con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 52"))[0];
        $puntajeTransformadoDim7Extra = round(($puntajeBrutodim7Extra / $empleados_intra_a->num_rows) / $factorTransformDim7Extra * 100, 1);

        $factorTransformDimExtra = mysqli_fetch_array($con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 53"))[0];
        $puntajeBrutodimExtra = $puntajeBrutodim1Extra + $puntajeBrutodim2Extra + $puntajeBrutodim3Extra + $puntajeBrutodim4Extra + $puntajeBrutodim5Extra + $puntajeBrutodim6Extra + $puntajeBrutodim7Extra;
        $puntajeTransformadoDimExtra = round(($puntajeBrutodimExtra / $empleados_intra_a->num_rows) / $factorTransformDimExtra * 100, 1); 
    ?>
    <div class="salto"></div>
    <div style="text-align: left;" class="contenido">
        <p style="text-align: center; width: 100%;"><strong>RESULTADOS DEL CUESTIONARIO EXTRALABORAL - <?php echo $nombredepartamento; ?></strong></p>
        <p>En las siguientes líneas se presentan en una tabla los resultados de la aplicación del Cuestionario Extralaboral en sus diferentes dimensiones, expresando el Puntaje Transformado P (T) y la cantidad de empleados en cada nivel de riesgo</p>
        <br>
        <strong>Tabla 1. Tabla de los resultados del Cuestionario Extralaboral</strong>
        <i>Tabla 5. Resultados del Cuestionario Extralaboral por dimensiones</i>
        <br>
        <br>
        <table style="width: 100%;" class="table_bordered">
            <tr>
                <th>Dimension</th>
                <th>Puntaje (T)</th>
                <th>Sin riesgo</th>
                <th>Riesgo bajo</th>
                <th>Riesgo medio</th>
                <th>Riesgo alto</th>
                <th>Riesgo muy alto</th>
            </tr>
            <tr>
                <td>Tiempos fuera del trabajo</td>
                <td><?php echo $puntajeTransformadoDim1Extra; ?></td>
                <td><?php echo $arrayRiesgoDim1Extra[0]; ?></td>
                <td><?php echo $arrayRiesgoDim1Extra[1]; ?></td>
                <td><?php echo $arrayRiesgoDim1Extra[2]; ?></td>
                <td><?php echo $arrayRiesgoDim1Extra[3]; ?></td>
                <td><?php echo $arrayRiesgoDim1Extra[4]; ?></td>
            </tr>
            <tr>
                <td>Relaciones familiares</td>
                <td><?php echo $puntajeTransformadoDim2Extra; ?></td>
                <td><?php echo $arrayRiesgoDim2Extra[0]; ?></td>
                <td><?php echo $arrayRiesgoDim2Extra[1]; ?></td>
                <td><?php echo $arrayRiesgoDim2Extra[2]; ?></td>
                <td><?php echo $arrayRiesgoDim2Extra[3]; ?></td>
                <td><?php echo $arrayRiesgoDim2Extra[4]; ?></td>
            </tr>
            <tr>
                <td>Comunicación y relaciones interpersonales</td>
                <td><?php echo $puntajeTransformadoDim3Extra; ?></td>
                <td><?php echo $arrayRiesgoDim3Extra[0]; ?></td>
                <td><?php echo $arrayRiesgoDim3Extra[1]; ?></td>
                <td><?php echo $arrayRiesgoDim3Extra[2]; ?></td>
                <td><?php echo $arrayRiesgoDim3Extra[3]; ?></td>
                <td><?php echo $arrayRiesgoDim3Extra[4]; ?></td>
            </tr>
            <tr>
                <td>Situación económica del grupo familiar</td>
                <td><?php echo $puntajeTransformadoDim4Extra; ?></td>
                <td><?php echo $arrayRiesgoDim4Extra[0]; ?></td>
                <td><?php echo $arrayRiesgoDim4Extra[1]; ?></td>
                <td><?php echo $arrayRiesgoDim4Extra[2]; ?></td>
                <td><?php echo $arrayRiesgoDim4Extra[3]; ?></td>
                <td><?php echo $arrayRiesgoDim4Extra[4]; ?></td>
            </tr>
            <tr>
                <td>Características de la vivienda y de su entorno</td>
                <td><?php echo $puntajeTransformadoDim5Extra; ?></td>
                <td><?php echo $arrayRiesgoDim5Extra[0]; ?></td>
                <td><?php echo $arrayRiesgoDim5Extra[1]; ?></td>
                <td><?php echo $arrayRiesgoDim5Extra[2]; ?></td>
                <td><?php echo $arrayRiesgoDim5Extra[3]; ?></td>
                <td><?php echo $arrayRiesgoDim5Extra[4]; ?></td>
            </tr>
            <tr>
                <td>Influencia del entorno extralaboral sobre el trabajo</td>
                <td><?php echo $puntajeTransformadoDim6Extra; ?></td>
                <td><?php echo $arrayRiesgoDim6Extra[0]; ?></td>
                <td><?php echo $arrayRiesgoDim6Extra[1]; ?></td>
                <td><?php echo $arrayRiesgoDim6Extra[2]; ?></td>
                <td><?php echo $arrayRiesgoDim6Extra[3]; ?></td>
                <td><?php echo $arrayRiesgoDim6Extra[4]; ?></td>
            </tr>
            <tr>
                <td>Desplazamiento vivienda - trabajo - vivienda</td>
                <td><?php echo $puntajeTransformadoDim7Extra; ?></td>
                <td><?php echo $arrayRiesgoDim7Extra[0]; ?></td>
                <td><?php echo $arrayRiesgoDim7Extra[1]; ?></td>
                <td><?php echo $arrayRiesgoDim7Extra[2]; ?></td>
                <td><?php echo $arrayRiesgoDim7Extra[3]; ?></td>
                <td><?php echo $arrayRiesgoDim7Extra[4]; ?></td>
            </tr>
            <tr>
                <td><strong>Cuestionario Extralaboral (Total)</strong></td>
                <td><?php echo $puntajeTransformadoDimExtra; ?></td>
                <td><?php echo $arrayRiesgoDimTotalExtra[0]; ?></td>
                <td><?php echo $arrayRiesgoDimTotalExtra[1]; ?></td>
                <td><?php echo $arrayRiesgoDimTotalExtra[2]; ?></td>
                <td><?php echo $arrayRiesgoDimTotalExtra[3]; ?></td>
                <td><?php echo $arrayRiesgoDimTotalExtra[4]; ?></td>
            </tr>
        </table>
    </div>
    <div class="salto"></div>   
    <div style="text-align: left;" class="contenido">
        <p><strong>2.	Resultado general del Cuestionario Extralaboral por niveles de riesgo</strong></p>
        <i>Figura 24. Niveles de riesgo del Cuestionario Extralaboral</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim_total_extra"></canvas>
        </div>
        <script>
            const graficoDimExtra = new Chart(document.getElementById('chart_dim_total_extra').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $arrayRiesgoDimTotalExtra[0]; ?>, <?php echo $arrayRiesgoDimTotalExtra[1]; ?>, <?php echo $arrayRiesgoDimTotalExtra[2]; ?>, <?php echo $arrayRiesgoDimTotalExtra[3]; ?>, <?php echo $arrayRiesgoDimTotalExtra[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
        <br>
        <p><strong>3. Figuras de los resultados del Cuestionario Extralaboral</strong></p>
        <p>Seguidamente se presentan en las figuras 25 a la 31 los resultados de la aplicación del Cuestionario Extralaboral en sus diferentes dimensiones, expresando el porcentaje de empleados en cada nivel de riesgo</p>
    </div>
    <div class="salto"></div>   
    <div style="text-align: left;" class="contenido">
        <p><strong>3.1. Dimensión: Tiempo fuera del trabajo</strong></p>
        <i>Figura 25. Niveles de riesgo de la dimensión: Tiempo fuera del trabajo</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim1_extra"></canvas>
        </div>
        <script>
            const graficoDim1Extra = new Chart(document.getElementById('chart_dim1_extra').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $arrayRiesgoDim1Extra[0]; ?>, <?php echo $arrayRiesgoDim1Extra[1]; ?>, <?php echo $arrayRiesgoDim1Extra[2]; ?>, <?php echo $arrayRiesgoDim1Extra[3]; ?>, <?php echo $arrayRiesgoDim1Extra[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
        <br>
        <p><strong>3.2. Dimensión: Relaciones familiares</strong></p>
        <i>Figura 26. Niveles de riesgo de la dimensión: Relaciones familiares</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim2_extra"></canvas>
        </div>
        <script>
            const graficoDim2Extra = new Chart(document.getElementById('chart_dim2_extra').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $arrayRiesgoDim2Extra[0]; ?>, <?php echo $arrayRiesgoDim2Extra[1]; ?>, <?php echo $arrayRiesgoDim2Extra[2]; ?>, <?php echo $arrayRiesgoDim2Extra[3]; ?>, <?php echo $arrayRiesgoDim2Extra[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
    </div>
    <div class="salto"></div>   
    <div style="text-align: left;" class="contenido">
        <p><strong>3.3. Dimensión: Comunicación y relaciones interpersonales</strong></p>
        <i>Figura 27. Niveles de riesgo de la dimensión: Comunicación y relaciones interpersonales</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim3_extra"></canvas>
        </div>
        <script>
            const graficoDim3Extra = new Chart(document.getElementById('chart_dim3_extra').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $arrayRiesgoDim3Extra[0]; ?>, <?php echo $arrayRiesgoDim3Extra[1]; ?>, <?php echo $arrayRiesgoDim3Extra[2]; ?>, <?php echo $arrayRiesgoDim3Extra[3]; ?>, <?php echo $arrayRiesgoDim3Extra[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
        <br>
        <p><strong>3.4. Dimensión: Situación económica del grupo familiar</strong></p>
        <i>Figura 28. Niveles de riesgo de la dimensión: Situación económica del grupo familiar</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim4_extra"></canvas>
        </div>
        <script>
            const graficoDim4Extra = new Chart(document.getElementById('chart_dim4_extra').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $arrayRiesgoDim4Extra[0]; ?>, <?php echo $arrayRiesgoDim4Extra[1]; ?>, <?php echo $arrayRiesgoDim4Extra[2]; ?>, <?php echo $arrayRiesgoDim4Extra[3]; ?>, <?php echo $arrayRiesgoDim4Extra[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
    </div>
    <div class="salto"></div>   
    <div style="text-align: left;" class="contenido">
        <p><strong>3.5. Dimensión: Características de la vivienda y de su entorno</strong></p>
        <i>Figura 29. Niveles de riesgo de la dimensión: Características de la vivienda y de su entorno</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim5_extra"></canvas>
        </div>
        <script>
            const graficoDim5Extra = new Chart(document.getElementById('chart_dim5_extra').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $arrayRiesgoDim5Extra[0]; ?>, <?php echo $arrayRiesgoDim5Extra[1]; ?>, <?php echo $arrayRiesgoDim5Extra[2]; ?>, <?php echo $arrayRiesgoDim5Extra[3]; ?>, <?php echo $arrayRiesgoDim5Extra[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
        <br>
        <p><strong>3.6. Dimensión: Influencia del entorno extralaboral sobre el trabajo</strong></p>
        <i>Figura 30. Niveles de riesgo de la dimensión: Influencia del entorno extralaboral sobre el trabajo</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim6_extra"></canvas>
        </div>
        <script>
            const graficoDim6Extra = new Chart(document.getElementById('chart_dim6_extra').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $arrayRiesgoDim6Extra[0]; ?>, <?php echo $arrayRiesgoDim6Extra[1]; ?>, <?php echo $arrayRiesgoDim6Extra[2]; ?>, <?php echo $arrayRiesgoDim6Extra[3]; ?>, <?php echo $arrayRiesgoDim6Extra[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
    </div>
    <div class="salto"></div>   
    <div style="text-align: left;" class="contenido">
        <p><strong>3.7. Dimensión: Desplazamiento vivienda - trabajo - vivienda</strong></p>
        <i>Figura 31. Niveles de riesgo de la dimensión: Desplazamiento vivienda - trabajo - vivienda</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_dim7_extra"></canvas>
        </div>
        <script>
            const graficoDim7Extra = new Chart(document.getElementById('chart_dim7_extra').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $arrayRiesgoDim7Extra[0]; ?>, <?php echo $arrayRiesgoDim7Extra[1]; ?>, <?php echo $arrayRiesgoDim7Extra[2]; ?>, <?php echo $arrayRiesgoDim7Extra[3]; ?>, <?php echo $arrayRiesgoDim7Extra[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
    </div>
    <div class="salto"></div> 
    <?php
        $empleados_intra_a = $con->query("SELECT idempleado FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 GROUP BY idempleado");

        $arrayRiesgoEstres=[0,0,0,0,0];
        $puntajeBrutoestres = 0;

        
        while ($row = mysqli_fetch_array($empleados_intra_a)) { 
            $dim1Extra = $con->query("SELECT * from calificacion WHERE idempleado = $row[0] and tipo_examen = 4 and iddimension = 54");
            while ($row2 = mysqli_fetch_array($dim1Extra)) {
                $puntajeBrutoestres  = $puntajeBrutoestres + $row2[4];
                if ($row2[6]=="Sin riesgo") {
                    $arrayRiesgoEstres[0] = $arrayRiesgoEstres[0]+1;
               }else{
                   if ($row2[6]=="Bajo") {
                       $arrayRiesgoEstres[1] = $arrayRiesgoEstres[1]+1;
                   }else{
                       if ($row2[6]=="Medio") {
                           $arrayRiesgoEstres[2] = $arrayRiesgoEstres[2]+1;
                       }else{
                           if ($row2[6]=="Alto") {
                               $arrayRiesgoEstres[3] = $arrayRiesgoEstres[3]+1;
                           }else{
                               $arrayRiesgoEstres[4] = $arrayRiesgoEstres[4]+1;
                           }
                       }
                   }
               }  
            }
        }

        $factorTransformEstres = mysqli_fetch_array($con -> query("SELECT factortransform FROM `normas` WHERE `iddi`= 54"))[0];
        $puntajeTransformadoEstres = round(($puntajeBrutoestres / $empleados_intra_a->num_rows) / $factorTransformEstres * 100, 1);

    ?>  
    <div style="text-align: left;" class="contenido">
        <p style="text-align: center; width: 100%;"><strong>RESULTADOS DEL CUESTIONARIO DEL ESTRÉS - <?php echo $nombredepartamento; ?></strong></p>
        <br>
        <strong>1. Tabla de los resultados del Cuestionario del Estres</strong>
        <br><br>
        <table style="width: 100%;" class="table_bordered">
            <tr>
                <th colspan="7"><strong>Nivel de síntomas de estrés</strong></th>
            </tr>
            <tr>
                <th></th>
                <th>Puntaje (T)</th>
                <th>Riesgo Muy bajo</th>
                <th>Riesgo Bajo</th>
                <th>Riesgo Medio</th>
                <th>Riesgo Alto</th>
                <th>Riesgo Muy Alto</th>
            </tr>
            <tr>
                <td>Estrés</td>
                <td><?php echo $puntajeTransformadoEstres; ?></td>
                <td><?php echo $arrayRiesgoEstres[0]; ?></td>
                <td><?php echo $arrayRiesgoEstres[1]; ?></td>
                <td><?php echo $arrayRiesgoEstres[2]; ?></td>
                <td><?php echo $arrayRiesgoEstres[3]; ?></td>
                <td><?php echo $arrayRiesgoEstres[4]; ?></td>
            </tr>
        </table>
        <br>
        <p><strong>2. Figura de los resultados del Cuestionario del Estrés</strong></p>
        <i>Figura 32. Niveles de riesgo del Cuestionario del Estrés</i>
        <br>
        <div  style="height: auto !important;" class="chart-container">
            <canvas id="chart_estres"></canvas>
        </div>
        <script>
            const graficoEstr = new Chart(document.getElementById('chart_estres').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin riesgo', 'Riesgo bajo', 'Riesgo medio', 'Riesgo alto', 'Riesgo muy alto'],
                    datasets: [{
                        label: 'Distribución de Categorías',
                        data: [<?php echo $arrayRiesgoEstres[0]; ?>, <?php echo $arrayRiesgoEstres[1]; ?>, <?php echo $arrayRiesgoEstres[2]; ?>, <?php echo $arrayRiesgoEstres[3]; ?>, <?php echo $arrayRiesgoEstres[4]; ?>],
                        backgroundColor: [
                            '#00ad4e',   // Verde oscuro
                            '#8fcd4e',   // Verde claro
                            '#fbbd00',   // Amarillo
                            '#fb0000',   // Rojo
                            '#bd0000'    // Rojo oscuro
                        ],
                    }]
                },
                options: options,
                plugins: [ChartDataLabels] 
            });
        </script>
    </div>
</div>
</body>
</html>
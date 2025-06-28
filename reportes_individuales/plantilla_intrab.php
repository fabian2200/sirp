<?php 
  ob_start();
  session_start();
  include_once("../conexion.php"); 
  $id = $_SESSION['id'];
  $idempl = $_GET['idempl'];
  $idemp = $_GET['idempr'];
  $sql="SELECT * FROM `empleado` where idus = $idempl";
  $resultado = mysqli_fetch_array($con -> query($sql));
  $token = $resultado[4]."_".$idemp;

  $sql2="SELECT nombre FROM `departamentos` where iddepto = $resultado[21]";
  $resultado2 = mysqli_fetch_array($con -> query($sql2));

  $sql3="SELECT * FROM `cliente` where idcl = $id";
  $resultado3 = mysqli_fetch_array($con -> query($sql3));

  //select de las 19 dimensiones 1 total y 1 total general
 //dom1
  $dim1 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=26 and idempleado=$idempl"));
  $dim2 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=27 and idempleado=$idempl"));
  $dim3 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=28 and idempleado=$idempl"));
  $dom1 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=25 and idempleado=$idempl"));

 //dom2

  $dim4 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=30 and idempleado=$idempl"));
  $dim5 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=31 and idempleado=$idempl"));
  $dim6 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=32 and idempleado=$idempl"));
  $dim7 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=33 and idempleado=$idempl"));
  $dim8 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=35 and idempleado=$idempl"));
  $dom2 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=29 and idempleado=$idempl"));

//dom3

  $dim9 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=37 and idempleado=$idempl"));
  $dim10 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=38 and idempleado=$idempl"));
  $dim11 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=39 and idempleado=$idempl"));
  $dim12 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=40 and idempleado=$idempl"));
  $dim13 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=41 and idempleado=$idempl"));
  $dim14 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=42 and idempleado=$idempl"));
  $dom3 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=36 and idempleado=$idempl"));

  //dom4 

  $dim15 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=44 and idempleado=$idempl"));
  $dim16 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=45 and idempleado=$idempl"));
  $dom4 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=43 and idempleado=$idempl"));

  //total general intra-A

  $total = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=56 and idempleado=$idempl"));
?>
 <!DOCTYPE html>
 <html><head>
 	<title></title>
 	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
    td{
      font-size: 17px; 
    }
    th{
      font-size: 17px; 
    }
    div.center-table{
        text-align: center;
    }
    div.center-table table {
       margin: 0 auto;
       text-align: left;
    }
    .break-page {
      page-break-after: always;
    }
  </style>
 </head><body>
 <h2 style="text-align: center;background-color: #E6C698">INTRALABORAL - FORMA B</h2>
 <br>
 <hr>
 <br>
 <br>
 <br>
 <div class="center-table">
 	<table class="table table-bordered" border="2">
    <tbody>
      <tr>
        <td colspan="2" style="text-align: center;background-color: #E6C698"><strong>DATOS GENERALES DEL TRABAJADOR</strong></td>
      </tr>
     <tr>
      <td style="background-color: #E6C698">Nombre del trabajador:</td>
      <td><?php echo $resultado[4]; ?></td>
    </tr>
    <tr>
      <td style="background-color: #E6C698">Número de identificación (ID):</td>
      <td><?php echo $resultado[0]; ?></td>
    </tr>
    <tr>
      <td style="background-color: #E6C698">Cargo:</td>
      <td><?php echo $resultado[18]; ?></td>
    </tr>
    <tr>
      <td style="background-color: #E6C698">Departamento o sección:</td>
      <td><?php echo $resultado2[0]; ?></td>
    </tr>
    <tr>
      <td style="background-color: #E6C698">Edad:</td>
      <td>
      <?php 
         $fechaActual = date('Y-m-d'); 
         $datetime1 = date_create($resultado[7]);
         $datetime2 = date_create($fechaActual);
         $contador = date_diff($datetime1, $datetime2);
         $differenceFormat = '%y';
         echo $contador->format($differenceFormat)." Años";
      ?>
      </td>
    </tr>
    <tr>
      <td style="background-color: #E6C698">Sexo:</td>
      <td>
        <?php 
          if ($resultado[5]==2) {
            echo "Masculino";
          }else{
            echo "Femenino";
          }
       ?>
      </td>
       
    </tr>
    <tr>
      <td style="background-color: #E6C698">Fecha de aplicación del cuestionario:</td>
      <td><?php echo $resultado[26]; ?></td>
    </tr>
    <tr>
      <td style="background-color: #E6C698">Nombre de la empresa:</td>
      <td><?php echo $resultado[3]; ?></td>
    </tr>
    </tbody>
  </table>
 <br><br><br><br><br><br><br>
  <table class="table table-bordered" border="2">
    <tbody>
      <tr>
        <td colspan="2" style="text-align: center;background-color: #E6C698"><strong>DATOS GENERALES DEL EVALUADOR</strong></td>
      </tr>
     <tr>
      <td style="background-color: #E6C698">Nombre del evaluador:</td>
      <td><?php echo $resultado3[1] ?></td>
    </tr>
    <tr>
      <td style="background-color: #E6C698">Número de identificación (ID):</td>
      <td><?php echo $resultado3[8] ?></td>
    </tr>
    <tr>
      <td style="background-color: #E6C698">Profesiòn:</td>
      <td><?php echo $resultado3[9] ?></td>
    </tr>
    <tr>
      <td style="background-color: #E6C698">Postgrado:</td>
      <td><?php echo $resultado3[10] ?></td>
    </tr>
    <tr>
      <td style="background-color: #E6C698">Nro. Tarjeta profesional:</td>
      <td><?php echo $resultado3[11] ?></td>
    </tr>
    <tr>
      <td style="background-color: #E6C698">Nro. Licencia* ::</td>
      <td><?php echo $resultado3[12] ?></td>
    </tr>
    <tr>
      <td style="background-color: #E6C698">Fecha de expedición de la licencia:</td>
      <td><?php echo $resultado3[13] ?></td>
    </tr>
    </tbody>
  </table>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="break-page"></div>
  <h3 style="text-align: center;background-color: #E6C698"><strong>RESULTADOS DEL CUESTIONARIO INTRALABORAL - B</strong></h3><br><br>
  <table class="table table-bordered" border="2">
    <tbody>
    <tr >
        <td  style="text-align: center;;background-color: #E6C698">Dominios</td>
    		<td style="text-align: center;;background-color: #E6C698"><strong>Dimensiones</strong></td>	
    		<td style="text-align: center;background-color: #E6C698"><strong>Puntaje(transformado)</strong></td>
 			  <td style="text-align: center;background-color: #E6C698"><strong>Nivel de riesgo</strong></td>	
    </tr>
    <tr>
    <td rowspan="3" style="text-alingn: center; background-color: #E6C698">Liderazgo y relaciones sociales en el trabajo</td>
      <td style="background-color: #E6C698">Características de liderazgo</td>
 			<td style="text-align: center;"><?php echo round($dim1[5], 1); ?></td>
      <td style="text-align: center;"><?php echo $dim1[6] ?></td>
 		</tr>
    <tr>
      <td style="background-color: #E6C698">Relaciones sociales en el trabajo</td>
 			<td style="text-align: center;"><?php echo round($dim2[5], 1); ?></td>
      <td style="text-align: center;"><?php echo $dim2[6] ?></td>
 		</tr>
    <tr>
      <td style="background-color: #E6C698">Retroalimentación del desempeño</td>
 			<td style="text-align: center;"><?php echo round($dim3[5], 1); ?></td>
      <td style="text-align: center;"><?php echo $dim3[6] ?></td>
 		</tr>
    <tr>
      <td colspan="2" style="background-color: #E6C698; text-align: center">LIDERAZGO Y RELACIONES SOCIALES EN EL TRABAJO</td>
 			<td style="text-align: center;"><?php echo round($dom1[5], 1); ?></td>
      <td style="text-align: center;"><?php echo $dom1[6] ?></td>
 		</tr>
    <tr>
     <td rowspan="5" style="text-alingn: center; background-color: #E6C698">Control sobre el trabajo</td>
      <td style="background-color: #E6C698">Claridad de rol</td>
      <td style="text-align: center;"><?php echo round($dim4[5], 1); ?></td>
      <td style="text-align: center;"><?php echo $dim4[6] ?></td>
    </tr>
    <tr>
      <td style="background-color: #E6C698">Capacitación</td>
      <td style="text-align: center;"><?php echo round($dim5[5], 1); ?></td>
      <td style="text-align: center;"><?php echo $dim5[6] ?></td>
    </tr>
    <tr>
      <td style="background-color: #E6C698">Participación y manejo del cambio</td>
      <td style="text-align: center;"><?php echo round($dim6[5], 1); ?></td>
      <td style="text-align: center;"><?php echo $dim6[6] ?></td>
    </tr>
    <tr>
      <td style="background-color: #E6C698">Oportunidades para el uso y desarrollo de habilidades y conocimientos</td>
      <td style="text-align: center;"><?php echo round($dim7[5], 1); ?></td>
      <td style="text-align: center;"><?php echo $dim7[6] ?></td>
    </tr>
    <tr>
      <td style="background-color: #E6C698">Control y autonomía sobre el trabajo</td>
      <td style="text-align: center;"><?php echo round($dim8[5], 1); ?></td>
      <td style="text-align: center;"><?php echo $dim8[6] ?></td>
    </tr>
    <tr>
      <td colspan="2" style="background-color: #E6C698; text-align: center">CONTROL SOBRE EL TRABAJO</td>
      <td style="text-align: center;"><?php echo round($dom2[5], 1); ?></td>
      <td style="text-align: center;"><?php echo $dom2[6] ?></td>
    </tr>
    <tr>
     <td rowspan="6" style="text-alingn: center; background-color: #E6C698">Demandas del trabajo</td>
      <td style="background-color: #E6C698">Demandas ambientales y de esfuerzo físico</td>
      <td style="text-align: center;"><?php echo round($dim9[5], 1); ?></td>
      <td style="text-align: center;"><?php echo $dim9[6] ?></td>
    </tr>
    <tr>
      <td style="background-color: #E6C698">Demandas emocionales</td>
      <td style="text-align: center;"><?php echo round($dim10[5], 1); ?></td>
      <td style="text-align: center;"><?php echo $dim10[6] ?></td>
    </tr>
    <tr>
      <td style="background-color: #E6C698">Demandas cuantitativas</td>
      <td style="text-align: center;"><?php echo round($dim11[5], 1); ?></td>
      <td style="text-align: center;"><?php echo $dim11[6] ?></td>
    </tr>
    <tr>
      <td style="background-color: #E6C698">Influencia del trabajo sobre el entorno extralaboral</td>
      <td style="text-align: center;"><?php echo round($dim12[5], 1); ?></td>
      <td style="text-align: center;"><?php echo $dim12[6] ?></td>
    </tr>
    <tr>
      <td style="background-color: #E6C698">Demandas de carga mental</td>
      <td style="text-align: center;"><?php echo round($dim13[5], 1); ?></td>
      <td style="text-align: center;"><?php echo $dim13[6] ?></td>
    </tr>
    <tr>
      <td style="background-color: #E6C698">Demandas de la jornada del trabajo</td>
      <td style="text-align: center;"><?php echo round($dim14[5], 1); ?></td>
      <td style="text-align: center;"><?php echo $dim14[6] ?></td>
    </tr>
    <tr>
      <td colspan="2" style="background-color: #E6C698; text-align: center">DEMANDAS DEL TRABAJO</td>
      <td style="text-align: center;"><?php echo round($dom3[5], 1); ?></td>
      <td style="text-align: center;"><?php echo $dom3[6] ?></td>
    </tr>
    <tr>
     <td rowspan="2" style="text-alingn: center; background-color: #E6C698">Recompensas</td>
      <td style="background-color: #E6C698">Recompensas derivadas de la pertenencia a la organización y del trabajo que se realiza</td>
      <td style="text-align: center;"><?php echo round($dim15[5], 1); ?></td>
      <td style="text-align: center;"><?php echo $dim15[6] ?></td>
    </tr>
    <tr>
      <td style="background-color: #E6C698">Reconocimiento y compensación</td>
      <td style="text-align: center;"><?php echo round($dim16[5], 1); ?></td>
      <td style="text-align: center;"><?php echo $dim16[6] ?></td>
    </tr>
    <tr>
      <td colspan="2" style="background-color: #E6C698; text-align: center">RECOMPENSAS</td>
      <td style="text-align: center;"><?php echo round($dom4[5], 1); ?></td>
      <td style="text-align: center;"><?php echo $dom4[6] ?></td>
    </tr>
     <tr>
      <td colspan="2" style="background-color: #E6C698; text-align: center"><strong>TOTAL GENERAL FACTORES DE RIESGO
PSICOSOCIAL INTRALABORAL - B</strong></td>
      <td style="text-align: center;"><?php echo round($total[5], 1); ?></td>
      <td style="text-align: center;"><?php echo $total[6] ?></td>
    </tr>
    </tbody>
  </table>
  <br>
  <br>
  <div class="break-page"></div>
  <h4 style="text-align: center;background-color: #E6C698"><strong>INTERPRETACIÓN GENÉRICA DE LOS NIVELES DE RIESGO</strong></h4>
  <div class="container" align="justify" style="border-width: 1px; border-style: solid;">
  	<strong>Sin riesgo o riesgo despreciable:</strong>  ausencia de riesgo o riesgo tan bajo que no amerita desarrollar
      actividades de intervención. Las dimensiones y dominios que se encuentren bajo esta categoría serán
      objeto de acciones o programas de promoción.<br>
    <strong>Riesgo bajo: </strong> no se espera que los factores psicosociales que obtengan puntuaciones de este nivel estén
      relacionados con síntomas o respuestas de estrés significativas. Las dimensiones y dominios que se
      encuentren bajo esta categoría serán objeto de acciones o programas de intervención, a fin de mantenerlos
      en los niveles de riesgo más bajos posibles. <br>
    <strong>Riesgo medio:</strong> nivel de riesgo en el que se esperaría una respuesta de estrés moderada. Las dimensiones
        y dominios que se encuentren bajo esta categoría ameritan observación y acciones sistemáticas de
        intervención para prevenir efectos perjudiciales en la salud. <br>
    <strong> Riesgo alto:</strong> nivel de riesgo que tiene una importante posibilidad de asociación con respuestas de estrés
        alto y por tanto, las dimensiones y dominios que se encuentren bajo esta categoría requieren intervención
        en el marco de un sistema de vigilancia epidemiológica. <br>
    <strong>Riesgo muy alto:</strong> nivel de riesgo con amplia posibilidad de asociarse a respuestas muy altas de estrés. Por
        consiguiente las dimensiones y dominios que se encuentren bajo esta categoría requieren intervención
        inmediata en el marco de un sistema de vigilancia epidemiológica.
  </div>
  <br>
  <br>
  <h4 style="text-align: center;background-color: #E6C698"><strong>OBSERVACIONES Y COMENTARIOS DEL EVALUADOR</strong></h4>
  <div class="container" align="justify" style="border-width: 1px; border-style: solid;">
  	<br><br><br><br><br><br><br>
  </div>
  <br><br>
  <div class="break-page"></div>
  <h4 style="text-align: center;background-color: #E6C698"><strong>RECOMENDACIONES PARTICULARES</strong></h4>
  <div class="container" align="justify" style="border-width: 1px; border-style: solid;">
  	<br><br><br><br><br><br><br>
  </div>
  <br><br>
  <label style="text-align: center;background-color: #E6C698">Fecha de elaboración de informe: </label><span> <?php echo date('Y-m-d'); ?></span>
  <br>
  <br>
  <label style="text-align: center;background-color: #E6C698">Firma del evaluador:</label><span>_________________________</span>
 </div>
 </body></html>
<?php  
require_once '../dompdf/vendor/autoload.php';
use Dompdf\Dompdf;
$ruta = "$resultado[3]";
if (!file_exists($ruta)) {
  mkdir("$resultado[3]", 0755);
}
$rutaGuardado = "$resultado[3]/";
$dompdf = new DOMPDF();
$dompdf->set_paper("letter", "portrait");
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "intra-B_$token.pdf";
file_put_contents($rutaGuardado.$filename, $pdf);
//$dompdf->stream($filename);
 echo "<script>
            window.location= '../paginas/ver_empleados.php?idempr=$idemp'
      </script>";
?>
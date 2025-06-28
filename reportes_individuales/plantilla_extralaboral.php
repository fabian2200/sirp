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

  $dim1 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=46 and idempleado=$idempl"));
  $dim2 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=47 and idempleado=$idempl"));
  $dim3 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=48 and idempleado=$idempl"));
  $dim4 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=49 and idempleado=$idempl"));
  $dim5 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=50 and idempleado=$idempl"));
  $dim6 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=51 and idempleado=$idempl"));
  $dim7 = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=52 and idempleado=$idempl"));

  $total = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=53 and idempleado=$idempl"));
 
?>
 <!DOCTYPE html>
 <html><head>
 	<title></title>
 	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
    td{
      font-size: 16px; 
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
 <h2 style="text-align: center;background-color: #E6C698">Extralaboral</h2>
 <br>
 <hr>
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
          if ($resultado[5]==1) {
            echo "Femenino";
          }else{
            echo "Masculino";
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
 <br><br><br><br><br>
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
  <br>
  <br>
  <br>
  <div class="break-page"></div>
  <h4 style="text-align: center;background-color: #E6C698"><strong>RESULTADOS DEL CUESTIONARIO EXTRALABORAL</strong></h4>
  <table class="table table-bordered" border="2">
    <tbody>
    	<tr >
    		<td style="text-align: center;;background-color: #E6C698"><strong>Dimensiones</strong></td>	
    		<td style="text-align: center;background-color: #E6C698"><strong>Puntaje(transformado)</strong></td>
 			<td style="text-align: center;background-color: #E6C698"><strong>Nivel de riesgo</strong></td>	
    	</tr>
        <tr>
        	<td style="background-color: #E6C698">Tiempos fuera del trabajo</td>
 			    <td style="text-align: center;"><?php echo round($dim1[5], 1); ?></td>
          <td style="text-align: center;"><?php echo $dim1[6] ?></td>
 		     </tr>
         <tr>
        	<td style="background-color: #E6C698">Relaciones familiares</td>
 			    <td style="text-align: center;"><?php echo round($dim2[5], 1); ?></td>
           <td style="text-align: center;"><?php echo $dim2[6] ?></td>
 		     </tr>
         <tr>
        	<td style="background-color: #E6C698">Comunicación y relaciones interpersonales</td>
 			    <td style="text-align: center;"><?php echo round($dim3[5], 1); ?></td>
           <td style="text-align: center;"><?php echo $dim3[6] ?></td>
 		     </tr>
         <tr>
        	<td style="background-color: #E6C698">Situación económica del grupo familiar</td>
 			    <td style="text-align: center;"><?php echo round($dim4[5], 1); ?></td>
           <td style="text-align: center;"><?php echo $dim4[6] ?></td>
 		     </tr>
         <tr>
        	<td style="background-color: #E6C698">Características de la vivienda y de su entorno</td>
 			    <td style="text-align: center;"><?php echo round($dim5[5], 1); ?></td>
           <td style="text-align: center;"><?php echo $dim5[6] ?></td>
 		     </tr>
         <tr>
        	<td style="background-color: #E6C698">Influencia del entorno extralaboral sobre el trabajo</td>
 			    <td style="text-align: center;"><?php echo round($dim6[5], 1); ?></td>
           <td style="text-align: center;"><?php echo $dim6[6] ?></td>
 		     </tr>
         <tr>
        	<td style="background-color: #E6C698">Desplazamiento vivienda - trabajo - vivienda</td>
 			    <td style="text-align: center;"><?php echo round($dim7[5], 1); ?></td>
           <td style="text-align: center;"><?php echo $dim7[6] ?></td>
 		     </tr>
         <tr>
        	<td style="background-color: #E6C698">TOTAL GENERAL FACTORES DE RIESGO PSICOSOCIAL EXTRALABORAL</td>
          <td style="text-align: center;"><?php echo round($total[5], 1); ?></td>
           <td style="text-align: center;"><?php echo $total[6] ?></td>
 			   </tr>
    </tbody>
  </table>
  <br>
  <br>
  <br>
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
    <strong>lRiesgo muy alto:</strong> nivel de riesgo con amplia posibilidad de asociarse a respuestas muy altas de estrés. Por
        consiguiente las dimensiones y dominios que se encuentren bajo esta categoría requieren intervención
        inmediata en el marco de un sistema de vigilancia epidemiológica.
  </div>
  <br>
  <br><br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <h4 style="text-align: center;background-color: #E6C698"><strong>OBSERVACIONES Y COMENTARIOS DEL EVALUADOR</strong></h4>
  <div class="container" align="justify" style="border-width: 1px; border-style: solid;">
  	<br><br><br><br><br><br><br><br><br><br>
  </div>
  <br><br>	
  <h4 style="text-align: center;background-color: #E6C698"><strong>RECOMENDACIONES PARTICULARES</strong></h4>
  <div class="container" align="justify" style="border-width: 1px; border-style: solid;">
  	<br><br><br><br><br><br><br><br><br><br>
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
$filename = "extralaboral_$token.pdf";
file_put_contents($rutaGuardado.$filename, $pdf);
//$dompdf->stream($filename);
echo "<script>
            window.location= '../paginas/ver_empleados.php?idempr=$idemp'
      </script>";
?>
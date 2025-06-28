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


  $total = mysqli_fetch_array($con -> query("SELECT * FROM calificacion where iddimension=54 and idempleado=$idempl"));
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
 <h2 style="text-align: center;background-color: #E6C698">Estrès</h2>
 <br>
 <hr>
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
 <br><br><br><br><br><br>
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
  <br>
  <div class="break-page"></div>
  <h4 style="text-align: center;background-color: #E6C698"><strong>RESULTADO DEL CUESTIONARIO ESTRÈS</strong></h4>
  <table class="table table-bordered" border="2">
    <tbody>
    	<tr >
    		<td rowspan="2" style="text-align: center;"><strong>TOTAL GENERAL SINTOMAS DE ESTRÉS</strong></td>	
    		<td style="text-align: center;background-color: #E6C698"><strong>Puntaje(transformado)</strong></td>
 			<td style="text-align: center;background-color: #E6C698"><strong>Nivel de riesgo</strong></td>	
    	</tr>
        <tr>
        	<td style="text-align: center;"><?php echo round($total[5], 1); ?></td>
 			    <td style="text-align: center;"><?php echo $total[6]; ?></td>
        </tr>
    </tbody>
  </table>
  <br>
  <h4 style="text-align: center;background-color: #E6C698"><strong>INTERPRETACIÓN GENÉRICA DE LOS NIVELES DE RIESGO</strong></h4>
  <div class="container" align="justify" style="border-width: 1px; border-style: solid;">
  	<strong>Muy bajo:</strong> ausencia de síntomas de estrés u ocurrencia muy rara que no amerita desarrollar actividades de
    intervención específicas, salvo acciones o programas de promoción en salud. <br>
    <strong>Bajo:</strong> es indicativo de baja frecuencia de síntomas de estrés y por tanto escasa afectación del estado
    general de salud. Es pertinente desarrollar acciones o programas de intervención, a fin de mantener la baja
    frecuencia de síntomas. <br>
    <strong>Medio:</strong> la presentación de síntomas es indicativa de una respuesta de estrés moderada. Los síntomas más
    frecuentes y críticos ameritan observación y acciones sistemáticas de intervención para prevenir efectos
    perjudiciales en la salud. Además, se sugiere identificar los factores de riesgo psicosocial intra y
    extralaboral que pudieran tener alguna relación con los efectos identificados. <br>
    <strong>Alto:</strong> la cantidad de síntomas y su frecuencia de presentación es indicativa de una respuesta de estrés alto. Los síntomas más críticos y frecuentes requieren intervención en el marco de un sistema de vigilancia
    epidemiológica. Además, es muy importante identificar los factores de riesgo psicosocial intra y extralaboral
    que pudieran tener alguna relación con los efectos identificados. <br>
    <strong>Muy alto:</strong> la cantidad de síntomas y su frecuencia de presentación es indicativa de una respuesta de estrés severa y perjudicial para la salud. Los síntomas más críticos y frecuentes requieren intervención inmediata
    en el marco de un sistema de vigilancia epidemiológica. Así mismo, es imperativo identificar los factores de
    riesgo psicosocial intra y extralaboral que pudieran tener alguna relación con los efectos identificados.
  </div>
  <br>
  <br><br>
  <h4 style="text-align: center;background-color: #E6C698"><strong>OBSERVACIONES Y COMENTARIOS DEL EVALUADOR</strong></h4>
  <div class="container" align="justify" style="border-width: 1px; border-style: solid;">
  	<br><br><br><br><br><br><br><br><br><br>
  </div>
  <br><br><br><br><br>
  <h4 style="text-align: center;background-color: #E6C698"><strong>RECOMENDACIONES PARTICULARES</strong></h4>
  <div class="container" align="justify" style="border-width: 1px; border-style: solid;">
  	<br><br><br><br><br><br><br><br><br><br>
  </div>
  <br><br><br><br><br>	
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
$filename = "estres_$token.pdf";
file_put_contents($rutaGuardado.$filename, $pdf);
//$dompdf->stream($filename);
echo "<script>
            window.location= '../paginas/ver_empleados.php?idempr=$idemp'
      </script>";
?>
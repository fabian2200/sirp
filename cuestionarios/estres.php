<?php
session_start();
include_once("../conexion.php");
if(($_SESSION['logueado']) == true){ 
 $id = $_SESSION['id'];
 $idempl = $_GET['idempl'];
 $idempr = $_GET['idempr'];
?> 
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
</head>
<body>
   
<div class="container">
  <h2>Cuestionario del Estres</h2>
  <hr>
  <form method="POST" action="../acciones/guardar_estres.php?idem=<?php echo $idempl ?>&idemp=<?php echo $idempr ?>">
    <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Pregunta</th>
        <th>Siempre</th>
        <th>Casi siempre</th>
        <th>A veces</th>
        <th>Nunca</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td> Dolores en el cuello y espalda o tensión muscular </td>
        <td><input type="radio" name="preg1" required="" value="9"></td>
        <td><input type="radio" name="preg1" required="" value="6"></td>
        <td><input type="radio" name="preg1" required="" value="3"></td>
        <td><input type="radio" name="preg1" required="" value="0"></td>
      </tr>
       <tr>
        <td>2</td>
        <td> Problemas gastrointestinales, úlcera péptica, acidez, problemas digestivos o del colon</td>
        <td><input type="radio" name="preg2" required="" value="9"></td>
        <td><input type="radio" name="preg2" required="" value="6"></td>
        <td><input type="radio" name="preg2" required="" value="3"></td>
        <td><input type="radio" name="preg2" required="" value="0"></td>
      </tr>
       <tr>
        <td>3</td>
        <td> Problemas respiratorios</td>
        <td><input type="radio" name="preg3" required="" value="9"></td>
        <td><input type="radio" name="preg3" required="" value="6"></td>
        <td><input type="radio" name="preg3" required="" value="3"></td>
        <td><input type="radio" name="preg3" required="" value="0"></td>
      </tr>
       <tr>
        <td>4</td>
        <td> Dolor de cabeza</td>
        <td><input type="radio" name="preg4" required="" value="6"></td>
        <td><input type="radio" name="preg4" required="" value="4"></td>
        <td><input type="radio" name="preg4" required="" value="2"></td>
        <td><input type="radio" name="preg4" required="" value="0"></td>
      </tr>
      <tr>
        <td>5</td>
        <td> Trastornos del sueño como somnolencia durante el día o desvelo en la noche</td>
        <td><input type="radio" name="preg5" required="" value="6"></td>
        <td><input type="radio" name="preg5" required="" value="4"></td>
        <td><input type="radio" name="preg5" required="" value="2"></td>
        <td><input type="radio" name="preg5" required="" value="0"></td>
      </tr>
      <tr>
        <td>6</td>
        <td> Palpitaciones en el pecho o problemas cardíacos </td>
        <td><input type="radio" name="preg6" required="" value="6"></td>
        <td><input type="radio" name="preg6" required="" value="4"></td>
        <td><input type="radio" name="preg6" required="" value="2"></td>
        <td><input type="radio" name="preg6" required="" value="0"></td>
      </tr>
      <tr>
        <td>7</td>
        <td> Cambios fuertes del apetito</td>
        <td><input type="radio" name="preg7" required="" value="3"></td>
        <td><input type="radio" name="preg7" required="" value="2"></td>
        <td><input type="radio" name="preg7" required="" value="1"></td>
        <td><input type="radio" name="preg7" required="" value="0"></td>
      </tr>
      <tr>
        <td>8</td>
        <td> Problemas relacionados con la función de los órganos genitales (impotencia, frigidez)</td>
        <td><input type="radio" name="preg8" required="" value="3"></td>
        <td><input type="radio" name="preg8" required="" value="2"></td>
        <td><input type="radio" name="preg8" required="" value="1"></td>
        <td><input type="radio" name="preg8" required="" value="0"></td>
      </tr>
       <tr>
        <td>9</td>
        <td> Dificultad en las relaciones familiares</td>
        <td><input type="radio" name="preg9" required="" value="9"></td>
        <td><input type="radio" name="preg9" required="" value="6"></td>
        <td><input type="radio" name="preg9" required="" value="3"></td>
        <td><input type="radio" name="preg9" required="" value="0"></td>
      </tr>
      <tr>
        <td>10</td>
        <td> Dificultad para permanecer quieto o dificultad para iniciar actividades</td>
        <td><input type="radio" name="preg10" required="" value="6"></td>
        <td><input type="radio" name="preg10" required="" value="4"></td>
        <td><input type="radio" name="preg10" required="" value="2"></td>
        <td><input type="radio" name="preg10" required="" value="0"></td>
      </tr>
      <tr>
        <td>11</td>
        <td> Dificultad en las relaciones con otras personas </td>
        <td><input type="radio" name="preg11" required="" value="6"></td>
        <td><input type="radio" name="preg11" required="" value="4"></td>
        <td><input type="radio" name="preg11" required="" value="2"></td>
        <td><input type="radio" name="preg11" required="" value="0"></td>
      </tr>
       <tr>
        <td>12</td>
        <td> Sensación de aislamiento y desinterés</td>
        <td><input type="radio" name="preg12" required="" value="3"></td>
        <td><input type="radio" name="preg12" required="" value="2"></td>
        <td><input type="radio" name="preg12" required="" value="1"></td>
        <td><input type="radio" name="preg12" required="" value="0"></td>
      </tr>
       <tr>
        <td>13</td>
        <td> Sentimiento de sobrecarga de trabajo</td>
        <td><input type="radio" name="preg13" required="" value="9"></td>
        <td><input type="radio" name="preg13" required="" value="6"></td>
        <td><input type="radio" name="preg13" required="" value="3"></td>
        <td><input type="radio" name="preg13" required="" value="0"></td>
      </tr>
       <tr>
        <td>14</td>
        <td> Dificultad para concentrarse, olvidos frecuentes </td>
        <td><input type="radio" name="preg14" required="" value="9"></td>
        <td><input type="radio" name="preg14" required="" value="6"></td>
        <td><input type="radio" name="preg14" required="" value="3"></td>
        <td><input type="radio" name="preg14" required="" value="0"></td>
      </tr>
       <tr>
        <td>15</td>
        <td> Aumento en el número de accidentes de trabajo </td>
        <td><input type="radio" name="preg15" required="" value="9"></td>
        <td><input type="radio" name="preg15" required="" value="6"></td>
        <td><input type="radio" name="preg15" required="" value="3"></td>
        <td><input type="radio" name="preg15" required="" value="0"></td>
      </tr>
       <tr>
        <td>16</td>
        <td> Sentimiento de frustración, de no haber hecho lo que se quería en la vida</td>
        <td><input type="radio" name="preg16" required="" value="6"></td>
        <td><input type="radio" name="preg16" required="" value="4"></td>
        <td><input type="radio" name="preg16" required="" value="2"></td>
        <td><input type="radio" name="preg16" required="" value="0"></td>
      </tr>
       <tr>
        <td>17</td>
        <td> Cansancio, tedio o desgano</td>
        <td><input type="radio" name="preg17" required="" value="6"></td>
        <td><input type="radio" name="preg17" required="" value="4"></td>
        <td><input type="radio" name="preg17" required="" value="2"></td>
        <td><input type="radio" name="preg17" required="" value="0"></td>
      </tr>
       <tr>
        <td>18</td>
        <td> Disminución del rendimiento en el trabajo o poca creatividad </td>
        <td><input type="radio" name="preg18" required="" value="6"></td>
        <td><input type="radio" name="preg18" required="" value="4"></td>
        <td><input type="radio" name="preg18" required="" value="2"></td>
        <td><input type="radio" name="preg18" required="" value="0"></td>
      </tr>
       <tr>
        <td>19</td>
        <td> Deseo de no asistir al trabajo</td>
        <td><input type="radio" name="preg19" required="" value="6"></td>
        <td><input type="radio" name="preg19" required="" value="4"></td>
        <td><input type="radio" name="preg19" required="" value="2"></td>
        <td><input type="radio" name="preg19" required="" value="0"></td>
      </tr>
       <tr>
        <td>20</td>
        <td> Bajo compromiso o poco interés con lo que se hace </td>
        <td><input type="radio" name="preg20" required="" value="3"></td>
        <td><input type="radio" name="preg20" required="" value="2"></td>
        <td><input type="radio" name="preg20" required="" value="1"></td>
        <td><input type="radio" name="preg20" required="" value="0"></td>
      </tr>
      <tr>
        <td>21</td>
        <td> Dificultad para tomar decisiones</td>
        <td><input type="radio" name="preg21" required="" value="3"></td>
        <td><input type="radio" name="preg21" required="" value="2"></td>
        <td><input type="radio" name="preg21" required="" value="1"></td>
        <td><input type="radio" name="preg21" required="" value="0"></td>
      </tr>
      <tr>
        <td>22</td>
        <td> Deseo de cambiar de empleo</td>
        <td><input type="radio" name="preg22" required="" value="3"></td>
        <td><input type="radio" name="preg22" required="" value="2"></td>
        <td><input type="radio" name="preg22" required="" value="1"></td>
        <td><input type="radio" name="preg22" required="" value="0"></td>
      </tr>
      <tr>
        <td>23</td>
        <td> Sentimiento de soledad y miedo</td>
        <td><input type="radio" name="preg23" required="" value="9"></td>
        <td><input type="radio" name="preg23" required="" value="6"></td>
        <td><input type="radio" name="preg23" required="" value="3"></td>
        <td><input type="radio" name="preg23" required="" value="0"></td>
      </tr>
      <tr>
        <td>24</td>
        <td> Sentimiento de irritabilidad, actitudes y pensamientos negativos</td>
        <td><input type="radio" name="preg24" required="" value="9"></td>
        <td><input type="radio" name="preg24" required="" value="6"></td>
        <td><input type="radio" name="preg24" required="" value="3"></td>
        <td><input type="radio" name="preg24" required="" value="0"></td>
      </tr>
      <tr>
        <td>25</td>
        <td> Sentimiento de angustia, preocupación o tristeza </td>
        <td><input type="radio" name="preg25" required="" value="6"></td>
        <td><input type="radio" name="preg25" required="" value="4"></td>
        <td><input type="radio" name="preg25" required="" value="2"></td>
        <td><input type="radio" name="preg25" required="" value="0"></td>
      </tr>
      <tr>
        <td>26</td>
        <td> Consumo de drogas para aliviar la tensión o los nervios </td>
        <td><input type="radio" name="preg26" required="" value="6"></td>
        <td><input type="radio" name="preg26" required="" value="4"></td>
        <td><input type="radio" name="preg26" required="" value="2"></td>
        <td><input type="radio" name="preg26" required="" value="0"></td>
      </tr>
      <tr>
        <td>27</td>
        <td> Sentimientos de que "no vale nada", o " no sirve para nada" </td>
        <td><input type="radio" name="preg27" required="" value="6"></td>
        <td><input type="radio" name="preg27" required="" value="4"></td>
        <td><input type="radio" name="preg27" required="" value="2"></td>
        <td><input type="radio" name="preg27" required="" value="0"></td>
      </tr>
      <tr>
        <td>28</td>
        <td> Consumo de bebidas alcohólicas o café o cigarrillo </td>
        <td><input type="radio" name="preg28" required="" value="6"></td>
        <td><input type="radio" name="preg28" required="" value="4"></td>
        <td><input type="radio" name="preg28" required="" value="2"></td>
        <td><input type="radio" name="preg28" required="" value="0"></td>
      </tr>
      <tr>
        <td>29</td>
        <td> Sentimiento de que está perdiendo la razón </td>
        <td><input type="radio" name="preg29" required="" value="3"></td>
        <td><input type="radio" name="preg29" required="" value="2"></td>
        <td><input type="radio" name="preg29" required="" value="1"></td>
        <td><input type="radio" name="preg29" required="" value="0"></td>
      </tr>
      <tr>
        <td>30</td>
        <td> Comportamientos rígidos, obstinación o terquedad </td>
        <td><input type="radio" name="preg30" required="" value="3"></td>
        <td><input type="radio" name="preg30" required="" value="2"></td>
        <td><input type="radio" name="preg30" required="" value="1"></td>
        <td><input type="radio" name="preg30" required="" value="0"></td>
      </tr>
      <tr>
        <td>31</td>
        <td> Sensación de no poder manejar los problemas de la vida</td>
        <td><input type="radio" name="preg31" required="" value="3"></td>
        <td><input type="radio" name="preg31" required="" value="2"></td>
        <td><input type="radio" name="preg31" required="" value="1"></td>
        <td><input type="radio" name="preg31" required="" value="0"></td>
      </tr>
    </tbody>
   </table>
   <hr>
   <div class="text-center">
     <button type="submit" class="btn btn-success"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Guardar y continuar</button>
   </div>      
  </form> 
</div>
<br><br>
</body>
</html>
<?php
}else{  
  exit();
}
?>

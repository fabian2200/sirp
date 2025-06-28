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
 $NueroEmpleados = 0;
 
 $empresa =  mysqli_fetch_array($con -> query("SELECT empresa from empresa WHERE idem = $idempresa"));
 $nombreempresa = $empresa[0];
?>
 <!DOCTYPE html>
 <html><head>
 	<title></title>
 	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css"> 
    br {
        line-height: 50%;
       }
     th {
      font-size: 16px;
      font-weight: bold;
      background-color: #E6C698;
      padding: 10px;
      border: 1px solid;
    }
    td{
      padding: 10px;
      border: 1px solid;
    }
    table {
      width: 100%;
      padding: 10px;
    }
    
    body {
        margin-top: 5px;
    }
  </style>
 </head><body>
 <h5><?php echo 'RESULTADOS DEL CUESTIONARIO INTRALABORAL FORMA A POR DEPARTAMENTO O AREA ' .$nombredepartamento; ?></h5>
  <!-- Dimension 1 -->
 <p> <strong>Dominio:</strong> Liderazgo y relaciones sociales en el trabajo y sus dimensiones <br>    
 </p>
 <div style="text-align: center;">
   <table>
    <tr>
      <th>DIMENSION</th>
      <th>Muy Alto</th>
      <th>Alto</th>
      <th>Medio</th>
      <th>Bajo</th>
      <th>Sin Riesgo</th>
    </tr>
  <?php
     $dim1 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=2");
    
     $sinr=0;
     $bajo=0;  
     $medi=0;
     $alto=0;
     $malt=0;

      while ($row = mysqli_fetch_array($dim1)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
          }   
          $NueroEmpleados = $NueroEmpleados + 1;
      }  
      
      $vector = array("Características del liderazgo",$malt,$alto,$medi,$bajo,$sinr);
  ?>
  <tr>
    <td><?php echo $vector[0] ?></td>
    <td><?php echo $vector[1] ?></td>
    <td><?php echo $vector[2] ?></td>
    <td><?php echo $vector[3] ?></td>
    <td><?php echo $vector[4] ?></td>
    <td><?php echo $vector[5] ?></td>
  </tr>
  <?php  
      $dim2 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=3");
    
     $sinr=0;
     $bajo=0;  
     $medi=0;
     $alto=0;
     $malt=0;

      while ($row = mysqli_fetch_array($dim2)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
          }   
      }  
      
      $vector2 = array("Relaciones sociales en el trabajo",$malt,$alto,$medi,$bajo,$sinr);
   ?>
  <tr>
    <td><?php echo $vector2[0] ?></td>
    <td><?php echo $vector2[1] ?></td>
    <td><?php echo $vector2[2] ?></td>
    <td><?php echo $vector2[3] ?></td>
    <td><?php echo $vector2[4] ?></td>
    <td><?php echo $vector2[5] ?></td>
  </tr>
   <?php  
      $dim3 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=4");
    
     $sinr=0;
     $bajo=0;  
     $medi=0;
     $alto=0;
     $malt=0;

      while ($row = mysqli_fetch_array($dim3)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
          }   
      }  
      
      $vector3 = array("Retroalimentación del desempeño",$malt,$alto,$medi,$bajo,$sinr);
     
   ?>
  <tr>
    <td><?php echo $vector3[0] ?></td>
    <td><?php echo $vector3[1] ?></td>
    <td><?php echo $vector3[2] ?></td>
    <td><?php echo $vector3[3] ?></td>
    <td><?php echo $vector3[4] ?></td>
    <td><?php echo $vector3[5] ?></td>
  </tr>
   <?php  
      $dim4 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=5");
    
     $sinr=0;
     $bajo=0;  
     $medi=0;
     $alto=0;
     $malt=0;

      while ($row = mysqli_fetch_array($dim4)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
          }   
      }  
      
      $vector4 = array("Relación con los colaboradores",$malt,$alto,$medi,$bajo,$sinr);
   ?> 
   <tr>
      <td><?php echo $vector4[0] ?></td>
      <td><?php echo $vector4[1] ?></td>
      <td><?php echo $vector4[2] ?></td>
      <td><?php echo $vector4[3] ?></td>
      <td><?php echo $vector4[4] ?></td>
      <td><?php echo $vector4[5] ?></td>
    </tr>
   <?php 
     $dom1 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=1");

     $sinr=0;
     $bajo=0;  
     $medi=0;
     $alto=0;
     $malt=0;

      while ($row = mysqli_fetch_array($dom1)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
          }   
      }  

     $d1 = array("Liderazgo y relaciones sociales en el trabajo y sus dimensiones", round(((($vector[1]+$vector2[1]+$vector3[1]+$vector4[1])/4)/$NueroEmpleados)*100,1),round(((($vector[2]+$vector2[2]+$vector3[2]+$vector4[2])/4)/$NueroEmpleados)*100,1),round(((($vector[3]+$vector2[3]+$vector3[3]+$vector4[3])/4)/$NueroEmpleados)*100,1),round(((($vector[4]+$vector2[4]+$vector3[4]+$vector4[4])/4)/$NueroEmpleados)*100,1),round(((($vector[5]+$vector2[5]+$vector3[5]+$vector4[5])/4)/$NueroEmpleados)*100,1));
   ?>
    <tr>
      <td><?php echo $d1[0] ?></td>
      <td><?php echo round(((($vector[1]+$vector2[1]+$vector3[1]+$vector4[1])/4)/$NueroEmpleados)*100,1)." %"; ?></td>
      <td><?php echo round(((($vector[2]+$vector2[2]+$vector3[2]+$vector4[2])/4)/$NueroEmpleados)*100,1)." %"; ?></td>
      <td><?php echo round(((($vector[3]+$vector2[3]+$vector3[3]+$vector4[3])/4)/$NueroEmpleados)*100,1)." %"; ?></td>
      <td><?php echo round(((($vector[4]+$vector2[4]+$vector3[4]+$vector4[4])/4)/$NueroEmpleados)*100,1)." %"; ?></td>
      <td><?php echo round(((($vector[5]+$vector2[5]+$vector3[5]+$vector4[5])/4)/$NueroEmpleados)*100,1)." %"; ?></td>
    </tr>"
    
    </table>
  </div>
  <!-- Dimension 5 -->
    <p>
     <strong>Dominio:</strong>Control sobre el trabajo<br>    
    </p>
    <br>
    <div style="text-align: center;">
    <table>
    <tr>
      <th>DIMENSION</th>
      <th>Muy Alto</th>
      <th>Alto</th>
      <th>Medio</th>
      <th>Bajo</th>
      <th>Sin Riesgo</th>
    </tr>
   <?php  
      $dim5 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=7");
    
     $sinr=0;
     $bajo=0;  
     $medi=0;
     $alto=0;
     $malt=0;

      while ($row = mysqli_fetch_array($dim5)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
          }   
      }  
      
      $vector = array("Claridad de rol", $malt,$alto,$medi,$bajo,$sinr);
   ?>
    <tr>
      <td><?php echo $vector[0] ?></td>
      <td><?php echo $vector[1] ?></td>
      <td><?php echo $vector[2] ?></td>
      <td><?php echo $vector[3] ?></td>
      <td><?php echo $vector[4] ?></td>
      <td><?php echo $vector[5] ?></td>
    </tr>
   <?php  
      $dim6 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=8");
    
     $sinr=0;
     $bajo=0;  
     $medi=0;
     $alto=0;
     $malt=0;

      while ($row = mysqli_fetch_array($dim6)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
          }   
      }  
      
      $vector2 = array("Capacitación",$malt,$alto,$medi,$bajo,$sinr);
     
   ?>
    <tr>
      <td><?php echo $vector2[0] ?></td>
      <td><?php echo $vector2[1] ?></td>
      <td><?php echo $vector2[2] ?></td>
      <td><?php echo $vector2[3] ?></td>
      <td><?php echo $vector2[4] ?></td>
      <td><?php echo $vector2[5] ?></td>
    </tr>
   <?php  
      $dim7 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=9");
    
     $sinr=0;
     $bajo=0;  
     $medi=0;
     $alto=0;
     $malt=0;

      while ($row = mysqli_fetch_array($dim7)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
          }   
      }  
      
      $vector3 = array("Participación y manejo del cambio",$malt,$alto,$medi,$bajo,$sinr);
   ?>
    <tr>
      <td><?php echo $vector3[0] ?></td>
      <td><?php echo $vector3[1] ?></td>
      <td><?php echo $vector3[2] ?></td>
      <td><?php echo $vector3[3] ?></td>
      <td><?php echo $vector3[4] ?></td>
      <td><?php echo $vector3[5] ?></td>
    </tr>
   <?php  
      $dim8 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=10");
    
     $sinr=0;
     $bajo=0;  
     $medi=0;
     $alto=0;
     $malt=0;

      while ($row = mysqli_fetch_array($dim8)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
          }   
      }  
      
      $vector4 = array("Oportunidades para el uso y desarrollo de habilidades y conocimientos", $malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);
   ?>
   <tr>
      <td><?php echo $vector4[0] ?></td>
      <td><?php echo $vector4[1] ?></td>
      <td><?php echo $vector4[2] ?></td>
      <td><?php echo $vector4[3] ?></td>
      <td><?php echo $vector4[4] ?></td>
      <td><?php echo $vector4[5] ?></td>
    </tr>
   <?php  
      $dim9 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=12");
    
     $sinr=0;
     $bajo=0;  
     $medi=0;
     $alto=0;
     $malt=0;

      while ($row = mysqli_fetch_array($dim9)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
          }   
      }  
      
      $vector5 = array("Control y autonomía sobre el trabajo", $malt,$alto,$medi,$bajo,$sinr);
    
   ?>
    <tr>
      <td><?php echo $vector5[0] ?></td>
      <td><?php echo $vector5[1] ?></td>
      <td><?php echo $vector5[2] ?></td>
      <td><?php echo $vector5[3] ?></td>
      <td><?php echo $vector5[4] ?></td>
      <td><?php echo $vector5[5] ?></td>
    </tr>
   <?php  
    $dom2 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=6");
    
    $sinr=0;
    $bajo=0;  
    $medi=0;
    $alto=0;
    $malt=0;

    while ($row = mysqli_fetch_array($dom2)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
          }   
    } 
      
    $d2 = array("Control sobre el trabajo",  round(((($vector[1]+$vector2[1]+$vector3[1]+$vector4[1]+$vector5[1])/5)/$NueroEmpleados)*100,1),round(((($vector[2]+$vector2[2]+$vector3[2]+$vector4[2]+$vector5[2])/5)/$NueroEmpleados)*100,1),round(((($vector[3]+$vector2[3]+$vector3[3]+$vector4[3]+$vector5[3])/5)/$NueroEmpleados)*100,1),round(((($vector[4]+$vector2[4]+$vector3[4]+$vector4[4]+$vector5[4])/5)/$NueroEmpleados)*100,1),round(((($vector[5]+$vector2[5]+$vector3[5]+$vector4[5]+$vector5[5])/5)/$NueroEmpleados)*100,1));
     
   ?>
     <tr>
      <td><?php echo $d2[0] ?></td>
      <td><?php echo round(((($vector[1]+$vector2[1]+$vector3[1]+$vector4[1]+$vector5[1])/5)/$NueroEmpleados)*100,1)."%"; ?></td>
      <td><?php echo round(((($vector[2]+$vector2[2]+$vector3[2]+$vector4[2]+$vector5[2])/5)/$NueroEmpleados)*100,1)."%"; ?></td>
      <td><?php echo round(((($vector[3]+$vector2[3]+$vector3[3]+$vector4[3]+$vector5[3])/5)/$NueroEmpleados)*100,1)."%"; ?></td>
      <td><?php echo round(((($vector[4]+$vector2[4]+$vector3[4]+$vector4[4]+$vector5[4])/5)/$NueroEmpleados)*100,1)."%"; ?></td>
      <td><?php echo round(((($vector[5]+$vector2[5]+$vector3[5]+$vector4[5]+$vector5[5])/5)/$NueroEmpleados)*100,1)."%"; ?></td>
    </tr>
  </table>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
    <p>
     <strong>Dominio:</strong> Demandas del trabajo<br>    
    </p>
    <br>
    <div style="text-align: center;">
    <table>
      <tr>
        <th>DIMENSION</th>
        <th>Muy Alto</th>
        <th>Alto</th>
        <th>Medio</th>
        <th>Bajo</th>
        <th>Sin Riesgo</th>
      </tr>
   <?php  
      $dim10 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=14");
    
     $sinr=0;
     $bajo=0;  
     $medi=0;
     $alto=0;
     $malt=0;

      while ($row = mysqli_fetch_array($dim10)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
          }   
      }  
      
      $vector = array("Demandas ambientales y de esfuerzo físico",$malt,$alto,$medi,$bajo,$sinr);
   ?>
    <tr>
      <td><?php echo $vector[0] ?></td>
      <td><?php echo $vector[1] ?></td>
      <td><?php echo $vector[2] ?></td>
      <td><?php echo $vector[3] ?></td>
      <td><?php echo $vector[4] ?></td>
      <td><?php echo $vector[5] ?></td>
    </tr>
   <?php  
      $dim11 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=15");
    
     $sinr=0;
     $bajo=0;  
     $medi=0;
     $alto=0;
     $malt=0;

      while ($row = mysqli_fetch_array($dim11)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
          }   
      }  
      
      $vector2 = array(" Demandas emocionales",$malt,$alto,$medi,$bajo,$sinr);
   ?>
   <tr>
      <td><?php echo $vector2[0] ?></td>
      <td><?php echo $vector2[1] ?></td>
      <td><?php echo $vector2[2] ?></td>
      <td><?php echo $vector2[3] ?></td>
      <td><?php echo $vector2[4] ?></td>
      <td><?php echo $vector2[5] ?></td>
    </tr>
   <?php  
      $dim12 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=16");
    
     $sinr=0;
     $bajo=0;  
     $medi=0;
     $alto=0;
     $malt=0;

      while ($row = mysqli_fetch_array($dim12)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
          }   
      }  
      
      $vector3 = array("Demandas cuantitativas",$malt,$alto,$medi,$bajo,$sinr);
   ?>
   <tr>
      <td><?php echo $vector3[0] ?></td>
      <td><?php echo $vector3[1] ?></td>
      <td><?php echo $vector3[2] ?></td>
      <td><?php echo $vector3[3] ?></td>
      <td><?php echo $vector3[4] ?></td>
      <td><?php echo $vector3[5] ?></td>
    </tr>
   <?php  
      $dim13 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=17");
    
     $sinr=0;
     $bajo=0;  
     $medi=0;
     $alto=0;
     $malt=0;

      while ($row = mysqli_fetch_array($dim13)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
          }   
      }  
      
      $vector4 = array("Influencia del trabajo sobre el entorno extralaboral",$malt,$alto,$medi,$bajo,$sinr);
      
   ?>
   <tr>
      <td><?php echo $vector4[0] ?></td>
      <td><?php echo $vector4[1] ?></td>
      <td><?php echo $vector4[2] ?></td>
      <td><?php echo $vector4[3] ?></td>
      <td><?php echo $vector4[4] ?></td>
      <td><?php echo $vector4[5] ?></td>
    </tr>
   <?php  
      $dim14 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=18");
    
     $sinr=0;
     $bajo=0;  
     $medi=0;
     $alto=0;
     $malt=0;

      while ($row = mysqli_fetch_array($dim14)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
          }   
      }  
      
      $vector5 = array("Exigencias de responsabilidad del cargo",$malt,$alto,$medi,$bajo,$sinr);
   ?>
   <tr>
      <td><?php echo $vector5[0] ?></td>
      <td><?php echo $vector5[1] ?></td>
      <td><?php echo $vector5[2] ?></td>
      <td><?php echo $vector5[3] ?></td>
      <td><?php echo $vector5[4] ?></td>
      <td><?php echo $vector5[5] ?></td>
    </tr>
   <?php  
      $dim15 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=19");
    
     $sinr=0;
     $bajo=0;  
     $medi=0;
     $alto=0;
     $malt=0;

      while ($row = mysqli_fetch_array($dim15)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
          }   
      }  
      
      $vector6 = array("Demandas de carga mental",$malt,$alto,$medi,$bajo,$sinr);
     
   ?>
   <tr>
      <td><?php echo $vector6[0] ?></td>
      <td><?php echo $vector6[1] ?></td>
      <td><?php echo $vector6[2] ?></td>
      <td><?php echo $vector6[3] ?></td>
      <td><?php echo $vector6[4] ?></td>
      <td><?php echo $vector6[5] ?></td>
    </tr>
   <?php  
      $dim16 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=20");
    
     $sinr=0;
     $bajo=0;  
     $medi=0;
     $alto=0;
     $malt=0;

      while ($row = mysqli_fetch_array($dim16)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
          }   
      }  
      
      $vector7 = array("Consistencia del rol",$malt,$alto,$medi,$bajo,$sinr);
   ?>
   <tr>
      <td><?php echo $vector7[0] ?></td>
      <td><?php echo $vector7[1] ?></td>
      <td><?php echo $vector7[2] ?></td>
      <td><?php echo $vector7[3] ?></td>
      <td><?php echo $vector7[4] ?></td>
      <td><?php echo $vector7[5] ?></td>
    </tr>
   <?php  
      $dim17 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=21");
    
     $sinr=0;
     $bajo=0;  
     $medi=0;
     $alto=0;
     $malt=0;

      while ($row = mysqli_fetch_array($dim17)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
          }   
      }  
      
      $vector8 = array("Demandas de la jornada de trabajo",$malt,$alto,$medi,$bajo,$sinr);
   ?>
    <tr>
      <td><?php echo $vector8[0] ?></td>
      <td><?php echo $vector8[1] ?></td>
      <td><?php echo $vector8[2] ?></td>
      <td><?php echo $vector8[3] ?></td>
      <td><?php echo $vector8[4] ?></td>
      <td><?php echo $vector8[5] ?></td>
    </tr>
   <?php  
      $dom3 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=13");
    
     $sinr=0;
     $bajo=0;  
     $medi=0;
     $alto=0;
     $malt=0;

      while ($row = mysqli_fetch_array($dom3)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
          }   
      }  
      
      $d3 = array("Demandas del trabajo",round(((($vector[1]+$vector2[1]+$vector3[1]+$vector4[1]+$vector5[1]+$vector6[1]+$vector7[1]+$vector8[1])/8)/$NueroEmpleados)*100,1),round(((($vector[2]+$vector2[2]+$vector3[2]+$vector4[2]+$vector5[2]+$vector6[2]+$vector7[2]+$vector8[2])/8)/$NueroEmpleados)*100,1),round(((($vector[3]+$vector2[3]+$vector3[3]+$vector4[3]+$vector5[3]+$vector6[3]+$vector7[3]+$vector8[3])/8)/$NueroEmpleados)*100,1),round(((($vector[4]+$vector2[4]+$vector3[4]+$vector4[4]+$vector5[4]+$vector6[4]+$vector7[4]+$vector8[4])/8)/$NueroEmpleados)*100,1),round(((($vector[5]+$vector2[5]+$vector3[5]+$vector4[5]+$vector5[5]+$vector6[5]+$vector7[5]+$vector8[5])/8)/$NueroEmpleados)*100,1));
   ?>
     <tr>
      <td><?php echo $d3[0] ?></td>
      <td><?php echo round(((($vector[1]+$vector2[1]+$vector3[1]+$vector4[1]+$vector5[1]+$vector6[1]+$vector7[1]+$vector8[1])/8)/$NueroEmpleados)*100,1)."%"; ?></td>
      <td><?php echo round(((($vector[2]+$vector2[2]+$vector3[2]+$vector4[2]+$vector5[2]+$vector6[2]+$vector7[2]+$vector8[2])/8)/$NueroEmpleados)*100,1)."%"; ?></td>
      <td><?php echo round(((($vector[3]+$vector2[3]+$vector3[3]+$vector4[3]+$vector5[3]+$vector6[3]+$vector7[3]+$vector8[3])/8)/$NueroEmpleados)*100,1)."%"; ?></td>
      <td><?php echo round(((($vector[4]+$vector2[4]+$vector3[4]+$vector4[4]+$vector5[4]+$vector6[4]+$vector7[4]+$vector8[4])/8)/$NueroEmpleados)*100,1)."%"; ?></td>
      <td><?php echo round(((($vector[5]+$vector2[5]+$vector3[5]+$vector4[5]+$vector5[5]+$vector6[5]+$vector7[5]+$vector8[5])/8)/$NueroEmpleados)*100,1)."%"; ?></td>
    </tr>
  </table>
  </div>
  <!-- dimension 18 -->
    <br>
    <p> 
     <strong>Dominio:</strong> Recompensas<br>
    </p>
    <br>
  <div style="text-align: left;">
    <table>
      <tr>
        <th>DIMENSION</th>
        <th>Muy Alto</th>
        <th>Alto</th>
        <th>Medio</th>
        <th>Bajo</th>
        <th>Sin Riesgo</th>
      </tr>
   <?php  
      $dim18 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=23");
    
     $sinr=0;
     $bajo=0;  
     $medi=0;
     $alto=0;
     $malt=0;

      while ($row = mysqli_fetch_array($dim18)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
          }   
      }  
      
      $vector = array("Recompensas derivadas de la pertenencia a la organización y del trabajo que se realiza",$malt,$alto,$medi,$bajo,$sinr);
   ?>
   <tr>
      <td><?php echo $vector[0] ?></td>
      <td><?php echo $vector[1] ?></td>
      <td><?php echo $vector[2] ?></td>
      <td><?php echo $vector[3] ?></td>
      <td><?php echo $vector[4] ?></td>
      <td><?php echo $vector[5] ?></td>
    </tr>
   <?php  
      $dim19 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=24");
    
     $sinr=0;
     $bajo=0;  
     $medi=0;
     $alto=0;
     $malt=0;

      while ($row = mysqli_fetch_array($dim19)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
          }   
      }  
      
      $vector2 = array("Reconocimiento y compensación",$malt,$alto,$medi,$bajo,$sinr);
      
   ?>
   <tr>
      <td><?php echo $vector2[0] ?></td>
      <td><?php echo $vector2[1] ?></td>
      <td><?php echo $vector2[2] ?></td>
      <td><?php echo $vector2[3] ?></td>
      <td><?php echo $vector2[4] ?></td>
      <td><?php echo $vector2[5] ?></td>
    </tr>
   <?php  
      $dom4 = $con -> query("SELECT * FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 AND `iddimension`=22");
    
     $sinr=0;
     $bajo=0;  
     $medi=0;
     $alto=0;
     $malt=0;

      while ($row = mysqli_fetch_array($dom4)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
          }   
      }  
      
      $d4 = array("Recompensas",round(((($vector[1]+$vector2[1])/2)/$NueroEmpleados)*100,1),round(((($vector[2]+$vector2[2])/2)/$NueroEmpleados)*100,1),round(((($vector[3]+$vector2[3])/2)/$NueroEmpleados)*100,1),round(((($vector[4]+$vector2[4])/2)/$NueroEmpleados)*100,1),round(((($vector[5]+$vector2[5])/2)/$NueroEmpleados)*100,1));
      
   ?>
   <tr>
      <td><?php echo $d4[0] ?></td>
      <td><?php echo round(((($vector[1]+$vector2[1])/2)/$NueroEmpleados)*100,1)."%"; ?></td>
      <td><?php echo round(((($vector[2]+$vector2[2])/2)/$NueroEmpleados)*100,1)."%"; ?></td>
      <td><?php echo round(((($vector[3]+$vector2[3])/2)/$NueroEmpleados)*100,1)."%"; ?></td>
      <td><?php echo round(((($vector[4]+$vector2[4])/2)/$NueroEmpleados)*100,1)."%"; ?></td>
      <td><?php echo round(((($vector[5]+$vector2[5])/2)/$NueroEmpleados)*100,1)."%"; ?></td>
    </tr>
    </table>
  </div>
  <br>
  <br>
  <h4 style="text-align: left;">RESULTADOS DEL CUESTIONARIO EXTRALABORAL POR DEPARTAMENTO O AREA  <?php echo $nombredepartamento  ?> </h4>
  </div>
  <br>
  <div style="text-align: left;">
    <table>
      <tr>
        <th>DIMENSION</th>
        <th>Muy Alto</th>
        <th>Alto</th>
        <th>Medio</th>
        <th>Bajo</th>
        <th>Sin Riesgo</th>
      </tr>
  <?php  
    $empleados_intra_a = $con->query("SELECT idempleado FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen` in (1) GROUP BY idempleado");

    //dimension 1 extralaboral
    $sinr=0;
    $bajo=0;  
    $medi=0;
    $alto=0;
    $malt=0;

    while ($row = mysqli_fetch_array($empleados_intra_a)) {
      //verificar si el empleado tiene estres
      $cantidad = mysqli_fetch_array($con->query("SELECT count(*) from calificacion WHERE idempleado = $row[0] and tipo_examen = 3 and iddimension = 46"));
      //fin
      if ($cantidad[0]>0) {
      $dim1extra = $con->query("SELECT * from calificacion WHERE idempleado = $row[0] and tipo_examen = 3 and iddimension = 46");
      while ($row = mysqli_fetch_array($dim1extra)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
                }
              }
          }   
      }
    }
    
      $vector = array("Tiempo fuera del trabajo",$malt,$alto,$medi,$bajo,$sinr);   
  ?>
  <tr>
      <td><?php echo $vector[0] ?></td>
      <td><?php echo $vector[1] ?></td>
      <td><?php echo $vector[2] ?></td>
      <td><?php echo $vector[3] ?></td>
      <td><?php echo $vector[4] ?></td>
      <td><?php echo $vector[5] ?></td>
    </tr>
   <?php  
    //dimension 2 extralaboral
    $sinr=0;
    $bajo=0;  
    $medi=0;
    $alto=0;
    $malt=0;

     $empleados_intra_a = $con->query("SELECT idempleado FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen` in (1) GROUP BY idempleado");

    while ($row = mysqli_fetch_array($empleados_intra_a)) {
      //verificar si el empleado tiene estres
      $cantidad = mysqli_fetch_array($con->query("SELECT count(*) from calificacion WHERE idempleado = $row[0] and tipo_examen = 3 and iddimension = 47"));
      //fin
      if ($cantidad[0]>0) {
      $dim2extra = $con->query("SELECT * from calificacion WHERE idempleado = $row[0] and tipo_examen = 3 and iddimension = 47");
      while ($row = mysqli_fetch_array($dim2extra)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                  }
              }
            }
          }   
      }
    }
    
      $vector2 = array("Relaciones familiares", $malt,$alto,$medi,$bajo,$sinr);  
  ?>
  <tr>
      <td><?php echo $vector2[0] ?></td>
      <td><?php echo $vector2[1] ?></td>
      <td><?php echo $vector2[2] ?></td>
      <td><?php echo $vector2[3] ?></td>
      <td><?php echo $vector2[4] ?></td>
      <td><?php echo $vector2[5] ?></td>
    </tr>
  <?php  
    //dimension 3 extralaboral
    $sinr=0;
    $bajo=0;  
    $medi=0;
    $alto=0;
    $malt=0;
     $empleados_intra_a = $con->query("SELECT idempleado FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen` in (1) GROUP BY idempleado");
    while ($row = mysqli_fetch_array($empleados_intra_a)) {
      //verificar si el empleado tiene estres
      $cantidad = mysqli_fetch_array($con->query("SELECT count(*) from calificacion WHERE idempleado = $row[0] and tipo_examen = 3 and iddimension = 48"));
      //fin
      if ($cantidad[0]>0) {
      $dim3extra = $con->query("SELECT * from calificacion WHERE idempleado = $row[0] and tipo_examen = 3 and iddimension = 48");
      while ($row = mysqli_fetch_array($dim3extra)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                    }
                  }
              }
          }   
      }
    }
    
      $vector3 = array("Comunicación y relaciones interpersonales",$malt,$alto,$medi,$bajo,$sinr);   
  ?>
 <tr>
      <td><?php echo $vector3[0] ?></td>
      <td><?php echo $vector3[1] ?></td>
      <td><?php echo $vector3[2] ?></td>
      <td><?php echo $vector3[3] ?></td>
      <td><?php echo $vector3[4] ?></td>
      <td><?php echo $vector3[5] ?></td>
    </tr>
  <?php  
    $sinr=0;
    $bajo=0;  
    $medi=0;
    $alto=0;
    $malt=0;
     $empleados_intra_a = $con->query("SELECT idempleado FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen` in (1) GROUP BY idempleado");
    while ($row = mysqli_fetch_array($empleados_intra_a)) {
      //verificar si el empleado tiene estres
      $cantidad = mysqli_fetch_array($con->query("SELECT count(*) from calificacion WHERE idempleado = $row[0] and tipo_examen = 3 and iddimension = 49"));
      //fin
      if ($cantidad[0]>0) {
      $dim4extra = $con->query("SELECT * from calificacion WHERE idempleado = $row[0] and tipo_examen = 3 and iddimension = 49");
      while ($row = mysqli_fetch_array($dim4extra)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                    }
                  }
              }
          }   
      }
    }
    
      $vector4 = array("Situación económica del grupo familiar",$malt,$alto,$medi,$bajo,$sinr);  
  ?>
 <tr>
      <td><?php echo $vector4[0] ?></td>
      <td><?php echo $vector4[1] ?></td>
      <td><?php echo $vector4[2] ?></td>
      <td><?php echo $vector4[3] ?></td>
      <td><?php echo $vector4[4] ?></td>
      <td><?php echo $vector4[5] ?></td>
    </tr>
  <?php  
    //dimension 5 extralaboral
    $sinr=0;
    $bajo=0;  
    $medi=0;
    $alto=0;
    $malt=0;

     $empleados_intra_a = $con->query("SELECT idempleado FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen` in (1) GROUP BY idempleado");

    while ($row = mysqli_fetch_array($empleados_intra_a)) {
      //verificar si el empleado tiene estres
      $cantidad = mysqli_fetch_array($con->query("SELECT count(*) from calificacion WHERE idempleado = $row[0] and tipo_examen = 3 and iddimension = 50"));
      //fin
      if ($cantidad[0]>0) {
      $dim5extra = $con->query("SELECT * from calificacion WHERE idempleado = $row[0] and tipo_examen = 3 and iddimension = 50");
      while ($row = mysqli_fetch_array($dim5extra)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                    }
                  }
              }
          }   
      }
    }
    
      $vector5 = array("Características de la vivienda y de su entorno",$malt,$alto,$medi,$bajo,$sinr);
  ?>
  <tr>
      <td><?php echo $vector5[0] ?></td>
      <td><?php echo $vector5[1] ?></td>
      <td><?php echo $vector5[2] ?></td>
      <td><?php echo $vector5[3] ?></td>
      <td><?php echo $vector5[4] ?></td>
      <td><?php echo $vector5[5] ?></td>
    </tr>
  <?php  
    //dimension 6 extralaboral
    $sinr=0;
    $bajo=0;  
    $medi=0;
    $alto=0;
    $malt=0;

     $empleados_intra_a = $con->query("SELECT idempleado FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen` in (1) GROUP BY idempleado");

    while ($row = mysqli_fetch_array($empleados_intra_a)) {
      //verificar si el empleado tiene estres
      $cantidad = mysqli_fetch_array($con->query("SELECT count(*) from calificacion WHERE idempleado = $row[0] and tipo_examen = 3 and iddimension = 51"));
      //fin
      if ($cantidad[0]>0) {
      $dim6extra = $con->query("SELECT * from calificacion WHERE idempleado = $row[0] and tipo_examen = 3 and iddimension = 51");
      while ($row = mysqli_fetch_array($dim6extra)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                    }
                  }
              }
          }   
      }
    }
    
      $vector6 = array("Influencia del entorno extralaboral sobre el trabajo",$malt,$alto,$medi,$bajo,$sinr);    
  ?>
  <tr>
      <td><?php echo $vector6[0] ?></td>
      <td><?php echo $vector6[1] ?></td>
      <td><?php echo $vector6[2] ?></td>
      <td><?php echo $vector6[3] ?></td>
      <td><?php echo $vector6[4] ?></td>
      <td><?php echo $vector6[5] ?></td>
    </tr>
  <?php  
    //dimension 7 extralaboral
    $sinr=0;
    $bajo=0;  
    $medi=0;
    $alto=0;
    $malt=0;

     $empleados_intra_a = $con->query("SELECT idempleado FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen` in (1) GROUP BY idempleado");

    while ($row = mysqli_fetch_array($empleados_intra_a)) {
      //verificar si el empleado tiene estres
      $cantidad = mysqli_fetch_array($con->query("SELECT count(*) from calificacion WHERE idempleado = $row[0] and tipo_examen = 3 and iddimension = 52"));
      //fin
      if ($cantidad[0]>0) {
      $dim7extra = $con->query("SELECT * from calificacion WHERE idempleado = $row[0] and tipo_examen = 3 and iddimension = 52");
      while ($row = mysqli_fetch_array($dim7extra)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                    }
                  }
              }
          }   
      }
    }
    
      $vector7 = array(" Desplazamiento vivienda – trabajo – vivienda",$malt,$alto,$medi,$bajo,$sinr);
  ?>
    <tr>
      <td><?php echo $vector7[0] ?></td>
      <td><?php echo $vector7[1] ?></td>
      <td><?php echo $vector7[2] ?></td>
      <td><?php echo $vector7[3] ?></td>
      <td><?php echo $vector7[4] ?></td>
      <td><?php echo $vector7[5] ?></td>
    </tr>
    <tr>
      <td>Total</td>
      <td><?php echo round(((($vector[1]+$vector2[1]+$vector3[1]+$vector4[1]+$vector5[1]+$vector6[1]+$vector7[1])/7)/$NueroEmpleados)*100,1)."%"; ?></td>
      <td><?php echo round(((($vector[2]+$vector2[2]+$vector3[2]+$vector4[2]+$vector5[2]+$vector6[2]+$vector7[2])/7)/$NueroEmpleados)*100,1)."%"; ?></td>
      <td><?php echo round(((($vector[3]+$vector2[3]+$vector3[3]+$vector4[3]+$vector5[3]+$vector6[3]+$vector7[3])/7)/$NueroEmpleados)*100,1)."%"; ?></td>
      <td><?php echo round(((($vector[4]+$vector2[4]+$vector3[4]+$vector4[4]+$vector5[4]+$vector6[4]+$vector7[4])/7)/$NueroEmpleados)*100,1)."%"; ?></td>
      <td><?php echo round(((($vector[5]+$vector2[5]+$vector3[5]+$vector4[5]+$vector5[5]+$vector6[5]+$vector7[5])/7)/$NueroEmpleados)*100,1)."%"; ?></td>
    </tr>
   </table>
  </div>
  <div>
  <br>
  <br>
  <h4 style="text-align: left;">RESULTADOS DEL CUESTIONARIO ESTRÉS POR DEPARTAMENTO O AREA  <?php echo $nombredepartamento  ?> </h4>
  <br>
    <div style="text-align: center;">
      <table>
      <tr>
        <th>DIMENSION</th>
        <th>Muy Alto</th>
        <th>Alto</th>
        <th>Medio</th>
        <th>Bajo</th>
        <th>Sin Riesgo</th>
      </tr>
   <?php  
    //dimension 1 estres
    $sinr=0;
    $bajo=0;  
    $medi=0;
    $alto=0;
    $malt=0;
     $empleados_intra_a = $con->query("SELECT idempleado FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen` in (1) GROUP BY idempleado");
    while ($row = mysqli_fetch_array($empleados_intra_a)) {
      //verificar si el empleado tiene estres
      $cantidad = mysqli_fetch_array($con->query("SELECT count(*) from calificacion WHERE idempleado = $row[0] and tipo_examen = 4 and iddimension = 54"));
      //fin
      if ($cantidad[0]>0) {
      $estresdim1 = $con->query("SELECT * from calificacion WHERE idempleado = $row[0] and tipo_examen = 4 and iddimension = 54");
      while ($row = mysqli_fetch_array($estresdim1)) {
        if ($row[6]=="Sin riesgo") {
               $sinr = $sinr+1;
          }else{
              if ($row[6]=="Bajo") {
                  $bajo = $bajo+1;
              }else{
                  if ($row[6]=="Medio") {
                      $medi = $medi + 1;
                  }else{
                      if ($row[6]=="Alto") {
                          $alto = $alto+1;
                      }else{
                          $malt=$malt+1;
                      }
                    }
                  }
              }
          }   
      }
    }
    
      $vector = array("Total general sintomas de Estrés",$malt,$alto,$medi,$bajo,$sinr);
      
  ?>
  <tr>
    <td><?php echo $vector[0] ?></td>
    <td><?php echo $vector[1] ?></td>
    <td><?php echo $vector[2] ?></td>
    <td><?php echo $vector[3] ?></td>
    <td><?php echo $vector[4] ?></td>
    <td><?php echo $vector[5] ?></td>
  </tr>
  <tr>
      <td>Total</td>
      <td><?php echo round(((($vector[1])/1)/$NueroEmpleados)*100,1)."%"; ?></td>
      <td><?php echo round(((($vector[2])/1)/$NueroEmpleados)*100,1)."%"; ?></td>
      <td><?php echo round(((($vector[3])/1)/$NueroEmpleados)*100,1)."%"; ?></td>
      <td><?php echo round(((($vector[4])/1)/$NueroEmpleados)*100,1)."%"; ?></td>
      <td><?php echo round(((($vector[5])/1)/$NueroEmpleados)*100,1)."%"; ?></td>
    </tr>
  </table>
  </div>
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
 <h5><?php echo 'CONSOLIDADO CUESTIONARIO INTRALABORAL FORMA A POR DEPARTAMENTO O AREA ' .$nombredepartamento; ?></h5>
 </p>
 <div style="text-align: center;">
   <table>
    <tr>
      <th>DOMINIO</th>
      <th>Muy Alto</th>
      <th>Alto</th>
      <th>Medio</th>
      <th>Bajo</th>
      <th>Sin Riesgo</th>
    </tr>
    <tr>
        <td><?php echo $d1[0]."%" ?></td>
        <td><?php echo $d1[1]."%"?></td>
        <td><?php echo $d1[2]."%" ?></td>
        <td><?php echo $d1[3]."%" ?></td>
        <td><?php echo $d1[4]."%" ?></td>
        <td><?php echo $d1[5]."%" ?></td>
      </tr>
      <tr>
        <td><?php echo $d2[0]."%" ?></td>
        <td><?php echo $d2[1]."%" ?></td>
        <td><?php echo $d2[2]."%" ?></td>
        <td><?php echo $d2[3]."%" ?></td>
        <td><?php echo $d2[4]."%" ?></td>
        <td><?php echo $d2[5]."%" ?></td>
      </tr>
      <tr>
        <td><?php echo $d3[0]."%" ?></td>
        <td><?php echo $d3[1]."%" ?></td>
        <td><?php echo $d3[2]."%" ?></td>
        <td><?php echo $d3[3]."%" ?></td>
        <td><?php echo $d3[4]."%" ?></td>
        <td><?php echo $d3[5]."%" ?></td>
      </tr>
      <tr>
        <td><?php echo $d4[0]."%" ?></td>
        <td><?php echo $d4[1]."%" ?></td>
        <td><?php echo $d4[2]."%" ?></td>
        <td><?php echo $d4[3]."%" ?></td>
        <td><?php echo $d4[4]."%" ?></td>
        <td><?php echo $d4[5]."%" ?></td>
      </tr>
  </table>
  </div>
 </body></html>
<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$ruta = "archivos/$nombrecliente[0]";
if (!file_exists($ruta)) {
  mkdir("archivos/$nombrecliente[0]", 0755);
}

$ruta2 = "archivos/$nombrecliente[0]/$nombreempresa";
if (!file_exists($ruta2)) {
   mkdir("archivos/$nombrecliente[0]/$nombreempresa", 0755);
}

$rutaGuardado = "archivos/$nombrecliente[0]/$nombreempresa/";
$dompdf = new DOMPDF();
$dompdf->set_paper("letter", "portrait");
$dompdf->load_html(ob_get_clean());
$dompdf->set_paper(array(0, 0, 570, 860), 'portrait');
$dompdf->render();
$pdf = $dompdf->output();
$filename = "general_intra_A_".$nombredepartamento2."_".$iddepartamento.".pdf";
file_put_contents($rutaGuardado.$filename, $pdf); 
echo "";
//$dompdf->stream($filename); 

?>
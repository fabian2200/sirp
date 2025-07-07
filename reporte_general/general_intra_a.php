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
  </style>
 </head><body>
 <h4><?php echo 'RESULTADOS DEL CUESTIONARIO INTRALABORAL FORMA A POR DEPARTAMENTO O AREA ' .$nombredepartamento; ?></h4>
 <br>
 <!-- Dimension 1 -->
 <p> <strong>Dominio:</strong> Liderazgo y relaciones sociales en el trabajo y sus dimensiones <br>    
     <strong>Dimension:</strong> Características del liderazgo <br>
 </p>
 <div style="text-align: left;">
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
      }  
      
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
   ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
   <!-- Dimension 2 -->
   <br>
   <br>
   <br>
    <p>
     <strong>Dimension:</strong> Relaciones sociales en el trabajo <br>
    </p>
    <br>
  <div style="text-align: left;">
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
      
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
   ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
   <!-- Dimension 3 -->
   <br>
    <p>
     <strong>Dimension:</strong> Retroalimentación del desempeño <br>
    </p>
    <br>
    <div style="text-align: left;">
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
      
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
   ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
  <!-- Dimension 4 -->
   <br>
    <h4><?php echo 'RESULTADOS DEL CUESTIONARIO INTRALABORAL FORMA A POR DEPARTAMENTO O AREA ' .$nombredepartamento; ?></h4>
     <br>
    <p>
     <strong>Dimension:</strong>Relación con los colaboradores<br>
    </p>
    <br>
    <div style="text-align: left;">
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
      
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
   ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
  <!-- Dominio 1 -->
   <br>
    <p>
     <strong>Total Dominio:</strong>Liderazgo y relaciones sociales en el trabajo<br>
    </p>
    <br>
    <div style="text-align: left;">
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
      
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
   ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
  <!-- Dimension 5 -->
    <p>
     <strong>Dominio:</strong>Control sobre el trabajo<br>    
     <strong>Dimension:</strong> Claridad de rol<br>
    </p>
    <br>
    <div style="text-align: left;">
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
      
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
   ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
  <br>
  <!-- Dimension 6 -->
    <h4><?php echo 'RESULTADOS DEL CUESTIONARIO INTRALABORAL FORMA A POR DEPARTAMENTO O AREA ' .$nombredepartamento; ?></h4>
     <br>
    <p>     
     <strong>Dimension:</strong>Capacitación<br>
    </p>
    <br>
    <div style="text-align: left;">
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
      
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
   ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
  <!-- Dimension 7 -->
    <br>
    <p>     
     <strong>Dimension:</strong>Participación y manejo del cambio<br>
    </p>
    <br>
    <div style="text-align: left;">
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
      
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
   ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
   <!-- Dimension 8 -->
    <br>
    <p>     
     <strong>Dimension:</strong>Oportunidades para el uso y desarrollo de habilidades y conocimientos<br>
    </p>
    <br>
    <div style="text-align: left;">
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
      
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
   ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
   <br>
   <br>
   <br>
  <!-- Dimension 9 -->
    <h4><?php echo 'RESULTADOS DEL CUESTIONARIO INTRALABORAL FORMA A POR DEPARTAMENTO O AREA ' .$nombredepartamento; ?></h4>
     <br>
    <p>     
     <strong>Dimension:</strong> Control y autonomía sobre el trabajo<br>
    </p>
    <br>
    <div style="text-align: left;">
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
      
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
   ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
  <!-- dominio 2 -->
    <br>
    <p>     
     <strong>Total Dominio: </strong>Control sobre el trabajo<br>
    </p>
    <br>
    <div style="text-align: left;">
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
      
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
   ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
  <!-- Dimension 10 -->
    <br>
    <p>
     <strong>Dominio:</strong> Demandas del trabajo<br>    
     <strong>Dimension:</strong> Demandas ambientales y de esfuerzo físico<br>
    </p>
    <br>
    <div style="text-align: left;">
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
      
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
   ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
  <!-- Dimension 11 -->
    <br>
    <h4><?php echo 'RESULTADOS DEL CUESTIONARIO INTRALABORAL FORMA A POR DEPARTAMENTO O AREA ' .$nombredepartamento; ?></h4>
    <p>  
     <strong>Dimension:</strong> Demandas emocionales<br>
    </p>
    <br>
    <div style="text-align: left;">
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
      
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
   ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
  <!-- Dimension 12 -->
    <br>
    <p>  
     <strong>Dimension:</strong> Demandas cuantitativas<br>
    </p>
    <br>
    <div style="text-align: left;">
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
      
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
   ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
  <!-- Dimension 13 -->
    <br>
    <p>  
     <strong>Dimension:</strong> Influencia del trabajo sobre el entorno extralaboral<br>
    </p>
    <br>
    <div style="text-align: left;">
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
      
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
   ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
  <!-- Dimension 14 -->
    <br>
    <h4><?php echo 'RESULTADOS DEL CUESTIONARIO INTRALABORAL FORMA A POR DEPARTAMENTO O AREA ' .$nombredepartamento; ?></h4>
    <br>
    <p>  
     <strong>Dimension:</strong> Exigencias de responsabilidad del cargo<br>
    </p>
    <br>
    <div style="text-align: left;">
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
      
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
   ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
  <!-- Dimension 15 -->
    <br>
    <p>  
     <strong>Dimension:</strong> Demandas de carga mental<br>
    </p>
    <br>
    <div style="text-align: left;">
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
      
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
   ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
  <!-- Dimension 16 -->
    <br>
    <p>  
     <strong>Dimension:</strong> Consistencia del rol<br>
    </p>
    <br>
    <div style="text-align: left;">
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
      
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
   ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
  <!-- Dimension 17 -->
    <br>
    <br>
    <h4><?php echo 'RESULTADOS DEL CUESTIONARIO INTRALABORAL FORMA A POR DEPARTAMENTO O AREA ' .$nombredepartamento; ?></h4>
    <br>
    <p>  
     <strong>Dimension:</strong> Demandas de la jornada de trabajo<br>
    </p>
    <br>
    <div style="text-align: left;">
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
      
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
   ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
  <!-- dominio 3 -->
    <br>
    <p> 
     <strong>Total Dominio:</strong>Demandas del trabajo<br>
    </p>
    <br>
    <div style="text-align: left;">
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
      
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
   ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
  <!-- dimension 18 -->
    <br>
    <p> 
     <strong>Dominio:</strong> Recompensas<br>
     <strong>Dimension:</strong> Recompensas derivadas de la pertenencia a la organización y del trabajo que se realiza<br>
    </p>
    <br>
    <div style="text-align: left;">
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
      
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
   ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
  <!-- dimension 19 -->
    <br>
    <br>
    <h4><?php echo 'RESULTADOS DEL CUESTIONARIO INTRALABORAL FORMA A POR DEPARTAMENTO O AREA ' .$nombredepartamento; ?></h4>
    <br>
    <p> 
     <strong>Dimension:</strong> Reconocimiento y compensación<br>
    </p>
    <br>
    <div style="text-align: left;">
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
      
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
   ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
   <!-- dominio 4 -->
    <br>
    <p> 
     <strong>Total Dominio: </strong>Recompensas<br>
    </p>
    <br>
    <div style="text-align: left;">
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
      
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
   ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
  <br>
  <div>
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
  <h4 style="text-align: left;">RESULTADOS DEL CUESTIONARIO EXTRALABORAL POR DEPARTAMENTO O AREA  <?php echo $nombredepartamento  ?> </h4>
  </div>
  <br>
  <?php  
    $empleados_intra_a = $con->query("SELECT idempleado FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 GROUP BY idempleado");
  ?>
   <br>
    <p> 
     <strong>Dimension: </strong> Tiempo fuera del trabajo<br>
    </p>
    <br>
    <div style="text-align: left;">
   <?php  
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
    
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

     if ($mayor!=0) {
      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
    }else{
      $tamaño1 = 0;
      $tamaño2 = 0;
      $tamaño3 = 0;
      $tamaño4 = 0;
      $tamaño5 = 0;
    }
  ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
  <br>
    <p> 
     <strong>Dimension: </strong> Relaciones familiares<br>
    </p>
    <br>
    <div style="text-align: left;">
   <?php  
    //dimension 2 extralaboral
    $sinr=0;
    $bajo=0;  
    $medi=0;
    $alto=0;
    $malt=0;
     $empleados_intra_a = $con->query("SELECT idempleado FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 GROUP BY idempleado");
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
    
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      if ($mayor!=0) {
      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
    }else{
      $tamaño1 = 0;
      $tamaño2 = 0;
      $tamaño3 = 0;
      $tamaño4 = 0;
      $tamaño5 = 0;
    }
  ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
    <br>
    <p> 
     <strong>Dimension: </strong> Comunicación y relaciones interpersonales<br>
    </p>
    <br>
    <div style="text-align: left;">
   <?php  
    //dimension 3 extralaboral
    $sinr=0;
    $bajo=0;  
    $medi=0;
    $alto=0;
    $malt=0;
     $empleados_intra_a = $con->query("SELECT idempleado FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 GROUP BY idempleado");
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
    
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      if ($mayor!=0) {
      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
    }else{
      $tamaño1 = 0;
      $tamaño2 = 0;
      $tamaño3 = 0;
      $tamaño4 = 0;
      $tamaño5 = 0;
    }
  ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
    <br>
    <br>
     <h4 style="text-align: left;">RESULTADOS DEL CUESTIONARIO EXTRALABORAL POR DEPARTAMENTO O AREA  <?php echo $nombredepartamento  ?> </h4>
    <br>
    <p> 
     <strong>Dimension: </strong> Situación económica del grupo familiar<br>
    </p>
    <br>
    <div style="text-align: left;">
   <?php  
    //dimension 4 extralaboral
    $sinr=0;
    $bajo=0;  
    $medi=0;
    $alto=0;
    $malt=0;
     $empleados_intra_a = $con->query("SELECT idempleado FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 GROUP BY idempleado");
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
    
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      if ($mayor!=0) {
      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
    }else{
      $tamaño1 = 0;
      $tamaño2 = 0;
      $tamaño3 = 0;
      $tamaño4 = 0;
      $tamaño5 = 0;
    }
  ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
  <br>
    <p> 
     <strong>Dimension: </strong> Características de la vivienda y de su entorno<br>
    </p>
    <br>
    <div style="text-align: left;">
   <?php  
    //dimension 5 extralaboral
    $sinr=0;
    $bajo=0;  
    $medi=0;
    $alto=0;
    $malt=0;
     $empleados_intra_a = $con->query("SELECT idempleado FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 GROUP BY idempleado");
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
    
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      if ($mayor!=0) {
      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
    }else{
      $tamaño1 = 0;
      $tamaño2 = 0;
      $tamaño3 = 0;
      $tamaño4 = 0;
      $tamaño5 = 0;
    }
  ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
  <br>
    <p> 
     <strong>Dimension: </strong> Influencia del entorno extralaboral sobre el trabajo<br>
    </p>
    <br>
    <div style="text-align: left;">
   <?php  
    //dimension 6 extralaboral
    $sinr=0;
    $bajo=0;  
    $medi=0;
    $alto=0;
    $malt=0;
     $empleados_intra_a = $con->query("SELECT idempleado FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 GROUP BY idempleado");
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
    
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      if ($mayor!=0) {
      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
    }else{
      $tamaño1 = 0;
      $tamaño2 = 0;
      $tamaño3 = 0;
      $tamaño4 = 0;
      $tamaño5 = 0;
    }
  ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
  <br>
    <br>
     <h4 style="text-align: left;">RESULTADOS DEL CUESTIONARIO EXTRALABORAL POR DEPARTAMENTO O AREA  <?php echo $nombredepartamento  ?> </h4>
    <br>
    <p> 
     <strong>Dimension: </strong> Desplazamiento vivienda – trabajo – vivienda<br>
    </p>
    <br>
    <div style="text-align: left;">
   <?php  
    //dimension 7 extralaboral
    $sinr=0;
    $bajo=0;  
    $medi=0;
    $alto=0;
    $malt=0;
     $empleados_intra_a = $con->query("SELECT idempleado FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 GROUP BY idempleado");
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
    
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      if ($mayor!=0) {
      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
    }else{
      $tamaño1 = 0;
      $tamaño2 = 0;
      $tamaño3 = 0;
      $tamaño4 = 0;
      $tamaño5 = 0;
    }
  ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
  <div>
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
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <h4 style="text-align: left;">RESULTADOS DEL CUESTIONARIO ESTRÉS POR DEPARTAMENTO O AREA  <?php echo $nombredepartamento  ?> </h4>
  </div>
  <br>
    <p> 
     <strong>Dimension: </strong> Total general sintomas de Estrés<br>
    </p>
    <br>
    <div style="text-align: left;">
   <?php  
    //dimension 1 estres
    $sinr=0;
    $bajo=0;  
    $medi=0;
    $alto=0;
    $malt=0;
     $empleados_intra_a = $con->query("SELECT idempleado FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 GROUP BY idempleado");
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
    
      $vector = array($malt,$alto,$medi,$bajo,$sinr);
      $mayor  = max($vector);

      if ($mayor!=0) {
      $tamaño1 = round(($vector[0]/$mayor)*600);
      $tamaño2 = round(($vector[1]/$mayor)*600);
      $tamaño3 = round(($vector[2]/$mayor)*600);
      $tamaño4 = round(($vector[3]/$mayor)*600);
      $tamaño5 = round(($vector[4]/$mayor)*600);
    }else{
      $tamaño1 = 0;
      $tamaño2 = 0;
      $tamaño3 = 0;
      $tamaño4 = 0;
      $tamaño5 = 0;
    }
  ?>
   <img src="img/muyalto.jpg" width="<?php echo $tamaño1 ?>" height="20"><span><?php echo " ".$vector[0]; ?> </span><br><br>
   <img src="img/alto.jpg" width="<?php echo $tamaño2 ?>" height="20"><span><?php echo " ".$vector[1]; ?> </span><br><br>
   <img src="img/medio.jpg" width="<?php echo $tamaño3 ?>" height="20"><span><?php echo " ".$vector[2]; ?> </span><br><br>
   <img src="img/bajo.jpg" width="<?php echo $tamaño4 ?>" height="20"><span><?php echo " ".$vector[3]; ?> </span><br><br>
   <img src="img/sinriesgo.jpg" width="<?php echo $tamaño5 ?>" height="20"><span><?php echo " ".$vector[4]; ?> </span><br><br><br><br>
   <div style="text-align: center">
     <pre>
     <img src="img/muyalto.jpg" height="10"><span> Muy alto    </span><img src="img/alto.jpg" height="10"><span> Alto    </span><img src="img/medio.jpg" height="10"><span> Medio  </span><img src="img/bajo.jpg" height="10"><span> Bajo    </span> <img src="img/sinriesgo.jpg" height="10"><span> Sin riesgo   </span>
   </pre>
   </div>
  </div>
 </body></html>
<?php


?>
<?php
session_start();
include_once("../conexion.php");
if(($_SESSION['logueado']) == true){ 
 $id = $_SESSION['id'];
 $sql4="SELECT * FROM `empresa` WHERE idcl = $id";
 $resultado4 = $con -> query($sql4);
?> 
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Informe Sociodemografico</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <iframe id="iframe_modal" src="" width="100%" height="700px"></iframe>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fas fa-times"></i></button>
        </div>
        
      </div>
    </div>
  </div>

<div class="container">
  <br>
  <h2 style="text-align: center">Gestion de Informes</h2>
  <hr>
  <div class="alert alert-danger" role="alert">
    <strong>Importante!</strong> usted podra descargar <strong>3 veces</strong> el informe sociodemografico, y el informe general por departamento, de cada una de sus empresas.
  </div>  
  <hr>          
  <table class="table table-bordered">
    <thead>
      <tr>
        <th style="text-align: center">Empresa</th>
        <th style="text-align: center">Individual</th>
        <th style="text-align: center">Sociodemografico</th>
        <th style="text-align: center;" colspan="2" >Informe general  por departamento</th>
       
      </tr>
    </thead>
    <tbody>
      <?php  
        while ($row = mysqli_fetch_array($resultado4)) {
      ?>
      <tr>
        <td style="text-align: center"><br><br><a class="btn btn-info disabled"><?php echo $row[2] ?></a></td>
        <td style="text-align: center"><br><br><a class="btn btn-info" href="ver_empleados.php?idempr=<?php echo $row[0] ?>"><span><i class="fa fa-external-link" aria-hidden="true"></i></span> Gestionar</a></td>
        <td style="text-align: center">
          <br>
          <br>
          <?php
            if(($row[3]-$row[4])>0){
               echo "Empleados asignados: <strong>".$row[3]."</strong> Empleados registrados: <strong>".$row[4]."</strong>";
            }else{
            $sql="SELECT * FROM `empleado` WHERE idempresa = $row[0]";
            $resultado = $con -> query($sql);
            $sql2="SELECT COUNT(*) FROM `empleado` WHERE idempresa = $row[0]";
            $resultado2 = mysqli_fetch_array($con -> query($sql2));
            $cont = 0;
            while ($row2 = mysqli_fetch_array($resultado)) {
              if ($row2[28]!=1 && $row2[35]!=1 && $row2[40]!=1 && $row2[42]!=1) {
                $cont = $cont+1;
              }
            }
              if ($cont==$resultado2[0]) {
                if ($row[9]<3) {          
          ?>
              <a type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" onclick="cambiar_ruta_iframe('<?php echo $row[0] ?>', '<?php echo $id ?>')"><span><i class="fa fa-file-text" aria-hidden="true"></i></span> Generar Informe</a><br><br>
          <?php
               } 
              
          ?>
             <br>
              <p>Informes Generados: <strong><?php echo $row[9]; ?></strong></p>
          <?php     
              }else{
                 echo "La empresa tiene empleados a los que todavia no se les ha aplicado algun test."; 
              }
          }
          ?>
        </td>
        <td style="text-align: center"> 
          <strong>Generar</strong><br>
          <?php 
              
            $departamentos = $con->query("SELECT e.areatrabajo,d.nombre,COUNT(*) FROM `empleado` e INNER JOIN departamentos d ON e.areatrabajo = d.iddepto WHERE e.idempresa=$row[0] GROUP BY e.areatrabajo");

            while ($rowd = mysqli_fetch_array($departamentos)) { 
              $cantidadgenerada = $con->query("SELECT COUNT(*),`nombre_archivo` FROM `informe_general` WHERE id_departamento = $rowd[0] and id_empresa = $row[0] GROUP BY id_departamento, id_empresa, nombre_archivo");
          ?>
               <hr>
               <a class="btn btn-info" href="../reporte_general/intermedio.php?dpto=<?php echo $rowd[0] ?>&empr=<?php echo $row[0] ?>&idcli=<?php echo $id ?>" ><span><i class="fa fa-caret-right" aria-hidden="true"></i> </span><?php echo $rowd[1];?></a><br>
               <br>
         <?php  
              
            }   
          ?>
        </td>
        <td style="text-align: center">
            <strong>Descargar</strong><br><br>
          <?php  
               $departamentos = $con->query("SELECT e.areatrabajo,d.nombre,COUNT(*) FROM `empleado` e INNER JOIN departamentos d ON e.areatrabajo = d.iddepto WHERE e.idempresa=$row[0] GROUP BY e.areatrabajo");

                while ($rowd = mysqli_fetch_array($departamentos)) { 
                  $cantidadgenerada = $con->query("SELECT COUNT(*),`nombre_archivo` FROM `informe_general` WHERE id_departamento = $rowd[0] and id_empresa = $row[0] GROUP BY id_departamento, id_empresa, nombre_archivo");
                  if ($cantidadgenerada->num_rows > 0) {
          ?> 
                  <a download  class="btn btn-success" href="../reporte_general/archivos/<?php echo $_SESSION['nombre']; ?>/<?php echo $row[2] ?>/<?php echo $cantidadgenerada->fetch_assoc()['nombre_archivo']; ?>"><i class="fa fa-download"></i> <?php echo $rowd[1]; ?></a><br><br>
          <?php 
                 }
               }
           ?> 
        </td>
      </tr>
      <?php  
        }
      ?>
    </tbody>
  </table>
  <br>
  <hr>
   <p>Atencion: los informes por departamento y el sociodemografico se descargaran en formato PDF, si desea convertirlos a WORD haga click en el siguiente enlace:</p><a class="btn btn-danger" target="_blank" href="https://www.ilovepdf.com/es/pdf_a_word"><i class="fa fa-external-link" aria-hidden="true"></i><span>I love PDF</span></a>
   <br>
  <hr>
</div>
<script>
  function cambiar_ruta_iframe(id_emp, id_cli) {
    debugger;
    document.getElementById('iframe_modal').src = '../reporte_sociodemografico/sociodemografico.php?id_emp='+id_emp+'&id_cli='+id_cli;
  }
</script>
</body>
</html>

<?php
}else{  
  exit();
}
?>

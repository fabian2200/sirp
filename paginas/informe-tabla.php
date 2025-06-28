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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    td, th {
        vertical-align: middle;
    }
</style>
<body>
   
<div class="container">
  <hr>
  <h2 style="text-align: center">Gestion de Informes</h2>
  <div class="alert alert-danger" role="alert">
    <strong>Importante!</strong> Importante: usted podra generar <strong>3</strong> informes tipo tablas.
  </div>  
  <hr>          
  <table class="table table-bordered">
    <thead>
      <tr>
        <th style="text-align: center">Empresa</th>
        <th style="text-align: center;">General <br> por departamento</th>
        <th style="text-align: center;">Descarga <br> general</th>
      </tr>
    </thead>
    <tbody>
      <?php  
        while ($row = mysqli_fetch_array($resultado4)) {
      ?>
      <tr>
        <td><br><?php echo $row[2] ?></td>
        <td style="text-align: center">
          <?php
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
          ?>
          <?php 
              if(($row[3]-$row[4])>0){
               echo "Empleados asignados: <strong> ".$row[3]."</strong><br>  Empleados registrados: <strong>".$row[4]."</strong>";
              }else{
              if ($resultado2[0]!=0) {
                 if ($cont==$resultado2[0]) {
                  $departamentos = $con->query("SELECT e.areatrabajo,d.nombre,COUNT(*) FROM `empleado` e INNER JOIN departamentos d ON e.areatrabajo = d.iddepto WHERE e.idempresa=$row[0] GROUP BY e.areatrabajo");

                while ($rowd = mysqli_fetch_array($departamentos)) { 
                  $cantidadgenerada = mysqli_fetch_array($con->query("SELECT COUNT(*),`nombre_archivo` FROM `informe_tabla` WHERE id_departamento = $rowd[0] and id_empresa = $row[0]"));
                  if ($cantidadgenerada[0]<3) {
          ?>
                   <a href="../tablas/intermedio.php?dpto=<?php echo $rowd[0] ?>&empr=<?php echo $row[0] ?>&idcli=<?php echo $id ?>" ><span><i class="fa fa-caret-right" aria-hidden="true"></i></span><?php echo $rowd[1];?></a><br>
                    <?php echo "Informes Generados: ".$cantidadgenerada[0]; ?>
                   <br>
                   <hr>
         <?php  
                  }
                  }   
                }
              }
            }
          ?>
        </td>
        <td style="text-align: center">
          <?php  
               $departamentos = $con->query("SELECT e.areatrabajo,d.nombre,COUNT(*) FROM `empleado` e INNER JOIN departamentos d ON e.areatrabajo = d.iddepto WHERE e.idempresa=$row[0] GROUP BY e.areatrabajo");

                while ($rowd = mysqli_fetch_array($departamentos)) { 
                  $cantidadgenerada = mysqli_fetch_array($con->query("SELECT COUNT(*),`nombre_archivo` FROM `informe_tabla` WHERE id_departamento = $rowd[0] and id_empresa = $row[0]"));
                  if ($cantidadgenerada[0]>0) {
          ?> 
                  <a download  class="btn btn-success" href="../tablas/archivos/<?php echo $_SESSION['nombre']; ?>/<?php echo $row[2] ?>/<?php echo $cantidadgenerada[1]; ?>"><i class="fa fa-download"></i> <?php echo $rowd[1]; ?></a><br><br>
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
</div>
</body>
</html>

<?php
}else{  
  exit();
}
?>
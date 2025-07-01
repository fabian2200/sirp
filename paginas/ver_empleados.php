<?php
session_start();
include_once("../conexion.php");
if(($_SESSION['logueado']) == true){ 
 $idempresa = $_GET['idempr'];
 $sql="SELECT * FROM `empresa` where idem = $idempresa";
 $resultado = mysqli_fetch_array($con -> query($sql));
 $sql2="SELECT * FROM `empleado` where idempresa = $idempresa order by idus desc";
 $resultado2 = $con -> query($sql2);
 include ('ruta.php');
?> 

  <!DOCTYPE html>
  <html lang="es">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

  </head>

<body style="padding: 20px;">
<div class="text-center">
  <div class="container">
    <br>
    <div class="text-center"><h2>Estado de los cuestionarios</h2></div>
    <div class="text-center">
      <h2><strong><?php echo  $resultado[2]; ?></strong></h2>
    </div>
    <hr>
    <div class="container text-center">
      <a href="registrar_empleado.php?proceso=<?php echo $idempresa ?>" class="btn btn-warning"><i class="fa fa-user-plus" aria-hidden="true"></i><span> Registrar empleado</span></a>
      <a href="empresas.php" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i><span> Cargar empleados</span></a>
    </div>
    <br>
    <div class="alert alert-info" role="alert">
      <strong>Para descargar el formato excel de empleados, haga click en el siguiente enlace:</strong> <a href="empleados.xlsx"><i class="fa fa-file-excel-o" aria-hidden="true"></i><span> Descargar</span></a>
    </div>
    <hr>
    <br>
</div>
<div class="container">
  <div class="alert alert-danger" role="alert">
    <strong>Atencion! </strong> el icono de color <strong>rojo</strong> indica que las respuestas del cuestionario no se han digitado, y para hacerlo, debe de darle click.
  </div>
  <br>
<div class="table-responsive">
    <table id="example"  data-order='[[ 5, "asc" ]]' data-page-length='25'
          class="table table-sm table-striped table-hover table-bordered">
	<thead>
		      <tr>
          <th scope="col">ID</th>
          <th scope="col">Empleado</th>
          <th scope="col">Intra</th>
          <th scope="col">Extralaboral</th>
          <th scope="col">Estres</th>
          <th scope="col">Accion</th>
        </tr>
	</thead>
	<tbody>
<?php 
        while ($row = mysqli_fetch_array($resultado2)) {  
        $rutaa = ruta_A($row[29],$row[30],$row[31],$row[32],$row[33],$row[34],$row[0]); 
        $rutab = ruta_B($row[36],$row[37],$row[38],$row[39],$row[0]);
      ?>
      <tr>
        <td style="text-align: center"><?php echo $row[0]; ?></td>
        <td style="text-align: center"><?php echo $row[4]; ?></td>
        <td style="text-align: center">
            <?php 
              if ($row[28]==0) {       
               if ($row[35]==1) {
            ?>    
              <a href="<?php echo $rutab ?>"><span><i class="fa fa-file-text" style="color: red" aria-hidden="true"> B</i></span></a>       
            <?php 
               }else{
            ?> 
               <a download class="btn btn-success" href="../reportes_individuales/<?php echo $row[3] ?>/intra-B_<?php echo $row[4] ?>_<?php echo $row[2] ?>.pdf"><span><i class="fa fa-download" aria-hidden="true"></i></span> Intra-B</a>
            <?php    
               }
             }else{
                  if ($row[28]==1) {
            ?>
                <a href="<?php echo $rutaa ?>"><span><i class="fa fa-file-text" style="color: red" aria-hidden="true">A</i></span></a>
            <?php  
              }else{
            ?>
               <a download class="btn btn-success" href="../reportes_individuales/<?php echo $row[3] ?>/intra-A_<?php echo $row[4] ?>_<?php echo $row[2] ?>.pdf"><span><i class="fa fa-download" aria-hidden="true"></i></span> Intra-A</a> 
            <?php
              }
            }
            ?>
        </td>
        <td style="text-align: center">
            <?php 
              if ($row[40]==0) {             
            ?>    
              <h5>No aplica</h5>       
            <?php    
             }else{
                  if ($row[40]==1) {
            ?>
                <a href="../cuestionarios/extralaboral.php?idempl=<?php echo $row[0]?>&idempr=<?php echo $row[2]?>"><span><i class="fa fa-file-text" style="color: red" aria-hidden="true"></i></span></a> 
            <?php  
              }else{
            ?>
                <a download class="btn btn-info" href="../reportes_individuales/<?php echo $row[3] ?>/extralaboral_<?php echo $row[4] ?>_<?php echo $row[2] ?>.pdf"><i class="fa fa-download" aria-hidden="true"></i><span></span> Extra</a>
            <?php
              }
            }
            ?>
        </td>
         <td style="text-align: center">
            <?php 
              if ($row[42]==0) {             
            ?>    
              <h5>No aplica</h5>       
            <?php    
             }else{
                  if ($row[42]==1) {
            ?>
               <a href="../cuestionarios/estres.php?idempl=<?php echo $row[0]?>&idempr=<?php echo $row[2]?>"><span><i class="fa fa-file-text" style="color: red" aria-hidden="true"></i></span></a> 
            <?php  
              }else{
            ?>
                <a download class="btn btn-warning" href="../reportes_individuales/<?php echo $row[3] ?>/estres_<?php echo $row[4] ?>_<?php echo $row[2] ?>.pdf"><span><i class="fa fa-download" aria-hidden="true"></i></span> Estres</a>
            <?php
              }
            }
            ?>
        </td>
        <td style="text-align: center">
          <?php
              $cantidadgenerada = mysqli_fetch_array($con->query("SELECT COUNT(*) FROM `informe_general` WHERE id_empresa = $row[2]"));
            if ($cantidadgenerada[0]==0) {
              if($resultado[9]==0){
            ?>
              <a href="../acciones/borrar_empleado.php?idempleado=<?php echo $row[0] ?>&idempresa=<?php echo $row[2] ?>" class="btn btn-danger"><span><i class="fa fa-trash" aria-hidden="true"></i></span></a>
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
<div/>
<div/>
<br><br><br><br><br><br><br><br>
</body>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!--datatables-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css" />
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
  <script type="text/javascript" src="datatable.js"></script>
  <!--datatables-->

</html>
<?php
}else{  
  exit();
}
?>


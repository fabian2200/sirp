<?php
session_start();
include_once("../conexion.php");
if(($_SESSION['logueado']) == true){ 
 $id = $_SESSION['id'];
?> 
<!DOCTYPE html>
<html>
<head>
  <title></title>
  
  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  
</head>
<body>
  <br>
  <div class="container-fluid">
    <hr>
     <div class="form-row text-center"><h2>Registro de nueva Empresa</h2></div>
          <hr>
         <form action="../acciones/guardar_empresa.php" method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="Nombre">Nombre</label>
              <input type="text" class="form-control" id="Nombre" placeholder="Nombre" name="Nombre" required>
            </div>
            <div class="form-group col-md-6">
              <label for="Empleados"># de empleados</label>
              <input type="number" class="form-control" id="Empleados"  name="Empleados"  required>
              <input type="hidden" class="form-control" id="Empleados"  name="Id" value="<?php echo $id ?>" required>
            </div>      
          </div>
        <hr>
         <button type="submit" class="btn btn-success">Guardar</button>
        </form>
  </div>  
  <br>   
</body>
</html>

<?php
}else{  
  exit();
}
?>

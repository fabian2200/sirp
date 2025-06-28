<?php
session_start();
include_once("conexion.php");
if(($_SESSION['logueado']) == true){ ?> 

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
 <div class="alert alert-danger" role="alert">
  <h4>Bienvenido, usted es un usuario nuevo, por lo tanto debe de completar su informacion.</h4>
  <h4>llene todos los campos del siguiente formulario : </h4>
</div>
<br>
<form action="acciones/completar_datos.php" method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="Nombre">Nombre</label>
              <input type="text" class="form-control" id="Nombre" placeholder="Nombre" name="Nombre" required>
            </div>
            <div class="form-group col-md-6">
              <label for="Apellido">Apellido</label>
              <input type="text" class="form-control" id="Apellido" placeholder="Apellido" name="Apellido" required>
            </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="Cedula">Cedula</label>
              <input type="text" class="form-control" id="Cedula" placeholder="#Cedula" name="Cedula" required>
            </div>
            <div class="form-group col-md-6">
              <label for="Profesion">Profesion</label>
              <input type="text" class="form-control" id="Profesion" placeholder="Profesion" name="Profesion" required>
            </div>
            
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="Postgrado">Postgrado</label>
              <input type="text" class="form-control" id="Postgrado" placeholder="Postgrado" name="Postgrado" required>
            </div>
            <div class="form-group col-md-6">
             <label for="Tarjeta"># Tarjeta profesional</label>
            <input type="number" class="form-control" id="Tarjeta" name="Tarjeta" placeholder="111111111" required>
            </div>
          </div>
            <div class="form-row">
            <div class="form-group col-md-6">
              <label for="FLicencia">F.Exp Licencia profesional</label>
              <input type="date" class="form-control" id="FLicencia"  name="FLicencia" required>
            </div>
            <div class="form-group col-md-6">
             <label for="Licencia"># Licencia profesional</label>
            <input type="number" class="form-control" id="Licencia" name="Licencia" placeholder="111111111" required>
            </div>
          </div>
           </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="Celular">#Celular</label>
              <input type="number" class="form-control" id="Celular"  name="Celular" placeholder="3000000000" required>
            </div>   
           
            <input type="hidden" class="form-control" id="id"  name="Id" value="<?php echo $_SESSION['id'] ?>">
          
          </div>
        <hr>
        <div class="text-center"> <button type="submit" class="btn btn-success">Guardar</button></div>    
        <br>
 </form>
  <br>        
</body>
</html>

<?php
}else{  
  exit();
}
?>

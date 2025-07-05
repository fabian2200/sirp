<?php
session_start();
include_once("../conexion.php");
if(($_SESSION['logueado']) == true){ 
 $id = $_SESSION['id'];
 $idempl = $_GET['idempl'];
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

    <style>
      input[type="radio"] {
        scale: 1.5;
      }  
    </style>
</head>
<body>
   <div class="container text-center">
	<h2 style="color: #224abe !important; font-weight: bold; width: 100%; text-align: center;">Cuestionario Intralaboral Forma A</h2>
	<hr>
	<h3>¿En mi trabajo debo brindar servicio a clientes o usuarios?</h3>
	<br><br>	
   	 <form action="../acciones/guardar_intraa_p1a.php" method="POST">
   	 	<input type="radio" name="pregabierta1" required="" value="1"> SI</input> <br> <br>
        <input type="radio" name="pregabierta1" required="" value="0"> NO</input> <br> <br>
        <input type="hidden" name="idempleado" value="<?php echo $idempl ?>">
        <hr>
        <button style="font-size: 1.9rem;" type="submit" class="btn btn-success"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Guardar y continuar</button> 
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

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

      tr td:nth-child(n+3) {
        text-align: center !important;
      }

      tr th:nth-child(n+3) {
        text-align: center !important;
      }
    </style>
</head>
<body>
   
<div class="container">
  <h2 style="color: #224abe !important; font-weight: bold; width: 100%; text-align: center;">Cuestionario Intralaboral Forma A</h2>
  <hr>
  <form method="POST" action="../acciones/guardar_intraa_p2.php">
    <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Pregunta</th>
        <th>Siempre</th>
        <th>Casi siempre</th>
        <th>Algunas veces</th>
        <th>Casi nunca</th>
        <th>Nunca</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>106</td>
        <td>Atiendo clientes o usuarios muy enojados</td>
        <td><input type="radio" name="preg106" required="" value="4"></td>
        <td><input type="radio" name="preg106" required="" value="3"></td>
        <td><input type="radio" name="preg106" required="" value="2"></td>
        <td><input type="radio" name="preg106" required="" value="1"></td>
        <td><input type="radio" name="preg106" required="" value="0"></td>
      </tr>
       <tr>
        <td>107</td>
        <td>Atiendo  clientes o usuarios muy preocupados</td>
        <td><input type="radio" name="preg107" required="" value="4"></td>
        <td><input type="radio" name="preg107" required="" value="3"></td>
        <td><input type="radio" name="preg107" required="" value="2"></td>
        <td><input type="radio" name="preg107" required="" value="1"></td>
        <td><input type="radio" name="preg107" required="" value="0"></td>
      </tr>
       <tr>
        <td>108</td>
        <td>Mi trabajo me exige atender personas muy tristes</td>
        <td><input type="radio" name="preg108" required="" value="4"></td>
        <td><input type="radio" name="preg108" required="" value="3"></td>
        <td><input type="radio" name="preg108" required="" value="2"></td>
        <td><input type="radio" name="preg108" required="" value="1"></td>
        <td><input type="radio" name="preg108" required="" value="0"></td>
      </tr>
       <tr>
        <td>109</td>
        <td>Mi trabajo me exige atender personas muy enfermas</td>
        <td><input type="radio" name="preg109" required="" value="4"></td>
        <td><input type="radio" name="preg109" required="" value="3"></td>
        <td><input type="radio" name="preg109" required="" value="2"></td>
        <td><input type="radio" name="preg109" required="" value="1"></td>
        <td><input type="radio" name="preg109" required="" value="0"></td>
      </tr>
      <tr>
        <td>110</td>
        <td>Mi trabajo me exige atender personas muy necesitadas de ayuda</td>
        <td><input type="radio" name="preg110" required="" value="4"></td>
        <td><input type="radio" name="preg110" required="" value="3"></td>
        <td><input type="radio" name="preg110" required="" value="2"></td>
        <td><input type="radio" name="preg110" required="" value="1"></td>
        <td><input type="radio" name="preg110" required="" value="0"></td>
      </tr>
      <tr>
        <td>111</td>
        <td>Atiendo  clientes o usuarios que me maltratan</td>
        <td><input type="radio" name="preg111" required="" value="4"></td>
        <td><input type="radio" name="preg111" required="" value="3"></td>
        <td><input type="radio" name="preg111" required="" value="2"></td>
        <td><input type="radio" name="preg111" required="" value="1"></td>
        <td><input type="radio" name="preg111" required="" value="0"></td>
      </tr>
      <tr>
        <td>112</td>
        <td>Para hacer mi trabajo debo demostrar sentimientos distintos a los míos</td>
        <td><input type="radio" name="preg112" required="" value="4"></td>
        <td><input type="radio" name="preg112" required="" value="3"></td>
        <td><input type="radio" name="preg112" required="" value="2"></td>
        <td><input type="radio" name="preg112" required="" value="1"></td>
        <td><input type="radio" name="preg112" required="" value="0"></td>
      </tr>
      <tr>
        <td>113</td>
        <td>Mi trabajo me exige atender situaciones de violencia</td>
        <td><input type="radio" name="preg113" required="" value="4"></td>
        <td><input type="radio" name="preg113" required="" value="3"></td>
        <td><input type="radio" name="preg113" required="" value="2"></td>
        <td><input type="radio" name="preg113" required="" value="1"></td>
        <td><input type="radio" name="preg113" required="" value="0"></td>
      </tr>
       <tr>
        <td>114</td>
        <td>Mi trabajo me exige atender situaciones muy tristes o dolorosas</td>
        <td><input type="radio" name="preg114" required="" value="4"></td>
        <td><input type="radio" name="preg114" required="" value="3"></td>
        <td><input type="radio" name="preg114" required="" value="2"></td>
        <td><input type="radio" name="preg114" required="" value="1"></td>
        <td><input type="radio" name="preg114" required="" value="0"></td>
      </tr>
    </tbody>
   </table>
   <input type="hidden" name="idempleado" value="<?php echo $idempl ?>">
   <hr>
   <div class="text-center">
     <button style="font-size: 1.9rem;" type="submit" class="btn btn-success"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Guardar y continuar</button>
   </div>      
  </form> 
</div>
<br><br>
</body>
</html>
<?php
}else{  
  header("Location: ../index.php");
  exit();
}
?>

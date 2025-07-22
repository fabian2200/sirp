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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>

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
  <h2 style="color: #224abe !important; font-weight: bold; width: 100%; text-align: center;">Cuestionario Intralaboral Forma B</h2>  
  <hr>
  <form method="POST" id="form_intrab_p2">
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
        <td>89</td>
        <td>Atiendo clientes o usuarios muy enojados</td>
        <td><input type="radio" name="preg89" required="" value="4"></td>
        <td><input type="radio" name="preg89" required="" value="3"></td>
        <td><input type="radio" name="preg89" required="" value="2"></td>
        <td><input type="radio" name="preg89" required="" value="1"></td>
        <td><input type="radio" name="preg89" required="" value="0"></td>
      </tr>
      <tr>
        <td>90</td>
        <td>Atiendo clientes o usuarios muy preocupados</td>
        <td><input type="radio" name="preg90" required="" value="4"></td>
        <td><input type="radio" name="preg90" required="" value="3"></td>
        <td><input type="radio" name="preg90" required="" value="2"></td>
        <td><input type="radio" name="preg90" required="" value="1"></td>
        <td><input type="radio" name="preg90" required="" value="0"></td>
      </tr>
       <tr>
        <td>91</td>
        <td>Atiendo clientes o usuarios muy tristes</td>
        <td><input type="radio" name="preg91" required="" value="4"></td>
        <td><input type="radio" name="preg91" required="" value="3"></td>
        <td><input type="radio" name="preg91" required="" value="2"></td>
        <td><input type="radio" name="preg91" required="" value="1"></td>
        <td><input type="radio" name="preg91" required="" value="0"></td>
      </tr>
       <tr>
        <td>92</td>
        <td>Mi trabajo me exige atender personas muy enfermas</td>
        <td><input type="radio" name="preg92" required="" value="4"></td>
        <td><input type="radio" name="preg92" required="" value="3"></td>
        <td><input type="radio" name="preg92" required="" value="2"></td>
        <td><input type="radio" name="preg92" required="" value="1"></td>
        <td><input type="radio" name="preg92" required="" value="0"></td>
      </tr>
       <tr>
        <td>93</td>
        <td>Mi trabajo me exige atender personas muy necesitadas de ayuda</td>
        <td><input type="radio" name="preg93" required="" value="4"></td>
        <td><input type="radio" name="preg93" required="" value="3"></td>
        <td><input type="radio" name="preg93" required="" value="2"></td>
        <td><input type="radio" name="preg93" required="" value="1"></td>
        <td><input type="radio" name="preg93" required="" value="0"></td>
      </tr>
       <tr>
        <td>94</td>
        <td>Atiendo clientes o usuarios que me maltratan</td>
        <td><input type="radio" name="preg94" required="" value="4"></td>
        <td><input type="radio" name="preg94" required="" value="3"></td>
        <td><input type="radio" name="preg94" required="" value="2"></td>
        <td><input type="radio" name="preg94" required="" value="1"></td>
        <td><input type="radio" name="preg94" required="" value="0"></td>
      </tr>
       <tr>
        <td>95</td>
        <td>Mi trabajo me exige atender situaciones de violencia</td>
        <td><input type="radio" name="preg95" required="" value="4"></td>
        <td><input type="radio" name="preg95" required="" value="3"></td>
        <td><input type="radio" name="preg95" required="" value="2"></td>
        <td><input type="radio" name="preg95" required="" value="1"></td>
        <td><input type="radio" name="preg95" required="" value="0"></td>
      </tr>
       <tr>
        <td>96</td>
        <td>Mi trabajo me exige atender situaciones muy tristes o dolorosas</td>
        <td><input type="radio" name="preg96" required="" value="4"></td>
        <td><input type="radio" name="preg96" required="" value="3"></td>
        <td><input type="radio" name="preg96" required="" value="2"></td>
        <td><input type="radio" name="preg96" required="" value="1"></td>
        <td><input type="radio" name="preg96" required="" value="0"></td>
      </tr>
       <tr>
        <td>97</td>
        <td>Puedo expresar tristeza o enojo frente a las personas que atiendo</td>
        <td><input type="radio" name="preg97" required="" value="0"></td>
        <td><input type="radio" name="preg97" required="" value="1"></td>
        <td><input type="radio" name="preg97" required="" value="2"></td>
        <td><input type="radio" name="preg97" required="" value="3"></td>
        <td><input type="radio" name="preg97" required="" value="4"></td>
      </tr>
    </tbody>
   </table>
   <hr>
   <input type="hidden" name="idempleado" value="<?php echo $idempl ?>">
   <div class="text-center">
     <button style="font-size: 1.9rem;" type="button" class="btn btn-success" onclick="guardar_intrab_p2()"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Guardar y continuar</button>
   </div>      
  </form> 
</div>
<br><br>
<script>
  function guardar_intrab_p2() {
    if(validar_formulario()){
      $.ajax({
        url: "../acciones/guardar_intrab_p2.php",
        type: 'POST',
        data: $('#form_intrab_p2').serialize(),
        beforeSend: function(){
					Swal.fire({
						position: 'bottom',
						title: 'Guardando, por favor espere...',
						icon: 'info',
						showConfirmButton: false,
						allowOutsideClick: false,
						didOpen: function(){
							Swal.showLoading();
						}
					});
				},
        success: function(response) {
          var data = JSON.parse(response);
          var idem = data.idem;
          var idempr = data.idempr;
          if(data.status == 'ok') {
            generar_informe(idem, idempr);
          } else {
            Swal.fire({
              position: 'bottom',
              icon: 'error',
              title: 'Error al guardar el cuestionario',
              allowOutsideClick: false,
              showConfirmButton: true,
            });
          }
        }
      });
    }else{
      Swal.fire({
        position: 'bottom',
        icon: 'error',
        title: 'Por favor, responda todas las preguntas antes de continuar',
      });
    }
  }

  function validar_formulario(){
    const totalGrupos = new Set();
    const radiosMarcados = new Set();

    // Recorremos todos los radio buttons
    $("#form_intrab_p2 input[type=radio]").each(function() {
      const nombre = $(this).attr("name");
      totalGrupos.add(nombre);
      if ($(this).is(":checked")) {
        radiosMarcados.add(nombre);
      }
    });

    if (totalGrupos.size !== radiosMarcados.size) {
      return false;
    }else{
      return true;
    }
  }

  function generar_informe(idem, idempr) {
    $.ajax({
      url: '../reportes_individuales/plantilla_intrab.php?idempl='+idem+'&idempr='+idempr,
      type: 'get',
      beforeSend: function() {  
        Swal.fire({
          icon: 'info',
          position: 'bottom',
          title: 'Generando informe Intralaboral Forma B, por favor espere...',
          allowOutsideClick: false,
          showConfirmButton: false,
          willOpen: () => {
            Swal.showLoading();
          }
        });
      },
      success: function(response) {
        Swal.fire({
          position: 'bottom',
          icon: 'success',
          title: 'Informe Intralaboral Forma B generado correctamente',
          allowOutsideClick: false,
          showConfirmButton: true,
          willClose: () => {
            window.location= '../paginas/ver_empleados.php?idempr='+idempr;
          }
        });
      },
      error: function(xhr, status, error) {
        Swal.fire({
          position: 'bottom',
          icon: 'error',
          title: 'Error al generar el informe',
          allowOutsideClick: false,
          showConfirmButton: true,
        });
      }
    });
  }
</script>
<br><br><br><br><br>  
</body>
</html>
<?php
}else{  
  header("Location: ../index.php");
  exit();
}
?>

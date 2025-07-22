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
  <h2 style="color: #224abe !important; font-weight: bold; width: 100%; text-align: center;">Cuestionario Intralaboral Forma A</h2> 
  <hr>   
  <form method="POST" id="form_intraa_p3">
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
        <td>115</td>
        <td>Tengo colaboradores que comunican tarde los asuntos de trabajo</td>
        <td><input type="radio" name="preg115" required="" value="4"></td>
        <td><input type="radio" name="preg115" required="" value="3"></td>
        <td><input type="radio" name="preg115" required="" value="2"></td>
        <td><input type="radio" name="preg115" required="" value="1"></td>
        <td><input type="radio" name="preg115" required="" value="0"></td>
      </tr>
       <tr>
        <td>116</td>
        <td>Tengo colaboradores que tienen comportamientos irrespetuosos</td>
        <td><input type="radio" name="preg116" required="" value="4"></td>
        <td><input type="radio" name="preg116" required="" value="3"></td>
        <td><input type="radio" name="preg116" required="" value="2"></td>
        <td><input type="radio" name="preg116" required="" value="1"></td>
        <td><input type="radio" name="preg116" required="" value="0"></td>
      </tr>
       <tr>
        <td>117</td>
        <td>Tengo colaboradores que dificultan la organización del trabajo</td>
        <td><input type="radio" name="preg117" required="" value="4"></td>
        <td><input type="radio" name="preg117" required="" value="3"></td>
        <td><input type="radio" name="preg117" required="" value="2"></td>
        <td><input type="radio" name="preg117" required="" value="1"></td>
        <td><input type="radio" name="preg117" required="" value="0"></td>
      </tr>
       <tr>
        <td>118</td>
        <td>Tengo colaboradores que guardan silencio cuando les piden opiniones</td>
        <td><input type="radio" name="preg118" required="" value="4"></td>
        <td><input type="radio" name="preg118" required="" value="3"></td>
        <td><input type="radio" name="preg118" required="" value="2"></td>
        <td><input type="radio" name="preg118" required="" value="1"></td>
        <td><input type="radio" name="preg118" required="" value="0"></td>
      </tr>
      <tr>
        <td>119</td>
        <td>Tengo colaboradores que dificultan el logro de los resultados del trabajo</td>
        <td><input type="radio" name="preg119" required="" value="4"></td>
        <td><input type="radio" name="preg119" required="" value="3"></td>
        <td><input type="radio" name="preg119" required="" value="2"></td>
        <td><input type="radio" name="preg119" required="" value="1"></td>
        <td><input type="radio" name="preg119" required="" value="0"></td>
      </tr>
      <tr>
        <td>120</td>
        <td>Tengo colaboradores que expresan de forma irrespetuosa sus desacuerdos</td>
        <td><input type="radio" name="preg120" required="" value="4"></td>
        <td><input type="radio" name="preg120" required="" value="3"></td>
        <td><input type="radio" name="preg120" required="" value="2"></td>
        <td><input type="radio" name="preg120" required="" value="1"></td>
        <td><input type="radio" name="preg120" required="" value="0"></td>
      </tr>
      <tr>
        <td>121</td>
        <td>Tengo colaboradores que cooperan poco cuando se necesita</td>
        <td><input type="radio" name="preg121" required="" value="4"></td>
        <td><input type="radio" name="preg121" required="" value="3"></td>
        <td><input type="radio" name="preg121" required="" value="2"></td>
        <td><input type="radio" name="preg121" required="" value="1"></td>
        <td><input type="radio" name="preg121" required="" value="0"></td>
      </tr>
      <tr>
        <td>122</td>
        <td>Tengo colaboradores que me preocupan por su desempeño</td>
        <td><input type="radio" name="preg122" required="" value="4"></td>
        <td><input type="radio" name="preg122" required="" value="3"></td>
        <td><input type="radio" name="preg122" required="" value="2"></td>
        <td><input type="radio" name="preg122" required="" value="1"></td>
        <td><input type="radio" name="preg122" required="" value="0"></td>
      </tr>
       <tr>
        <td>123</td>
        <td>Tengo colaboradores que ignoran las sugerencias para mejorar su trabajo</td>
        <td><input type="radio" name="preg123" required="" value="4"></td>
        <td><input type="radio" name="preg123" required="" value="3"></td>
        <td><input type="radio" name="preg123" required="" value="2"></td>
        <td><input type="radio" name="preg123" required="" value="1"></td>
        <td><input type="radio" name="preg123" required="" value="0"></td>
      </tr>
    </tbody>
   </table>
   <input type="hidden" name="idempleado" value="<?php echo $idempl ?>">
   <hr>
   <div class="text-center">
     <button style="font-size: 1.9rem;" type="button" class="btn btn-success" onclick="guardar_intraa_p3()"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Guardar y continuar</button>
   </div>      
  </form> 
</div>
<br><br>
<script>
  function guardar_intraa_p3() {
    if(validar_formulario()){
      $.ajax({
        url: "../acciones/guardar_intraa_p3.php",
        type: 'POST',
        data: $('#form_intraa_p3').serialize(),
        beforeSend: function() {
          Swal.fire({
            position: 'bottom',
            icon: 'info',
            title: 'Guardando cuestionario Intralaboral Forma A, por favor espere...',
            allowOutsideClick: false,
            showConfirmButton: false,
            willOpen: () => {
              Swal.showLoading();
            }
          });
        },
        success: function(response) {
          var data = JSON.parse(response);
          var idem = data.idem;
          var idempr = data.idempr;
          if(data.status == 'ok'){
            generar_informe(idem, idempr);
          }else{
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
    $("#form_intraa_p3 input[type=radio]").each(function() {
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
      url: '../reportes_individuales/plantilla_intraa.php?idempl='+idem+'&idempr='+idempr,
      type: 'get',
      beforeSend: function() {
        Swal.fire({
          position: 'bottom',
          icon: 'info',
          title: 'Generando informe Intralaboral Forma A, por favor espere...',
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
          title: 'Informe Intralaboral Forma A generado correctamente',
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
</body>
</html>
<?php
}else{  
  header("Location: ../index.php");
  exit();
}
?>

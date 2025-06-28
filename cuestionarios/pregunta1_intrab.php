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
</head>
<body>
   <div class="container text-center">
   	 	<h3>¿En mi trabajo debo brindar servicio a clientes o usuarios:?</h3>
   	 	<hr>
   	 <form method="POST">
   	 	<td><input type="radio" name="pregabierta1" required="" value="1"> SI</td> <br>
        <td><input type="radio" name="pregabierta1" required="" value="0"> NO</td> <br>
        <hr>
        <input type="hidden" name="idempleado" value="<?php echo $idempl ?>">
        <button type="button" class="btn btn-success" onclick="guardar_intrab_p1a()"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Guardar y continuar</button> 
    </form>
   </div>
   <br><br>
   <script>
    function guardar_intrab_p1a() {
      $.ajax({
        url: "../acciones/guardar_intrab_p1a.php",
        type: 'POST',
        data: $('form').serialize(),			
        success: function(response) {
          var data = JSON.parse(response);
          var idem = data.idem;
          var idempr = data.idempr;
          if(data.status == 'ok') {
			if(data.redirigir) {
				window.location= data.url;
			} else {
				generar_informe(idem, idempr);
			}
          } else {
            Swal.fire({
              position: 'center',
              title: 'Error al guardar el cuestionario',
              allowOutsideClick: false,
              showConfirmButton: true,
            });
          }
        }
      });
    }

	function generar_informe(idem, idempr) {
		$.ajax({
		url: '../reportes_individuales/plantilla_intrab.php?idempl='+idem+'&idempr='+idempr,
		type: 'get',
		beforeSend: function() {  
			Swal.fire({
			position: 'center',
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
			position: 'center',
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
			position: 'center',
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

</body>
</html>
<?php
}else{  
  exit();
}
?>

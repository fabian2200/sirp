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
   <div class="container text-center">
	<h2 style="color: #224abe !important; font-weight: bold; width: 100%; text-align: center;">Cuestionario Intralaboral Forma A</h2>
	<hr>
	<h3>¿Soy jefe de otras personas en mi trabajo?</h3>
	<br><br>
   	 <form method="POST" id="form_intraa_p2a">
   	 	<input type="radio" name="pregabierta2" required="" value="1"> SI</input> <br> <br>
        <input type="radio" name="pregabierta2" required="" value="0"> NO</input> <br> <br>
        <input type="hidden" name="idempleado" value="<?php echo $idempl ?>">
        <hr>
        <button style="font-size: 1.9rem;" type="button" class="btn btn-success" onclick="guardar_intraa_p2a()"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Guardar y continuar</button> 
    </form>
   </div>
   <br><br>
   <script>
    function guardar_intraa_p2a() {
      	if(validar_formulario()){
			$.ajax({
				url: "../acciones/guardar_intraa_p2a.php",
				type: 'POST',
				data: $('#form_intraa_p2a').serialize(),
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
						if(data.redirigir) {
							window.location= data.url;
						} else {
							generar_informe(idem, idempr);
						}
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
		$("#form_intraa_p2a input[type=radio]").each(function() {
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
  exit();
}
?>

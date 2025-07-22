<?php 
  include ('../conexion.php');
  $iddepartamento = $_GET['dpto'];
  $idempresa = $_GET['empr'];
  $idcliente = $_GET['idcli'];
  $fecha = date('Y-m-d');
  ////////////////////////////////////////////////////////////////////////////////////////////
  $nombredepartamento =  mysqli_fetch_array($con -> query("SELECT nombre from departamentos WHERE iddepto = $iddepartamento"));
  $nombredepartamento2 = $nombredepartamento[0];
  ////////////////////////////////////////////////////////////////////////////////////////////
  $sql = "SELECT COUNT(*) FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=1 ";
  $sql2 = "SELECT COUNT(*) FROM `calificacion` WHERE `idempresa`=$idempresa and `iddepartamento`=$iddepartamento and `tipo_examen`=2 ";
  $resultado =  mysqli_fetch_array($con ->query($sql));
  $resultado2 =  mysqli_fetch_array($con ->query($sql2));
  ////////////////////////////////////////////////////////////////////////////////////////////
  $resultado =  mysqli_fetch_array($con ->query($sql));

  $empresa = mysqli_fetch_array($con -> query("SELECT empresa FROM empresa WHERE idem = $idempresa"));	
  $nombre_empresa = $empresa[0];

  $empleados_intra_a = mysqli_fetch_array($con -> query("SELECT COUNT(*) FROM `empleado` WHERE `idempresa`=$idempresa and `areatrabajo`=$iddepartamento and (`test1`=1 or `test1` = 2)"));
  $empleados_intra_b = mysqli_fetch_array($con -> query("SELECT COUNT(*) FROM `empleado` WHERE `idempresa`=$idempresa and `areatrabajo`=$iddepartamento and (`test2`=1 or `test2` = 2)"));

  $cantidadgenerada_a = $con->query("SELECT COUNT(*) FROM `informe_general` WHERE id_departamento = $iddepartamento and id_empresa = $idempresa and tipo_informe = 'A'");
  $cantidadgenerada_b = $con->query("SELECT COUNT(*) FROM `informe_general` WHERE id_departamento = $iddepartamento and id_empresa = $idempresa and tipo_informe = 'B'");
  $cantidadgenerada_a = mysqli_fetch_array($cantidadgenerada_a);
  $cantidadgenerada_b = mysqli_fetch_array($cantidadgenerada_b);
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
		.item{
			margin: 10px;
		}
	</style>
</head>
<body>
	<div class="container" style="padding-top: 30px;">
		<h2 style="font-weight: bold; color: #224abe; ">Reporte General</h2>
		<hr>
		<h3 style="font-weight: bold; color:rgb(104, 104, 104); ">Empresa: <?php echo $nombre_empresa; ?></h3>
		<h3 style="font-weight: bold; color:rgb(104, 104, 104); ">Area de trabajo o Departamento: <?php echo $nombredepartamento2; ?></h3>
	</div>
	<div class="container" style="padding-top: 30px; padding-bottom: 50px; display: flex; justify-content: center; align-items: center;">
	<?php
	
	    if ($resultado[0]>0) {
	        $filename = "general_intra_A_".$nombredepartamento2."_".$iddepartamento.".pdf"; 
	?>	
			<div class="container text-center alert alert-success item">
				<h4>Este departamento cuenta con empleados intra-A</h4>
				<br>
				<div class="alert alert-info" style="padding: 10px;">
					<h4><i class="fa fa-users"></i> Total de empleados: <?php echo $empleados_intra_a[0]; ?></h4>
					<?php
						if($cantidadgenerada_a[0] == 0){
							echo "<h4 style='margin-bottom: 0px;'><i class='fa fa-file-pdf-o'></i> Informes Generados: <strong>0</strong> de 3</h4>";
						}else{
							echo "<h4 style='margin-bottom: 0px;'><i class='fa fa-file-pdf-o'></i> Informes Generados: <strong>".$cantidadgenerada_a[0]."</strong> de 3</h4>";
						}
					?>
				</div>
				<?php
					if($cantidadgenerada_a[0] < 3){
				?>
				   <button onclick="GenerarIntraA()" class="btn btn-success"> <i class="fa fa-file-pdf-o"></i> Generar Reporte</button>
				<?php
					}
	            ?>
			</div>	
	<?php
	    }
		
		if ($resultado2[0]>0) {
	          	$filename = "general_intra_B_".$nombredepartamento2."_".$iddepartamento.".pdf";
	?>	
			<div class="container text-center alert alert-success item">
				<h4>Este departamento cuenta con empleados intra-B</h4>
				<br>
				<div class="alert alert-info" style="padding: 10px;">
					<h4><i class="fa fa-users"></i> Total de empleados: <?php echo $empleados_intra_b[0]; ?></h4>
					<?php
						if($cantidadgenerada_b[0] == 0){
							echo "<h4 style='margin-bottom: 0px;'><i class='fa fa-file-pdf-o'></i> Informes Generados: <strong>0</strong> de 3</h4>";
						}else{
							echo "<h4 style='margin-bottom: 0px;'><i class='fa fa-file-pdf-o'></i> Informes Generados: <strong>".$cantidadgenerada_b[0]."</strong> de 3</h4>";
						}
					?>
				</div>
				<?php
					if($cantidadgenerada_b[0] < 3){
				?>
				   <button onclick="GenerarIntraB()" class="btn btn-success"> <i class="fa fa-file-pdf-o"></i> Generar Reporte</button>
				<?php
					}
				?>
			</div>	
	<?php
	    }
	?>
	</div>
</body>
<script type="text/javascript">

	function GenerarIntraB() {
		$.ajax({
			url: "../acciones/actualizarCantidadInforme.php",
			type: "POST",
			data: {
				iddepartamento: "<?php echo $iddepartamento ?>",
				idempresa: "<?php echo $idempresa ?>",
				tipo_informe: "B"
			},
			beforeSend: function() {
				Swal.fire({
					title: 'Generando informe...',
					html: 'Por favor, espere un momento...',
					allowOutsideClick: false,
					showConfirmButton: false,
					showCancelButton: false,
					didOpen: function() {
						Swal.showLoading();
					}
				});
			},
			success: function(response) {
				response = JSON.parse(response);
				if(response.status == "ok") {
					window.open("general_intra_b.php?iddepartamento=<?php echo $iddepartamento ?>&idcliente=<?php echo $idcliente ?>&idempresa=<?php echo $idempresa ?>", "_blank");
					setTimeout(function() {
						location.reload();
					}, 1000);
				}else{
					Swal.fire({
						title: 'Error',
						text: 'No se pudo generar el informe',
						icon: 'error'
					});
				}
			},
			error: function(xhr, status, error) {
				Swal.fire({
					title: 'Error',
					text: 'No se pudo generar el informe',
					icon: 'error'
				});
			}
		});
	}

	function GenerarIntraA() {
		$.ajax({
			url: "../acciones/actualizarCantidadInforme.php",
			type: "POST",
			data: {
				iddepartamento: "<?php echo $iddepartamento ?>",
				idempresa: "<?php echo $idempresa ?>",
				tipo_informe: "A"
			},
			beforeSend: function() {
				Swal.fire({
					title: 'Generando informe...',
					html: 'Por favor, espere un momento...',
					allowOutsideClick: false,
					showConfirmButton: false,
					showCancelButton: false,
					didOpen: function() {
						Swal.showLoading();
					}
				});
			},
			success: function(response) {
				response = JSON.parse(response);
				if(response.status == "ok") {
					window.open("general_intra_a.php?iddepartamento=<?php echo $iddepartamento ?>&idcliente=<?php echo $idcliente ?>&idempresa=<?php echo $idempresa ?>", "_blank");
					setTimeout(function() {
						location.reload();
					}, 1000);
				}else{
					Swal.fire({
						title: 'Error',
						text: 'No se pudo generar el informe',
						icon: 'error'
					});
				}
			},
			error: function(xhr, status, error) {
				Swal.fire({
					title: 'Error',
					text: 'No se pudo generar el informe',
					icon: 'error'
				});
			}
		});
	}
</script>
</html>
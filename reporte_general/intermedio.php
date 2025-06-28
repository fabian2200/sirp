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
</head>
<body>
	<?php 
	if ($resultado[0]>0 && $resultado2[0]>0){

	    $filename = "general_intra_A_B_".$nombredepartamento2."_".$iddepartamento.".pdf";

	    $con->query("INSERT into informe_general (id_empresa,id_cliente,id_departamento,fecha,nombre_archivo) values ($idempresa,$idcliente,$iddepartamento,'$fecha','$filename')");
	?>	
		<div class="container text-center" style="padding-top: 150px; padding-bottom: 150px">
			<h3>Este departamento cuenta con empleados intra-A e intra-B</h3>
			<hr>
			<button onclick="GenerarIntraAB()" class="btn btn-success">Generar Reporte</button>
		</div>	
	<?
	}else{
	    if ($resultado[0]>0) {
	        $filename = "general_intra_A_".$nombredepartamento2."_".$iddepartamento.".pdf";
	          
	        $con->query("INSERT into informe_general (id_empresa,id_cliente,id_departamento,fecha,nombre_archivo) values ($idempresa,$idcliente,$iddepartamento,'$fecha','$filename')");
	    ?>	
			<div class="container text-center" style="padding-top: 150px; padding-bottom: 150px">
				<h3>Este departamento solo cuenta con empleados intra-A</h3>
				<hr>
				<button onclick="GenerarIntraA()" class="btn btn-success">Generar Reporte</button>
			</div>	
		<?
	    }else{
	          	$filename = "general_intra_B_".$nombredepartamento2."_".$iddepartamento.".pdf";
	          
	          	$con->query("INSERT into informe_general (id_empresa,id_cliente,id_departamento,fecha,nombre_archivo) values ($idempresa,$idcliente,$iddepartamento,'$fecha','$filename')");
	    ?>	
			<div class="container text-center" style="padding-top: 150px; padding-bottom: 150px">
				<h3>Este departamento solo cuenta con empleados intra-B</h3>
				<hr>
				<button onclick="GenerarIntraB()" class="btn btn-success">Generar Reporte</button>
			</div>	
		<?
	    }
	 }
	?>
</body>
<script type="text/javascript">
	function GenerarIntraAB() {
		$.ajax({
		    type: 'GET',
		    url: "general_todo.php?iddepartamento=<?php echo $iddepartamento ?>&idcliente=<?php echo $idcliente ?>&idempresa=<?php echo $idempresa ?>",
		    beforeSend: function() {
		        let timerInterval
				Swal.fire({
				  title: 'Espere mientras se genera el informe...',
				  html: '',
				  timer: 700000,
				  timerProgressBar: true,
				  didOpen: () => {
				    Swal.showLoading()
				    timerInterval = setInterval(() => {     
				    }, 100)
				  },
				  willClose: () => {
				    clearInterval(timerInterval)
				  }
				}).then((result) => {
				  /* Read more about handling dismissals below */
				  if (result.dismiss === Swal.DismissReason.timer) {
				  }
				})
		    },
		    success: function(data) {
		       	Swal.fire({
				  position: 'center',
				  icon: 'success',
				  title: 'Reporte Generado Correctamente',
				  showConfirmButton: false,
				  timer: 1500
				});
				setTimeout(function(){ window.location= '../paginas/informe.php'; }, 1500);
		    },
		    error: function(xhr) { // if error occured
		       Swal.fire({
		       	  position: 'center',
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Ocurrio un error, intente de nuevo',
				  footer: 'ICP'
				})
		    },
		});
	}

	function GenerarIntraB() {
		$.ajax({
		    type: 'GET',
		    url: "general_intra_b.php?iddepartamento=<?php echo $iddepartamento ?>&idcliente=<?php echo $idcliente ?>&idempresa=<?php echo $idempresa ?>",
		    beforeSend: function() {
		        let timerInterval
				Swal.fire({
				  title: 'Espere mientras se genera el informe...',
				  html: '',
				  timer: 700000,
				  timerProgressBar: true,
				  didOpen: () => {
				    Swal.showLoading()
				    timerInterval = setInterval(() => {     
				    }, 100)
				  },
				  willClose: () => {
				    clearInterval(timerInterval)
				  }
				}).then((result) => {
				  /* Read more about handling dismissals below */
				  if (result.dismiss === Swal.DismissReason.timer) {
				  }
				})
		    },
		    success: function(data) {
		       	Swal.fire({
				  position: 'center',
				  icon: 'success',
				  title: 'Reporte Generado Correctamente',
				  showConfirmButton: false,
				  timer: 1500
				});
				setTimeout(function(){ window.location= '../paginas/informe.php'; }, 1500);
		    },
		    error: function(xhr) { // if error occured
		       Swal.fire({
		       	  position: 'center',
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Ocurrio un error, intente de nuevo',
				  footer: 'ICP'
				})
		    },
		});
	}

	function GenerarIntraA() {
		$.ajax({
		    type: 'GET',
		    url: "general_intra_a.php?iddepartamento=<?php echo $iddepartamento ?>&idcliente=<?php echo $idcliente ?>&idempresa=<?php echo $idempresa ?>",
		    beforeSend: function() {
		        let timerInterval
				Swal.fire({
				  title: 'Espere mientras se genera el informe...',
				  html: '',
				  timer: 700000,
				  timerProgressBar: true,
				  didOpen: () => {
				    Swal.showLoading()
				    timerInterval = setInterval(() => {     
				    }, 100)
				  },
				  willClose: () => {
				    clearInterval(timerInterval)
				  }
				}).then((result) => {
				  /* Read more about handling dismissals below */
				  if (result.dismiss === Swal.DismissReason.timer) {
				  }
				})
		    },
		    success: function(data) {
		       	Swal.fire({
				  position: 'center',
				  icon: 'success',
				  title: 'Reporte Generado Correctamente',
				  showConfirmButton: false,
				  timer: 1500
				});
				setTimeout(function(){ window.location= '../paginas/informe.php'; }, 1500);
		    },
		    error: function(xhr) { // if error occured
		       Swal.fire({
		       	  position: 'center',
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Ocurrio un error, intente de nuevo',
				  footer: 'ICP'
				})
		    },
		});
	}
</script>
</html>
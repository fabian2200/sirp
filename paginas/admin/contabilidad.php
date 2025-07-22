<?php
session_start();
include_once("../../conexion.php");
if(($_SESSION['logueado']) == true){ 
$sql="SELECT COUNT(*) FROM `cliente` where estatus = 1";
$resultado =mysqli_fetch_array($con -> query($sql));
$sql2="SELECT SUM(pines) FROM `compra`";
$resultado2 =mysqli_fetch_array($con -> query($sql2));
$sql3="SELECT SUM(precio * pines - (precio * pines * porcentaje_descuento / 100)) FROM `compra`";
$resultado3 = mysqli_fetch_array($con -> query($sql3));
?> 
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIRP V.2</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body style="overflow-x: hidden; overflow-y: hidden;">
    <div class="text-center">
        <br>
            <strong><h2 style="color: #4e73df;">Contabilidad General</h2></strong>
        <hr>
    </div>
    <!-- Content Row -->
    <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-lg-4">
        <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">#Clientes</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $resultado[0]; ?></div>
            </div>
            <div class="col-auto">
                <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-lg-4">
        <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pines Vendidos</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $resultado2[0]; ?></div>
            </div>
            <div class="col-auto">
                <i class="fa fa-star fa-2x" aria-hidden="true"></i>
            </div>
            </div>
        </div>
        </div>
    </div>

        <div class="col-lg-4">
        <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Ganancias</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo number_format($resultado3[0], 0, ',', '.'); ?></div>
            </div>
            <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>

    </div>
    <!-- Content Row -->

    <div class="row mt-4">
    <!-- Area Chart -->
    <div class="col-lg-12">
        <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">Clientes</h3>
        </div>
        <!-- Card Body -->
        <div class="card-body" style="height: fit-content;">
            <div class="chart-area" style="height: auto;">
                <?php 
                $consulta = "SELECT * from cliente where estatus=1";
                $clientes = $con->query($consulta);
                ?>
                <table class="table" id="example" style="width: 100%;">
                <thead>
                    <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Pines comprados</th>
                    <th scope="col">Pines disponibles</th>
                    <th scope="col">Fecha registro</th>
                    </tr>
                </thead>
                <tbody>
                <?php  
                    while ($row = mysqli_fetch_array($clientes)) {
                ?>
                    <tr>
                    <td><?php echo $row[1] ?></td>
                    <td><?php echo $row[4] ?></td>
                    <td><?php echo $row[14] ?></td>
                    <td><?php echo $row[6] ?></td>
                    <td><?php echo $row[7] ?></td>
                    <td><?php echo $row[2] ?></td>
                    </tr>
                <?php  
                    }   
                ?>
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#example').DataTable({
            "order": [[ 0, "asc" ]],
            "columnDefs": [{
            "targets": 0
            }],
            language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ resultados",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando resultados _START_-_END_ de  _TOTAL_",
            "sInfoEmpty": "Mostrando resultados del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            }
        });
        });
    </script>
</body>
</html>
<?php 
} else {
    header("Location: ../../index.php");
    exit();
} 
?>
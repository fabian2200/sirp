<?php
session_start();
include_once("../conexion.php");
if(($_SESSION['logueado']) == true){ 
 $id = $_SESSION['id'];
 $sql="SELECT COUNT(*) FROM `empresa` WHERE idcl = $id";
 $sql2="SELECT pines FROM `cliente` WHERE idcl = $id";
 $sql3="SELECT pinesdisp FROM `cliente` WHERE idcl = $id";
 $sql4="SELECT * FROM `empresa` WHERE idcl = $id";
 $resultado =mysqli_fetch_array($con -> query($sql));
 $resultado2 =mysqli_fetch_array($con -> query($sql2));
 $resultado3 =mysqli_fetch_array($con -> query($sql3));
 $resultado4 =$con -> query($sql4);
 
?> 
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body style="padding: 20px;">
<?php 
  if ($resultado[0] == 0 ) { 
?>
 
  <div class="alert alert-danger text-center" role="alert" >
    <h4>Usted aún no ha registrado ninguna empresa.</h4>
    <h4>Si desea registrar una nueva empresa, por favor haga click en el siguiente botón. </h4>
  </div>
  <br>
  <div class="text-center">
    <a href="registrar_empresa.php" class="btn btn-success"><span><i class="fa fa-plus-square" aria-hidden="true"></i></span> Crear nueva empresa</a>
  </div> 
  <br> 
  <hr>
  <br>
  <div class="container-fluid text-center">

          
          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pines Comprados</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $resultado2[0]; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-map-pin fa-2x" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pines Disponibles</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $resultado2[0]; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-map-pin fa-2x" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php 
}else{
?> 

<div class="text-center">
  <h2>Contabilidad general</h2>
  <p>En esta sección podrás ver la contabilidad general de tus empresas, con los pines que has comprado y los pines que has utilizado.</p>
</div>
 <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-4 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pines Comprados</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $resultado2[0]; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-map-pin fa-2x" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-4 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pines Disponibles</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $resultado3[0]; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-map-pin fa-2x" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-4 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pines Utilizados</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $resultado2[0]-$resultado3[0]; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-map-pin fa-2x" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  </div>
  <br>
  <hr>
  
<div class="container">
  <h2>Mis empresas</h2>
  <p>listado de empresas que ha registrado hasta la fecha:</p>            
  <table class="table table-striped" style="font-size: 13px">
    <thead>
      <tr>
        <th style="text-align: center; vertical-align: middle; width: 20%;">Nombre</th>
        <th style="text-align: center; vertical-align: middle;">Empleados asignados</th>
        <th style="text-align: center; vertical-align: middle;">Emleados encuestados</th>
        <th style="text-align: center; vertical-align: middle;">Empleados Borrados</th>
        <th style="text-align: center; vertical-align: middle;">Pines disponibles</th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php 
     while ($row = mysqli_fetch_array($resultado4)) {
    ?>
      <tr>
        <td style="text-align: center; vertical-align: middle;"><a class="btn btn-success" href="ver_empleados.php?idempr=<?php echo $row[0] ?>"><i class="fa fa-search-plus"></i><span> <?php echo $row[2]; ?></span></a></td>
        <td style="text-align: center; vertical-align: middle;"><?php echo $row[3]; ?></td>
        <td style="text-align: center; vertical-align: middle;"><?php echo $row[4]; ?></td>
        <td style="text-align: center; vertical-align: middle;"><?php echo $row[8];?></td>
        <td style="text-align: center; vertical-align: middle;"><?php echo $row[3]-$row[4]; ?></td>
          <td>
          <?php if($row[3] - $row[4] > 0){ ?>
            <a href="registrar_empleado.php?proceso=<?php echo $row[0] ?>" class="btn btn-success"> Registrar empleado</a></td>
          <?php } ?>
          <td>
          <button onclick="document.getElementById('id01').style.display='block';cambiaValores(<?php echo $row[0]; ?>)" class="btn btn-danger"> <span><i class="fa fa-minus-square" aria-hidden="true"></i></span> Disminuir #empleados</a></button></td>
          <td> 
         <button onclick="document.getElementById('id02').style.display='block';cambiaValores2(<?php echo $row[0]; ?>)" class="btn btn-info"> <span><i class="fa fa-plus-square"></i></span> Aumentar #empleados</a></button></td>
      </tr>
    <?php 
      }
    ?>
    </tbody>
  </table>
</div>
<?php 
}
?>  
<br>  
<!-- Modal aumentar-->
 <div id="id01" class="w3-modal">
    <div class="w3-modal-content" style="width: 500px">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <div class="text-center"><h2>Disminuir empleados</h2></div> 
        <hr>
          <form method="POST" id="form_disminuir">
            <label style="font-size: 1.2em; font-weight: bold;" for="pinesdisminuir">Por favor ingrese el # de empleados que desea disminuir a esta empresa</label>
            <input type="number" id="pinesdisminuir" name="pinesdisminuir" class="form-control">
            <hr>
            <input type="hidden" name="idclientedisminuir" value="<?php echo $id ?>" class="form-control">
            <input type="hidden" class="form-control" id="Idempresa"  name="empresadisminuir" value="" >
            <div class="text-center"><button type="button" onclick="disminuirEmpleados()" class="btn btn-success"> <i class="fa fa-minus-square" aria-hidden="true"></i> Guardar</button></div>
            <br>
          </form>
      </div>
    </div>
  </div>
<!-- Modal --> 

  <!-- Modal disminuir -->
  <div id="id02" class="w3-modal">
    <div class="w3-modal-content" style="width: 500px">
      <div class="w3-container">
        <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <div class="text-center"><h2>Aumentar empleados</h2></div>
        <hr>
          <form method="POST" id="form_adicionar">
            <label style="font-size: 1.2em; font-weight: bold;" for="pinesadicionar">Por favor ingrese el # de empleados que desea adicionar a esta empresa</label>
            <input type="number" id="pinesadicionar" name="pinesadicionar" class="form-control">
            <input type="hidden" name="idlienteadicionar" value="<?php echo $id ?>" class="form-control">
            <input type="hidden" class="form-control" id="Idempresa2"  name="empresaadicionar" value="" >
            <hr>
            <div class="text-center"><button type="button" onclick="adicionarEmpleados()" class="btn btn-success"> <i class="fa fa-plus-square" aria-hidden="true"></i> Guardar</button></div>
            <br>
          </form>
      </div>
    </div>
  </div>
  <!-- Modal --> 
  <script type="text/javascript">
    function cambiaValores(valor) {
      var inputNombre = document.getElementById("Idempresa");
      inputNombre.value = valor;
      var pinesdisminuir = document.getElementById("pinesdisminuir");
      pinesdisminuir.value = 0;

  }
  function cambiaValores2(valor) {
      var inputNombre = document.getElementById("Idempresa2");
      inputNombre.value = valor;
      var pinesadicionar = document.getElementById("pinesadicionar");
      pinesadicionar.value = 0;
  }
  </script> 

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    function disminuirEmpleados() {
      $.ajax({
        url: "../acciones/disminuir_empleados.php",
        type: "POST",
        data: $("#form_disminuir").serialize(),
        beforeSend: function(){
          Swal.fire({
            title: "Disminuyendo empleados...",
            text: "Espere un momento por favor",
            icon: "info",
            allowOutsideClick: false,
            didOpen: function(){
              Swal.showLoading();
            }
          })
        },
        success: function(response){
          var data = JSON.parse(response);
          if(data.status == "success"){
            Swal.fire({
              title: data.message,
              icon: "success",
              confirmButtonText: "Aceptar",
              didClose: function(){
                window.location.reload();
              }
            })
          }else{
            Swal.fire({
              title: data.message,
              icon: "error",
              confirmButtonText: "Aceptar",
            })
          }
        },
        error: function(xhr, status, error){
          Swal.fire({
            title: "Error al disminuir empleados",
            icon: "error",
            confirmButtonText: "Aceptar",
          })
        }
      })
    }

    function adicionarEmpleados() {
      $.ajax({
        url: "../acciones/adicionar_empleados.php",
        type: "POST",
        data: $("#form_adicionar").serialize(),
        beforeSend: function(){
          Swal.fire({
            title: "Aumentando empleados...",
            text: "Espere un momento por favor",
            icon: "info",
            allowOutsideClick: false,
            didOpen: function(){
              Swal.showLoading();
            }
          })
        },
        success: function(response){
          var data = JSON.parse(response);
          if(data.status == "success"){
            Swal.fire({
              title: data.message,
              icon: "success",
              confirmButtonText: "Aceptar",
              didClose: function(){
                window.location.reload();
              }
            })
          }else{
            Swal.fire({
              title: data.message,
              icon: "error",
              confirmButtonText: "Aceptar",
            })
          }
        },
        error: function(xhr, status, error){
          Swal.fire({
            title: "Error al aumentar empleados",
            icon: "error",
            confirmButtonText: "Aceptar",
          })
        }
      })
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

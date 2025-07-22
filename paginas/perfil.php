<?php
session_start();
include_once("../conexion.php");
if(($_SESSION['logueado']) == true){ 
$id = $_SESSION['id'];
$sql = "SELECT * FROM cliente WHERE idcl = $id";
$usuario = mysqli_fetch_array($con->query($sql));
?> 
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Perfil de usuario</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body style="overflow-x: hidden; overflow-y: hidden;">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="row">
            <!-- Area Chart -->
            <div class="col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h3 class="m-0 font-weight-bold text-primary"> Perfil de usuario</h3>
                  <button onclick="history.back()" style="width: auto; height: 40px; font-size: 16px; font-weight: bold;" type="button" class="btn btn-danger" id="btn_completar_datos"><i class="fas fa-arrow-left"></i> Volver </button>
                </div>
                <!-- Card Body -->
                <div class="card-body" style="height: fit-content;">
                  <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                      <h3 class="m-0 font-weight-bold text-primary">Tus datos personales</h3>
                    </div>
                    <br>
                    <div class="card-body">
                      <div class="chart-area" style="height: auto;">
                        <form method="POST" id="form_editar_perfil" action="../acciones/editar_perfil.php">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="Nombre">Nombre Completo</label>
                                    <input value="<?php echo $usuario['nombre'] ?>" type="text" class="form-control" id="Nombre" placeholder="Nombre" name="Nombre" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Cedula">Cédula</label>
                                    <input value="<?php echo $usuario['nroidcc'] ?>" type="text" class="form-control" id="Cedula" placeholder="# de cédula" name="Cedula" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Profesion">Profesion</label>
                                    <input value="<?php echo $usuario['profesion'] ?>" type="text" class="form-control" id="Profesion" placeholder="Profesion" name="Profesion" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Postgrado">Postgrado</label>
                                    <input value="<?php echo $usuario['postgrado'] ?>" type="text" class="form-control" id="Postgrado" placeholder="Postgrado" name="Postgrado" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Tarjeta"># Tarjeta profesional</label>
                                    <input value="<?php echo $usuario['nrotarjprof'] ?>" type="number" class="form-control" id="Tarjeta" name="Tarjeta" placeholder="111111111" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="FLicencia">Fecha de expedición de la licencia profesional</label>
                                    <input value="<?php echo $usuario['fechexp'] ?>" type="date" class="form-control" id="FLicencia"  name="FLicencia" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Licencia"># Licencia profesional</label>
                                    <input value="<?php echo $usuario['nrolicprof'] ?>" type="number" class="form-control" id="Licencia" name="Licencia" placeholder="111111111" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Celular">#Celular</label>
                                    <input value="<?php echo $usuario['celular'] ?>" type="number" class="form-control" id="Celular"  name="Celular" placeholder="3000000000" required>
                                </div>   
                                <input type="hidden" class="form-control" id="id"  name="Id" value="<?php echo $usuario['idcl'] ?>">
                            </div>
                            <div class="text-center"> 
                                <button style="width: 40%; height: 40px; font-size: 16px; font-weight: bold; margin-top: 20px;" type="submit" class="btn btn-success" id="btn_completar_datos">Guardar <i class="fas fa-save"></i></button>
                            </div>    
                            <br>
                        </form>
                      </div>
                    </div>
                  </div>
                  <br>
                  <br>
                  <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                      <h3 class="m-0 font-weight-bold text-primary">Cambiar contraseña</h3>
                    </div>
                    <br>
                    <div class="card-body">
                      <div class="chart-area" style="height: auto;">
                        <form method="POST" id="form_cambiar_contrasena" action="../acciones/cambiar_contrasena.php">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="Contraseña">Contraseña Actual</label>
                                    <input type="password" class="form-control" id="Contrasena_Actual" placeholder="Contraseña actual" name="Contrasena_Actual" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="Contrasena_Nueva">Contraseña Nueva</label>
                                    <input type="password" class="form-control" id="Contrasena_Nueva" placeholder="Contraseña nueva" name="Contrasena_Nueva" required>
                                    <input type="hidden" class="form-control" id="id"  name="Id" value="<?php echo $usuario['idcl'] ?>">
                                </div>
                            </div>
                            <div class="text-center"> 
                                <button style="width: 40%; height: 40px; font-size: 16px; font-weight: bold; margin-top: 20px;" type="submit" class="btn btn-success" id="btn_completar_datos">Guardar <i class="fas fa-save"></i></button>
                            </div>    
                            <br>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <script>
    $('#form_editar_perfil').submit(function(e){
      e.preventDefault();
      if(verificar_formulario()){
        $.ajax({
          url: '../acciones/editar_perfil.php',
          type: 'POST',
          data: $(this).serialize(),
          beforeSend: function(){
            Swal.fire({
              title: 'Guardando datos, por favor espere...',
              icon: 'info',
              showConfirmButton: false,
              allowOutsideClick: false,
              allowEscapeKey: false,
              didOpen: function(){
                Swal.showLoading();
              }
            });
          },
          success: function(response){
            var data = JSON.parse(response);
            if(data.codigo == 1){
              Swal.fire({
                title: data.mensaje,
                icon: 'success',
                showConfirmButton: true,
                confirmButtonText: 'Ok',
                allowOutsideClick: false,
                willClose: function(){
                  location.reload();
                }
              });
            }else{
              Swal.fire({
                title: data.titulo,
                text: data.mensaje,
                icon: 'error',
                showConfirmButton: false,
                timer: 1500
              });
            }
          },
          error: function(xhr, status, error){
            Swal.fire({
              title: '¡Ha ocurrido un error!',
              text: 'No se pudo actualizar su información, por favor intente nuevamente mas tarde.',
              icon: 'error'
            });
          }
        });
      }else{
        Swal.fire({
          title: '¡Error!',
          text: 'Por favor, complete todos los campos del formulario.',
          icon: 'error'
        });
      }
    });

    function verificar_formulario(){
      var nombre = $('#Nombre').val();
      var cedula = $('#Cedula').val();
      var profesion = $('#Profesion').val();
      var postgrado = $('#Postgrado').val();
      var tarjeta = $('#Tarjeta').val();
      var flicencia = $('#FLicencia').val();
      var licencia = $('#Licencia').val();
      var celular = $('#Celular').val();
      if(nombre.trim() == '' || cedula.trim() == '' || profesion.trim() == '' || postgrado.trim() == '' || tarjeta.trim() == '' || flicencia.trim() == '' || licencia.trim() == '' || celular.trim() == ''){
        return false;
      }else{
        return true;
      }
    }

    $('#form_cambiar_contrasena').submit(function(e){
      e.preventDefault();
      if(verificar_formulario_cambiar_contrasena()){
        $.ajax({
          url: '../acciones/cambiar_contrasena.php',
          type: 'POST',
          data: $(this).serialize(),
          beforeSend: function(){
            Swal.fire({
              position: 'bottom',
              title: 'Guardando datos, por favor espere...',
              icon: 'info',
              showConfirmButton: false,
              allowOutsideClick: false,
              allowEscapeKey: false,
              didOpen: function(){
                Swal.showLoading();
              }
            });
          },
          success: function(response){
            var data = JSON.parse(response);
            if(data.codigo == 1){
              Swal.fire({
                position: 'bottom',
                title: data.mensaje,
                icon: 'success',
                showConfirmButton: true,
                confirmButtonText: 'Ok',
                allowOutsideClick: false,
                willClose: function(){
                  location.reload();
                }
              });
            }else{
              Swal.fire({
                position: 'bottom',
                title: data.titulo,
                text: data.mensaje,
                icon: 'error',
                showConfirmButton: false,
                timer: 1500
              });
            }
          },
          error: function(xhr, status, error){
            Swal.fire({
              position: 'bottom',
              title: '¡Ha ocurrido un error!',
              text: 'No se pudo actualizar su contraseña, por favor intente nuevamente mas tarde.', 
              icon: 'error'
            });
          }
        });
      }else{
        Swal.fire({
          position: 'bottom',
          title: '¡Error!',
          text: 'Por favor, complete todos los campos del formulario.',
          icon: 'error'
        });
      }
    });

    function verificar_formulario_cambiar_contrasena(){
      var contrasena_actual = $('#Contrasena_Actual').val();
      var contrasena_nueva = $('#Contrasena_Nueva').val();
      if(contrasena_actual.trim() == '' || contrasena_nueva.trim() == ''){
        return false;
      }else{
        return true;
      }
    }
  </script>
</body>

</html>
<?php
}else{  
  header("Location: ../../index.php");
  exit();
}
?>
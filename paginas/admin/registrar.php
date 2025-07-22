<?php
session_start();
include_once("../../conexion.php");
if(($_SESSION['logueado']) == true){ 
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

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

</head>

<body style="overflow-x: hidden; overflow-y: hidden;">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
      <!-- End of Topbar -->
      <div class="card shadow mb-4 m-4 p-4" style="width: 100%;">
        <!-- Begin Page Content -->
        <div class="container-fluid">
          
          <div class="form-row"><h2 class="text-primary" style="font-weight: bold;">Registro de nuevo cliente</h2></div>
          <hr>
          <form method="POST">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="Nombre">Nombre</label>
                <input type="text" class="form-control" id="Nombre" placeholder="Nombre" name="Nombre" required>
              </div>
              <div class="form-group col-md-6">
                <label for="Apellido">Apellido</label>
                <input type="text" class="form-control" id="Apellido" placeholder="Apellido" name="Apellido" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="Email">Correo</label>
                <input type="email" class="form-control" id="Correo" name="Correo" placeholder="1234@example.com" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="Pines">Pines</label>
                <input type="number" class="form-control" id="Pines" placeholder="# De Pines" name="Pines" required>
              </div>
              <div class="form-group col-md-4">
              <label for="Precio X Pin">Precio X Pin</label>
              <input type="number" class="form-control" id="Precio" name="Precio" placeholder="$20000" required>
              </div>
              <div class="form-group col-md-4">
                <label for="Porcentaje_descuento">Porcentaje de descuento</label>
                <input max="100" min="0" value="0" type="number" class="form-control" id="Porcentaje_descuento" name="Porcentaje_descuento" placeholder="0" required>
              </div>
            </div>
          <hr>
          <div class="text-center">
            <button style="width: 40%;" type="button" class="btn btn-primary" onclick="guardar_cliente()">Guardar cliente <i class="fas fa-save"></i></button>
            <button style="width: 40%;" type="button" class="btn btn-danger" onclick="history.back()">Cancelar <i class="fas fa-times"></i></button>
          </div>
          </form>
        </div>
      <!-- /.container-fluid -->
      </div>
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>

  <script>
    function guardar_cliente(){
      if($('#Nombre').val() == '' || $('#Apellido').val() == '' || $('#Pines').val() == '' || $('#Correo').val() == '' || $('#Precio').val() == '' || $('#Porcentaje_descuento').val() == '' ){
        Swal.fire({
          title: 'Error',
          text: 'Por favor, complete todos los campos',
          icon: 'error',
          showConfirmButton: true,
          allowOutsideClick: false,
          timer: 1500
        });
        return;
      }else{
        $.ajax({
          url: '../../acciones/guardar_cliente.php',
          type: 'POST',
          data: $('form').serialize(),
          beforeSend: function(){
            Swal.fire({
              title: 'Guardando...',
              text: 'Espere un momento por favor',
              icon: 'info',
              showConfirmButton: false,
              allowOutsideClick: false,
              progressBar: true,
              didOpen: () => {
                Swal.showLoading();
              }
            });
          },
          success: function(response){
            var data = JSON.parse(response);
            if(data.codigo == 1){
              enviar_correo(data.clave);
            }else{
              Swal.fire({ 
                title: data.mensaje,
                icon: 'error',
                showConfirmButton: true,
                allowOutsideClick: false,
                confirmButtonText: 'Ok'
              });
            }
          },
          error: function(response){
            Swal.fire({
              title: 'Error',
              text: 'Error al guardar el cliente',
              icon: 'error',
            });
          }
        });
      }
    }

    function enviar_correo(clave){
      $.ajax({
        url: '../../phpmailer/enviarCorreo.php',
        type: 'POST',
        data: {
          tipo_correo: 'nueva_venta_admin',
          nombre: $('#Nombre').val(),
          pines: $('#Pines').val(),
          usuario: $('#Correo').val(),
          contrasena: clave,
          precio_pin: $('#Precio').val(),
          porcentaje_descuento: $('#Porcentaje_descuento').val(),
        },
        beforeSend: function(){
          Swal.fire({
            title: 'Enviando correo...',
            text: 'Espere un momento por favor',
            icon: 'info',
            showConfirmButton: false,
            allowOutsideClick: false,
            progressBar: true,
            didOpen: () => {
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
              allowOutsideClick: false,
              confirmButtonText: 'Ok',
              didClose: () => {
                location.href = 'ventas.php';
              }
            });
          }else{
            Swal.fire({
              title: data.mensaje,
              icon: 'error',
              showConfirmButton: true,
              allowOutsideClick: false,
              confirmButtonText: 'Ok'
            });
          }
        },
        error: function(response){
          Swal.fire({
            title: 'Error',
            text: 'Error al enviar el correo',
            icon: 'error',
          });
        }
      });
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
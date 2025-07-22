<?php
session_start();
include_once("../../conexion.php");
if(($_SESSION['logueado']) == true){ ?> 
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

  <!-- Select2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- jQuery (requerido por Select2) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Select2 JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    .select2-container .select2-selection--single {
      box-sizing: border-box;
      cursor: pointer;
      display: block;
      height: 38px;
      user-select: none;
      -webkit-user-select: none;
      display: flex;
      align-items: center;
    }
  </style>
</head>

<body style="overflow-x: hidden; overflow-y: hidden;">

  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content" style="height: 600px; overflow-y: hidden;">

        <!-- Begin Page Content -->
        <div class="container-fluid card shadow mb-4 p-4">
          <div class="form-row text-center"><h2 class="text-primary" style="font-weight: bold;">Registro de nueva compra</h2></div>
            <hr>
              <form  method="POST">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="Identificacion">Seleccione un cliente</label>
                    <select name="Identificacion" class="form-control" id="Identificacion" required>
                      <option value="">Seleccione un cliente</option>
                    <?php 
                        $clientes = $con->query('SELECT * FROM cliente where estatus=1 order by nombre asc');
                        while ($row = mysqli_fetch_array($clientes)) {
                    ?>         
                        <option value="<?php echo $row[0] ?>"><?php echo $row[1]; ?></option>
                    <?php 
                      }
                    ?>
                    </select>
                  </div>     
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="Empleados"># De Pines</label>
                    <input type="number" class="form-control" id="Pines" min="1" name="Pines"  required>
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
                <button style="width: 40%;" type="button" class="btn btn-primary" onclick="guardar_compra()">Guardar compra <i class="fas fa-save"></i></button>
                <button style="width: 40%;" type="button" class="btn btn-danger" onclick="history.back()">Cancelar <i class="fas fa-times"></i></button>
              </div>
              </form>
        </div>  
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->



  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#Identificacion').select2({
        placeholder: "Seleccione un cliente",
        width: '100%'
      });
    });
  </script>
  <script>
    function guardar_compra(){
      if($('#Identificacion').val() == '' || $('#Pines').val() == '' || $('#Precio').val() == '' || $('#Porcentaje_descuento').val() == '' ){
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
          url: '../../acciones/guardar_compra.php',
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
              enviar_correo(data.nombre, data.correo);
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
              text: 'Error al guardar la compra',
              icon: 'error',
            });
          }
        });
      }
    }

    function enviar_correo(nombre, correo){  
      $.ajax({
        url: '../../phpmailer/enviarCorreo.php',
        type: 'POST',
        data: {
          tipo_correo: 'venta_existente_admin',
          nombre: nombre,
          usuario: correo,
          pines: $('#Pines').val(),
          precio_pin: $('#Precio').val(),
          porcentaje_descuento: $('#Porcentaje_descuento').val()
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


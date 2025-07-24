<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIRP V3.0</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

  <style>
    .input-group-text {
      display: flex;
      align-items: center;
      padding: .375rem .75rem;
      margin-bottom: 0;
      font-size: 1.5rem;
      font-weight: 400;
      line-height: 1.5;
      color: #6e707e;
      text-align: center;
      white-space: nowrap;
      background-color: #eaecf4;
      border: 1px solid #d1d3e2;
      border-radius: 10rem;
      width: 51px;
      display: flex;
      justify-content: center;
      align-items: center;
      padding-left: 1rem;
  }
  </style>
</head>

<body style="background-color: #4e73df">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center align-items-center" style="height: 100vh;">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row" >
              <div class="col-lg-5" style="display: flex; justify-content:center; align-items:center; flex-direction: column;">
                <img src="logo.png" style="width: 270px; height: auto;">
                <br>
                <div style="display: flex; justify-content:center; align-items:center; background-color:rgba(187, 204, 255, 0.81); padding: 10px; border-radius: 10px; width: 60%; margin-left: 70px;">
                  <img src="icono-icp.png" style="width: 50px; height: auto;">
                  <p style="margin-bottom: 0px; font-size: 12px; font-weight: 600; color:rgb(79, 52, 180);">Instituto Colombiano <br> de Psicometría</p>
                </div>
              </div>
              <div class="col-lg-7">
                <div class="p-5">
                  <div class="text-center">
                    <h1 style="font-size: 2rem; font-weight: 900; color: #4e73df;">SIRP V3.0</h1>
                    <h3 style="font-weight: 600; color:rgb(106, 131, 206);">¡Bienvenido de Nuevo!</h3>
                  </div>
                  <br>
                  <form class="user" action="login.php" method="POST" id="loginForm">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="usuario" placeholder="usuario@correo.com">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="password" name="pass" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                       <br>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block" style="font-size: 27px">Ingresar <span><i class="fa fa-sign-in" aria-hidden="true"></i></span></button> 
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#loginForm').submit(function(e) {
        e.preventDefault();
        var usuario = $('#exampleInputEmail').val();
        var pass = $('#exampleInputPassword').val();
        $.ajax({
          url: 'acciones/login.php',
          type: 'POST',
          data: { usuario: usuario, pass: pass },
          beforeSend: function() {
            Swal.fire({
              title: 'Verificando datos...',
              text: 'Espere un momento por favor',
              showConfirmButton: false,
              allowOutsideClick: false,
              showCancelButton: false,
              showCloseButton: false,
              didOpen: function() {
                Swal.showLoading();
              }
            });
          },
          success: function(response) {
            response = JSON.parse(response);
            if (response.success) {
              Swal.fire({
                title: 'Datos correctos',
                text: response.message,
                icon: 'success',
                showConfirmButton: true,
                allowOutsideClick: false,
                showCancelButton: false,
                showCloseButton: false,
                willClose: function() {
                  window.location.href = response.url;
                }
              });
            } else {
              Swal.fire({
                title: 'Error',
                text: response.message,
                icon: 'error',
                showConfirmButton: true,
                allowOutsideClick: false,
              });
            }
          }, 
          error: function(xhr, status, error) {
            Swal.fire({
              title: 'Error',
              text: 'Error al verificar los datos',
              icon: 'error',
            });
          }
        });
      });
    });
  </script>
</body>

</html>

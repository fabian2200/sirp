<?php
session_start();
include_once("conexion.php");
if(($_SESSION['logueado']) == true){ ?> 
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIRP V.3</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="position: fixed; z-index: 10; width: 16vw !important;">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="cliente.php">
        <div class="sidebar-brand-icon rotate-n-15">
         <i class="fa fa-copyright" aria-hidden="true"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIRP V.3</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
          <br>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active" style="text-align: center;color: white">
         <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Menú</span>
          <br> 
      </li>
       <br>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interfaz
      </div>

      <?php 
            $id =  $_SESSION['id'];
            $datos=  mysqli_fetch_array($con->query("SELECT * FROM cliente where idcl = $id and infcompletada = 0"));
            if(!empty($datos)){
            }else{
      ?>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fa fa-home" aria-hidden="true"></i>
          <span>Empresas</span>
        </a>
        <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones:</h6>
            <a class="collapse-item" href="paginas/empresas.php" target="iframe_a" >Mis Empresas</a>
            <a class="collapse-item" href="paginas/registrar_empresa.php"  target="iframe_a" >Nueva Empresa</a>
            <a class="collapse-item" href="paginas/departamentos.php"  target="iframe_a" >Areas o Departamentos</a>
          </div>
        </div>
      </li>
       <li class="nav-item text-center">
        <a class="nav-link" href="paginas/informe.php" target="iframe_a">
         <span><i class="fa fa-file-text" aria-hidden="true"></i></span> Informes</a>
      </li>
      <!-- Divider -->
      <!--
      <hr class="sidebar-divider">
       <li class="nav-item text-center">
        <a class="nav-link" href="paginas/informe-tabla.php" target="iframe_a">
         <span><i class="fa fa-file-excel-o" aria-hidden="true"></i></span> Informe Tipo Tabla</a>
      </li>
      -->
      <?php 
            }
      ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column" style="margin-left: 16vw;">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="position: fixed; width: 84vw !important;">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

           


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nombre']; ?></span>
                <img class="img-profile rounded-circle" src="img/user.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item"  href="paginas/perfil.php" target="iframe_a">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar sesion
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" style="margin-top: 90px;">

          <!--===============================================================================================-->
                
          <script language="JavaScript">
          //Ajusta el tamaño de un iframe al de su contenido interior para evitar scroll
                    function autofitIframe(id){
                      if (!window.opera && document.all && document.getElementById){
                      id.style.height=id.contentWindow.document.body.scrollHeight;
                      } else if(document.getElementById) {
                      id.style.height=id.contentDocument.body.scrollHeight+"px";
                      }
                    }
          </script>
          <!--===============================================================================================-->

          <?php 
          $id =  $_SESSION['id'];
          $datos=  mysqli_fetch_array($con->query("SELECT * FROM cliente where idcl = $id and infcompletada = 0"));
          $ruta = "paginas/empresas.php";
          if(!empty($datos)){
          $ruta = "completar_datos.php";
          }

          ?>
          <!--===============================================================================================-->
          <iframe height="300px" width="100%" src="<?php echo $ruta ?>" name="iframe_a" style="border: none;" scrolling="no" onload="autofitIframe(this);">
                    <img src="https://cdn.semanariolacalle.com/2018/08/Ministerio-de-Educaci%C3%B3n-Nacional-otorga-registro-calificado-a-primera-Maestr%C3%ADa-propia-a-la-UPC.-1024x681.jpg" alt="">
          </iframe>
          </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; ICP V3.0 <script>document.write(new Date().getFullYear());</script></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Está seguro?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar <i class="fas fa-times"></i></button>
          <a class="btn btn-primary" href="cerrar.php">Salir <i class="fas fa-sign-out-alt"></i></a>
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

</body>

</html>
<?php
}else{  
  header("Location: index.php");
  exit();
}
?>

<?php
session_start();
include_once("../conexion.php");
if(($_SESSION['logueado']) == true){ 
 $id = $_SESSION['id'];
?> 
<!DOCTYPE html>
<html>
<head>
  <title></title>
  
  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <div class="container-fluid" style="padding: 50px; min-height: 400px;">
    <div class="form-row text-center"><h2 style="color: #224abe !important; font-weight: bold;">Registro de nueva Empresa</h2></div>
        <hr>
        <form id="form_empresa" method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="Nombre">Nombre</label>
              <input type="text" class="form-control" id="Nombre" placeholder="Nombre" name="Nombre" required>
            </div>
            <div class="form-group col-md-6">
              <label for="Empleados"># de empleados</label>
              <input type="number" class="form-control" id="Empleados"  name="Empleados"  required>
              <input type="hidden" class="form-control" id="Empleados"  name="Id" value="<?php echo $id ?>" required>
            </div>      
          </div>
        <hr>
        <button style="font-size: 1.2em;" type="button" id="btn_guardar" class="btn btn-success">Guardar <i class="fa fa-save"></i></button>
      </form>
    </div>  
  <br>   
</body>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
  $(document).ready(function(){
    $("#btn_guardar").click(function(){
      if(validar_formulario()){
        $.ajax({
          url: "../acciones/guardar_empresa.php",
          type: "POST",
          data: $("#form_empresa").serialize(),
          beforeSend: function(){
            Swal.fire({
              title: "Guardando...",
              text: "Espere un momento por favor",
              icon: "info",
              showConfirmButton: false,
            });
          },
          success: function(response){
            var data = JSON.parse(response);
            if(data.status == "success"){
              Swal.fire({
                title: data.message,
                icon: "success",
                showConfirmButton: true,
                allowOutsideClick: false,
                timer: 1500,
                willClose: function(){
                  window.location.href = data.href;
                }
              });
            }else{
              Swal.fire({
                title: data.message,
                icon: "error",
                showConfirmButton: true,
                allowOutsideClick: false,
              });
            }
          },
          error: function(xhr, status, error){  
            Swal.fire({
              title: "Error",
              text: "Ha ocurrido un error, intente nuevamente",
              icon: "error",
              showConfirmButton: true,
              allowOutsideClick: false,
            });
          }
        });
      }else{
        Swal.fire({
          title: "Error",
          text: "Por favor, complete todos los campos",
          icon: "error",
          showConfirmButton: true,
          allowOutsideClick: false,
        });
      }
    });
  });

  function validar_formulario(){
    var nombre = $("#Nombre").val();
    var empleados = $("#Empleados").val();
    if(nombre == "" || empleados == ""){
      return false;
    }
    return true;
  }
</script>

</html>

<?php
}else{  
  header("Location: ../index.php");
  exit();
}
?>

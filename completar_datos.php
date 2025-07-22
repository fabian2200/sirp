<?php
session_start();
include_once("conexion.php");
if(($_SESSION['logueado']) == true){ ?> 

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
 <div class="alert alert-danger" role="alert">
  <h4>Bienvenido, usted es un usuario nuevo, por lo tanto debe de completar su informacion.</h4>
  <h4>llene todos los campos del siguiente formulario : </h4>
</div>
<br>
  <form method="POST" id="form_completar_datos">
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
      <div class="form-group col-md-6">
        <label for="Cedula">Cédula</label>
        <input type="text" class="form-control" id="Cedula" placeholder="# de cédula" name="Cedula" required>
      </div>
      <div class="form-group col-md-6">
        <label for="Profesion">Profesion</label>
        <input type="text" class="form-control" id="Profesion" placeholder="Profesion" name="Profesion" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="Postgrado">Postgrado</label>
        <input type="text" class="form-control" id="Postgrado" placeholder="Postgrado" name="Postgrado" required>
      </div>
      <div class="form-group col-md-6">
        <label for="Tarjeta"># Tarjeta profesional</label>
      <input type="number" class="form-control" id="Tarjeta" name="Tarjeta" placeholder="111111111" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="FLicencia">F.Exp Licencia profesional</label>
        <input type="date" class="form-control" id="FLicencia"  name="FLicencia" required>
      </div>
      <div class="form-group col-md-6">
        <label for="Licencia"># Licencia profesional</label>
      <input type="number" class="form-control" id="Licencia" name="Licencia" placeholder="111111111" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="Celular">#Celular</label>
        <input type="number" class="form-control" id="Celular"  name="Celular" placeholder="3000000000" required>
      </div>   
      <input type="hidden" class="form-control" id="id"  name="Id" value="<?php echo $_SESSION['id'] ?>">
    </div>
    <div class="text-center"> 
      <button onclick="completar_datos()" style="width: 80%; height: 40px; font-size: 16px; font-weight: bold; margin-top: 20px;" type="button" class="btn btn-success" id="btn_completar_datos">Guardar <i class="fas fa-save"></i></button>
    </div>    
    <br>
  </form>
  <br>        
</body>
</html>
<script>
  function completar_datos(){
    if(verificar_formulario()){
      $.ajax({
        url: 'acciones/completar_datos.php',
        type: 'POST',
        data: $('#form_completar_datos').serialize(),
        beforeSend: function(){
          Swal.fire({
            text: 'Guardando datos, por favor espere...',
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
              confirmButtonColor: '#21BEB4',
              allowOutsideClick: false,
              willClose: function(){
                window.location.href = data.url;
              }
            });            
          }else{
            Swal.fire({
              title: data.titulo,
              text: data.mensaje,
              icon: 'error'
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
    } else{
      Swal.fire({
        title: '¡Error!',
        text: 'Por favor, complete todos los campos del formulario.',
        icon: 'error'
      });
    }
  }

  function verificar_formulario(){
    var cedula = $('#Cedula').val();
    var nombre = $('#Nombre').val();
    var apellido = $('#Apellido').val();
    var profesion = $('#Profesion').val();
    var postgrado = $('#Postgrado').val();
    var tarjeta = $('#Tarjeta').val();
    var flicencia = $('#FLicencia').val();
    var licencia = $('#Licencia').val();
    var celular = $('#Celular').val();
    var id = $('#id').val();

    if(cedula.trim() == '' || nombre.trim() == '' || apellido.trim() == '' || profesion.trim() == '' || postgrado.trim() == '' || tarjeta.trim() == '' || flicencia.trim() == '' || licencia.trim() == '' || celular.trim() == '' || id.trim() == ''){
      return false;
    }else{
      return true;
    }
  }
</script>
<?php
}else{  
  exit();
}
?>

<?php
session_start();
include_once("../conexion.php");
if(($_SESSION['logueado']) == true){ 
 $id = $_SESSION['id'];
 $sql="SELECT * FROM `departamentos` WHERE idcl = $id";
 $resultado = $con -> query($sql);
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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<body style="padding: 20px;">

  <div class="text-center">
    <h2 style="font-weight: bold; color: #224abe; ">Areas o Departamentos</h2>
    <p>En esta sección podrás ver los departamentos que has registrado hasta la fecha.</p>
    <br>
    <button style="font-size: 1.4em;" class="btn btn-success" data-toggle="modal" data-target="#modal_departamento"> <i class="fa fa-plus"></i> Nuevo Departamento</button>
    <br>
    <br>
  </div>
  <hr>
  <div class="container">
    <table class="table table-striped" id="tabla_departamentos" style="font-size: 13px; width: 100%;">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Fecha de creación</th>
          <th style="text-align: center;">Acciones</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      while ($row = mysqli_fetch_array($resultado)) {
      ?>
        <tr>
          <td style="font-weight: bold; text-transform: capitalize;"><?php echo $row[1]; ?></td>
          <td><?php echo $row[5]; ?></td>
          <td style="text-align: center;">
            <a href="#" data-toggle="modal" data-target="#modal_editar_departamento" onclick="cambiarValores('<?php echo $row[0]; ?>', '<?php echo $row[1]; ?>')" class="btn btn-success"> <i class="fa fa-edit"></i></a>
            <a href="#" onclick="eliminarDepartamento(<?php echo $row[0]; ?>)" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php 
        }
      ?>
      </tbody>
    </table>
  </div>

  <div class="modal fade" id="modal_departamento" role="dialog">
    <div class="modal-dialog modal-dialog-centered"> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h2 style="font-weight: bold; color: #224abe; ">Nuevo Departamento</h2>
          <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <h4>Nombre del departamento:</h4>
          <form method="POST" id="form_departamento">
          	<input type="text" name="Nombredepartamento" class="form-control" required>
          	<hr>
          	<input type="hidden" name="Idcliente" value="<?php echo $id ?>" class="form-control">
          	<button type="button" id="btn_guardar" onclick="guardarDepartamento()" class="btn btn-success">Guardar <i class="fa fa-save"></i></button>
          </form>
        </div>
      </div>
    </div>
  </div> 

  <div class="modal fade" id="modal_editar_departamento" role="dialog">
    <div class="modal-dialog modal-dialog-centered"> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h2 style="font-weight: bold; color: #224abe; ">Editar Departamento</h2>
          <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <h4>Nombre del departamento:</h4>
          <form method="POST" id="form_editar_departamento">
            <input type="hidden" name="Iddepartamento" id="Iddepartamento" class="form-control">
          	<input type="text" name="Nombredepartamento" id="Nombredepartamento" class="form-control" required>
          	<hr>
          	<input type="hidden" name="Idcliente" value="<?php echo $id ?>" class="form-control">
          	<button type="button" id="btn_guardar" onclick="editarDepartamento()" class="btn btn-success">Guardar <i class="fa fa-save"></i></button>
          </form>
        </div>
      </div>
    </div>
  </div> 
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#tabla_departamentos').DataTable(
        {
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
        }
      );
    });

    function guardarDepartamento(){
      $.ajax({
        url: "../acciones/guardar_departamento.php",
        type: "POST",
        data: $("#form_departamento").serialize(),
        beforeSend: function(){
          Swal.fire({
            title: "Guardando...",
            text: "Espere un momento por favor",
            icon: "info",
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: function(){
              Swal.showLoading();
            }
          });
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
            });
          }else{
            Swal.fire({ 
              title: data.message,
              icon: "error",
              confirmButtonText: "Aceptar",
            });
          }
        },
        error: function(xhr, status, error){  
          Swal.fire({
            title: "Error",
            text: "Ha ocurrido un error, intente nuevamente",
            icon: "error",
            confirmButtonText: "Aceptar",
          });
        }
      });
    }

    function cambiarValores(id, nombre){
      var inputNombre = document.getElementById("Nombredepartamento");
      inputNombre.value = nombre;
      var inputId = document.getElementById("Iddepartamento");
      inputId.value = id;
    }

    function editarDepartamento(){
      $.ajax({
        url: "../acciones/editar_departamento.php",
        type: "POST",
        data: $("#form_editar_departamento").serialize(),
        beforeSend: function(){
          Swal.fire({
            title: "Guardando...",
            text: "Espere un momento por favor",
            icon: "info",
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: function(){
              Swal.showLoading();
            }
          });
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
            });
          }else{
            Swal.fire({ 
              title: data.message,
              icon: "error",
              confirmButtonText: "Aceptar",
            });
          }
        },
        error: function(xhr, status, error){      
          Swal.fire({
            title: "Error",
            text: "Ha ocurrido un error, intente nuevamente",
            icon: "error",
            confirmButtonText: "Aceptar",
          });
        }
      });
    }

    function eliminarDepartamento(id){
      Swal.fire({
        title: "¿Estás seguro?",
        text: "No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, eliminar!"
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "../acciones/eliminar_departamento.php",
            type: "POST",
            data: { id: id },
            beforeSend: function(){
              Swal.fire({
                title: "Eliminando...",
                text: "Espere un momento por favor",
                icon: "info",
                allowOutsideClick: false,
                showConfirmButton: false,
              });
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
                });   
              }else{
                Swal.fire({
                  title: data.message,
                  icon: "error",
                  confirmButtonText: "Aceptar",
                });
              }
            }
          });
        }
      });
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

<?php
session_start();
include_once("../../conexion.php");
if(($_SESSION['logueado']) == true){ 
    $paquetes = $con->query("SELECT * FROM paquetes ORDER BY total DESC");
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
                  <h3 class="m-0 font-weight-bold text-primary"> Paquetes de pines (SIRP)</h3>
                  <div class="d-flex flex-row align-items-center justify-content-between">
                    <a href="#" data-toggle="modal" data-target="#agregarPaquete" class="btn btn-success">Agregar paquete <i class="fas fa-plus"></i></a>
                    <button style="margin-left: 10px;" class="btn btn-danger" onclick="history.back()">Volver <i class="fas fa-arrow-left"></i></button>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body" style="height: fit-content;">
                  <div class="chart-area" style="height: auto;">
                     <table class="table" id="example" style="width: 100%;">
                       <thead>
                         <tr>
                           <th scope="col">Nombre</th>
                           <th scope="col">Número de pines</th>
                           <th scope="col">Precio por pin</th>
                           <th scope="col">Subtotal</th>
                           <th scope="col">Descuento</th>
                           <th scope="col">Total</th>
                           <th scope="col">Acciones</th>
                         </tr>
                       </thead>
                       <tbody>
                        <?php  
                          while ($row = mysqli_fetch_array($paquetes)) {
                        ?>
                         <tr>
                           <td><?php echo $row["nombre"] ?></td>
                           <td><?php echo $row["numero_pines"] ?></td>
                           <td>$<?php echo number_format($row["precio_pin"], 0, ',', '.') ?></td>
                           <td>$<?php echo number_format($row["subtotal"], 0, ',', '.') ?></td>
                           <td><?php echo $row["descuento"] ?>%</td>
                           <td>$<?php echo number_format($row["total"], 0, ',', '.') ?></td>
                           <td style="width: 100px;">
                            <a href="#" onclick="mapearPaquete(<?php echo $row['id'] ?>, '<?php echo $row['nombre'] ?>', <?php echo $row['numero_pines'] ?>, <?php echo $row['precio_pin'] ?>, <?php echo $row['descuento'] ?>)" data-toggle="modal" data-target="#editarPaquete" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="#" onclick="eliminarPaquete(<?php echo $row['id'] ?>, '<?php echo $row['nombre'] ?>')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                           </td>
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
        </div>
      </div>
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

   <!-- Logout Modal-->
  <div class="modal fade" id="agregarPaquete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; color: #4e73df;">Agregar paquete</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" id="formPaquete">
            <div class="form-group row">
              <div class="col-md-12">
                <label for="nombre">Nombre del paquete</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
              </div>
              
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="numero_pines">Número de pines</label>
                    <input type="number" class="form-control" id="numero_pines" name="numero_pines" required>
                </div>
                <div class="col-md-4">
                    <label for="precio_pin">Precio por pin</label>
                    <input type="number" class="form-control" id="precio_pin" name="precio_pin" required>
                </div>
                <div class="col-md-4">
                    <label for="descuento">Descuento</label>
                    <input type="number" class="form-control" id="descuento" name="descuento" required>
                </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="validarFormulario()">Agregar <i class="fas fa-plus"></i></button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar <i class="fas fa-times"></i></button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editarPaquete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; color: #4e73df;">Editar paquete</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" id="formPaqueteEditar">
            <div class="form-group row">
              <div class="col-md-12">
                <label for="nombre">Nombre del paquete</label>
                <input type="hidden" id="id_editar" name="id">
                <input type="text" class="form-control" id="nombre_editar" name="nombre" required>
              </div>
              
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="numero_pines">Número de pines</label>
                    <input type="number" class="form-control" id="numero_pines_editar" name="numero_pines" required>
                </div>
                <div class="col-md-4">
                    <label for="precio_pin">Precio por pin</label>
                    <input type="number" class="form-control" id="precio_pin_editar" name="precio_pin" required>
                </div>
                <div class="col-md-4">
                    <label for="descuento">Descuento</label>
                    <input type="number" class="form-control" id="descuento_editar" name="descuento" required>
                </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="validarFormularioEditar()">Editar <i class="fas fa-edit"></i></button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar <i class="fas fa-times"></i></button>
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
        "order": [[ 6, "asc" ]],
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

  <script>
    function validarFormulario() {
        var nombre = document.getElementById("nombre").value;
        var numero_pines = document.getElementById("numero_pines").value;
        var precio_pin = document.getElementById("precio_pin").value;
        var descuento = document.getElementById("descuento").value;

        if (nombre.trim() == "" || numero_pines.trim() == "" || precio_pin.trim() == "" || descuento.trim() == "") {
            Swal.fire({
            title: "Error",
            text: "Todos los campos son requeridos",
            icon: "error",
            confirmButtonText: "Aceptar"
            });
            return false;
        }else{
            guardarPaquete();
        }
    }

    function guardarPaquete() {
        $.ajax({
            url: "../../acciones/agregar_paquete.php",
            type: "POST",
            data: $('#formPaquete').serialize(),
            beforeSend: function() {
                Swal.fire({
                    title: "Guardando paquete...",
                    icon: "info",
                    showConfirmButton: false,
                    didOpen: function() {
                        Swal.showLoading();
                    }
                });
            },
            success: function(response) {
                var data = JSON.parse(response);
                if(data.status == "success"){
                    Swal.fire({
                        title: data.message,
                        icon: "success",
                        confirmButtonText: "Aceptar",
                        willClose: function() {
                            location.reload();
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
            error: function(xhr, status, error) {
                Swal.fire({
                    title: "Error",
                    text: "Error al guardar el paquete",
                    icon: "error",
                    confirmButtonText: "Aceptar"
                });
            }
        });
    }
  </script>

  <script>
    function mapearPaquete(id, nombre, numero_pines, precio_pin, descuento) {
      document.getElementById("id_editar").value = id;
      document.getElementById("nombre_editar").value = nombre;
      document.getElementById("numero_pines_editar").value = numero_pines;
      document.getElementById("precio_pin_editar").value = precio_pin;
      document.getElementById("descuento_editar").value = descuento;
    }

    function validarFormularioEditar() {
        var nombre = document.getElementById("nombre_editar").value;
        var numero_pines = document.getElementById("numero_pines_editar").value;
        var precio_pin = document.getElementById("precio_pin_editar").value;
        var descuento = document.getElementById("descuento_editar").value;

        if (nombre.trim() == "" || numero_pines.trim() == "" || precio_pin.trim() == "" || descuento.trim() == "") {
            Swal.fire({
                title: "Error",
                text: "Todos los campos son requeridos",
                icon: "error",
                confirmButtonText: "Aceptar"
            });
            return false;
        }else{
            editarPaquete();
        }
    }

    function editarPaquete() {
        $.ajax({
            url: "../../acciones/editar_paquete.php",
            type: "POST",
            data: $('#formPaqueteEditar').serialize(),
            beforeSend: function() {
                Swal.fire({
                    title: "Editando paquete...",
                    icon: "info",
                    showConfirmButton: false,
                    didOpen: function() {
                        Swal.showLoading();
                    }
                });
            },
            success: function(response) {
                var data = JSON.parse(response);
                if(data.status == "success"){
                    Swal.fire({
                        title: data.message,
                        icon: "success",
                        confirmButtonText: "Aceptar",
                        willClose: function() {
                            location.reload();
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
            error: function(xhr, status, error) {
                Swal.fire({
                    title: "Error",
                    text: "Error al editar el paquete",
                    icon: "error",
                    confirmButtonText: "Aceptar"
                });
            }
        });
    }
  </script>

  <script>
    function eliminarPaquete(id, nombre) {
        Swal.fire({
            title: "¿Estás seguro, de eliminar el paquete " + nombre + "?",
            text: "No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminar!",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) { 
                confirmarEliminacion(id);
            }
        });
    }

    function confirmarEliminacion(id) {
        $.ajax({
            url: "../../acciones/eliminar_paquete.php",
            type: "POST", 
            data: { id: id },
            beforeSend: function() {
                Swal.fire({
                    title: "Eliminando paquete...",
                    icon: "info",
                    showConfirmButton: false,
                    didOpen: function() {
                        Swal.showLoading();
                    }
                });
            },
            success: function(response) {
                var data = JSON.parse(response);  
                if(data.status == "success"){
                    Swal.fire({
                        title: data.message,
                        icon: "success",
                        confirmButtonText: "Aceptar",
                        willClose: function() {
                            location.reload();
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
            error: function(xhr, status, error) {
                Swal.fire({
                    title: "Error",
                    text: "Error al eliminar el paquete",
                    icon: "error",
                    confirmButtonText: "Aceptar"
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
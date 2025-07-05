<?php
session_start();
include_once("../conexion.php");
if(($_SESSION['logueado']) == true){ 
 $idempresa = $_GET['idempr'];
 $idcliente = $_SESSION['id'];
 $sql="SELECT * FROM `empresa` where idem = $idempresa";
 $resultado = mysqli_fetch_array($con -> query($sql));
 $sql2="SELECT * FROM `empleado` where idempresa = $idempresa order by idus desc";
 $resultado2 = $con -> query($sql2);
 include ('ruta.php');
?> 

  <!DOCTYPE html>
  <html lang="es">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>

      <!--datatables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

  <style>
    .modal-lg {
      max-width: 1000px;
    }
  </style>
  </head>

<body style="padding: 20px;">
<div class="text-center">
  <div class="container">
    <br>
    <div class="text-center">
      <h2><strong><?php echo  $resultado[2]; ?></strong></h2>
    </div>
    <hr>
    <?php
      if($resultado2->num_rows==0){
    ?>
    <div class="alert alert-success" role="alert">
      <h3><strong>Apreciado Experto </strong></h3>
      <br>
      Con respecto a los datos sociodemográficos (Ficha de datos generales) de los empleados, usted tiene dos opciones: 
      <br>
      <br>
      <div class="row">
        <div class="col-md-6">
          <div class="alert alert-warning text-left h-100" role="alert">
            <strong>1.	Digitar los datos directamente <br> en nuestra plataforma.</strong><br><br>
            <a href="registrar_empleado.php?proceso=<?php echo $idempresa ?>" class="btn btn-warning"><i class="fa fa-user-plus" aria-hidden="true"></i><span> Registrar empleado</span></a>
            <br>
          </div>
        </div>
        <div class="col-md-6">
          <div class="alert alert-warning text-left h-100" role="alert">
            <strong>2.	Cargar todos los datos de los empleado, utilizando el formato excel.</strong><br><br>
            <a href="#" data-toggle="modal" data-target="#modalCargarEmpleados" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i><span> Cargar empleados</span></a>
            <br>
          </div>
        </div>
      </div>
      <br>
      <br>
      <div class="alert alert-primary" role="alert">
        <strong>Para descargar el formato de instrucciones <br> y el formato excel de empleados, haga click en el siguiente enlace:</strong> <a href="empleados.zip"><i class="fa fa-file-archive-o" aria-hidden="true"></i><span> Descargar</span></a>
      </div>
    </div> 
    <?php
      } else {
    ?>
    <br>
    <div class="row">
      <div class="col-md-8 d-flex align-items-center justify-content-center">
        <div class="alert alert-danger" role="alert">
          <strong>Atencion! </strong> el icono de color <strong>rojo</strong> indica que las respuestas del cuestionario no se han digitado, y para hacerlo, debe de darle click.
        </div>
      </div>
      <div class="col-md-4 d-flex align-items-center justify-content-center">
        <div class="container text-center">
          <a href="registrar_empleado.php?proceso=<?php echo $idempresa ?>" class="btn btn-warning"><i class="fa fa-user-plus" aria-hidden="true"></i><span> Registrar empleado</span></a>
        </div>
      </div>
      </div>
      <br>
    <?php
      }
    ?>
    <hr>
    <div class="text-center"><h2>Estado de los cuestionarios</h2></div>
    <br>
<div class="container">
<div class="table-responsive">
  <table id="example"  class="table table-sm table-striped table-hover table-bordered">
    <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Empleado</th>
            <th scope="col">Intra</th>
            <th scope="col">Extralaboral</th>
            <th scope="col">Estres</th>
            <th scope="col">Accion</th>
          </tr>
    </thead>
	<tbody>
<?php 
        while ($row = mysqli_fetch_array($resultado2)) {  
        $rutaa = ruta_A($row[29],$row[30],$row[31],$row[32],$row[33],$row[34],$row[0]); 
        $rutab = ruta_B($row[36],$row[37],$row[38],$row[39],$row[0]);
      ?>
      <tr>
        <td style="text-align: center"><?php echo $row[0]; ?></td>
        <td style="text-align: center"><?php echo $row[4]; ?></td>
        <td style="text-align: center">
            <?php 
              if ($row[28]==0) {       
               if ($row[35]==1) {
            ?>    
              <a onclick="verificarSiComenzo(event, this.href, <?php echo $row[29] ?>,<?php echo $row[30] ?>,<?php echo $row[31] ?>,<?php echo $row[32] ?>,<?php echo $row[33] ?>,<?php echo $row[34] ?>,<?php echo $row[36] ?>,<?php echo $row[37] ?>,<?php echo $row[38] ?>,<?php echo $row[39] ?>, <?php echo $row[41] ?>, <?php echo $row[43] ?>, <?php echo $row[0] ?>, 'intra-b')" href="<?php echo $rutab ?>"><span><i class="fa fa-file-text" style="color: red" aria-hidden="true"> Intra-B</i></span></a>       
            <?php 
               }else{
            ?> 
               <a download class="btn btn-success" href="../reportes_individuales/<?php echo $row[3] ?>/intra-B_<?php echo $row[4] ?>_<?php echo $row[2] ?>.pdf"><span><i class="fa fa-download" aria-hidden="true"></i></span> Intra-B</a>
            <?php    
               }
             }else{
                  if ($row[28]==1) {
            ?>
                <a onclick="verificarSiComenzo(event, this.href, <?php echo $row[29] ?>,<?php echo $row[30] ?>,<?php echo $row[31] ?>,<?php echo $row[32] ?>,<?php echo $row[33] ?>,<?php echo $row[34] ?>,<?php echo $row[36] ?>,<?php echo $row[37] ?>,<?php echo $row[38] ?>,<?php echo $row[39] ?>, <?php echo $row[41] ?>, <?php echo $row[43] ?>, <?php echo $row[0] ?>, 'intra-a')" href="<?php echo $rutaa ?>"><span><i class="fa fa-file-text" style="color: red" aria-hidden="true"> Intra-A</i></span></a>
            <?php  
              }else{
            ?>
               <a download class="btn btn-success" href="../reportes_individuales/<?php echo $row[3] ?>/intra-A_<?php echo $row[4] ?>_<?php echo $row[2] ?>.pdf"><span><i class="fa fa-download" aria-hidden="true"></i></span> Intra-A</a> 
            <?php
              }
            }
            ?>
        </td>
        <td style="text-align: center">
            <?php 
              if ($row[40]==0) {             
            ?>    
              <h5>No aplica</h5>       
            <?php    
             }else{
                  if ($row[40]==1) {
            ?>
                <a onclick="verificarSiComenzo(event, this.href, <?php echo $row[29] ?>,<?php echo $row[30] ?>,<?php echo $row[31] ?>,<?php echo $row[32] ?>,<?php echo $row[33] ?>,<?php echo $row[34] ?>,<?php echo $row[36] ?>,<?php echo $row[37] ?>,<?php echo $row[38] ?>,<?php echo $row[39] ?>, <?php echo $row[41] ?>, <?php echo $row[43] ?>, <?php echo $row[0] ?>, 'extralaboral')" href="../cuestionarios/extralaboral.php?idempl=<?php echo $row[0]?>&idempr=<?php echo $row[2]?>"><span><i class="fa fa-file-text" style="color: red" aria-hidden="true"> Extralaboral</i></span></a> 
            <?php  
              }else{
            ?>
                <a download class="btn btn-info" href="../reportes_individuales/<?php echo $row[3] ?>/extralaboral_<?php echo $row[4] ?>_<?php echo $row[2] ?>.pdf"><i class="fa fa-download" aria-hidden="true"> Extralaboral</i><span></span></a>
            <?php
              }
            }
            ?>
        </td>
         <td style="text-align: center">
            <?php 
              if ($row[42]==0) {             
            ?>    
              <h5>No aplica</h5>       
            <?php    
             }else{
                  if ($row[42]==1) {
            ?>
               <a onclick="verificarSiComenzo(event, this.href, <?php echo $row[29] ?>,<?php echo $row[30] ?>,<?php echo $row[31] ?>,<?php echo $row[32] ?>,<?php echo $row[33] ?>,<?php echo $row[34] ?>,<?php echo $row[36] ?>,<?php echo $row[37] ?>,<?php echo $row[38] ?>,<?php echo $row[39] ?>, <?php echo $row[41] ?>, <?php echo $row[43] ?>, <?php echo $row[0] ?>, 'estres')" href="../cuestionarios/estres.php?idempl=<?php echo $row[0]?>&idempr=<?php echo $row[2]?>"><span><i class="fa fa-file-text" style="color: red" aria-hidden="true"> Estres</i></span></a> 
            <?php  
              }else{
            ?>
                <a download class="btn btn-warning" href="../reportes_individuales/<?php echo $row[3] ?>/estres_<?php echo $row[4] ?>_<?php echo $row[2] ?>.pdf"><span><i class="fa fa-download" aria-hidden="true"> Estres</i></span></a>
            <?php
              }
            }
            ?>
        </td>
        <td style="text-align: center">
          <?php
              if($row[29]!=1 && $row[30]!=1 && $row[31]!=1 && $row[32]!=1 && $row[33]!=1 && $row[34]!=1 && $row[36]!=1 && $row[37]!=1 && $row[38]!=1 && $row[39]!=1  && $row[41]!=1 && $row[43]!=1){
            ?>
              <a href="#" onclick="borrarEmpleado(<?php echo $row[0] ?>, <?php echo $idempresa ?>)" class="btn btn-danger"><span><i class="fa fa-trash" aria-hidden="true"></i></span></a>
              <a href="editarEmpleado.php?idempleado=<?php echo $row[0] ?>&idempresa=<?php echo $idempresa ?>" class="btn btn-warning"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
            <?php   
              }
            ?>
        </td>
      </tr>
      <?php 
       }  
      ?> 
</tbody>
</table>
<div/>
<div/>
<br><br><br><br><br><br><br><br>

<!-- Modal -->
<div class="modal fade" id="modalCargarEmpleados" tabindex="-1" role="dialog" aria-labelledby="modalCargarEmpleadosLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCargarEmpleadosLabel">Cargar empleados</h5>
        <button onclick="cerrarModal()" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
          <input type="hidden" name="idempresa" value="<?php echo $idempresa ?>">
          <input type="hidden" name="idcliente" value="<?php echo $idcliente ?>">
          <div class="alert alert-info" role="alert" style="font-size: 1.2rem;">
            <h3><strong>Atencion, informacion importante! </strong></h3>
            Esta cargando empleados a la empresa <strong><?php echo $resultado[2]; ?></strong><br>
            El numero de empleados a cargar es de: <strong><?php echo $resultado['nrousuarios']; ?></strong><br>
          </div>
          <div class="form-group alert alert-warning">
            <label style="font-size: 1.2rem; font-weight: bold;" for="archivo">Archivo</label>
            <input type="file" class="form-control" id="archivo" name="archivo" accept=".csv">
            <br>
            <div class="container" style="overflow-x: auto; background-color: #f8f9fa; border-radius: 10px; padding: 20px;">
             <table id="tabla-empleados" class="table-bordered" style="width: 100%;">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th style="width: 200px;">Sexo</th>
                  <th style="width: 200px;">Estado Civil</th>
                  <th style="width: 200px;">Fecha de Nacimiento</th>
                  <th style="width: 200px;">Estudios</th>
                  <th style="width: 200px;">Ocupacion</th>
                  <th style="width: 200px;">Departamento de residencia</th>
                  <th style="width: 200px;">Ciudad de residencia</th> 
                  <th style="width: 200px;">Estrato</th>
                  <th style="width: 200px;">Vivienda</th>
                  <th style="width: 200px;">Carga familiar</th>
                  <th style="width: 200px;">Departamento de trabajo</th>
                  <th style="width: 200px;">Ciudad de trabajo</th>
                  <th style="width: 200px;">Años de trabajo</th>
                  <th style="width: 200px;">Cargo de trabajo</th>
                  <th style="width: 200px;">Tipo de cargo</th>
                  <th style="width: 200px;">Años en el cargo</th>
                  <th style="width: 200px;">Area de trabajo</th>
                  <th style="width: 200px;">Tipo de contrato</th>
                  <th style="width: 200px;">Horas de trabajo diarias</th>
                  <th style="width: 200px;">Tipo de salario</th>
                  <th style="width: 200px;">Correo</th>
                  <th style="width: 200px;">Tipo de test</th>                 
                </tr>
              </thead>
              <tbody id="tbody-empleados">
                
              </tbody>
             </table>
            </div>
          </div>
          <button onclick="cargarEmpleados()" id="btn-cargar-empleados" style="display: none;" type="button" class="btn btn-primary">Guardar Empleados <i class="fa fa-upload" aria-hidden="true"></i></button>
      </div>
    </div>
  </div>
</div>

</body>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 
  <!-- DataTables -->
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="datatable.js"></script>

  
  <script>

    const sexo = {
      1: 'Masculino',
      2: 'Femenino'
    };

    const estadoCivil = {
      1: 'Soltero(a)',
      2: 'Casado(a)',
      3: 'Unión libre',
      4: 'Separado(a)',
      5: 'Divorciado(a)',
      6: 'Viudo(a)'
    };

    const nivelEscolaridad = {
      1: 'Primaria Incompleta',
      2: 'Primaria Completa',
      3: 'Bachillerato Incompleto',
      4: 'Bachillerato Completo',
      5: 'Tecnico / Tecnologico Incompleto',
      6: 'Tecnico / Tecnologico Completo',
      7: 'Profesional Incompleto',
      8: 'Profesional Completo',
      9: 'Carrera Militar / Policia',
      10: 'Post-grado Incompleto',
      11: 'Post-grado Completo'
    };

    const estrato = {
      1: 'Estrato 1',
      2: 'Estrato 2',
      3: 'Estrato 3',
      4: 'Estrato 4',
      5: 'Estrato 5',
      6: 'Estrato 6',
      7: 'Finca',
      8: 'No sé'
    };

    const vivienda = {
      1: 'En arriendo',
      2: 'Propia',
      3: 'Familiar'
    };

    const tipoCargo = {
      1: 'Jefatura - tiene personal a cargo',
      2: 'Profesional, analista, técnico, tecnólogo',
      3: 'Auxiliar, asistente administrativo, asistente técnico',
      4: 'Operario, operador, ayudante, servicios generales'
    };

    const tipoContrato = {
      1: 'Temporal de menos de 1 año',
      2: 'Temporal de 1 año o más',
      3: 'Término indefinido',
      4: 'Cooperado (cooperativa)',
      5: 'Prestación de servicios',
      6: 'No sé'
    };

    const tipoSalario = {
      1: 'Fijo (diario, semanal, quincenal o mensual)',
      2: 'Una parte fija y otra variable',
      3: 'Todo variable (a destajo, por producción, por comisión)'
    };

    var arrayEmpleados = [];

    function mapearEmpleados(e) {
      arrayEmpleados = [];
      const file = e.target.files[0];
      const reader = new FileReader();
      reader.onload = function (e) {
        const text = e.target.result;
        const lines = text.split('\n');
        lines.forEach((line, index) => {
          if (line.trim() === '') return;
          const values = line.split(';');
          if (index > 0) {
            if (values[0].trim() != '') {
              arrayEmpleados.push({
                nombre: values[0],
                sexo: values[1],
                estadoCivil: values[2],
                fechaNacimiento: values[3],
                estudios: values[4],
                ocupacion: values[5],
                departamentoResidencia: values[6],
                ciudadResidencia: values[7],
                estrato: values[8],
                vivienda: values[9],
                cargaFamiliar: values[10],
                departamentoTrabajo: values[11],
                ciudadTrabajo: values[12],
                aniosTrabajo: values[13],
                cargoTrabajo: values[14],
                tipoCargo: values[15],
                aniosCargo: values[16],
                areaTrabajo: values[17],
                tipoContrato: values[18],
                horasTrabajoDiarias: values[19],
                tipoSalario: values[20],
                correo: values[21],
                tipoTest: values[22]
              });
            }
          }
        });
       
      };

      reader.readAsText(file);
    }

    $(document).ready(function () {
      $('#archivo').on('change', function (e) {

        mapearEmpleados(e);

        const file = e.target.files[0];

        if (!file) return;

        const reader = new FileReader();

        reader.onload = function (e) {
          const text = e.target.result;

          // Separar líneas
          const lines = text.split('\n');
          var tr = '';

          var lineas = 0;
          var numeroEmpleados = <?php echo $resultado['nrousuarios']; ?>;
          lines.forEach((line, index) => {
            if (line.trim() === '') return; // Saltar líneas vacías

            // Separar por punto y coma
            const values = line.split(';');
            if (index > 0) {
              if (values[0].trim() != '') {
                tr = '<tr>';
                lineas++;
                values.forEach((val, i) => {
                  if (val.trim() != '') {
                    var valor;
                    switch(i) {
                      case 1:
                        valor = sexo[val];
                        break;
                      case 2:
                        valor = estadoCivil[val];
                        break;
                      case 4:
                        valor = nivelEscolaridad[val];
                        break;
                      case 8:
                        valor = estrato[val];
                        break;
                      case 9:
                        valor = vivienda[val];
                        break;
                      case 15:
                        valor = tipoCargo[val];
                        break;
                      case 16:
                        valor = tipoCargo[val];
                        break;
                      case 18:
                        valor = tipoContrato[val];
                        break;
                      case 20:
                        valor = tipoSalario[val];
                        break;
                      default:
                        valor = val;
                    }
                    tr += `<td>${valor}</td>`;
                  }
                });
                $('#tbody-empleados').append(tr);
              }

            }
           
          });
          
          setTimeout(() => {
            generarDataTable();
          }, 1000);
          if (lineas == numeroEmpleados) {
            $('#btn-cargar-empleados').show();
          }else{
            $('#btn-cargar-empleados').hide();

            Swal.fire({
              html: '<h3>El numero de empleados no coincide con el numero de empleados a cargar</h3><br><h4>El numero de empleados a cargar es de: <strong>'+numeroEmpleados+'</strong> y el numero de empleados cargados es de: <strong>'+lineas+'</strong></h4>',
              icon: 'error'
            });
          }
        };

        reader.readAsText(file);
      });
    });
  </script>
  <!--datatables-->
  <script>
    function generarDataTable() {
      $('#tabla-empleados').DataTable(
        {
          "scrollX": true,
          "scrollY": 300,
          "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
              "first": "Primero",
              "last": "Último",
              "next": "Siguiente",
              "previous": "Anterior"
            }
          }
        }
      );
    }

    function cerrarModal() {
      $('#modalCargarEmpleados').modal('hide');

      $('#tabla-empleados').DataTable().destroy();
      $('#tbody-empleados').empty();
      $('#btn-cargar-empleados').hide();
      $('#archivo').val('');
    }

    function cargarEmpleados() {
      $.ajax({
        url: '../acciones/cargar_empleados.php',
        method: 'POST',
        data: { 
          empleados: JSON.stringify(arrayEmpleados),
          idcliente: <?php echo $idcliente ?>,
          idempresa: <?php echo $idempresa ?>
        },
        beforeSend: function() {
          Swal.fire({
            title: 'Cargando...',
            text: 'Espere un momento por favor, se esta cargando los empleados',
            icon: 'info',
            showConfirmButton: false,
            allowOutsideClick: false,
            didOpen: function() {
              Swal.showLoading();
            }
          });
        },
        success: function(response) {
          var data = JSON.parse(response);
          if (data.success) {
            Swal.fire({
              title: 'Exito',
              text: data.message,
              icon: 'success',
              timer: 1500,
              timerProgressBar: true,
              showConfirmButton: false,
              allowOutsideClick: false,
              didClose: function() {
                location.reload();
              }
            }); 
          }else{
            Swal.fire({
              title: 'Error',
              text: data.message,
              icon: 'error'
            });
          }
        },
        error: function(xhr, status, error) {
          Swal.fire({
            title: 'Error',
            text: 'Error al enviar los datos, por favor intente nuevamente',
            icon: 'error'
          });
        }
      });
    }

    function borrarEmpleado(idempleado, idempresa) {
      Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción no se puede deshacer',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: '../acciones/borrar_empleado.php?idempleado=' + idempleado + '&idempresa=' + idempresa   ,
            method: 'GET',
            beforeSend: function() {
              Swal.fire({
                title: 'Cargando...',
                text: 'Espere un momento por favor, se esta eliminando el empleado',
                icon: 'info',
                showConfirmButton: false,
                allowOutsideClick: false,
                didOpen: function() {
                  Swal.showLoading();
                }
              });
            },
            success: function(response) {
              var data = JSON.parse(response);
              if (data.success) {
                Swal.fire({
                  title: 'Exito',
                  text: data.message,
                  icon: 'success',
                  timer: 1500,
                  timerProgressBar: true,
                  showConfirmButton: false,
                  allowOutsideClick: false,
                  didClose: function() {
                    location.reload();
                  }
                }); 
              }else{
                Swal.fire({
                  title: 'Error',
                  text: data.message,
                  icon: 'error',
                  timer: 1500,
                });
              }
            },
            error: function(xhr, status, error) {
              Swal.fire({
                title: 'Error',
                text: 'Error al eliminar el empleado, por favor intente nuevamente',
                icon: 'error'
              });
            }
          });
        }
      });
    }

    function verificarSiComenzo(event, href, paso1TestA ,paso11TestA,pregunta1TestA,paso2TestA,pregunta2TestA,paso3TestA,paso1TestB,paso11TestB,pregunta1TestB,paso2TestB,paso1TestExtra,paso1TestEstres, idempleado, test) {
      event.preventDefault();
      if(paso1TestA == 0 && paso11TestA == 0 && pregunta1TestA == 0 && paso2TestA == 0 && pregunta2TestA == 0 && paso3TestA == 0 && paso1TestB == 0 && paso11TestB == 0 && pregunta1TestB == 0 && paso2TestB == 0 && paso1TestExtra == 0 && paso1TestEstres == 0) {
        Swal.fire({
          html: '<div style="font-size: 1.2em;" class="alert alert-danger"><h2>El empleado no ha iniciado ningún test</h2><br>Despues de iniciar algún test no podra modificar los datos sociodemograficos de este empleado. <br><br> <strong>¿Desea continuar al test, o editar los datos sociodemograficos del empleado?</strong></div>',
          showCancelButton: true,
          confirmButtonColor: '#4caf50',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sí, continuar al test',
          showDenyButton: true,
          denyButtonColor: '#337fdd',
          denyButtonText: 'Editar Empleado',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = href;
          }else if (result.isDenied) {
            window.location.href = 'editarEmpleado.php?idempleado=' + idempleado+'&idempresa='+<?php echo $idempresa ?>;
          }
        });

        return;
      }

      if(test == 'intra-a') {
        if(paso1TestA != 0 || paso11TestA != 0 || pregunta1TestA != 0 || paso2TestA != 0 || pregunta2TestA != 0 || paso3TestA != 0) {
          Swal.fire({
            html: '<div style="font-size: 1.2em;" class="alert alert-danger"><h2>El empleado ya inicio el test intralaboral A</h2><br>¿Desea continuar al test por donde lo dejo?</strong></div>',
            showCancelButton: true,
            confirmButtonColor: '#4caf50',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, continuar al test',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = href;
            }
          });
        }else{
          window.location.href = href;
        }
        return;
      }

      if(test == 'intra-b') {
        if(paso1TestB != 0 || paso11TestB != 0 || pregunta1TestB != 0 || paso2TestB != 0) {
          Swal.fire({
            html: '<div style="font-size: 1.2em;" class="alert alert-danger"><h2>El empleado ya inicio el test intralaboral B</h2><br>¿Desea continuar al test por donde lo dejo?</strong></div>',
            showCancelButton: true,
            confirmButtonColor: '#4caf50',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, continuar al test',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.isConfirmed) { 
              window.location.href = href;
            }
          });
        }else{
          window.location.href = href;
        }
        return;
      }

      if(test == 'extralaboral') {
        window.location.href = href;
        return;
      }

      if(test == 'estres') {
        window.location.href = href;
        return;
      }
    }
  </script>
</html>
<?php
}else{  
  exit();
}
?>


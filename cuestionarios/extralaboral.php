<?php
session_start();
include_once("../conexion.php");
if(($_SESSION['logueado']) == true){ 
 $id = $_SESSION['id'];
 $idempl = $_GET['idempl'];
 $idempr = $_GET['idempr'];
?> 
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
      input[type="radio"] {
        scale: 1.5;
      }  

      tr td:nth-child(n+3) {
        text-align: center !important;
      }

      tr th:nth-child(n+3) {
        text-align: center !important;
      }
    </style>
</head>
<body>
   
<div class="container">
  <h2 style="color: #224abe !important; font-weight: bold; width: 100%; text-align: center;">Cuestionario Extralaboral</h2>
  <hr>
  <form method="POST" id="form_extralaboral">
    <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Pregunta</th>
        <th>Siempre</th>
        <th>Casi siempre</th>
        <th>Algunas veces</th>
        <th>Casi nunca</th>
        <th>Nunca</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Es fácil transportarme entre mi casa y el trabajo</td>
        <td><input type="radio" name="preg1" required="" value="0"></td>
        <td><input type="radio" name="preg1" required="" value="1"></td>
        <td><input type="radio" name="preg1" required="" value="2"></td>
        <td><input type="radio" name="preg1" required="" value="3"></td>
        <td><input type="radio" name="preg1" required="" value="4"></td>
      </tr>
       <tr>
        <td>2</td>
        <td>Tengo que tomar varios medios de  transporte para llegar a mi lugar de trabajo</td>
        <td><input type="radio" name="preg2" required="" value="4"></td>
        <td><input type="radio" name="preg2" required="" value="3"></td>
        <td><input type="radio" name="preg2" required="" value="2"></td>
        <td><input type="radio" name="preg2" required="" value="1"></td>
        <td><input type="radio" name="preg2" required="" value="0"></td>
      </tr>
       <tr>
        <td>3</td>
        <td>Paso mucho tiempo viajando de ida y regreso al trabajo</td>
        <td><input type="radio" name="preg3" required="" value="4"></td>
        <td><input type="radio" name="preg3" required="" value="3"></td>
        <td><input type="radio" name="preg3" required="" value="2"></td>
        <td><input type="radio" name="preg3" required="" value="1"></td>
        <td><input type="radio" name="preg3" required="" value="0"></td>
      </tr>
       <tr>
        <td>4</td>
        <td>Me trasporto cómodamente entre mi casa y el trabajo </td>
        <td><input type="radio" name="preg4" required="" value="0"></td>
        <td><input type="radio" name="preg4" required="" value="1"></td>
        <td><input type="radio" name="preg4" required="" value="2"></td>
        <td><input type="radio" name="preg4" required="" value="3"></td>
        <td><input type="radio" name="preg4" required="" value="4"></td>
      </tr>
      <tr>
        <td>5</td>
        <td>La zona donde vivo es segura</td>
        <td><input type="radio" name="preg5" required="" value="0"></td>
        <td><input type="radio" name="preg5" required="" value="1"></td>
        <td><input type="radio" name="preg5" required="" value="2"></td>
        <td><input type="radio" name="preg5" required="" value="3"></td>
        <td><input type="radio" name="preg5" required="" value="4"></td>
      </tr>
      <tr>
        <td>6</td>
        <td>En la zona donde vivo se presentan hurtos y mucha delincuencia</td>
        <td><input type="radio" name="preg6" required="" value="4"></td>
        <td><input type="radio" name="preg6" required="" value="3"></td>
        <td><input type="radio" name="preg6" required="" value="2"></td>
        <td><input type="radio" name="preg6" required="" value="1"></td>
        <td><input type="radio" name="preg6" required="" value="0"></td>
      </tr>
      <tr>
        <td>7</td>
        <td>Desde donde vivo me es fácil llegar al centro médico donde me atienden</td>
        <td><input type="radio" name="preg7" required="" value="0"></td>
        <td><input type="radio" name="preg7" required="" value="1"></td>
        <td><input type="radio" name="preg7" required="" value="2"></td>
        <td><input type="radio" name="preg7" required="" value="3"></td>
        <td><input type="radio" name="preg7" required="" value="4"></td>
      </tr>
      <tr>
        <td>8</td>
        <td>Cerca a mi vivienda las vías estan en buenas condiciones</td>
        <td><input type="radio" name="preg8" required="" value="0"></td>
        <td><input type="radio" name="preg8" required="" value="1"></td>
        <td><input type="radio" name="preg8" required="" value="2"></td>
        <td><input type="radio" name="preg8" required="" value="3"></td>
        <td><input type="radio" name="preg8" required="" value="4"></td>
      </tr>
       <tr>
        <td>9</td>
        <td>Cerca a mi vivienda encuentro fácilmente transporte</td>
        <td><input type="radio" name="preg9" required="" value="0"></td>
        <td><input type="radio" name="preg9" required="" value="1"></td>
        <td><input type="radio" name="preg9" required="" value="2"></td>
        <td><input type="radio" name="preg9" required="" value="3"></td>
        <td><input type="radio" name="preg9" required="" value="4"></td>
      </tr>
      <tr>
        <td>10</td>
        <td>Las condiciones de mi vivienda son buenas</td>
        <td><input type="radio" name="preg10" required="" value="0"></td>
        <td><input type="radio" name="preg10" required="" value="1"></td>
        <td><input type="radio" name="preg10" required="" value="2"></td>
        <td><input type="radio" name="preg10" required="" value="3"></td>
        <td><input type="radio" name="preg10" required="" value="4"></td>
      </tr>
      <tr>
        <td>11</td>
        <td>En mi vivienda hay servicios de agua y luz</td>
        <td><input type="radio" name="preg11" required="" value="0"></td>
        <td><input type="radio" name="preg11" required="" value="1"></td>
        <td><input type="radio" name="preg11" required="" value="2"></td>
        <td><input type="radio" name="preg11" required="" value="3"></td>
        <td><input type="radio" name="preg11" required="" value="4"></td>
      </tr>
       <tr>
        <td>12</td>
        <td>Las condiciones de mi vivienda me permiten descanzar cuando lo requiero</td>
        <td><input type="radio" name="preg12" required="" value="0"></td>
        <td><input type="radio" name="preg12" required="" value="1"></td>
        <td><input type="radio" name="preg12" required="" value="2"></td>
        <td><input type="radio" name="preg12" required="" value="3"></td>
        <td><input type="radio" name="preg12" required="" value="4"></td>
      </tr>
       <tr>
        <td>13</td>
        <td>Las condiciones de mi vivienda me permiten sentirme cómodo</td>
        <td><input type="radio" name="preg13" required="" value="0"></td>
        <td><input type="radio" name="preg13" required="" value="1"></td>
        <td><input type="radio" name="preg13" required="" value="2"></td>
        <td><input type="radio" name="preg13" required="" value="3"></td>
        <td><input type="radio" name="preg13" required="" value="4"></td>
      </tr>
       <tr>
        <td>14</td>
        <td>Me queda tiempo para actividades de recreación</td>
        <td><input type="radio" name="preg14" required="" value="0"></td>
        <td><input type="radio" name="preg14" required="" value="1"></td>
        <td><input type="radio" name="preg14" required="" value="2"></td>
        <td><input type="radio" name="preg14" required="" value="3"></td>
        <td><input type="radio" name="preg14" required="" value="4"></td>
      </tr>
       <tr>
        <td>15</td>
        <td>Fuera del trabajo tengo tiempo suficiente para descanzar</td>
        <td><input type="radio" name="preg15" required="" value="0"></td>
        <td><input type="radio" name="preg15" required="" value="1"></td>
        <td><input type="radio" name="preg15" required="" value="2"></td>
        <td><input type="radio" name="preg15" required="" value="3"></td>
        <td><input type="radio" name="preg15" required="" value="4"></td>
      </tr>
       <tr>
        <td>16</td>
        <td>Tengo tiempo para atender mis asuntos personales y del hogar</td>
        <td><input type="radio" name="preg16" required="" value="0"></td>
        <td><input type="radio" name="preg16" required="" value="1"></td>
        <td><input type="radio" name="preg16" required="" value="2"></td>
        <td><input type="radio" name="preg16" required="" value="3"></td>
        <td><input type="radio" name="preg16" required="" value="4"></td>
      </tr>
       <tr>
        <td>17</td>
        <td>Tengo tiempo para compartir con mi familia o amigos</td>
        <td><input type="radio" name="preg17" required="" value="0"></td>
        <td><input type="radio" name="preg17" required="" value="1"></td>
        <td><input type="radio" name="preg17" required="" value="2"></td>
        <td><input type="radio" name="preg17" required="" value="3"></td>
        <td><input type="radio" name="preg17" required="" value="4"></td>
      </tr>
       <tr>
        <td>18</td>
        <td>Tengo buena comunicación con las personas cercanas</td>
        <td><input type="radio" name="preg18" required="" value="0"></td>
        <td><input type="radio" name="preg18" required="" value="1"></td>
        <td><input type="radio" name="preg18" required="" value="2"></td>
        <td><input type="radio" name="preg18" required="" value="3"></td>
        <td><input type="radio" name="preg18" required="" value="4"></td>
      </tr>
       <tr>
        <td>19</td>
        <td>Las relaciones con mis amigos son buenas</td>
        <td><input type="radio" name="preg19" required="" value="0"></td>
        <td><input type="radio" name="preg19" required="" value="1"></td>
        <td><input type="radio" name="preg19" required="" value="2"></td>
        <td><input type="radio" name="preg19" required="" value="3"></td>
        <td><input type="radio" name="preg19" required="" value="4"></td>
      </tr>
       <tr>
        <td>20</td>
        <td>Converso con personas cercanas sobre diferentes temas</td>
        <td><input type="radio" name="preg20" required="" value="0"></td>
        <td><input type="radio" name="preg20" required="" value="1"></td>
        <td><input type="radio" name="preg20" required="" value="2"></td>
        <td><input type="radio" name="preg20" required="" value="3"></td>
        <td><input type="radio" name="preg20" required="" value="4"></td>
      </tr>
      <tr>
        <td>21</td>
        <td>Mis amigos están dispuestos a escucharme cuando tengo problemas</td>
        <td><input type="radio" name="preg21" required="" value="0"></td>
        <td><input type="radio" name="preg21" required="" value="1"></td>
        <td><input type="radio" name="preg21" required="" value="2"></td>
        <td><input type="radio" name="preg21" required="" value="3"></td>
        <td><input type="radio" name="preg21" required="" value="4"></td>
      </tr>
      <tr>
        <td>22</td>
        <td>Cuento con el apoyo de mi familia cuando tengo problemas</td>
        <td><input type="radio" name="preg22" required="" value="0"></td>
        <td><input type="radio" name="preg22" required="" value="1"></td>
        <td><input type="radio" name="preg22" required="" value="2"></td>
        <td><input type="radio" name="preg22" required="" value="3"></td>
        <td><input type="radio" name="preg22" required="" value="4"></td>
      </tr>
      <tr>
        <td>23</td>
        <td>Puedo hablar con personas cercanas sobre las cosas que me pasan</td>
        <td><input type="radio" name="preg23" required="" value="0"></td>
        <td><input type="radio" name="preg23" required="" value="1"></td>
        <td><input type="radio" name="preg23" required="" value="2"></td>
        <td><input type="radio" name="preg23" required="" value="3"></td>
        <td><input type="radio" name="preg23" required="" value="4"></td>
      </tr>
      <tr>
        <td>24</td>
        <td>Mis problemas personales o familiares afectan mi trabajo</td>
        <td><input type="radio" name="preg24" required="" value="4"></td>
        <td><input type="radio" name="preg24" required="" value="3"></td>
        <td><input type="radio" name="preg24" required="" value="2"></td>
        <td><input type="radio" name="preg24" required="" value="1"></td>
        <td><input type="radio" name="preg24" required="" value="0"></td>
      </tr>
      <tr>
        <td>25</td>
        <td>La relación con mi familia cercana es cordial</td>
        <td><input type="radio" name="preg25" required="" value="0"></td>
        <td><input type="radio" name="preg25" required="" value="1"></td>
        <td><input type="radio" name="preg25" required="" value="2"></td>
        <td><input type="radio" name="preg25" required="" value="3"></td>
        <td><input type="radio" name="preg25" required="" value="4"></td>
      </tr>
      <tr>
        <td>26</td>
        <td>Mis problemas personales o familiares me quitan la energía que necesito para trabajar</td>
        <td><input type="radio" name="preg26" required="" value="4"></td>
        <td><input type="radio" name="preg26" required="" value="3"></td>
        <td><input type="radio" name="preg26" required="" value="2"></td>
        <td><input type="radio" name="preg26" required="" value="1"></td>
        <td><input type="radio" name="preg26" required="" value="0"></td>
      </tr>
      <tr>
        <td>27</td>
        <td>Los problemas con mis familiares los resuelvo de manera amistosa</td>
        <td><input type="radio" name="preg27" required="" value="0"></td>
        <td><input type="radio" name="preg27" required="" value="1"></td>
        <td><input type="radio" name="preg27" required="" value="2"></td>
        <td><input type="radio" name="preg27" required="" value="3"></td>
        <td><input type="radio" name="preg27" required="" value="4"></td>
      </tr>
      <tr>
        <td>28</td>
        <td>Mis problemas personales o familiares afectan mis relaciones en el trabajo</td>
        <td><input type="radio" name="preg28" required="" value="4"></td>
        <td><input type="radio" name="preg28" required="" value="3"></td>
        <td><input type="radio" name="preg28" required="" value="2"></td>
        <td><input type="radio" name="preg28" required="" value="1"></td>
        <td><input type="radio" name="preg28" required="" value="0"></td>
      </tr>
      <tr>
        <td>29</td>
        <td>El dinero que ganamos en el hogar alcanzan para cubrir los gastos básicos</td>
        <td><input type="radio" name="preg29" required="" value="0"></td>
        <td><input type="radio" name="preg29" required="" value="1"></td>
        <td><input type="radio" name="preg29" required="" value="2"></td>
        <td><input type="radio" name="preg29" required="" value="3"></td>
        <td><input type="radio" name="preg29" required="" value="4"></td>
      </tr>
      <tr>
        <td>30</td>
        <td>Tengo otros compromisos económicos que afectan mucho el presupuesto familiar</td>
        <td><input type="radio" name="preg30" required="" value="4"></td>
        <td><input type="radio" name="preg30" required="" value="3"></td>
        <td><input type="radio" name="preg30" required="" value="2"></td>
        <td><input type="radio" name="preg30" required="" value="1"></td>
        <td><input type="radio" name="preg30" required="" value="0"></td>
      </tr>
      <tr>
        <td>31</td>
        <td>En mi hogar tenemos deudas difíciles de pagar</td>
        <td><input type="radio" name="preg31" required="" value="4"></td>
        <td><input type="radio" name="preg31" required="" value="3"></td>
        <td><input type="radio" name="preg31" required="" value="2"></td>
        <td><input type="radio" name="preg31" required="" value="1"></td>
        <td><input type="radio" name="preg31" required="" value="0"></td>
      </tr>
    </tbody>
   </table>
   <hr>
   <div class="text-center">
     <button style="font-size: 1.9rem;" type="button" id="btn_guardar" class="btn btn-success"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Guardar y continuar</button>
   </div>      
  </form> 
</div>
<br><br>
</body>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
  $(document).ready(function(){
    $("#btn_guardar").click(function(){
      if(validar_formulario()){ 
        $.ajax({
          url: "../acciones/guardar_extra.php?idem=<?php echo $idempl ?>&idemp=<?php echo $idempr ?>",
          type: "POST",
          data: $("#form_extralaboral").serialize(),
          beforeSend: function(){
            Swal.fire({
              position: "bottom",
              title: "Guardando...",
              text: "Espere un momento por favor",
              icon: "info",
              showConfirmButton: false,
              allowOutsideClick: false,
              didOpen: function(){
                Swal.showLoading();
              }
            });
          },
          success: function(response){
            var data = JSON.parse(response);
            if(data.status == "success"){
              generar_informe(data.url);
            }else{
              Swal.fire({
                position: "bottom",
                text: data.message, 
                icon: "error",
                showConfirmButton: true,
                allowOutsideClick: false,
              });
            }
          },  
          error: function(xhr, status, error){
            Swal.fire({
              position: "bottom",
              text: "Ha ocurrido un error al guardar el test de extralaboral",
              icon: "error",
              showConfirmButton: true,
              allowOutsideClick: false,
            });
          }
        });
      }else{
        Swal.fire({
          position: "bottom",
          text: "Por favor, responda todas las preguntas antes de continuar",
          icon: "error",
          showConfirmButton: true,
          allowOutsideClick: false,
        });
      }
    });
  });

  function generar_informe(url){
    $.ajax({
      url: url,
      type: "GET",
      beforeSend: function(){
        Swal.fire({
          position: "bottom",
          title: "Generando informe Extralaboral, por favor espere...",
          icon: "info",
          showConfirmButton: false,
          allowOutsideClick: false,
          didOpen: function(){
            Swal.showLoading();
          }
        });
      },
      success: function(response){
        Swal.fire({
          position: "bottom",
          title: "Informe Extralaboral generado correctamente",
          icon: "success",
          showConfirmButton: true,
          allowOutsideClick: false,
          willClose: function(){
            window.location.href = "../paginas/ver_empleados.php?idempr=<?php echo $idempr ?>";
          }
        });
      },
      error: function(xhr, status, error){
        Swal.fire({
          position: "bottom",
          title: "Error al generar el informe Extralaboral",
          icon: "error",
          showConfirmButton: true,
          allowOutsideClick: false,
        });
      }
    });
  }

  function validar_formulario(){
    const totalGrupos = new Set();
    const radiosMarcados = new Set(); 

    // Recorremos todos los radio buttons
    $("#form_extralaboral input[type=radio]").each(function() {
      const nombre = $(this).attr("name");
      totalGrupos.add(nombre);
      if ($(this).is(":checked")) {
        radiosMarcados.add(nombre);
      }
    });

    if (totalGrupos.size !== radiosMarcados.size) {
      return false;
    }else{
      return true;
    }
  }
</script>

</html>
<?php
}else{  
  exit();
}
?>

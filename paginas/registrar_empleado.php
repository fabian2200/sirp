<?php
session_start();
include_once("../conexion.php");
if(($_SESSION['logueado']) == true){ 
 $id = $_SESSION['id'];
 $idempresa = $_GET['proceso'];
 $sql="SELECT * FROM `departamentos` where idcl = $id";
 $resultado =$con -> query($sql);
?> 
<!DOCTYPE html>
<html>
<head>
  <title></title>
	 <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../css/radio.css" rel="stylesheet">
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
 <div class="container-fluid">
    <hr>
     <div class="form-row text-center"><h2>Registro de Empleado</h2></div>
          <hr>
         <form action="../acciones/guardar_empleado.php" method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
             <input type="hidden" class="form-control" id="Idcl"  name="Idcl" value="<?php echo $id ?>" required>
            </div>
            <div class="form-group col-md-6">
              <input type="hidden" class="form-control" id="Idem"  name="Idem" value="<?php echo $idempresa ?>" required>
            </div>      
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="Areatrabajo">Area De Trabajo</label>
      		  <select name="Areatrabajo" class = "form-control" required>
           		<?php  
           			while ($row = mysqli_fetch_array($resultado)) {      			
           		?>
           		<option value="<?php echo $row[0]; ?>" ><?php echo $row[1]; ?></option>
           		<?php 
					}
           		 ?>
      		  </select>
            </div>   
            <div class="form-group col-md-6">
              <label for="dep">Si no encuentra el departamento, puede crear uno :</label><br>
              <button type="button"  class="btn btn-success" data-toggle="modal" data-target="#myModal"><span><i class="fa fa-plus-square" aria-hidden="true"></i></span> Crear Departamento</button>
            </div>
          </div>
           <div class="form-row">
            <div class="form-group col-md-12">
              <label for="Nombre">Nombre completo</label>
             <input type="text" class="form-control" id="Nombre"  name="Nombre"  required>
            </div>     
          </div>
          <div class="form-row">
          <div class="form-group col-md-6">
      		<label for="Sexo">Sexo</label>
      		<select name="Sexo" class = "form-control" required>
           		<option value="1">Femenino</option>
           		<option value="2">Masculino</option>
      		</select>
    	  </div>
    	  <div class="form-group col-md-6">
  			<label for="Estadocivil">Estado civil</label>
       		<select id="Estadocivil" name="Estadocivil"  class="form-control">
       			<option value="1">Soltero(a)</option>
       			<option value="2">Casado(a)</option>
       			<option value="3">Unión libre</option>
       			<option value="4">Separado(a)</option>
       			<option value="5">Divorciado(a)</option>
       			<option value="6">Viudo(a)</option>
     		</select>  
 		  </div>
 		 </div>
 		  <div class="form-row">
 		  	<div class="form-group col-md-6">
      			<label for="Nacimiento">Fecha de Nacimiento</label>
      			<input type="date" name="Nacimiento" class="form-control">
    	    </div>
    	    <div class="form-group col-md-6">
      			<label for="Estudios">Estudios</label>
            <select id="Estudios" name="Estudios"  class="form-control" required>
            <option value="1">Primaria Incompleta</option>
            <option value="2">Primaria Completa</option>
            <option value="3">Bachillerato Incompleto</option>
            <option value="4">Bachillerato Completo</option>
            <option value="5">Tecnico / Tecnologico Incompleto</option>
            <option value="6">Tecnico / Tecnologico Completo</option>
            <option value="7">Profesional Incompleto</option>
            <option value="8">Profesional Completo</option>
            <option value="9">Carrera Militar / Policia</option>
            <option value="10">Post-grado Incompleto</option>
            <option value="11">Post-grado Completo</option>
            </select>
    	    </div>
 		  </div>
 		   <div class="form-row">
 		  	<div class="form-group col-md-6">
      			<label for="Departamento">Departamento Residencia</label>
      			<select id="Departamento" name="Departamento"  class="form-control" required>
       				<option value="Amazonas">Amazonas</option>
       				<option value="Antioquia">Antioquia</option>
       				<option value="Arauca">Arauca</option>
       				<option value="Atlantico">Atlantico</option>
       				<option value="Bolivar">Bolivar</option>
       				<option value="Boyaca">Boyaca</option>
       				<option value="Caldas">Caldas</option>
       				<option value="Caqueta">Caqueta</option>
       				<option value="Casanare">Casanare</option>
       				<option value="Cauca">Cauca</option>
       				<option value="Cesar">Cesar</option>
       				<option value="Choco">Choco</option>
       				<option value="Cordoba">Cordoba</option>
       				<option value="Cundinamarca">Cundinamarca</option>
       				<option value="Guainia">Guainia</option>
       				<option value="Guaviare">Guaviare</option>
       				<option value="Huila">Huila</option>
       				<option value="La Guajira">La Guajira</option>
       				<option value="Magdalena">Magdalena</option>
       				<option value="Meta">Meta</option>
       				<option value="Nariño">Nariño</option>
       				<option value="Norte de santander">Norte de santander</option>
       				<option value="Putumayo">Putumayo</option>
       				<option value="Quindio">Quindio</option>
       				<option value="Risaralda">Risaralda</option>
       				<option value="San Andres y Providencia">San Andres y Providencia</option>
       				<option value="Santander">Santander</option>
       				<option value="Sucre">Sucre</option>
       				<option value="Tolima">Tolima</option>
       				<option value="Valle del Cauca">Valle del Cauca</option>
       				<option value="Vaupes">Vaupes</option>
       				<option value="Vichada">Vichada</option>
     			</select> 
    	    </div>
    	    <div class="form-group col-md-6">
      			<label for="Ocupacion">Ocupacion</label>
      			<input type="text" name="Ocupacion" class="form-control">
    	    </div>
 		  </div>
 		  <div class="form-row">
 		  	<div class="form-group col-md-6">
      			<label for="Ciudad">Ciudad Residencia</label>
      			<input type="text" name="Ciudad" class="form-control">
    	    </div>
    	    <div class="form-group col-md-6">
      			<label for="Estrato">Estrato</label>
      			<select id="Estrato" name="Estrato"  class="form-control" required>
              <option value="1">Estrato 1</option>
              <option value="2">Estrato 2</option>
              <option value="3">Estrato 3</option>
              <option value="4">Estrato 4</option>
              <option value="5">Estrato 5</option>
              <option value="6">Estrato 6</option>
              <option value="7">Finca</option>
              <option value="8">No sè</option>
            </select>
    	    </div>
 		  </div>
 		  <div class="form-row">
 		  	<div class="form-group col-md-6">
      			<label for="Vivienda">Vivienda</label>
      			<select id="Vivienda" name="Vivienda"  class="form-control" required>
              <option value="1">En arriendo</option>
              <option value="2">Propia</option>
              <option value="3">Familiar</option>
            </select>
    	    </div>
    	    <div class="form-group col-md-6">
      			<label for="Cargafamiliar">Carga familiar</label>
      			<input type="number" name="Cargafamiliar" class="form-control">
    	    </div>
 		  </div>
 		  <div class="form-row">
 		  	<div class="form-group col-md-6">
      			<label for="Departamento2">Departamento Trabajo</label>
      			<select id="Departamento2" name="Departamento2"  class="form-control">
       				<option value="Amazonas">Amazonas</option>
       				<option value="Antioquia">Antioquia</option>
       				<option value="Arauca">Arauca</option>
       				<option value="Atlantico">Atlantico</option>
       				<option value="Bolivar">Bolivar</option>
       				<option value="Boyaca">Boyaca</option>
       				<option value="Caldas">Caldas</option>
       				<option value="Caqueta">Caqueta</option>
       				<option value="Casanare">Casanare</option>
       				<option value="Cauca">Cauca</option>
       				<option value="Cesar">Cesar</option>
       				<option value="Choco">Choco</option>
       				<option value="Cordoba">Cordoba</option>
       				<option value="Cundinamarca">Cundinamarca</option>
       				<option value="Guainia">Guainia</option>
       				<option value="Guaviare">Guaviare</option>
       				<option value="Huila">Huila</option>
       				<option value="La Guajira">La Guajira</option>
       				<option value="Magdalena">Magdalena</option>
       				<option value="Meta">Meta</option>
       				<option value="Nariño">Nariño</option>
       				<option value="Norte de santander">Norte de santander</option>
       				<option value="Putumayo">Putumayo</option>
       				<option value="Quindio">Quindio</option>
       				<option value="Risaralda">Risaralda</option>
       				<option value="San Andres y Providencia">San Andres y Providencia</option>
       				<option value="Santander">Santander</option>
       				<option value="Sucre">Sucre</option>
       				<option value="Tolima">Tolima</option>
       				<option value="Valle del Cauca">Valle del Cauca</option>
       				<option value="Vaupes">Vaupes</option>
       				<option value="Vichada">Vichada</option>
     			</select> 
    	    </div>
    	    <div class="form-group col-md-6">
      			<label for="Ciudadtrabajo">Ciudad Trabajo</label>
      			<input type="text" name="Ciudadtrabajo" class="form-control">
    	    </div>
 		  </div>
 		  <div class="form-row">
 		  	<div class="form-group col-md-6">
      			<label for="Cargotrabajo">Cargo Trabajo</label>
      			<input type="text" name="Cargotrabajo" class="form-control">
    	    </div>
    	    <div class="form-group col-md-6">
      			<label for="Aniostrabajo">Años de trabajo</label>
      			<input type="number" name="Aniostrabajo" class="form-control">
    	    </div>
 		  </div>
 		  <div class="form-row">
 		  	<div class="form-group col-md-6">
      			<label for="Tipocargo">Tipo de Cargo </label>
      			<select id="Tipocargo" name="Tipocargo"  class="form-control" required>
              <option value="1">Jefatura - tiene personal a cargo</option>
              <option value="2">Profesional, analista, técnico, tecnólogo</option>
              <option value="3">Auxiliar, asistente administrativo, asistente técnico</option>
              <option value="4">Operario, operador, ayudante, servicios generales</option>
            </select>
    	    </div>
    	    <div class="form-group col-md-6">
      			<label for="AniosCargo">Años de Cargo</label>
      			<input type="number" name="AniosCargo" class="form-control">
    	    </div>
 		  </div>
 		  <div class="form-row">
 		  	<div class="form-group col-md-4">
      			<label for="Tipocontrato">Tipo de Contrato </label>
      		<select id="Tipocontrato" name="Tipocontrato"  class="form-control" required>
              <option value="1">Temporal de menos de 1 año</option>
              <option value="2">Temporal de 1 año o más</option>
              <option value="3">Término indefinido</option>
              <option value="4">Cooperado (cooperativa)</option>
              <option value="5">Prestación de servicios</option>
              <option value="6">No sè</option>
            </select>
    	    </div>
    	    <div class="form-group col-md-4">
      			<label for="Hotrastrab">Horas Trab. Diarias</label>
      			<input type="number" name="Hotrastrab" class="form-control">
    	    </div>
    	    <div class="form-group col-md-4">
      			<label for="Tiposalario">Tipo de salario</label>
      			<select id="Tiposalario" name="Tiposalario"  class="form-control" required>
              <option value="1">Fijo (diario, semanal, quincenal o mensual)</option>
              <option value="2">Una parte fija y otra variable</option>
              <option value="3">Todo variable (a destajo, por producción, por comisión)</option>
            </select>
    	    </div>
 		  </div>
        <div class="form-row " style="text-align: center">
            <section style="text-align: center">
              <br><br>
               <h2>Seleccione los tipos de Test que le realizara a este empleado(minimo uno)</h2>
               <hr>
              <div class="col-md-3">
                 <input type="radio" id="control_01" name="select" value="1" required>
                    <label for="control_01" class="control">
                      <h2>Intra A</h2>
                      <i class="fa fa-file-text fa-2x" aria-hidden="true"></i>
                    </label>
              </div>
              <div class="col-md-3">
                 <input type="radio" id="control_02" name="select" value="2" required>
                    <label for="control_02" class="control">
                      <h2>Intra B</h2>
                      <i class="fa fa-file-text fa-2x" aria-hidden="true"></i>
                    </label>
              </div>
              <div class="col-md-3">
                 <input type="radio" id="control_03" name="select2"  value="1" >
                    <label for="control_03" class="control">
                      <h2>Estres</h2>
                      <i class="fa fa-file-text fa-2x" aria-hidden="true"></i>
                    </label>
              </div>
              <div class="col-md-3">
                 <input type="radio" id="control_04"  name="select3" value="1" >
                    <label for="control_04" class="control">
                      <h2>Extralaboral</h2>
                      <i class="fa fa-file-text fa-2x" aria-hidden="true"></i>
                    </label>
              </div>
            </section>
        </div>
        <hr>
        <div class="text-center"><button type="submit" class="btn btn-success">Guardar</button></div>  
      </form>
  </div>  
  <br> 

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog"> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <h2>Por favor ingrese el nombre del departamento a registrar:</h2>
          <form action="../acciones/guardar_departamento.php" method="POST">
          	<input type="text" name="Nombredepartamento" class="form-control" required>
          	<hr>
          	<input type="hidden" name="Idcliente" value="<?php echo $id ?>" class="form-control">
            <input type="hidden" class="form-control" id="Ide"  name="Idem" value="<?php echo $idempresa ?>" >
          	<button type="submit" class="btn btn-success">Guardar</button>
          </form>
        </div>
        <div class="modal-footer">
           <h6>@fabiandres</h6>
        </div>
      </div>
      
    </div>
  </div> 
  <!-- Modal --> 
</body>
</body>
</html>
<?php
}else{  
  exit();
}
?>

<?php
session_start();
include_once("../conexion.php");
if(($_SESSION['logueado']) == true){ 
 $id = $_SESSION['id'];
 $idempresa = $_GET['idempresa'];

 $sql="SELECT * FROM `departamentos` where idcl = $id";
 $idempleado = $_GET['idempleado'];
 $resultado =$con -> query($sql);

 $sql2="SELECT * FROM `empleado` WHERE idus = $idempleado";
 $resultado2 =$con -> query($sql2);
 $empleado = mysqli_fetch_array($resultado2);

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
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<style>
		option, select {
			text-transform: capitalize;
		}

		#btn_volver{
			position: absolute;
			top: 10px;
			right: 10px;
			margin-top: 10px;
			margin-right: 10px;
			z-index: 1000;
		}
	</style>
</head>
<body>
 <div class="container-fluid" style="background-color:rgb(255, 255, 255); padding: 40px; border-radius: 10px;">
	<button id="btn_volver" onclick="window.location.href='ver_empleados.php?idempr=<?php echo $idempresa; ?>'" class="btn btn-danger">Volver <i class="fa fa-arrow-left" aria-hidden="true"></i></button>
     <div class="form-row text-center"><h2 style="color: #224abe !important; font-weight: bold; width: 100%; text-align: center;">Editar Empleado</h2></div>
	 <hr>
         <form id="form_editar" method="POST">
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
      		  <select name="Areatrabajo" class = "form-control" required >
           		<?php  
           			while ($row = mysqli_fetch_array($resultado)) {      			
           		?>
           		<option <?php if($empleado[21] == $row[0]) echo 'selected'; ?> value="<?php echo $row[0]; ?>" ><?php echo $row[1]; ?></option>
           		<?php 
					}
           		 ?>
      		  </select>
            </div>   
            <div class="form-group col-md-6">
              
            </div>
          </div>
           <div class="form-row">
            <div class="form-group col-md-6">
              <label for="Nombre">Nombre completo</label>
             <input type="text" class="form-control" id="Nombre" value="<?php echo $empleado["nombre"]; ?>" name="Nombre"  required>
            </div>     
            <div class="form-group col-md-6">
              <label for="correo">Correo</label>
             <input type="email" class="form-control" id="Correo" value="<?php echo $empleado["correo"]; ?>" name="Correo"  required>
            </div>     
          </div>
          <div class="form-row">
          <div class="form-group col-md-6">
      		<label for="Sexo">Sexo</label>
      		<select name="Sexo" class = "form-control" required>
           		<option <?php if($empleado["sexo"] == 1) echo 'selected'; ?> value="1">Femenino</option>
           		<option <?php if($empleado["sexo"] == 2) echo 'selected'; ?> value="2">Masculino</option>
      		</select>
    	  </div>
    	  <div class="form-group col-md-6">
  			<label for="Estadocivil">Estado civil</label>
       		<select id="Estadocivil" name="Estadocivil"  class="form-control">
       			<option <?php if($empleado["estadocivil"] == 1) echo 'selected'; ?> value="1">Soltero(a)</option>
       			<option <?php if($empleado["estadocivil"] == 2) echo 'selected'; ?> value="2">Casado(a)</option>
       			<option <?php if($empleado["estadocivil"] == 3) echo 'selected'; ?> value="3">Unión libre</option>
       			<option <?php if($empleado["estadocivil"] == 4) echo 'selected'; ?> value="4">Separado(a)</option>
       			<option <?php if($empleado["estadocivil"] == 5) echo 'selected'; ?> value="5">Divorciado(a)</option>
       			<option <?php if($empleado["estadocivil"] == 6) echo 'selected'; ?> value="6">Viudo(a)</option>
     		</select>  
 		  </div>
 		 </div>
 		  <div class="form-row">
 		  	<div class="form-group col-md-6">
      			<label for="Nacimiento">Fecha de Nacimiento</label>
      			<input type="date" value="<?php echo $empleado["nacimiento"]; ?>" name="Nacimiento" class="form-control">
    	    </div>
    	    <div class="form-group col-md-6">
      			<label for="Estudios">Estudios</label>
            <select id="Estudios" name="Estudios"  class="form-control" required>
            <option <?php if($empleado["estudios"] == 1) echo 'selected'; ?> value="1">Primaria Incompleta</option>
            <option <?php if($empleado["estudios"] == 2) echo 'selected'; ?> value="2">Primaria Completa</option>
            <option <?php if($empleado["estudios"] == 3) echo 'selected'; ?> value="3">Bachillerato Incompleto</option>
            <option <?php if($empleado["estudios"] == 4) echo 'selected'; ?> value="4">Bachillerato Completo</option>
            <option <?php if($empleado["estudios"] == 5) echo 'selected'; ?> value="5">Tecnico / Tecnologico Incompleto</option>
            <option <?php if($empleado["estudios"] == 6) echo 'selected'; ?> value="6">Tecnico / Tecnologico Completo</option>
            <option <?php if($empleado["estudios"] == 7) echo 'selected'; ?> value="7">Profesional Incompleto</option>
            <option <?php if($empleado["estudios"] == 8) echo 'selected'; ?> value="8">Profesional Completo</option>
            <option <?php if($empleado["estudios"] == 9) echo 'selected'; ?> value="9">Carrera Militar / Policia</option>
            <option <?php if($empleado["estudios"] == 10) echo 'selected'; ?> value="10">Post-grado Incompleto</option>
            <option <?php if($empleado["estudios"] == 11) echo 'selected'; ?> value="11">Post-grado Completo</option>
            </select>
    	    </div>
 		  </div>
 		   <div class="form-row">
 		  	<div class="form-group col-md-6">
      			<label for="Departamento">Departamento Residencia</label>
      			<select id="Departamento" name="Departamento"  class="form-control" required>
					<option value="">Seleccione un departamento</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "amazonas") echo 'selected'; ?> value="Amazonas">Amazonas</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "antioquia") echo 'selected'; ?> value="Antioquia">Antioquia</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "arauca") echo 'selected'; ?> value="Arauca">Arauca</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "atlantico") echo 'selected'; ?> value="Atlantico">Atlantico</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "bolivar") echo 'selected'; ?> value="Bolivar">Bolivar</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "boyaca") echo 'selected'; ?> value="Boyaca">Boyaca</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "caldas") echo 'selected'; ?> value="Caldas">Caldas</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "caqueta") echo 'selected'; ?> value="Caqueta">Caqueta</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "casanare") echo 'selected'; ?> value="Casanare">Casanare</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "cauca") echo 'selected'; ?> value="Cauca">Cauca</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "cesar") echo 'selected'; ?> value="Cesar">Cesar</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "choco") echo 'selected'; ?> value="Choco">Choco</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "cordoba") echo 'selected'; ?> value="Cordoba">Cordoba</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "cundinamarca") echo 'selected'; ?> value="Cundinamarca">Cundinamarca</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "guainia") echo 'selected'; ?> value="Guainia">Guainia</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "guaviare") echo 'selected'; ?> value="Guaviare">Guaviare</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "huila") echo 'selected'; ?> value="Huila">Huila</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "la guajira") echo 'selected'; ?> value="La Guajira">La Guajira</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "magdalena") echo 'selected'; ?> value="Magdalena">Magdalena</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "meta") echo 'selected'; ?> value="Meta">Meta</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "nariño") echo 'selected'; ?> value="Nariño">Nariño</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "norte de santander") echo 'selected'; ?> value="Norte de santander">Norte de santander</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "putumayo") echo 'selected'; ?> value="Putumayo">Putumayo</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "quindio") echo 'selected'; ?> value="Quindio">Quindio</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "risaralda") echo 'selected'; ?> value="Risaralda">Risaralda</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "san andres y providencia") echo 'selected'; ?> value="San Andres y Providencia">San Andres y Providencia</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "santander") echo 'selected'; ?> value="Santander">Santander</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "sucre") echo 'selected'; ?> value="Sucre">Sucre</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "tolima") echo 'selected'; ?> value="Tolima">Tolima</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "valle del cauca") echo 'selected'; ?> value="Valle del Cauca">Valle del Cauca</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "vaupes") echo 'selected'; ?> value="Vaupes">Vaupes</option>
       				<option <?php if( strtolower($empleado["departamentoresidencia"]) == "vichada") echo 'selected'; ?> value="Vichada">Vichada</option>
					<option <?php if( strtolower($empleado["departamentoresidencia"]) == "otro") echo 'selected'; ?> value="Otro">Otro</option>
     			</select> 
    	    </div>
    	    <div class="form-group col-md-6">
      			<label for="Ocupacion">Ocupacion</label>
      			<input value="<?php echo $empleado["ocupacion"]; ?>" type="text" name="Ocupacion" class="form-control">
    	    </div>
 		  </div>
 		  <div class="form-row">
 		  	<div class="form-group col-md-6">
      			<label for="Ciudad">Ciudad Residencia</label>
      			<input value="<?php echo $empleado["ciudadresidencia"]; ?>" type="text" name="Ciudad" class="form-control">
    	    </div>
    	    <div class="form-group col-md-6">
      			<label for="Estrato">Estrato</label>
      			<select id="Estrato" name="Estrato"  class="form-control" required>
					<option <?php if($empleado["estrato"] == 1) echo 'selected'; ?> value="1">Estrato 1</option>
					<option <?php if($empleado["estrato"] == 2) echo 'selected'; ?> value="2">Estrato 2</option>
					<option <?php if($empleado["estrato"] == 3) echo 'selected'; ?> value="3">Estrato 3</option>
					<option <?php if($empleado["estrato"] == 4) echo 'selected'; ?> value="4">Estrato 4</option>
					<option <?php if($empleado["estrato"] == 5) echo 'selected'; ?> value="5">Estrato 5</option>
					<option <?php if($empleado["estrato"] == 6) echo 'selected'; ?> value="6">Estrato 6</option>
					<option <?php if($empleado["estrato"] == 7) echo 'selected'; ?> value="7">Finca</option>
					<option <?php if($empleado["estrato"] == 8) echo 'selected'; ?> value="8">No sè</option>
				</select>
    	    </div>
 		  </div>
 		  <div class="form-row">
 		  	<div class="form-group col-md-6">
      			<label for="Vivienda">Vivienda</label>
      			<select id="Vivienda" name="Vivienda"  class="form-control" required>
					<option <?php if($empleado["vivienda"] == 1) echo 'selected'; ?> value="1">En arriendo</option>
					<option <?php if($empleado["vivienda"] == 2) echo 'selected'; ?> value="2">Propia</option>
					<option <?php if($empleado["vivienda"] == 3) echo 'selected'; ?> value="3">Familiar</option>
				</select>
    	    </div>
    	    <div class="form-group col-md-6">
      			<label for="Cargafamiliar">Carga familiar</label>
      			<input value="<?php echo $empleado["cargafamiliar"]; ?>" type="number" name="Cargafamiliar" class="form-control">
    	    </div>
 		  </div>
 		  <div class="form-row">
 		  	<div class="form-group col-md-6">
      			<label for="Departamento2">Departamento Trabajo</label>
      			<select id="Departamento2" name="Departamento2"  class="form-control">
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "amazonas") echo 'selected'; ?> value="Amazonas">Amazonas</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "antioquia") echo 'selected'; ?> value="Antioquia">Antioquia</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "arauca") echo 'selected'; ?> value="Arauca">Arauca</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "atlantico") echo 'selected'; ?> value="Atlantico">Atlantico</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "bolivar") echo 'selected'; ?> value="Bolivar">Bolivar</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "boyaca") echo 'selected'; ?> value="Boyaca">Boyaca</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "caldas") echo 'selected'; ?> value="Caldas">Caldas</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "caqueta") echo 'selected'; ?> value="Caqueta">Caqueta</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "casanare") echo 'selected'; ?> value="Casanare">Casanare</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "cauca") echo 'selected'; ?> value="Cauca">Cauca</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "cesar") echo 'selected'; ?> value="Cesar">Cesar</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "choco") echo 'selected'; ?> value="Choco">Choco</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "cordoba") echo 'selected'; ?> value="Cordoba">Cordoba</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "cundinamarca") echo 'selected'; ?> value="Cundinamarca">Cundinamarca</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "guainia") echo 'selected'; ?> value="Guainia">Guainia</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "guaviare") echo 'selected'; ?> value="Guaviare">Guaviare</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "huila") echo 'selected'; ?> value="Huila">Huila</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "la guajira") echo 'selected'; ?> value="La Guajira">La Guajira</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "magdalena") echo 'selected'; ?> value="Magdalena">Magdalena</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "meta") echo 'selected'; ?> value="Meta">Meta</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "nariño") echo 'selected'; ?> value="Nariño">Nariño</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "norte de santander") echo 'selected'; ?> value="Norte de santander">Norte de santander</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "putumayo") echo 'selected'; ?> value="Putumayo">Putumayo</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "quindio") echo 'selected'; ?> value="Quindio">Quindio</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "risaralda") echo 'selected'; ?> value="Risaralda">Risaralda</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "san andres y providencia") echo 'selected'; ?> value="San Andres y Providencia">San Andres y Providencia</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "santander") echo 'selected'; ?> value="Santander">Santander</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "sucre") echo 'selected'; ?> value="Sucre">Sucre</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "tolima") echo 'selected'; ?> value="Tolima">Tolima</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "valle del cauca") echo 'selected'; ?> value="Valle del Cauca">Valle del Cauca</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "vaupes") echo 'selected'; ?> value="Vaupes">Vaupes</option>
       				<option <?php if( strtolower($empleado["departamentotrabajo"]) == "vichada") echo 'selected'; ?> value="Vichada">Vichada</option>
					<option <?php if( strtolower($empleado["departamentotrabajo"]) == "otro") echo 'selected'; ?> value="Otro">Otro</option>
     			</select> 
    	    </div>
    	    <div class="form-group col-md-6">
      			<label for="Ciudadtrabajo">Ciudad Trabajo</label>
      			<input value="<?php echo $empleado["ciudadtrabajo"]; ?>" type="text" name="Ciudadtrabajo" class="form-control">
    	    </div>
 		  </div>
 		  <div class="form-row">
 		  	<div class="form-group col-md-6">
      			<label for="Cargotrabajo">Cargo Trabajo</label>
      			<input value="<?php echo $empleado["cargotrabajo"]; ?>" type="text" name="Cargotrabajo" class="form-control">
    	    </div>
    	    <div class="form-group col-md-6">
      			<label for="Aniostrabajo">Años de trabajo</label>
      			<input value="<?php echo $empleado["aniostrabajo"]; ?>" type="number" name="Aniostrabajo" class="form-control">
    	    </div>
 		  </div>
 		  <div class="form-row">
 		  	<div class="form-group col-md-6">
      			<label for="Tipocargo">Tipo de Cargo </label>
      			<select id="Tipocargo" name="Tipocargo"  class="form-control" required>
					<option <?php if($empleado["tipocargo"] == 1) echo 'selected'; ?> value="1">Jefatura - tiene personal a cargo</option>
					<option <?php if($empleado["tipocargo"] == 2) echo 'selected'; ?> value="2">Profesional, analista, técnico, tecnólogo</option>
					<option <?php if($empleado["tipocargo"] == 3) echo 'selected'; ?> value="3">Auxiliar, asistente administrativo, asistente técnico</option>
					<option <?php if($empleado["tipocargo"] == 4) echo 'selected'; ?> value="4">Operario, operador, ayudante, servicios generales</option>
				</select>
    	    </div>
    	    <div class="form-group col-md-6">
      			<label for="AniosCargo">Años de Cargo</label>
      			<input value="<?php echo $empleado["aniostrabajo"]; ?>" type="number" name="AniosCargo" class="form-control">
    	    </div>
 		  </div>
 		  <div class="form-row">
 		  	<div class="form-group col-md-4">
      			<label for="Tipocontrato">Tipo de Contrato </label>
      			<select id="Tipocontrato" name="Tipocontrato"  class="form-control" required>
					<option <?php if($empleado["tipocontrato"] == 1) echo 'selected'; ?> value="1">Temporal de menos de 1 año</option>
					<option <?php if($empleado["tipocontrato"] == 2) echo 'selected'; ?> value="2">Temporal de 1 año o más</option>
					<option <?php if($empleado["tipocontrato"] == 3) echo 'selected'; ?> value="3">Término indefinido</option>
					<option <?php if($empleado["tipocontrato"] == 4) echo 'selected'; ?> value="4">Cooperado (cooperativa)</option>
					<option <?php if($empleado["tipocontrato"] == 5) echo 'selected'; ?> value="5">Prestación de servicios</option>
					<option <?php if($empleado["tipocontrato"] == 6) echo 'selected'; ?> value="6">No sè</option>
				</select>
    	    </div>
    	    <div class="form-group col-md-4">
      			<label for="Hotrastrab">Horas Trab. Diarias</label>
      			<input value="<?php echo $empleado["horastrabdiarias"]; ?>" type="number" name="Hotrastrab" class="form-control">
    	    </div>
    	    <div class="form-group col-md-4">
      			<label for="Tiposalario">Tipo de salario</label>
      			<select id="Tiposalario" name="Tiposalario"  class="form-control" required>
					<option <?php if($empleado["tiposalario"] == 1) echo 'selected'; ?> value="1">Fijo (diario, semanal, quincenal o mensual)</option>
					<option <?php if($empleado["tiposalario"] == 2) echo 'selected'; ?> value="2">Una parte fija y otra variable</option>
					<option <?php if($empleado["tiposalario"] == 3) echo 'selected'; ?> value="3">Todo variable (a destajo, por producción, por comisión)</option>
            	</select>
    	    </div>
 		  </div>
        <div class="form-row " style="text-align: center">
            <section style="text-align: center" class="w-100">
              	<br>
				<h2>Seleccione el tipo de test que le realizara a este empleado</h2>
				<hr>
				<div class="col-md-3"></div>
				<div class="col-md-3">
					<input <?php if($empleado["test1"] == 1) echo 'checked'; ?> type="radio" id="control_01" name="select" value="1" required>
					<label for="control_01" class="control">
						<h2>Intra A</h2>
						<i class="fa fa-file-text fa-2x" aria-hidden="true"></i>
					</label>
				</div>
				<div class="col-md-3">
					<input <?php if($empleado["test2"] == 1) echo 'checked'; ?> type="radio" id="control_02" name="select" value="2" required>
					<label for="control_02" class="control">
						<h2>Intra B</h2>
						<i class="fa fa-file-text fa-2x" aria-hidden="true"></i>
					</label>
				</div>
				<div class="col-md-3"></div>
            </section>
        </div>
        <hr>
		<br>
		<input type="hidden" name="idempleado" value="<?php echo $idempleado ?>">
        <div class="text-center d-flex justify-content-center" style="gap: 20px;">
			<button id="btn_editar" style="width: 40%; font-size: 1.7em;" type="button" class="btn btn-success" onclick="editarEmpleado()">Editar Empleado <i class="fa fa-user-plus" aria-hidden="true"></i></button>
			<button style="width: 40%; font-size: 1.7em;" type="button" class="btn btn-danger" onclick="history.back()">Cancelar <i class="fa fa-user-times" aria-hidden="true"></i></button>
		</div>  
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
           
        </div>
      </div>
      
    </div>
  </div> 
  <!-- Modal --> 
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
	function editarEmpleado(){
		if(validarFormulario()){
			$.ajax({
				url: "../acciones/editar_empleado.php",
				type: "POST",
				data: $("#form_editar").serialize(),
				beforeSend: function(){
					$("#btn_editar").prop("disabled", true);
					Swal.fire({
						position: "bottom",
						title: "Editando...",
						text: "Espere un momento por favor",
						icon: "info",
						allowOutsideClick: false,
						didOpen: function(){
							Swal.showLoading();
						}
					});
				},
				success: function(response){
					var data = JSON.parse(response);
					if(data.status == "success"){
						Swal.fire({
							position: "bottom",
							title: data.message,
							icon: "success",
							confirmButtonText: "Aceptar",
							didClose: function(){
								window.location.href = "ver_empleados.php?idempr=" + <?php echo $idempresa; ?>;
							}
						});
					}else{
						Swal.fire({
							position: "bottom",
							title: data.message,
							icon: "error",
							confirmButtonText: "Aceptar",
						});
					}
				},
				error: function(xhr, status, error){
					Swal.fire({
						position: "bottom",
						title: "Error al editar el empleado",
						icon: "error",
						confirmButtonText: "Aceptar",
					});
				}
			});
		}else{
			Swal.fire({
				position: "bottom",
				title: "Error",
				text: "Por favor complete todos los campos",
				icon: "error",
				confirmButtonText: "Aceptar",
			});
		}
	}

	function validarFormulario(){
		var form = $("#form_editar");
		var nombre = form.find("#Nombre").val();
		var correo = form.find("#Correo").val();
		var sexo = form.find("#Sexo").val();
		var estadocivil = form.find("#Estadocivil").val();
		var nacimiento = form.find("#Nacimiento").val();
		var estudios = form.find("#Estudios").val();
		var departamento = form.find("#Departamento").val();
		var ocupacion = form.find("#Ocupacion").val();
		var ciudad = form.find("#Ciudad").val();
		var estrato = form.find("#Estrato").val();
		var vivienda = form.find("#Vivienda").val();
		var cargafamiliar = form.find("#Cargafamiliar").val();
		var departamento2 = form.find("#Departamento2").val();
		var ciudadtrabajo = form.find("#Ciudadtrabajo").val();
		var cargotrabajo = form.find("#Cargotrabajo").val();
		var aniostrabajo = form.find("#Aniostrabajo").val();
		var tipocargo = form.find("#Tipocargo").val();
		var anioscargo = form.find("#AniosCargo").val();
		var tipocontrato = form.find("#Tipocontrato").val();
		var hotrastrab = form.find("#Hotrastrab").val();
		var tiposalario = form.find("#Tiposalario").val();
		var tipo_test = $("#control_01").is(":checked") || $("#control_02").is(":checked");
		var area_trabajo = form.find("#Areatrabajo").val();
		
		if(nombre == "" || correo == "" || sexo == "" || estadocivil == "" || nacimiento == "" || estudios == "" || departamento == "" || ocupacion == "" || ciudad == "" || estrato == "" || vivienda == "" || cargafamiliar == "" || departamento2 == "" || ciudadtrabajo == "" || cargotrabajo == "" || aniostrabajo == "" || tipocargo == "" || anioscargo == "" || tipocontrato == "" || hotrastrab == "" || tiposalario == "" || !tipo_test || area_trabajo == ""){
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

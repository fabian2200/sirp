<?php 
    include_once("../conexion.php");
    $nombre = @$_POST['Nombre'];
    $apellido = @$_POST['Apellido'];
    $cedula = @$_POST['Cedula'];
    $profesion = @$_POST['Profesion'];
    $postgrado = @$_POST['Postgrado'];
    $tarjeta = @$_POST['Tarjeta'];
    $flicencia = @$_POST['FLicencia'];
    $licencia = @$_POST['Licencia'];
    $celular = @$_POST['Celular'];
    $id = @$_POST['Id'];
    $nombrecompleto = $nombre." ".$apellido;
    $sql="UPDATE `cliente` SET `nombre`='$nombrecompleto',`nroidcc`= '$cedula',`profesion`='$profesion',`postgrado`='$postgrado',`nrotarjprof`='$tarjeta',`nrolicprof`='$licencia',`fechexp`='$flicencia',`celular`='$celular',`infcompletada`= 1 WHERE idcl = $id";
    $resultado = $con -> query($sql);
    
    if($resultado)
    {
     echo  json_encode(array(
        'mensaje' => 'Se ha actualizado su información, por favor actualice la pagina para que le salgan las opciones del menú!',
        'codigo' => 1,
        'url' => 'paginas/empresas.php'
     ));
     
    }
    else
    {
      echo  json_encode(array(
        'titulo' => '¡Ha ocurrido un error!',
        'mensaje' => 'No se pudo actualizar su información, por favor intente nuevamente mas tarde.',
        'codigo' => 0,
      ));
    }
?>
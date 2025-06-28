<?php  
 include_once("../conexion.php");
 $idempleado = $_GET['idempleado'];
 $idempresa = $_GET['idempresa'];

//actualizar borrados de la empresa
$con->query("UPDATE empresa set borrados=borrados+1 where idem=$idempresa");

//borrar respuestas en intra-a, intra-b, extra y estres
$con->query("DELETE from intra_a where id_empl=$idempleado");

$con->query("DELETE from intra_b where id_empl=$idempleado");

$con->query("DELETE from extralaboral where id_empl=$idempleado");

$con->query("DELETE from estres where id_empl=$idempleado");

//eliminarlo de la tabla empleado
$con->query("DELETE from empleado where idus=$idempleado");

//eliminar las calificaciones
$con->query("DELETE FROM `calificacion` WHERE `idempleado` = $idempleado");

 echo "<script>
               alert('Se eliminara al empleado con la ID : $idempleado, de la empresa: $idempresa');
               window.location= ' ../paginas/ver_empleados.php?idempr=$idempresa'
           </script>";
?>
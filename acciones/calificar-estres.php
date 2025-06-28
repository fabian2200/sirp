<?php 

function calificar_Estres($idempleado,$idempresa,$iddepartamento)
{

include ('../conexion.php'); 
$sql="SELECT * FROM `estres` where id_empl = $idempleado";

$fila = mysqli_fetch_array($con -> query($sql));

$brutoa =  (($fila[1]+$fila[2]+$fila[3]+$fila[4]+$fila[5]+$fila[6]+$fila[7]+$fila[8])/8)*4;
$brutob =  (($fila[9]+$fila[10]+$fila[11]+$fila[12])/4)*3;
$brutoc =  (($fila[13]+$fila[14]+$fila[15]+$fila[16]+$fila[17]+$fila[18]+$fila[19]+$fila[20]+$fila[21]+$fila[22])/10)*2;
$brutod = ($fila[23]+$fila[24]+$fila[25]+$fila[26]+$fila[27]+$fila[28]+$fila[29]+$fila[30]+$fila[31])/9;

$totalbruto = $brutoa+$brutob+$brutoc+$brutod;

$factor = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=54"));
$totaltrans= ($totalbruto/$factor[3])*100;

if($totaltrans>=$factor[4] && $totaltrans<=$factor[5]){
	$riesgototal = "Sin riesgo";
}else{
	if ($totaltrans>=$factor[6] && $totaltrans<=$factor[7]) {	
		$riesgototal = "Bajo";
	}else{
		if($totaltrans>=$factor[8] && $totaltrans<=$factor[9]){
		  $riesgototal = "Medio";       
		}else{
			if ($totaltrans>=$factor[10] && $totaltrans<=$factor[11]) {
				$riesgototal = "Alto";
			}else{
                $riesgototal = "Muy alto";
			}
		}
	}
}

//insertar total de estres
echo $iddepartamento;
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,54,$totalbruto,$totaltrans,'$riesgototal',4,$iddepartamento)");
}

?>
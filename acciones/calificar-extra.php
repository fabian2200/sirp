<?php 

function calificar_Extra($idemp,$idempresa,$iddepartamento)
{
include ('../conexion.php'); 
$idempleado = $idemp;

$sql="SELECT * FROM `extralaboral` where id_empl = $idempleado";

// primer  dominio

$fila = mysqli_fetch_array($con -> query($sql));

$puntajebruto1 = $fila[14]+$fila[15]+$fila[15]+$fila[17];

$puntajebruto2 = $fila[22]+$fila[25]+$fila[27];

$puntajebruto3 = $fila[18]+$fila[19]+$fila[20]+$fila[21]+$fila[23];

$puntajebruto4 = $fila[29]+$fila[30]+$fila[31];

$puntajebruto5 = $fila[5]+$fila[6]+$fila[7]+$fila[8]+$fila[9]+$fila[10]+$fila[11]+$fila[12]+$fila[13];

$puntajebruto6 = $fila[24]+$fila[26]+$fila[28];

$puntajebruto7 = $fila[1]+$fila[2]+$fila[3]+$fila[4];

$dim1 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=46"));
$dim2 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=47"));
$dim3 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=48"));
$dim4 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=49"));
$dim5 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=50"));
$dim6 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=51"));
$dim7 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=52"));

$puntajetrans1= round(($puntajebruto1/$dim1[3])*100, 1);
$puntajetrans2= round(($puntajebruto2/$dim2[3])*100, 1);
$puntajetrans3= round(($puntajebruto3/$dim3[3])*100, 1);
$puntajetrans4= round(($puntajebruto4/$dim4[3])*100, 1);
$puntajetrans5= round(($puntajebruto5/$dim5[3])*100, 1);
$puntajetrans6= round(($puntajebruto6/$dim6[3])*100, 1);
$puntajetrans7= round(($puntajebruto7/$dim7[3])*100, 1);

if($puntajetrans1>=$dim1[4] && $puntajetrans1<=$dim1[5]){
	$riesgo1 = "Sin riesgo";
}else{
	if ($puntajetrans1>=$dim1[6] && $puntajetrans1<=$dim1[7]) {	
		$riesgo1 = "Bajo";
	}else{
		if($puntajetrans1>=$dim1[8] && $puntajetrans1<=$dim1[9]){
		  $riesgo1 = "Medio";       
		}else{
			if ($puntajetrans1>=$dim1[10] && $puntajetrans1<=$dim1[11]) {
				$riesgo1 = "Alto";
			}else{
                   $riesgo1 = "Muy alto";
			}
		}
	}
}

if($puntajetrans2>=$dim2[4] && $puntajetrans2<=$dim2[5]){
	$riesgo2 = "Sin riesgo";
}else{
	if ($puntajetrans2>=$dim2[6] && $puntajetrans2<=$dim2[7]) {	
		$riesgo2 = "Bajo";
	}else{
		if($puntajetrans2>=$dim2[8] && $puntajetrans2<=$dim2[9]){
		  $riesgo2 = "Medio";       
		}else{
			if ($puntajetrans2>=$dim2[10] && $puntajetrans2<=$dim2[11]) {
				$riesgo2 = "Alto";
			}else{
                   $riesgo2 = "Muy alto";
			}
		}
	}
}

if($puntajetrans3>=$dim3[4] && $puntajetrans3<=$dim3[5]){
	$riesgo3 = "Sin riesgo";
}else{
	if ($puntajetrans3>=$dim3[6] && $puntajetrans3<=$dim3[7]) {	
		$riesgo3 = "Bajo";
	}else{
		if($puntajetrans3>=$dim3[8] && $puntajetrans3<=$dim3[9]){
		  $riesgo3 = "Medio";       
		}else{
			if ($puntajetrans3>=$dim3[10] && $puntajetrans3<=$dim3[11]) {
				$riesgo3 = "Alto";
			}else{
                   $riesgo3 = "Muy alto";
			}
		}
	}
}

if($puntajetrans4>=$dim4[4] && $puntajetrans4<=$dim4[5]){
	$riesgo4 = "Sin riesgo";
}else{
	if ($puntajetrans4>=$dim4[6] && $puntajetrans4<=$dim4[7]) {	
		$riesgo4 = "Bajo";
	}else{
		if($puntajetrans4>=$dim4[8] && $puntajetrans4<=$dim4[9]){
		  $riesgo4 = "Medio";       
		}else{
			if ($puntajetrans4>=$dim4[10] && $puntajetrans4<=$dim4[11]) {
				$riesgo4 = "Alto";
			}else{
                $riesgo4 = "Muy alto";
			}
		}
	}
}

if($puntajetrans5>=$dim5[4] && $puntajetrans5<=$dim5[5]){
	$riesgo5 = "Sin riesgo";
}else{
	if ($puntajetrans5>=$dim5[6] && $puntajetrans5<=$dim5[7]) {	
		$riesgo5 = "Bajo";
	}else{
		if($puntajetrans5>=$dim5[8] && $puntajetrans5<=$dim5[9]){
		  $riesgo5 = "Medio";       
		}else{
			if ($puntajetrans5>=$dim5[10] && $puntajetrans5<=$dim5[11]) {
				$riesgo5 = "Alto";
			}else{
                $riesgo5 = "Muy alto";
			}
		}
	}
}


if($puntajetrans6>=$dim6[4] && $puntajetrans6<=$dim6[5]){
	$riesgo6 = "Sin riesgo";
}else{
	if ($puntajetrans6>=$dim6[6] && $puntajetrans6<=$dim6[7]) {	
		$riesgo6 = "Bajo";
	}else{
		if($puntajetrans6>=$dim6[8] && $puntajetrans6<=$dim6[9]){
		  $riesgo6 = "Medio";       
		}else{
			if ($puntajetrans6>=$dim6[10] && $puntajetrans6<=$dim6[11]) {
				$riesgo6 = "Alto";
			}else{
                $riesgo6 = "Muy alto";
			}
		}
	}
}

if($puntajetrans7>=$dim7[4] && $puntajetrans7<=$dim7[5]){
	$riesgo7 = "Sin riesgo";
}else{
	if ($puntajetrans7>=$dim7[6] && $puntajetrans7<=$dim7[7]) {	
		$riesgo7 = "Bajo";
	}else{
		if($puntajetrans7>=$dim7[8] && $puntajetrans7<=$dim7[9]){
		  $riesgo7 = "Medio";       
		}else{
			if ($puntajetrans7>=$dim7[10] && $puntajetrans7<=$dim7[11]) {
				$riesgo7 = "Alto";
			}else{
                $riesgo7 = "Muy alto";
			}
		}
	}
}
//calcular el total del extralaboral

$totalbruto = $puntajebruto1+$puntajebruto2+$puntajebruto3+$puntajebruto4+$puntajebruto5+$puntajebruto6+$puntajebruto7;

$factor = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=53"));
$totaltrans= round(($totalbruto/$factor[3])*100, 1);

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
//insertar las 7 dimensiones del test 3 extralaboral
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,46,$puntajebruto1,$puntajetrans1,'$riesgo1',3,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,47,$puntajebruto2,$puntajetrans2,'$riesgo2',3,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,48,$puntajebruto3,$puntajetrans3,'$riesgo3',3,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,49,$puntajebruto4,$puntajetrans4,'$riesgo4',3,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,50,$puntajebruto5,$puntajetrans5,'$riesgo5',3,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,51,$puntajebruto6,$puntajetrans6,'$riesgo6',3,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,52,$puntajebruto7,$puntajetrans7,'$riesgo7',3,$iddepartamento)");
//insertar total de extralaboral

$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,53,$totalbruto,$totaltrans,'$riesgototal',3,$iddepartamento)");
}

?>
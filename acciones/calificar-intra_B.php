<?php 

function calificar_B($idemp)
{
include ('../conexion.php'); 
$idempleado = $idemp;

$sql="SELECT * FROM `intra_b` where id_empl = $idempleado";

// primer  dominio

$fila = mysqli_fetch_array($con -> query($sql));

$puntajebruto1 = $fila[49]+$fila[50]+$fila[51]+$fila[52]+$fila[53]+$fila[54]+$fila[55]+$fila[56]+$fila[57]+$fila[58]+$fila[59]+$fila[60]+$fila[61];

$puntajebruto2 = $fila[62]+$fila[63]+$fila[64]+$fila[65]+$fila[66]+$fila[67]+$fila[68]+$fila[69]+$fila[70]+$fila[71]+$fila[72]+$fila[73];

$puntajebruto3 = $fila[74]+$fila[75]+$fila[76]+$fila[77]+$fila[78];

$puntajebruto4 = $fila[49]+$fila[50]+$fila[51]+$fila[52]+$fila[53]+$fila[54]+$fila[55]+$fila[56]+$fila[57]+$fila[58]+$fila[59]+$fila[60]+$fila[61]+$fila[62]+$fila[63]+$fila[64]+$fila[65]+$fila[66]+$fila[67]+$fila[68]+$fila[69]+$fila[70]+$fila[71]+$fila[72]+$fila[73]+$fila[74]+$fila[75]+$fila[76]+$fila[77]+$fila[78];

$dim1 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=26"));
$dim2 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=27"));
$dim3 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=28"));
$dom1 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=25"));


$puntajetrans1= ($puntajebruto1/$dim1[3])*100;
$puntajetrans2= ($puntajebruto2/$dim2[3])*100;
$puntajetrans3= ($puntajebruto3/$dim3[3])*100;
$puntajetrans4= ($puntajebruto4/$dom1[3])*100;


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

if($puntajetrans4>=$dom1[4] && $puntajetrans4<=$dom1[5]){
	$riesgo4 = "Sin riesgo";
}else{
	if ($puntajetrans4>=$dom1[6] && $puntajetrans4<=$dom1[7]) {	
		$riesgo4 = "Bajo";
	}else{
		if($puntajetrans4>=$dom1[8] && $puntajetrans4<=$dom1[9]){
		  $riesgo4 = "Medio";       
		}else{
			if ($puntajetrans4>=$dom1[10] && $puntajetrans4<=$dom1[11]) {
				$riesgo4 = "Alto";
			}else{
                $riesgo4 = "Muy alto";
			}
		}
	}
}

// segundo dominio

$puntajebruto5 = $fila[53]+$fila[54]+$fila[55]+$fila[56]+$fila[57]+$fila[58]+$fila[59];

$puntajebruto6 = $fila[60]+$fila[61]+$fila[62];

$puntajebruto7 = $fila[48]+$fila[49]+$fila[50]+$fila[51];

$puntajebruto8 = $fila[39]+$fila[40]+$fila[41]+$fila[42];

$puntajebruto9 = $fila[44]+$fila[45]+$fila[46];

$puntajebruto10 = $fila[53]+$fila[54]+$fila[55]+$fila[56]+$fila[57]+$fila[58]+$fila[59]+$fila[60]+$fila[61]+$fila[62]+$fila[48]+$fila[49]+$fila[50]+$fila[51]+ $fila[39]+$fila[40]+$fila[41]+$fila[42]+$fila[44]+$fila[45]+$fila[46];

$dim4 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=30"));
$dim5 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=31"));
$dim6 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=32"));
$dim7 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=33"));
$dim8 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=35"));
$dom2 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=29"));

$puntajetrans5= ($puntajebruto5/$dim4[3])*100;
$puntajetrans6= ($puntajebruto6/$dim5[3])*100;
$puntajetrans7= ($puntajebruto7/$dim6[3])*100;
$puntajetrans8= ($puntajebruto8/$dim7[3])*100;
$puntajetrans9= ($puntajebruto9/$dim8[3])*100;
$puntajetrans10= ($puntajebruto10/$dom2[3])*100;

if($puntajetrans5>=$dim4[4] && $puntajetrans5<=$dim4[5]){
	$riesgo5 = "Sin riesgo";
}else{
	if ($puntajetrans5>=$dim4[6] && $puntajetrans5<=$dim4[7]) {	
		$riesgo5 = "Bajo";
	}else{
		if($puntajetrans5>=$dim4[8] && $puntajetrans5<=$dim4[9]){
		  $riesgo5 = "Medio";       
		}else{
			if ($puntajetrans5>=$dim4[10] && $puntajetrans5<=$dim4[11]) {
				$riesgo5 = "Alto";
			}else{
                $riesgo5 = "Muy alto";
			}
		}
	}
}

if($puntajetrans6>=$dim5[4] && $puntajetrans6<=$dim5[5]){
	$riesgo6 = "Sin riesgo";
}else{
	if ($puntajetrans6>=$dim5[6] && $puntajetrans6<=$dim5[7]) {	
		$riesgo6 = "Bajo";
	}else{
		if($puntajetrans6>=$dim5[8] && $puntajetrans6<=$dim5[9]){
		  $riesgo6 = "Medio";       
		}else{
			if ($puntajetrans6>=$dim5[10] && $puntajetrans6<=$dim5[11]) {
				$riesgo6 = "Alto";
			}else{
                $riesgo6 = "Muy alto";
			}
		}
	}
}

if($puntajetrans7>=$dim6[4] && $puntajetrans7<=$dim6[5]){
	$riesgo7 = "Sin riesgo";
}else{
	if ($puntajetrans7>=$dim6[6] && $puntajetrans7<=$dim6[7]) {	
		$riesgo7 = "Bajo";
	}else{
		if($puntajetrans7>=$dim6[8] && $puntajetrans7<=$dim6[9]){
		  $riesgo7 = "Medio";       
		}else{
			if ($puntajetrans7>=$dim6[10] && $puntajetrans7<=$dim6[11]) {
				$riesgo7 = "Alto";
			}else{
                $riesgo7 = "Muy alto";
			}
		}
	}
}

if($puntajetrans8>=$dim7[4] && $puntajetrans8<=$dim7[5]){
	$riesgo8 = "Sin riesgo";
}else{
	if ($puntajetrans8>=$dim7[6] && $puntajetrans8<=$dim7[7]) {	
		$riesgo8 = "Bajo";
	}else{
		if($puntajetrans8>=$dim7[8] && $puntajetrans8<=$dim7[9]){
		  $riesgo8 = "Medio";       
		}else{
			if ($puntajetrans8>=$dim7[10] && $puntajetrans8<=$dim7[11]) {
				$riesgo8 = "Alto";
			}else{
                $riesgo8 = "Muy alto";
			}
		}
	}
}

if($puntajetrans9>=$dim8[4] && $puntajetrans9<=$dim8[5]){
	$riesgo9 = "Sin riesgo";
}else{
	if ($puntajetrans9>=$dim8[6] && $puntajetrans9<=$dim8[7]) {	
		$riesgo9 = "Bajo";
	}else{
		if($puntajetrans9>=$dim8[8] && $puntajetrans9<=$dim8[9]){
		  $riesgo9 = "Medio";       
		}else{
			if ($puntajetrans9>=$dim8[10] && $puntajetrans9<=$dim8[11]) {
				$riesgo9 = "Alto";
			}else{
                $riesgo9 = "Muy alto";
			}
		}
	}
}

if($puntajetrans10>=$dom2[4] && $puntajetrans10<=$dom2[5]){
	$riesgo10 = "Sin riesgo";
}else{
	if ($puntajetrans10>=$dom2[6] && $puntajetrans10<=$dom2[7]) {	
		$riesgo10 = "Bajo";
	}else{
		if($puntajetrans10>=$dom2[8] && $puntajetrans10<=$dom2[9]){
		  $riesgo10 = "Medio";       
		}else{
			if ($puntajetrans10>=$dom2[10] && $puntajetrans10<=$dom2[11]) {
				$riesgo10 = "Alto";
			}else{
                $riesgo10 = "Muy alto";
			}
		}
	}
}


// tercer dominio

$puntajebruto11 = $fila[1]+$fila[2]+$fila[3]+$fila[4]+$fila[5]+$fila[6]+$fila[7]+$fila[8]+$fila[9]+$fila[10]+$fila[11]+$fila[12];

$puntajebruto12 = $fila[89]+$fila[90]+$fila[91]+$fila[92]+$fila[93]+$fila[94]+$fila[95]+$fila[96]+$fila[97];

$puntajebruto13 = $fila[13]+$fila[14]+$fila[15];

$puntajebruto14 = $fila[25]+$fila[26]+$fila[27]+$fila[28];

$puntajebruto15 = $fila[16]+$fila[17]+$fila[18]+$fila[20];

$puntajebruto16 = $fila[21]+$fila[22]+$fila[23]+$fila[24]+$fila[33]+$fila[37];

$puntajebruto17 = $fila[1]+$fila[2]+$fila[3]+$fila[4]+$fila[5]+$fila[6]+$fila[7]+$fila[8]+$fila[9]+$fila[10]+$fila[11]+$fila[12]+$fila[89]+$fila[90]+$fila[91]+$fila[92]+$fila[93]+$fila[94]+$fila[95]+$fila[96]+$fila[97]+$fila[13]+$fila[14]+$fila[15]+$fila[25]+$fila[26]+$fila[27]+$fila[28]+$fila[16]+$fila[17]+$fila[18]+$fila[20]+$fila[21]+$fila[22]+$fila[23]+$fila[24]+$fila[33]+$fila[37];

$dim9 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=37"));
$dim10 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=38"));
$dim11 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=39"));
$dim12 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=40"));
$dim13 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=41"));
$dim14 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=42"));
$dom3 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=36"));


$puntajetrans11= ($puntajebruto11/$dim9[3])*100;
$puntajetrans12= ($puntajebruto12/$dim10[3])*100;
$puntajetrans13= ($puntajebruto13/$dim11[3])*100;
$puntajetrans14= ($puntajebruto14/$dim12[3])*100;
$puntajetrans15= ($puntajebruto15/$dim13[3])*100;
$puntajetrans16= ($puntajebruto16/$dim14[3])*100;
$puntajetrans17= ($puntajebruto17/$dom3[3])*100;

if($puntajetrans11>=$dim9[4] && $puntajetrans11<=$dim9[5]){
	$riesgo11 = "Sin riesgo";
}else{
	if ($puntajetrans11>=$dim9[6] && $puntajetrans11<=$dim9[7]) {	
		$riesgo11 = "Bajo";
	}else{
		if($puntajetrans11>=$dim9[8] && $puntajetrans11<=$dim9[9]){
		  $riesgo11 = "Medio";       
		}else{
			if ($puntajetrans11>=$dim9[10] && $puntajetrans11<=$dim9[11]) {
				$riesgo11 = "Alto";
			}else{
                $riesgo11 = "Muy alto";
			}
		}
	}
}

if($puntajetrans12>=$dim10[4] && $puntajetrans12<=$dim10[5]){
	$riesgo12 = "Sin riesgo";
}else{
	if ($puntajetrans12>=$dim10[6] && $puntajetrans12<=$dim10[7]) {	
		$riesgo12 = "Bajo";
	}else{
		if($puntajetrans12>=$dim10[8] && $puntajetrans12<=$dim10[9]){
		  $riesgo12 = "Medio";       
		}else{
			if ($puntajetrans12>=$dim10[10] && $puntajetrans12<=$dim10[11]) {
				$riesgo12 = "Alto";
			}else{
                $riesgo12 = "Muy alto";
			}
		}
	}
}

if($puntajetrans13>=$dim11[4] && $puntajetrans13<=$dim11[5]){
	$riesgo13 = "Sin riesgo";
}else{
	if ($puntajetrans13>=$dim11[6] && $puntajetrans13<=$dim11[7]) {	
		$riesgo13 = "Bajo";
	}else{
		if($puntajetrans13>=$dim11[8] && $puntajetrans13<=$dim11[9]){
		  $riesgo13 = "Medio";       
		}else{
			if ($puntajetrans13>=$dim11[10] && $puntajetrans13<=$dim11[11]) {
				$riesgo13 = "Alto";
			}else{
                $riesgo13 = "Muy alto";
			}
		}
	}
}

if($puntajetrans14>=$dim12[4] && $puntajetrans14<=$dim12[5]){
	$riesgo14 = "Sin riesgo";
}else{
	if ($puntajetrans14>=$dim12[6] && $puntajetrans14<=$dim12[7]) {	
		$riesgo14 = "Bajo";
	}else{
		if($puntajetrans14>=$dim12[8] && $puntajetrans14<=$dim12[9]){
		  $riesgo14 = "Medio";       
		}else{
			if ($puntajetrans14>=$dim12[10] && $puntajetrans14<=$dim12[11]) {
				$riesgo14 = "Alto";
			}else{
                $riesgo14 = "Muy alto";
			}
		}
	}
}

if($puntajetrans15>=$dim13[4] && $puntajetrans15<=$dim13[5]){
	$riesgo15 = "Sin riesgo";
}else{
	if ($puntajetrans15>=$dim13[6] && $puntajetrans15<=$dim13[7]) {	
		$riesgo15 = "Bajo";
	}else{
		if($puntajetrans15>=$dim13[8] && $puntajetrans15<=$dim13[9]){
		  $riesgo15 = "Medio";       
		}else{
			if ($puntajetrans15>=$dim13[10] && $puntajetrans15<=$dim13[11]) {
				$riesgo15 = "Alto";
			}else{
                $riesgo15 = "Muy alto";
			}
		}
	}
}

if($puntajetrans16>=$dim14[4] && $puntajetrans16<=$dim14[5]){
	$riesgo16 = "Sin riesgo";
}else{
	if ($puntajetrans16>=$dim14[6] && $puntajetrans16<=$dim14[7]) {	
		$riesgo16 = "Bajo";
	}else{
		if($puntajetrans16>=$dim14[8] && $puntajetrans16<=$dim14[9]){
		  $riesgo16 = "Medio";       
		}else{
			if ($puntajetrans16>=$dim14[10] && $puntajetrans16<=$dim14[11]) {
				$riesgo16 = "Alto";
			}else{
                $riesgo16 = "Muy alto";
			}
		}
	}
}

if($puntajetrans17>=$dom3[4] && $puntajetrans17<=$dom3[5]){
	$riesgo17 = "Sin riesgo";
}else{
	if ($puntajetrans17>=$dom3[6] && $puntajetrans17<=$dom3[7]) {	
		$riesgo17 = "Bajo";
	}else{
		if($puntajetrans17>=$dom3[8] && $puntajetrans17<=$dom3[9]){
		  $riesgo17 = "Medio";       
		}else{
			if ($puntajetrans17>=$dom3[10] && $puntajetrans17<=$dom3[11]) {
				$riesgo17 = "Alto";
			}else{
                $riesgo17 = "Muy alto";
			}
		}
	}
}

// cuarto dominio

$puntajebruto18 = $fila[85]+$fila[86]+$fila[87]+$fila[88];

$puntajebruto19 = $fila[79]+$fila[80]+$fila[81]+$fila[82]+$fila[83]+$fila[84];

$puntajebruto20 = $fila[85]+$fila[86]+$fila[87]+$fila[88]+$fila[79]+$fila[80]+$fila[81]+$fila[82]+$fila[83]+$fila[84];

$dim15 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=44"));
$dim16 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=45"));
$dom4 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=43"));

$puntajetrans18= ($puntajebruto18/$dim15[3])*100;
$puntajetrans19= ($puntajebruto19/$dim16[3])*100;
$puntajetrans20= ($puntajebruto20/$dom4[3])*100;

if($puntajetrans18>=$dim15[4] && $puntajetrans18<=$dim15[5]){
	$riesgo18 = "Sin riesgo";
}else{
	if ($puntajetrans18>=$dim15[6] && $puntajetrans18<=$dim15[7]) {	
		$riesgo18 = "Bajo";
	}else{
		if($puntajetrans18>=$dim15[8] && $puntajetrans18<=$dim15[9]){
		  $riesgo18 = "Medio";       
		}else{
			if ($puntajetrans18>=$dim15[10] && $puntajetrans18<=$dim15[11]) {
				$riesgo18 = "Alto";
			}else{
                $riesgo18 = "Muy alto";
			}
		}
	}
}

if($puntajetrans19>=$dim16[4] && $puntajetrans19<=$dim16[5]){
	$riesgo19 = "Sin riesgo";
}else{
	if ($puntajetrans19>=$dim16[6] && $puntajetrans19<=$dim16[7]) {	
		$riesgo19 = "Bajo";
	}else{
		if($puntajetrans19>=$dim16[8] && $puntajetrans19<=$dim16[9]){
		  $riesgo19 = "Medio";       
		}else{
			if ($puntajetrans19>=$dim16[10] && $puntajetrans19<=$dim16[11]) {
				$riesgo19 = "Alto";
			}else{
                $riesgo19 = "Muy alto";
			}
		}
	}
}

if($puntajetrans20>=$dom4[4] && $puntajetrans20<=$dom4[5]){
	$riesgo20 = "Sin riesgo";
}else{
	if ($puntajetrans20>=$dom4[6] && $puntajetrans20<=$dom4[7]) {	
		$riesgo20 = "Bajo";
	}else{
		if($puntajetrans20>=$dom4[8] && $puntajetrans20<=$dom4[9]){
		  $riesgo20 = "Medio";       
		}else{
			if ($puntajetrans20>=$dom4[10] && $puntajetrans20<=$dom4[11]) {
				$riesgo20 = "Alto";
			}else{
                $riesgo20 = "Muy alto";
			}
		}
	}
}

//hallar el total general de intra B

$puntajebruto21 = $puntajebruto4+$puntajebruto10+$puntajebruto17+$puntajebruto20;
$total1 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=56"));
$puntajetrans21= ($puntajebruto21/$total1[3])*100;

if($puntajetrans21>=$total1[4] && $puntajetrans21<=$total1[5]){
	$riesgo21 = "Sin riesgo";
}else{
	if ($puntajetrans21>=$total1[6] && $puntajetrans21<=$total1[7]) {	
		$riesgo21 = "Bajo";
	}else{
		if($puntajetrans21>=$total1[8] && $puntajetrans21<=$total1[9]){
		  $riesgo21 = "Medio";       
		}else{
			if ($puntajetrans21>=$total1[10] && $puntajetrans21<=$total1[11]) {
				$riesgo21 = "Alto";
			}else{
                $riesgo21 = "Muy alto";
			}
		}
	}
}
// insertar las 20 calificaciones de los 16 dimensiones y 4 dominios dimensiones

$sql2="SELECT idempresa,areatrabajo FROM `empleado` where idus = $idempleado";
$resultado = mysqli_fetch_array($con -> query($sql2));
$idempresa = $resultado[0];
$iddepartamento = $resultado[1];

$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,26,$puntajebruto1,$puntajetrans1,'$riesgo1',2,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,27,$puntajebruto2,$puntajetrans2,'$riesgo2',2,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,28,$puntajebruto3,$puntajetrans3,'$riesgo3',2,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,25,$puntajebruto4,$puntajetrans4,'$riesgo4',2,$iddepartamento)");

$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,30,$puntajebruto5,$puntajetrans5,'$riesgo5',2,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,31,$puntajebruto6,$puntajetrans6,'$riesgo6',2,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,32,$puntajebruto7,$puntajetrans7,'$riesgo7',2,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,33,$puntajebruto8,$puntajetrans8,'$riesgo8',2,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,35,$puntajebruto9,$puntajetrans9,'$riesgo9',2,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,29,$puntajebruto10,$puntajetrans10,'$riesgo10',2,$iddepartamento)");


$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,37,$puntajebruto11,$puntajetrans11,'$riesgo11',2,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,38,$puntajebruto12,$puntajetrans12,'$riesgo12',2,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,39,$puntajebruto13,$puntajetrans13,'$riesgo13',2,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,40,$puntajebruto14,$puntajetrans14,'$riesgo14',2,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,41,$puntajebruto15,$puntajetrans15,'$riesgo15',2,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,42,$puntajebruto16,$puntajetrans16,'$riesgo16',2,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,36,$puntajebruto17,$puntajetrans17,'$riesgo17',2,$iddepartamento)");


$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,44,$puntajebruto18,$puntajetrans18,'$riesgo18',2,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,45,$puntajebruto19,$puntajetrans19,'$riesgo19',2,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,43,$puntajebruto20,$puntajetrans20,'$riesgo20',2,$iddepartamento)");

// insertar total intra B
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,56,$puntajebruto21,$puntajetrans21,'$riesgo21',2,$iddepartamento)");
}

?>
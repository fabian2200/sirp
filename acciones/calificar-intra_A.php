<?php 

function calificar_A($idemp)
{
include ('../conexion.php'); 
$idempleado = $idemp;

$sql="SELECT * FROM `intra_a` where id_empl = $idempleado";

// primer  dominio

$fila = mysqli_fetch_array($con -> query($sql));

$puntajebruto1 = $fila[63]+$fila[64]+$fila[65]+$fila[66]+$fila[67]+$fila[68]+$fila[69]+$fila[70]+$fila[71]+$fila[72]+$fila[73]+$fila[74]+$fila[75];

$puntajebruto2 = $fila[76]+$fila[77]+$fila[78]+$fila[79]+$fila[80]+$fila[81]+$fila[82]+$fila[83]+$fila[84]+$fila[85]+$fila[86]+$fila[87]+$fila[88]+$fila[89];

$puntajebruto3 = $fila[90]+$fila[91]+$fila[92]+$fila[93]+$fila[94];

$puntajebruto4 = $fila[115]+$fila[116]+$fila[117]+$fila[118]+$fila[119]+$fila[120]+$fila[121]+$fila[122]+$fila[123];

$puntajebruto5 = $fila[63]+$fila[64]+$fila[65]+$fila[66]+$fila[67]+$fila[68]+$fila[69]+$fila[70]+$fila[71]+$fila[72]+$fila[73]+$fila[74]+$fila[75]+$fila[76]+$fila[77]+$fila[78]+$fila[79]+$fila[80]+$fila[81]+$fila[82]+$fila[83]+$fila[84]+$fila[85]+$fila[86]+$fila[87]+$fila[88]+$fila[89]+ $fila[90]+$fila[91]+$fila[92]+$fila[93]+$fila[94]+$fila[115]+$fila[116]+$fila[117]+$fila[118]+$fila[119]+$fila[120]+$fila[121]+$fila[122]+$fila[123];

$dim1 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=2"));
$dim2 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=3"));
$dim3 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=4"));
$dim4 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=5"));
$dim5 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=1"));


$puntajetrans1= round(($puntajebruto1/$dim1[3])*100, 1);
$puntajetrans2= round(($puntajebruto2/$dim2[3])*100, 1);
$puntajetrans3= round(($puntajebruto3/$dim3[3])*100, 1);
$puntajetrans4= round(($puntajebruto4/$dim4[3])*100, 1);
$puntajetrans5= round(($puntajebruto5/$dim5[3])*100, 1);

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

// segundo dominio

$puntajebruto6 = $fila[53]+$fila[54]+$fila[55]+$fila[56]+$fila[57]+$fila[58]+$fila[59];

$puntajebruto7 = $fila[60]+$fila[61]+$fila[62];

$puntajebruto8 = $fila[48]+$fila[49]+$fila[50]+$fila[51];

$puntajebruto9 = $fila[39]+$fila[40]+$fila[41]+$fila[42];

$puntajebruto10 = $fila[44]+$fila[45]+$fila[46];

$puntajebruto11 = $fila[53]+$fila[54]+$fila[55]+$fila[56]+$fila[57]+$fila[58]+$fila[59]+$fila[60]+$fila[61]+$fila[62]+$fila[48]+$fila[49]+$fila[50]+$fila[51]+$fila[44]+$fila[45]+$fila[46]+$fila[39]+$fila[40]+$fila[41]+$fila[42];

$dim6 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=7"));
$dim7 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=8"));
$dim8 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=9"));
$dim9 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=10"));
$dim10 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=12"));
$dim11 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=6"));


$puntajetrans6= round(($puntajebruto6/$dim6[3])*100, 1);
$puntajetrans7= round(($puntajebruto7/$dim7[3])*100, 1);
$puntajetrans8= round(($puntajebruto8/$dim8[3])*100, 1);
$puntajetrans9= round(($puntajebruto9/$dim9[3])*100, 1);
$puntajetrans10= round(($puntajebruto10/$dim10[3])*100, 1);
$puntajetrans11= round(($puntajebruto11/$dim11[3])*100, 1);

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

if($puntajetrans8>=$dim8[4] && $puntajetrans8<=$dim8[5]){
	$riesgo8 = "Sin riesgo";
}else{
	if ($puntajetrans8>=$dim8[6] && $puntajetrans8<=$dim8[7]) {	
		$riesgo8 = "Bajo";
	}else{
		if($puntajetrans8>=$dim8[8] && $puntajetrans8<=$dim8[9]){
		  $riesgo8 = "Medio";       
		}else{
			if ($puntajetrans8>=$dim8[10] && $puntajetrans8<=$dim8[11]) {
				$riesgo8 = "Alto";
			}else{
                $riesgo8 = "Muy alto";
			}
		}
	}
}

if($puntajetrans9>=$dim9[4] && $puntajetrans9<=$dim9[5]){
	$riesgo9 = "Sin riesgo";
}else{
	if ($puntajetrans9>=$dim9[6] && $puntajetrans9<=$dim9[7]) {	
		$riesgo9 = "Bajo";
	}else{
		if($puntajetrans9>=$dim9[8] && $puntajetrans9<=$dim9[9]){
		  $riesgo9 = "Medio";       
		}else{
			if ($puntajetrans9>=$dim9[10] && $puntajetrans9<=$dim9[11]) {
				$riesgo9 = "Alto";
			}else{
                $riesgo9 = "Muy alto";
			}
		}
	}
}

if($puntajetrans10>=$dim10[4] && $puntajetrans10<=$dim10[5]){
	$riesgo10 = "Sin riesgo";
}else{
	if ($puntajetrans10>=$dim10[6] && $puntajetrans10<=$dim10[7]) {	
		$riesgo10 = "Bajo";
	}else{
		if($puntajetrans10>=$dim10[8] && $puntajetrans10<=$dim10[9]){
		  $riesgo10 = "Medio";       
		}else{
			if ($puntajetrans10>=$dim10[10] && $puntajetrans10<=$dim10[11]) {
				$riesgo10 = "Alto";
			}else{
                $riesgo10 = "Muy alto";
			}
		}
	}
}

if($puntajetrans11>=$dim11[4] && $puntajetrans11<=$dim11[5]){
	$riesgo11 = "Sin riesgo";
}else{
	if ($puntajetrans11>=$dim11[6] && $puntajetrans11<=$dim11[7]) {	
		$riesgo11 = "Bajo";
	}else{
		if($puntajetrans11>=$dim11[8] && $puntajetrans11<=$dim11[9]){
		  $riesgo11 = "Medio";       
		}else{
			if ($puntajetrans11>=$dim11[10] && $puntajetrans11<=$dim11[11]) {
				$riesgo11 = "Alto";
			}else{
                $riesgo11 = "Muy alto";
			}
		}
	}
}


// tercer dominio

$puntajebruto12 = $fila[1]+$fila[2]+$fila[3]+$fila[4]+$fila[5]+$fila[6]+$fila[7]+$fila[8]+$fila[9]+$fila[10]+$fila[11]+$fila[12];

$puntajebruto13 = $fila[106]+$fila[107]+$fila[108]+$fila[109]+$fila[110]+$fila[111]+$fila[112]+$fila[113]+$fila[114];

$puntajebruto14 = $fila[13]+$fila[14]+$fila[15]+$fila[32]+$fila[43]+$fila[47];

$puntajebruto15 = $fila[35]+$fila[36]+$fila[37]+$fila[38];

$puntajebruto16 = $fila[19]+$fila[22]+$fila[23]+$fila[24]+$fila[25]+$fila[26];

$puntajebruto17 = $fila[16]+$fila[17]+$fila[18]+$fila[20]+$fila[21];

$puntajebruto18 = $fila[27]+$fila[28]+$fila[29]+$fila[30]+$fila[52];

$puntajebruto19 = $fila[31]+$fila[33]+$fila[34];

$puntajebruto20 = $fila[1]+$fila[2]+$fila[3]+$fila[4]+$fila[5]+$fila[6]+$fila[7]+$fila[8]+$fila[9]+$fila[10]+$fila[11]+$fila[12]+$fila[106]+$fila[107]+$fila[108]+$fila[109]+$fila[110]+$fila[111]+$fila[112]+$fila[113]+$fila[114]+$fila[13]+$fila[14]+$fila[15]+$fila[32]+$fila[43]+$fila[47]+$fila[35]+$fila[36]+$fila[37]+$fila[38]+$fila[19]+$fila[22]+$fila[23]+$fila[24]+$fila[25]+$fila[26]+$fila[16]+$fila[17]+$fila[18]+$fila[20]+$fila[21]+$fila[27]+$fila[28]+$fila[29]+$fila[30]+$fila[52]+$fila[31]+$fila[33]+$fila[34];

$dim12 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=14"));
$dim13 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=15"));
$dim14 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=16"));
$dim15 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=17"));
$dim16 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=18"));
$dim17 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=19"));
$dim18 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=20"));
$dim19 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=21"));
$dim20 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=13"));


$puntajetrans12= round(($puntajebruto12/$dim12[3])*100, 1);
$puntajetrans13= round(($puntajebruto13/$dim13[3])*100, 1);
$puntajetrans14= round(($puntajebruto14/$dim14[3])*100, 1);
$puntajetrans15= round(($puntajebruto15/$dim15[3])*100, 1);
$puntajetrans16= round(($puntajebruto16/$dim16[3])*100, 1);
$puntajetrans17= round(($puntajebruto17/$dim17[3])*100, 1);
$puntajetrans18= round(($puntajebruto18/$dim18[3])*100, 1);
$puntajetrans19= round(($puntajebruto19/$dim19[3])*100, 1);
$puntajetrans20= round(($puntajebruto20/$dim20[3])*100, 1);

if($puntajetrans12>=$dim12[4] && $puntajetrans12<=$dim12[5]){
	$riesgo12 = "Sin riesgo";
}else{
	if ($puntajetrans12>=$dim12[6] && $puntajetrans12<=$dim12[7]) {	
		$riesgo12 = "Bajo";
	}else{
		if($puntajetrans12>=$dim12[8] && $puntajetrans12<=$dim12[9]){
		  $riesgo12 = "Medio";       
		}else{
			if ($puntajetrans12>=$dim12[10] && $puntajetrans12<=$dim12[11]) {
				$riesgo12 = "Alto";
			}else{
                $riesgo12 = "Muy alto";
			}
		}
	}
}

if($puntajetrans13>=$dim13[4] && $puntajetrans13<=$dim13[5]){
	$riesgo13 = "Sin riesgo";
}else{
	if ($puntajetrans13>=$dim13[6] && $puntajetrans13<=$dim13[7]) {	
		$riesgo13 = "Bajo";
	}else{
		if($puntajetrans13>=$dim13[8] && $puntajetrans13<=$dim13[9]){
		  $riesgo13 = "Medio";       
		}else{
			if ($puntajetrans13>=$dim13[10] && $puntajetrans13<=$dim13[11]) {
				$riesgo13 = "Alto";
			}else{
                $riesgo13 = "Muy alto";
			}
		}
	}
}

if($puntajetrans14>=$dim14[4] && $puntajetrans14<=$dim14[5]){
	$riesgo14 = "Sin riesgo";
}else{
	if ($puntajetrans14>=$dim14[6] && $puntajetrans14<=$dim14[7]) {	
		$riesgo14 = "Bajo";
	}else{
		if($puntajetrans14>=$dim14[8] && $puntajetrans14<=$dim14[9]){
		  $riesgo14 = "Medio";       
		}else{
			if ($puntajetrans14>=$dim14[10] && $puntajetrans14<=$dim14[11]) {
				$riesgo14 = "Alto";
			}else{
                $riesgo14 = "Muy alto";
			}
		}
	}
}

if($puntajetrans15>=$dim15[4] && $puntajetrans15<=$dim15[5]){
	$riesgo15 = "Sin riesgo";
}else{
	if ($puntajetrans15>=$dim15[6] && $puntajetrans15<=$dim15[7]) {	
		$riesgo15 = "Bajo";
	}else{
		if($puntajetrans15>=$dim15[8] && $puntajetrans15<=$dim15[9]){
		  $riesgo15 = "Medio";       
		}else{
			if ($puntajetrans15>=$dim15[10] && $puntajetrans15<=$dim15[11]) {
				$riesgo15 = "Alto";
			}else{
                $riesgo15 = "Muy alto";
			}
		}
	}
}

if($puntajetrans16>=$dim16[4] && $puntajetrans16<=$dim16[5]){
	$riesgo16 = "Sin riesgo";
}else{
	if ($puntajetrans16>=$dim16[6] && $puntajetrans16<=$dim16[7]) {	
		$riesgo16 = "Bajo";
	}else{
		if($puntajetrans16>=$dim16[8] && $puntajetrans16<=$dim16[9]){
		  $riesgo16 = "Medio";       
		}else{
			if ($puntajetrans16>=$dim16[10] && $puntajetrans16<=$dim16[11]) {
				$riesgo16 = "Alto";
			}else{
                $riesgo16 = "Muy alto";
			}
		}
	}
}

if($puntajetrans17>=$dim17[4] && $puntajetrans17<=$dim17[5]){
	$riesgo17 = "Sin riesgo";
}else{
	if ($puntajetrans17>=$dim17[6] && $puntajetrans17<=$dim17[7]) {	
		$riesgo17 = "Bajo";
	}else{
		if($puntajetrans17>=$dim17[8] && $puntajetrans17<=$dim17[9]){
		  $riesgo17 = "Medio";       
		}else{
			if ($puntajetrans17>=$dim17[10] && $puntajetrans17<=$dim17[11]) {
				$riesgo17 = "Alto";
			}else{
                $riesgo17 = "Muy alto";
			}
		}
	}
}

if($puntajetrans18>=$dim18[4] && $puntajetrans18<=$dim18[5]){
	$riesgo18 = "Sin riesgo";
}else{
	if ($puntajetrans18>=$dim18[6] && $puntajetrans18<=$dim18[7]) {	
		$riesgo18 = "Bajo";
	}else{
		if($puntajetrans18>=$dim18[8] && $puntajetrans18<=$dim18[9]){
		  $riesgo18 = "Medio";       
		}else{
			if ($puntajetrans18>=$dim18[10] && $puntajetrans18<=$dim18[11]) {
				$riesgo18 = "Alto";
			}else{
                $riesgo18 = "Muy alto";
			}
		}
	}
}

if($puntajetrans19>=$dim19[4] && $puntajetrans19<=$dim19[5]){
	$riesgo19 = "Sin riesgo";
}else{
	if ($puntajetrans19>=$dim19[6] && $puntajetrans19<=$dim19[7]) {	
		$riesgo19 = "Bajo";
	}else{
		if($puntajetrans19>=$dim19[8] && $puntajetrans19<=$dim19[9]){
		  $riesgo19 = "Medio";       
		}else{
			if ($puntajetrans19>=$dim19[10] && $puntajetrans19<=$dim19[11]) {
				$riesgo19 = "Alto";
			}else{
                $riesgo19 = "Muy alto";
			}
		}
	}
}

if($puntajetrans20>=$dim20[4] && $puntajetrans20<=$dim20[5]){
	$riesgo20 = "Sin riesgo";
}else{
	if ($puntajetrans20>=$dim20[6] && $puntajetrans20<=$dim20[7]) {	
		$riesgo20 = "Bajo";
	}else{
		if($puntajetrans20>=$dim20[8] && $puntajetrans20<=$dim20[9]){
		  $riesgo20 = "Medio";       
		}else{
			if ($puntajetrans20>=$dim20[10] && $puntajetrans20<=$dim20[11]) {
				$riesgo20 = "Alto";
			}else{
                $riesgo20 = "Muy alto";
			}
		}
	}
}


// cuarto dominio

$puntajebruto21 = $fila[95]+$fila[102]+$fila[103]+$fila[104]+$fila[105];

$puntajebruto22 = $fila[96]+$fila[97]+$fila[98]+$fila[99]+$fila[100]+$fila[101];

$puntajebruto23 = $fila[95]+$fila[102]+$fila[103]+$fila[104]+$fila[105]+$fila[96]+$fila[97]+$fila[98]+$fila[99]+$fila[100]+$fila[101];

$dim21 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=23"));
$dim22 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=24"));
$dim23 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=22"));

$puntajetrans21= round(($puntajebruto21/$dim21[3])*100, 1);
$puntajetrans22= round(($puntajebruto22/$dim22[3])*100, 1);
$puntajetrans23= round(($puntajebruto23/$dim23[3])*100, 1);

if($puntajetrans21>=$dim21[4] && $puntajetrans21<=$dim21[5]){
	$riesgo21 = "Sin riesgo";
}else{
	if ($puntajetrans21>=$dim21[6] && $puntajetrans21<=$dim21[7]) {	
		$riesgo21 = "Bajo";
	}else{
		if($puntajetrans21>=$dim21[8] && $puntajetrans21<=$dim21[9]){
		  $riesgo21 = "Medio";       
		}else{
			if ($puntajetrans21>=$dim21[10] && $puntajetrans21<=$dim21[11]) {
				$riesgo21 = "Alto";
			}else{
                $riesgo21 = "Muy alto";
			}
		}
	}
}

if($puntajetrans22>=$dim22[4] && $puntajetrans22<=$dim22[5]){
	$riesgo22 = "Sin riesgo";
}else{
	if ($puntajetrans22>=$dim22[6] && $puntajetrans22<=$dim22[7]) {	
		$riesgo22 = "Bajo";
	}else{
		if($puntajetrans22>=$dim22[8] && $puntajetrans22<=$dim22[9]){
		  $riesgo22 = "Medio";       
		}else{
			if ($puntajetrans22>=$dim22[10] && $puntajetrans22<=$dim22[11]) {
				$riesgo22 = "Alto";
			}else{
                $riesgo22 = "Muy alto";
			}
		}
	}
}

if($puntajetrans23>=$dim23[4] && $puntajetrans23<=$dim23[5]){
	$riesgo23 = "Sin riesgo";
}else{
	if ($puntajetrans23>=$dim23[6] && $puntajetrans23<=$dim23[7]) {	
		$riesgo23 = "Bajo";
	}else{
		if($puntajetrans23>=$dim23[8] && $puntajetrans23<=$dim23[9]){
		  $riesgo23 = "Medio";       
		}else{
			if ($puntajetrans23>=$dim23[10] && $puntajetrans23<=$dim23[11]) {
				$riesgo23 = "Alto";
			}else{
                $riesgo23 = "Muy alto";
			}
		}
	}
}

//hallar el total general de intra A

$puntajebruto24 = $puntajebruto5+$puntajebruto11+$puntajebruto20+$puntajebruto23;
$total1 = mysqli_fetch_array($con -> query("SELECT * FROM normas where iddi=55"));
$puntajetrans24= round(($puntajebruto24/$total1[3])*100, 1);

if($puntajetrans24>=$total1[4] && $puntajetrans24<=$total1[5]){
	$riesgo24 = "Sin riesgo";
}else{
	if ($puntajetrans24>=$total1[6] && $puntajetrans24<=$total1[7]) {	
		$riesgo24 = "Bajo";
	}else{
		if($puntajetrans24>=$total1[8] && $puntajetrans24<=$total1[9]){
		  $riesgo24 = "Medio";       
		}else{
			if ($puntajetrans24>=$total1[10] && $puntajetrans24<=$total1[11]) {
				$riesgo24 = "Alto";
			}else{
                $riesgo24 = "Muy alto";
			}
		}
	}
}
// insertar las 23 calificaciones de los 19 dimensiones y 4 dominios dimensiones

$sql2="SELECT idempresa,areatrabajo FROM `empleado` where idus = $idempleado";
$resultado = mysqli_fetch_array($con -> query($sql2));
$idempresa = $resultado[0];
$iddepartamento = $resultado[1];

$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,2,$puntajebruto1,$puntajetrans1,'$riesgo1',1,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,3,$puntajebruto2,$puntajetrans2,'$riesgo2',1,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,4,$puntajebruto3,$puntajetrans3,'$riesgo3',1,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,5,$puntajebruto4,$puntajetrans4,'$riesgo4',1,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,1,$puntajebruto5,$puntajetrans5,'$riesgo5',1,$iddepartamento)");

$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,7,$puntajebruto6,$puntajetrans6,'$riesgo6',1,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,8,$puntajebruto7,$puntajetrans7,'$riesgo7',1,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,9,$puntajebruto8,$puntajetrans8,'$riesgo8',1,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,10,$puntajebruto9,$puntajetrans9,'$riesgo9',1,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,12,$puntajebruto10,$puntajetrans10,'$riesgo10',1,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,6,$puntajebruto11,$puntajetrans11,'$riesgo11',1,$iddepartamento)");


$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,14,$puntajebruto12,$puntajetrans12,'$riesgo12',1,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,15,$puntajebruto13,$puntajetrans13,'$riesgo13',1,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,16,$puntajebruto14,$puntajetrans14,'$riesgo14',1,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,17,$puntajebruto15,$puntajetrans15,'$riesgo15',1,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,18,$puntajebruto16,$puntajetrans16,'$riesgo16',1,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,19,$puntajebruto17,$puntajetrans17,'$riesgo17',1,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,20,$puntajebruto18,$puntajetrans18,'$riesgo18',1,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,21,$puntajebruto19,$puntajetrans19,'$riesgo19',1,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,13,$puntajebruto20,$puntajetrans20,'$riesgo20',1,$iddepartamento)");

$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,23,$puntajebruto21,$puntajetrans21,'$riesgo21',1,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,24,$puntajebruto22,$puntajetrans22,'$riesgo22',1,$iddepartamento)");
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,22,$puntajebruto23,$puntajetrans23,'$riesgo23',1,$iddepartamento)");


// insertar total intra A
$con -> query("INSERT into calificacion (idempresa,idempleado,iddimension,puntajebruto,puntajetransformado,nivelriesgo,tipo_examen,iddepartamento) values ($idempresa,$idempleado,55,$puntajebruto24,$puntajetrans24,'$riesgo24',1,$iddepartamento)");

}

?>
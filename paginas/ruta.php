<?php  
function ruta_A($paso1,$paso11,$pregunta1,$paso2,$pregunta2,$paso3,$idemple)
{
    if($paso1==0){
      return "../cuestionarios/intraa_parte1.php?idempl=$idemple";
    }else{
        if ($paso11==0) {
            return "../cuestionarios/intraa_parte1_2.php?idempl=$idemple";
        }else{
            }if ($pregunta1==0) {
                return "../cuestionarios/pregunta1_intraa.php?idempl=$idemple";
            }else{
                if ($paso2==0) {
                    return "../cuestionarios/intraa_parte2.php?idempl=$idemple";
                }else{
                    if ($pregunta2==0) {
                        return "../cuestionarios/pregunta2_intraa.php?idempl=$idemple";
                    }else{
                        return "../cuestionarios/intraa_parte3.php?idempl=$idemple";
                }
            }
        }
    }
}

function ruta_B($paso1,$paso11,$pregunta1,$paso2,$idemple)
{
    if($paso1==0){
      return "../cuestionarios/intrab_parte1.php?idempl=$idemple";
    }else{
        if($paso11==0){
            return "../cuestionarios/intrab_parte1_2.php?idempl=$idemple";
        }else{
            if ($pregunta1==0) {
                return "../cuestionarios/pregunta1_intrab.php?idempl=$idemple";
            }else{
                if ($paso2==0) {
                    return "../cuestionarios/intrab_parte2.php?idempl=$idemple";
                }
            }
        }
    }
}
?>
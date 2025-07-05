<?php
session_start();
include_once("../conexion.php");
if(($_SESSION['logueado']) == true){ 
 $id = $_SESSION['id'];
 $idempl = $_GET['idempl'];
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
  <h2 style="color: #224abe !important; font-weight: bold; width: 100%; text-align: center;">Cuestionario Intralaboral Forma B</h2>
  <hr>
  <form method="POST" action="../acciones/guardar_intrab_p1_2.php">
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
        <td>51</td>
        <td>Mi jefe me anima para hacer mejor mi trabajo</td>
        <td><input type="radio" name="preg51" required="" value="0"></td>
        <td><input type="radio" name="preg51" required="" value="1"></td>
        <td><input type="radio" name="preg51" required="" value="2"></td>
        <td><input type="radio" name="preg51" required="" value="3"></td>
        <td><input type="radio" name="preg51" required="" value="4"></td>
      </tr>
      <tr>
        <td>52</td>
        <td>Mi jefe distribuye las tareas de forma que me facilita el trabajo</td>
        <td><input type="radio" name="preg52" required="" value="4"></td>
        <td><input type="radio" name="preg52" required="" value="3"></td>
        <td><input type="radio" name="preg52" required="" value="2"></td>
        <td><input type="radio" name="preg52" required="" value="1"></td>
        <td><input type="radio" name="preg52" required="" value="0"></td>
      </tr>
      <tr>
        <td>53</td>
        <td>Mi jefe me comunica a tiempo la información relacionada con el trabajo</td>
        <td><input type="radio" name="preg53" required="" value="0"></td>
        <td><input type="radio" name="preg53" required="" value="1"></td>
        <td><input type="radio" name="preg53" required="" value="2"></td>
        <td><input type="radio" name="preg53" required="" value="3"></td>
        <td><input type="radio" name="preg53" required="" value="4"></td>
      </tr>
      <tr>
        <td>54</td>
        <td>La orientación que me da mi jefe me ayuda a hacer mejor el trabajo</td>
        <td><input type="radio" name="preg54" required="" value="0"></td>
        <td><input type="radio" name="preg54" required="" value="1"></td>
        <td><input type="radio" name="preg54" required="" value="2"></td>
        <td><input type="radio" name="preg54" required="" value="3"></td>
        <td><input type="radio" name="preg54" required="" value="4"></td>
      </tr>
      <tr>
        <td>55</td>
        <td>Mi jefe me ayuda a progresar en el trabajo</td>
        <td><input type="radio" name="preg55" required="" value="0"></td>
        <td><input type="radio" name="preg55" required="" value="1"></td>
        <td><input type="radio" name="preg55" required="" value="2"></td>
        <td><input type="radio" name="preg55" required="" value="3"></td>
        <td><input type="radio" name="preg55" required="" value="4"></td>
      </tr>
      <tr>
        <td>56</td>
        <td>Mi jefe me ayuda a sentirme bien en el trabajo</td>
        <td><input type="radio" name="preg56" required="" value="0"></td>
        <td><input type="radio" name="preg56" required="" value="1"></td>
        <td><input type="radio" name="preg56" required="" value="2"></td>
        <td><input type="radio" name="preg56" required="" value="3"></td>
        <td><input type="radio" name="preg56" required="" value="4"></td>
      </tr>
      <tr>
        <td>57</td>
        <td>Mi jefe ayuda a solucionar los problemas que se presentan en el trabajo</td>
        <td><input type="radio" name="preg57" required="" value="0"></td>
        <td><input type="radio" name="preg57" required="" value="1"></td>
        <td><input type="radio" name="preg57" required="" value="2"></td>
        <td><input type="radio" name="preg57" required="" value="3"></td>
        <td><input type="radio" name="preg57" required="" value="4"></td>
      </tr>
      <tr>
        <td>58</td>
        <td>Mi jefe me trata con respeto</td>
        <td><input type="radio" name="preg58" required="" value="0"></td>
        <td><input type="radio" name="preg58" required="" value="1"></td>
        <td><input type="radio" name="preg58" required="" value="2"></td>
        <td><input type="radio" name="preg58" required="" value="3"></td>
        <td><input type="radio" name="preg58" required="" value="4"></td>
      </tr>
      <tr>
        <td>59</td>
        <td>Siento que puedo confiar en mi jefe</td>
        <td><input type="radio" name="preg59" required="" value="0"></td>
        <td><input type="radio" name="preg59" required="" value="1"></td>
        <td><input type="radio" name="preg59" required="" value="2"></td>
        <td><input type="radio" name="preg59" required="" value="3"></td>
        <td><input type="radio" name="preg59" required="" value="4"></td>
      </tr>
      <tr>
        <td>60</td>
        <td>Mi jefe me escucha cuando tengo problemas de trabajo</td>
        <td><input type="radio" name="preg60" required="" value="0"></td>
        <td><input type="radio" name="preg60" required="" value="1"></td>
        <td><input type="radio" name="preg60" required="" value="2"></td>
        <td><input type="radio" name="preg60" required="" value="3"></td>
        <td><input type="radio" name="preg60" required="" value="4"></td>
      </tr>
      <tr>
        <td>61</td>
        <td>Mi jefe me brinda su apoyo cuando lo necesito</td>
        <td><input type="radio" name="preg61" required="" value="0"></td>
        <td><input type="radio" name="preg61" required="" value="1"></td>
        <td><input type="radio" name="preg61" required="" value="2"></td>
        <td><input type="radio" name="preg61" required="" value="3"></td>
        <td><input type="radio" name="preg61" required="" value="4"></td>
      </tr>
      <tr>
        <td>62</td>
        <td>Me agrada el ambiente de mi grupo de trabajo</td>
        <td><input type="radio" name="preg62" required="" value="0"></td>
        <td><input type="radio" name="preg62" required="" value="1"></td>
        <td><input type="radio" name="preg62" required="" value="2"></td>
        <td><input type="radio" name="preg62" required="" value="3"></td>
        <td><input type="radio" name="preg62" required="" value="4"></td>
      </tr>
      <tr>
        <td>63</td>
        <td>En mi grupo de trabajo me tratan de forma respetuosa</td>
        <td><input type="radio" name="preg63" required="" value="0"></td>
        <td><input type="radio" name="preg63" required="" value="1"></td>
        <td><input type="radio" name="preg63" required="" value="2"></td>
        <td><input type="radio" name="preg63" required="" value="3"></td>
        <td><input type="radio" name="preg63" required="" value="4"></td>
      </tr>
      <tr>
        <td>64</td>
        <td>Siento que puedo confiar en mis compañeros de trabajo</td>
        <td><input type="radio" name="preg64" required="" value="0"></td>
        <td><input type="radio" name="preg64" required="" value="1"></td>
        <td><input type="radio" name="preg64" required="" value="2"></td>
        <td><input type="radio" name="preg64" required="" value="3"></td>
        <td><input type="radio" name="preg64" required="" value="4"></td>
      </tr>
      <tr>
        <td>65</td>
        <td>Me siento a gusto con mis compañeros de trabajo</td>
        <td><input type="radio" name="preg65" required="" value="0"></td>
        <td><input type="radio" name="preg65" required="" value="1"></td>
        <td><input type="radio" name="preg65" required="" value="2"></td>
        <td><input type="radio" name="preg65" required="" value="3"></td>
        <td><input type="radio" name="preg65" required="" value="4"></td>
      </tr>
      <tr>
        <td>66</td>
        <td>En mi grupo de trabajo algunas personas me maltratan</td>
        <td><input type="radio" name="preg66" required="" value="4"></td>
        <td><input type="radio" name="preg66" required="" value="3"></td>
        <td><input type="radio" name="preg66" required="" value="2"></td>
        <td><input type="radio" name="preg66" required="" value="1"></td>
        <td><input type="radio" name="preg66" required="" value="0"></td>
      </tr>
      <tr>
        <td>67</td>
        <td>Entre compañeros solucionamos los problemas de forma respetuosa</td>
        <td><input type="radio" name="preg67" required="" value="0"></td>
        <td><input type="radio" name="preg67" required="" value="1"></td>
        <td><input type="radio" name="preg67" required="" value="2"></td>
        <td><input type="radio" name="preg67" required="" value="3"></td>
        <td><input type="radio" name="preg67" required="" value="4"></td>
      </tr>
      <tr>
        <td>68</td>
        <td>Mi grupo de trabajo es muy unido</td>
        <td><input type="radio" name="preg68" required="" value="0"></td>
        <td><input type="radio" name="preg68" required="" value="1"></td>
        <td><input type="radio" name="preg68" required="" value="2"></td>
        <td><input type="radio" name="preg68" required="" value="3"></td>
        <td><input type="radio" name="preg68" required="" value="4"></td>
      </tr>
      <tr>
        <td>69</td>
        <td>Cuando tenemos que realizar trabajo de grupo los compañeros colaboran</td>
        <td><input type="radio" name="preg69" required="" value="0"></td>
        <td><input type="radio" name="preg69" required="" value="1"></td>
        <td><input type="radio" name="preg69" required="" value="2"></td>
        <td><input type="radio" name="preg69" required="" value="3"></td>
        <td><input type="radio" name="preg69" required="" value="4"></td>
      </tr>
      <tr>
        <td>70</td>
        <td>Es fácil poner de acuerdo al grupo para hacer el trabajo</td>
        <td><input type="radio" name="preg70" required="" value="0"></td>
        <td><input type="radio" name="preg70" required="" value="1"></td>
        <td><input type="radio" name="preg70" required="" value="2"></td>
        <td><input type="radio" name="preg70" required="" value="3"></td>
        <td><input type="radio" name="preg70" required="" value="4"></td>
      </tr>
       <tr>
        <td>71</td>
        <td>Mis compañeros de trabajo me ayudan cuando tengo dificultades</td>
        <td><input type="radio" name="preg71" required="" value="0"></td>
        <td><input type="radio" name="preg71" required="" value="1"></td>
        <td><input type="radio" name="preg71" required="" value="2"></td>
        <td><input type="radio" name="preg71" required="" value="3"></td>
        <td><input type="radio" name="preg71" required="" value="4"></td>
      </tr>
       <tr>
        <td>72</td>
        <td>En mi trabajo las personas nos apoyamos unos a otros</td>
        <td><input type="radio" name="preg72" required="" value="0"></td>
        <td><input type="radio" name="preg72" required="" value="1"></td>
        <td><input type="radio" name="preg72" required="" value="2"></td>
        <td><input type="radio" name="preg72" required="" value="3"></td>
        <td><input type="radio" name="preg72" required="" value="4"></td>
      </tr>
       <tr>
        <td>73</td>
        <td>Algunos compañeros de trabajo me escuchan cuando tengo problemas</td>
        <td><input type="radio" name="preg73" required="" value="0"></td>
        <td><input type="radio" name="preg73" required="" value="1"></td>
        <td><input type="radio" name="preg73" required="" value="2"></td>
        <td><input type="radio" name="preg73" required="" value="3"></td>
        <td><input type="radio" name="preg73" required="" value="4"></td>
      </tr>
       <tr>
        <td>74</td>
        <td>Me informan sobre lo que hago bien en mi trabajo</td>
        <td><input type="radio" name="preg74" required="" value="0"></td>
        <td><input type="radio" name="preg74" required="" value="1"></td>
        <td><input type="radio" name="preg74" required="" value="2"></td>
        <td><input type="radio" name="preg74" required="" value="3"></td>
        <td><input type="radio" name="preg74" required="" value="4"></td>
      </tr>
       <tr>
        <td>75</td>
        <td>Me informan sobre lo que debo mejorar en mi trabajo</td>
        <td><input type="radio" name="preg75" required="" value="0"></td>
        <td><input type="radio" name="preg75" required="" value="1"></td>
        <td><input type="radio" name="preg75" required="" value="2"></td>
        <td><input type="radio" name="preg75" required="" value="3"></td>
        <td><input type="radio" name="preg75" required="" value="4"></td>
      </tr>
       <tr>
        <td>76</td>
        <td>La información que recibo sobre mi rendimiento en el trabajo es clara</td>
        <td><input type="radio" name="preg76" required="" value="0"></td>
        <td><input type="radio" name="preg76" required="" value="1"></td>
        <td><input type="radio" name="preg76" required="" value="2"></td>
        <td><input type="radio" name="preg76" required="" value="3"></td>
        <td><input type="radio" name="preg76" required="" value="4"></td>
      </tr>
       <tr>
        <td>77</td>
        <td>La forma como evalúan mi trabajo en la empresa me ayuda a mejorar</td>
        <td><input type="radio" name="preg77" required="" value="0"></td>
        <td><input type="radio" name="preg77" required="" value="1"></td>
        <td><input type="radio" name="preg77" required="" value="2"></td>
        <td><input type="radio" name="preg77" required="" value="3"></td>
        <td><input type="radio" name="preg77" required="" value="4"></td>
      </tr>
       <tr>
        <td>78</td>
        <td>Me informan a tiempo sobre lo que debo mejorar en el trabajo</td>
        <td><input type="radio" name="preg78" required="" value="0"></td>
        <td><input type="radio" name="preg78" required="" value="1"></td>
        <td><input type="radio" name="preg78" required="" value="2"></td>
        <td><input type="radio" name="preg78" required="" value="3"></td>
        <td><input type="radio" name="preg78" required="" value="4"></td>
      </tr>
       <tr>
        <td>79</td>
        <td>En la empresa me pagan a tiempo mi salario</td>
        <td><input type="radio" name="preg79" required="" value="0"></td>
        <td><input type="radio" name="preg79" required="" value="1"></td>
        <td><input type="radio" name="preg79" required="" value="2"></td>
        <td><input type="radio" name="preg79" required="" value="3"></td>
        <td><input type="radio" name="preg79" required="" value="4"></td>
      </tr>
       <tr>
        <td>80</td>
        <td>El pago que recibo es el que me ofreció la empresa</td>
        <td><input type="radio" name="preg80" required="" value="4"></td>
        <td><input type="radio" name="preg80" required="" value="3"></td>
        <td><input type="radio" name="preg80" required="" value="2"></td>
        <td><input type="radio" name="preg80" required="" value="1"></td>
        <td><input type="radio" name="preg80" required="" value="0"></td>
      </tr>
      <tr>
        <td>81</td>
        <td>El pago que recibo es el que merezco por el trabajo que realizo</td>
        <td><input type="radio" name="preg81" required="" value="0"></td>
        <td><input type="radio" name="preg81" required="" value="1"></td>
        <td><input type="radio" name="preg81" required="" value="2"></td>
        <td><input type="radio" name="preg81" required="" value="3"></td>
        <td><input type="radio" name="preg81" required="" value="4"></td>
      </tr>
      <tr>
        <td>82</td>
        <td>En mi trabajo tengo posibilidades de progresar</td>
        <td><input type="radio" name="preg82" required="" value="0"></td>
        <td><input type="radio" name="preg82" required="" value="1"></td>
        <td><input type="radio" name="preg82" required="" value="2"></td>
        <td><input type="radio" name="preg82" required="" value="3"></td>
        <td><input type="radio" name="preg82" required="" value="4"></td>
      </tr>
      <tr>
        <td>83</td>
        <td>Las personas que hacen bien el trabajo pueden progresar en la empresa</td>
        <td><input type="radio" name="preg83" required="" value="0"></td>
        <td><input type="radio" name="preg83" required="" value="1"></td>
        <td><input type="radio" name="preg83" required="" value="2"></td>
        <td><input type="radio" name="preg83" required="" value="3"></td>
        <td><input type="radio" name="preg83" required="" value="4"></td>
      </tr>
      <tr>
        <td>84</td>
        <td>La empresa se preocupa por el bienestar de los trabajadores</td>
        <td><input type="radio" name="preg84" required="" value="0"></td>
        <td><input type="radio" name="preg84" required="" value="1"></td>
        <td><input type="radio" name="preg84" required="" value="2"></td>
        <td><input type="radio" name="preg84" required="" value="3"></td>
        <td><input type="radio" name="preg84" required="" value="4"></td>
      </tr>
      <tr>
        <td>85</td>
        <td>Mi trabajo en la empresa es estable</td>
        <td><input type="radio" name="preg85" required="" value="0"></td>
        <td><input type="radio" name="preg85" required="" value="1"></td>
        <td><input type="radio" name="preg85" required="" value="2"></td>
        <td><input type="radio" name="preg85" required="" value="3"></td>
        <td><input type="radio" name="preg85" required="" value="4"></td>
      </tr>
      <tr>
        <td>86</td>
        <td>El trabajo que hago me hace sentir bien</td>
        <td><input type="radio" name="preg86" required="" value="0"></td>
        <td><input type="radio" name="preg86" required="" value="1"></td>
        <td><input type="radio" name="preg86" required="" value="2"></td>
        <td><input type="radio" name="preg86" required="" value="3"></td>
        <td><input type="radio" name="preg86" required="" value="4"></td>
      </tr>
      <tr>
        <td>87</td>
        <td>Siento orgullo de trabajar en esta empresa</td>
        <td><input type="radio" name="preg87" required="" value="0"></td>
        <td><input type="radio" name="preg87" required="" value="1"></td>
        <td><input type="radio" name="preg87" required="" value="2"></td>
        <td><input type="radio" name="preg87" required="" value="3"></td>
        <td><input type="radio" name="preg87" required="" value="4"></td>
      </tr>
      <tr>
        <td>88</td>
        <td>Hablo bien de la empresa con otras personas</td>
        <td><input type="radio" name="preg88" required="" value="0"></td>
        <td><input type="radio" name="preg88" required="" value="1"></td>
        <td><input type="radio" name="preg88" required="" value="2"></td>
        <td><input type="radio" name="preg88" required="" value="3"></td>
        <td><input type="radio" name="preg88" required="" value="4"></td>
      </tr>
    </tbody>
   </table>
   <input type="hidden" name="idempleado" value="<?php echo $idempl ?>">
   <hr>
   <div class="text-center">
     <button style="font-size: 1.9rem;" type="submit" class="btn btn-success"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Guardar y continuar</button>
   </div>      
  </form> 
</div>
<br><br>
<br><br>
<br><br><br><br><br>
</body>
</html>
<?php
}else{  
  exit();
}
?>

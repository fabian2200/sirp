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
  <h2 style="color: #224abe !important; font-weight: bold; width: 100%; text-align: center;">Cuestionario Intralaboral Forma A</h2> 
  <hr>
  <form method="POST" action="../acciones/guardar_intraa_p1.php">
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
        <td>1</td>
        <td>El ruido en el lugar donde trabajo es molesto</td>
        <td><input type="radio" name="preg1" required="" value="4"></td>
        <td><input type="radio" name="preg1" required="" value="3"></td>
        <td><input type="radio" name="preg1" required="" value="2"></td>
        <td><input type="radio" name="preg1" required="" value="1"></td>
        <td><input type="radio" name="preg1" required="" value="0"></td>
      </tr>
       <tr>
        <td>2</td>
        <td>En el lugar donde trabajo hace mucho frío</td>
        <td><input type="radio" name="preg2" required="" value="4"></td>
        <td><input type="radio" name="preg2" required="" value="3"></td>
        <td><input type="radio" name="preg2" required="" value="2"></td>
        <td><input type="radio" name="preg2" required="" value="1"></td>
        <td><input type="radio" name="preg2" required="" value="0"></td>
      </tr>
       <tr>
        <td>3</td>
        <td>En el lugar donde trabajo hace mucho calor</td>
        <td><input type="radio" name="preg3" required="" value="4"></td>
        <td><input type="radio" name="preg3" required="" value="3"></td>
        <td><input type="radio" name="preg3" required="" value="2"></td>
        <td><input type="radio" name="preg3" required="" value="1"></td>
        <td><input type="radio" name="preg3" required="" value="0"></td>
      </tr>
       <tr>
        <td>4</td>
        <td>El aire en el lugar donde trabajo es fresco y agradable</td>
        <td><input type="radio" name="preg4" required="" value="0"></td>
        <td><input type="radio" name="preg4" required="" value="1"></td>
        <td><input type="radio" name="preg4" required="" value="2"></td>
        <td><input type="radio" name="preg4" required="" value="3"></td>
        <td><input type="radio" name="preg4" required="" value="4"></td>
      </tr>
      <tr>
        <td>5</td>
        <td>La luz del sitio donde trabajo es agradable</td>
        <td><input type="radio" name="preg5" required="" value="0"></td>
        <td><input type="radio" name="preg5" required="" value="1"></td>
        <td><input type="radio" name="preg5" required="" value="2"></td>
        <td><input type="radio" name="preg5" required="" value="3"></td>
        <td><input type="radio" name="preg5" required="" value="4"></td>
      </tr>
      <tr>
        <td>6</td>
        <td>El espacio donde trabajo es cómodo</td>
        <td><input type="radio" name="preg6" required="" value="0"></td>
        <td><input type="radio" name="preg6" required="" value="1"></td>
        <td><input type="radio" name="preg6" required="" value="2"></td>
        <td><input type="radio" name="preg6" required="" value="3"></td>
        <td><input type="radio" name="preg6" required="" value="4"></td>
      </tr>
      <tr>
        <td>7</td>
        <td>En mi trabajo me preocupa estar expuesto a sustancias químicas que afecten mi salud</td>
        <td><input type="radio" name="preg7" required="" value="4"></td>
        <td><input type="radio" name="preg7" required="" value="3"></td>
        <td><input type="radio" name="preg7" required="" value="2"></td>
        <td><input type="radio" name="preg7" required="" value="1"></td>
        <td><input type="radio" name="preg7" required="" value="0"></td>
      </tr>
      <tr>
        <td>8</td>
        <td>Mi trabajo me exige hacer mucho esfuerzo físico</td>
        <td><input type="radio" name="preg8" required="" value="4"></td>
        <td><input type="radio" name="preg8" required="" value="3"></td>
        <td><input type="radio" name="preg8" required="" value="2"></td>
        <td><input type="radio" name="preg8" required="" value="1"></td>
        <td><input type="radio" name="preg8" required="" value="0"></td>
      </tr>
       <tr>
        <td>9</td>
        <td>Los equipos o herramientas con los que trabajo son cómodos</td>
        <td><input type="radio" name="preg9" required="" value="0"></td>
        <td><input type="radio" name="preg9" required="" value="1"></td>
        <td><input type="radio" name="preg9" required="" value="2"></td>
        <td><input type="radio" name="preg9" required="" value="3"></td>
        <td><input type="radio" name="preg9" required="" value="4"></td>
      </tr>
      <tr>
        <td>10</td>
        <td>En mi trabajo me preocupa estar expuesto a microbios, animales o plantas que afecten mi salud</td>
        <td><input type="radio" name="preg10" required="" value="4"></td>
        <td><input type="radio" name="preg10" required="" value="3"></td>
        <td><input type="radio" name="preg10" required="" value="2"></td>
        <td><input type="radio" name="preg10" required="" value="1"></td>
        <td><input type="radio" name="preg10" required="" value="0"></td>
      </tr>
      <tr>
        <td>11</td>
        <td>Me preocupa accidentarme en mi trabajo</td>
        <td><input type="radio" name="preg11" required="" value="4"></td>
        <td><input type="radio" name="preg11" required="" value="3"></td>
        <td><input type="radio" name="preg11" required="" value="2"></td>
        <td><input type="radio" name="preg11" required="" value="1"></td>
        <td><input type="radio" name="preg11" required="" value="0"></td>
      </tr>
       <tr>
        <td>12</td>
        <td>El lugar donde trabajo es limpio y ordenado</td>
        <td><input type="radio" name="preg12" required="" value="0"></td>
        <td><input type="radio" name="preg12" required="" value="1"></td>
        <td><input type="radio" name="preg12" required="" value="2"></td>
        <td><input type="radio" name="preg12" required="" value="3"></td>
        <td><input type="radio" name="preg12" required="" value="4"></td>
      </tr>
       <tr>
        <td>13</td>
        <td>Por la cantidad de trabajo que tengo debo quedarme tiempo adicional</td>
        <td><input type="radio" name="preg13" required="" value="4"></td>
        <td><input type="radio" name="preg13" required="" value="3"></td>
        <td><input type="radio" name="preg13" required="" value="2"></td>
        <td><input type="radio" name="preg13" required="" value="1"></td>
        <td><input type="radio" name="preg13" required="" value="0"></td>
      </tr>
       <tr>
        <td>14</td>
        <td>Me alcanza el tiempo de trabajo para tener al día mis deberes</td>
        <td><input type="radio" name="preg14" required="" value="0"></td>
        <td><input type="radio" name="preg14" required="" value="1"></td>
        <td><input type="radio" name="preg14" required="" value="2"></td>
        <td><input type="radio" name="preg14" required="" value="3"></td>
        <td><input type="radio" name="preg14" required="" value="4"></td>
      </tr>
       <tr>
        <td>15</td>
        <td>Por la cantidad de trabajo que tengo debo trabajar sin parar</td>
        <td><input type="radio" name="preg15" required="" value="4"></td>
        <td><input type="radio" name="preg15" required="" value="3"></td>
        <td><input type="radio" name="preg15" required="" value="2"></td>
        <td><input type="radio" name="preg15" required="" value="1"></td>
        <td><input type="radio" name="preg15" required="" value="0"></td>
      </tr>
       <tr>
        <td>16</td>
        <td>Mi trabajo me exige hacer mucho esfuerzo mental</td>
        <td><input type="radio" name="preg16" required="" value="4"></td>
        <td><input type="radio" name="preg16" required="" value="3"></td>
        <td><input type="radio" name="preg16" required="" value="2"></td>
        <td><input type="radio" name="preg16" required="" value="1"></td>
        <td><input type="radio" name="preg16" required="" value="0"></td>
      </tr>
       <tr>
        <td>17</td>
        <td>Mi trabajo me exige estar muy concentrado</td>
        <td><input type="radio" name="preg17" required="" value="4"></td>
        <td><input type="radio" name="preg17" required="" value="3"></td>
        <td><input type="radio" name="preg17" required="" value="2"></td>
        <td><input type="radio" name="preg17" required="" value="1"></td>
        <td><input type="radio" name="preg17" required="" value="0"></td>
      </tr>
       <tr>
        <td>18</td>
        <td>Mi trabajo me exige memorizar mucha información</td>
        <td><input type="radio" name="preg18" required="" value="4"></td>
        <td><input type="radio" name="preg18" required="" value="3"></td>
        <td><input type="radio" name="preg18" required="" value="2"></td>
        <td><input type="radio" name="preg18" required="" value="1"></td>
        <td><input type="radio" name="preg18" required="" value="0"></td>
      </tr>
       <tr>
        <td>19</td>
        <td>En mi trabajo tengo que tomar decisiones difíciles muy rápido</td>
        <td><input type="radio" name="preg19" required="" value="4"></td>
        <td><input type="radio" name="preg19" required="" value="3"></td>
        <td><input type="radio" name="preg19" required="" value="2"></td>
        <td><input type="radio" name="preg19" required="" value="1"></td>
        <td><input type="radio" name="preg19" required="" value="0"></td>
      </tr>
       <tr>
        <td>20</td>
        <td>Mi trabajo me exige atender a muchos asuntos al mismo tiempo</td>
        <td><input type="radio" name="preg20" required="" value="4"></td>
        <td><input type="radio" name="preg20" required="" value="3"></td>
        <td><input type="radio" name="preg20" required="" value="2"></td>
        <td><input type="radio" name="preg20" required="" value="1"></td>
        <td><input type="radio" name="preg20" required="" value="0"></td>
      </tr>
      <tr>
        <td>21</td>
        <td>Mi trabajo requiere que me fije en pequeños detalles</td>
        <td><input type="radio" name="preg21" required="" value="4"></td>
        <td><input type="radio" name="preg21" required="" value="3"></td>
        <td><input type="radio" name="preg21" required="" value="2"></td>
        <td><input type="radio" name="preg21" required="" value="1"></td>
        <td><input type="radio" name="preg21" required="" value="0"></td>
      </tr>
      <tr>
        <td>22</td>
        <td>Mi trabajo requiere que me fije en pequeños detalles</td>
        <td><input type="radio" name="preg22" required="" value="4"></td>
        <td><input type="radio" name="preg22" required="" value="3"></td>
        <td><input type="radio" name="preg22" required="" value="2"></td>
        <td><input type="radio" name="preg22" required="" value="1"></td>
        <td><input type="radio" name="preg22" required="" value="0"></td>
      </tr>
      <tr>
        <td>23</td>
        <td>En mi trabajo respondo por dinero de la empresa</td>
        <td><input type="radio" name="preg23" required="" value="4"></td>
        <td><input type="radio" name="preg23" required="" value="3"></td>
        <td><input type="radio" name="preg23" required="" value="2"></td>
        <td><input type="radio" name="preg23" required="" value="1"></td>
        <td><input type="radio" name="preg23" required="" value="0"></td>
      </tr>
      <tr>
        <td>24</td>
        <td>Como parte de mis funciones debo responder por la seguridad de otros</td>
        <td><input type="radio" name="preg24" required="" value="4"></td>
        <td><input type="radio" name="preg24" required="" value="3"></td>
        <td><input type="radio" name="preg24" required="" value="2"></td>
        <td><input type="radio" name="preg24" required="" value="1"></td>
        <td><input type="radio" name="preg24" required="" value="0"></td>
      </tr>
      <tr>
        <td>25</td>
        <td>Respondo ante mi jefe por los resultados de toda mi área de trabajo</td>
        <td><input type="radio" name="preg25" required="" value="4"></td>
        <td><input type="radio" name="preg25" required="" value="3"></td>
        <td><input type="radio" name="preg25" required="" value="2"></td>
        <td><input type="radio" name="preg25" required="" value="1"></td>
        <td><input type="radio" name="preg25" required="" value="0"></td>
      </tr>
      <tr>
        <td>26</td>
        <td>Mi trabajo me exige cuidar la salud de otras personas</td>
        <td><input type="radio" name="preg26" required="" value="4"></td>
        <td><input type="radio" name="preg26" required="" value="3"></td>
        <td><input type="radio" name="preg26" required="" value="2"></td>
        <td><input type="radio" name="preg26" required="" value="1"></td>
        <td><input type="radio" name="preg26" required="" value="0"></td>
      </tr>
      <tr>
        <td>27</td>
        <td>En mi trabajo me dan órdenes contradictorias</td>
        <td><input type="radio" name="preg27" required="" value="4"></td>
        <td><input type="radio" name="preg27" required="" value="3"></td>
        <td><input type="radio" name="preg27" required="" value="2"></td>
        <td><input type="radio" name="preg27" required="" value="1"></td>
        <td><input type="radio" name="preg27" required="" value="0"></td>
      </tr>
      <tr>
        <td>28</td>
        <td>En mi trabajo me piden hacer cosas innecesarias</td>
        <td><input type="radio" name="preg28" required="" value="4"></td>
        <td><input type="radio" name="preg28" required="" value="3"></td>
        <td><input type="radio" name="preg28" required="" value="2"></td>
        <td><input type="radio" name="preg28" required="" value="1"></td>
        <td><input type="radio" name="preg28" required="" value="0"></td>
      </tr>
      <tr>
        <td>29</td>
        <td>En mi trabajo se presentan situaciones en las que debo pasar por alto normas o procedimientos</td>
        <td><input type="radio" name="preg29" required="" value="4"></td>
        <td><input type="radio" name="preg29" required="" value="3"></td>
        <td><input type="radio" name="preg29" required="" value="2"></td>
        <td><input type="radio" name="preg29" required="" value="1"></td>
        <td><input type="radio" name="preg29" required="" value="0"></td>
      </tr>
      <tr>
        <td>30</td>
        <td>En mi trabajo tengo que hacer  cosas que se podrian hacer de una forma más práctica</td>
        <td><input type="radio" name="preg30" required="" value="4"></td>
        <td><input type="radio" name="preg30" required="" value="3"></td>
        <td><input type="radio" name="preg30" required="" value="2"></td>
        <td><input type="radio" name="preg30" required="" value="1"></td>
        <td><input type="radio" name="preg30" required="" value="0"></td>
      </tr>
      <tr>
        <td>31</td>
        <td>Trabajo en horario de noche</td>
        <td><input type="radio" name="preg31" required="" value="4"></td>
        <td><input type="radio" name="preg31" required="" value="3"></td>
        <td><input type="radio" name="preg31" required="" value="2"></td>
        <td><input type="radio" name="preg31" required="" value="1"></td>
        <td><input type="radio" name="preg31" required="" value="0"></td>
      </tr>
      <tr>
        <td>32</td>
        <td>En mi trabajo es posible tomar pausas para descansar</td>
        <td><input type="radio" name="preg32" required="" value="4"></td>
        <td><input type="radio" name="preg32" required="" value="3"></td>
        <td><input type="radio" name="preg32" required="" value="2"></td>
        <td><input type="radio" name="preg32" required="" value="1"></td>
        <td><input type="radio" name="preg32" required="" value="0"></td>
      </tr>
      <tr>
        <td>33</td>
        <td>Mi trabajo me exige laborar en días de descanso, festivos o fines de semana</td>
        <td><input type="radio" name="preg33" required="" value="4"></td>
        <td><input type="radio" name="preg33" required="" value="3"></td>
        <td><input type="radio" name="preg33" required="" value="2"></td>
        <td><input type="radio" name="preg33" required="" value="1"></td>
        <td><input type="radio" name="preg33" required="" value="0"></td>
      </tr>
      <tr>
        <td>34</td>
        <td>En mi trabajo puedo tomar fines de semana o días de descanso al mes</td>
        <td><input type="radio" name="preg34" required="" value="0"></td>
        <td><input type="radio" name="preg34" required="" value="1"></td>
        <td><input type="radio" name="preg34" required="" value="2"></td>
        <td><input type="radio" name="preg34" required="" value="3"></td>
        <td><input type="radio" name="preg34" required="" value="4"></td>
      </tr>
      <tr>
        <td>35</td>
        <td>Cuando estoy en casa sigo pensando en el trabajo</td>
        <td><input type="radio" name="preg35" required="" value="4"></td>
        <td><input type="radio" name="preg35" required="" value="3"></td>
        <td><input type="radio" name="preg35" required="" value="2"></td>
        <td><input type="radio" name="preg35" required="" value="1"></td>
        <td><input type="radio" name="preg35" required="" value="0"></td>
      </tr>
      <tr>
        <td>36</td>
        <td>Discuto con mi familia o amigos por cuasa de mi trabajo </td>
        <td><input type="radio" name="preg36" required="" value="4"></td>
        <td><input type="radio" name="preg36" required="" value="3"></td>
        <td><input type="radio" name="preg36" required="" value="2"></td>
        <td><input type="radio" name="preg36" required="" value="1"></td>
        <td><input type="radio" name="preg36" required="" value="0"></td>
      </tr>
      <tr>
        <td>37</td>
        <td>Debo atender asuntos de trabajo cuando estoy en casa</td>
        <td><input type="radio" name="preg37" required="" value="4"></td>
        <td><input type="radio" name="preg37" required="" value="3"></td>
        <td><input type="radio" name="preg37" required="" value="2"></td>
        <td><input type="radio" name="preg37" required="" value="1"></td>
        <td><input type="radio" name="preg37" required="" value="0"></td>
      </tr>
      <tr>
        <td>38</td>
        <td>Por mi trabajo el tiempo que paso con mi familia y amigos es muy poco</td>
        <td><input type="radio" name="preg38" required="" value="4"></td>
        <td><input type="radio" name="preg38" required="" value="3"></td>
        <td><input type="radio" name="preg38" required="" value="2"></td>
        <td><input type="radio" name="preg38" required="" value="1"></td>
        <td><input type="radio" name="preg38" required="" value="0"></td>
      </tr>
      <tr>
        <td>39</td>
        <td>Mi trabajo me permite desarrollar mis habilidades</td>
        <td><input type="radio" name="preg39" required="" value="0"></td>
        <td><input type="radio" name="preg39" required="" value="1"></td>
        <td><input type="radio" name="preg39" required="" value="2"></td>
        <td><input type="radio" name="preg39" required="" value="3"></td>
        <td><input type="radio" name="preg39" required="" value="4"></td>
      </tr>
      <tr>
        <td>40</td>
        <td>Mi trabajo me permite aplicar mis conocimientos</td>
        <td><input type="radio" name="preg40" required="" value="0"></td>
        <td><input type="radio" name="preg40" required="" value="1"></td>
        <td><input type="radio" name="preg40" required="" value="2"></td>
        <td><input type="radio" name="preg40" required="" value="3"></td>
        <td><input type="radio" name="preg40" required="" value="4"></td>
      </tr>
      <tr>
        <td>41</td>
        <td>Mi trabajo me permite aprender nuevas cosas</td>
        <td><input type="radio" name="preg41" required="" value="0"></td>
        <td><input type="radio" name="preg41" required="" value="1"></td>
        <td><input type="radio" name="preg41" required="" value="2"></td>
        <td><input type="radio" name="preg41" required="" value="3"></td>
        <td><input type="radio" name="preg41" required="" value="4"></td>
      </tr>
       <tr>
        <td>42</td>
        <td>Me asignan el trabajo teniendo en cuenta mis capacidades</td>
        <td><input type="radio" name="preg42" required="" value="0"></td>
        <td><input type="radio" name="preg42" required="" value="1"></td>
        <td><input type="radio" name="preg42" required="" value="2"></td>
        <td><input type="radio" name="preg42" required="" value="3"></td>
        <td><input type="radio" name="preg42" required="" value="4"></td>
      </tr>
       <tr>
        <td>43</td>
        <td>Puedo tomar pausas cuando las necesito</td>
        <td><input type="radio" name="preg43" required="" value="0"></td>
        <td><input type="radio" name="preg43" required="" value="1"></td>
        <td><input type="radio" name="preg43" required="" value="2"></td>
        <td><input type="radio" name="preg43" required="" value="3"></td>
        <td><input type="radio" name="preg43" required="" value="4"></td>
      </tr>
       <tr>
        <td>44</td>
        <td>Puedo decidir cuánto trabajo hago en el día</td>
        <td><input type="radio" name="preg44" required="" value="0"></td>
        <td><input type="radio" name="preg44" required="" value="1"></td>
        <td><input type="radio" name="preg44" required="" value="2"></td>
        <td><input type="radio" name="preg44" required="" value="3"></td>
        <td><input type="radio" name="preg44" required="" value="4"></td>
      </tr>
       <tr>
        <td>45</td>
        <td>Puedo decidir la velocidad  a la que trabajo</td>
        <td><input type="radio" name="preg45" required="" value="0"></td>
        <td><input type="radio" name="preg45" required="" value="1"></td>
        <td><input type="radio" name="preg45" required="" value="2"></td>
        <td><input type="radio" name="preg45" required="" value="3"></td>
        <td><input type="radio" name="preg45" required="" value="4"></td>
      </tr>
       <tr>
        <td>46</td>
        <td>Puedo cambiar el orden de las actividades en mi trabajo</td>
        <td><input type="radio" name="preg46" required="" value="0"></td>
        <td><input type="radio" name="preg46" required="" value="1"></td>
        <td><input type="radio" name="preg46" required="" value="2"></td>
        <td><input type="radio" name="preg46" required="" value="3"></td>
        <td><input type="radio" name="preg46" required="" value="4"></td>
      </tr>
       <tr>
        <td>47</td>
        <td>Puedo parar un momento mi trabajo para atender algún asunto personal</td>
        <td><input type="radio" name="preg47" required="" value="0"></td>
        <td><input type="radio" name="preg47" required="" value="1"></td>
        <td><input type="radio" name="preg47" required="" value="2"></td>
        <td><input type="radio" name="preg47" required="" value="3"></td>
        <td><input type="radio" name="preg47" required="" value="4"></td>
      </tr>
       <tr>
        <td>48</td>
        <td>Los cambios en mi trabajo han sido beneficiosos</td>
        <td><input type="radio" name="preg48" required="" value="0"></td>
        <td><input type="radio" name="preg48" required="" value="1"></td>
        <td><input type="radio" name="preg48" required="" value="2"></td>
        <td><input type="radio" name="preg48" required="" value="3"></td>
        <td><input type="radio" name="preg48" required="" value="4"></td>
      </tr>
       <tr>
        <td>49</td>
        <td>Me explican claramente los cambios que ocurren en mi trabajo</td>
        <td><input type="radio" name="preg49" required="" value="0"></td>
        <td><input type="radio" name="preg49" required="" value="1"></td>
        <td><input type="radio" name="preg49" required="" value="2"></td>
        <td><input type="radio" name="preg49" required="" value="3"></td>
        <td><input type="radio" name="preg49" required="" value="4"></td>
      </tr>
      <tr>
        <td>50</td>
        <td>Puedo dar sugerencias sobre los cambios que ocurren en mi trabajo</td>
        <td><input type="radio" name="preg50" required="" value="0"></td>
        <td><input type="radio" name="preg50" required="" value="1"></td>
        <td><input type="radio" name="preg50" required="" value="2"></td>
        <td><input type="radio" name="preg50" required="" value="3"></td>
        <td><input type="radio" name="preg50" required="" value="4"></td>
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
</body>
</html>
<?php
}else{  
  header("Location: ../index.php");
  exit();
}
?>

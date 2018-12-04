<?php 
  
  include('session.php');
  
  if(isset($_SESSION['usuario'])){
    $nombreSesion = $_SESSION['usuario'];
    $rol = $_SESSION['rol'];
    $sesion = 1;
  }else{
    $sesion = 0;
  }

  if(isset($_SESSION['usuario'])){
    $now = time();
    if($now > $_SESSION['expire']){
      session_destroy();
    }
  }
?>

<!DOCTYPE html>
<html lang="es">
  <head>
  	<title>Empleado</title>
    <!-- Para tildes y acentos -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Michroma" rel="stylesheet">
    <link rel="stylesheet" href="design.css" type="text/css">
  
  </head>
  <body class='detalles'>

  <!--Se centra el titulo y se concatena con la imagen de la casa,(permite
  volver al menu de inicio) posicionandola al lado derecho-->
    <h1 class='detalles'>
      <br>Empleado</br>
    </h1>

<?php

  if($sesion==1){

    if (strcmp($rol,'Admin')==0){
      // Futuramente incluir en nombre de sesión un enlace al panel de control
      echo"<p class='log'> 
        <br>Has iniciado sesión como <b>$nombreSesion</b> ($rol)
      <p>";
    }else{
      echo"<p class='log'> 
        <br>Has iniciado sesión como <b>$nombreSesion</b>
      <p>";
    }
    
  }else{
    echo"<p class='log'> 
        <br>Has iniciado sesión como <b>Invitado</b> 
    <p>";
  }

  // Conexión a la base de datos -----------------------------------------------

  // Realizamos la conexión a la base de datos
  require_once('functions.php');
  // Creamos un objeto para llamar a las consultas
  $qo = new empQueries();
  // Realizamos la conexión con la base de datos
  if(empty($qo->dbc)){
    echo "<h3 align='center'>¡Error!: No se pudo establecer la conexión con la
    base de datos.</h3><br/>";
    die();
  }

  $dniEmp = $_GET["dni"];
  $emp = $qo->getEmp($dniEmp);  
  $cert = $qo->cert2Array($emp['certificaciones']);
  $loc = $qo->loc2String($emp['localidad']);
  $rutaImagen = "./empleados/".$emp["imagen"];


  // Muestra de datos ----------------------------------------------------------

  // Creamos la estructura que debe de tener la tabla
echo "<h3 class='detalles'> <br><br>Detalles del empleado</br></br><br></h3>"; 

  // Realizamos una petición para obtener un array con todos los empleados


echo 
"<table class='detalles'>
  <tr class='detalles'>
    <th class='detalles' >Imagen</th>
    <th class='detalles' colspan='2'>Detalles</th>
  </tr>

  <tr class='detalles'> 
    <td class='detalles'> </td>
    <td class='detalles'> </td>
    <td class='detalles'> </td>
  </tr>

  <tr class='detalles'>
    <td id='imagen' rowspan='11'><img src=$rutaImagen width=150 height=150></img></td>
    <td class='detalles'><b>Nombre completo<b></td>
    <td class='detalles'>$emp[nombreCompleto]</td>
  </tr>

  <tr class='detalles'>
    <td class='detalles'><b>DNI</b></td>
    <td class='detalles'>$emp[dni]</td>
  </tr>
  <tr class='detalles'>
    <td class='detalles'><b>Sexo</b></td>
    <td class='detalles'>$emp[sexo]</td>
  </tr>
  <tr class='detalles'>
    <td class='detalles'><b>Fecha de nacimiento</b></td>
    <td class='detalles'>$emp[fechaNacimiento]</td>
  </tr>
  <tr class='detalles'>
    <td class='detalles'><b>Localidad</b></td>
    <td class='detalles'>$loc</td>
  </tr>
  <tr class='detalles'>
    <td class='detalles'><b>Telefono</b></td>
    <td class='detalles'>$emp[telefono]</td>
  </tr>
  <tr class='detalles'>
    <td class='detalles'><b>Email</b></td>
    <td class='detalles'>$emp[email]</td>
  </tr>
  <tr class='detalles'>
    <td class='detalles'><b>Estudios superiores</b></td>
    <td class='detalles'>$emp[estudiosSuperiores]</td>
  </tr>
  <tr class='detalles'>
    <td class='detalles'><b>Certificaciones</b></td>
    <td class='detalles'>$cert</td>
  </tr>
  <tr class='detalles'>
    <td class='detalles'><b>Situación laboral</b></td>
    <td class='detalles'>$emp[situacionLaboral]</td>
  </tr>
  <tr class='detalles'>
    <td class='detalles'></td>
    <td class='detalles' colspan='2'></td>
  </tr>


</table><br><br>

<a href='empleados.php'><p class='detalles'><img class='icons' src='pics/empleados.png'></p></a>";


?>

  </body>
</html>

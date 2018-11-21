<!DOCTYPE html>
<html lang="es">
  <head>
  	<title>Empleado</title>
    <!-- Para tildes y acentos -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  </head>
  <body bgcolor="#CFE1D6">

  <!--Se centra el titulo y se concatena con la imagen de la casa,(permite
  volver al menu de inicio) posicionandola al lado derecho-->
    <h1 align="center" style="background-color:#263238 ; color:#C2C2C2">
      Empleado
      <right>
        <a href="/web/empleados.php">
          <img src="/web/pics/home.ico"></img>
        </a>
      </right>
    </h1>

<?php

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

  // Muestra de datos ----------------------------------------------------------

  // Creamos la estructura que debe de tener la tabla
echo "<h3 align=center> Detalles del empleado </h3>
    <table  align=center cellpadding=8 cellspacing=2 bgcolor=#D3D3D4 class=list style=margin: 0 auto;>"; 

  // Realizamos una petición para obtener un array con todos los empleados
  $emp = $qo->getEmp($dniEmp);
  
  $cert = $qo->cert2Array($emp['certificaciones']);
  $loc = $qo->loc2String($emp['localidad']);

  $rutaImagen = "./empleados/".$emp["imagen"];



  // Mostramos el empleado que posee el DNI = $dni
  echo "<tr>
    <td bgcolor=#D3D3D4 class=list align=center><img src=$rutaImagen width=150 height=150></img></td>
    <td bgcolor=#D3D3D4 class=list align=center>
    <ul align=left>
      <li> Nombre completo: $emp[nombreCompleto]</li>
      <li>DNI: $emp[dni]</li>
      <li>Sexo: $emp[sexo]</li>
      <li>Fecha de nacimiento: $emp[fechaNacimiento]</li>
      <li>Localidad: $loc</li>
      <li>Telefono: $emp[telefono]</li>
      <li>E-mail: $emp[email]</li>
      <li>Estudios Superiores: $emp[estudiosSuperiores]</li>
      <li>Certificaciones: $cert</li>
      <li>Situacion Laboral: $emp[situacionLaboral]</li>
    </ul>
  </tr>";

  echo "</table>"; // Cerramos la tabla (linea 33 - <table align="center"  ... )

  // Añadir tambien celda con las certificaciones y la lógica correspondiente 


?>

  </body>
</html>

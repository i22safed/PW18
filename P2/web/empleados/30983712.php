<!DOCTYPE html>
<html lang="es">
  <head>
  	<title>Empleado</title>
    <!-- Para tildes y acentos -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  </head>
  <body>

  <!--Se centra el titulo y se concatena con la imagen de la casa,(permite
  volver al menu de inicio) posicionandola al lado derecho-->
    <h1 align="center" style="background-color:#263238 ; color:#C2C2C2">
      Empleado
      <right>
        <a href="/practicapw/empleados.php">
          <img src="/practicapw/pics/home.ico"></img>
        </a>
      </right>
    </h1>

<?php

  // Conexión a la base de datos -----------------------------------------------

  // Realizamos la conexión a la base de datos
  require_once('C:\xampp\htdocs\practicapw\functions.php');
  // Creamos un objeto para llamar a las consultas
  $qo = new empQueries();
  // Realizamos la conexión con la base de datos
  if(empty($qo->dbc)){
    echo "<h3 align='center'>¡Error!: No se pudo establecer la conexión con la
    base de datos.</h3><br/>";
    die();
  }

  // Muestra de datos ----------------------------------------------------------

  // Creamos la estructura que debe de tener la tabla
echo "<h3 align=center> Detalles del empleado </h3>
    <table align=center cellpadding=5 class=list style=margin: 0 auto;>
      <tr align=left class=list>
        <th class=list>Foto perfil</th>
        <th class=list>Nombre </th>
        <th class=list>DNI </th>
        <th class=list>Fecha nacimiento </th>
        <th class=list>Localidad </th>
        <th class=list>Telefono </th>
        <th class=list>Email </th>
        <th class=list>Estudios superiores</th>
        <th class=list>Situación laboral </th>
      </tr>";

  // Realizamos una petición para obtener un array con todos los empleados
  $emp = $qo->getEmp($_GET["dni"]);

  // Mostramos el empleado que posee el DNI = $dni
  echo "<tr align=left class=list>
    <td class=list>$emp[nombreCompleto]</td>
    <td class=list>$emp[dni]</td>
    <td class=list>$emp[fechaNacimiento]</td>
    <td class=list>$emp[localidad]</td>
    <td class=list>$emp[telefono]</td>
    <td class=list>$emp[email]</td>
    <td class=list>$emp[estudiosSuperiores]</td>
    <td class=list>$emp[situacionLaboral]</td>
  </tr>";

  echo "</table>"; // Cerramos la tabla (linea 33 - <table align="center"  ... )

?>

  </body>
</html>

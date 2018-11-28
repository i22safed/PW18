<?php 
  
  include('session.php');
  
  if(isset($_SESSION['usuario'])){
    echo "Sesión inciada como ".$_SESSION['usuario'];
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
  	<title>Empleados</title>
    <!-- Para tildes y acentos -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  </head>
  <body bgcolor="#CFE1D6">

  <!--Se centra el titulo y se concatena con la imagen de la casa,(permite
  volver al menu de inicio) posicionandola al lado derecho-->
    <h1 align="center" style="background-color:#263238 ; color:#C2C2C2">
      Lista de empleados
      <right>
        <a href="index.php">
          <img src="pics\home.ico"></img>
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

  $caca="&#xf019";
  // Muestra de datos ----------------------------------------------------------

  


  // Creamos la estructura que debe de tener la tabla
echo "<h3 align=center > Listado completo de empleados </h3>
    <p align=center> Insertar usuario <a href='insertar.php'> <img src=./pics/insertar.png width=15 height=15></img></a> </p> <br>";
    
    if ($sesion == 0){
      echo '<p align="center"><a href="log.php">Login </a><a href="reg.php">  Registrarse</a></p>';
    }else{
      echo '<p align="right"><a href="logout.php">Logout</a></p>';
    }
  
    echo "
    </br>
    <table align=center cellpadding=8 cellspacing=2 bgcolor=#BBD4C4 class=list style=margin: 0 auto;>
      <tr align=left class=list>
        <th class=list>Nombre </th>
        <th class=list>DNI </th>
        <th class=list>Email </th>
        <th class=lists>Detalles </th>
      </tr>";

  // Realizamos una petición para obtener un array con todos los empleados
  $emps = $qo->getAllEmp();
  $urlEmp;
  // Mostramos todos y cada uno de los empleados
  foreach($emps as $emp){

    $urlEmp = 'detalles.php?dni=' . urlencode($emp["dni"]);
    $urlEmpDel = 'confirmarEliminacion.php?dni=' . urlencode($emp["dni"]);
    $urlEmpEd = 'editar.php?dni=' . urlencode($emp["dni"]);

    echo "<tr align=left class=list>
      <td class=list>$emp[nombreCompleto]</td>
      <td class=list>$emp[dni]</td>
      <td class=list>$emp[email]</td>
      <td class=list align=center>
          <a href=$urlEmp title='Detalles del empleado'><img src=./pics/+info.png width=15 height=15></img></a>
          <a href=$urlEmpDel title='Borrar empleado'><img src=./pics/eliminar.png width=15 height=15></img></a>
          <a href=$urlEmpEd title='Editar empleado'><img src=./pics/editar.png width=15 height=15></img></a>
      </td>
    </tr>";
  }

  echo "</table>"; // Cerramos la tabla (linea 33 - <table align="center"  ... )

 echo " <br>
    <p align=center>
      
    </p>
  </br>";



?>

  </body>
</html>

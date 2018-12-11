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
  	<title>Empleados</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
    <link rel="stylesheet" href="design.css" type="text/css">
    <link rel="icon" href="src/favicon.ico" type="image/ico">
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Michroma" rel="stylesheet">
    
  </head>

  <body class="emp">

  <!--Se centra el titulo y se concatena con la imagen de la casa,(permite
  volver al menu de inicio) posicionandola al lado derecho-->
    <h1 class="emp">
      <br>Lista de empleados</br>
    </h1>

      <?php 
        if($sesion==1){

          if (strcmp($rol,'Admin')==0){
            // Futuramente incluir en nombre de sesión un enlace al panel de control
            echo"<p class='log'> 
              <br>Has iniciado sesión como <a href='control.php'><b>$nombreSesion</b></a> ($rol)
            <p>";
          }else{
            echo"<p class='log'> 
              <br>Has iniciado sesión como <a href='control.php'><b>$nombreSesion</b></a>
            <p>";
          }
          
        }else{
          echo"<p class='log'> 
              <br>Has iniciado sesión como <b>Invitado</b> 
          <p>";
        }
      ?>

    

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

  // Muestra de datos ----------------------------------------------------------

  // Creamos la estructura que debe de tener la tabla
echo "<h3 class='emp'><br></br>Listado completo de empleados<br><br></h3>";
    
echo '<table align="center"> <tr>';
if ($sesion == 0){
 
  echo '<p class="emp"> 
          <a href="log.php"> Login
            <img src="pics\login.png" class="icons"> </img>
          </a>
          <a href="reg.php"> Registrar
            <img src="pics\register.png" class="icons"></img>
          </a>
        </p>';

  }else{
  
  echo '<p class="emp">
          <a href="insertar.php">
            <img src="pics\insertar.png" class="icons">
              Insertar usuario    
          </a>      
          <a href="logout.php">
            <img src="pics\logout.png" class="icons">
              Logout
          </a>
        </p>';
}
    

echo"
    
    <br> 
    </br>
    <table class='emp'>
      <tr class='emp'>
        <th class='emp' id='th'>Nombre</th>
        <th class='emp'>DNI</th>
        <th class='emp'>Email</th>
        <th class='emp'>Detalles</th>
      </tr>";

  // Realizamos una petición para obtener un array con todos los empleados
  $emps = $qo->getAllEmp();
  $urlEmp;
  // Mostramos todos y cada uno de los empleados
  foreach($emps as $emp){

    $urlEmp = 'detalles.php?dni=' . urlencode($emp["dni"]);
    $urlEmpDel = 'confirmarEliminacion.php?dni=' . urlencode($emp["dni"]);
    $urlEmpEd = 'editar.php?dni=' . urlencode($emp["dni"]);

    echo "<tr class='emp'>
      <td class='emp' id='th'>$emp[nombreCompleto]</td>
      <td class='emp'>$emp[dni]</td>
      <td class='emp'>$emp[email]</td>
      <td class='emp'>
          <a href=$urlEmp title='Detalles del empleado'><img src=./pics/+info.png class='icons'></img></a>
          <a href=$urlEmpDel title='Eliminar empleado'><img src=./pics/eliminar.png class='icons'></img></a>
          <a href=$urlEmpEd title='Editar empleado'><img src=./pics/editar.png class='icons'></img></a>
      </td>
    </tr>";
  }

  echo "</table>"; 

  echo " <br> <br>
  <p class='emp'>
    <a href='index.php'>
      <img class='icons' src='pics/home.png'>    
    </a>
  </p>
  </br><br><br><br>";

?>

</body>

  <footer>
  
  </footer>
</html>

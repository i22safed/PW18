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
    <!-- Para acentos y tildes -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!--Establece el nombre la pestania-->
  	<title>Pr&aacutectica 4 - Programaci&oacuten Web</title>

        <!-- Para utilizar Roboto como fuente del body
          <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
          <style>
          body {
              font-family: 'Roboto';font-size: 22px;
          }
          </style>
        -->

  </head>

  <body bgcolor="#CFE1D6">

    <!--center, permite colocar en el centro el header-->
  	<h1 align="center" style="background-color:#263238; color:#C2C2C2">Empleados </h1>
  
    <!-- Enlace al registro y -->
    <?php
      if($sesion == 0){
        echo '<p align="right"><a  href="log.php">Login </a></p>
        <p align="right"><a  href="reg.php">Registrarse</a></p>';
      }else{
        echo '<p align="right"><a  href="logout.php">Logout</a></p>';
      }
    ?>
    
    
    <!--El enlace se crea antes de seleccionar la imagen.-->  
    <center><a href="empleados.php"> <img src="pics\empleados1.png" width=300 height=300 ></img></a></center>

  <!--align: permite centrar el texto y la tabla-->
  <p align="center">Si desea informacion sobre los empleados pinche en la imagen,
    <br>esta le redireccionara a un enlace con los trabajadores.</p>

  <p align="center">
          
  </p>


  </body>

</html>

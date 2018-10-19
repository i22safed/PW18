<!DOCTYPE html>
<html lang="es">
  <head>
  	<title>Insertar empleado</title>
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
  require_once('functions.php');
  // Creamos un objeto para llamar a las consultas
  $qo = new empQueries();
  // Realizamos la conexión con la base de datos
  if(empty($qo->dbc)){
    echo "<h3 align='center'>¡Error!: No se pudo establecer la conexión con la
    base de datos.</h3><br/>";
    die();
  }

?>


<!-- Comienzo del formulario para el registro de un usuario -->

<form method="POST" action="guardarInsercion.php">
    
    <br>Nombre:<br>
        <input type="text" name="nombre"><br>
    
    <br>Apellidos:<br>
        <input type="text" name="apellidos"><br>
    
    <br>DNI<br>
        <input type="text" name="DNI"><br>

    <br>Sexo<br>
        <input type="radio" name="sexo" value="male" checked> Male<br> 
        <input type="radio" name="sexo" value="female"> Female<br> 
        <input type="radio" name="sexo" value="other"> Other<br><br>
        
    <br>Estudios<br>
    
        <select id="idEstudios" name="idestudios">
            <option value="1"> Ninguno </option>
            <option value="2"> Basicos </option>
            <option value="3"> Superiores </option>
            <option value="4"> Doctorado </option>
        </select><br><br>

    <br>Certificaciones<br>
        <input type="checkbox" name="cert1" value="Amazon"> Amazon<br> 
        <input type="checkbox" name="cert2" value="Cisco"> Cisco<br>
        <input type="checkbox" name="cert3" value="Linux"> Linux<br> 
        <input type="checkbox" name="cert4" value="Java"> Java<br>
        <input type="checkbox" name="cert5" value="PL/SQL"> PL/SQL<br> 
        <input type="checkbox" name="cert6" value="La otra"> La otra<br>
        <input type="checkbox" name="cert7" value="Y la que queda"> .. Y la que queda<br> 
        

    <br>Situación laboral<br>
    
    <select id="idEstado" name="idestado">
            <option value="1"> Estudiante </option>
            <option value="2"> Activo </option>
            <option value="3"> Parado </option>
            <option value="4"> Jubilado </option>
        </select><br><br>

    <br>Email <br>
    <input type="text" name="correp"><br>
    <br>Localidad<br>
    <input type="text" name="localidad"><br>
    <br>Fecha de nacimiento<br>
    <input type="date" name="fechaNacimiento"><br>
    <br>Telefono<br>
    <input type="text" name="Telefono"><br>

    <input type="submit" value="Guardar"> 

</form>

    

  </body>
</html>
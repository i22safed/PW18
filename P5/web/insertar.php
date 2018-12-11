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

  if(!isset($_SESSION['usuario'])){
    header('Location: error.php?error=1');
  }else{

    if(strcmp($_SESSION['rol'],'Admin')!=0){
        header('Location: error.php?error=4');
    }
  }
?>


<!DOCTYPE html>
<html lang="es">
  <head>
  	<title>Insertar empleado</title>
    <!-- Para tildes y acentos -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="icon" href="src/favicon.ico" type="image/ico">
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Michroma" rel="stylesheet">
    <link rel="stylesheet" href="design.css" type="text/css">
  </head>
  <body class='insertar'>

    <!--Se centra el titulo y se concatena con la imagen de la casa,(permite
    volver al menu de inicio) posicionandola al lado derecho-->
    <h1 class='insertar'>
        <br>Empleado
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
        }
    ?>

    <h3 class='insertar'>
        <br><br>Inserte los datos del empleado en los campos<br><br><br> 
    </h3>


    <!-- Comienzo del formulario para el registro de un usuario -->
    <form method="POST" action="guardarInsercion.php">
    <table class='insertar'>

        <tr class='insertar'>
            <td class='insertar'></td>
            <td class='insertar'></td>
        </tr>

        <!-- Espacio inicial -->

        <tr class='insertar'>
            <td class='insertar'>Nombre</td>
            <td class='insertar'>
                <input class="input" type="text" name="nombre" placeholder="Escriba su nombre">
            </td>
        </tr>

        <tr class='insertar'>
            <td class='insertar'>Apellidos</td>
            <td class='insertar'>
                <input class="input" type="text" name="apellidos" placeholder="Escriba su apellidos">
            </td>
        </tr>
        <tr class='insertar'>
            <td class='insertar'>DNI</td>
            <td class='insertar'>
            <input class="input" type="text" maxlength="8" minlength="8" name="DNI" placeholder="Escriba su dni">
            </td>
        </tr>
        <tr class='insertar'>
            <td class='insertar'>Sexo</td>
            <td class='insertar'>
                    <input type="radio" name="sexo" value="Hombre" checked>Hombre
                    <input type="radio" name="sexo" value="Mujer"> Mujer
                    <input type="radio" name="sexo" value="Otro"> Otro 
            </td>
        </tr>
        <tr class='insertar'>
            <td class='insertar'>Estudios</td>
            <td class='insertar'>
            <select name="estudios">
                <option value="Ninguno"> Ninguno </option>
                <option value="Basicos"> Basicos </option>
                <option value="Superiores"> Superiores </option>
                <option value="Doctorado"> Doctorado </option>
            </select>
            </td>
        </tr>
        <tr class='insertar'>
            <td class='insertar' id='cabeceraCert'>Certificaciones<br><br><br><br></td>
            <td class='insertar'> 
                <table class='certificaciones'>
                    <tr class='certificaciones'>
                        <td class='certificaciones'><input type="checkbox" name="cert0" value="Amazon">  Amazon</td>
                        <td class='certificaciones'><input type="checkbox" name="cert1" value="Cisco">  Cisco</td>
                        <td class='certificaciones'><input type="checkbox" name="cert2" value="Linux">  Linux </td>
                    </tr>
                    <tr class='certificaciones'>
                        <td class='certificaciones'><input type="checkbox" name="cert3" value="Java">  Java</td>
                        <td class='certificaciones'><input type="checkbox" name="cert4" value="PL/SQL">  PL/SQL</td>
                        <td class='certificaciones'><input type="checkbox" name="cert5" value="La otra">  Qt </td>
                    </tr>
                    <tr>
                        <td class='certificaciones'><input type="checkbox" name="cert6" value="Y la que queda"> Ruby</td>
                        <td class='certificaciones'></td>
                        <td class='certificaciones'></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class='insertar'>
            <td class='insertar'>Situación laboral</td>
            <td class='insertar'>        
                <select name="sitLab">
                    <option value="Estudiante"> Estudiante </option>
                    <option value="Activo"> Activo </option>
                    <option value="Parado"> Parado </option>
                    <option value="Jubilado"> Jubilado </option>
                </select>
            </td>
        </tr>
        <tr>
            <td class='insertar'>Email</td>
            <td class='insertar'>
                <input class="input" type="email" name="correo" placeholder="Escriba su correo">
            </td>
        </tr>
        <tr class='insertar'>
            <td class='insertar'>Localidad</td>
            <td class='insertar'>
                <select name="localidad">
                    <option value="1"> Almeria </option>
                    <option value="2"> Cadiz </option>
                    <option value="3"> Cordoba </option>
                    <option value="4"> Granada </option>
                    <option value="5"> Sevilla </option>
                </select>
            </td>
        </tr>
        <tr class='insertar'>
            <td class='insertar'>Fecha de nacimiento</td>
            <td class='insertar'>
                <input class="input" type="date" name="fechaNacimiento">
            </td>
        </tr>
        <tr class='insertar'>
            <td class='insertar'>Teléfono</td>
            <td class='insertar'> 
                <input class="input" type="text" name="telefono" placeholder="Escriba su telefono">
            </td>
        </tr>
        
        <!-- Espacio final -->

        <tr class='insertar'>
            <td class='insertar'></td>
            <td class='insertar'></td>
        </tr>

    </table>

    <p class="insertar">
        <br><br>
        <input type="submit" name="insertar" value="Registrar"> 
        <input type="submit" name="insertar" value="Cancelar">
        <input type="reset" value="Restablecer">
    </p>

    </form>
  </body>

  
</html>
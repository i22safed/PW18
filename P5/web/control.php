<?php 
  
  include('session.php');
  
  if(isset($_SESSION['usuario'])){
    $now = time();
    if($now > $_SESSION['expire']){
      session_destroy();
    }
  }else{
    header('Location: error.php?error=1');
  }

  if(isset($_SESSION['usuario'])){
    $nombreSesion = $_SESSION['usuario'];
    $dni = $_SESSION['dni'];
    $rol = $_SESSION['rol'];
    $sesion = 1;
  }else{
    $sesion = 0;
  }

?>

<!DOCTYPE html>
<html lang="es">
  
    <head>
        
        <title>Editar empleado</title>
        <!-- Para tildes y acentos -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="design.css" type="text/css">
        <link rel="icon" href="src/favicon.ico" type="image/ico">
        <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Michroma" rel="stylesheet">

    </head>

    <body class='insertar'>

        <h1 class='insertar'>
            <br>Panel de control
        </h1>

        <?php 
            
            if($sesion==1){

                if (strcmp($rol,'Admin')==0){
                    // Futuramente incluir en nombre de sesión un enlace al panel de control
                    echo"<p class='log'> 
                    <br>Has iniciado sesión como <a href='control.php'><b>$nombreSesion</b></a> ($rol)
                    <p>";

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


        
            if(strcmp($rol,'User') == 0){
            
                echo "
                    <h3 class='insertar'>
                        <br><br>Panel de control del Usuario 
                    <h3>
                ";


                echo "  
                <form method='POST' action='aumento.php'>
                <br><br>
                    <table class='eliminar'>
                        <tr class='eliminar'>
                            <th colspan='2' class='eliminar'>
                            <h3 class='eliminar'>
                                Introduzca el aumento (1-100)<br>
                            </h3>
                            </th>
                        </tr>
                        
                        <tr class='eliminar'>
                        <td colspan='2' class='eliminar'><br>
                            <input class='input' type='text' name='aumento' maxlength='3'>
                        </td>
                        </tr>
                        
                        <tr class='eliminar'>
                        
                        <td class='eliminar' id='eli'> <br>
                            <input type='submit' name='opcion' value='Confirmar'>
                        </td>
                        
                        <td class='eliminar' id='can'> <br>
                            <input type='submit' name='opcion' value='Cancelar'>
                        </td>
                        </tr>

                        <tr class='eliminar'>
                        
                        <td class='eliminar' id='eli'></td>
                        <td class='eliminar' id='can'></td>
                        </tr>
                    </table>
                </form>
            ";
            }else{

                

                echo "
                    <h3 class='insertar'>
                        <br><br>Panel de control del Admin
                    <h3>
                ";

                $emps = $qo->getIncEmp();

                if($emps == 0){

                    echo "
                        <h1 class='error'><br><br><br>No hay peticiones pendientes<br><br><br></h1>
                        <h3 class='error'>Podrá verlas cuando se realice alguna <br><br></h3>
                        <br><br><img class='error' src=./pics/empty.png >";

                }else{

                    echo "                  
                    <br><br>
                    <table class='emp'>
                        <tr class='emp'>
                            <th class='emp' id='th'>Nombre</th>
                            <th class='emp'>DNI</th>
                            <th class='emp'>Sueldo</th>
                            <th class='emp'>Incremento</th>
                            <th class='emp'>Decisión</th>                        
                        </tr>";

                    foreach($emps as $emp){

                        echo"
                        <tr class='emp'>
                            <td class='emp' id='th'>$emp[nombreCompleto]</td>
                            <td class='emp'>$emp[dni]</td>
                            <td class='emp'>$emp[sueldo]</td>
                            <td class='emp'>$emp[incremento]</td>
                            <td class='emp'>
                                <form method='POST' action='confirmarAumento.php?dni=$emp[dni]'>
                                    <input type='submit' name='opcion' value='Aceptar' > 
                                    <input type='submit' name='opcion' value='Cancelar' >
                                </form>
                            </td>                        
                        </tr>";
                        
                    }

                    echo "
                        <tr class='emp'>
                            <td class='emp'></td>
                            <td class='emp'></td>
                            <td class='emp'></td>
                            <td class='emp'></td>
                            <td class='emp'></td>
                        </tr>
                    </table>";

                }
            }            

    ?>
    
        <br><br>
        <p class='emp'>
            <a href='empleados.php'>
            <img class='icons' src='pics/home.png'>    
            </a>
        </p>
        </br><br><br><br>
    
    </body>

</html>
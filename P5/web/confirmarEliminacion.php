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

  if(!isset($_SESSION['usuario'])){
    header('Location: error.php?error=1');
  }else{

    if(strcmp($_SESSION['rol'],'Admin')!=0){
        header('Location: error.php?error=2');
    }
  }
?>





<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Eliminar empleado</title>
    <!-- Para tildes y acentos -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" href="design.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Michroma" rel="stylesheet">
    
  </head>
  
  <body class='eliminar'>
    
    <h1 class='eliminar'>
      <br>Eliminar empleado</br>
    </h1>

    <form method="POST" action="eliminar.php">
    <br><br><br><br><br>
      <table class='eliminar'>
      
        <tr class='eliminar'>
            <th colspan="2" class='eliminar'>
              <h3 class='eliminar'>
                ¿Es correcto el DNI que desea eliminar?<br>
              </h3>
            </th>
        </tr>
          
        <tr class='eliminar'>
          <td colspan="2" class='eliminar'><br>
            <input class="input" type="text" name="dni" maxlength="8" value=<?php echo "$_GET[dni]" ?> readonly>
          </td>
        </tr>
          
        <tr class='eliminar'>
          
          <td class='eliminar' id='eli'> <br>
            <input type="submit" name="opcion" value="Eliminar">
          </td>
          
          <td class='eliminar' id='can'> <br>
            <input type="submit" name="opcion" value="Cancelar">
          </td>
        </tr>

        <tr class='eliminar'>
          
          <td class='eliminar' id='eli'></td>
          <td class='eliminar' id='can'></td>
        </tr>


      </table>
    </form>
  </body>
</html>






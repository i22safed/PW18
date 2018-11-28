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
  </head>
  <body bgcolor="#CFE1D6">

<h1 align="center" style="background-color:#263238 ; color:#C2C2C2">
        Eliminación del empleado
        <right>
            <a href="/practicapw/empleados.php">
            <img src="/practicapw/pics/home.ico"></img>
            </a>
        </right>
        </h1>

<form method="POST" action="eliminar.php">
<table align=center cellpadding="8" cellspacing="2" bgcolor="#BBD4C4">
    <tr> <caption> ¿Es correcto el dni del empleado que desea borrar? </caption> </tr>
    <td> <input type="text" name="dni" value=<?php echo "$_GET[dni]" ?>> </td>
    <tr>
    	<td  bgcolor="#FFFFFF"> <input type="submit" name="opcion" value="Eliminar"> </td>
    	<td  bgcolor="#FFFFFF"> <input type="submit" name="opcion" value="Cancelar"> </td>
    </tr>
</table>    

</form>
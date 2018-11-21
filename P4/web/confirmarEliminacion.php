
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
            <a href="/web/empleados.php">
            <img src="/web/pics/home.ico"></img>
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
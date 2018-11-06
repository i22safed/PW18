
<?php
    echo "Desea eliminar al empleado con DNI: $_GET[dni]";
?>
<form method="POST" action="eliminar.php">

    Introduzca de nuevo el DNI para confirmar el borrado<br>
    <input type="text" name="dni"> 
    <br>
    <input type="submit" name="opcion" value="Eliminar"> 
    <input type="submit" name="opcion" value="Cancelar"> 
    

</form>
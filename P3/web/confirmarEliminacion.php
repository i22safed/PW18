

<form method="POST" action="eliminar.php">

    Introduzca de nuevo el DNI para confirmar el borrado<br>
    <input type="text" name="dni" value=<?php echo "$_GET[dni]" ?>> 
    <br>
    <input type="submit" name="opcion" value="Eliminar"> 
    <input type="submit" name="opcion" value="Cancelar"> 
    

</form>
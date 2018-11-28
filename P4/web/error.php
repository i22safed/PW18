
<?php 

    $error = $_GET['error'];

    // Invitado no puede entrar a los detalles del empleado

    if($error == 1){
        echo "<p align='center'><br><br>Necesita estar logueado para entrar aqui</p>";
        echo "<p align='center'>Pulse <a href='log.php'>aqui</a> si no es redirigido automaticamente </p>";
    }

    if($error == 2){
        echo "<p align='center'><br><br>Necesita ser administrador para eliminar a un usuario</p>";
        echo "<p align='center'>Pulse <a href='empleados.php'>aqui</a> si no es redirigido automaticamente </p>";
    }

    if($error == 3){
        echo "<p align='center'><br><br>Necesita ser administrador para editar a un usuario</p>";
        echo "<p align='center'>Pulse <a href='empleados.php'>aqui</a> si no es redirigido automaticamente </p>";
    }
    
    if($error == 4){
        echo "<p align='center'><br><br>Necesita ser administrador para insertar a un usuario</p>";
        echo "<p align='center'>Pulse <a href='empleados.php'>aqui</a> si no es redirigido automaticamente </p>";
    }
    

    // Usuario no puede borrar ni editar empleado



?>




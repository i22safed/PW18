
<?php 

    $error = $_GET['error'];

    // Invitado no puede entrar a los detalles del empleado

    if($error == 1){
        echo"<body bgcolor=#CFE1D6>";
        echo "<h1 align='center'><br><br>Necesita estar logueado para entrar aqui</h1>";
        echo "<h2 align='center'>Pulse <a href='log.php'>aqui</a> si no es redirigido automaticamente </h2>";
        echo"<center> <img src=./pics/error.png width=150 height=150 > </img> </center>";
         echo"</body>";
    }

    if($error == 2){
        echo"<body bgcolor=#CFE1D6>";
        echo "<h1 align='center'><br><br>Necesita ser administrador para eliminar a un usuario</h1>";
        echo "<h2 align='center'>Pulse <a href='empleados.php'>aqui</a> si no es redirigido automaticamente </h2>";
        echo"<center> <img src=./pics/error.png width=150 height=150 > </img> </center>";
         echo"</body>";
    }

    if($error == 3){
        echo"<body bgcolor=#CFE1D6>";
        echo "<h1 align='center'><br><br>Necesita ser administrador para editar a un usuario</h1>";
        echo "<h2 align='center'>Pulse <a href='empleados.php'>aqui</a> si no es redirigido automaticamente </h2>";
        echo"<center> <img src=./pics/error.png width=150 height=150 > </img> </center>";
         echo"</body>";
    }
    
    if($error == 4){
        echo"<body bgcolor=#CFE1D6>";
        echo "<h1 align='center'><br><br>Necesita ser administrador para insertar a un usuario</h1>";
        echo "<h2 align='center'>Pulse <a href='empleados.php'>aqui</a> si no es redirigido automaticamente </h2>";
        echo"<center> <img src=./pics/error.png width=150 height=150 > </img> </center>";
        echo"</body>";
    }
    

    // Usuario no puede borrar ni editar empleado



?>




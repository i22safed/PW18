
<?php 
echo'
  <head>
  	<title>Insertar empleado</title>
    <!-- Para tildes y acentos -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="icon" href="src/favicon.ico" type="image/ico">
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Michroma" rel="stylesheet">
    <link rel="stylesheet" href="design.css" type="text/css">
  </head>';



    $error = $_GET['error'];

    // Invitado no puede entrar a los detalles del empleado

    if($error == 1){
        echo "<body class='insertar'>
        <h1 class='error'><br><br><br>Necesita estar logueado para entrar aqui<br><br></h1>
        <h2 class='error'>Pulse <a href='log.php'>aqui</a> si no es redirigido automaticamente<br><br></h2>
        <img class='error' src=./pics/error.png > </img>
        </body>";
        header('Refresh: 3; url=log.php');
    }

    if($error == 2){
        echo "<body class='insertar'>
        <h1 class='error'><br><br><br>Necesita ser administrador para eliminar a un usuario<br><br></h1>
        <h2 class='error'>Pulse <a href='empleados.php'>aqui</a> si no es redirigido automaticamente<br><br></h2>
        <br><br><br><img  class='error' src=./pics/Warning.png > </img>
        </body>";
        header('Refresh: 3; url=empleados.php');
    }

    if($error == 3){
        echo "<body class='insertar'>
        <h1 class='error'><br><br><br>Necesita ser administrador para editar a un usuario<br><br></h1>
        <h2 class='error'>Pulse <a href='empleados.php'>aqui</a> si no es redirigido automaticamente<br><br></h2>
        <br><br><br><img class='error' src=./pics/Warning.png > </img>
        </body>";
        header('Refresh: 3; url=empleados.php');
    }
    
    if($error == 4){
        echo "<body class='insertar'>
        <h1 class='error'><br><br><br>Necesita ser administrador para insertar a un usuario<br><br></h1>
        <h2 class='error'>Pulse <a href='empleados.php'>aqui</a> si no es redirigido automaticamente<br><br></h2>
        <br><br><br><img class='error' src=./pics/Warning.png > </img>
        </body>";
        header('Refresh: 3; url=empleados.php');
    }

    if($error == 5){
        echo "<body class='insertar'>
        <h1 class='error'><br><br><br>Error al introducir la contraseña<br><br></h1>
        <h2 class='error'>Pulse <a href='log.php'>aqui</a> si no es redirigido automaticamente<br><br></h2>
        <br><br><br><img class='error' src=./pics/wrongpass.png > </img>
        </body>";
        header('Refresh: 3; url=log.php');
    }

    if($error == 6){
        echo "<body class='insertar'>
        <h1 class='error'><br><br><br>El usuario no existe en la base de datos<br><br></h1>
        <h2 class='error'>Pulse <a href='log.php'>aqui</a> si no es redirigido automaticamente<br><br></h2>
        <br><br><br><img class='error' src=./pics/wronguser.png > </img>
        </body>";
        header('Refresh: 3; url=log.php');
    }

    if($error == 7){
        echo "<body class='insertar'>
        <h1 class='error'><br><br><br>Contraseña incorrecta, debe de poseer entre 8 y 16 caracteres<br>
        y contener al menos una letra<br></h1>
        <h2 class='error'>Pulse <a href='reg.php'>aqui</a> si no es redirigido automaticamente<br><br></h2>
        <br><br><br><img class='error' src=./pics/wrongpass.png > </img>
        </body>";
        header('Refresh: 3; url=reg.php');
    }

    if($error == 8){
        echo "<body class='insertar'>
        <h1 class='error'><br><br><br>El DNI es incorrecto<br><br></h1>
        <h2 class='error'>Pulse <a href='reg.php'>aqui</a> si no es redirigido automaticamente<br><br></h2>
        <br><br><br><img class='error' src=./pics/dni.png > </img>
        </body>";
        header('Refresh: 3; url=reg.php');
    }

    if($error == 9){
        echo "<body class='insertar'>
        <h1 class='error'><br><br><br>El nombre de usuario ya existe en el sistema<br><br></h1>
        <h2 class='error'>Pulse <a href='reg.php'>aqui</a> si no es redirigido automaticamente<br><br></h2>
        <br><br><br><img class='error' src=./pics/username.png > </img>
        </body>";
        header('Refresh: 3; url=reg.php');
    }

    // Unico acierto del sistema 

    if($error == 10){
        echo "<body class='insertar'>
        <h1 class='error'><br><br><br>Se ha registrado al usuario correctamente<br><br></h1>
        <h2 class='error'>Pulse <a href='empleados.php'>aqui</a> si no es redirigido automaticamente<br><br></h2>
        <br><br><br><img class='error' src=./pics/checked.png > </img>
        </body>";
        header('Refresh: 3; url=empleados.php');
    }


    if($error == 11){   
        echo "<body class='insertar'>
        <h1 class='error'><br><br><br>Error al registrar al usuario<br><br></h1>
        <h2 class='error'>Pulse <a href='empleados.php'>aqui</a> si no es redirigido automaticamente<br><br></h2>
        <br><br><br><img class='error' src=./pics/error.png > </img>
        </body>";
        header('Refresh: 3; url=reg.php');
    }

    if($error == 12){   
        echo "<body class='insertar'>
        <h1 class='error'><br><br><br>El DNI ya existe en el sistema<br><br></h1>
        <h2 class='error'>Pulse <a href='reg.php'>aqui</a> si no es redirigido automaticamente<br><br></h2>
        <br><br><br><img class='error' src=./pics/error.png > </img>
        </body>";
        header('Refresh: 3; url=reg.php');
    }

    if($error == 13){   
        echo "<body class='insertar'>
        <h1 class='error'><br><br><br>El DNI no existe en Empleados<br><br></h1>
        <h2 class='error'>Pulse <a href='reg.php'>aqui</a> si no es redirigido automaticamente<br><br></h2>
        <br><br><br><img class='error' src=./pics/error.png > </img>
        </body>";
        header('Refresh: 3; url=reg.php');
    }

    if($error == 14){   
        echo "<body class='insertar'>
        <h1 class='error'><br><br><br>El DNI existe en Usuarios<br><br></h1>
        <h2 class='error'>Pulse <a href='reg.php'>aqui</a> si no es redirigido automaticamente<br><br></h2>
        <br><br><br><img class='error' src=./pics/error.png > </img>
        </body>";
        header('Refresh: 3; url=reg.php');
    }

    if($error == 15){   
        echo "<body class='insertar'>
        <h1 class='error'><br><br><br>Error, el porcentaje indicado no es correcto<br><br></h1>
        <h2 class='error'>Pulse <a href='control.php'>aqui</a> si no es redirigido automaticamente<br><br></h2>
        <br><br><br><img class='error' src=./pics/error.png > </img>
        </body>";
        header('Refresh: 3; url=control.php');
    }

    if($error == 16){   
        echo "<body class='insertar'>
        <h1 class='error'><br><br><br>Error al solicitar el aumento<br><br></h1>
        <h2 class='error'>Pulse <a href='control.php'>aqui</a> si no es redirigido automaticamente<br><br></h2>
        <br><br><br><img class='error' src=./pics/percent.png > </img>
        </body>";
        header('Refresh: 3; url=control.php');
    }

    if($error == 17){   
        echo "<body class='insertar'>
        <h1 class='error'><br><br><br>Aumento solicitado correctamente<br><br></h1>
        <h2 class='error'>Pulse <a href='empleados.php'>aqui</a> si no es redirigido automaticamente<br><br></h2>
        <br><br><br><img class='error' src=./pics/checked.png > </img>
        </body>";
        header('Refresh: 3; url=empleados.php');
    }


    if($error == 18){   
        echo "<body class='insertar'>
        <h1 class='error'><br><br><br>Aumento aceptado<br><br></h1>
        <h2 class='error'>Pulse <a href='control.php'>aqui</a> si no es redirigido automaticamente<br><br></h2>
        <br><br><br><img class='error' src=./pics/checked.png > </img>
        </body>";
        header('Refresh: 3; url=control.php');
    }

    
    if($error == 19){   
        echo "<body class='insertar'>
        <h1 class='error'><br><br><br>Error al actualizar el sueldo<br><br></h1>
        <h2 class='error'>Pulse <a href='control.php'>aqui</a> si no es redirigido automaticamente<br><br></h2>
        <br><br><br><img class='error' src=./pics/error.png > </img>
        </body>";
        header('Refresh: 3; url=control.php');
    }

    if($error == 20){   
        echo "<body class='insertar'>
        <h1 class='error'><br><br><br>Aumento denegado<br><br></h1>
        <h2 class='error'>Pulse <a href='control.php'>aqui</a> si no es redirigido automaticamente<br><br></h2>
        <br><br><br><img class='error' src=./pics/error.png > </img>
        </body>";
        header('Refresh: 3; url=control.php');
    }




    // Usuario no puede borrar ni editar empleado

?>




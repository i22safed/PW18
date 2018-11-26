





    
    
<?php 

$usuario = $_POST['user'];
$pass = $_POST['pass'];
$dni = $_POST['dni'];
$opcion = $_POST['reg'];

require_once('userFunctions.php');
$uo = new userQueries();

if(empty($uo->dbc)){
    echo "<h3 align='center'>¡Error!: No se pudo establecer la conexión con la
    base de datos.</h3><br/>";
    die();
}


if(strcmp($opcion,'Registrar')==0){

    if($uo->checkUserExist($usuario)==false){
        echo "El usuario ".$usuario." ya existe";
    }

    if($uo->checkPass($pass)==false){
        echo "La contraseña es incorrecta";
    }

    if($uo->registerUser($usuario,$pass,$dni)==true){
        echo "Se ha registrado con exito al usuario".$user;
        header('Location: /practicapw/empleados.php');
    }
    else{
        echo "Error al registrar al usuario".$user;
        echo "<a href='empleados.php'>Volver a empleados</a>";
    }
    
}else{
    
    header('Location: /practicapw/empleados.php');
    
}

// Realizamos conexion a la segunda base de datos y comprobamos que exista el usuario


?>


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

    if($uo->checkDNI($dni)==false){
        header('Location: error.php?error=8');
    }

    if($uo->checkUserExist($usuario)==false){
        header('Location: error.php?error=9');
    }

    if($uo->checkPass($pass)==false){
        header('Location: error.php?error=7');
    }

    if($uo->registerUser($usuario,$pass,$dni)==true){
        header('Location: error.php?error=10');
    }
    else{
        header('Location: error.php?error=11');
    }
    
}else{
    
    header('Location: empleados.php');
    
}

// Realizamos conexion a la segunda base de datos y comprobamos que exista el usuario


?>

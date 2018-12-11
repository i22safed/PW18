
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
    
    if($uo->checkDNI($dni)==true){
    }else{
        header('Location: error.php?error=8');
    }
    
    if($uo->checkDNIDBU($dni)==true){
    }else{
        header('Location: error.php?error=14');
    }
    
    if($uo->checkDNIDBE($dni)==true){
        header('Location: error.php?error=13');
    }
    
    if($uo->checkUserName($usuario)==true){
        $uo->registerUser($usuario,$pass,$dni);
        header('Location: error.php?error=10');
    }else{
        header('Location: error.php?error=9');
    }

}else{
    
    header('Location: empleados.php');
    
}

// Realizamos conexion a la segunda base de datos y comprobamos que exista el usuario


?>

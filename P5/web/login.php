

<?php 

require('session.php');

$usuario = $_POST['user'];
$pass = $_POST['pass'];
$opcion = $_POST['log'];

require_once('userFunctions.php');
$uo = new userQueries();

if(empty($uo->dbc)){
    echo "<h3 align='center'>¡Error!: No se pudo establecer la conexión con la
    base de datos.</h3><br/>";
    die();
}

echo "$opcion";

if(strcmp($opcion,'Login')==0){
    
    if($uo->checkUserExist($usuario)==true){
        
        if($uo->checkPassBD($usuario,$pass)==true){
            
            session_start();
            
            $userInfo = $uo->getUserInfo($usuario);
            $_SESSION['usuario'] = $userInfo['usuario'];
            $_SESSION['dni'] = $userInfo['dni'];
            $_SESSION['rol'] = $userInfo['rol'];
            $_SESSION['check'] = hash('ripemd128', $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (1*600);

            header('Location: empleados.php');

        }else{
            //La contraseña no coincide con la de la bd
            header('Location: error.php?error=5');
        }
    }else{
        //No existe el usuario en la base de datos
        header('Location: error.php?error=6'); 
    }

}else{
    header('Location: empleados.php');
}

// Realizamos conexion a la segunda base de datos y comprobamos que exista el usuario


?>
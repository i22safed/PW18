
<?php 

    include('session.php');
    if(isset($_SESSION['usuario'])){
        echo "Sesión inciada como ".$_SESSION['usuario'];
        session_destroy();
        header('Location: index.php');
    }else{
        echo "Sesion no iniciada";
    }

?>

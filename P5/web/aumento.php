<?php 
    
    include('session.php');

    if(isset($_SESSION['usuario'])){
        $nombreSesion = $_SESSION['usuario'];
        $rol = $_SESSION['rol'];
        $dni = $_SESSION['dni'];
        $sesion = 1;
    }else{
        $sesion = 0;
    }

    if(isset($_SESSION['usuario'])){
        $now = time();
        if($now > $_SESSION['expire']){
            session_destroy();
        }
    }else{
        header('Location: error.php?error=1');
    }

    if(strcmp($_POST['opcion'],'Cancelar')==0){
        header('Location: empleados.php');
    }

    // Conexión a la base de datos -----------------------------------------------
    // Realizamos la conexión a la base de datos
    require_once('functions.php');
    // Creamos un objeto para llamar a las consultas
    $qo = new empQueries();
    // Realizamos la conexión con la base de datos
    if(empty($qo->dbc)){
        echo "<h3 align='center'>¡Error!: No se pudo establecer la conexión con la
        base de datos.</h3><br/>";
        die();
    }

    $emp = $qo->getEmp($dni);

    $incremento = $_POST['aumento'];
    $imagen = $dni.'.png';

    if(($incremento > 0) && ($incremento <= 100)){
        if($qo->editarInfo($emp['dni'], $imagen, $emp['nombreCompleto'], $emp['sexo'], $emp['estudiosSuperiores'],
        $emp['certificaciones'], $emp['situacionLaboral'], $emp['sueldo'], $incremento, $emp['email'],
        $emp['localidad'], $emp['fechaNacimiento'], $emp['telefono']) == true){
            header('Location: error.php?error=17');
        }else{
            header('Location: error.php?error=16');
        }
    }else{
        header('Location: error.php?error=15');
    }


?>
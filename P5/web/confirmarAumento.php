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

    require_once('functions.php');
    // Creamos un objeto para llamar a las consultas
    $qo = new empQueries();
    // Realizamos la conexión con la base de datos
    if(empty($qo->dbc)){
        echo "<h3 align='center'>¡Error!: No se pudo establecer la conexión con la
        base de datos.</h3><br/>";
        die();
    }

    $emp = $qo->getEmp($_GET['dni']);

    $opcion = "$_POST[opcion]";
    
    echo "$opcion";

    $dni = "$_GET[dni]";
    $imagen = $dni.'.png';
    $sueldo = "$emp[sueldo]";
    $incremento = "$emp[incremento]";
    $sueldoIncrementado = $sueldo * (1+$incremento/100);
    $incremento = 0; 

    if(strcmp($opcion,'Aceptar')==0){

        if($qo->editarInfo($emp['dni'], $imagen, $emp['nombreCompleto'], $emp['sexo'], $emp['estudiosSuperiores'],
        $emp['certificaciones'], $emp['situacionLaboral'], $sueldoIncrementado, $incremento, $emp['email'],
        $emp['localidad'], $emp['fechaNacimiento'], $emp['telefono']) == true){

            header('Location: error.php?error=18');

        }else{
        
            header('Location: error.php?error=19');
        }
        
    }else{
    
        if($qo->editarInfo($emp['dni'], $imagen, $emp['nombreCompleto'], $emp['sexo'], $emp['estudiosSuperiores'],
        $emp['certificaciones'], $emp['situacionLaboral'], $sueldo, $incremento, $emp['email'],
        $emp['localidad'], $emp['fechaNacimiento'], $emp['telefono']) == true){
        
            header('Location: error.php?error=20');
        
        }else{

            header('Location: error.php?error=19');

        }
    }
    
    ?>
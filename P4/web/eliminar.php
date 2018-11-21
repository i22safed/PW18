
<?php

    $dni = $_POST['dni'];
    $opcion = $_POST['opcion'];

    if (strcasecmp($opcion,'Eliminar') == 0){

        require_once('functions.php');
        // Creamos un objeto para llamar a las consultas
        $qo = new empQueries();
        // Realizamos la conexión con la base de datos
        if(empty($qo->dbc)){
        echo "<h3 align='center'>¡Error!: No se pudo establecer la conexión con la
        base de datos.</h3><br/>";
        die();
        }

        if($qo->deleteEmp($dni) == true){
            echo "El usuario se ha borrado del sistema<br>";
        }else{
            echo "Error al borrar al usuario del sitema<br>";   
        }

    }else{
        
        header('Location: /practicapw/empleados.php');
    }
    
    header('Location: /practicapw/empleados.php');

?>



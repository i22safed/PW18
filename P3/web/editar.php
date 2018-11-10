


<?php

    $dni = $_GET['dni'];
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

    $nombreCom = $emp['nombreCompleto'];
    $expName = explode(' ',$nombreCom);
    $nEle = count($expName);
    
    if($nEle == 2){
        $nombre = $expName[0];
        $apellidos = $expName[1];
    }
    if($nEle == 3){
        $nombre = $expName[0];
        $apellidos = $expName[1].' '.$expName[2];
    }
    if($nEle == 4){
        $nombre = $expName[0].' '.$expName[1];
        $apellidos = $expName[2].' '.$expName[3];
    }

?>

<form method="POST" action="guardarInsercion.php">

    <br>Nombre:<br>
        <input type="text" name="nombre" value="<?php echo $nombre?>" ><br>   
    
    <br>Apellidos:<br>
        <input type="text" name="apellidos" value="<?php echo $apellidos?>" ><br>   


    <br>DNI<br>
        <input type="text" name="DNI" value="<?php echo "$emp[dni]" ?>" readonly><br>
    
    <br>Sexo<br>
        <input type="radio" name="sexo" value="Hombre" <?php echo $qo->checkValues('sexo','Hombre',$emp) ?> > Hombre<br> 
        <input type="radio" name="sexo" value="Mujer" <?php echo $qo->checkValues('sexo','Mujer',$emp) ?> > Mujer<br> 
        <input type="radio" name="sexo" value="Otro" <?php echo $qo->checkValues('sexo','Otro',$emp) ?> > Otro<br><br>
    
    <br>Estudios<br>
        <select name="estudios">
            <option value="Ninguno" <?php echo $qo->checkValues('estudios','Ninguno',$emp) ?>> Ninguno </option>
            <option value="Basicos" <?php echo $qo->checkValues('estudios','Basicos',$emp) ?>> Basicos </option>
            <option value="Superiores" <?php echo $qo->checkValues('estudios','Superiores',$emp) ?>> Superiores </option>
            <option value="Doctorado" <?php echo $qo->checkValues('estudios','Doctorado',$emp) ?>> Doctorado </option>
        </select><br><br>
    
    <br>Certificaciones<br>
        <input type="checkbox" name="cert0" <?php echo $qo->checkValues('cert0','1',$emp) ?>>Amazon<br> 
        <input type="checkbox" name="cert1" <?php echo $qo->checkValues('cert1','1',$emp) ?>>Cisco<br>
        <input type="checkbox" name="cert2" <?php echo $qo->checkValues('cert2','1',$emp) ?>>Linux<br> 
        <input type="checkbox" name="cert3" <?php echo $qo->checkValues('cert3','1',$emp) ?>>Java<br>
        <input type="checkbox" name="cert4" <?php echo $qo->checkValues('cert4','1',$emp) ?>>PL/SQL<br> 
        <input type="checkbox" name="cert5" <?php echo $qo->checkValues('cert5','1',$emp) ?>>La otra<br>
        <input type="checkbox" name="cert6" <?php echo $qo->checkValues('cert6','1',$emp) ?>>..Y la que queda<br> 
    
    <br>Situación laboral<br>
    <select name="sitLab">
            <option value="Estudiante" <?php echo $qo->checkValues('sitLab','Estudiante',$emp) ?>> Estudiante </option>
            <option value="Activo" <?php echo $qo->checkValues('sitLab','Activo',$emp) ?>> Activo </option>
            <option value="Parado" <?php echo $qo->checkValues('sitLab','Parado',$emp) ?>> Parado </option>
            <option value="Jubilado" <?php echo $qo->checkValues('sitLab','Jubilado',$emp) ?>> Jubilado </option>
    </select><br><br>
    
    <br>Email <br>
    <input type="email" name="correo" value=<?php echo $emp['email']?>><br>
    
    <br>Localidad<br>
    <select name="localidad">
            <option value="1" <?php echo $qo->checkValues('localidad',1,$emp) ?>> Almeria </option>
            <option value="2" <?php echo $qo->checkValues('localidad',2,$emp) ?>> Cadiz </option>
            <option value="3" <?php echo $qo->checkValues('localidad',3,$emp) ?>> Cordoba </option>
            <option value="4" <?php echo $qo->checkValues('localidad',4,$emp) ?>> Granada </option>
            <option value="5" <?php echo $qo->checkValues('localidad',5,$emp) ?>> Sevilla </option>
    </select><br><br>
    
    <br>Fecha de nacimiento<br>
    <input type="date" name="fechaNacimiento" value=<?php echo $emp['fechaNacimiento']?> readonly><br>
    
    <br>Telefono<br>
    <input type="text" name="telefono" value = <?php echo $emp['telefono']?>><br>
    
    <input type="submit" name="edicion" value="Guardar"> 
    <input type="reset" value="Restablecer">

</form>
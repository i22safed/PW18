<?php 
  
  include('session.php');
  
  if(isset($_SESSION['usuario'])){
    echo "Sesión inciada como ".$_SESSION['usuario'];
    $sesion = 1;
  }else{
    $sesion = 0;
  }

  if(isset($_SESSION['usuario'])){
    $now = time();
    if($now > $_SESSION['expire']){
      session_destroy();
    }
  }

  if(!isset($_SESSION['usuario'])){
    header('Location: error.php?error=1');
  }else{

    if(strcmp($_SESSION['rol'],'Admin')!=0){
        header('Location: error.php?error=3');
    }
  }
?>

<!DOCTYPE html>
<html lang="es">
  
    <head>
        
        <title>Editar empleado</title>
        <!-- Para tildes y acentos -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="design.css" type="text/css">

        <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Michroma" rel="stylesheet">

    </head>

    <body class='insertar'>

        <h1 class='insertar'>
            <br>Editar empleado
        </h1>

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

        <h3 class='insertar'>
            <br><br>Edición de los atributos del empleado<br><br>
        </h3>

        <form method="POST" action="guardarInsercion.php" >
        
            <table class='insertar'>

                <tr class='insertar'>
                    <td class='insertar'></td>
                    <td class='insertar'></td>
                </tr>

                <!-- Espacio inicial -->

                <tr class='insertar'>
                    <td class='insertar'>Nombre</td>
                    <td class='insertar'>
                        <input class="input" type="text" name="nombre" value="<?php echo $nombre?>">
                    </td>
                </tr>

                <tr class='insertar'>
                    <td class='insertar'>Apellidos</td>
                    <td class='insertar'>
                        <input class="input" type="text" name="apellidos" value="<?php echo $apellidos?>">
                    </td>
                </tr>
                <tr class='insertar'>
                    <td class='insertar'>DNI</td>
                    <td class='insertar'>
                    <input class="input" type="text" maxlength="8" name="DNI"  value="<?php echo "$emp[dni]" ?>" readonly>
                    </td>
                </tr>
                <tr class='insertar'>
                    <td class='insertar'>Sexo</td>
                    <td class='insertar'>
                            <input type="radio" name="sexo" value="Hombre" <?php echo $qo->checkValues('sexo','Hombre',$emp) ?>>Hombre
                            <input type="radio" name="sexo" value="Mujer" <?php echo $qo->checkValues('sexo','Mujer',$emp) ?>> Mujer
                            <input type="radio" name="sexo" value="Otro" <?php echo $qo->checkValues('sexo','Otro',$emp) ?>> Otro 
                    </td>
                </tr>
                <tr class='insertar'>
                    <td class='insertar'>Estudios</td>
                    <td class='insertar'>
                    <select name="estudios">
                        <option value="Ninguno" <?php echo $qo->checkValues('estudios','Ninguno',$emp) ?> > Ninguno </option>
                        <option value="Basicos" <?php echo $qo->checkValues('estudios','Basicos',$emp) ?>> Basicos </option>
                        <option value="Superiores" <?php echo $qo->checkValues('estudios','Superiores',$emp) ?>> Superiores </option>
                        <option value="Doctorado" <?php echo $qo->checkValues('estudios','Doctorado',$emp) ?>> Doctorado </option>
                    </select>
                    </td>
                </tr>
                <tr class='insertar'>
                    <td class='insertar' id='cabeceraCert'>Certificaciones<br><br><br><br></td>
                    <td class='insertar'> 
                        <table class='certificaciones'>
                            <tr class='certificaciones'>
                                <th class='certificaciones'><input type="checkbox" name="cert0" <?php echo $qo->checkValues('cert2','1',$emp) ?>>  Amazon</th>
                                <th class='certificaciones'><input type="checkbox" name="cert1" <?php echo $qo->checkValues('cert2','1',$emp) ?>>  Cisco</th>
                                <th class='certificaciones'><input type="checkbox" name="cert2" <?php echo $qo->checkValues('cert2','1',$emp) ?>>  Linux </th>
                            </tr>
                            <tr class='certificaciones'>
                                <td class='certificaciones'><input type="checkbox" name="cert3" <?php echo $qo->checkValues('cert2','1',$emp) ?>>  Java</td>
                                <td class='certificaciones'><input type="checkbox" name="cert4" <?php echo $qo->checkValues('cert2','1',$emp) ?>>  PL/SQL</td>
                                <td class='certificaciones'><input type="checkbox" name="cert5" <?php echo $qo->checkValues('cert2','1',$emp) ?>>  Qt </td>
                            </tr>
                            <tr>
                                <td class='certificaciones'><input type="checkbox" name="cert6" <?php echo $qo->checkValues('cert2','1',$emp) ?>>  Ruby</td>
                                <td class='certificaciones'></td>
                                <td class='certificaciones'></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class='insertar'>
                    <td class='insertar'>Situación laboral</td>
                    <td class='insertar'>        
                        <select name="sitLab">
                            <option value="Estudiante"> Estudiante </option>
                            <option value="Activo"> Activo </option>
                            <option value="Parado"> Parado </option>
                            <option value="Jubilado"> Jubilado </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class='insertar'>Email</td>
                    <td class='insertar'>
                        <input class="input" type="email" name="correo" value=<?php echo $emp['email']?>>
                    </td>
                </tr>
                <tr class='insertar'>
                    <td class='insertar'>Localidad</td>
                    <td class='insertar'>
                        <select name="localidad">
                            <option value="1" <?php echo $qo->checkValues('localidad',1,$emp) ?>> Almeria </option>
                            <option value="2" <?php echo $qo->checkValues('localidad',1,$emp) ?>> Cadiz </option>
                            <option value="3" <?php echo $qo->checkValues('localidad',1,$emp) ?>> Cordoba </option>
                            <option value="4" <?php echo $qo->checkValues('localidad',1,$emp) ?>> Granada </option>
                            <option value="5" <?php echo $qo->checkValues('localidad',1,$emp) ?>> Sevilla </option>
                        </select>
                    </td>
                </tr>
                <tr class='insertar'>
                    <td class='insertar'>Fecha de nacimiento</td>
                    <td class='insertar'>
                        <input class="input" type="date" name="fechaNacimiento" value=<?php echo $emp['fechaNacimiento']?> readonly>
                    </td>
                </tr>
                <tr class='insertar'>
                    <td class='insertar'>Teléfono</td>
                    <td class='insertar'> 
                        <input class="input" type="text" name="telefono" value = <?php echo $emp['telefono']?>>
                    </td>
                </tr>

                <!-- Espacio final -->

                <tr class='insertar'>
                    <td class='insertar'></td>
                    <td class='insertar'></td>
                </tr>

            </table>
                
            <br><br>    
            <p align='center'>
                <input  type="submit" name="edicion" value="Guardar"> 
                <input  type="submit" name="edicion" value="Cancelar"> 
                <input  type="reset" name="edicion" value="Restablecer">
            </p>
        </form>
    </body>
</html>

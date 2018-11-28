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
  </head>
  <body bgcolor="#CFE1D6">

<h1 align="center" style="background-color:#263238 ; color:#C2C2C2">
        Datos del empleado
        <right>
            <a href="/practicapw/empleados.php">
            <img src="/practicapw/pics/home.ico"></img>
            </a>
        </right>
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

<form method="POST" action="guardarInsercion.php" align=center bgcolor=blue>
   <table align=center cellpadding="5" cellspacing="1" bgcolor="#BBD4C4">

    <tr>
        <td>
            Nombre:
        </td>
        <td>
            <input type="text" name="nombre" value="<?php echo $emp['nombreCompleto']?>" >   
        </td>
    </tr>

    <tr>
        <td>
            DNI
        </td>
        <td>
        <input type="text" name="DNI" value="<?php echo "$emp[dni]" ?>" readonly>
        </td>
    </tr>
    
    <tr> <td> Sexo </td> 
        <td>
            <table align=center cellpadding="8" cellspacing="2" bgcolor="#BBD4C4">
            <tr> 
                <td bgcolor="#F2F3F4"> <input type="radio" name="sexo" value="Hombre" <?php echo $qo->checkValues('sexo','Hombre',$emp) ?> > Hombre </td>
                <td bgcolor="#F2F3F4"> <input type="radio" name="sexo" value="Mujer" <?php echo $qo->checkValues('sexo','Mujer',$emp) ?> > Mujer </td>
                <td bgcolor="#F2F3F4"> <input type="radio" name="sexo" value="Otro"  <?php echo $qo->checkValues('sexo','Otro',$emp) ?> > Otro </td> 
            </tr>
            </table>
        </td>
    </tr>
   
    
    <tr> <td> Estudios </td>
        <td>
        <select name="estudios">
            <option value="Ninguno" <?php echo $qo->checkValues('estudios','Ninguno',$emp) ?>> Ninguno </option>
            <option value="Basicos" <?php echo $qo->checkValues('estudios','Basicos',$emp) ?>> Basicos </option>
            <option value="Superiores" <?php echo $qo->checkValues('estudios','Superiores',$emp) ?>> Superiores </option>
            <option value="Doctorado" <?php echo $qo->checkValues('estudios','Doctorado',$emp) ?>> Doctorado </option>
        </select>
        </td>
    </tr>
    
     <tr> 
        <td> Certificaciones </td>
        <td>   
            <table align=center cellpadding="8" cellspacing="2" bgcolor="#BBD4C4">
                <tr>
                <td bgcolor="#F2F3F4"><input type="checkbox" name="cert0" <?php echo $qo->checkValues('cert0','1',$emp) ?> >Amazon </td>
                <td bgcolor="#F2F3F4"> <input type="checkbox" name="cert1" <?php echo $qo->checkValues('cert1','1',$emp) ?>>Cisco </td>
                <td bgcolor="#F2F3F4"> <input type="checkbox" name="cert2" <?php echo $qo->checkValues('cert2','1',$emp) ?>>Linux </td>
                <td bgcolor="#F2F3F4"> <input type="checkbox" name="cert3" <?php echo $qo->checkValues('cert3','1',$emp) ?>>Java </td>
                <td bgcolor="#F2F3F4"><input type="checkbox" name="cert4" <?php echo $qo->checkValues('cert4','1',$emp) ?>>PL/SQL </td>
                <td bgcolor="#F2F3F4"><input type="checkbox" name="cert5" <?php echo $qo->checkValues('cert5','1',$emp) ?>>La otra </td>
                <td bgcolor="#F2F3F4"><input type="checkbox" name="cert6" <?php echo $qo->checkValues('cert6','1',$emp) ?>>..Y la que queda </td>
                </tr>
            </table>
        </td>
    </tr>

    
    <tr> 
        <td> Situación laboral </td>
        <td>
        <select name="sitLab">
                <option value="Estudiante" <?php echo $qo->checkValues('sitLab','Estudiante',$emp) ?>> Estudiante </option>
                <option value="Activo" <?php echo $qo->checkValues('sitLab','Activo',$emp) ?>> Activo </option>
                <option value="Parado" <?php echo $qo->checkValues('sitLab','Parado',$emp) ?>> Parado </option>
                <option value="Jubilado" <?php echo $qo->checkValues('sitLab','Jubilado',$emp) ?>> Jubilado </option>
        </select>
        </td>
    </tr>
    
    <tr>
        <td> Email </td>
        <td>
        <input type="email" name="correo" value=<?php echo $emp['email']?>>
        </td>
    </tr>

    <tr>
        <td> Localidad </td>
        <td>
        <select name="localidad">
                <option value="1" <?php echo $qo->checkValues('localidad',1,$emp) ?>> Almeria </option>
                <option value="2" <?php echo $qo->checkValues('localidad',2,$emp) ?>> Cadiz </option>
                <option value="3" <?php echo $qo->checkValues('localidad',3,$emp) ?>> Cordoba </option>
                <option value="4" <?php echo $qo->checkValues('localidad',4,$emp) ?>> Granada </option>
                <option value="5" <?php echo $qo->checkValues('localidad',5,$emp) ?>> Sevilla </option>
        </select>
        </td>
    </tr>
    
    <tr>
        <td> Fecha de nacimiento </td>
        <td> <input type="date" name="fechaNacimiento" value=<?php echo $emp['fechaNacimiento']?> readonly> </td>
    </tr>
    
    <tr>
        <td> Telefono </td>
        <td> <input type="text" name="telefono" value = <?php echo $emp['telefono']?>> </td>
    </tr>

</table>
    <br>
    <input type="submit" name="edicion" value="Guardar"> 
    <input type="reset" name="edicion" value="Restablecer">


</form>
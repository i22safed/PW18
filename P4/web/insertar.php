<!DOCTYPE html>
<html lang="es">
  <head>
  	<title>Insertar empleado</title>
    <!-- Para tildes y acentos -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  </head>
  <body bgcolor="#CFE1D6">

    <!--Se centra el titulo y se concatena con la imagen de la casa,(permite
    volver al menu de inicio) posicionandola al lado derecho-->
        <h1 align="center" style="background-color:#263238 ; color:#C2C2C2">
        Empleado
        <right>
            <a href="/web/empleados.php">
            <img src="/web/pics/home.ico"></img>
            </a>
        </right>
        </h1>
    
    <!-- Comienzo del formulario para el registro de un usuario -->
    <form method="POST" action="guardarInsercion.php" align=center bgcolor=blue>
    
    <table align=center cellpadding="5" cellspacing="1" bgcolor="#BBD4C4">
        <tr> <td> Nombre: </td>
           <td> <input type="text" name="nombre" placeholder="Escriba su nombre"> </td> </tr> 
        
        <tr> <td> Apellidos: </td>
            <td> <input type="text" name="apellidos" placeholder="Escriba su apellidos"> </td> </tr>
        
        <tr> <td> DNI </td>
            <td> <input type="text" maxlength="8" name="DNI" placeholder="Escriba su dni"> </td> </tr>

            
       <tr> <td>  Sexo </td> <td> <table align=center cellpadding="8" cellspacing="2" bgcolor="#BBD4C4">
            <td bgcolor="#F2F3F4"> <input type="radio" name="sexo" value="Hombre" checked> Hombre </td>
            <td bgcolor="#F2F3F4"> <input type="radio" name="sexo" value="Mujer"> Mujer </td>
            <td bgcolor="#F2F3F4"> <input type="radio" name="sexo" value="Otro"> Otro </td>
        
        </table> </td> </tr>
            
        <tr>
             <td>Estudios</td>
            <td>
            <select name="estudios">
                <option value="Ninguno"> Ninguno </option>
                <option value="Basicos"> Basicos </option>
                <option value="Superiores"> Superiores </option>
                <option value="Doctorado"> Doctorado </option>
            </select>
        </td>
        </tr>

        <tr> <td> Certificaciones </td> <td><table align=center cellpadding="8" cellspacing="2" bgcolor="#BBD4C4">
            
            <tr>
            <td bgcolor="#F2F3F4"> <input type="checkbox" name="cert0" value="Amazon">Amazon </td>
            <td bgcolor="#F2F3F4"> <input type="checkbox" name="cert1" value="Cisco">Cisco </td>
            <td bgcolor="#F2F3F4"> <input type="checkbox" name="cert2" value="Linux">Linux </td> 
            <td bgcolor="#F2F3F4"> <input type="checkbox" name="cert3" value="Java">Java </td>
            <td bgcolor="#F2F3F4"> <input type="checkbox" name="cert4" value="PL/SQL">PL/SQL </td> 
            <td bgcolor="#F2F3F4"> <input type="checkbox" name="cert5" value="La otra">La otra </td>
            <td bgcolor="#F2F3F4"> <input type="checkbox" name="cert6" value="Y la que queda">..Y la que queda </td>
            </tr>
            </td> 
        </tr>
             
        </table>

        <tr> <td> Situación laboral </td>
        <td>
        <select name="sitLab">
                <option value="Estudiante"> Estudiante </option>
                <option value="Activo"> Activo </option>
                <option value="Parado"> Parado </option>
                <option value="Jubilado"> Jubilado </option>
        </select>
            </td>
        </tr>

        <tr> <td>
        Email 
        </td>
        <td>
        <input type="email" name="correo" placeholder="Escriba su correo">
        </td>
        </tr>
        
        <tr>
        <td> 
        Localidad
        </td>
        <td>
        <select name="localidad">
                <option value="1"> Almeria </option>
                <option value="2"> Cadiz </option>
                <option value="3"> Cordoba </option>
                <option value="4"> Granada </option>
                <option value="5"> Sevilla </option>
        </select>
        </td>
        </tr>

        <tr>
        <td>
        Fecha de nacimiento
        </td>
        <td>
        <input type="date" name="fechaNacimiento">
        </td>
        </tr>
    <tr>
    <td>
     Telefono
    </td>
    <td>
        <input type="text" name="telefono" placeholder="Escriba su telefono">
    </td>
</tr>
</table>
    <br> </br>
        <input type="submit" name="insertar" value="Registrar"> 
        <input type="reset" value="Restablecer">
        <p></br></p> </td>

    </form>
  </body>
</html>
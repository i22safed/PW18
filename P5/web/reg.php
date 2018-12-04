

<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Registro</title>
    <!-- Para tildes y acentos -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  
    <link rel="stylesheet" href="design.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Michroma" rel="stylesheet">
  
  </head>
  <body class='insertar'>

  <!--Se centra el titulo y se concatena con la imagen de la casa,(permite
  volver al menu de inicio) posicionandola al lado derecho-->
    <h1 class='insertar'>
      <br>Registrarse
    </h1>

<form method="POST" action="registrar.php" >

    <h3 class='insertar'>
      <br><br>Inserte los datos del usuario<br><br><br>
    </h3>

    <table class='reg'>
      <tr class='insertar'>
        <td class='insertar'></td>
        <td class='insertar'></td>
      </tr>
      <tr class='reg'>
        <td class='reg'>Nombre de usuario</td>
        <td class='reg'> <input class="input" type="text" name="user" placeholder="Nombre de usuario"> </td>
      </tr>
      <tr class='reg'>
        <td class='reg'>DNI</td>
        <td class='reg'><input class="input" type="text"  maxlength="8" minlength="8" name="dni" placeholder="DNI"></td>
      </tr>
      <tr class='reg'>
        <td class='reg'>Password</td>
        <td class='reg'><input class="input" type="password" minlength="4" maxlength="10" name="pass" placeholder="Contraseña"></td>
      </tr>
      <tr class='insertar'>
        <td class='insertar'></td>
        <td class='insertar'></td>
      </tr>
    </table>

    <br><br>

    <p class='reg'>
      <input type="submit" name="reg" value="Registrar">
      <input type="submit" name="reg" value="Cancelar">
      <input type="reset"  value="Restablecer">
    </p>


</form>
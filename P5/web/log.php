<!DOCTYPE html>
<html lang="es">
  <head>
  	<title>Login</title>
    <!-- Para tildes y acentos -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="icon" href="src/favicon.ico" type="image/ico">
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Michroma" rel="stylesheet">
    <link rel="stylesheet" href="design.css" type="text/css">
  </head>
  <body class='insertar'>

  <!--Se centra el titulo y se concatena con la imagen de la casa,(permite
  volver al menu de inicio) posicionandola al lado derecho-->
    <h1 class='insertar'>
      <br>Inicio de sesion
    </h1>

<form method="POST" action="login.php" align="center">

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
        <td class='reg'>Password</td>
        <td class='reg'><input class="input" type="password" minlength="8" maxlength="15" name="pass" placeholder="Contraseña"></td>
      </tr>
      <tr class='insertar'>
        <td class='insertar'></td>
        <td class='insertar'></td>
      </tr>
    </table>
    <br><br>
    <input type="submit" name="log" value="Login">
    <input type="submit" name="log" value="Cancelar">
    <input type="reset"  value="Restablecer">

</form>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
  <head>
  	<title>Login</title>
    <!-- Para tildes y acentos -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  </head>
  <body bgcolor="#CFE1D6">

  <!--Se centra el titulo y se concatena con la imagen de la casa,(permite
  volver al menu de inicio) posicionandola al lado derecho-->
    <h1 align="center" style="background-color:#263238 ; color:#C2C2C2">
      Inicio de sesion
      <right>
        <a href="index.php">
          <img src="pics\home.ico"></img>
        </a>
      </right>
    </h1>




<form method="POST" action="login.php" align="center">

<br>Usuario / Username<br>
<input type="text" name="user" placeholder="Nombre de Usuario">
<br>
<br>Password<br>
<input type="password" name="pass" placeholder="Contraseña">
<br>
<br>

<input type="submit" name="log" value="Login">
<input type="submit" name="log" value="Cancelar">
<input type="reset"  value="Restablecer">

</form>

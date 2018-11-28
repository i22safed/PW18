

<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Registro</title>
    <!-- Para tildes y acentos -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  </head>
  <body bgcolor="#CFE1D6">

  <!--Se centra el titulo y se concatena con la imagen de la casa,(permite
  volver al menu de inicio) posicionandola al lado derecho-->
    <h1 align="center" style="background-color:#263238 ; color:#C2C2C2">
      Registrarse
      <right>
        <a href="index.php">
          <img src="pics\home.ico"></img>
        </a>
      </right>
    </h1>

<form method="POST" action="registrar.php" align="center">

    <br>Usuario / Username<br>
    <input type="text" name="user" placeholder="Nombre de usuario">
    <br>
    <br>DNI<br>
    <input type="text" name="dni" placeholder="DNI">
    <br>
    <br>Password<br>
    <input type="password" minlength="8" maxlength="15" name="pass" placeholder="Contraseña">
    <br>
    <br>
    <br>
    <input type="submit" name="reg" value="Registrar">
    <input type="submit" name="reg" value="Cancelar">
    <input type="reset"  value="Restablecer">

</form>
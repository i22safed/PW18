<!DOCTYPE html>
<html lang="es">

<head>
	<title>Empleado</title>
</head>

<body>
<!--Se centra el titulo y se concatena con la imagen de la casa,(permite volver al menu de inicio) posicionandola al lado derecho-->
<?php
echo <<<END_;
<h1 align="center" style="background-color:#B2DF65;">Informacion de los empleados <right><a href="web1.html"> <img src="home.png" > </img> </a></right></h1>

<!--cellspacing: espacio entre celdas. cellpadding: espacio entre bordes de la celda y su contenido-->
	<table cellpadding="10" cellspacing="5" align="center" border="1" bgcolor="#B3DCE9">
	<!--tr, va creando las filas consecutivas, style cambia el color de las letras a negro-->
			<tr bgcolor="#A59AB1" style="color:black;">
				<th>Nombre</th>
				<th>Edad</th>
				<th>Ciudad</th>
				<th>Trabajo</th>
				<th>Enlace</th>
      </tr>

_END;
/*Funciones que permitan sacar los datos de la lista*/

echo <<<_END;
		<!--datos para sacar los elementos de la la base de datos, en forma de lista-->
    <tr>

			</tr>
	</table>
 	<p align="center"> Pulse en el simbolo "&#9757" para obtener mas informacion sobre los empleados.</p>
	<p align="center"> Si desea volver al menu de inicio, pulse en el icono de la casa.</p>
 _END; 
 ?>
</body>
</html>

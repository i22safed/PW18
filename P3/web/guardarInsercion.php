<?php

	require("functions.php");


	if($_POST["aux"] == 0)
	{
		echo "Estamos haciendo un INSERT";
		$sql = "INSERT INTO empleado (dni, nombre, apellidos, telefono, direccion, departamento, salario) 
					VALUES ('$_POST[dni]', '$_POST[nombre]', '$_POST[apellidos]', '$_POST[telefono]', '$_POST[direccion]', '$_POST[departamento]', '$_POST[salario]');";
	}


	$resultado = $conn->query ($sql);

	if (!$resultado)
		die ("Operación en base de datos fallida: " . $conn->error);

	$conn = null;

	header ("Location: index.php");
?>

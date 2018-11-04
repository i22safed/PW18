<?php

	//dni INT(8) not null,
	$dni = "$_POST[DNI]";

	//imagen VARCHAR(64),
	$imagen = "$_POST[DNI]".".jpg";

	//nombreCompleto VARCHAR(64) not null,
	$nombreCompleto = "$_POST[nombre]"." "."$_POST[apellidos]";

	//sexo VARCHAR(16) not null,
	$sexo = "$_POST[sexo]";

	// estudiosSuperiores VARCHAR(16) not null,
	$estudiosSuperiores = "$_POST[estudios]";

	//certificaciones VARCHAR(7),
	$cert = "cert";
	$certificaciones = "";
	$certInd = "";	
	for ($i = 0; $i <= 6; $i++) {
		$certInd = $cert.$i;
		if(isset($_POST[$certInd])){
			$certificaciones = $certificaciones."1";
		}else{
			$certificaciones = $certificaciones."0";
		}
	}

	// situacionLaboral VARCHAR(16) not null,
	$situacionLaboral = "$_POST[sitLab]";

	//email VARCHAR(32) not null,
	$email = "$_POST[correo]";

	//localidad INT(3) not null,
	$localidad = "$_POST[localidad]";

	//fechaNacimiento date not null,
	$fechaNacimiento = "$_POST[fechaNacimiento]";

	//telefono INT(14),
	$telefono = "$_POST[telefono]";

	require_once('functions.php');
	$qo = new empQueries();

	if(empty($qo->dbc)){
		echo "<h3 align='center'>¡Error!: No se pudo establecer la conexión con la
		base de datos.</h3><br/>";
		die();
	}else{
		echo "La conexión a la base de datos puta madre";
	}

	$qo->guardarInfo($dni, $imagen, $nombreCompleto, $sexo, $estudiosSuperiores,
	$certificaciones, $situacionLaboral, $email, $localidad, $fechaNacimiento, $telefono);

?>

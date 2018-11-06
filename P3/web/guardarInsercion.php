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
	}

	// Condiciones para la insercion ----------------------------------------------------------
	
	// Que el campo del DNI no esté vacío
	if(empty($dni)){
		echo "El campo DNI no puede estar vacío";
		return false;
	}
	// Que el DNI ya exista en la base de datos 
	if($qo->checkDNI($dni) == false){
		echo "El DNI ya existe en el sistema";
		return false;
	}
	// Que el DNI sea incorrecto (numero de digitos)
	if(strlen($dni) != 8){
		echo "El DNI longitud del es incorrecta"; 
		return false;
	}
	// Que el DNI contenga 8 caracteres pero tenga alguna letra
	if(ctype_digit($dni)!=true && strlen($dni) == 8){
		echo "El DNI contiene letras";
		return false;
	}
	// Que no se especifique correo 
	if(empty($email)){
		echo "El campo email no puede estar vacío ";
		return false;
	}
	// Que el correo ya exista 
	if($qo->checkEmail($email) == false){
		echo "El email ya existe en el sistema";
		return false;
	}
	// Que la fecha sea mayor que la fecha actual 
	if($qo->checkDate($fechaNacimiento) == true){
		echo "<br>La fecha es correcta ";
	}else{
		echo "<br>La fecha es incorrecta ";
		return false;
	}	
	// Que el telefono sea incorrecto (numero de digitos)
	if($qo->checkPhoneNumber($telefono) == true){
		echo "<br>El numero de telefono es correcto ";
	}else{
		echo "<br>El numero de telefono incorrecto ";
		return false;
	}	
	
	// Consulta SQL 
	
	if($qo->guardarInfo($dni, $imagen, $nombreCompleto, $sexo, $estudiosSuperiores,
	$certificaciones, $situacionLaboral, $email, $localidad, $fechaNacimiento, $telefono) == true){
		sleep(1);
		header('Location: /practicapw/empleados.php');
	}else{
		echo "<br>Error en la insercion<br>";
	}
	 
?>

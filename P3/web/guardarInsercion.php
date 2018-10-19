<?php

	
	$nombreCompleto = "$_POST[nombre]"." "."$_POST[apellidos]";
	

	echo "$_POST[DNI]";



	// Transformamos  los checkbox en cadena para almacenarla en la base de datos

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

	

	
	





?>

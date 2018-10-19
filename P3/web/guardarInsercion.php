<?php


	echo "$_POST[DNI]"; // Debemos comprobar que el DNI no exista 


	/** -------------------------------------------------------------------
	 * Hay que crear la funcionalidad para poder agregar una foto de perfil 
	 * --------------------------------------------------------------------
	 */

	$nombreCompleto = "$_POST[nombre]"." "."$_POST[apellidos]";

	$sexo = "$_POST[sexo]";

	echo "El sexo del pavo este es: ". $sexo . "<br>" ;
	
	$estudiosSuperiores = "$_POST[estudios]"; 
	
	echo "Los estudios del pavo este es: ". $estudiosSuperiores . "<br>" ;

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

	$situacionLaboral="";
	$email="";
	$localidad="";
	$fechaNacimiento="";
	$telefono="";

?>

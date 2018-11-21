<!--
  Documento para realizar la conexión a la base de datos de MySQL
  y los métodos correspondientes a la consulta de la tabla
-->

<?php

class empQueries{

  public $user = "davidpw";
  public $pass = "";
  public $dbc;

  public function __construct(){  // Constructor de la clase empQueries()
    $this->dbc = $this->dbconnect();
  }

  public function dbconnect(){  // Conexión a la base de datos
    $dbc = null;
    try {
      $dbc = new PDO('mysql:host=localhost; dbname=empleados', $this->user,
        $this->pass, array(PDO::ATTR_PERSISTENT => true));
    } catch (PDOException $e) {
         return null;
    }
    return $dbc;
  }

  public function getAllEmp(){  // Observador de los empleados de la tabla

    $empleados = array();
    $i = 0;
    $sentence = $this->dbc->prepare("SELECT * FROM empleados");

    if($sentence->execute()){
      while ($row = $sentence->fetch()){
        $empleados[$i] = $row;
        $i++;
      }
    }
    return $empleados;
  }

  public function getEmp($dniEmp){ // Observador de todos los empleados 

    $i = 0;
    $sentence = $this->dbc->prepare("SELECT * FROM empleados WHERE empleados.dni = '$dniEmp'");
    if($sentence->execute()){
      $emp = $sentence->fetch();
      return $emp;
    }else{
      echo "Error al cargar al usuario con DNI: $dniEmp";
      return false;
    }
  }

  // Inserción de empleados 
  public function guardarInfo($dni, $imagen, $nombreCompleto, $sexo, $estudiosSuperiores,
	$certificaciones, $situacionLaboral, $email, $localidad, $fechaNacimiento, $telefono){
 
    $sentence = $this->dbc->prepare("INSERT INTO empleados (dni,
    imagen, nombreCompleto, sexo, estudiosSuperiores, certificaciones, 
    situacionLaboral, email, localidad, fechaNacimiento, telefono)
    VALUES ('$dni', '$imagen', '$nombreCompleto', '$sexo', '$estudiosSuperiores',
    '$certificaciones', '$situacionLaboral', '$email', '$localidad', '$fechaNacimiento', 
    '$telefono');");

    if($sentence->execute()){
      echo "<br>Insertado el usuario: $nombreCompleto";
      return true;
    }else{
      echo "<br>Error al insertar al usuario: $nombreCompleto";
      return false;
    }
  } // Fin guardarInfo()

  public function editarInfo($dni, $imagen, $nombreCompleto, $sexo, $estudiosSuperiores,
	$certificaciones, $situacionLaboral, $email, $localidad, $fechaNacimiento, $telefono){
 
    $sentence = $this->dbc->prepare("UPDATE empleados 
    SET dni='$dni', imagen='$imagen', nombreCompleto='$nombreCompleto', sexo='$sexo', 
    estudiosSuperiores='$estudiosSuperiores', certificaciones='$certificaciones', 
    situacionLaboral='$situacionLaboral', email='$email', localidad='$localidad', 
    fechaNacimiento='$fechaNacimiento', telefono='$telefono' 
    WHERE dni = '$dni';");

    if($sentence->execute()){
      echo "<br>Modificado el usuario: $nombreCompleto";
      return true;
    }else{
      echo "<br>Error al modificar al usuario: $nombreCompleto";
      return false;
    }
  } // Fin editarInfo()

  public function deleteEmp($dni){

    $sentence = $this->dbc->prepare("DELETE FROM empleados WHERE dni = $dni;");
    
    if($sentence->execute() == true){
      return true;
    }else{
      return false;
    }
  } // Fin deleteEmp()

  // FIN DE FUNCIONES DE INSERCION, BORRADO Y MODIFICACION DE LOS DATOS Y 
  // CONSULTA Y CONEXIÓN A LA BASE DE DATOS 
  // ----------------------------------------------------------------------------------
  
  public function checkDNI($dni){   // Chequea si el DNI está en el sistema
    
    $sentence = $this->dbc->prepare("SELECT dni FROM empleados WHERE dni = '$dni';");
    
    if($sentence->execute()){
      $userDNI = $sentence->fetch();
      if(empty($userDNI)){
        return true;
      }else{
        return false;
      }
    }else{
      echo "Error al obtener el DNI";
      return false;
    }

  } // Fin checkDNI

  
  public function checkEmail($email){   // Chequea el email está en el sistema 
    
    $sentence = $this->dbc->prepare("SELECT email FROM empleados WHERE email = '$email';");
    
    if($sentence->execute()){
      $userEmail = $sentence->fetch();
      if(empty($userEmail)){
        return true;
      }else{
        return false;
      }
    }else{
      echo "Error al obtener el email";
      return false;
    }
  } // Fin checkEmail()

  public function checkDate($fechaNacimiento){  // Chequea que una fecha de nacimiento 
                                                // sea correcta 

    $valores = explode('-', $fechaNacimiento);
    $anio = (integer) $valores[0];
    $mes = (integer) $valores[1];
    $dia = (integer) $valores[2];
    $checker = getdate();

    // En caso de que sea un año anterior al actual retorna
    // true directamente
    if($anio < (integer) $checker['year']){
      return true;
    }
    if($anio > (integer) $checker['year']){
      return false;
    }

    // Para el caso de que sea el año actual (raro tener 
    // con menos de un año)
    if($anio == (integer) $checker['year']){

      if($mes < (integer) $checker['mon']){
        return true;
      }
      if($mes > (integer) $checker['mon']){
        return false;
      }
      if($mes == (integer) $checker['mon']){
        
        if($dia > (integer) $checker['mday']){
          return false;
        }
        if($dia < (integer) $checker['mday']){
          return true;
        }
        if($dia == (integer) $checker['mday']){
          return true;
        }
      }
    }
  } // Fin checkDate()

  public function checkPhoneNumber($telefono){

    $digitos = str_split($telefono);    

    if(strlen($telefono) != 9){
      echo "La longitud del telefono no es de 9";
      return false;
    }

    // Comprobamos que empiece por 6, 7 o 9 

    if((integer) $digitos[0] == 6 
        || (integer) $digitos[0] == 7 
        || (integer) $digitos[0] == 9){
      
    }else{
      return false;
    }

    if(ctype_digit($telefono)!=true ){
      echo "Retorna falso en letras en numero";
      return false;
    }
    
    return true;
  
  }

  public function checkValues($name,$value,$emp){

    // FALTA POR PONER LAS CONDICIONES PARA QUE ENTRE EN CADA UNO DE LOS CASOS

    // Comprobamos cada una de las variables de multiples opciones para ver 
    // lo que tenemos que chequear  en el formulario 

    // - Sexo     
    if((strcmp($name,'sexo')==0) && (strcmp($value,$emp['sexo'])==0)){
      return 'checked';
    }

    // - Estudios 
    if((strcmp($name,'estudios')==0) && (strcmp($value,$emp['estudiosSuperiores'])==0)){
      return 'selected';
    }
    
    $arrayCert = str_split($emp['certificaciones']);

    // - Certificaciones  
    if((strcmp($name,'cert0')==0) && (strcmp($value,$arrayCert[0])==0)){
      return 'checked';
    }
    if((strcmp($name,'cert1')==0) && (strcmp($value,$arrayCert[1])==0)){
      return 'checked';
    }
    if((strcmp($name,'cert2')==0) && (strcmp($value,$arrayCert[2])==0)){
      return 'checked';
    }
    if((strcmp($name,'cert3')==0) && (strcmp($value,$arrayCert[3])==0)){
      return 'checked';
    }
    if((strcmp($name,'cert4')==0) && (strcmp($value,$arrayCert[4])==0)){
      return 'checked';
    }
    if((strcmp($name,'cert5')==0) && (strcmp($value,$arrayCert[5])==0)){
      return 'checked';
    }
    if((strcmp($name,'cert6')==0) && (strcmp($value,$arrayCert[6])==0)){
      return 'checked';
    }
  
    // - Situacion Laboral
    if((strcmp($name,'sitLab')==0) && (strcmp($value,$emp['situacionLaboral'])==0)){
      return 'selected';
    }

    // - Localidad
    if((strcmp($name,'localidad')==0) && ($value==$emp['localidad'])){
      return 'selected';
    }

  } // Fin checkValues()

  public function cert2array($certificaciones){

    $certs = str_split($certificaciones);
    $cadenaCerts = '';

    // Para el caso de que no tenga ninguna certificación

    if((strcmp($certs[0],'0')==0) && (strcmp($certs[1],'0')==0) 
      && (strcmp($certs[2],'0')==0) && (strcmp($certs[3],'0')==0) 
      && (strcmp($certs[4],'0')==0) && (strcmp($certs[5],'0')==0) 
      && (strcmp($certs[6],'0')==0)){
      
        return 'Ninguna';
      
      }else{

        if(strcmp($certs[0],'1')==0){
          $cadenaCerts = $cadenaCerts . 'Amazon, ';
        } 
        if(strcmp($certs[1],'1')==0){
          $cadenaCerts = $cadenaCerts . 'Cisco, ';
        } 
        if(strcmp($certs[2],'1')==0){
          $cadenaCerts = $cadenaCerts . 'Linux, ';
        } 
        if(strcmp($certs[3],'1')==0){
          $cadenaCerts = $cadenaCerts . 'Java, ';
        }
        if(strcmp($certs[4],'1')==0){
          $cadenaCerts = $cadenaCerts . 'PL/SQL, ';
        }
        if(strcmp($certs[5],'1')==0){
          $cadenaCerts = $cadenaCerts . 'La Otra, ';
        }
        if(strcmp($certs[6],'1')==0){
          $cadenaCerts = $cadenaCerts . '..Y la que queda <br>';
        }
         return $cadenaCerts;
      }    
  } // Fin de cert2Array()


  public function loc2String($localidad){

    if($localidad==1){
      return 'Almeria';
    }
    if($localidad==2){
      return 'Cadiz';
    }
    if($localidad==3){
      return 'Cordoba';
    }
    if($localidad==4){
      return 'Granada';
    }
    if($localidad==5){
      return 'Sevilla';
    }
  } // Fin de loc2Array


} // Fin empQueries()

?>





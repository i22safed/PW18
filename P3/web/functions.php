<!--
  Documento para realizar la conexión a la base de datos de MySQL
  y los métodos correspondientes a la consulta de la tabla
-->

<?php

class empQueries{

  public $user = "davidpw";
  public $pass = "";
  public $dbc;

  public function __construct(){  // Constructo de la clase empQueries()
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

  public function getEmp($dniEmp){

    $i = 0;
    $sentence = $this->dbc->prepare("SELECT * FROM empleados WHERE empleados.dni = '$dniEmp'");
    if($sentence->execute()){
      $emp = $sentence->fetch();
      return $emp;
    }else{
      echo "Error al cargar al usuario con DNI: $dniEmp";
      return null;
    }
  }


  public function guardarInfo(){


      echo "Caca";

  }



} // Fin empQueries()

?>


<?php

// Definción de la clase consultasEmpleados y sus respectivos métodos

class consultasEmpleados{

  public $user = 'davidPW';  // Usuario
  public $pass = 'davidpw';  // Contraseña
  public $dbc;               // Objeto para la conexion con la base de datos
                             // PDO Object

  public function __construct(){
    $this->dbc = $this->dbconnet();
  }

  public function dbconnect(){
      $dbc = null;

      try {
        $dbc = new PDO('mysql:host=localhost; dbname=empleados', $this->user, $this->pass, array(PDO::ATTR_PERSISTENT => true));
      } catch (PDOException $e) {
        echo 'Error dbconnect()'
        return null;
      }
      return $dbc;
  }


  public function getAllEmp(){

    $empleados = array();
    $contador = 0;
    $query = $this->dbc->prepare("SELECT * FROM empleados");

    if($query->execute()){
      while($row=$query->fetch()){
        $empleados[$contador] = $row;

        if ($row['available'])
          $books[$i]['available'] = "Si";
        else
          $books[$i]['available'] = "No";

        $i++;

      }
    }
    return $empleados;
  }

    public function getEmp(){

      $empleados = getAllEmp();

      foreach($empleados as $empleado){
        if($empleado )
      }





  }

} // Fin de la clase consultasEmpleados

?>

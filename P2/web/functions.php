


<?php

public function __constructor(){
  $this->dbc = $this->dbconnect();
}


public function dbconnect(){

  $dbc = null;
  try { $dbc = new PDO('mysql:host=localhost; dbname=empleados',
    $this->usuario, $this->pass, array(PDO::ATTR_PERSISTENT => true));
  }catch (PDOException $e){
    return null;
  }
  return dbc;
}


class empQueries{

  public $user = 'admin'
  public $pass = ''




}





?>

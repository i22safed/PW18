<?php

require_once('functions.php');
  // Creamos un objeto para llamar a las consultas
  $qo = new empQueries();
  // Realizamos la conexión con la base de datos
  if(empty($qo->dbc)){
    echo "<h3 align='center'>¡Error!: No se pudo establecer la conexión con la
    base de datos.</h3><br/>";
    die();
  }
  $emp = $qo->getEmp($dni);
   ?>
<?php

  class Fechas
  {

    private $conn;

    function __construct(){
      require_once "../../../coreapp/Conexion.php";
      $con = new Conexion();
      $this->conn = $con->Conectar();
      return $this->conn;
    }

    public function 

  }

?>

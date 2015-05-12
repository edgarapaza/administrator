<?php
include "RemoteConnect.php";

class RemoteConnectTest extends PHPUnit_Framework_TestCase
{
  public function setUp(){ }
  public function tearDown(){ }
  public function testConnectionIsValid()
  {
    // prueba para asegurarse de que el objeto de un fsockopen es válido
    $connObj = new Mensaje();
    $valor = "Nuevo mensaje";
    $connObj->Mostrar($valor);
  }
}
?>
<?php
/**
*
*/
class PruebaTest extends PHPUnit_Framework_TestCase
{
    public function testListado()
    {
       $lista = array();

       $this->assertEquals(0,count($lista));

       array_push($lista, "33525");

       $this->assertEquals("33525",$lista[count($lista)-1]);
       $this->assertEquals(1,count($lista));

       array_push($lista,1234);
       $this->assertEquals(1234,$lista[count($lista)-1]);
    }

}
?>
<?php
function Listado($protocolo){
    require '../model/listadoClass.php';
    
    $test = new ListadoClass();
    $result = $test->Listado($protocolo);
    
    return $result;
}





        
<?php
function Listado(){
    require_once '../model/listadoClass.php';
    
    $test = new ListadoClass();
    $result = $test->Listado(1);
    
    return $result;
    
}



        
<?php

class SubserieClass {
    
    public function VerSubserie($codigo) {
        require '../coreapp/conection.php';
        
        $sql = "SELECT  des_sub FROM subseries WHERE cod_sub = $codigo;";
        $result = $mysqli->query($sql);
        
        $fila = $result->fetch_assoc();
        return $fila['des_sub'];
    }
}
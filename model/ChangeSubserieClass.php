<?php

class ChangeSubserieClass {
    
    public function ListadoSubseries($valor) {
        require '../coreapp/conection.php';
        
        $sql = "SELECT cod_sub, des_sub FROM subseries WHERE des_sub LIKE '%$valor%';";
        $result = $mysqli->query($sql);
        
        return $result;
    }
    
    public function ChangeSubserie($cod_sub, $cod_sct) {
        
        require '../coreapp/conection.php';
        
        $sql="UPDATE escrituras1 SET cod_sub = $cod_sub WHERE cod_sct = $cod_sct LIMIT 1;";
        $result = $mysqli->query($sql);
        
        return true;
    }
}

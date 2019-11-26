<?php

class NotariosClass {
    
    public function VerNotario($codigo) {
        require '../coreapp/conection.php';
        
        $sql = "SELECT CONCAT(nom_not,' ',pat_not,' ',mat_not) as notario FROM notarios WHERE cod_not = $codigo";
        $result = $mysqli->query($sql);
        $fila = $result->fetch_assoc();
        //echo $fila['notario'];
        return $fila['notario'];
    }
}

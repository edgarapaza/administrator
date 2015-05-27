<?php

class TrabajadorClass {
    //put your code here
    public function VerTrabajador($codigo) {
        require '../coreapp/conection.php';
        
        $sql = "SELECT CONCAT(nom_usu,' ',pat_usu,' ',mat_usu) AS trabajador FROM usuarios WHERE cod_usu = $codigo;";
        $result = $mysqli->query($sql);
        $fila = $result->fetch_assoc();
        //echo $fila['notario'];
        return $fila['trabajador'];
    }
}

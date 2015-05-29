<?php


class NombresClass {
    
    public function VerNombre($codigo) {
        require '../coreapp/conection.php';
        
        $sql = "SELECT CONCAT(Nom_inv,' ',Pat_inv,' ',Mat_inv) AS nombre FROM involucrados1 WHERE Cod_inv = $codigo;";
        $result = $mysqli->query($sql);
        $fila = $result->fetch_assoc();
        //echo $fila['notario'];
        return $fila['nombre'];
    }
    
    public function NombresDuplicados() {
        
        
    }
    
    public function AgregarNombre() {
        
    }
}

<?php

class AddPersonaClass {
    
    public function AgregarOtorgante($cod_sct, $cod_inv, $cod_per) {
        
        require '../coreapp/conection.php';
        
        $sql = "INSERT INTO escriotor1 (cod_sct, cod_inv, cod_per) VALUES ($cod_sct, $cod_inv, $cod_per);";
        $result = $mysqli->query($sql);
        
        return $result;
    }
    
    public function BuscarNombre($nombre, $paterno) {
        
        require '../coreapp/conection.php';
        
        $sql = "SELECT Cod_inv, Nom_inv, Pat_inv, Mat_inv FROM involucrados1 WHERE Nom_inv LIKE '%$nombre%' AND Pat_inv LIKE '%$paterno%';";
        $result = $mysqli->query($sql);
        
        return $result;
    }
    
    public function BuscarCompleto($nombre, $paterno, $materno) {
        
        require '../coreapp/conection.php';
        
        $sql = "SELECT Cod_inv, Nom_inv, Pat_inv, Mat_inv FROM involucrados1 WHERE Nom_inv LIKE '%$nombre%' AND Pat_inv LIKE '%$paterno%' AND Mat_inv LIKE '%$materno%';";
        $result = $mysqli->query($sql);
        
        return $result;
    }
}

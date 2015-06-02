<?php

class AddPersonaClass {
    
    public function AgregarOtorgante($cod_sct, $cod_inv, $cod_per) {
        
        require '../coreapp/conection.php';
        
        $sql = "INSERT INTO escriotor1 (cod_sct, cod_inv, cod_per,cod_inv_ju) VALUES ($cod_sct, $cod_inv, $cod_per,0);";
        $result = $mysqli->query($sql);
        
        return $result;
    }
    
    public function AgregarFavorecido($cod_sct, $cod_inv, $cod_per) {
        
        require '../coreapp/conection.php';
        
        $sql = "INSERT INTO escrifavor1 (cod_sct, cod_inv, cod_per,cod_inv_ju) VALUES ($cod_sct, $cod_inv, $cod_per,0);";
        $result = $mysqli->query($sql);
        
        return $result;
    }
    
    public function AgregarOtorganteJuridico($cod_sct,$cod_per,$cod_inv_ju) {
        
        require '../coreapp/conection.php';
        
        $sql = "INSERT INTO dbarp.escriotor1 (cod_sct,cod_inv,cod_per,cod_inv_ju) VALUES ($cod_sct,0,$cod_per,$cod_inv_ju);";
        $result = $mysqli->query($sql);
        
        return $result;
    }
    
    public function AgregarFavorecidoJuridico($cod_sct,$cod_per,$cod_inv_ju) {
        
        require '../coreapp/conection.php';
        
        $sql = "INSERT INTO dbarp.escrifavor1 (cod_sct,cod_inv,cod_per,cod_inv_ju) VALUES ($cod_sct,0,$cod_per,$cod_inv_ju);";
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
    
    public function BuscarJuridico($razonSocial) {
        
        require '../coreapp/conection.php';
        
        $sql = "SELECT Cod_inv, Raz_inv FROM involjuridicas1 WHERE Raz_inv LIKE '%$razonSocial%';";
        $result = $mysqli->query($sql);
        
        return $result;
    }

}


<?php


class NombreJuridicosClass {
    
    public function VerNombreJuridico($codigo) {
        require '../coreapp/conection.php';
        
        $sql = "SELECT Raz_inv FROM involjuridicas1 WHERE cod_inv = $codigo;";
        $result = $mysqli->query($sql);
        $fila = $result->fetch_assoc();
        //echo $fila['notario'];
        return $fila['Raz_inv'];
    }
}

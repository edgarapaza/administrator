<?php

class EliminarClass 
{
    public function BorrarOtorgante($codEscritura, $codInvolucrado) {
        require '../coreapp/conection.php';
               
        $sql= "DELETE FROM escriotor1 WHERE cod_inv = $codInvolucrado AND cod_sct = $codEscritura LIMIT 1;";
        $mysqli->query($sql);
    }
    
    public function BorrarFavorecido($codEscritura, $codInvolucrado) {
        require '../coreapp/conection.php';
        
        $sql= "DELETE FROM escrifavor1 WHERE cod_inv = $codInvolucrado AND cod_sct = $codEscritura LIMIT 1;";
        $mysqli->query($sql);
    }
    
    public function BorrarOtorganteJuridico($codEscritura, $codInvolucrado) {
        require '../coreapp/conection.php';
        
        $sql= "DELETE FROM escriotor1 WHERE cod_inv_ju = $codInvolucrado AND cod_sct = $codEscritura LIMIT 1;";
        $mysqli->query($sql);
    }
    
    public function BorrarFavorecidoJuridico($codEscritura, $codInvolucrado) {
        require '../coreapp/conection.php';
        
        $sql= "DELETE FROM escrifavor1 WHERE cod_inv_ju = $codInvolucrado AND cod_sct = $codEscritura LIMIT 1;";
        $mysqli->query($sql);
    }
}
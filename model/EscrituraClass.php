<?php

class EscrituraClass {

    var $conn;

    function __construct()
    {

    }

    public function Escrituras($numero) {
        require_once '../coreapp/conection.php';
        
        $escritura = "SELECT num_sct,cod_pro,num_fol, fec_doc, nom_bie, obs_sct, cod_sub FROM dbarp.escrituras1 WHERE cod_sct = $numero;";
        echo $mysqli->host_info." Escrituras";
        $query1 = $mysqli->query($escritura);
        $result1 = $query1->fetch_assoc();
        $mysqli->close();

    }

    public function ListadoOtorgantes($numero) {
        
        require_once '../coreapp/conection.php';
        
        $otor = "SELECT cod_inv,cod_inv_ju FROM escriotor1 WHERE cod_sct= $numero;";
        echo $mysqli->host_info." Otorgantes";
        $query2 = $mysqli->query($otor);
        $result2 = $query2->fetch_assoc();
        $mysqli->close();
    }

    public function ListadoFavorecido($numero) {
        require_once '../coreapp/conection.php';    
        echo $mysqli->host_info." Favorecidos";
        $fav = "SELECT cod_inv,cod_inv_ju FROM escrifavor1 WHERE cod_sct= $numero;";
        $query3 = $mysqli->query($fav);
        $r_escr3 = $query3->fetch_assoc();
        $mysqli->close();
    }
}

$dato = new EscrituraClass();
$dato->Escrituras(1);
$dato->ListadoOtorgantes(1);
$dato->ListadoFavorecido(1);

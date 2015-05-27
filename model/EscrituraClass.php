<?php

class EscrituraClass {

    function __construct()
    {
        
    }

    public function Escrituras($numero) {
        require '../coreapp/conection.php';
        
        $escritura = "SELECT cod_sct, cod_not, num_sct,cod_dst,fec_doc,cod_sub,nom_bie,can_fol,cod_pro,obs_sct,num_fol,cod_usu,hra_ing,proy_id FROM dbarp.escrituras1 WHERE cod_sct = $numero;";

        $query1 = $mysqli->query($escritura);

        $mysqli->close();
        return $query1;

    }

    public function ListadoOtorgantes($numero) {
        
        require '../coreapp/conection.php';
        
        $otor = "SELECT cod_inv,cod_inv_ju FROM escriotor1 WHERE cod_sct= $numero;";

        $query2 = $mysqli->query($otor);

        $mysqli->close();
        return $query2;
    }

    public function ListadoFavorecido($numero) {
        
        require '../coreapp/conection.php';
        
        
        $fav = "SELECT cod_inv,cod_inv_ju FROM escrifavor1 WHERE cod_sct= $numero;";

        $query3 = $mysqli->query($fav);

        $mysqli->close();
        return $query3;
    }
}

?>
<?php

class CambiarDatosClass {
    //put your code here
    public function Actualizar($cod_sct, $num_sct, $fec_doc, $nom_bie, $can_fol, $obs_sct, $num_fol ) {
        require '../coreapp/conection.php';

        $sql = "UPDATE escrituras1 SET num_sct = '$num_sct', fec_doc = '$fec_doc', nom_bie = '$nom_bie', can_fol = $can_fol, obs_sct = '$obs_sct', num_fol = '$num_fol' WHERE cod_sct = $cod_sct LIMIT 1;";
        //echo $sql;
        $mysqli->query($sql);
    }
    
    public function ActualizarSubSerie($cod_sct, $cod_sub) {
        require '../coreapp/conection.php';

        $sql = "UPDATE escrituras1 SET cod_sub = $cod_sub WHERE cod_sct = $cod_sct LIMIT 1;";
        //echo $sql;
        $mysqli->query($sql);
    }
}


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
    
    public function DatosEscrituras($numero) {
        
        require '../coreapp/conection.php';
        
        $dataEscrituras = $this->Escrituras($numero);
        
        while($fila = $dataEscrituras->fetch_assoc())
        {
            /*echo $fila['cod_sct']."<br>";
            echo $fila['cod_not']."<br>";
            echo $fila['num_sct']."<br>";
            echo $fila['cod_dst']."<br>";
            echo $fila['fec_doc']."<br>";
            echo $fila['cod_sub']."<br>";
            echo $fila['nom_bie']."<br>";
            echo $fila['can_fol']."<br>";
            echo $fila['cod_pro']."<br>";
            echo $fila['obs_sct']."<br>";
            echo $fila['num_fol']."<br>";
            echo $fila['cod_usu']."<br>";
            echo $fila['hra_ing']."<br>";
            echo $fila['proy_id']."<br>";
            */
            echo 'Codigo Escritura: '.$fila['cod_sct']."<br>";
            echo 'Codigo Notario: '.$fila['cod_not']."<br>";
            echo 'Numero de Escritura: '.$fila['num_sct']."<br>";
            echo 'Cod distrito: '.$fila['cod_dst']."<br>";
            echo 'Fecha del Documento: '.$fila['fec_doc']."<br>";
            echo 'Codigo sub serie: '.$fila['cod_sub']."<br>";
            echo 'Nombre del bien: '.$fila['nom_bie']."<br>";
            echo 'Cantidad de Folios: '.$fila['can_fol']."<br>";
            echo 'Numero de Protocolo: '.$fila['cod_pro']."<br>";
            echo 'Observaciones: '.$fila['obs_sct']."<br>";
            echo 'Numero de Folio: '.$fila['num_fol']."<br>";
            echo 'Codigo de usuario: '.$fila['cod_usu']."<br>";
            echo 'Hora de ingreso: '.$fila['hra_ing']."<br>";
            echo 'Codigo del Proyecto: '.$fila['proy_id']."<br>";
            
        }
        echo "Otorgantes -----------------------------------------------------<br>";
        $dataOtorgantes = $this->ListadoOtorgantes($numero);
        
        while($filao = $dataOtorgantes->fetch_assoc())
        {
            echo $filao['cod_inv']."<br>";
        }
        echo "Otorgantes Juridicos-----------------------------------------------------<br>";
        while($filao = $dataOtorgantes->fetch_assoc())
        {
            echo $filao['cod_inv_ju']."<br>";
        }
        
        echo "Favorecidos -----------------------------------------------------<br>";
        $dataFavorecidos = $this->ListadoFavorecido($numero);
        
        while($filaf = $dataFavorecidos->fetch_assoc())
        {
            echo $filaf['cod_inv']."<br>";
        }
        echo "Favorecidos Juridicos-----------------------------------------------------<br>";
        while($filaf = $dataFavorecidos->fetch_assoc())
        {
            echo $filaf['cod_inv_ju']."<br>";
        }
        
    }
    
}

$dato = new EscrituraClass();
//$dato->Escrituras(1);
//$dato->ListadoOtorgantes(1);
//$dato->ListadoFavorecido(2);
$dato->DatosEscrituras(355677);

?>
<?php
class Administracion{

    public function NumeroEscrituras($cod_proyecto)
    {
        require_once '../coreapp/conection.php';

        $sql    = "SELECT count(*) as total FROM escrituras1 WHERE proy_id = $cod_proyecto;";
        $result = $mysqli->query($sql);
        $numero = $result->fetch_assoc();
        printf("Proyecto %s tiene %d Escrituras",$cod_proyecto, $numero["total"]);
        return $numero["total"];

        $mysqli->close();

    }

    public function TotalEscrituras()
    {
        require_once '../coreapp/conection.php';
        require "CantidadClass.php";

        $sql    = "SELECT proy_id FROM escrituras1 WHERE proy_id <> 0  group by proy_id;";
        $result = $mysqli->query($sql);

        while($valor = $result->fetch_assoc()){
            //echo $valor["proy_id"]."<br>";
            $mio = new Cantidad();
            $mio->Contar($valor["proy_id"]);
        }

    }

}

?>
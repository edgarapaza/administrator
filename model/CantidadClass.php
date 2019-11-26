<?php

class Cantidad
{
    function Contar($codigo)
    {
        include "../coreapp/conection.php";

        $sql    = "SELECT count(*) as total FROM escrituras1 WHERE proy_id =".$codigo;
        $result = $mysqli->query($sql);
        $numero = $result->fetch_assoc();
        printf("Proyecto %s tiene %d Escrituras <br>",$codigo, $numero["total"]);

        return $numero["total"];
    }
}
?>
<?php

if(isset($_REQUEST['revisar']))
{
    $numeroProtocolo = $_REQUEST["protocolo"];
    echo $numeroProtocolo." Recibido";
    echo "presiono el boton Revisar";
    $fp = fopen("protocolo.txt", "w+");
    fputs($fp, $numeroProtocolo);
    fclose($fp);
    header("Location: escrituras.php");
}
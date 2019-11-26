<?php

$salida = array();

    $texto = "Edgar";
    exec("python contar.py '".$texto."'",$salida);
    echo $salida[0];
?>
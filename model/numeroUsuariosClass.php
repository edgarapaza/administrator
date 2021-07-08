<?php

function NumeroAtenciones()
{
    include '../coreapp/Conexion.php';
    $conn = new Conexion();
    $link = $conn->Conectar();
    

    $result = $link->query($sql);
    $dato = $result->fetch_assoc();
    return $dato["Total"];
}
?>
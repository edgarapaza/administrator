<?php
function NumeroAtenciones()
{
    include '../coreapp/conectionRecepcion.php';
    $fecha = date('Y-m-d');
    $sql = "SELECT COUNT(*) as Total FROM solicitudes WHERE fecha BETWEEN '$fecha 00:00:00' AND '$fecha 23:59:59'";

    $result = $mysqli->query($sql);
    $dato = $result->fetch_assoc();
    return $dato["Total"];
}
?>
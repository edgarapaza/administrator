<?php
include '../model/reporteanual.php';
$n = new Administracion();

include '../view/header.php';

$recibe = $_REQUEST['tipo'];
$numero = $_REQUEST['numero'];

if($recibe == "todos")
{
    $n->TotalEscrituras();
}

if ($recibe == "especificar")
{
    $n->NumeroEscrituras($numero);
}
?>

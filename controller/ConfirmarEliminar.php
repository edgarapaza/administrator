<?php

$codEscritura=$_REQUEST['codigoEscritura'];
$codInvolucrado =$_REQUEST['codigoInvolucrado'];
$tipo =$_REQUEST['opcion'];


if($tipo == "otorgante")
{
        echo $tipo." Eliminado";
        require '../model/EliminarClass.php';
        $del = new EliminarClass();
        
        $del->BorrarOtorgante($codEscritura, $codInvolucrado);
}

if($tipo == "favorecido")
{
        echo $tipo." Eliminado";
        require '../model/EliminarClass.php';
        $del = new EliminarClass();
        
        $del->BorrarFavorecido($codEscritura, $codInvolucrado);
}

if($tipo == "otorganteJuridico")
{
        echo $tipo." Eliminado";
        require '../model/EliminarClass.php';
        $del = new EliminarClass();
        
        $del->BorrarOtorganteJuridico($codEscritura, $codInvolucrado);
                
}

if($tipo == "favorecidoJuridico")
{
        echo $tipo." Eliminado";
        require '../model/EliminarClass.php';
        $del = new EliminarClass();
        
        $del->BorrarFavorecidoJuridico($codEscritura, $codInvolucrado);
}
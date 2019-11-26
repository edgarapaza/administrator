<?php

require '../model/CambiarDatosClass.php';

$cod_sct = $_REQUEST['codigoEscritura'];
$num_sct = $_REQUEST['numeroEscritura'];
$fec_doc = $_REQUEST['fechaDocumento'];
$nom_bie = $_REQUEST['nombreBien'];
$can_fol = $_REQUEST['cantidadFolios'];
$obs_sct = $_REQUEST['observaciones'];
$num_fol = $_REQUEST['numeroFolio'];

/*
echo "Codigo de escritrura:".$cod_sct."<br>";
echo "Numero de Escritura:".$num_sct."<br>";
echo "Fecha del documetno:".$fec_doc."<br>";
echo "Nombre del bien:".$nom_bie."<br>";
echo "Cantidad de folios:".$can_fol."<br>";
echo "Observaciones:".$obs_sct."<br>";
echo "Numero de Folios:".$num_fol."<br>";
*/
if(isset($_REQUEST['btnGuardarCambios']))
{
   // echo "Boton Actualizar datos";
    $edgar = new CambiarDatosClass();
    $edgar->Actualizar($cod_sct, $num_sct, $fec_doc, $nom_bie, $can_fol, $obs_sct, $num_fol);
    echo ("<script type='javascript'>('window.history.back(2)'),'_self')</script>");
    echo "<a href='javascript:history.back(1)'>Dato Cambiado -  PRESIONE PARA REGRESAR</a>";
}

if(isset($_REQUEST['btnCambiarSubSerie']))
{
    //echo "Boton Cambiar Sub Serie datos";
    $edgar = new CambiarDatosClass();
    $edgar->ActualizarSubSerie($cod_sct, $cod_sub);
    header("Location: escrituras.php");
}
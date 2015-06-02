<?php
$cod_sct = $_REQUEST['cod_sct'];
$cod_sub = $_REQUEST['codigoSubserie'];


echo "Escritura:".$cod_sct;
echo "Involucrado:".$cod_sub;

ChangeSubserie($cod_sub, $cod_sct);

        
function ChangeSubserie($cod_sub, $cod_sct) {
    
    require '../model/ChangeSubserieClass.php';
    
    $sub = new ChangeSubserieClass();
    $sub->ChangeSubserie($cod_sub, $cod_sct);

}


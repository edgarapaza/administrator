<?php
$escritura = $_REQUEST['cod_sct'];
$involucrado = $_REQUEST['involucrado'];
$personal = $_REQUEST['cod_per'];

/*echo "Escritura:".$escritura;
echo "Involucrado:".$involucrado;
echo "Personal:".$personal;
*/
echo "Persona Agregada a la Escritura.  CIERRE LA VENTANA";

AddOtorgante( $escritura, $involucrado, $personal);
        
function AddOtorgante($cod_sct, $cod_inv, $cod_per) {
    
    require '../model/AddPersonaClass.php';
    $add = new AddPersonaClass();
    $add->AgregarOtorgante($cod_sct, $cod_inv, $cod_per);
}


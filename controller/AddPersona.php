<?php

function AddOtorgante($codigo, $escritura,$personal) {
    
    require '../model/AddPersona.php';
    $add = new AddPersona();
    $add->AgregarOtorgante($codigo, $escritura, $personal);
}


AddPersona();


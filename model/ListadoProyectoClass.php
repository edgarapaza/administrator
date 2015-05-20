<?php
class ListadoProyectoClass {

    public function Listado($protocolo) {

        require_once '../coreapp/conection.php';
        $sql = "SELECT cod_sct FROM escrituras1 WHERE proy_id = (SELECT proy_id FROM proyectos WHERE num_protocolo = $protocolo);";
        $result = $mysqli->query($sql);

        return $result;
    }
}





<?php
require_once '../model/reportesClass.php';

/**
*
*/
class Estadisticas
{
    public function Mostrar()
    {

        $show = new Reportes();
        $valor = $show->IngresosDia();
        return $valor;
    }

    public function mensaje($msg)
    {
        $nuevo = $msg." Hola";
        return $nuevo;
    }
}

?>
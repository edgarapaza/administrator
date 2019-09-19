<?php
/**
*
*/
class Reportes
{

    public function IngresosDia()
    {
        require_once '../coreapp/Conexion.php';
        $conection = new Conexion();
        $mysqli = $conection->Conectar();
        $hoy = date("Y-m-d");
        $sql = "SELECT COUNT(cod_sct) AS ingresos FROM escrituras1 WHERE hra_ing LIKE '$hoy%';";

        if(!$result = $mysqli->query($sql)); //si la conexión cancelar programa
        $row = $result->fetch_assoc();
        return $row['ingresos'];
    }
}
?>
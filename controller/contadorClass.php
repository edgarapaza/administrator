<?php

class Contador 
{

    private $lista;

    public function __construct() {

        require_once '../controller/listado.php';

        $valores = Listado();
        $this->lista = array();
        while($fila = $valores->fetch_array())
        {
            //echo $fila[0];
            $this->lista[] = $fila[0];
        }

    }

    public function ImprimirLista($item) {
        echo $this->lista[$item];
    }

    public function TotalLista() {
        echo count($this->lista);
    }

    public function Contador()
        {
            $archivo = "visitas.txt";
            $info = array();

            //comprobar si existe el archivo
            if (file_exists($archivo)){
                // abrir archivo de texto y introducir los datos en el array $info
                $fp = fopen($archivo,"r");
                $contador = fgets($fp, 26);
                $info = explode(" ",$contador);
                fclose($fp);

                // poner nombre a cada dato
                $mes_actual = date("m");
                $mes_ultimo = $info[0];
                $visitas_mes = $info[1];
                $visitas_totales = $info[2];
            }else{
                // inicializar valores
                $mes_actual = date("m");
                $mes_ultimo = "0";
                $visitas_mes = 0;
                $visitas_totales = 0;
            }

            // incrementar las visitas del mes según si estamos en el mismo
            // mes o no que el de la ultima visita, o ponerlas a cero
            if ($mes_actual==$mes_ultimo){
                $visitas_mes++;
            }else{
                $visitas_mes=1;
            }
            $visitas_totales++;

            // reconstruir el array con los nuevos valores
            //$info[0] = $mes_actual;
            $info[0] = "Edgar";
            $info[1] = $visitas_mes;
            $info[2] = $visitas_totales;

            // grabar los valores en el archivo de nuevo
            $info_nueva = implode(" ",$info);
            $fp = fopen($archivo,"w+");
            fwrite($fp, $info_nueva, 26);
            fclose($fp);
            // devolver el array
                //var_dump($info);
                //echo "valor : ".$info[2];
            return $info[2];
        }

    public function ContadorMenos()
        {
            $archivo = "visitas.txt";
            $info = array();

            //comprobar si existe el archivo
            if (file_exists($archivo)){
                // abrir archivo de texto y introducir los datos en el array $info
                $fp = fopen($archivo,"r");
                $contador = fgets($fp, 26);
                $info = explode(" ",$contador);
                fclose($fp);

                // poner nombre a cada dato
                $mes_actual = date("m");
                $mes_ultimo = $info[0];
                $visitas_mes = $info[1];
                $visitas_totales = $info[2];
            }else{
                // inicializar valores
                $mes_actual = date("m");
                $mes_ultimo = "0";
                $visitas_mes = 0;
                $visitas_totales = 0;
            }

            // incrementar las visitas del mes según si estamos en el mismo
            // mes o no que el de la ultima visita, o ponerlas a cero
            if ($mes_actual==$mes_ultimo){
                $visitas_mes++;
            }else{
                $visitas_mes=1;
            }
            $visitas_totales--;

            // reconstruir el array con los nuevos valores
            //$info[0] = $mes_actual;
            $info[0] = "Edgar";
            $info[1] = $visitas_mes;
            $info[2] = $visitas_totales;

            // grabar los valores en el archivo de nuevo
            $info_nueva = implode(" ",$info);
            $fp = fopen($archivo,"w+");
            fwrite($fp, $info_nueva, 26);
            fclose($fp);
            // devolver el array
                //var_dump($info);
                //echo "valor : ".$info[2];
            return $info[2];
        }

}





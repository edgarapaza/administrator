<?php

class Listado {

    private $lista;
    private $contador;
    public function __construct() {

        $this->contador=0;

        $this->lista = array();

        $this->lista[0] = 3325;
        $this->lista[1] = 3326;
        $this->lista[2] = 3330;
        $this->lista[3] = 3331;
        $this->lista[4] = 3333;
        $this->lista[5] = 3356;
        $this->lista[6] = 3388;

    }

    public function ImprimirLista() {
        for($i=0;$i<=count($this->lista);$i++)
        {
            echo $this->lista[$i]."<br>";
        }
    }

    public function TotalLista() {
        echo count($this->lista);
    }

    public function Inicio() {
        echo "Funcion inicio. ";
        echo reset($this->lista);
    }

    public function Siguiente() {

        echo "Funcion Siguiente. ";
        echo next($this->lista);
    }

    public function Incrementar() {
        echo $this->contador++;
        $this->contador++;
    }

}

$mio = new Listado();
$mio->TotalLista();
echo "<br>";
$mio->ImprimirLista();
echo $mio->Siguiente();

?>

<html>
    <head>
        <title></title>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
           <input type="submit" name="enviar" value="enviar">
           <input type="text" name="contador" value="<?php echo $cont; ?>">
        </form>
    </body>
</html>
<?php
function contador()
{
    echo "Dentro de la funcion";
 // fichero donde se guardaran las visitas
 $fichero = "visitas.txt";
    
/* @var $fptr File */
    $fptr = fopen($fichero,"r");
 
 // sumamos una visita  
 $num = fread($fptr,filesize($fichero));
 $num++;

 $fptr = fopen($fichero,"w+");
 fwrite($fptr,$num);

 echo $num;
 return $num;
}

contador();
?>
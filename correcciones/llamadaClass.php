$mio = new Listado();
//$mio->Listado(1);

echo " Escrituras en Total a Revisar.".$mio->TotalLista();
echo "<br>";



if(isset($_REQUEST["siguiente"]))
{
    $mio->ImprimirLista($mio->Contador()-1);

}

if(isset($_REQUEST["anterior"]))
{
    $mio->ImprimirLista($mio->ContadorMenos());

}

if(isset($_REQUEST["reiniciar"]))
{
    echo "Lista Vacia";
    $archivo = "visitas.txt";
    $info = array();
    $info_nueva = implode(" ",$info);
    $fp = fopen($archivo,"w+");
       //Coloca el archivo en Cero
    fwrite($fp, 0, 26);
    fclose($fp);
}
?>

<html>
    <head>
        <title></title>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
           <input type="submit" name="siguiente" value="Siguiente">
           <input type="submit" name="anterior" value="Anterior">
           <input type="submit" name="reiniciar" value="Desde el principio">
        </form>
    </body>
</html>

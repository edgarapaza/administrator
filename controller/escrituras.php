<?php
require 'listado.php';
$protocoloEnviado = $_REQUEST['protocolo'];
echo "<br><br>El protocolo enviado es: ".$protocoloEnviado."<br>";

$resultado = Listado(2630);
$lista = array();
while($fila = $resultado->fetch_array())
{
    $lista[]=$fila[0];
}


$numeroArray = count($lista);
echo "Numero Total de Datos ".$numeroArray."<br>";


/*
 *     TODO EL LISTADO PROVENIENTE DEL ARRAY SE ALMACENA
 *     EN EL ARRAY LISTA
 *     Imprimiendo el listado del array
 *
for($i=0;$i<=count($lista)-1;$i++){
   echo $lista[$i]."<br>";
}
 *
 */

$limite= $numeroArray;

$cont=$_GET['contador']; 

if ($cont+1 <= $limite && $cont >= 0 && isset($_GET['contador'])){  
    if (isset($_GET['mas'])){  
        $cont++; 
    } 
    if (isset($_GET['menos']) && $cont-1 > 0){  
       $cont--; 
    }  
} else { 
  $cont = 0; 
} 


function DatosEscrituras($numero) {

        require '../model/EscrituraClass.php';
        require '../model/NotariosClass.php';
        require '../model/DistritoClass.php';
        require '../model/SubserieClass.php';
        require '../model/NombresClass.php';
        require '../model/TrabajadorClass.php';

        $notario = new NotariosClass();
        $distritos = new DistritoClass();
        $subserie = new SubserieClass();
        $nombre = new NombresClass();
        $trabajador = new TrabajadorClass();

        
        $recojo = new EscrituraClass();

        $dataEscrituras = $recojo->Escrituras($numero);

        $fila = $dataEscrituras->fetch_assoc();


            /*
            echo 'Codigo Escritura: '.$fila['cod_sct']."<br>";
            echo 'Codigo Notario: '.$notario->VerNotario($fila['cod_not'])."<br>";
            echo 'Numero de Escritura: '.$fila['num_sct']."<br>";
            echo 'Cod distrito: '.$distritos->VerDistrito($fila['cod_dst'])."<br>";
            echo 'Fecha del Documento: '.$fila['fec_doc']."<br>";
            echo 'Codigo sub serie: '.$fila['cod_sub']."<br>";
            echo 'Nombre del bien: '.$fila['nom_bie']."<br>";
            echo 'Cantidad de Folios: '.$fila['can_fol']."<br>";
            echo 'Numero de Protocolo: '.$fila['cod_pro']."<br>";
            echo 'Observaciones: '.$fila['obs_sct']."<br>";
            echo 'Numero de Folio: '.$fila['num_fol']."<br>";
            echo 'Codigo de usuario: '.$fila['cod_usu']."<br>";
            echo 'Hora de ingreso: '.$fila['hra_ing']."<br>";
            echo 'Codigo del Proyecto: '.$fila['proy_id']."<br>";
             * */



?>

<html>

<head>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Sistema de Revision de Protocolos</title>
</head>




<body>

<div class="general">
<div class="superior">Bienvenido</div><br>
<div class="cuerpo">
	<div class="cabecera">
	<b>Sistema de Revision de Protocolos</b>
	</div>
	<br>

<div class="part1">
	<div class="left">

			<table>
                            <p>Codigo Revisando: <?php echo $fila['cod_sct']; ?></p>

                            Num Escritura <input type="text" name="numeroEscritura" value="<?php echo $fila['num_sct'];?>">


<table >

   <tr>
    <td id="l">Escritura</td><td id="R"><?php echo $fila['num_sct'];?></td>
  </tr>
  <tr>
    <td id="l">Protocolo</td><td id="R"><?php echo $fila['cod_pro']; ?></td>
  </tr>
  <tr>
    <td id="l">Folio</td><td id="R"><?php echo $fila['num_fol']; ?></td>
  </tr>
  <tr>
    <td id="l">Fecha</td><td id="R"><?php echo $fila['fec_doc'];?></td>
  </tr>
  <tr>
	<td><button name="boton" type="submit"><img src="img/search.jpg" widht='10' height='20'> Search </button></td>
</tr>

</table>
			</table>

		</div>




	<div class="right">

<table >

   <tr>
       <td id="l">Otorgantes</td><td id="R">
           <?php
            //echo "Otorgantes -----------------------------------------------------<br>";
            $dataOtorgantes = $recojo->ListadoOtorgantes($numero);

            while($filao = $dataOtorgantes->fetch_assoc())
            {
                echo $nombre->VerNombre($filao['cod_inv'])."<br>";
            }
            echo "-------------------------------------------------------------------------";
           ?>
       </td>
  </tr>
  <tr>
      <td id="l">Favorecidos</td><td id="R">
          <?php
            //echo "Favorecidos -----------------------------------------------------<br>";
            $dataFavorecidos = $recojo->ListadoFavorecido($numero);

            while($filaf = $dataFavorecidos->fetch_assoc())
            {
                echo $nombre->VerNombre($filaf['cod_inv'])."<br>";
            }
            echo "-------------------------------------------------------------------------";
          ?>
      </td>
  </tr>
  <tr>
      <td id="l">Otros juridicos</td><td id="R">
          <?php
            //echo "Otorgantes Juridicos-----------------------------------------------------<br>";
            while($filao = $dataOtorgantes->fetch_assoc())
            {
                echo $filao['cod_inv_ju']."<br>";
            }
          ?>
      </td>
  </tr>
  <tr>
      <td id="l">Juridicos</td><td id="R">
          <?php
            //echo "Favorecidos Juridicos-----------------------------------------------------<br>";
            while($filaf = $dataFavorecidos->fetch_assoc())
            {
                echo $filaf['cod_inv_ju']."<br>";
            }

          ?>
      </td> </tr>
  <tr>
	<td><button name="boton" type="submit"><img src="img/search.jpg" widht='10' height='20'> Editar </button></td>
</tr>

</table>







	</div></div>

<br>

<div class="part2">
	<div class="center">

		<table>
			<tr><td>Nombre de Bien:</td><td><?php echo $fila['nom_bie'];?></td>
			</tr>
			<tr><td>Sub Serie:</td><td><?php echo $subserie->VerSubserie($fila['cod_sub']);?></td>
			</tr>

            <tr><td>Notario</td><td><?php echo $notario->VerNotario($fila['cod_not']);?></td>
            </tr>
            <tr><td>Distrito:</td><td><?php echo $distritos->VerDistrito($fila['cod_dst']);?></td>
            </tr>
            <tr><td>Total Folios:</td><td><?php echo $fila['can_fol'];?></td>
            </tr>
            <tr><td>Codigo Trabajador:</td><td><?php echo $trabajador->VerTrabajador($fila['cod_usu']);?></td>
            </tr>
            <tr><td>Hora Ingreso:</td><td><?php echo $fila['hra_ing'];?></td>
            </tr>
            <tr><td>Numero de Proyecto:</td><td><?php echo $fila['proy_id'];?></td>
            </tr>

		</table>

	</div><br>


	<div class="OBS">

	<div class="left2">

		<p>Observaciones</p>

		<TEXTAREA  name="observaciones">
                    <?php echo $fila['obs_sct'];?>
		</TEXTAREA>

		 <input type="submit" value="Enviar este formulario" />

	</div>




	<div class="right2">

		<p>Correcciones</p>
		<textarea name="correcciones">

		</textarea>

	</div>

<div class="boton">
	<center>
	<button name="Conforme" type="submit"><img src="img/Check-icon.png" widht='30' height='20'> Conforme </button>
	<button name="Cerrar" type="submit"><img src="img/cancel.jpg" widht='30' height='20'> Cerrar </button>
	</center>
</div>



</div>
</div>
</div>

    
</div>

</body>

</html>
    <?php
        }

//    DatosEscrituras($lista[2]);
?>
<form action="" method="get"> 
    <input name="mas" type="submit" value="Siguiente >>"> 
        <?php echo "Registro:".$cont; echo DatosEscrituras($lista[$cont]); ?> 
        <input name="menos" type="submit" value="<< Retroceder"> 
        <input type="hidden" name="contador" value="<?php echo $cont ?>"> 
    </form>
<?php
session_start();

require 'listado.php';

// Recoge el numero de protocolo de la session
$numeroProtocolo = $_SESSION['protocolo'];
echo "<br><br>NUMERO DE PROTOCOLO: ".$numeroProtocolo;

$resultado = Listado($numeroProtocolo);
$lista = array();

while($fila = $resultado->fetch_array())
{
    $lista[]=$fila[0];
}

//Numero total de regsitro del protocolo dentro del array
$numeroArray = count($lista);
echo " (Numero de Datos: ".$numeroArray." )";
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

echo " ----------------------  Registro Actual: ".$cont;
echo DatosEscrituras($lista[$cont]);




  function DatosEscrituras($numero)
    {

          require '../model/EscrituraClass.php';
          require '../model/NotariosClass.php';
          require '../model/DistritoClass.php';
          require '../model/SubserieClass.php';
          require '../model/NombresClass.php';
          require '../model/TrabajadorClass.php';
          require '../model/NombreJuridicosClass.php';

          $notario = new NotariosClass();
          $distritos = new DistritoClass();
          $subserie = new SubserieClass();
          $nombre = new NombresClass();
          $trabajador = new TrabajadorClass();
          $recojo = new EscrituraClass();
          $nombreJuridico = new NombreJuridicosClass();

          $dataEscrituras = $recojo->Escrituras($numero);
          $fila = $dataEscrituras->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Sistema de Revision de Protocolos</title>
</head>

<body>

    <?php
      $numero_EscrituraIngresada = $_REQUEST['numeroEscrituraIngresada'];
      
      echo $numero_EscrituraIngresada;
      $val = $recojo->Buscar(300, 1935);

            $filaee = $val->fetch_assoc();
           // echo $filaee['cod_sct'];
      if($filaee['cod_sct'] == $fila['cod_sct'])
      {
       //echo "Cod de la escritura: ".$fila['cod_sct'];
       // echo "La Escritura existe";
        //echo DatosEscrituras();
      }
      else
      {
        //echo "La escribtua no existe";
      }

    ?>


<div class="general">
    <div class="superior">
      <table>
        <tr>
          <td width="30%">El protocolo enviado es:</td>
          <td width="20%">El numero total de datos es: </td>
          <td width="20%">El Registro es: <?php echo $fila['cod_sct'];?></td>
          <td width="20%"> <a href="../correcciones/index.php" style="color:white;">Nuevo Protocolo</a></td>
        </tr>
      </table>

    </div>
    <br>
    <div class="cuerpo">
      <div class="cabecera">
         <b>Sistema de Revision de Protocolos</b>
      </div>
        <form action="CambiarDatos.php" method="post">

            <input type="hidden" name="codigoEscritura" value="<?php echo $fila['cod_sct'];?>" />
        <div class="part1">
            <div class="left">
                    <table >
                          <tr>
                            <td id="l">Folio: *</td><td id="R"><input type="text" name="numeroFolio" value="<?php echo $fila['num_fol']; ?>" /></td>
                          </tr>
                           <tr>
                            <td id="l">Escritura: *</td><td id="R"><input type="text" name="numeroEscritura" value="<?php echo $fila['num_sct'];?>" /></td>
                          </tr>
                          <tr>
                                <td>Total Folios: *</td>
                                <td><input type="text" name="cantidadFolios" value="<?php echo $fila['can_fol'];?>" /></td>
                          </tr>
                          <tr>
                            <td id="l">Fecha: *</td><td id="R"><input type="date" name="fechaDocumento" value="<?php echo $fila['fec_doc'];?>" /></td>
                          </tr>
                          <tr>
                          <td><button name="buscarEscritura" type="button" ><img src="img/Search.jpg" widht='10' height='20'> Buscar </button></td>
                          <td><button name="boton" type="button"><img src="img/editar.jpg" widht='10' height='20'> Editar </button></td>
                        </tr>

                    </table>
            </div>

            <div class="right">

            <table border="1">
                <tr>
                        <td id="l">Otorgantes</td>
                        <td id="C">
                            <?php
                              //echo "Otorgantes -----------------------------------------------------<br>";
                              $dataOtorgantes = $recojo->ListadoOtorgantes($numero);

                              while($filao = $dataOtorgantes->fetch_assoc())
                                  {
                                  if($filao['cod_inv'] != 0)
                                  {
                                      echo $nombre->VerNombre($filao['cod_inv']);
                              ?>


                                <input name="boton1" size="10" type="button" onclick="javascript:window.open('../controller/modificarNombres.php?cod_usu=<?php echo $filao['cod_inv'];?>','','width=800, height=500, scrollbars=YES');" value="Corregir Nombre" />
                                <input name="boton1" size="10" type="button" onclick="javascript:window.open('../controller/elimnarNombre.php?cod_usu=<?php echo $filao['cod_inv'];?>&cod_sct=<?php echo $fila['cod_sct'];?>','','width=500, height=200, scrollbars=NO');" value="X" />

                         <?php
                                echo "<br>";
                                  }
                            }

                       ?>
                        </td>
                        <td id="R"><input name="boton1" size="10" type="button" onclick="javascript:window.open('AddOtorgante.php?cod_sct=<?php echo $fila['cod_sct'];?>&cod_per=<?php echo $fila['cod_usu'];?>','','width=800, height=500, scrollbars=YES');" value="Agregar Otorgante" /></td>
                </tr>
                <tr>
                    <td id="l">Favorecidos</td>
                    <td id="C">
                        <?php

                          $dataFavorecidos = $recojo->ListadoFavorecido($numero);

                          while($filaf = $dataFavorecidos->fetch_assoc())
                          {
                              if($filaf['cod_inv'] != 0)
                              {
                                  echo $nombre->VerNombre($filaf['cod_inv']);


                          ?>
                            <input name="boton1" size="10" type="button" onclick="javascript:window.open('../controller/modificarNombres.php?cod_usu=<?php echo $filaf['cod_inv'];?>','','width=800, height=500, scrollbars=YES');" value="Corregir Nombre" />
                            <input name="boton1" size="10" type="button" onclick="javascript:window.open('../controller/elimnarNombreF.php?cod_inv=<?php echo $filaf['cod_inv'];?>&cod_sct=<?php echo $fila['cod_sct'];?>','','width=500, height=200, scrollbars=NO');" value="X" />
                          <?php
                            echo "<br>";
                              }
                          }

                        ?>
                    </td>

                    <td id="R"><input name="boton1" size="10" type="button" onclick="javascript:window.open('AddFavorecido.php?cod_sct=<?php echo $fila['cod_sct'];?>&cod_per=<?php echo $fila['cod_usu'];?>','','width=800, height=500, scrollbars=YES');" value="Agregar Favorecido" /></td>
                </tr>

                <tr>
                        <td id="l">Otorgantes Juridicos</td>
                        <td id="C">
                          <?php
                            //echo "Otorgantes Juridicos-----------------------------------------------------<br>";
                          $dataOtorgantes = $recojo->ListadoOtorgantes($numero);

                            while($filaoj = $dataOtorgantes->fetch_assoc())
                            {
                                if($filaoj['cod_inv_ju'] != 0)
                                {
                                echo $nombreJuridico->VerNombreJuridico($filaoj['cod_inv_ju']);
                            ?>
                            <input name="boton1" size="10" type="button" onclick="javascript:window.open('../controller/modificarNombresJuridicos.php?cod_inv=<?php echo $filaoj['cod_inv_ju'];?>','','width=1100, height=400, scrollbars=YES');" value="Corregir Nombre" />
                            <input name="boton1" size="10" type="button" onclick="javascript:window.open('../controller/elimnarJuridicoO.php?cod_inv=<?php echo $filaoj['cod_inv_ju'];?>&cod_sct=<?php echo $fila['cod_sct'];?>','','width=500, height=200, scrollbars=NO');" value="X" />
                          <?php
                                echo "<br>";
                                }
                            }
                          ?>
                        </td>
                        <td id="R"><input name="boton1" size="10" type="button" onclick="javascript:window.open('AddOtorganteJuridico.php?cod_sct=<?php echo $fila['cod_sct'];?>&cod_per=<?php echo $fila['cod_usu'];?>','','width=800, height=500, scrollbars=NO');" value="Add Otorgante Juridico" /></td>
                </tr>

                <tr>
                        <td id="l">Favorecidos Juridicos</td>
                        <td id="C">
                          <?php
                            //echo "Favorecidos Juridicos-----------------------------------------------------<br>";}
                            $dataFavorecidos = $recojo->ListadoFavorecido($numero);

                            while($filaf = $dataFavorecidos->fetch_assoc())
                            {
                                if($filaf['cod_inv_ju'] != 0)
                                {
                                echo $nombreJuridico->VerNombreJuridico($filaf['cod_inv_ju']);
                            ?>
                            <input name="boton1" size="10" type="button" onclick="javascript:window.open('../controller/modificarNombresJuridicos.php?cod_inv=<?php echo $filaf['cod_inv_ju'];?>','','width=1100, height=400, scrollbars=YES');" value="Corregir Nombre" />
                            <input name="boton1" size="10" type="button" onclick="javascript:window.open('../controller/elimnarJuridicoF.php?cod_inv=<?php echo $filaf['cod_inv_ju'];?>&cod_sct=<?php echo $fila['cod_sct'];?>','','width=600, height=600, scrollbars=NO');" value="X" />
                          <?php
                                echo "<br>";
                                }
                            }
                          ?>
                        </td>
                        <td id="R"><input name="boton1" size="10" type="button" onclick="javascript:window.open('AddFavorecidoJuridico.php?cod_sct=<?php echo $fila['cod_sct'];?>&cod_per=<?php echo $fila['cod_usu'];?>','','width=800, height=500, scrollbars=NO');" value="Add Favorecido Juridico" /></td>
                </tr>
            </table>

            </div>
        </div>
        <br>

        <div class="part2">
                <div class="center">

                <table>
                        <tr>
                                <td>Nombre de Bien: *</td>
                                <td><input type="text" name="nombreBien" value="<?php echo $fila['nom_bie'];?>" size="100" /></td>
                        </tr>
                        <tr>
                                <td>Sub Serie: *</td>
                                <td><?php echo $subserie->VerSubserie($fila['cod_sub']);?> <input name="boton1" size="10" type="button" onclick="javascript:window.open('CambiarSubserie.php?cod_sct=<?php echo $fila['cod_sct'];?>','','width=800, height=500, scrollbars=YES');" value="Cambiar la serie" /> </td>
                        </tr>
                        <tr>
                            <td>Notario</td>
                            <td><?php echo $notario->VerNotario($fila['cod_not']);?></td>
                        </tr>
                        <tr>
                                <td>Distrito:</td>
                                <td><?php echo $distritos->VerDistrito($fila['cod_dst']);?></td>
                        </tr>

                        <tr>
                                <td>Codigo Trabajador:</td>
                                <td><?php echo $trabajador->VerTrabajador($fila['cod_usu']);?></td>
                        </tr>
                        <tr>
                                <td>Hora Ingreso:</td>
                                <td><?php echo $fila['hra_ing'];?></td>
                        </tr>
                        <tr>
                                <td>Numero de Proyecto:</td>
                                <td><?php echo $fila['proy_id'];?></td>
                        </tr>

                </table>

                </div>
                <br>
                <div class="OBS">
                        <div class="left2">
                                <p>Observaciones</p>
                                <TEXTAREA  name="observaciones">
                                      <?php echo $fila['obs_sct'];?>
                                </TEXTAREA>
                                <input type="submit" name="btnGuardarCambios" value="Guardar Cambios" />
                        </div>
                </div>
        </div>
        </form>

        <!-- FORMLARIO PARA GUARDAR LAS CORRECCIONES HECHAS EN EL FORMULARIO -->
        <form action="" method="post">
                <div class="right2">
                        <p>Correcciones</p>
                        <textarea name="correcciones"></textarea>
                        <input type="submit" name="btnCorrecciones" value="Guardar Correcciones" />
                </div>
        </form>

        </div>
</div>



    </div>
</div>



</body>
</html>
<?php  } ?>
  <form action="" method="get">
        <input name="mas" type="submit" value="Siguiente >>">
        <input name="menos" type="submit" value="<< Retroceder">
        <input type="hidden" name="contador" value="<?php echo $cont; ?>">
  </form>

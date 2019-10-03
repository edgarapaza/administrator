<?php
session_start();

require 'listado.php';

// Recoge el numero de protocolo de la session
$numeroProtocolo = $_SESSION['protocolo'];
echo $numeroProtocolo;

$resultado = Listado($numeroProtocolo);
$lista = array();

while($fila = $resultado->fetch_array())
{
    $lista[]=$fila[0];
}

//Numero total de regsitro del protocolo dentro del array
$numeroArray = count($lista);

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

echo DatosEscrituras($lista[$cont]);




  function DatosEscrituras($numero)
    {

          require_once '../model/EscrituraClass.php';
          require_once '../model/NotariosClass.php';
          require_once '../model/DistritoClass.php';
          require_once '../model/SubserieClass.php';
          require_once '../model/NombresClass.php';
          require_once '../model/TrabajadorClass.php';
          require_once '../model/NombreJuridicosClass.php';

          $notario = new NotariosClass();
          $distritos = new DistritoClass();
          $subserie = new SubserieClass();
          $nombre = new NombresClass();
          $trabajador = new TrabajadorClass();
          $recojo = new EscrituraClass();
          $nombreJuridico = new NombreJuridicosClass();

          $dataEscrituras = $recojo->Escrituras($numero);
          $fila = $dataEscrituras->fetch_assoc();

          $notario->VerNotario($fila['cod_not']);

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="../js/bootstrap.js"></script>
  <script src="../js/jquery.js"></script>
  <script src="../js/npm.js"></script>
  <title>Escritura</title>
</head>
<body>
  <div class="container">
    <header class="row bg-info">
      <div class="col-md-12">
        <h2>
          Sistema de Revision de Protocolos
        </h2>
        <em><?php echo "NUMERO DE PROTOCOLO: ".$numeroProtocolo; ?></em>
        <p>
          <?php
            echo " (Numero de Datos: ".$numeroArray." )";
            echo " ----------------------  Registro Actual: ".$cont;

           ?>
        </p>
      </div>
    </header>
  </div>

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
    <div class="">
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
         <strong></strong>
      </div>
      <form action="CambiarDatos.php" method="post">
        <input type="hidden" name="codigoEscritura" value="<?php echo $fila['cod_sct']; ?>" />

      </form>

        <div class="part1">
            <div class="left">
              <table>
                <tr>
                  <td id="l">Folio: *</td>
                  <td id="R"><input type="text" name="numeroFolio" class="form-control" value="<?php echo $fila['num_fol']; ?>" /></td>
                </tr>
                 <tr>
                  <td id="l">Escritura: *</td>
                  <td id="R"><input type="text" name="numeroEscritura"  class="form-control" value="<?php echo $fila['num_sct'];?>" /></td>
                </tr>
                <tr>
                  <td>Total Folios: *</td>
                  <td><input type="text" name="cantidadFolios"  class="form-control" value="<?php echo $fila['can_fol'];?>" /></td>
                </tr>
                <tr>
                  <td id="l">Fecha: *</td>
                  <td id="R"><input type="date" name="fechaDocumento"  class="form-control" value="<?php echo $fila['fec_doc'];?>" /> </td>
                </tr>
                <tr>
                  <td><button name="buscarEscritura" type="button" class="btn btn-success">Buscar </button></td>
                  <td><button name="boton" type="button" class="btn btn-success"> Editar </button></td>
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
                    <td id="R">
                      <input name="boton1" size="10" type="button" onclick="javascript:window.open('AddOtorgante.php?cod_sct=<?php echo $fila['cod_sct'];?>&cod_per=<?php echo $fila['cod_usu'];?>','','width=800, height=500, scrollbars=YES');" value="Agregar Otorgante" />
                    </td>
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

                      <td id="R">
                        <input name="boton1" size="10" type="button" onclick="javascript:window.open('AddFavorecido.php?cod_sct=<?php echo $fila['cod_sct'];?>&cod_per=<?php echo $fila['cod_usu'];?>','','width=800, height=500, scrollbars=YES');" value="Agregar Favorecido" />
                      </td>
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
                    <td id="R">
                      <input name="boton1" size="10" type="button" onclick="javascript:window.open('AddOtorganteJuridico.php?cod_sct=<?php echo $fila['cod_sct'];?>&cod_per=<?php echo $fila['cod_usu'];?>','','width=800, height=500, scrollbars=NO');" value="Add Otorgante Juridico" />
                    </td>
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
                    <td id="R">
                      <input name="boton1" size="10" type="button" onclick="javascript:window.open('AddFavorecidoJuridico.php?cod_sct=<?php echo $fila['cod_sct'];?>&cod_per=<?php echo $fila['cod_usu'];?>','','width=800, height=500, scrollbars=NO');" value="Add Favorecido Juridico" />
                    </td>
                  </tr>
              </table>
            </div>
        </div>

        <div class="part2">
          <div class="center">
                <table>
                        <tr>
                                <td>Nombre de Bien: *</td>
                                <td><input type="text" name="nombreBien" value="<?php echo $fila['nom_bie'];?>" size="100" /></td>
                        </tr>
                        <tr>
                                <td>Sub Serie: *</td>
                                <td><?php echo $subserie->VerSubserie($fila['cod_sub']);?> <button name="boton1" type="button" class="btn btn-danger" onclick="javascript:window.open('CambiarSubserie.php?cod_sct=<?php echo $fila['cod_sct'];?>','','width=800, height=500, scrollbars=YES');"> Cambiar la Serie</button></td>
                        </tr>
                        <tr>
                            <td>Notario</td>
                            <td><?php echo ?></td>
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

</body>
</html>
<?php  } ?>
  <form action="" method="get">
        <input name="mas" type="submit" value="Siguiente >>">
        <input name="menos" type="submit" value="<< Retroceder">
        <input type="hidden" name="contador" value="<?php echo $cont; ?>">
  </form>

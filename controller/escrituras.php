<?php
require 'listado.php';

function leer_fichero_completo(){
   //abrimos el archivo de texto y obtenemos el identificador
   $nombre_fichero="protocolo.txt";
   $fichero_texto = fopen ($nombre_fichero, "r");
   //obtenemos de una sola vez todo el contenido del fichero
   //OJO! Debido a filesize(), sólo funcionará con archivos de texto
   $contenido_fichero = fread($fichero_texto, filesize($nombre_fichero));
   return $contenido_fichero;
}

$numeroProtocolo = leer_fichero_completo();
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

          $notario = new NotariosClass();
          $distritos = new DistritoClass();
          $subserie = new SubserieClass();
          $nombre = new NombresClass();
          $trabajador = new TrabajadorClass();
          $recojo = new EscrituraClass();

          $dataEscrituras = $recojo->Escrituras($numero);
          $fila = $dataEscrituras->fetch_assoc();

?>


<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Sistema de Revision de Protocolos</title>
</head>

<body>

<div class="general">
    <div class="superior">
      <table>
        <tr>
          <td width="30%">El protocolo enviado es:</td>
          <td width="30%">El numero total de datos es: </td>
          <td width="30%">El Registro es: <?php echo $fila['cod_sct'];?></td>
        </tr>
      </table>

    </div>
    <br>
    <div class="cuerpo">
      <div class="cabecera">
         <b>Sistema de Revision de Protocolos</b>
      </div>
        <form action="CambiarDatos.php" method="get">
            
            <input type="hidden" name="codigoEscritura" value="<?php echo $fila['cod_sct'];?>" />
        <div class="part1">
            <div class="left">
                    <table >
                           <tr>
                            <td id="l">Escritura: *</td><td id="R"><input type="text" name="numeroEscritura" value="<?php echo $fila['num_sct'];?>" /></td>
                          </tr>
                          <tr>
                            <td id="l">Protocolo:</td><td id="R"><?php echo $fila['cod_pro']; ?></td>
                          </tr>
                          <tr>
                            <td id="l">Folio: *</td><td id="R"><input type="text" name="numeroFolio" value="<?php echo $fila['num_fol']; ?>" /></td>
                          </tr>
                          <tr>
                            <td id="l">Fecha: *</td><td id="R"><input type="date" name="fechaDocumento" value="<?php echo $fila['fec_doc'];?>" /></td>
                          </tr>
                          <tr>
                          <td><button name="boton" type="button"><img src="img/Search.jpg" widht='10' height='20'> Buscar </button></td>
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
                                      echo $nombre->VerNombre($filao['cod_inv']);
                              ?>
                                <input name="boton1" size="10" type="button" onclick="javascript:window.open('../controller/modificarNombres.php?cod_usu=<?php echo $filao['cod_inv'];?>','','width=500, height=300, scrollbars=NO');" value="Corregir Nombre" />

                         <?php
                            }
                            
                       ?>
                        </td>
                        <td id="R">Agregar Otorgante</td>
                </tr>
                <tr>
                    <td id="l">Favorecidos</td>
                    <td id="C">
                        <?php

                          $dataFavorecidos = $recojo->ListadoFavorecido($numero);

                          while($filaf = $dataFavorecidos->fetch_assoc())
                          {
                              echo $nombre->VerNombre($filaf['cod_inv']);
                          ?>
                        <input name="boton1" size="10" type="button" onclick="javascript:window.open('../controller/modificarNombres.php?cod_usu=<?php echo $filaf['cod_inv'];?>','','width=500, height=300, scrollbars=NO');" value="Corregir Nombre" />
                          <?php
                          }
                          
                        ?>
                    </td>
                    
                    <td id="R">Agregar Favorecido</td>
                </tr>
                
                <tr>
                        <td id="l">Otorgantes Juridicos</td>
                        <td id="C">
                          <?php
                            //echo "Otorgantes Juridicos-----------------------------------------------------<br>";
                            while($filao = $dataOtorgantes->fetch_assoc())
                            {
                                echo $filao['cod_inv_ju']."<br>";
                            }
                          ?>
                        </td>
                        <td id="R"></td>
                </tr>
                
                <tr>
                        <td id="l">Favorecidos Juridicos</td>
                        <td id="C">
                          <?php
                            //echo "Favorecidos Juridicos-----------------------------------------------------<br>";
                            while($filaf = $dataFavorecidos->fetch_assoc())
                            {
                                echo $filaf['cod_inv_ju']."<br>";
                            }
                          ?>
                        </td>
                        <td id="R"></td>
                </tr>
            </table>

            </div>
        </div>
        <br>

        <div class="part2">
            <div class="center">

              <table>
                <tr><td>Nombre de Bien: *</td><td><input type="text" name="nombreBien" value="<?php echo $fila['nom_bie'];?>" size="100" /></td>
                </tr>
                <tr><td>Sub Serie: *</td><td><?php echo $subserie->VerSubserie($fila['cod_sub']);?> <input type="button" name="btnCambiarSubSerie" value="Cambiar Subserie" /></td>
                </tr>

                      <tr><td>Notario</td><td><?php echo $notario->VerNotario($fila['cod_not']);?></td>
                      </tr>
                      <tr><td>Distrito:</td><td><?php echo $distritos->VerDistrito($fila['cod_dst']);?></td>
                      </tr>
                      <tr><td>Total Folios: *</td><td><input type="text" name="cantidadFolios" value="<?php echo $fila['can_fol'];?>" /></td>
                      </tr>
                      <tr><td>Codigo Trabajador:</td><td><?php echo $trabajador->VerTrabajador($fila['cod_usu']);?></td>
                      </tr>
                      <tr><td>Hora Ingreso:</td><td><?php echo $fila['hra_ing'];?></td>
                      </tr>
                      <tr><td>Numero de Proyecto:</td><td><?php echo $fila['proy_id'];?></td>
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
        <form action="" method="get">
            <div class="right2">
              <p>Correcciones</p>
                 <textarea name="correcciones"></textarea>
                 <input type="submit" name="btnCorrecciones" value="Guardar Correcciones" />
            </div>
        </form>

    </div>
</div>

        <footer>
            <center>
                <br>
                <div class="foot1">
                    <img src="img/ARCHIVO_REGIONAL.png" width="50px" height="60px">
                </div>
                    <div class="foot2">
                        Archivo Regional Puno 2015
                    <p>Oficina de Informatica</p>
                </div>
            </center>
        </footer>

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
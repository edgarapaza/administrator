<?php
include_once "../header.php";
require_once "../../model/Conexion.php";

$conn = new Conexion();

$fec_actual= date("Y-m-d");
$cod_usu = $_REQUEST['trab'];
$fec_ini = $_REQUEST['fecha_ini'];
$fec_fin = $_REQUEST['fecha_fin'];

if($fec_fin == ""){
   $sql = "SELECT hra_ing,cod_usu,cod_sct,num_sct FROM escrituras1";
   $sql .=" WHERE hra_ing LIKE '$fec_ini%' ";
   $sql .= "AND cod_usu like '$cod_usu' ORDER BY hra_ing";

   $query = $conn->ConsultaCon($sql);
   }
   else{
   	if($fec_ini == $fec_fin){

    	$sql = "SELECT hra_ing,cod_usu,cod_sct,num_sct FROM escrituras1 ";
      $sql .=" WHERE hra_ing LIKE '$fec_ini%' ";
      $sql .= "AND cod_usu like '$cod_usu' ORDER BY hra_ing";

      $query = $conn->ConsultaCon($sql);
  	}
  	else{
  	   $sql = "SELECT hra_ing,cod_usu,cod_sct,num_sct FROM escrituras1 ";
  	   $sql .=" WHERE hra_ing between '$fec_ini 00:00:00' AND '$fec_fin 23:59:59' ";
  	   $sql .= "AND cod_usu like '$cod_usu' ORDER BY hra_ing";

  	  $query = $conn->ConsultaCon($sql);
     	}
  }
?>

  
    <div class="grid-x grid-margin-x grid-padding-y">
      <div class="cell small-12 medium-12">
        <h2>Reportes Diarios de Ingreso a la Base de Datos</h2>
      </div>
    </div>

    

    <div class="grid-x grid-margin-x">

      <div class="cell medium-4">
        <p>Opciones:
          <a class="button success" href="report_ingreso_print.php?trab=<?php echo $cod_usu;?>&fecha_ini=<?php echo $fec_ini;?>&fecha_fin=<?php echo $fec_fin;?>">Exportar la Lista a Excel</a></p>
          <form name="buscar" method="get" action="">
            <p>Trabajador:
              <select name="trab" class="form-control">
                <option value="%">Todos</option>
                <?php
                  $sql2 = "SELECT cod_usu, CONCAT(nom_usu,' ',pat_usu) AS Usuario FROM usuarios WHERE estado_usu = 1";
                   $tra = $conn->ConsultaCon($sql2);
                   while ($res_tra = $tra->fetch_array()){
                ?>
                <option value="<?php echo $res_tra[0];?>">
                  <?php echo $res_tra[1];?>
                </option>
                <?php
                   }
                ?>
              </select>
            
              
              <br />
            </p>

            Dia: (Marque la Fecha en el Calendario) <br/>
            Empieza:
            <input type="date" class="form-control" name="fecha_ini" value="<?php echo $fec_actual;?>" id="fecha_ini" />
            
            Finaliza:
            <input type="date" class="form-control" name="fecha_fin" />
            <input name="buscar2" type="submit" class="button large" value="Buscar" />
          </form>
      </div>

      <div class="cell medium-8">
          Total de Filas: <b><?php $n = $query->num_rows; echo $n;?></b><br/>
          Trabajador:
          <?php
           if($cod_usu == "%"){
             echo "Todos los Usuarios";
           }
           else{
            $sql3 = "SELECT CONCAT(nom_usu,' ',pat_usu,' ',mat_usu) AS Usuario FROM usuarios WHERE cod_usu = $cod_usu AND estado_usu = 0";
             @$Dat = $conn->ConsultaArray($sql);
             
             echo $Dat[0];
           }
           ?>

           <table border="1" class="table">
            <tr>
               <th>Hra_Ing</th>
               <th>Usuario</th>
               <th>Cod_sct</th>
               <th>Num_Sct</th>
            </tr>
            <?php
            while($fila= $query->fetch_array()){
            $datos = array("hora"=>$fila[0],"usuario"=>$fila[1],"escritura"=>$fila[2],"num_sct"=>$fila[3]);
            ?>
            <tr>
               <td><?php echo $datos["hora"];?></td>
               <td><?php echo $datos["usuario"];?></td>
               <td><?php echo $datos["escritura"];?></td>
               <td><?php echo $datos["num_sct"];?></td>
            </tr>
            <?php
            }
            ?>
          </table>
      </div>
          
    </div>

<?php include_once "../footer.php";?>
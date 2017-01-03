<?php
require_once '../../coreapp/Conexion.php';
$link = new Conexion();
$conn = $link->Conectar();

$fec_actual= date("Y-m-d");
$cod_usu = $_REQUEST['trab'];
$fec_ini = $_REQUEST['fecha_ini'];
$fec_fin = $_REQUEST['fecha_fin'];

if($fec_fin == ""){
   $sql = "SELECT hra_ing,cod_usu,cod_sct,num_sct FROM escrituras1";
   $sql .=" WHERE hra_ing LIKE '$fec_ini%' ";
   $sql .= "AND cod_usu like '$cod_usu' ORDER BY hra_ing";

   $query = $conn->query($sql);
   }
   else{
   	if($fec_ini == $fec_fin){

    	$sql = "SELECT hra_ing,cod_usu,cod_sct,num_sct FROM escrituras1 ";
      $sql .=" WHERE hra_ing LIKE '$fec_ini%' ";
      $sql .= "AND cod_usu like '$cod_usu' ORDER BY hra_ing";

      $query = $conn->query($sql);
  	}
  	else{
  	   $sql = "SELECT hra_ing,cod_usu,cod_sct,num_sct FROM escrituras1 ";
  	   $sql .=" WHERE hra_ing between '$fec_ini 00:00:00' AND '$fec_fin 23:59:59' ";
  	   $sql .= "AND cod_usu like '$cod_usu' ORDER BY hra_ing";

  	  $query = $conn->query($sql);
     	}
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <title>Busqueda</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Reportes Diarios de Ingreso a la Base de Datos</h2>

      </div>
    </div>

    <br>

    <div class="row">

      <div class="col-md-4 bg-info">
        <p align="left">Opciones:
          <a href="report_ingreso_print.php?trab=<?php echo $cod_usu;?>&fecha_ini=<?php echo $fec_ini;?>&fecha_fin=<?php echo $fec_fin;?>">Exportar la Lista a Excel</a> |  <a href="index.php">Menu Principal</a></p>
          <form name="buscar" method="get" action="">
            <p align="left">Trabajador:
              <select name="trab" class="form-control">
                <option value="%">Todos</option>
                <?php
                   $tra = $conn->query("SELECT cod_usu, CONCAT(nom_usu,' ',pat_usu) AS Usuario FROM usuarios WHERE estado_usu = 1");
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
            <input name="buscar2" type="submit" class="btn btn-danger" value="Buscar" />
          </form>
      </div>


      <div class="col-md-8">
          Total de Filas: <b><?php $n = $query->num_rows; echo $n;?></b><br/>
          Trabajador:
          <?php
           if($cod_usu == "%"){
             echo "Todos los Usuarios";
           }
           else{
             @$nom = $conn->query("SELECT CONCAT(nom_usu,' ',pat_usu,' ',mat_usu) AS Usuario FROM usuarios WHERE cod_usu = $cod_usu AND estado_usu = 0");
             @$Dat = $nom->fetch_array();
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
    </div>

    <script src="js/bootstrap.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="js/npm.js" type="text/javascript" charset="utf-8" async defer></script>
</body>
</html>

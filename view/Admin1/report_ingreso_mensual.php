<?php
require_once '../../coreapp/Conexion.php';
$link = new Conexion();
$conn = $link->Conectar();

$fec_actual = date("Y-m-d");
$cod_usu    = $_REQUEST['trab'];
$mes        = $_REQUEST['mes'];
$anio       = $_REQUEST['anio'];

   $sql = "SELECT COUNT(*) FROM escrituras1 WHERE hra_ing BETWEEN '$anio-$mes-01 00:00:00' AND '$anio-$mes-30 23:59:59' AND cod_usu LIKE '$cod_usu';";
   $res = $conn->query($sql);
   $valor = $res->fetch_array();
?>

<!DOCTYPE html>
<html lang="en">
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
        <h3>Reportes Mensual de Ingreso a Base de Datos</h3>
      </div>
    </div>

    <div class="row">
      <form action="">
        <div class="col-md-6">

          <p>
          Opciones:
            <a href="report_ingreso_print.php?trab=<?php echo $cod_usu;?>&fecha_ini=<?php echo @$fec_ini;?>&fecha_fin=<?php echo @$fec_fin;?>">Exportar la Lista a Excel</a> |  <a href="index.php">Menu Principal</a>
          </p>
          
          <p>Trabajador:
            <select name="trab" class="form-control">
              <option value="%">Todos</option>
              <?php
              $tra =$conn->query("SELECT cod_usu, CONCAT(nom_usu,' ',pat_usu) AS Usuario FROM usuarios WHERE chk_usu <> 0 AND estado_usu = 1;");
              while ($res_tra = $tra->fetch_array()){
              ?>
              <option value="<?php echo $res_tra[0];?>">
                <?php echo $res_tra[1];?>
              </option>
              <?php
              }
              ?>
            </select>
          </p>

          <label for="mes">Mes:</label>
          <select name="mes" id="mes" class="form-control">
            <option value="01">Enero</option>
            <option value="02">Febrero</option>
            <option value="03">Marzo</option>
            <option value="04">Abril</option>
            <option value="05">Mayo</option>
            <option value="06">Junio</option>
            <option value="07">Julio</option>
            <option value="08">Agosto</option>
            <option value="09">Setiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
          </select>

          <label>A&ntilde;o</label>
          <select name="anio" id="anio" class="form-control">
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019" selected>2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            
          </select>

          <button name="buscar2" type="submit" class="btn btn-danger"/>Consultar</button>
        </div>

        <div class="col-md-6">
          <h2>
        Trabajador:
          <?php
           if($cod_usu == "%"){
            echo "Todos los Usuarios";
           }
           else{
             @$nom = $conn->query("SELECT CONCAT(nom_usu,' ',pat_usu,' ',mat_usu) AS Usuario FROM usuarios WHERE cod_usu = $cod_usu");
             $Dat = $nom->fetch_array();
             echo $Dat[0];
           }
           ?>
        </h2>

        <h2><alert class="alert-danger">Total de Ingresos en el Mes de

          <?php
           $mes;
          switch ($mes) {
             case 1: echo "Enero"; break;
             case 2: echo "Febrero"; break;
             case 3: echo "Marzo"; break;
             case 4: echo "Abril"; break;
             case 5: echo "Mayo"; break;
             case 6: echo "Junio"; break;
             case 7: echo  "Julio"; break;
             case 8: echo "Agosto"; break;
             case 9: echo "Setiembre"; break;
             case 10: echo "Octubre"; break;
             case 11: echo "Noviembre"; break;
             case 12: echo "Diciembre"; break;
            }
           ?>
          : <?php echo $valor[0];?> 
        </alert></h2>
        </div>
      </form>
        
    </div>
  </div>




      


</body>
</html>
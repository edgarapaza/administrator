<?php

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" href="../../css/normalize.css">
  <title>Inicio - ARP</title>
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <img src="images/" alt="">
        <h1 class="bg-primary">Ventana de Reportes - Fondo Notarial</h1>
        <p>Esta ventana muestra los reportes para todos los ingresos a partir del año 2010 hasta la fecha.</p>
        <p>Puede consultarse en cualquier momento y debe utilizarse para medir el rendimiento medio de cada trabajador y hacer un analisis del avance.  Se tiene en el Dashboard principal herramientas en gráfico de barras para mostrar la misma información pero presentada en gráficos de Barras.</p>
        <hr>
        
        <a href="report_ingreso.php" class="btn btn-primary">Rerpotes Individuales</a>

        <a href="report_ingreso_mensual.php" class="btn btn-success">Reporte Mensual</a>
        <a href="report_ingreso_anual.php" class="btn btn-info">Reporte Anual</a>

        <a href="http://192.168.0.73/search" target="_black" class="btn btn-danger">Sistema de Busqueda</a>
        <hr/>
        <h3>Regresar a la pantalla inicial</h3>
        <a href="../index.php" class="btn btn-success">DashBoard</a>

      </div>
    </div>
  </div>

</body>
</html>

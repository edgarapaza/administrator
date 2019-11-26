<?php
require_once '../coreapp/Conexion.php';
$conn = new Conexion();
$link = $conn->Conectar();

$year = $_REQUEST['year'];

$sql ="SELECT MONTH(hra_ing) AS Mes, COUNT(cod_sct) AS Ingresos FROM escrituras1 WHERE hra_ing BETWEEN '".$year."-01-01 00:00:00' AND '".$year."-12-31 23:59:59' GROUP BY (MONTH(hra_ing));";


    //mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
if(!$result = $link->query($sql)); //si la conexión cancelar programa

    $rawdata = array(); //creamos un array
    //guardamos en un array multidimensional todos los datos de la consulta
    $i=0;
    while($row = $result->fetch_assoc())
    {
        $rawdata[$i] = $row;
        $i++;
    }

 $myArray = $rawdata;
 echo json_encode($myArray);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/sb-admin.css" rel="stylesheet">
        <link href="../css/plugins/morris.css" rel="stylesheet">
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Grafico Mensual</title>

        <script src="./amcharts/amcharts.js" type="text/javascript"></script>
        <script src="./amcharts/serial.js" type="text/javascript"></script>

        <script type="text/javascript">
            var chart;

            var chartData = <?php echo json_encode($myArray); ?> ;

            AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "Mes";
                chart.color = "#000";
                chart.fontSize = 10;
                chart.startDuration = 1;
                chart.plotAreaFillAlphas = 0.2;
                // the following two lines makes chart 3D
                chart.angle = 30;
                chart.depth3D = 30;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0.2;
                categoryAxis.gridPosition = "start";
                categoryAxis.gridColor = "#ff0000";
                categoryAxis.axisColor = "#0000ff";
                categoryAxis.axisAlpha = 0.5;
                categoryAxis.dashLength = 5;

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.stackType = "3d"; // This line makes chart 3D stacked (columns are placed one behind another)
                valueAxis.gridAlpha = 0.2;
                valueAxis.gridColor = "#0000ff";
                valueAxis.axisColor = "#000";
                valueAxis.axisAlpha = 0.5;
                valueAxis.dashLength = 5;
                valueAxis.title = "Numero Ingresos a Base de Datos";
                valueAxis.titleColor = "#0000ff";
                valueAxis.unit = "";
                chart.addValueAxis(valueAxis);

                // GRAPHS
                // first graph
                var graph1 = new AmCharts.AmGraph();
                graph1.title = "<?php echo $year;?>";
                graph1.valueField = "Ingresos";
                graph1.type = "column";
                graph1.lineAlpha = 0;
                graph1.lineColor = "#D2CB00";
                graph1.fillAlphas = 1;
                graph1.balloonText = "Total del Escrituras: [[category]] (<?php echo $year;?>): <b>[[value]]</b>";
                chart.addGraph(graph1);

                chart.write("chartdiv");
            });
        </script>
    </head>

    <body>
        <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin - Archivo Regional Puno</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Edgar Apaza</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Bienvenido Edgar, te mostramos las estadsiticas del dia actualizados cada 5 minutos</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Edgar Apaza</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Bienvenido Edgar, te mostramos las estadsiticas del dia actualizados cada 5 minutos</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Edgar Apaza</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Bienvenido Edgar, te mostramos las estadisticas del dia actualizados cada 5 minutos</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Edgar Apaza <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../controller/sesionClose.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="../index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="graficoanual.php"><i class="fa fa-fw fa-bar-chart-o"></i> Gráficos</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Graficos adicionales <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="grafico_mensual.php">Graficar por Meses</a>
                            </li>
                            <li>
                                <a href="grafico_personal.php">Grafico Individual</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tablas</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Formularios</a>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Opciones <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Habilitar a Todos</a>
                            </li>
                            <li>
                                <a href="#">Desahabilitar a todos</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">


                <!-- /.row -->

                <!-- Flot Charts -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Gráficos Agrupados por Meses</h2>
                        <p>Con esta herramienta usted puede visualizar los Ingresos anuales del Sistema de Fondo Notarial.</p>
                        <!-- jQuery -->
                            <script src="../js/jquery.js"></script>

                            <!-- Bootstrap Core JavaScript -->
                            <script src="../js/bootstrap.min.js"></script>

                            <!-- Morris Charts JavaScript -->
                            <script src="../js/plugins/morris/raphael.min.js"></script>
                            <script src="../js/plugins/morris/morris.min.js"></script>
                            <script src="../js/plugins/morris/morris-data.js"></script>

                            <!-- Flot Charts JavaScript -->
                            <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
                            <script src="../js/plugins/flot/jquery.flot.js"></script>
                            <script src="../js/plugins/flot/jquery.flot.tooltip.min.js"></script>
                            <script src="../js/plugins/flot/jquery.flot.resize.js"></script>
                            <script src="../js/plugins/flot/jquery.flot.pie.js"></script>
                            <script src="../js/plugins/flot/flot-data.js"></script>
                                <h3>Administrador del Sistema  - Reporte Anual <?php echo $year;?></h3>

                                <form action="">
                                <select name="year" id="year">
                                    <option selected="selected">[Escoja el Año]</option>
                                    <option value="2010">2010</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                </select>
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Generar Gráfico" name="btnReporte">
                                </form>
                                <div id="chartdiv" style="width: 100%; height: 400px;"></div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    </body>

</html>
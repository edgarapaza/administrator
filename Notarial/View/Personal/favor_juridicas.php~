<?php
session_start();
if (isset($_SESSION['personal'])) {
    require_once '../../Model/cone.php';
    $link = new ConexionClass();
    $link->Conectado();

    @$cod_sct = $_SESSION['codigo_escritura'];
    @$otorperjuridica = $_REQUEST['otorperjuridica'];
    @$codigo_otorgante = $_REQUEST['codigo_otorgante'];
    @$cod_otor_juri = $_REQUEST['cod_otor_juri'];
    //echo $cod_otor_juri;

    $codigo_usuario = $_SESSION['personal'];
    $cons1 = "SELECT CONCAT(nom_usu,' ',pat_usu,' ',mat_usu) AS Trabajor FROM usuarios WHERE cod_usu = $codigo_usuario";
    $query = mysql_query($cons1);
    @$dato1 = mysql_fetch_array($query);
    ?>
    <!DOCTYPE HTML>
    <!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="es"> <![endif]-->
    <!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="es"> <![endif]-->
    <!--[if IE 8]>    <html class="no-js lt-ie9" lang="es"> <![endif]-->
    <!--[if gt IE 8]><!-->
    <html class="no-js" lang="es">
        <!--<![endif]-->
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
            <meta name="HandheldFriendly" content="True">
            <meta name="MobileOptimized" content="320">
            <title>Sistema de Ingreso-Archivo Regional de Puno</title>
            <meta name="description" content="Escritura Publica">
            <meta name="viewport" content="width = device-width, initial-scale=1, maximum-scale=1"/>
            <link rel="stylesheet" href="../../css/estilo_fav.css">
            <link rel="stylesheet" href="../../css/normalize.css">
            <!-- <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="apple-mobile-web-app-status-bar-style" content="black"> -->
            <!-- <script>(function(){var a;if(navigator.platform==="iPad"){a=window.orientation!==90||window.orientation===-90?"img/startup-tablet-landscape.png":"img/startup-tablet-portrait.png"}else{a=window.devicePixelRatio===2?"img/startup-retina.png":"img/startup.png"}document.write('<link rel="apple-touch-startup-image" href="'+a+'"/>')})()</script> -->
            <!-- <script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script> -->
            <meta http-equiv="cleartype" content="on">
            <script src="js/libs/modernizr-2.5.3.min.js"></script>
            <script src="js/libs/modernizr-2.0.6.min.js"></script>
            <script language="javascript" type="text/javascript">
                function enviar_datos(){
                        var cod_otor = document.getElementById("cod_otor_juri").value;
                        alert('Dato Agregado Correctamente');
                        location.href = "./ingreso.php?favor="+cod_otor+"";
                        window.close(); 
            }
            function sin_favor(){
                var codotor = document.getElementById("cod_otor_juri").value;
                var chek = document.getElementById("nulo").checked;
                if (chek == true){
                    location.href = "./ingreso_juridicas.php?cod_otor_juri="+codotor+"&codigo_favorecido=0";
                    return true;
                }
                else{
                    return false;
                }
            }
        </script>
        </head>
        <body>
            <!--[if gte IE 9]>
                <style type="text/css">
                    .gradient {
                        filter: none;
                    }
                </style>
            <![endif]-->
            <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experienc
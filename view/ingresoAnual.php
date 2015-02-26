<?php
include 'header.php';
?>
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function()
        {
            $("#tipo").change(function () {
                if($("#tipo").val() == "especificar"){
                    $("#num").css("display", "block");
                }
            });

            $("#enviar").click(function(event) {
                $("#formulario").submit();
            });
        });
    </script>
</head>
<body>
    <h1>Seleccione el tipo de reporte</h1>
    <form action="../controller/control.php" name="formulario" id="formulario">
        <select name="tipo" id="tipo">
            <option value="ninguno" selected="selected">[Seleccione una opcion]</option>
            <option value="todos">Todos</option>
            <option value="especificar">Especificar</option>
        </select>

        <div id="num" style="display: none;">Numero<input type="text" name="numero"></div>
        <input type="button" name="enviar" id="enviar" value="Ver resultados">
    </form>

<?php
include 'footer.php';
?>
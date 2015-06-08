<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ingrese el Protocolo</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="../controller/css/styleform.css">
</head>
<body>
    <h1>Revision de Protocolos</h1>
    <h2>IMPORTANTE: Protocolos de Proyectos a partir del PROTOCOLO 2612 EN ADELANTE</h2>
    <h3>Ingrese el Numero de Protocolo a Revisar</h3>
    <form action="../controller/protocolos.php" method="post" accept-charset="utf-8">
        <div class="formulario">
            <ul>
                <li>
                    <label for="name">Numero de Protocolo:</label>
                    <input type="text" name="protocolo" placeholder="Numero de Protocolo">
                </li>
                <li>
                    <button class="submit" type="submit" name="revisar" value="revisar">Comenzar Revision</button>
                </li>
            </ul>
        </div>
    </form>
</body>
</html>



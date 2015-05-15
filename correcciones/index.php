<?php
require '../controller/escrituras.php';
DatosEscrituras(225665);
?>
<html>

<head>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Sistema de Revision de Protocolos</title>
</head>




<body>

<div class="general">
<div class="superior">Bienvenido</div><br>
<div class="cuerpo">
	<div class="cabecera">
	<b>Sistema de Revision de Protocolos</b>
	</div>
	<br>
<div class="part1">
	<div class="left">

			<table>

				Num Escritura <input type="text" name="hola">


<table >

   <tr>
    <td id="l">Escritura</td><td id="R">[[escritura]]</td>
  </tr>
  <tr>
    <td id="l">Protocolo</td><td id="R">[[protocolo]]</td>
  </tr>
  <tr>
    <td id="l">Folio</td><td id="R">[[numeroFolio]]</td>
  </tr>
  <tr>
    <td id="l">Fecha</td><td id="R">[[fecha]]</td>
  </tr>
  <tr>
	<td><button name="boton" type="submit"><img src="img/search.jpg" widht='10' height='20'> Search </button></td>
</tr>

</table>
			</table>

		</div>




	<div class="right">

<table >

   <tr>
    <td id="l">Otorgantes</td><td id="R">[[otorgantes]]</td>
  </tr>
  <tr>
    <td id="l">Favorecidos</td><td id="R">[[favorecidos]]</td>
  </tr>
  <tr>
    <td id="l">Otros juridicos</td><td id="R">[[juridico1]]</td>
  </tr>
  <tr>
    <td id="l">Juridicos</td><td id="R">[[juridico2]]</td> </tr>
  <tr>
	<td><button name="boton" type="submit"><img src="img/search.jpg" widht='10' height='20'> Editar </button></td>
</tr>

</table>







	</div></div>

<br>

<div class="part2">
	<div class="center">

		<table>
			<tr><td>Nombre de Bien:</td><td>[[bien]]</td>
			</tr>
			<tr><td>Sub Serie:</td><td>[[serie]]</td>
			</tr>
            <tr><td>Codigo Escritura</td><td>[[codigoEscritura]]</td>
            </tr>
            <tr><td>Notario</td><td>[[notario]]</td>
            </tr>
            <tr><td>Distrito:</td><td>[[distrito]]</td>
            </tr>
            <tr><td>Total Folios:</td><td>[[totalFolios]]</td>
            </tr>
            <tr><td>Codigo Trabajador:</td><td>[[usuario]]</td>
            </tr>
            <tr><td>Hora Ingreso:</td><td>[[hora]]</td>
            </tr>
            <tr><td>Numero de Proyecto:</td><td>[[proyeto]]</td>
            </tr>

		</table>

	</div><br>


	<div class="OBS">

	<div class="left2">

		<p>Observaciones</p>

		<TEXTAREA  name="observaciones">
                    [[observaciones]]
		</TEXTAREA>

		 <input type="submit" value="Enviar este formulario" />

	</div>




	<div class="right2">

		<p>Correcciones</p>
		<textarea name="correcciones">

		</textarea>

	</div>

<div class="boton">
	<center>
	<button name="Conforme" type="submit"><img src="img/Check-icon.png" widht='30' height='20'> Conforme </button>
	<button name="Cerrar" type="submit"><img src="img/cancel.jpg" widht='30' height='20'> Cerrar </button>
	</center>
</div>



</div>
</div>
</div>




</div>

</body>

</html
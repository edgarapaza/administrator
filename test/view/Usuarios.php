<?php
//require '../controller/Usuario.php';


?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Listado</title>
</head>
<body>
	<ul>
		<li>Santiago <input name="boton1" type="button" class="boton" onclick="javascript:window.open('../controller/modificarNombres.php?cod_usu=<?php echo $result1[0];?>','','width=500, height=300, scrollbars=NO');" value="Corregir Nombre" /></li>
		<li>Julia <input name="boton1" type="button" class="boton" onclick="javascript:window.open('../controller/modificarNombres.php?cod_usu=<?php echo $result1[0];?>','','width=500, height=300, scrollbars=NO');" value="Corregir Nombre" /></li>
		<li>Sandra <input name="boton1" type="button" class="boton" onclick="javascript:window.open('../controller/modificarNombres.php?cod_usu=<?php echo $result1[0];?>','','width=500, height=300, scrollbars=NO');" value="Corregir Nombre" /></li>
		<li>Mainee <input name="boton1" type="button" class="boton" onclick="javascript:window.open('../controller/modificarNombres.php?cod_usu=<?php echo $result1[0];?>','','width=500, height=300, scrollbars=NO');" value="Corregir Nombre" /></li>
	</ul>
</body>
</html>
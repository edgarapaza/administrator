<?php 
$nombre = $_REQUEST['nombre'];
$paterno1 = $_REQUEST['paterno'];
$materno1 = $_REQUEST['materno'];

$nexo = "%";
$sinEspacios = trim($nombre);
$nom_temp = explode(" ", $sinEspacios);
$nom_corregido = implode($nexo, $nom_temp);

$paterno = trim($paterno1);
$materno = trim($materno1);

require '../model/AddPersonaClass.php';

$obj = new AddPersonaClass();
if($materno != null)
{
    $result = $obj->BuscarCompleto($nom_corregido, $paterno, $materno);
}else
{
    $result = $obj->BuscarNombre($nom_corregido, $paterno);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Otorgante</title>
</head>
<body>
	<form action="" method="get">
		<div id="buscador">
			<table>
				<tr>
					<td>Nombres</td>
					<td>Paterno</td>
					<td>Materno</td>
					<td></td>
				</tr>
				<tr>
                                                                                <td><input type="text" name="nombre" placeholder="Escriba el Nombre" required="required"></td>
					<td><input type="text" name="paterno" placeholder="Escriba Apellido Paterno" required="required"></td>
					<td><input type="text" name="materno" placeholder="Escriba Apellido Materno" ></td>
					<td><input type="submit" name="btnBuscar" value="Buscar"></td>
				</tr>
			</table>
		</div>
	</form>

	<table border="1" width="600">
		<tr>
			<td>Nombre</td>
			<td>Apellido Paterno</td>
			<td>Apellido Materno</td>
			<td>Opciones</td>
		</tr>
                                <?php 
                                while($fila = $result->fetch_assoc()){
                                ?>
		<tr>
			<td><?php echo $fila['Nom_inv'];?></td>
			<td><?php echo $fila['Pat_inv'];?></td>
			<td><?php echo $fila['Mat_inv'];?></td>
			<td>Seleccionar</td>
		</tr>
                                 <?php
                                }
                                ?>
	</table>
</body>
</html>
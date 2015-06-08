<?php
$codEscritura = $_REQUEST['cod_sct'];
$codPersonal = $_REQUEST['cod_per'];

if(isset($_REQUEST['btnBuscar']))
{
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
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Favorecido</title>
	<link rel="stylesheet" href="css/styleform.css">
	<link rel="stylesheet" href="css/styletable.css">
</head>
<body>
	<form action="" method="get">
        <input type="hidden" name="cod_sct" value="<?php echo $codEscritura; ?>" />
        <input type="hidden" name="cod_per" value="<?php echo $codPersonal; ?>" />
		
		<div class="formulario">
				<ul>
					<li><h2>Agregar Favorecido</h2>
						<span class="required">Datos requeridos</span>					</li>
					<li> <label for="name">Nombres:</label> <input type="text" name="nombre" placeholder="Escriba el Nombre" required="required"> </li>
					<li> <label for="name">Paterno:</label> <input type="text" name="paterno" placeholder="Escriba Apellido Paterno" required="required"></li>
					<li> <label for="name">Materno:</label> <input type="text" name="materno" placeholder="Escriba Apellido Materno" > </li>
					<li> <button class="submit" type="submit" name="btnBuscar" value="Buscar">Buscar Favorecido</button>
				</ul>
			</div>
	</form>

    <form action="AddPersonaF.php" method="post" name="frmGuardar" id="frmGuardar">
	<div class="CSSTableGenerator" >
		<table border="1" width="600">
	            
	            
			<tr>
				<td>Nombre</td>
				<td>Apellido Paterno</td>
				<td>Apellido Materno</td>
				<td>Opciones</td>
			</tr>
	                                <?php
	                                while($fila = $result->fetch_assoc())
	                                {
	                                ?>
			<tr>
				<td><?php echo $fila['Nom_inv'];?></td>
				<td><?php echo $fila['Pat_inv'];?></td>
				<td><?php echo $fila['Mat_inv'];?></td>
	                        <td>
	                            <input type="hidden" name="involucrado" value="<?php echo $fila['Cod_inv']; ?>" />
	                            <input type="hidden" name="cod_sct" value="<?php echo $codEscritura; ?>" />
	                            <input type="hidden" name="cod_per" value="<?php echo $codPersonal; ?>" />
	                            <a href="AddPersonaF.php?cod_sct=<?php echo $codEscritura; ?>&involucrado=<?php echo $fila['Cod_inv']; ?>&cod_per=<?php echo $codPersonal; ?>" onclick="Confirmar()">Agregar >></a>
	                            
	                        </td>
	                        
			</tr>
	                                 <?php
	                                }

	                                ?>
		</table>
	</div>
    </form>
</body>
</html>
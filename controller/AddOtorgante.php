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
	<title>Agregar Otorgante</title>
        <script type="text/javascript">
            function Guardar()
            {
                if (confirm('¿REALMENTE DESEAS AGREGAR ESTE NOMBRE A LA ESCRITURA?')) {
                    document.frmGuardar.submit();
                    alert("Datos Guardados");
                } else {
                    alert("Cancelado");
                }
            }
        </script>
</head>
<body>
	<form action="" method="get">
            <input type="text" name="cod_sct" value="<?php echo $codEscritura; ?>" />
            <input type="text" name="cod_per" value="<?php echo $codPersonal; ?>" />
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

    <form action="AddPersonaO.php" method="post" name="frmGuardar" id="frmGuardar">
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
                            <input type="text" name="involucrado" value="<?php echo $fila['Cod_inv']; ?>" />
                            <input type="text" name="cod_sct" value="<?php echo $codEscritura; ?>" />
                            <input type="text" name="cod_per" value="<?php echo $codPersonal; ?>" />
                            <a href="AddPersonaO.php?cod_sct=<?php echo $codEscritura; ?>&involucrado=<?php echo $fila['Cod_inv']; ?>&cod_per=<?php echo $codPersonal; ?>">Guardar</a>
                            
                        </td>
                        
		</tr>
                                 <?php
                                }
                                if($result->num_rows == 0)  
                                {
                                    echo "El nombre NOOOOOO existe";
                                }
                                ?>
	</table>
    </form>
</body>
</html>
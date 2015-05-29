<?php
$codEscritura = $_REQUEST['cod_sct'];
$codPersonal = $_REQUEST['cod_per'];

if(isset($_REQUEST['btnBuscar']))
{
	$razon = $_REQUEST['razonsocial'];
	
        $nexo = "%";
	$sinEspacios = trim($razon);
	$nom_temp = explode(" ", $sinEspacios);
	$razonSocial = implode($nexo, $nom_temp);

	require '../model/AddPersonaClass.php';

	$obj = new AddPersonaClass();
	$result = $obj->BuscarJuridico($razonSocial);
	
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
                if (confirm('¿REALMENTE DESEAS AGREGAR ESTA INSTITUCION?')) {
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
					<td>Razon social de la Empresa o Institucion publica / Privada</td>
					<td></td>
				</tr>
				<tr>
                                    <td><input type="text" name="razonsocial" placeholder="Escriba la Razon Social de la empresa o institucion" required="required" size="80" /></td>
                                    <td><input type="submit" name="btnBuscar" value="Buscar"></td>
				</tr>
			</table>
		</div>
	</form>

    <form action="AddPersonaJuridicaF.php" method="post" name="frmGuardar" id="frmGuardar">
	<table border="1" width="600">
            
            
		<tr>
			<td>Nombre</td>
			<td>Opciones</td>
		</tr>
                                <?php
                                while($fila = $result->fetch_assoc())
                                {
                                ?>
		<tr>
			<td><?php echo $fila['Raz_inv'];?></td>
                        <td>
                            <input type="text" name="codigojuridico" value="<?php echo $fila['Cod_inv']; ?>" />
                            <input type="text" name="cod_sct" value="<?php echo $codEscritura; ?>" />
                            <input type="text" name="cod_per" value="<?php echo $codPersonal; ?>" />
                            
                            <a href="AddPersonaJuridicaF.php?cod_sct=<?php echo $codEscritura; ?>&codigojuridico=<?php echo $fila['Cod_inv']; ?>&cod_per=<?php echo $codPersonal; ?>">Guardar</a>
                            
                        </td>
                        
		</tr>
                                 <?php
                                }

                                ?>
	</table>
    </form>
</body>
</html>
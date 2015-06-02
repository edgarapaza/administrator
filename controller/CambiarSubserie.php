<?php
$codEscritura = $_REQUEST['cod_sct'];

if(isset($_REQUEST['btnBuscar']))
{
	$subserie = $_REQUEST['subserie'];
	
                $nexo = "%";
	$sinEspacios = trim($subserie);
	$nom_temp = explode(" ", $sinEspacios);
	$nombresubserie = implode($nexo, $nom_temp);

	require '../model/ChangeSubserieClass.php';

	$obj = new ChangeSubserieClass();
	$result = $obj->ListadoSubseries($nombresubserie);
	
}
?>
<!DOCTYPE html>
<html lang="es">
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
            
		<div id="buscador">
			<table>
				<tr>
					<td>Escriba el nombre de la Sub Serie Correspondiente a la escritura</td>
					<td></td>
				</tr>
				<tr>
                                    <td><input type="text" name="subserie" placeholder="Escriba la sub serie de la escritura" required="required" size="80" /></td>
                                    <td><input type="submit" name="btnBuscar" value="Buscar"></td>
				</tr>
			</table>
		</div>
	</form>

    <form action="" method="post" name="frmGuardar" id="frmGuardar">
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
			<td><?php echo $fila['des_sub'];?></td>
                        <td>
                            <input type="text" name="codigojuridico" value="<?php echo $fila['cod_sub']; ?>" />
                            <input type="text" name="cod_sct" value="<?php echo $codEscritura; ?>" />
                            
                            
                            <a href="SaveSubserie.php?cod_sct=<?php echo $codEscritura; ?>&codigoSubserie=<?php echo $fila['cod_sub']; ?>">Cambiar</a>
                            
                        </td>
                        
		</tr>
                                 <?php
                                }

                                ?>
	</table>
    </form>
</body>
</html>
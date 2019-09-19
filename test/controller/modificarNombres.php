<?php
require '../../coreapp/conection.php';

//$codigo = $_REQUEST['cod_usu'];
$codigo = 23;
$sql = "SELECT Cod_inv, Pat_inv, Mat_inv, Nom_inv, otros FROM involucrados1 WHERE Cod_inv = $codigo;";
$valores = $mysqli->query($sql);
$datos = $valores->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>

<p>Modificar Nombres del Sistema</p>
<form id="form1" name="form1" method="post" action="Usuarios.php">
  <table width="481" border="1">
    <tr>
      <td width="125">Codigo del Usuario: </td>
      <td width="453"><?php echo $datos['Cod_inv'];?><input type="hidden" name="codigo" value="<?php echo $datos['Cod_inv'];?>" /></td>
    </tr>
    <tr>
      <td>Nombre(s):</td>
      <td><input name="nombres" type="text" id="nombres" value="<?php echo $datos['Nom_inv'];?>" size="40" /></td>
    </tr>
    <tr>
      <td>Paterno:</td>
      <td><input name="paterno" type="text" id="paterno" value="<?php echo $datos['Pat_inv'];?>" size="40" /></td>
    </tr>
    <tr>
      <td>Materno:</td>
      <td><input name="materno" type="text" id="materno" value="<?php echo $datos['Mat_inv'];?>" size="40"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnGuardar" value="Guardar Cambios" onclick="javascript:window.close();" />
      <input name="cancelar" type="button" value="Cancelar Cambios" onclick="javascript:window.close();" /></td>
    </tr>
  </table>
</form>
</body>
</html>

<?php
session_start();
require_once '../coreapp/conection.php';

$user = $_REQUEST['usuario'];
$pas  = $_REQUEST['password'];

echo $user."<br>";
echo $pas;

$sql = "SELECT cod_usu, niv_usu FROM usuarios WHERE log_usu='$user' AND psw_usu ='$pas' LIMIT 0,1;";

$result = $mysqli->query($sql);
$fila = $result->fetch_assoc();
if($fila["niv_usu"] == 1){
    $_SESSION['administrator'] = $fila['cod_usu'];
    header("Location: ../view/index.php");
}
else
{
    header("Location: ../login.html");
}

?>
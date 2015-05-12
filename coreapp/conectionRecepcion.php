<?php
$DB_HOST= "192.168.1.12";
$DB_USER= "usuario";
$DB_PASS= "archivo123";
$DB_NAME= "recepcion";

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, 3306);

if ($mysqli->connect_errno) {
    echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

//echo $mysqli->host_info . "\n Conection.php en Recepcion";

mysqli_report(MYSQLI_REPORT_ERROR);
?>
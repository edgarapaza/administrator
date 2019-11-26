<?php
include '../coreapp/conection.php';

  $obj[10];
$sql0= "SELECT cod_usu FROM usuarios WHERE chk_usu = 1";
$result0 = $mysqli->query($sql0);

    while ($row = $result0->fetch_assoc()) {
        //echo $row["cod_usu"]."<br>";
        $sql = "SELECT count(*) as total, CONCAT(b.pat_usu,' ',b.mat_usu,' ',b.nom_usu) as trabajador FROM escrituras1 AS a, usuarios AS b WHERE a.cod_usu = b.cod_usu AND b.cod_usu = ". $row["cod_usu"] ." AND b.chk_usu = 1 AND a.hra_ing between '2014-01-01' and '2014-12-31'";
        $result = $mysqli->query($sql);
        $data = $result->fetch_assoc();
        //$obj = json_encode($data);


        echo $obj;
        printf("Ingresos: %d ",$data["total"]);
        //printf("Trabajador: %s <br>",$data["trabajador"]);
    }
  // $fre = array("adriana"=>333,"Jose"=>433,"Maria"=>677,"Juan"=>799);
    return $obj;

?>
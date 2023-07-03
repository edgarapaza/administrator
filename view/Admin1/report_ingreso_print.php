<?php
#session_start();

  require "Models/Conexion.php";
  $link = new Conexion();  # llamando a la clase

  $fec_act = date("d-M-Y");
  $file_type="vnd.ms-excel";

  
  header("Content-type: application/$file_type");
  header("Content-disposition: attachment; filename=Reporte_".$fec_act.".xlsx");
  header("Pragma: no-cache");
  header("Expires: 0");
  
  $cod_usu = $_GET['trab'];
  $fec_ini = $_GET['fecha_ini'];
  $fec_fin = $_GET['fecha_fin'];

if($fec_fin == "")
  {
    $sql = "SELECT hra_ing,cod_usu,cod_sct,num_sct FROM escrituras1 ";
    $sql .=" where hra_ing LIKE '$fec_ini%' ";
    $sql .= "and cod_usu like '$cod_usu' order by hra_ing";
    $query = $link->ConsultaCon($sql);
    
  }else{
      if($fec_ini == $fec_fin)
      {
        $text = "SELECT hra_ing,cod_usu,cod_sct,num_sct FROM escrituras1 ";
        $text .=" where hra_ing LIKE '$fec_ini%' ";
        $text .= "and cod_usu like '$cod_usu' order by hra_ing";

        $query = $link->ConsultaCon($text);

      }else{
        $text = "SELECT hra_ing,cod_usu,cod_sct,num_sct FROM escrituras1 ";
        $text .=" WHERE hra_ing between '$fec_ini 00:00:00' and '$fec_fin 23:59:59' ";
        $text .= "AND cod_usu like '$cod_usu' order by hra_ing";
        $query = $link->ConsultaCon($text);

      }
  }
   
?>

   <h3>Reportes Diarios de Ingreso a la Base de Datos</h3>
   <table>
     <thead>
      <tr>
        <td colspan="4">Total de Escrituras: 
          <b>
          <?php 
            echo $n = $query->num_rows;
          ?>
          </b>
        </td>
      </tr>
      <tr>
        <td>Hra_Ing</td>
        <td>Usuario</td>
        <td>Cod_sct</td>
        <td>Num_Sct</td>
      </tr>
     </thead>
     <tbody>
      <?php
        while($fila = $query->fetch_array(MYSQLI_ASSOC))
        {
      ?>
      <tr>
        <td><?php echo $fila['hra_ing']?></td>
        <td><?php echo $fila['cod_usu']?></td>
        <td><?php echo $fila['cod_sct']?></td>
        <td><?php echo $fila['num_sct']?></td>

      </tr>
      <?php 
      }
      ?>
     </tbody>

     

     
   </table>

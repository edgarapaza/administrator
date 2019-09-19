<?php
$limite=10; 
$cont=$_GET['contador']; 

if ($cont+1 <= $limite && $cont > 0 && isset($_GET['contador'])){  
    if (isset($_GET['mas'])){  
        $cont++; 
    } 
    if (isset($_GET['menos']) && $cont-1 > 0){  
       $cont--; 
    }  
} else { 
  $cont = 1; 
} 

?> 
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get"> 
<input name="mas" type="submit" value="mas"> 
<?php echo $cont ?> 
<input name="menos" type="submit" value="menos"> 
<input type="hidden" name="contador" value="<?php echo $cont ?>"> 
</form>
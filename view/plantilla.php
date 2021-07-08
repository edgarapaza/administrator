<?php 
session_start();
if (isset($_SESSION['administrator']))
{

    include "header.php";
?>

<div class="row">
    <div class="col-md-12">
        <h3>Cuerpo</h3>
        
    </div>
</div>


<?php 
include "footer.php";
}
else{
    header('Location: ../login.html');
}
?>
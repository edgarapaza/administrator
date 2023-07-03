<?php
session_start();
if (isset($_SESSION['administrator'])) {

  include "header.php";
?>
  <br>
  <div class="grid-container">
    <div class="callout large">
      <div class="row column text-center">
        <h1>Estadisticas del Archivo Regional de Puno</h1>
        <p class="lead">Un software creado por Ing. Edgar Apaza Choque para obtener información del avance del ingreso a base de datos del fondo notarial</p>
        <a href="#" class="button large">Leer mas</a>
      </div>
    </div>

    <div class="grid-x grid-margin-x">
      <div class="medium-6 large-4 cell">
        <img class="thumbnail" src="https://placehold.it/750x350">
      </div>

    </div>

  <?php
  include "footer.php";
} else {
  header('Location: ../login.html');
}
  ?>
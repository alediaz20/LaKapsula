<?php
require_once("../../model/class.vinilos.php");
$post = $_POST;

$cVinilos = new cVinilos();
$result = $cVinilos->calcularCorte($post);

?>
<div class="card-body">
    <div class="mb-4">
        <h1 class="text-info text-center" id="resultado1">
            Precio a cobrar $ <?php echo $result["a_cobrar"]; ?>
        </h1>
    </div>
    <div class="d-flex justify-content-between mt-6">
        <p class="text-info text-center mb-4" id="resultado2">
            Costo del corte $ <?php echo $result["costo"]; ?>
        </p>
    </div>
</div>
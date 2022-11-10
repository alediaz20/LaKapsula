<?php
require_once("../../model/class.vinilos.php");
$post = $_POST;

$cVinilos = new cVinilos();
$result = $cVinilos->calcularCorte($post);

?>
<div class="card-body">
    <div class="mb-4 btn btn-kuality success">
        <h1 class="text-center" id="resultado1">
            Precio a cobrar $ <?php echo $result["a_cobrar"]; ?>
        </h1>
    </div>
</div>
<div class="card-footer bg-kuality">
    <div class="d-flex justify-content-between">
        <p class="text-center" id="resultado2">
            *Costo del corte $<?php echo $result["costo"]; ?>
        </p>
    </div>
</div>
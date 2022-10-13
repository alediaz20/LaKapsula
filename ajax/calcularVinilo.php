<?php
require_once("getVinilos.php");

$post = $_POST;
$corte = $post['ancho'] * $post['alto'];
foreach ($vinilos as $key => $value) {
    if ($post['tipo'] == $value->nombre) {
        $costocm = $value->precio / $value->dimension;
        $costo = $corte * $costocm;
        $resultado = $costo * 3;
    }
}
?>

<div class="card-body">
    <div class="mb-4">
        <h1 class="text-info text-center" id="resultado1">
            Precio a cobrar $ <?php echo $resultado; ?>
        </h1>
    </div>
    <div class="d-flex justify-content-between mt-6">
        <p class="text-info text-center mb-4" id="resultado2">
            Costo del corte $ <?php echo $costo; ?>
        </p>
        <p class="text-info text-right">Precio actualizado el 19/09/2022</p>
    </div>
</div>
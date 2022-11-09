<div class="container">
<?php
        require_once(DIR_MODEL."class.prendas.php");
        $cPrendas = new cPrendas();
        $prendas = $cPrendas->getPrendas();
        $costo = $cPrendas->calcularCostos();

        foreach ($prendas as $key => $value) {
            foreach($costo as $costokey => $costovalue){
                if($value->nombre == $costokey){
                    $costoprenda = $costovalue['precio'];
                }
            }
            $costoTotal = $costoprenda + COSTO_VINILO + COSTO_CONFECCION;
            $preciopublico = $costoTotal * 1.4;
            $preciopublico = round($preciopublico / 1000, 1);
            $preciopublico = $preciopublico * 1000;
    
    if($value->nombre == "Medias K"){ ?>
    <div class="flip-card">
        <div class="flip-card-inner p-3">
            <div class="flip-card-front">
                <img class="" src="imgs/prendas/<?php echo $value->id.".png" ?>" alt="portada" width="250rem" height="300rem">
                <h3 class="text-kuality"><?php echo $value->nombre?></h3>
                <h3 class="bg-kuality"> $1700 </h3>
            </div>
            <div class="flip-card-back">
                <div class="card-body">
                    <h1 class="text-white">Costos</h1>
                    <hr>
                    <div class="form-group text-white">
                        <p><b>Confección estampa y materiales</b></p>
                        <h5>--</h5>
                    </div>
                    <hr>
                    <div class="form-group text-white">
                        <p><b>Costo telas</b></p>
                        <h5>--</h5>
                    </div>
                    <hr>
                    <div class="form-group text-white">
                        <p><b>Costo Total</b></p>
                        <h5>--</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }else{ ?>
    <div class="flip-card">
        <div class="flip-card-inner p-3">
            <div class="flip-card-front">
                <img class="" src="imgs/prendas/<?php echo $value->id.".png" ?>" alt="portada" width="250rem" height="300rem">
                <h4 class="text-kuality"><?php echo $value->nombre?></h4>
                <h3 class="bg-kuality"><?php echo "$".$preciopublico?></h3>
            </div>
            <div class="flip-card-back">
                <div class="card-body">
                    <h1 class="text-white">Costos</h1>
                    <hr>
                    <div class="form-group text-white">
                        <p><b>Confección estampa y materiales</b></p>
                        <h5>$<?php echo COSTO_CONFECCION + COSTO_VINILO?></h5>
                    </div>
                    <hr>
                    <div class="form-group text-white">
                        <p><b>Costo telas</b></p>
                        <h5>$<?php echo ceil($costoprenda) ?></h5>
                    </div>
                    <hr>
                    <div class="form-group text-white">
                        <p><b>Costo Total</b></p>
                        <h5>$<?php echo  ceil($costoTotal)?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php } ?>
</div>

<link rel="stylesheet" href="css/listado2.css">
<link rel="stylesheet" href="css/custom.css">
<script src="js/listado2.js"></script>
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
    ?>
        <div class="card">
            <!-- header -->
            <div class="card-header text-center bg-kuality"><?php echo $value->nombre ?></div>
            <!-- body -->
            <div class="card-body text-center">
                <?php if($value->nombre == "Medias K"){ ?>
                <img class="" src="imgs/prendas/<?php echo $value->id.".png" ?>"" alt="portada" width="250rem" height="300rem">
                <div class="info-box">
                    <span class="info-box-icon bg-kuality"><i class="fas fa-dollar-sign"></i></span>
                    <div class="info-box-content">
                        <span class="form-control bg-kuality">Costos</span>
                        <span class="info-box-text text-kuality">Tela</span>
                        <span class="info-box-number"> - </span>
                        <div class="info-box-content">
                            <p class="info-box-text text-kuality">Confección estampa y materiales</p>
                            <span class="info-box-number"> - </span>
                        </div>
                    </div>
                </div>
                <div class="info-box">
                    <span class="info-box-icon bg-kuality"><i class="fas fa-tshirt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text text-kuality"><h3>Costo Total</h3></span>
                        <span class="info-box-number text-kuality"> - </span>
                    </div>
                </div>
                <div class="info-box">
                    <span class="info-box-icon bg-kuality"><i class="fas fa-shopping-bag"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text text-kuality"><h3>Precio al público</h3></span>
                        <span class="info-box-number text-kuality">$1700</span>
                    </div>
                </div>
                <?php }else{ ?>
                <img class="" src="imgs/prendas/<?php echo $value->id.".png" ?>"" alt="portada" width="250rem" height="300rem">
                <div class="info-box">
                    <span class="info-box-icon bg-kuality"><i class="fas fa-dollar-sign"></i></span>
                    <div class="info-box-content">
                        <span class="form-control bg-kuality">Costos</span>
                        <span class="info-box-text text-kuality">Tela</span>
                        <span class="info-box-number">$<?php echo ceil($costoprenda) ?></span>
                        <div class="info-box-content">
                            <p class="info-box-text text-kuality">Confección estampa y materiales</p>
                            <span class="info-box-number">$ <?php echo(COSTO_CONFECCION + COSTO_VINILO) ?></span>
                        </div>
                    </div>
                </div>
                <div class="info-box">
                    <span class="info-box-icon bg-kuality"><i class="fas fa-tshirt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text text-kuality"><h3>Costo Total</h3></span>
                        <span class="info-box-number text-kuality">$<?php echo ceil($costoTotal)?></span>
                    </div>
                </div>
                <div class="info-box">
                    <span class="info-box-icon bg-kuality"><i class="fas fa-shopping-bag"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text text-kuality"><h3>Precio al público</h3></span>
                        <span class="info-box-number text-kuality">$<?php echo ceil($preciopublico)?></span>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>
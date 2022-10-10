<div class="container">
    <?php
    require_once("ajax/getPrendas.php");
    foreach ($prendas as $key => $value) {
        $telas = explode(",", $value->telas);
    ?>
        <div class="card">
            <!-- header -->
            <div class="card-header text-center bg-kuality"><?php echo $value->nombre ?></div>
            <!-- body -->
            <div class="card-body text-center">
                <img class="" src="imgs/<?php echo $value->id ?>"" alt=" portada" width="150">
                <div class="info-box">
                    <span class="info-box-icon bg-kuality"><i class="fas fa-dollar-sign"></i></span>
                    <div class="info-box-content">
                        <span class="form-control bg-kuality">Costos</span>
                        <span class="info-box-text text-kuality">Tela</span>
                        <span class="info-box-number">$1,410</span>
                        <div class="info-box-content">
                            <span class="info-box-text text-kuality">Confección y estampa</span>
                            <span class="info-box-number">$1,410</span>
                        </div>
                    </div>
                </div>
                <div class="info-box">
                    <span class="info-box-icon bg-kuality"><i class="fas fa-tshirt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text text-kuality"><h3>Costo Total</h3></span>
                        <span class="info-box-number text-kuality">$2444</span>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
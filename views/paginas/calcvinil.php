<div class="px-5">
    <div class="card card-info card-borderless">
        <div class="card-header">
            <h3 class="card-title"><i class="fa-solid fa-scissors"></i>
                <i class="fa-solid fa-rug"></i> Calculadora de costos de vinilo
            </h3>
            <div class="ribbon-wrapper ribbon-lg">
                <div class="ribbon bg-info text-lg">
                    Cavila
                </div>
            </div>

            <!-- <h3 style="text-align: right;">Cavila</h3> -->
        </div>
        <form class="form-horizontal box">
            <div class="card-body">
                <div class="form-group row">
                    <label for="Alto" class="col-sm-2 col-form-label">Tipo de vinilo</label>
                    <div class="col-sm-10">
                        <select name="tipo" id="tipovinilo" class="custom-select form-control-border">
                            <option value="termocomun">Textil comun</option>
                            <option value="autoadhesivo">Autoadhesivo</option>
                            <option value="especial">Oro - Plata - Holo</option>
                            <option value="fluo">Fluo - Metalizado</option>
                            <option value="reflec">Reflex</option>
                            <option value="holografico">Holográfico</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Alto" class="col-sm-2 col-form-label">Alto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alto" placeholder="Alto">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ancho" class="col-sm-2 col-form-label">Ancho</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ancho" placeholder="Ancho">
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <input type="button" class="btn btn-info" onclick="calcular()" value="Calcular" i="">
            </div>
        </form>
    </div>
    <div class="card card-info card-borderless" id="resultado" style="display:none;"></div>

    <?php require_once("ajax/getVinilos.php"); ?>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Vinilos</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">Id</th>
                        <th>Vinilo</th>
                        <th>precio</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($vinilos as $key => $value){ ?>
                    <tr>
                        <td><?php echo $value->id;?></td>
                        <td><?php echo $value->nombre_para_mostrar; ?></td>
                        <td>$<?php echo $value->precio; ?></td>
                        <td><a href="index.php?pagina=editarVinilo&id=<?php echo $value->id ?>" class="btn btn-info">Editar</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
















        <!-- REQUIRED SCRIPTS -->
        <script src="../js/calcular.js"></script>
        <script src="../js/sweetalert2.all.min.js"></script>
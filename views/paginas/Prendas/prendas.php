<?php 
require_once(DIR_MODEL."class.prendas.php"); 
require_once(DIR_MODEL."class.telas.php"); 
    $cPrendas = new cPrendas();
    $prendas = $cPrendas->getPrendas();
    $cTelas = new cTelas();
    $telas = $cTelas->getTelas();

?>
<div class="container-telas px-4">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Nueva prenda</h3>
        </div>
        <form method="post" id="prendas" action="../ajax/savePrendas.php" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="prenda_nombre">Prenda</label>
                    <input type="text" class="form-control form-control-border border-width-2" id="prenda_nombre" placeholder="Nombre prenda">
                </div>
                <div class="form-group">
                    <label for="telas">Telas</label>
                        <select id="telas" name ="telas" multiple="multiple" class="form-control form-control-border border-width-2">
                        <?php foreach ($telas as $key => $value){ ?>
                            <option value="<?php echo $value->nombre ?>"> <?php echo $value->nombre ?></option>
                            <?php } ?>
                        </select>
                    </div>


                <div class="form-group">
                    <label for="metros_por_tela">Metros por tela</label>
                    <input type="text" class="form-control form-control-border border-width-2" id="metros_por_tela" placeholder="Metros por tela (Separado por comas)">
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" id="imagen">
                </div>
            </div>
        </form>
            <div class="card-footer">
                <button class="btn btn-kuality" onclick="savePrenda()">Guardar</button>
            </div>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Prendas</h3>
        </div>
        <div class="card-body">
            <table class="table table-borderless table-hover table-responsive">
                <thead>
                    <tr>
                        <th style="width: 10px">Id</th>
                        <th>Prenda</th>
                        <th>Telas</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($prendas as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value->id; ?></td>
                            <td><?php echo $value->nombre; ?></td>
                            <td><?php echo $value->telas; ?></td>
                            <td><a href="index.php?pagina=editarPrenda&id=<?php echo $value->id ?>" class="btn btn-kuality">Editar</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="../../../js/prendas.js"></script>

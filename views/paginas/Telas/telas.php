<div class="container-telas px-4">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Nueva tela</h3>
        </div>
        <form id="telas">
            <div class="card-body">
                <div class="form-group">
                    <label for="tela_nombre">Tela</label>
                    <input type="text" class="form-control form-control-border border-width-2" id="tela_nombre" placeholder="Tela">
                </div>
                <label for="tela_precio">Precio x Kg</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="btn btn-kuality btn-flat"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input type="number" class="form-control form-control-border border-width-2" id="tela_precio" placeholder="Precio">
                </div>
                <div class="form-group">
                    <label for="tela_rendimiento">Metros por kg</label>
                    <input type="text" class="form-control form-control-border border-width-2" id="tela_rendimiento" placeholder="Cuantos metros rinde un kg">
                </div>
            </div>
        </form>
        <div class="card-footer">
            <button class="btn btn-kuality" onclick="saveTela()">Guardar</button>
        </div>
    </div>
    <?php require_once("ajax/Telas/getTelas.php"); ?>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Telas</h3>
        </div>
        <div class="card-body">
            <table class="table table-borderless table-hover table-responsive">
                <thead>
                    <tr>
                        <th style="width: 10px">Id</th>
                        <th>Tela</th>
                        <th>Precio x Kg</th>
                        <th style="width: 40px">Metros x Kg</th>
                        <th>Precio x Metro</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($telas as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value->id; ?></td>
                            <td><?php echo $value->nombre; ?></td>
                            <td>$<?php echo $value->precio_por_kg; ?></td>
                            <td><?php echo $value->metros_por_kg; ?></td>
                            <td>$<?php echo $value->precio_por_metro; ?></td>
                            <td><a href="index.php?pagina=editarTela&id=<?php echo $value->id ?>" class="btn btn-kuality">Editar</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="../../../js/telas.js"></script>

<?php
require_once("ajax/Telas/getTelas.php");
$id = $_GET['id'];

foreach ($telas as $key => $value){
    if($value->id == $id){
        $tela = $value;
    }
}


?>
<div class="px-4">
    <div class="card card-primary">
        <div class="card-header"><h3 class="card-title">Editar tela</h3></div> 
        <form id="telas">
            <div class="card-body">
                <input type="text" class="form-control form-control-border border-width-2" id="id" placeholder="Tela" value="<?php echo $id?>" hidden>
                <div class="form-group">
                    <label for="tela_nombre">Tela</label>
                    <input type="text" class="form-control form-control-border border-width-2" id="tela_nombre" placeholder="Tela" value="<?php echo $tela->nombre?>">
                </div>
                <label for="tela_precio">Precio x Kg</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="btn btn-kuality btn-flat"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input type="number" class="form-control form-control-border border-width-2" id="tela_precio" placeholder="Precio" value ="<?php echo $tela->precio_por_kg?>">
                </div>
                <div class="form-group">
                    <label for="tela_rendimiento">Metros por kg</label>
                    <input type="text" class="form-control form-control-border border-width-2" id="tela_rendimiento" placeholder="Cuantos metros rinde un kg" value ="<?php echo $tela->metros_por_kg?>">
                </div>
            </div>  
        </form>
        <div class="card-footer">
            <button class="btn btn-kuality" onclick="editTela()">Guardar</button>
        </div>
    </div>
</div>

<script src="../../../js/telas.js"></script>


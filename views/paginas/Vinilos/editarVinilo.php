<?php
require_once(DIR_MODEL."class.vinilos.php");
$cVinilos = new cVinilos();
$vinilos = $cVinilos->getVinilos();
$id = $_GET['id'];

foreach ($vinilos as $key => $value){
    if($value->id == $id){
        $tela = $value;
    }
}
?>

<div class="px-4">
    <div class="card card-primary">
        <div class="card-header"><h3 class="card-title">Editar Vinilo</h3></div> 
        <form method="post" name="telas" action="ajax/editVinilo.php">
            <div class="card-body">
                <input type="text" class="form-control form-control-border border-width-2" id="id" value="<?php echo $id?>" hidden>
                <div class="form-group">
                    <label for="tela_nombre">Vinilo</label>
                    <input type="text" class="form-control form-control-border border-width-2" id="nombre" placeholder="Tela" value="<?php echo $tela->nombre_para_mostrar?>">
                </div>
                <label for="tela_precio">Precio</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="btn btn-kuality btn-flat"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input type="number" class="form-control form-control-border border-width-2" id="precio" placeholder="Precio" value ="<?php echo $tela->precio?>">
                </div>
            </div>  
            <!-- <div class="card-footer">
                <input type="submit" class="btn btn-kuality" value="Guardar"></input>
            </div> -->
        </form>
    </div>
    <button class="btn btn-kuality" onclick="guardarVinilo()">Guardar</button>
</div>

<script src="../js/vinilos.js"></script>

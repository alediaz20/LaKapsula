<?php
require_once(DIR_MODEL."class.prendas.php");
$id = $_GET['id'];
$cPrendas = new cPrendas();
$prenda = $cPrendas->getPrendaById($id);

?>
<div class="px-4">
    <div class="card card-primary">
        <div class="card-header"><h3 class="card-title">Editar prenda</h3></div> 
        
        <form method="post" id="prendas" action="../ajax/editPrenda.php" enctype="multipart/form-data">
            <div class="card-body">
                <input type="text" id="id" value="<?php echo $id?>" hidden>
                <div class="form-group">
                    <label for="prenda_nombre">Prenda</label>
                    <input type="text" class="form-control form-control-border border-width-2" id="prenda_nombre" placeholder="Nombre prenda" value="<?php echo $prenda->nombre ?>">
                </div>
                <div class="form-group">
                    <label for="prenda_telas">Telas</label>
                    <input type="text" class="form-control form-control-border border-width-2" id="prenda_telas" placeholder="Telas (Separado por comas)" value="<?php echo $prenda->telas ?>">
                </div>
                <div class="form-group">
                    <label for="metros_por_tela">Metros por tela</label>
                    <input type="text" class="form-control form-control-border border-width-2" id="metros_por_tela" placeholder="Metros por tela (Separado por comas)" value="<?php echo $prenda->metros_por_tela ?>">
                </div>
            </div>  
        </form>
            <div class="card-footer">
                <button class="btn btn-kuality" onclick="editarPrenda()">Guardar</button>
            </div>
    </div>
</div>


<script src="../../../js/prendas.js"></script>
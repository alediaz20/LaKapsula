<?php
require_once("ajax/getTelas.php");
$id = $_GET['id'];

foreach ($telas as $key => $value){
    if($value->id == $id){
        $tela = $value;
    }
}


?>

<div class="container-telas p-3">
    <div class="card card-primary">
        <div class="card-header"><h3 class="card-title">Nueva tela</h3></div> 
        <form method="post" name="telas" action="ajax/editTela.php">
            <div class="card-body">
                <input type="text" class="form-control" name="id" placeholder="Tela" value="<?php echo $id?>" hidden>
                <div class="form-group">
                    <label for="tela_nombre">Tela</label>
                    <input type="text" class="form-control" name="tela_nombre" placeholder="Tela" value="<?php echo $tela->nombre?>">
                </div>
                <label for="tela_precio">Precio x Kg</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input type="number" class="form-control" name="tela_precio" placeholder="Precio" value ="<?php echo $tela->precio_por_kg?>">
                </div>
                <div class="form-group">
                    <label for="tela_rendimiento">Metros por kg</label>
                    <input type="text" class="form-control" name="tela_rendimiento" placeholder="Cuantos metros rinde un kg" value ="<?php echo $tela->metros_por_kg?>">
                </div>
            </div>  
            <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="Guardar"></input>
            </div>
        </form>
    </div>
</div>

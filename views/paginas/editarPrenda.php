<?php

require_once("ajax/getPrendas.php");

$id = $_GET['id'];



foreach ($prendas as $key => $value){

    if($value->id == $id){

        $prenda = $value;

    }

}



?>

<div class="px-4">

    <div class="card card-primary">

        <div class="card-header"><h3 class="card-title">Nueva prenda</h3></div> 

        

        <form method="post" name="prendas" action="../ajax/editPrenda.php" enctype="multipart/form-data">

            <div class="card-body">

                <input type="text" name="id" value="<?php echo $id?>" hidden>

                <div class="form-group">

                    <label for="prenda_nombre">Prenda</label>

                    <input type="text" class="form-control form-control-border border-width-2" name="prenda_nombre" placeholder="Nombre prenda" value="<?php echo $prenda->nombre ?>">

                </div>

                <div class="form-group">

                    <label for="prenda_telas">Telas</label>

                    <input type="text" class="form-control form-control-border border-width-2" name="prenda_telas" placeholder="Telas (Separado por comas)" value="<?php echo $prenda->telas ?>">

                </div>

                <div class="form-group">

                    <label for="metros_por_tela">Metros por tela</label>

                    <input type="text" class="form-control form-control-border border-width-2" name="metros_por_tela" placeholder="Metros por tela (Separado por comas)" value="<?php echo $prenda->metros_por_tela ?>">

                </div>

                <div class="form-group">

                    <label for="imagen">Imagen</label>

                    <input type="file" name="imagen">

                </div>

            </div>  

            <div class="card-footer">

                <input type="submit" class="btn btn-primary" value="Guardar"></input>

            </div>

        </form>

    </div>

</div>
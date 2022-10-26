<?php

require_once("ajax/getVinilos.php");

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

                <input type="text" class="form-control form-control-border border-width-2" name="id" placeholder="Tela" value="<?php echo $id?>" hidden>

                <div class="form-group">

                    <label for="tela_nombre">Vinilo</label>

                    <input type="text" class="form-control form-control-border border-width-2" name="nombre" placeholder="Tela" value="<?php echo $tela->nombre_para_mostrar?>">

                </div>

                <label for="tela_precio">Precio</label>

                <div class="input-group mb-3">

                    <div class="input-group-prepend">

                        <span class="btn btn-info btn-flat"><i class="fas fa-dollar-sign"></i></span>

                    </div>

                    <input type="number" class="form-control form-control-border border-width-2" name="precio" placeholder="Precio" value ="<?php echo $tela->precio?>">

                </div>

            </div>  

            <div class="card-footer">

                <input type="submit" class="btn btn-primary" value="Guardar"></input>

            </div>

        </form>

    </div>

</div>


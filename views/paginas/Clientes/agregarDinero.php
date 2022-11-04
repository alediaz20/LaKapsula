<?php
require_once("ajax/obtenerClientesRegistrados.php");
$id = $_GET['id'];

foreach ($clientesRegistrados as $key => $value){
    if($value->id == $id){
        $ClientesRegistrados = $value;
    }
}
?>
<div class="px-4">
    <div class="card card-primary">
        <div class="card-header"><h3 class="card-title">Agregar dinero  a <?= $ClientesRegistrados->nombre_apellido ?></h3></div> 
        <div class="card-body">
                <form method="post" name="agregarDinero" action="ajax/agregarDinero.php">
                <input type="text" class="form-control form-control-border border-width-2" id="id" value="<?php echo $ClientesRegistrados->id?>" hidden>
                <div class="form-group">
                    <label for="precio">Total pedido</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="btn btn-info btn-flat"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-border border-width-2" id="precio" value="<?php echo $ClientesRegistrados->monto_debe?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="entrega_anterior">Entrega anterior</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="btn btn-info btn-flat"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-border border-width-2" id="entrega_anterior" value="<?php echo $ClientesRegistrados->monto_entrega?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="entrega_anterior">Resta abonar</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="btn btn-info btn-flat"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-border border-width-2" id="resto" value="<?php echo ($ClientesRegistrados->monto_debe - $ClientesRegistrados->monto_entrega)?>" readonly>
                    </div>
                </div>
                <label for="nueva_entrega">Nueva entrega</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="btn btn-info btn-flat"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input type="number" class="form-control form-control-border border-width-2" id="nueva_entrega" placeholder="Nueva entrega">
                </div>
            <!-- <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="Guardar"></input>
            </div> -->
        </form>
        <button onclick="AgregarDinero()" class="btn btn-kuality">Agregar</button>
        </div>  

    </div>
</div>

<script src="../../js/agregarDinero.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>


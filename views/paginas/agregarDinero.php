<?php
require_once("ajax/getPedidos.php");
$id = $_GET['id'];

foreach ($pedidos as $key => $value){
    if($value->id == $id){
        $pedido = $value;
    }
}

?>
<div class="px-4">
    <div class="card card-primary">
        <div class="card-header"><h3 class="card-title">Agregar dinero</h3></div> 
        <form method="post" name="agregarDinero" action="ajax/agregarDinero.php">
            <div class="card-body">
                <input type="text" class="form-control form-control-border border-width-2" name="id" value="<?php echo $pedido->id?>" hidden>
                <input type="text" class="form-control form-control-border border-width-2" name="precio_prenda" value="<?php echo $pedido->precio?>" hidden>
                <div class="form-group">
                    <label for="precio">Precio total</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="btn btn-info btn-flat"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-border border-width-2" name="precio" value="<?php echo $pedido->precio?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="entrega_anterior">Entrega anterior</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="btn btn-info btn-flat"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-border border-width-2" name="entrega_anterior" value="<?php echo $pedido->entrega?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="entrega_anterior">Resta abonar</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="btn btn-info btn-flat"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-border border-width-2" name="resto" value="<?php echo $pedido->resto?>" readonly>
                    </div>
                </div>
                <label for="nueva_entrega">Nueva entrega</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="btn btn-info btn-flat"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input type="number" class="form-control form-control-border border-width-2" name="nueva_entrega" placeholder="Nueva entrega">
                </div>
            </div>  
            <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="Guardar"></input>
            </div>
        </form>
    </div>
</div>


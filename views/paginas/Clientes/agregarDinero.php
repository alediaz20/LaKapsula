<?php
require_once(DIR_MODEL."class.clientes.php");
$id = $_GET['id'];
$cClientes = new CClientes();
$cliente = $cClientes->getclienteById($id);
?>
<div class="px-4">
    <div class="card card-primary">
        <div class="card-header"><h3 class="card-title">Agregar dinero  a <?= $cliente->nombre_apellido ?></h3></div> 
        <div class="card-body">
                <form method="post" name="agregarDinero" action="ajax/agregarDinero.php">
                <input type="text" class="form-control form-control-border border-width-2" id="id" value="<?php echo $cliente->id?>" hidden>
                <div class="form-group">
                    <label for="precio">Total pedido</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="btn btn-kuality btn-flat"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-border border-width-2" id="precio" value="<?php echo $cliente->monto_debe?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="entrega_anterior">Entrega anterior</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="btn btn-kuality btn-flat"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-border border-width-2" id="entrega_anterior" value="<?php echo $cliente->monto_entrega?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="entrega_anterior">Resta abonar</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="btn btn-kuality btn-flat"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-border border-width-2" id="resto" value="<?php echo ($cliente->monto_debe - $cliente->monto_entrega)?>" readonly>
                    </div>
                </div>
                <label for="nueva_entrega">Nueva entrega</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="btn btn-kuality btn-flat"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input type="number" class="form-control form-control-border border-width-2" id="nueva_entrega" placeholder="Nueva entrega">
                </div>
        </form>
        <button onclick="AgregarDinero()" class="btn btn-kuality"><i class="fas fa-plus"></i> Agregar</button>
        </div>  

    </div>
</div>

<script src="../../js/pedidosCliente.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>


<?php
require_once(DIR_MODEL . "class.prendas.php");
$cPrendas = new cPrendas();
$costo = $cPrendas->calcularCostos();
?>

<div class="container-telas px-4">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Nueva pedido</h3>
        </div>
        <form id="pedido">
            <div class="card-body">
                <div class="form-group">
                    <label for="prenda_nombre">Prenda</label>
                    <select name="prenda" id="prenda" onchange="actualizarPrecio(this.options[this.selectedIndex].getAttribute('precio'),this.options[this.selectedIndex].getAttribute('id_prenda'))">
                        <option>Seleccione una prenda</option>
                        <?php
                        foreach ($costo as $key => $value) {
                            $costoTotal = $value['precio'] + COSTO_VINILO + COSTO_CONFECCION;
                            $value['precio'] = ceil($costoTotal * 1.4);
                            $value['precio'] = round($value['precio'] / 1000, 1);
                            $value['precio'] = $value['precio'] * 1000;
                            if ($key == "Medias K") {
                                $value['precio'] = 1700;
                            }
                        ?>
                            <option id="<?php echo $value['id'] ?>" precio="<?php echo $value['precio'] ?>" , id_prenda="<?php echo $value['id'] ?>"><?php echo $key ?></option>
                        <?php } ?>
                    </select>
                </div>
                <label for="precio">Precio</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="btn btn-kuality btn-flat"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input type="text" class="form-control form-control-border border-width-2" id="precio" name="precio" placeholder="precio" value="seleccione una opción" readonly>
                </div>
                <input type="text" name="id_prenda" id="id_prenda" hidden>
                <input type="text" name="precio_para_descuento" id="precio_para_descuento" hidden>
                <div class="d-flex justify-content-arround">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="btn btn-kuality btn-flat"><i class="fas fa-percent"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-border border-width-2" id="porc_descuento" name="porc_descuento" onchange="aplicarDescuento()" placeholder="Descuento">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="btn btn-kuality btn-flat"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-border border-width-2" id="total_descuento" name="total_descuento" readonly placeholder="Total descuento">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre y apellido</label>
                    <input type="text" class="form-control form-control-border border-width-2" name="nombre" id="nombre" placeholder="Nombre y apellido">
                </div>
                <div class="form-group">
                    <label for="talle">Talle</label>
                    <select name="talle" id="talle">
                        <option>Seleccione un talle</option>
                        <?php
                        foreach (TALLES as $key => $value) { ?>
                            <option><?php echo $value ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </form>
        <div class="card-footer">
            <button class="btn btn-kuality" onclick="nuevoPedido()">Guardar</button>
        </div>
    </div>
</div>

<script src="../../../js/pedidos.js"></script>
<script src="../../../js/sweetalert2.all.min.js"></script>
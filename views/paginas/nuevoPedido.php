<?php   
    require_once("ajax/calculos.php");    
?>

<div class="container-telas px-4">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Nueva pedido</h3>
        </div>
        <form method="post" name="prendas" action="../ajax/nuevoPedido.php" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="prenda_nombre">Prenda</label>
                    <select name="prenda" id="prenda" onchange="actualizarPrecio(this.options[this.selectedIndex].getAttribute('precio'),this.options[this.selectedIndex].getAttribute('id_prenda'))">
                    <option>Seleccione una prenda</option>
                        <?php
                        foreach($costo as $key => $value){
                            $costoTotal = $value['precio'] + COSTO_VINILO + COSTO_CONFECCION;
                            $value['precio'] = ceil($costoTotal * 1.4);
                            ?>
                            <option id="<?php echo $value['id']?>" precio="<?php echo $value['precio'] ?>", id_prenda="<?php echo $value['id']?>"><?php echo $key?></option>
                        <?php } ?>
                    </select>
                </div>
                <input type="text" name="id_prenda" id="id_prenda" hidden>
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="btn btn-info btn-flat"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input type="text" class="form-control form-control-border border-width-2" id="precio" name="precio" placeholder="precio" value="seleccione una opción" readonly>
                </div>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre y apellido</label>
                    <input type="text" class="form-control form-control-border border-width-2" name="nombre" placeholder="Nombre y apellido">
                </div>
                <div class="form-group">
                    <label for="talle">Talle</label>
                    <select name="talle" id="talle">
                    <option>Seleccione una talle</option>
                        <?php foreach(TALLES as $key => $value){ ?>
                            <option><?php echo $value ?></option>
                        <?php } ?>
                    </select>                    
                </div>
                <div class="form-group">
                    <label for="entrega">Entrega</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="btn btn-info btn-flat"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-border border-width-2" name="entrega" placeholder="Entrega">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="Guardar"></input>
            </div>
        </form>
    </div>
</div>

<script>
    function actualizarPrecio(precio,id_prenda){
        document.getElementById("precio").value = precio;
        document.getElementById("id_prenda").value = id_prenda;
}
</script>
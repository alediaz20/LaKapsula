<?php
require_once("model/class.pedidos.php");
$cPedidos = new cPedidos();
$pedidos = $cPedidos->getPedidos();
?>
<div class="px-4">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Pedidos a confeccionar</h3>
        </div>
        <div class="card-body">
            <table class="table table-borderless table-hover table-responsive" id="pedidos">
                <?php
                if (isset($pedidos)) { ?>
                    <thead>
                        <tr>
                            <th>Nro Pedido</th>
                            <th>Prenda</th>
                            <th>Talle</th>
                            <th>Nombre</th>
                            <th>Fecha Pedido</th>
                            <th>Entregado a kuality</th>
                            <th>Marcar como entregado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($pedidos as $key => $value) { ?>
                            <tr>
                                <td><?php echo $value->id; ?></td>
                                <td><?php echo $value->prenda; ?></td>
                                <td><?php echo $value->talle; ?></td>
                                <td><?php echo $value->nombre_apellido; ?></td>
                                <td><?php $fecha = date_create($value->fecha_pedido);
                                    echo date_format($fecha, "d/m/Y"); ?></td>
                                <td><?php
                                    if ($value->entregado_a_klt == null) { ?>
                                        NO
                                    <?php } else {
                                        $entregado_a_klt = date_create($value->entregado_a_klt);
                                        echo date_format($entregado_a_klt, "d/m/Y");
                                    }
                                    ?></td>
                                <?php if ($value->entregado_a_klt == null) { ?>
                                    <td>
                                        <button class="btn btn-listado entregar" onclick="entregar_a_klt('<?php echo $value->id ?>','<?php echo $value->prenda ?>')"><i class="fa-solid fa-hand-holding-heart"></i> Entregar</button>
                                    </td>
                                <?php } else { ?>
                                    <td><button class="btn btn-kuality success"><i class="fas fa-check"></i> ENTREGADO</button></td>
                                <?php } ?>
                            </tr>
                        <?php }
                    } else { ?>
                        <div class="d-flex justify-content-center">
                            <h1 class="btn btn-kuality white">No hay pedidos para mostrar</h1>
                        </div>
                    <?php } ?>
                    </tbody>
            </table>
        </div>




    </div>
</div>


<script src="../js/pedidosAEntregar.js"></script>
<!-- jquery y bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<!-- datatables con bootstrap -->
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

<!-- Para usar los botones -->
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>


<!-- Para los estilos en Excel     -->
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.templates.min.js"></script>
<?php
require_once("../../model/class.pedidos.php");
$cPedidos = new cPedidos();

$fecha_desde = $_POST['fecha_desde'];
$fecha_hasta = $_POST['fecha_hasta'];

$fecha_hasta .= " 23:59:59";

$pedidos = $cPedidos->getPedidosEntreFechas($fecha_desde, $fecha_hasta);

?>


<table id="table-pedidos-entre-fechas" class="table table-borderless table-hover table-responsive">
    <thead>
        <tr>
            <th>Nro Pedido</th>
            <th>Prenda</th>
            <th>Talle</th>
            <th>Nombre</th>
            <th>Fecha Pedido</th>
            <th>Entregado a kuality</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($pedidos)) {
            foreach ($pedidos as $key => $value) { ?>
                <tr>
                    <td><?php echo $value->id; ?></td>
                    <td><?php echo $value->prenda; ?></td>
                    <td><?php echo $value->talle; ?></td>
                    <td><?php echo $value->nombre_apellido; ?></td>
                    <td><?php
                        $fecha = date_create($value->fecha_pedido);
                        echo date_format($fecha, "d/m/Y");
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($value->entregado_a_klt == null) { ?>
                            NO
                        <?php } else {
                            $entregado_a_klt = date_create($value->entregado_a_klt);
                            echo date_format($entregado_a_klt, "d/m/Y");
                        }
                        ?>
                    </td>
                </tr>
            <?php }
        } else { ?>
            <div class="d-flex justify-content-center">
                <h1 class="btn btn-kuality white">No hay pedidos para mostrar</h1>
            </div>
        <?php } ?>
    </tbody>
</table>


<script>
    $(document).ready(function() {
        $('#table-pedidos-entre-fechas').DataTable({
            responsive: true,
            dom: 'lBfrtip',
            buttons: [{
                extend: 'excel',
                text: '<i class="fa-solid fa-file-excel"></i> Exportar Excel',
                className: 'btn btn-success',
                title: 'Pedidos Kapsula',
                excelStyles: { // Add an excelStyles definition
                    template: ['blue_medium', 'header_cyan']
                },
            }, ],
            language: {
                "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
            },
            "lengthMenu": [25, 50, 75, 100],
            "pageLength": 50,
            order: [
                [1, 'asc']
            ]
        });
    });
</script>
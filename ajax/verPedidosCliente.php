<?php

require_once("connect.php");
$tabla = TBL_PEDIDOS;

$sql = "SELECT * FROM `$tabla` WHERE nombre_apellido ='" . $_POST['nombre'] . "'";

$result = $mysqli->query($sql);

if ($result) {
    while ($row = $result->fetch_object()) {
        $cliente_pedidos[] = $row;
    }
    $result->close();
}
?>

<table class="table table-borderless table-hover table-responsive">
        <thead>
            <tr>
                <th>Nro Pedido</th>
                <th>Prenda</th>
                <th>Talle</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Entrega</th>
                <th>Resto</th>
                <th>Fecha Pedido</th>
                <th>Entregado a cliente</th>
                <th>Marcar como entregado</th>
                <th>Eliminar</th>
                <th>Agregar dinero</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $precio_total = 0;
            $entrega_total = 0;
            $resto_total = 0;
            foreach ($cliente_pedidos as $key => $value) { ?>
                <tr>
                    <td><?php echo $value->id; ?></td>
                    <td><?php echo $value->prenda; ?></td>
                    <td><?php echo $value->talle; ?></td>
                    <td><?php echo $value->nombre_apellido; ?></td>
                    <td>$<?php echo $value->precio; ?></td>
                    <td>$<?php echo $value->entrega; ?></td>
                    <?php
                    if ($value->resto <= 0) { ?>
                        <td class="bg-success">PAGADO</td>
                    <?php } else { ?>
                        <td>$<?php echo $value->resto; ?> </td>
                    <?php } ?>
                    </td>
                    <td><?php $fecha = date_create($value->fecha_pedido);
                        echo date_format($fecha, "d/m/Y"); ?></td>
                    <td><?php
                        if ($value->fecha_entrega == "0000-00-00 00:00:00") { ?>
                            NO
                        <?php } else {
                            $fecha_entrega = date_create($value->fecha_entrega);
                            echo date_format($fecha_entrega, "d/m/Y");
                        }
                        ?></td>
                    <?php if ($value->fecha_entrega == "0000-00-00 00:00:00") { ?>
                        <td>
                            <button class="btn btn-kuality" onclick="entregar('<?php echo $value->id ?>','<?php echo $value->nombre_apellido ?>','<?php echo $value->prenda ?>')">Entregar</button>
                        </td>
                    <?php } else { ?>
                        <td><button class="btn btn-success">ENTREGADO</button></td>
                    <?php } ?>
                    <td>
                        <button class="btn btn-danger" onclick="eliminar('<?php echo $value->id ?>','<?php echo $value->nombre_apellido ?>')">Eliminar</button>
                    </td>
                    <td>
                        <input type="text" name="id" value="<?php echo $value->id ?>" hidden>
                        <a href="index.php?pagina=agregarDinero&id=<?php echo $value->id ?>" class="btn btn-primary">Agregar dinero</a>
                    </td>
                </tr>
            <?php 
            $precio_total += $value->precio;
            $entrega_total += $value->entrega;
            $resto_total += $value->resto;
        } ?>
            <tr>
                <td><b>PRECIO TOTAL:</b></td>
                <td>$<?php echo $precio_total ?></td>
                <td><b>ENTREGA TOTAL:</b></td>
                <td>$<?php echo $entrega_total ?></td>
                <td><b>RESTO TOTAL:</b></td>
                <td>$<?php echo $resto_total ?></td>
            </tr>
        </tbody>
</table>

<style type="text/css">
.datatable_wraper{
    float:left !important;
}
</style>

<script src="../js/pedidosListado.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

<?php 
require_once("model/class.pedidos.php");
    $cPedidos = new cPedidos();
    $pedidos = $cPedidos->getPedidos();
    $maspedidos = $cPedidos->getMaspedidos(5);
    $totalpedidos = $cPedidos->getTotalPedidos();
    $cantidadEntregado = $cPedidos->getCantidadEntregado();
?>
<?php if(isset($pedidos)){ ?>
<div class="container">
        <div class="card">
            <div class="card-body text-center">
                <div class="info-box-content bg-white">
                    <div class="info-box-text text-kuality"><h4>Total de pedidos</h4></div>
                    <h3 class="info-box-number text-kuality"><?php echo $totalpedidos ?></h3>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body text-center">
                <div class="info-box-text text-kuality"><h4>Pedidos entregados</h4></div>
                    <h3 class="info-box-number text-kuality"><?php echo $cantidadEntregado ?></h3>
            </div>
        </div>
        <div class="card">
            <div class="card-body text-center">
                <div class="info-box-text text-kuality"><h4>Los más pedidos</h4></div>
                    <?php 
                    foreach($maspedidos as $a => $b){?>
                        <div class="d-flex justify-content-between">
                            <h6 class="info-box-number text-kuality"><?php echo $b->prenda ?></h6>
                            <h6 class="info-box-number text-kuality"><?php echo $b->cantidad ?></h6>
                        </div>
                        <?php }?>
            </div>
        </div>
    </div>
    <?php } ?>
<div class="px-4">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Pedidos</h3>
        </div>
        <div class="card-body">
<table class="table table-borderless table-hover table-responsive" id="pedidos">
<?php if(isset($pedidos)){ ?>
<thead>
        <tr>
            <th>Nro Pedido</th>
            <th>Prenda</th>
            <th>Talle</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Fecha Pedido</th>
            <th>Entregado a cliente</th>
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
                <td><?php echo "$".$value->precio; ?></td>
                <td><?php $fecha = date_create($value->fecha_pedido); 
                            echo date_format($fecha,"d/m/Y"); ?></td>
                <td><?php
                    if($value->fecha_entrega == "0000-00-00 00:00:00"){?>
                        NO
                    <?php }else{
                        $fecha_entrega = date_create($value->fecha_entrega); ?>
                        <td><button class="btn btn-success"><?php echo date_format($fecha_entrega,"d/m/Y");?></button></td> 
                    <?php   } ?>
                </td>
                    <?php } ?>
            </tr>
        <?php }else{?>
            NO HAY PEDIDOS PARA MOSTRAR
        <?php } ?>
    </tbody>
</table>
</div>




    </div>
    </div>


    <script src="../js/pedidosListado.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

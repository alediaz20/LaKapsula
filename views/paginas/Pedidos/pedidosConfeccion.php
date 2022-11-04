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
if(isset($pedidos)){ ?>
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
                            echo date_format($fecha,"d/m/Y"); ?></td>
                <td><?php
                    if($value->entregado_a_klt == null){?>
                        NO
                    <?php }else{
                        $entregado_a_klt = date_create($value->entregado_a_klt); 
                        echo date_format($entregado_a_klt,"d/m/Y"); 
                    }
                ?></td>
                        <?php if($value->entregado_a_klt == null){ ?>
                        <td>
                        <button class="btn btn-kuality" onclick="entregar_a_klt('<?php echo $value->id?>','<?php echo $value->prenda?>')">Entregar</button>
                        </td>
                        <?php } else { ?>
                            <td><button class="btn btn-success">ENTREGADO</button></td> 
                    <?php } ?>
            </tr>
        <?php }}else{?>
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

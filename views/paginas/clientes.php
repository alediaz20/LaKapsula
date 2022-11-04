<?php
require_once("ajax/getClientes.php");
$clientes_pedidos = [];

if(isset($clientes)){
foreach($clientes as $key => $value){
    $data = (array)$value;
    $clientes_pedidos[$value->nombre_apellido][$value->id] = $data;
}
?>

<div class="container-pedidos px-4">
    <div class="card card-primary" >
        <div class="card-header">
            <h3 class="card-title">Clientes</h3>
        </div>
        <div class="card-body">
            <table class="table table-borderless table-hover table-responsive" id="clientes">
                <?php if(isset($clientes_pedidos)){ ?>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Ver pedidos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($clientes_pedidos as $key => $value) { ?>
                        <tr>
                            <td><?php echo strtoupper($key); ?></td>
                            <td>
                                <button class="btn btn-warning" onclick="verPedidos('<?php echo $key ?>')"><i class="fas fa-eye"></i></button>
                            </td>
                        </tr>
                    <?php }}else{?>
                        NO HAY CLIENTES PARA MOSTRAR
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card" id="pedidos_cliente_card">
            <div class="card-header" id="pedidos_cliente_header"></div>
            <div class="card-body" id="pedidos_cliente_body"></div>
    </div>
</div>
<?php }else{ ?>
NO HAY CLIENTES PARA MOSTRAR
<?php } ?>

<script src="../js/pedidosCliente.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

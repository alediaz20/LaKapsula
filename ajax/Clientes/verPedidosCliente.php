<?php
require_once("../../model/class.clientes.php");
$cClientes = new cClientes();

$post = $_POST;
$cliente_pedidos = $cClientes->getPedidosCliente($post['nombre']);
$clientesData = $cClientes->getClienteByName($post['nombre']);


if(!isset($cliente_pedidos)){ ?>
    <h4>No hay pedidos para mostrar</h4>
<?php }else{ ?>

<table class="table table-borderless table-hover table-responsive">
        <thead>
            <tr>
                <th>Nro Pedido</th>
                <th>Prenda</th>
                <th>Talle</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Fecha Pedido</th>
                <th>Entregado a cliente</th>
                <th>Marcar como entregado</th>
                <th>Eliminar</th>
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
                </tr>
            <?php 
            $monto_debe = 0;
            $monto_entrega = 0;
            foreach($clientesData as $key => $value){
                if($value->nombre_apellido == $_POST['nombre']){ 
                    $monto_debe += $value->monto_debe;
                    $monto_entrega += $value->monto_entrega;
                    $idCliente = $value->id;
                }
            }
        } ?>
            <tr>
                <td><b>PRECIO TOTAL:</b></td>
                <td>$<?php echo $monto_debe ?></td>
                <td><b>ENTREGA TOTAL:</b></td>
                <td>$<?php echo $monto_entrega ?></td>
                <td><b>RESTO TOTAL:</b></td>
                <td>
                    
                <?php if(($monto_debe - $monto_entrega) == 0){ ?>
                    <button class="btn btn-success">PAGADO</button>
                <?php }else{ 
                    echo "$".($monto_debe - $monto_entrega);
                } ?>
                </td>
                <td>
                <?php if(($monto_debe - $monto_entrega) != 0){ ?>
                    <a href="index.php?pagina=agregarDinero&id=<?php echo $idCliente ?>" class="btn btn-primary">Agregar dinero</a>
                <?php } ?>
                </td>
            </tr>
        </tbody>
</table>

<?php } ?>
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

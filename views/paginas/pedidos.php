<?php require_once("ajax/getPedidos.php"); 
    require_once("ajax/getMasPedidos.php");
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
        foreach ($pedidos as $key => $value) { ?>
            <tr>
                <td><?php echo $value->id; ?></td>
                <td><?php echo $value->prenda; ?></td>
                <td><?php echo $value->talle; ?></td>
                <td><?php echo $value->nombre_apellido; ?></td>
                <td>$<?php echo $value->precio; ?></td>
                <td>$<?php echo $value->entrega; ?></td>
                <?php 
                    if($value->resto <= 0){ ?>
                <td class="bg-success">PAGADO</td> 
                    <?php }else{ ?>
                        <td>$<?php echo $value->resto;?> </td>
                    <?php } ?>
                </td>
                    
                <td><?php $fecha = date_create($value->fecha_pedido); 
                            echo date_format($fecha,"d/m/Y"); ?></td>
                <td><?php
                    if($value->fecha_entrega == "0000-00-00 00:00:00"){?>
                        NO
                    <?php }else{
                        $fecha_entrega = date_create($value->fecha_entrega); 
                        echo date_format($fecha_entrega,"d/m/Y"); 
                    }
                ?></td>
                        <?php if($value->fecha_entrega == "0000-00-00 00:00:00"){ ?>
                        <td>
                        <form method="post" name="entregarPrenda" action="ajax/entregarPrenda.php">
                            <input type="text" name="id" value="<?php echo $value->id ?>"hidden>
                            <input type="submit" class="btn btn-primary" value="Entregar"></input>                                        
                        </form>
                        </td>
                        <?php } else { ?>
                            <td><button class="btn btn-success">ENTREGADO</button></td> 
                    <?php } ?>
                    <td>
                        <form method="post" name="eliminarPedido" action="ajax/eliminarPedido.php">
                            <input type="text" name="id" value="<?php echo $value->id ?>"hidden>
                            <input type="submit" class="btn btn-danger" value="Eliminar"></input>                                        
                        </form>
                    </td>
                    <td>
                        <input type="text" name="id" value="<?php echo $value->id ?>"hidden>
                        <a href="index.php?pagina=agregarDinero&id=<?php echo $value->id ?>" class="btn btn-primary">Agregar dinero</a>
                    </td>
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

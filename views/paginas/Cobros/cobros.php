<?php
require_once("ajax/getCobros.php");
?>
<div class="container-pedidos px-4">
    <div class="card card-primary" >
        <div class="card-header">Nuevo cobro</div>
        <div class="card-body">
            <input class="form-control form-control-border border-width-2 my-3" type="date" id="fecha_cobro">
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="btn btn-info btn-flat"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input class="form-control form-control-border border-width-2" type="text" id="monto_total">
                </div>
            </div>

            <button class="btn btn-kuality mt-3" onclick="agregarCobro()">Confirmar</button>
        </div>
    </div>

    <div class="card" id="cobros_card">
            <div class="card-header" id="cobros_header">
                <h3 class="card-title">Cobros</h3>
            </div>
            <div class="card-body" id="cobros_body">
                <table class="table table-borderless table-hover table-responsive" id="cobros">
                    <?php if(isset($cobros)){ ?>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Fecha cobro</th>
                            <th>Monto total</th>
                            <th>Monto Caro</th>
                            <th>Monto Ale</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $total = 0;
                        $caro = 0;
                        $ale = 0;
                        foreach ($cobros as $key => $value) { ?>
                            <tr>
                                <td><?php echo ($value->id); ?></td>
                                <td><?php 
                                        $fecha = date_create($value->fecha_cobro);
                                        $fecha = date_format($fecha,"d/m/Y");
                                        echo ($fecha);
                                    ?>
                                </td>
                                <td><?php echo ("$".number_format($value->monto_total,0,',','.')); ?></td>
                                <td><?php echo ("$".number_format($value->monto_caro,0,',','.')); ?></td>
                                <td><?php echo ("$".number_format($value->monto_ale,0,',','.')); ?></td>
                            </tr>
                        <?php 
                        $total += $value->monto_total;
                        $caro += $value->monto_caro;
                        $ale += $value->monto_ale;
                        } ?>
                        <tfoot>
                            <tr class="bg-kuality">
                                <td><?php echo "TOTAL: $".number_format($total,0,',','.'); ?> </td>
                                <td></td>
                                <td><?php echo "TOTAL Caro: $".number_format($caro,0,',','.'); ?> </td>
                                <td></td>
                                <td><?php echo "TOTAL Ale: $".number_format($ale,0,',','.'); ?> </td>
                                <td></td>
                            </tr>
                        </tfoot>

                    <?php }else{?>
                            NO HAY COBROS PARA MOSTRAR
                        <?php } ?>
                    </tbody>
                </table>     
            </div>
    </div>
</div>


<script src="../js/cobros.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

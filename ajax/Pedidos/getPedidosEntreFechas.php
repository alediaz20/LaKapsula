<?php
require_once("../../model/class.pedidos.php");
$cPedidos = new cPedidos();
$post = $_POST;
$pedidosEntreFechas = $cPedidos->getPedidosEntreFechas($post['fechadesde'],$post['fechahasta']);
$respuesta = [
    "data" => [$pedidosEntreFechas[0]->cantidad]
];


echo (json_encode($respuesta));

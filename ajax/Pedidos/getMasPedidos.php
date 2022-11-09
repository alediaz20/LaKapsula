<?php
require_once("../../model/class.pedidos.php");
$cPedidos = new cPedidos();
$masPedidos = $cPedidos->getMasPedidos(10);

$labels = [];
$data = [];

foreach ($masPedidos as $key => $value) {
    array_push($labels, $value->prenda);
    array_push($data, $value->cantidad);
}

$respuesta = [
    "labels" => $labels,
    "data" => $data
];



echo json_encode($respuesta);


<?php
require_once("../../model/class.pedidos.php");
$cPedidos = new cPedidos();

$pedidosMensuales = $cPedidos->getPedidosMensuales();
$labels = [];
$data = [];

foreach ($pedidosMensuales as $key => $value) {
    switch ($value->Mes){
        case "January": $value->Mes = "Enero";break;
        case "February": $value->Mes = "Febrero";break;
        case "March": $value->Mes = "Marzo";break;
        case "April": $value->Mes = "Abril";break;
        case "May": $value->Mes = "Mayo";break;
        case "June": $value->Mes = "Junio";break;
        case "July": $value->Mes = "Julio";break;
        case "August": $value->Mes = "Agosto";break;
        case "September": $value->Mes = "Septiembre";break;
        case "October": $value->Mes = "Octubre";break;
        case "November": $value->Mes = "Noviembre";break;
        case "December": $value->Mes = "Diciembre";break;
    }
    array_push($labels, $value->Mes);
    array_push($data, $value->cantidad);
}

$respuesta = [
    "labels" => $labels,
    "data" => $data
];

echo json_encode($respuesta);

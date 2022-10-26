<?php
require_once("connect.php");
$tabla = TBL_PEDIDOS;

$result = $mysqli->query("SELECT * FROM `$tabla` ORDER BY fecha_pedido DESC");

$totalpedidos = $result->num_rows;
if($result){
    while ($row = $result->fetch_object()){
        $pedidos[] = $row;
    }
    $result->close();
}























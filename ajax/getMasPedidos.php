<?php
require_once("connect.php");
$tabla = TBL_PEDIDOS;

$result = $mysqli->query("SELECT prenda, COUNT(*) as cantidad FROM pedidos u GROUP BY prenda HAVING COUNT(*) ORDER BY cantidad DESC LIMIT 0,5");

if($result){
    while ($row = $result->fetch_object()){
        $maspedidos[] = $row;
    }
    $result->close();
}

$query2 = $mysqli->query("SELECT * from pedidos WHERE fecha_entrega != '0000-00-00 00:00:00'");

$cantidadEntregado = $query2->num_rows;


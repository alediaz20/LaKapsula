<?php
require_once("../../model/class.pedidos.php");
$cPedidos = new cPedidos();
$post = $_POST;

$result = $cPedidos->savePedido($post);

return $result;
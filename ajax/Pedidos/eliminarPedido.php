<?php 
require_once("../../model/class.pedidos.php");
$cPedidos = new cPedidos();

$id = $_POST['id'];
$nombre = $_POST['nombre'];

$result = $cPedidos->deletePedido($id,$nombre);

return $result;
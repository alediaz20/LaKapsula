<?php 
require_once("../../model/class.pedidos.php");

$cPedidos = new cPedidos();
$id = $_POST['id'];

$result = $cPedidos->entregarPrenda($id);

return $result;
<?php 
require_once("../../model/class.pedidos.php");

$cPedidos = new cPedidos();
$id = $_POST['id'];

$result = $cPedidos->entregarKLT($id);

return $result;

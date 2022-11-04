<?php 
require_once("connect.php");
$id = $_POST['id'];
$nombre = $_POST['nombre'];

$tabla = TBL_PEDIDOS;
$tabla_clientes = TBL_CLIENTES;

$sqlpedido = "SELECT * FROM `$tabla` WHERE id ='" . $id . "'";
$pedido = $mysqli->query($sqlpedido);
while($row = $pedido->fetch_object()){
    $pedidoactual[] = $row;
};

$preciopedido = $pedidoactual[0]->precio;

$sqlCliente = "SELECT * FROM `$tabla_clientes` WHERE `nombre_apellido` = '".$nombre."'";
$cliente = $mysqli->query($sqlCliente);

if($cliente){
    while ($row = $cliente->fetch_object()){
        $cliente_actual[] = $row;
    }
    $monto_debe = $cliente_actual[0]->monto_debe - $preciopedido;
    if($monto_debe < 0){
        $monto_debe = 0;
    }
    $update = "UPDATE `$tabla_clientes` SET `monto_debe` = '".$monto_debe."' WHERE `clientes`.`id` = ".$cliente_actual[0]->id;
    $mysqli->query($update);
}

// Borro pedido
$sql = "DELETE FROM `".$tabla."` WHERE id = ".$id;
$result = $mysqli->query($sql);

// if($result){
//     header("Location:".URL_local."index.php?pagina=pedidos&nombre=".$nombre);
// }

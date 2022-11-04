<?php

require_once("connect.php");
$post = $_POST;
$tabla = TBL_PEDIDOS;
$tabla_clientes = TBL_CLIENTES;
$nombre = strtolower($post['nombre']);


$sql = "INSERT into $tabla(id_prenda,prenda,talle,nombre_apellido,precio,fecha_entrega) VALUES (".$post['id_prenda'].",'".$post['prenda']."','".$post['talle']."','".$nombre."',".$post['precio'].",'0000-00-00 00:00:00')";
$result = $mysqli->query($sql);
$sqlCliente = "SELECT * FROM `clientes` WHERE `nombre_apellido` = '".$nombre."'";
$cliente = $mysqli->query($sqlCliente);

if($cliente->num_rows >= 1){
    while ($row = $cliente->fetch_object()){
        $cliente_actual[] = $row;
    }
    $monto_debe = $cliente_actual[0]->monto_debe + $post['precio'];
    
    $update = "UPDATE `clientes` SET `monto_debe` = '".$monto_debe."' WHERE `clientes`.`id` = ".$cliente_actual[0]->id;
    $mysqli->query($update);
}else{
    $insert = "INSERT INTO `clientes` (nombre_apellido, monto_debe, monto_entrega) VALUES ('".$nombre."','".$post['precio']."','0')";
    $create = $mysqli->query($insert);
}


if($result){
    header("Location: ".URL_local."index.php?pagina=nuevoPedido");
}


<?php 
require_once("connect.php");
$post = $_POST;

$tabla = TBL_CLIENTES;

$precio = $post['precio'];
$nueva_entrega = $post['nueva_entrega'];
$entrega_anterior = $post['entrega_anterior'];


$entrega_final = $nueva_entrega + $entrega_anterior;

$sql = "UPDATE `".$tabla."` SET `monto_entrega`=".$entrega_final." WHERE id = ".$post['id'];

$result = $mysqli->query($sql);

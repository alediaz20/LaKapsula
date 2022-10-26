<?php 
require_once("connect.php");
$post = $_POST;

$tabla = TBL_PEDIDOS;

$precio = $post['precio'];
$nueva_entrega = $post['nueva_entrega'];
$entrega_anterior = $post['entrega_anterior'];


$entrega_final = $nueva_entrega + $entrega_anterior;
$resto = $precio - $entrega_final;


$sql = "UPDATE `".$tabla."` SET `entrega`=".$entrega_final.", `resto`=".$resto." WHERE id = ".$post['id'];

$result = $mysqli->query($sql);

if($result){
    header("Location:".URL_local."index.php?pagina=pedidos");
}

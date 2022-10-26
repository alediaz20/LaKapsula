<?php

require_once("connect.php");
$post = $_POST;
$tabla = TBL_PEDIDOS;
$resto = $post['precio'] - $post['entrega'];
$sql = "INSERT into $tabla(id_prenda,prenda,talle,nombre_apellido,precio,entrega,resto) VALUES (".$post['id_prenda'].",'".$post['prenda']."','".$post['talle']."','".$post['nombre']."',".$post['precio'].",".$post['entrega'].",".$resto.")";

$result = $mysqli->query($sql);

if($result){
    header("Location: ".URL_local."index.php?pagina=nuevoPedido");
}
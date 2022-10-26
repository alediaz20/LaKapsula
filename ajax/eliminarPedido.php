<?php 
require_once("connect.php");
$id = $_POST['id'];

$tabla = TBL_PEDIDOS;
$sql = "DELETE FROM `".$tabla."` WHERE id = ".$id;

$result = $mysqli->query($sql);

if($result){
    header("Location:".URL_local."index.php?pagina=pedidos");
}

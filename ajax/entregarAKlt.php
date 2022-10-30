<?php 
require_once("connect.php");
$id = $_POST['id'];

$tabla = TBL_PEDIDOS;
$fechaahora = date("Y:m:d h:m:s");
$sql = "UPDATE `".$tabla."` SET `entregado_a_klt`='".$fechaahora."' WHERE id = ".$id;

$result = $mysqli->query($sql);

if($result){
    header("Location:".URL_local."index.php?pagina=pedidos");
}

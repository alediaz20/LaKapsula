<?php
require_once("connect.php");

$tabla = TBL_PEDIDOS;

$sql = "SELECT * FROM `$tabla`";
$result = $mysqli->query($sql);

if($result){
    while ($row = $result->fetch_object()){
        $clientes[] = $row;
    }
    $result->close();
}









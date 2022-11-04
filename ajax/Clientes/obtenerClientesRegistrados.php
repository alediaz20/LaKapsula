<?php
require_once("connect.php");
$tabla = TBL_CLIENTES;

$sql = "SELECT * FROM $tabla";

$result = $mysqli->query($sql);
if($result){
    while ($row = $result->fetch_object()){
        $clientesRegistrados[] = $row;
    }
    $result->close();
}



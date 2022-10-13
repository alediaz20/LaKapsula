<?php
require_once("connect.php");
$tabla = TBL_PRENDAS;

$result = $mysqli->query("SELECT * FROM `$tabla` ORDER BY id");
if($result){
    while ($row = $result->fetch_object()){
        $prendas[] = $row;
    }
    $result->close();
}












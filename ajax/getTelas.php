<?php
require_once("connect.php");
$tabla = TBL_TELAS;

$result = $mysqli->query("SELECT * FROM `$tabla` ORDER BY id");
if($result){
    while ($row = $result->fetch_object()){
        $telas[] = $row;
    }
    $result->close();
}












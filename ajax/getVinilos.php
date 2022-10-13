<?php
require_once("config.php");
require_once("connect.php");
$tabla = TBL_VINILOS;

$result = $mysqli->query("SELECT * FROM `$tabla` ORDER BY id");
if($result){
    while ($row = $result->fetch_object()){
        $vinilos[] = $row;
    }
    $result->close();
}



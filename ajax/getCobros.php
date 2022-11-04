<?php
require_once("connect.php");

$tabla = TBL_COBROS;

$sql = "SELECT * FROM $tabla";

$result = $mysqli->query($sql);


if($result->num_rows >= 1){
    while ($row = $result->fetch_object()){
        $cobros[] = $row;
    }
}


<?php
require_once("connect.php");

$result = $mysqli->query("SELECT * FROM `prendas` ORDER BY id");
if($result){
     // Cycle through results
    while ($row = $result->fetch_object()){
        $prendas[] = $row;
    }
    // Free result set
    // $mysqli->next_result();
    $result->close();
}












<?php
require_once("connect.php");

$result = $mysqli->query("SELECT * FROM `telas`");
if($result){
     // Cycle through results
    while ($row = $result->fetch_object()){
        $telas[] = $row;
    }
    // Free result set
    // $mysqli->next_result();
    $result->close();
}












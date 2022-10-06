<?php
$mysqli = new mysqli("localhost", "root", "", "capsula");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


$result = $mysqli->query("SELECT * FROM `prendas`");
if($result){
     // Cycle through results
    while ($row = $result->fetch_object()){
        $prendas[] = $row;
    }
    // Free result set
    $result->close();
    $mysqli->next_result();
}












<?php
$mysqli = new mysqli(DB_HOST, DB_USER,DB_PASSWORD, DB_NAME);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


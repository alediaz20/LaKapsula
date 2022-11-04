<?php
require_once("../../model/class.telas.php");

$post = $_POST;

$cTelas = new cTelas();

$result = $cTelas->saveTelas($post);

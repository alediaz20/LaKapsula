<?php
require_once("../../model/class.prendas.php");
$cPrendas = new cPrendas();

$post = $_POST;
var_dump($post);

$result = $cPrendas->editPrenda($post);

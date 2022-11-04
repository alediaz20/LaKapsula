<?php
require_once("../../model/class.prendas.php");
$cPrendas = new cPrendas();
$post = $_POST;

$result = $cPrendas->savePrenda($post);

return $result;
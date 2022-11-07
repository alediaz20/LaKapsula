<?php
require_once("../../model/class.prendas.php");
$cPrendas = new cPrendas();
$post = $_POST;

$post['prenda_telas'] = substr($post['prenda_telas'], 0, -1);
$result = $cPrendas->savePrenda($post);

return $result;
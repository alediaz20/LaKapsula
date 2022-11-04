<?php
require_once("../../model/class.cobros.php");
$cCobros = new cCobros();
$post = $_POST;


$result = $cCobros->saveCobro($post);
return $result;
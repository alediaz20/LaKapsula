<?php
require_once("../../model/class.vinilos.php");
$cVinilos = new cVinilos();
$post = $_POST;

$result = $cVinilos->editVinilo($post);

return $result;
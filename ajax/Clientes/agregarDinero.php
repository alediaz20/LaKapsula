<?php 
require_once("../../model/class.clientes.php");
$cClientes = new CClientes();

$post = $_POST;

$result = $cClientes->agregarDinero($post);
return $result;
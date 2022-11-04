<?php

require_once("connect.php");
$tabla = TBL_COBROS;

$monto_total = $_POST['monto_total'];

$monto_ale = $monto_total / 7;
$monto_caro = $monto_total - $monto_ale;

$fecha = $post['fecha_cobro'];
$fecha = date_create($fecha);
$fecha = date_format($fecha,"Y:m:d h:m:s");

$insert = "INSERT INTO $tabla(monto_total,monto_caro,monto_ale,fecha_cobro) VALUES ('".$monto_total."','".$monto_caro."','".$monto_ale."','".$fecha."')";

$result = $mysqli->query($insert);
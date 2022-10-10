<?php
require_once("connect.php");
$post = $_POST;
$tabla = 'telas';
$sql = "INSERT into $tabla(nombre,precio_por_kg,metros_por_kg) VALUES ('".$post['tela_nombre']."',".$post['tela_precio'].",".$post['tela_rendimiento'].")";

$result = $mysqli->query($sql);

if($result){
    header("Location:localhost://http://lakapsula.local/index.php?pagina=telas");
}
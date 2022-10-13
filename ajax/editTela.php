<?php
require_once("config.php");
require_once("connect.php");

$post = $_POST;

$tabla = 'telas';
$precio_por_metro = $post['tela_precio'] / $post['tela_rendimiento'];

$sql = "UPDATE $tabla SET `nombre`='".$post['tela_nombre']."',`precio_por_kg`=".$post['tela_precio'].",`metros_por_kg`=".$post['tela_rendimiento'].",`precio_por_metro`=".$precio_por_metro." WHERE id=".$post['id'];
$result = $mysqli->query($sql);

if($result){
    header("Location:localhost://http://lakapsula.local/index.php?pagina=telas");
}
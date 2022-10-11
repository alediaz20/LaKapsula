<?php
require_once("connect.php");
$post = $_POST;

$tabla = 'telas';
$precio_por_metro = $post['tela_precio'] / $post['tela_rendimiento'];
$sql = "INSERT into $tabla(nombre,precio_por_kg,metros_por_kg,precio_por_metro) VALUES ('".$post['tela_nombre']."',".$post['tela_precio'].",".$post['tela_rendimiento'].",".$precio_por_metro.")";

$result = $mysqli->query($sql);

if($result){
    header("Location:localhost://http://lakapsula.local/index.php?pagina=telas");
}
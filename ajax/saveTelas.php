<?php
require_once("connect.php");

$post = $_POST;

$sql = "INSERT INTO `telas` (`id`, `nombre`, `precio_por_kg`, `metros_por_kg`) VALUES (NULL, '".$post['tela_nombre']."',".$post['tela_precio'].",".$post['tela_rendimiento'].");";
$result = $mysqli->query($sql);

if($result){
    header('Location: http://lakapsula.local/views/telas.php');
}
<?php

require_once("config.php");

require_once("connect.php");

$post = $_POST;

$tabla = 'vinilos';


$sql = "UPDATE $tabla SET `nombre_para_mostrar`='".$post['nombre']."',`precio`=".$post['precio']." WHERE id=".$post['id'];

$result = $mysqli->query($sql);



if($result){

    header("Location:".URL_local."index.php?pagina=calcvinil");

}

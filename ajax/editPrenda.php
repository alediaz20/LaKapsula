<?php


require_once("connect.php");
$post = $_POST;

$tabla = 'prendas';
$sql = "UPDATE $tabla SET `nombre`='".$post['prenda_nombre']."',`telas`='".$post['prenda_telas']."',`metros_por_tela`='".$post['metros_por_tela']."' WHERE id=".$post['id'];

$result = $mysqli->query($sql);


if(isset($_FILES['imagen'])){
    $directorio = '../imgs/';
    $subir_archivo = $directorio.basename($post['id'].".png");
    move_uploaded_file($_FILES['imagen']['tmp_name'], $subir_archivo);
}

if($result){
    header('Location: http://lakapsula.local/index.php?pagina=prendas');
}
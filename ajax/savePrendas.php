<?php


require_once("connect.php");

$post = $_POST;
$tabla = 'prendas';
$sql = "INSERT INTO `prendas`(`nombre`, `telas`) VALUES ('".$post['prenda_nombre']."','".$post['prenda_telas']."')";
$result = $mysqli->query($sql);

$sql2 = "SELECT id FROM `prendas` WHERE `nombre` = '".$post['prenda_nombre']."'";

$result = $mysqli->query($sql2);
if($result){
    // Cycle through results
    while ($row = $result->fetch_object()){
        $prenda[] = $row;
    }
    // Free result set
    // $mysqli->next_result();
    $result->close();
}

$idprenda = $prenda[0]->id;

$directorio = '../imgs/';
$subir_archivo = $directorio.basename($idprenda.".png");
move_uploaded_file($_FILES['imagen']['tmp_name'], $subir_archivo);


if($result){
    header('Location: http://lakapsula.local/index.php?pagina=prendas');
}